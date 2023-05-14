<?php

namespace App\Http\Requests;

use App\Models\Expense;
use App\Models\Merchant;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use PHPUnit\TextUI\Configuration\Merger;

class UpdateMerchantRequest extends FormRequest
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
            'phone' => ['required', 'digits:11'],
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
            'name' => "ناوی بازرگان",
            'phone' => "ژمارەی مۆبایل",
            'location' => "ناونیشان",
        ];
    }
    public function updateRecord(Merchant $merchant)
    {
        $inputs = collect($this->safe()->all());
        $merchant = $merchant->update($inputs->only([
            'name', 'phone', 'location'
        ])->toArray());

        if (!$merchant)
            throw ValidationException::withMessages([
                'failed' => __('index.admin.messages.expense.fail.update')
            ]);
    }
}
