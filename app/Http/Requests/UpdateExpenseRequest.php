<?php

namespace App\Http\Requests;

use App\Models\Expense;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class UpdateExpenseRequest extends FormRequest
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
            'expense_id' => ['required', 'exists:expenses_type,id'],
            'expense_price' => ['numeric', 'required', 'max:999999999999999']
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
    public function updateRecord(Expense $expense)
    {
        $inputs = collect($this->safe()->all());
        $expense = $expense->update($inputs->only([
            'name', 'expense_id', 'expense_price', 'verify', 'note', 'expense_date'
        ])->toArray());

        if (!$expense)
            throw ValidationException::withMessages([
                'failed' => __('index.admin.messages.expense.fail.update')
            ]);
    }
}
