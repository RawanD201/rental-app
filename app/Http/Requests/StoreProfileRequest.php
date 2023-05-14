<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class StoreProfileRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:25'],
            'username' => [
                'required', 'min:3', 'string', 'max:15',
                'regex:/^[a-zA-Z0-9]{3,15}+$/'
            ],
            'password' => ['required', 'string', 'confirmed', 'max:255'],
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
            'name' => "ناو",
            'username' => "بەکارهێنەر",
            'passowrd' => "ووشەی نهێنی",
        ];
    }
    public function storeRecord()
    {
        $password = Hash::make($this->safe()->password);
        $user = User::create([
            'name' => $this->safe()->name,
            'username' => $this->safe()->username,
            'password' => $password,
        ]);

        if (!$user)
            throw ValidationException::withMessages([
                'failed' => __('index.admin.messages.user.fail.create')
            ]);
    }
}
