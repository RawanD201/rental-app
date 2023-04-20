<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class StoreCarRequest extends FormRequest
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
            'car' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
            'color' => ['required', 'string', 'max:255'],
            'america_price' => ['numeric', 'required', 'min:0', 'max:999999999999999'],
            'dubai_transfer' => ['numeric', 'required', 'min:0', 'max:999999999999999'],
            'repair_price' => ['numeric', 'required', 'min:0', 'max:999999999999999'],
            'gumrk_price' => ['numeric', 'required', 'min:0', 'max:999999999999999'],
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
        $cars = $this->user()->cars()->create([
            'car' => $this->safe()->car,
            'model' => $this->safe()->model,
            'color' => $this->safe()->color,
            'america_price' => $this->safe()->america_price,
            'dubai_transfer' => $this->safe()->dubai_transfer,
            'repair_price' => $this->safe()->repair_price,
            'gumrk_price' => $this->safe()->gumrk_price,
            'total_price' => $this->america_price + $this->dubai_transfer + $this->repair_price + $this->gumrk_price,
            'sell_price' => $this->sell_price ?? 0,
            'date' => $this->date,
            'eBy' => $this->user()->name,
            'uBy' => $this->user()->name,

        ]);

        if (!$cars)
            throw ValidationException::withMessages([
                'failed' => __('index.admin.messages.car.fail.create')
            ]);
    }
}
