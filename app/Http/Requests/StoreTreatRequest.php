<?php

namespace App\Http\Requests;

use App\Models\Treat;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class StoreTreatRequest extends FormRequest
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
            'car_name' => ['required', 'string', 'max:255'],
            'car_number' => ['required', 'string', 'max:255', 'unique:treats,car_number'],
            'shasi_number' => ['required', 'string', 'unique:treats,shasi_number'],
            'color' => ['required', 'string'],
            'model' => ['required', 'integer'],
            'border' => ['required', 'string'],
            'transport_price' => ['required', 'integer'],
            'coc_price' => ['required', 'integer'],
            'custom_price' => ['required', 'integer'],
            'balance_price' => ['required', 'integer'],
            'recive_price' => ['required', 'integer'],
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
            'car_name' => "ناوی سەیارە",
            'car_number' => "ژمارەی سەیارە",
            'shasi_number' => "ژمارەی شاسی",
            'color' => "ڕەنگی سەیارە",
            'model' => "مۆدێلی سەیارە",
            'border' => "سنووری داخڵکردن",
            'transport_price' => "نرخی گواستنەوە",
            'coc_price' => "نرخی",
            'custom_price' => "نرخی گومرک",
            'balance_price' => "نرخی ڕەسید + اخراجی",
            'recive_price' => "پارەی وەرگیراو",
        ];
    }
    public function storeRecord()
    {
        $total = $this->transport_price + $this->coc_price + $this->custom_price + $this->balance_price;
        $treat = Treat::create([
            'car_name' => $this->safe()->car_name,
            'car_number' => $this->safe()->car_number,
            'merchant_id' => $this->merchant_id,
            'shasi_number' => $this->safe()->shasi_number,
            'color' => $this->safe()->color,
            'model' => $this->safe()->model,
            'border' => $this->safe()->border,
            'transport_price' => $this->safe()->transport_price,
            'coc_price' => $this->safe()->coc_price,
            'custom_price' => $this->safe()->custom_price,
            'balance_price' => $this->safe()->balance_price,
            'total_price' => $total,
            'recive_price' => $this->safe()->recive_price,
            'amount_price' =>  $total - $this->recive_price,
            'in_sh' => $this->in_sh,
            'inv_agr' => $this->inv_agr,
        ]);
        //     if ($this->recive_price < $this->total) {

        // } else {
        //     return with([
        //         'failed' => __('index.admin.messages.treat.fail.number')
        //     ]);
        // }


        if (!$treat)
            throw ValidationException::withMessages([
                'failed' => __('index.admin.messages.treat.fail.create')
            ]);
    }
}
