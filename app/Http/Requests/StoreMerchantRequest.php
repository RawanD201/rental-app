<?php

namespace App\Http\Requests;

use App\Models\Merchant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class StoreMerchantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (!auth()->check())
            return false;

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
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'digits:11', "unique:merchants,phone"],
            'location' => ['string'],
        ];
    }
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'en_name' => "English Name",
            'ku_name' => "Kurdish Name",
            'ar_name' => "Arabic Name",
            'en_description' => "English Description",
            'ku_description' => "Kurdish Description",
            'ar_description' => "Arabic Description",
        ];
    }
    public function storeRecord()
    {
        $merchant = Merchant::create([
            'name' => $this->safe()->name,
            'phone' => $this->safe()->phone,
            'location' => $this->safe()->location,

        ]);

        if (!$merchant)
            throw ValidationException::withMessages([
                'failed' => __('index.admin.messages.merchant.fail.create')
            ]);
    }
}
