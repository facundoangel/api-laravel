<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class customerRequest extends FormRequest
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


    public function messages(){
        return[
            'name.required' => 'El campo nombre es obligatorio',
            'name.max' => 'El campo nombre debe tener maximo 40 caracteres',
            'name.min' => 'El campo nombre debe tener minimo 4 caracteres',
            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'El campo email debe ser un email',
            'phone.required' => 'El campo telefono es obligatorio',
            'phone.max' => 'El campo telefono debe tener maximo 20 caracteres',
            'phone.min' => 'El campo telefono debe tener minimo 20 caracteres',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:40|min:4',
            'email' => 'required|email',
            'phone' => 'required|max:20|min:20'
        ];
    }
}
