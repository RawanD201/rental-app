@extends('layouts.template')

@section('body')
    <div class="body-container overflow-hidden flex flex-col justify-center items-center break-word ml-0 !animate-none">
        <h1 class="text-3xl font-bold uppercase">{{ __('errors.fzo.title') }}</h1>
        <h3 class="mt-3 text-lg">{{ __('errors.fzo.description') }}</h3>

        <h4 class="mt-8">
            <a href="{{ route('home') }}" class="font-semibold text-cBlue-300 capitalize hover:text-cGray-400">
                {{ __('errors.return') }}
            </a>
        </h4>
    </div>
@endsection
