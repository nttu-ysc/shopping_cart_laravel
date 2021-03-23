<?php

namespace App\Http\Controllers;

use App\ECPaySDK\ECPay_AllInOne;
use App\ECPaySDK\ECPay_PaymentMethod;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    protected $cart;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $oldCart = session('cart');
            $this->cart = new Cart;
            $this->cart->getItems($oldCart);

            return $next($request);
        });

        $this->middleware('can:admin')->only(['admin', 'showByAdmin', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Auth::user()->orders()->withCount('orderItems')->get();
        return view(
            'orders/index',
            [
                'orders' => $orders,
                'items' => $this->cart->items,
                'totalQuantity' => $this->cart->totalQuantity,
                'totalPrice' => $this->cart->totalPrice
            ]
        );
    }

    public function admin()
    {
        $orders = Order::withCount('orderItems')->get();
        return view('orders/admin', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carts = Auth::user()->carts;
        return view(
            'orders.create',
            [
                'carts' => $carts,
                'items' => $this->cart->items,
                'totalQuantity' => $this->cart->totalQuantity,
                'totalPrice' => $this->cart->totalPrice
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $order = new Order;
        $order->email = Auth::user()->email;
        $order->fill($request->all());
        $order->merchantTradeNo = 'test' . time();
        $order->user_id = Auth::id();
        $order->save();

        Auth::user()->fill($request->all());
        Auth::user()->save();

        foreach (Auth::user()->carts as $item) {
            $orderItem = new OrderItem;
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item->product_id;
            $orderItem->productData = [
                'product_id' => $item->product_id,
                'name' => $item->item,
                'price' => $item->product->price,
                'quantity' => $item->quantity,
                'discount' => $item->product->discount,
                'thumbnail' => $item->product->thumbnail,
                'color' => $item->sku->color,
                'size' => $item->sku->size,
            ];
            $orderItem->save();
            $item->delete();
        }
        $request->session()->forget('cart');
        $request->session()->save();
        try {

            $obj = new ECPay_AllInOne();

            //服務參數
            $obj->ServiceURL  = "https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5";   //服務位置
            $obj->HashKey     = '5294y06JbISpM5x9';                                           //測試用Hashkey，請自行帶入ECPay提供的HashKey
            $obj->HashIV      = 'v77hoKGq4kWxNNIS';                                           //測試用HashIV，請自行帶入ECPay提供的HashIV
            $obj->MerchantID  = '2000132';                                                     //測試用MerchantID，請自行帶入ECPay提供的MerchantID
            $obj->EncryptType = '1';                                                           //CheckMacValue加密類型，請固定填入1，使用SHA256加密


            //基本參數(請依系統規劃自行調整)
            $MerchantTradeNo = $order->merchantTradeNo;
            $obj->Send['ReturnURL']         = " http://a087b8e214c2.ngrok.io/orders/callback";    //付款完成通知回傳的網址
            $obj->Send['ClientBackURL']         = "http://127.0.0.1:8000/orders/" . $order->id;    //付款完成通知回傳的網址
            $obj->Send['MerchantTradeNo']   = $MerchantTradeNo;                          //訂單編號
            $obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');                       //交易時間
            $obj->Send['TotalAmount']       = $order->totalPrice();                                      //交易金額
            $obj->Send['TradeDesc']         = "good to drink";                          //交易描述
            $obj->Send['ChoosePayment']     = ECPay_PaymentMethod::Credit;              //付款方式:Credit
            $obj->Send['IgnorePayment']     = ECPay_PaymentMethod::GooglePay;           //不使用付款方式:GooglePay

            //訂單的商品資料
            foreach ($order->orderItems as $orderItem) {
                array_push($obj->Send['Items'], array(
                    'Name' => $orderItem->productData['name'], 'Price' => (int) $orderItem->discountPrice(),
                    'Currency' => "元", 'Quantity' => (int) $orderItem->productData['quantity'], 'URL' => "dedwed"
                ));
            }

            //產生訂單(auto submit至ECPay)
            $obj->CheckOut();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function callback(Request $request)
    {
        $order = Order::where('merchantTradeNo', $request->MerchantTradeNo)->first();
        if ($request->RtnCode == 1) {
            $order->tradeNo = $request->TradeNo;
            $order->paid = !$order->paid;
            $order->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        $orderItems = $order->orderItems()->orderBy('product_id')->get();
        return view('orders.show', ['order' => $order, 'orderItems' => $orderItems]);
    }

    public function showByAdmin($id)
    {
        $order = Order::find($id);
        $items = $order->orderItems()->orderBy('product_id')->get();
        return view('orders.showByAdmin', ['items' => $items, 'order' => $order]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        $order->delete();
    }
}