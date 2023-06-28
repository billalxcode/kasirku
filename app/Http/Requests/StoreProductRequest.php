<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'product_code' => 'required|unique:products',
            'product_name' => 'required|string',
            'unit_in_stock' => 'required|integer',
            'unit_price' => 'required|integer',
            'category_id' => 'required|integer',
            'unit_id' => 'required|integer'
        ];
    }
}
