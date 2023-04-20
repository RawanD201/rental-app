@extends('layouts.template')

@section('body')
    <div class="body-container overflow-hidden flex flex-col justify-center items-center break-word ml-0 !animate-none">
        <h1 class="text-3xl font-bold uppercase">{{ __('errors.fzt.title') }}</h1>
        <h3 class="mt-3 text-lg">{{ __('errors.fzt.description') }}</h3>

        <div class="socials mt-6">
            <span class="capitalize font-semibold">{{ __('errors.socials') }}</span>
            <ul class="social-list gap-2 mt-4 text-lg flex justify-center items-center">
                <li class="group social-button">
                    <a href="{{ config('info.social_fb') }}" rel="noopener" aria-label="facebook" class="social-link">
                        <i class="fab fa-facebook text-cGray-400 group-hover:text-cGold-200 z-10 text-4xl"></i>
                    </a>
                </li>

                <li class="group social-button">
                    <a href="{{ config('info.social_ig') }}" rel="noopener" aria-label="instagram" class="social-link">
                        <i class="fab fa-instagram text-cGray-400 group-hover:text-cGold-200 z-10 text-4xl"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endsection
