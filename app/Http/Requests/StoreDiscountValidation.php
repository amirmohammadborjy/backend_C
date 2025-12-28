<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiscountValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_id'       => 'required|exists:products,id',
            'code'             => 'required|string|max:50',
            'discount_percent' => 'required|integer|min:1|max:100',
            'expires_at'       => 'nullable|date|after:today',
        ];
    }
}
