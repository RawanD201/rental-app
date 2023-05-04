@extends('layouts.body-main', ['title' => __('titles.dashboard')])

@section('body-main')
    <div class="body-main py-1 flex flex-col justify-center items-center gap-4">

        @include('layouts.messages')

        <div class="page-rows page-row-1">
            <div class="!bg-teal-700 page-card">
                <a>
                    <span class="icon fa-stack fa-4x">
                        <i class="fas fa-money-check-alt fa-stack-1x fa-inverse"></i>
                    </span>
                    <span>
                        {{ __('index.admin.dashboard.amount') }}
                    </span>
                    <span>
                        ${{ number_format((float) $amount, 0) }}
                    </span>
                </a>
            </div>
            <div class="!bg-emerald-500 page-card">
                <a>
                    <span class="icon fa-stack fa-4x">
                        <i class="fas fa-hand-holding-usd fa-stack-1x fa-inverse"></i>
                    </span>
                    <span>
                        {{ __('index.admin.dashboard.recive') }}
                    </span>
                    <span>
                        ${{ number_format((float) $recive, 0) }}
                    </span>
                </a>
            </div>
            <div class="!bg-cyan-600 page-card">
                <a>
                    <span class="icon fa-stack fa-4x">
                        <i class="fas fa-signal fa-stack-1x fa-inverse"></i>
                    </span>
                    <span>
                        {{ __('index.admin.dashboard.total') }}
                    </span>
                    <span>
                        ${{ number_format((float) $total, 0) }}
                    </span>
                </a>
            </div>
        </div>



    </div>
@endsection

{{-- @section('footerClass', 'min-w-[350px]') --}}
