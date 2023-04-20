@extends('layouts.body-main', ['title' => __('titles.profile.create')])

@section('body-main')
    <div class="body-main py-12 flex justify-center items-center gap-2 w-full">

        @include('layouts.messages')
        <form action="{{ route('profile.store') }}" method="post" class="create-form">
            @csrf
            @include('layouts.error-validation')

            <div class="create-name">
                <input type="text" name="name" class="input" value="{{ old('name') }}"
                    placeholder="{{ __('index.admin.ph.name') }}">
            </div>
            <div class="create-username">
                <input type="text" name="username" class="input" value="{{ old('username') }}"
                    placeholder="{{ __('index.admin.ph.username') }}">
            </div>
            <div class="create-password">
                <input type="password" name="password" class="input" placeholder="{{ __('index.login.ph.password') }}">
            </div>
            <div class="create-repeat-password">
                <input type="password" name="password_confirmation" class="input"
                    placeholder="{{ __('index.admin.ph.repeat_password') }}">
            </div>
            <div class="create-submit">
                <input type="submit" name="submit" value="{{ __('index.admin.actions.create') }}" class="btn">
            </div>
        </form>
    </div>
@endsection

@section('footerClass', 'min-w-[350px]')
