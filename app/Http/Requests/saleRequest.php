<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saleRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'customer_id' => 'required|numeric',
            'product_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'total' => 'required|numeric',
        ];
    }



    public function messages()
    {
        return [
            'customer_id.required' => 'El campo cliente es obligatorio',
            'product_id.required' => 'El campo producto es obligatorio',
            'quantity.required' => 'El campo cantidad es obligatorio',
            'price.required' => 'El campo precio es obligatorio',
            'total.required' => 'El campo total es obligatorio',
            'quantity.numeric' => 'El campo cantidad debe ser un numero',
            'price.numeric' => 'El campo precio debe ser un numero',
            'total.numeric' => 'El campo total debe ser un numero',
            'product_id.numeric' => 'El campo producto debe ser un numero',
            'customer_id.numeric' => 'El campo cliente debe ser un numero',
        ];
    }
}
