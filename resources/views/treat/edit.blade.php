@extends('layouts.body-main', ['title' => __('titles.treat.edit')])

@section('body-main')
    <div class="body-main py-12 flex justify-center items-center gap-2 w-full">

        @include('layouts.messages')

        <form action="{{ route('treat.update', ['treat' => $treat->id]) }}" method="post" class="create-form">
            @csrf
            @method('patch')
            @include('layouts.error-validation')


            <div class="create-name">
                <label class="input_label"> {{ __('index.admin.table.name') }}</label>
                <input type="text" name="car_name" class="input" value="{{ $treat->car_name }}"
                    placeholder="{{ __('index.admin.ph.name_car') }}">
            </div>

            <div class="create-name">
                <label class="input_label">{{ __('index.admin.table.number') }}</label>
                <input type="text" name="car_number" class="input" value="{{ $treat->car_number }}"
                    placeholder="{{ __('index.admin.ph.car_number') }}">
            </div>

            <div class="create-name">
                <label class="input_label">{{ __('index.admin.report.shasi_number') }}</label>
                <input type="text" name="shasi_number" class="input" value="{{ $treat->shasi_number }}"
                    placeholder="{{ __('index.admin.ph.shasi_number') }}">
            </div>
            <div class="create-name">
                <label class="input_label">{{ __('index.admin.table.color') }}</label>
                <input type="text" name="color" class="input" value="{{ $treat->color }}"
                    placeholder="{{ __('index.admin.ph.color') }}">
            </div>
            <div class="create-name">
                <label class="input_label">{{ __('index.admin.table.model') }}</label>
                <input type="text" name="model" class="input" value="{{ $treat->model }}"
                    placeholder="{{ __('index.admin.ph.model') }}">
            </div>
            <div class="create-name">
                <label class="input_label">{{ __('index.admin.table.border') }}</label>
                <input type="text" name="border" class="input" value="{{ $treat->border }}"
                    placeholder="{{ __('index.admin.ph.border') }}">
            </div>
            <div class="create-name">
                <label class="input_label">{{ __('index.admin.table.transport') }}</label>
                <input type="text" name="transport_price" class="input" value="{{ $treat->transport_price }}"
                    placeholder="{{ __('index.admin.ph.transport_price') }}">
            </div>
            <div class="create-name">
                <label class="input_label">{{ __('index.admin.table.coc') }}</label>
                <input type="text" name="coc_price" class="input" value="{{ $treat->coc_price }}"
                    placeholder="{{ __('index.admin.ph.coc_price') }}">
            </div>
            <div class="create-name">
                <label class="input_label">{{ __('index.admin.report.custom') }}</label>
                <input type="text" name="custom_price" class="input" value="{{ $treat->custom_price }}"
                    placeholder="{{ __('index.admin.ph.custom_price') }}">
            </div>
            <div class="create-name">
                <label class="input_label">{{ __('index.admin.report.balance') }}</label>
                <input type="text" name="balance_price" class="input" value="{{ $treat->balance_price }}"
                    placeholder="{{ __('index.admin.ph.balance_price') }}">
            </div>
            <div class="create-name">
                <label class="input_label">{{ __('index.admin.report.recive') }}</label>
                <input type="text" name="recive_price" class="input" value="{{ $treat->recive_price }}"
                    placeholder="{{ __('index.admin.ph.recive_price') }}">
            </div>
            <div class="create-name">
                <label class="input_label">{{ __('index.admin.table.in_sh') }}</label>
                <input type="text" name="in_sh" class="input" value="{{ $treat->in_sh }}"
                    placeholder="{{ __('index.admin.ph.in_sh') }}">
            </div>
            <div class="create-name">
                <label class="input_label">{{ __('index.admin.table.inv_agr') }}</label>
                <input type="text" name="inv_agr" class="input" value="{{ $treat->inv_agr }}"
                    placeholder="{{ __('index.admin.ph.inv_agr') }}">
            </div>

            <div class="create-submit">
                <input type="submit" name="submit" value="{{ __('index.admin.actions.update') }}" class="btn">
            </div>
        </form>
    </div>
@endsection

@section('footerClass', 'min-w-[350px]')
