@extends('layouts.body-main', ['title' => __('titles.merchant.edit')])

@section('body-main')
    <div class="body-main py-12 flex justify-center items-center gap-2 w-full">

        @include('layouts.messages')

        <form action="{{ route('merchant.update', ['merchant' => $merchant->id]) }}" method="post" class="create-form"
            style="direction:ltr !important;">
            @csrf
            @method('patch')
            @include('layouts.error-validation')

            <div class="create-name">
                <input type="text" name="name" class="input" value="{{ $merchant->name }}"
                    placeholder="{{ __('index.admin.ph.name') }}">
            </div>
            <div class="create-username">
                <input type="text" name="phone" class="input" value="{{ $merchant->phone }}"
                    placeholder="{{ __('index.admin.ph.phone') }}">
            </div>
            <div class="create-password">
                <input type="text" name="location" class="input" value="{{ $merchant->location }}"
                    placeholder="{{ __('index.admin.ph.location') }}">
            </div>

            <div class="create-submit">
                <input type="submit" name="submit" value="{{ __('index.admin.actions.update') }}" class="btn">
            </div>
        </form>
    </div>
@endsection

@section('footerClass', 'min-w-[350px]')
