<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PriceFilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'priceFrom' => 'required|integer',
            'priceTo' => 'required|integer|gt:priceFrom',
        ];
    }

    protected $redirect = '/';
}
