<?php

namespace App\Http\Requests;

class StoreShopRequest extends AbstractFormRequest
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
            'address' => 'required|max:150',
            'merchant_id' => 'required|exists:merchants,id',
            'latitude' => 'required|decimal:2,8',
            'longitude' => 'required|decimal:2,8',
        ];
    }
}
