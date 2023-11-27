<?php

namespace App\Http\Requests;

use App\Enums\MerchantStatus;
use App\Models\Merchant;
use Illuminate\Validation\Rule;

class UpdateMerchantRequest extends AbstractFormRequest
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
        /** @var Merchant $merchant */
        $merchant = $this->route('merchant');

        return [
            'name' => [
                'required',
                'max:150',
                Rule::unique('merchants')->ignore($merchant->id)
            ],
            'status' => Rule::in(MerchantStatus::toArray())
        ];
    }
}
