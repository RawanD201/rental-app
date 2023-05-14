<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'username' => [
                'required', 'min:3', 'string', 'max:15',
                'regex:/^[a-zA-Z0-9]{3,15}+$/'
            ],
            'password' => ['required', 'string'],
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
            'username' => "بەکارهێنەر",
            'password' => "ووشەی نهێنی",
        ];
    }
    public function authenticate()
    {

        $this->ensureIsNotRateLimited();
        $user = $this->getModel();

        if (!Auth::attempt($this->only('username', 'password'), $this->boolean('remember')))
            $this->fail();

        RateLimiter::clear($this->throttleKey());
        return $user->username;
    }

    /**
     * @return \App\Models\User $user
     */
    function getModel()
    {
        $user = \App\Models\User::firstWhere('username', $this->safe()->username);
        if (!$user)
            throw ValidationException::withMessages([
                'username' => __('auth.failed'),
            ]);

        return $user;
    }
    function fail()
    {
        RateLimiter::hit($this->throttleKey());
        throw ValidationException::withMessages([
            'username' => __('auth.password'),
        ]);
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited()
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 10)) return;

        event(new Lockout($this));
        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'username' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }
    /**
     * Get the rate limiting throttle key for the request.
     *
     * @return string
     */
    public function throttleKey()
    {
        return Str::lower($this->input('username')) . '|' . $this->ip();
    }
}
