## Shopping Cart
這是一個以Laravel開發的購物車網站。包括實作會員登入、後台管理系統，以及訂單管理系統。
## 線上參訪網站
- [shopping cart](https://shopping-cart.gorillastar.site)
- 帳號 : `123@gmail.com`
- 密碼 : `password`

## 開始之前

#### 你的電腦至少要先安裝 :
- PHP (>=7.3.0)
- composer
## 如何開始

#### 以下將說明如何在本地電腦運行

1. 執行 `composer install`
2. 建立 Database
3. 複製 `.env.example` 並建立 `.env` <br><br/>

    設定以下資料
    ```env
    DB_CONNECTION=
    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=
    ```

4. 執行 `php artisan key:generate`
5. 執行 `php artisan migrate --seed`
6. 執行 `php artisan serve`
## 功能

- 購物車系統
- 訂單系統
- 用戶登入
  - 管理員
  - 顧客
- 產品名搜尋
- 價格搜尋
- 產品分類
- 標籤雲
- 後臺管理
  - 產品管理 (CRUD)
  - 訂單管理