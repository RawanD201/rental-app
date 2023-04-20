@extends('layouts.body-main', ['title' => __('titles.profile.edit')])

@section('body-main')
    <div class="body-main py-12 flex justify-center items-center gap-2 w-full">

        @include('layouts.messages')

        <form action="{{ route('profile.update', ['user' => $user->id]) }}" method="post" class="create-form"
            style="direction:ltr !important;">
            @csrf
            @method('patch')
            @include('layouts.error-validation')

            <div class="create-name">
                <input type="text" name="name" class="input" value="{{ $user->name }}"
                    placeholder="{{ __('index.admin.ph.name') }}">
            </div>
            <div class="create-username">
                <input type="text" name="username" class="input" value="{{ $user->username }}"
                    placeholder="{{ __('index.admin.ph.username') }}">
            </div>
            <div class="create-password">
                <input type="password" name="current_password" class="input"
                    placeholder="{{ __('index.admin.ph.current_password') }}">
            </div>
            <div class="create-password">
                <input type="password" name="password" class="input" placeholder="{{ __('index.admin.ph.new_password') }}">
            </div>
            <div class="create-repeat-password">
                <input type="password" name="password_confirmation" class="input"
                    placeholder="{{ __('index.admin.ph.repeat_new_password') }}">
            </div>

            <div class="create-submit">
                <input type="submit" name="submit" value="{{ __('index.admin.actions.update') }}" class="btn">
            </div>
        </form>
    </div>
@endsection

@section('footerClass', 'min-w-[350px]')
