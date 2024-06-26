<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'quantity' => 'required',
            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Name is required",
            'email.required' => "Email is required",
            'mobile.required' => "Mobile is required",
            'quantity.required' => "Quantity is required",
        ];
    }
}
