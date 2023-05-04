@extends('layouts.body-main', ['title' => __('titles.merchant.create')])

@section('body-main')
    <div class="body-main py-12 flex justify-center items-center gap-2 w-full">

        @include('layouts.messages')
        <form action="{{ route('merchant.store') }}" method="post" class="create-form">
            @csrf
            @include('layouts.error-validation')

            <div class="create-name">
                <input type="text" name="name" class="input" value="{{ old('name') }}"
                    placeholder="{{ __('index.admin.ph.name') }}">
            </div>
            <div class="create-username">
                <input type="text" name="phone" class="input" maxlength="11" value="{{ old('phone') }}"
                    placeholder="{{ __('index.admin.ph.phone') }}">
            </div>
            <div class="create-password">
                <input type="text" name="location" class="input" value="{{ old('location') }}"
                    placeholder="{{ __('index.admin.ph.location') }}">
            </div>
            <div class="create-submit">
                <input type="submit" name="submit" value="{{ __('index.admin.actions.create') }}" class="btn">
            </div>
        </form>
    </div>
@endsection

@section('footerClass', 'min-w-[350px]')
