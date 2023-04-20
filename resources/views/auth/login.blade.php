@extends('layouts.template')

@section('title', 'Admin - Login')

@section('body')
    <div class="body-container flex justify-center items-center gap-12 w-full h-full !m-0 !overflow-hidden">
        <div class="login-container flex flex-col justify-stretch items-center w-full lg:w-[350px]">
            <form class="login-form body-content w-4/5 lg:w-full" action="{{ route('login') }}" method="post">
                <div class="form-header block justify-center items-center mb-6">
                    <a href="{{ route('login') }}" class=" justify-center items-center">
                        <img src="{{ asset('img/logo.png') }}" style="width:80px;height:75px;margin-inline: auto;"
                            alt="logo">
                    </a>
                    <span class="block text-xl text-center mt-2">
                        {{ __('index.login.title') }}
                    </span>

                </div>
                @if ($errors->any() || session()->has('failed'))
                    <div class="p-4 text-cRed-100 text-sm flex flex-col justify-center gap-2">
                        @if (session()->has('failed'))
                            <span>
                                *&nbsp;{{ session('failed') }}
                            </span>
                        @endif
                        @foreach ($errors->all() as $error)
                            <span>
                                *&nbsp;{{ $error }}
                            </span>
                        @endforeach
                    </div>
                @endif
                <div class="form-body">
                    @csrf
                    <input type="text" class="i-username input  login-input" name="username"
                        placeholder="{{ __('index.login.ph.username') }}">
                    <input type="password" placeholder="{{ __('index.login.ph.password') }}" name="password"
                        class="i-password input login-input">
                    <div class="checkbox-box flex items-center gap-3 relative">
                        <input type="checkbox" name="remember" id="remember" class="i-remember invisible">
                        <label for="remember" class="custom-checkbox select-none">
                            {{ __('index.login.remember') }}
                        </label>
                    </div>
                    <input type="submit" value="{{ __('index.login.login_btn') }}" class="i-login btn login-btn">
                </div>
            </form>

            <div class="copyright-text flex justify-center items-center mt-2">
                <span>
                    <a href="{{ config('info.creator_fb') }}" class="hover:text-cGold-100">
                        {{ __('index.admin.footer.copyright') }}
                    </a>
                </span>
            </div>
        </div>
        <div class="login-picture hidden justify-center items-center w-2/4 lg:flex">
            <img src="{{ asset('img/logo.png') }}" class="w-1/3 object-contain" alt="login image">
        </div>
    </div>
@endsection
