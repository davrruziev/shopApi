<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreorderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'delivery_method_id' => 'required|numeric',
            'payment_type_id' => 'required|numeric',
            'products' => 'required',
            'products.*.product_id' => 'required|numeric',
            'products.*.stock_id' => 'required|numeric',
            'products.*.quantity' => 'nullable|numeric',
            'comment' => 'nullable|max:500',
        ];
    }
}
