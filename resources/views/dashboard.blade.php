@extends('layouts.body-main', ['title' => __('titles.dashboard')])

@section('body-main')
    <div class="body-main py-1 flex flex-col justify-center items-center gap-4">

        @include('layouts.messages')

        <div class="page-rows page-row-1">
            <div class="page-card ">
                <a href="{{ route('capital.create') }}">
                    <span class="icon fa-stack fa-4x">
                        <i class="fas fa-hand-holding-usd fa-stack-1x fa-inverse"></i>
                    </span>
                    <span>
                        {{ __('index.admin.nav.index.capitalAdded') }}
                    </span>
                    <span>
                        {{ number_format((float) $dastmaia, 0) }}
                    </span>
                </a>
            </div>
            <div class="page-card">
                <a href="{{ route('expense.index') }}">
                    <span class="icon fa-stack fa-4x">
                        <i class="fas fa-signal fa-stack-1x fa-inverse"></i>
                    </span>
                    <span>
                        {{ __('index.admin.nav.index.profit') }}
                    </span>
                    <span>
                        {{ number_format((float) $profit, 0) }}
                    </span>
                </a>
            </div>
        </div>


        <div class="page-rows page-row-1">
            <div class="page-card ">
                <a href="{{ route('car.index') }}">
                    <span class="icon fa-stack fa-4x">
                        <i class="fas fa-chart-network fa-stack-1x fa-inverse"></i>
                    </span>
                    <span>
                        {{ __('index.admin.nav.index.sell') }}
                    </span>
                    <span>
                        {{ number_format((float) $sell, 0) }}
                    </span>
                </a>
            </div>
            <div class="page-card ">
                <a href="{{ route('car.index') }}">
                    <span class="icon fa-stack fa-4x">
                        <i class="fas fa-funnel-dollar fa-stack-1x fa-inverse"></i>
                    </span>
                    <span>
                        {{ __('index.admin.nav.index.buy') }}
                    </span>
                    <span>
                        {{ number_format((float) $buy->price_sums, 0) }}
                    </span>
                </a>
            </div>
            <div class="page-card">
                <a href="{{ route('expense.index') }}">
                    <span class="icon fa-stack fa-4x">
                        <i class="fas fa-money-bill-alt fa-stack-1x fa-inverse"></i>
                    </span>
                    <span>
                        {{ __('index.admin.nav.index.maxazn') }}
                    </span>
                    <span>
                        {{ number_format((float) $maxzans, 0) }}
                    </span>
                </a>
            </div>
        </div>


        <div class="page-rows page-row-2">
            <div class="page-card page-row-2">
                <a>
                    <span class="icon fa-stack fa-4x">
                        <i class="fas fa-money-check-alt fa-stack-1x fa-inverse"></i>
                    </span>
                    <span>
                        {{ __('index.admin.nav.index.capitalNow') }}
                    </span>
                    <span>
                        {{ number_format((float) $capital, 0) }}
                    </span>
                </a>
            </div>
            <div class="page-card">
                <a>
                    <span class="icon fa-stack fa-4x">
                        <i class="fas fa-money-check-alt fa-stack-1x fa-inverse"></i>
                    </span>
                    <span>
                        {{ __('index.admin.nav.index.vault') }}
                    </span>
                    <span>
                        {{ number_format((float) $vault, 0) }}
                    </span>
                </a>
            </div>


        </div>

    </div>
@endsection

{{-- @section('footerClass', 'min-w-[350px]') --}}
