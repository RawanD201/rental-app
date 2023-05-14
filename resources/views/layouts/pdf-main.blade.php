@extends('layouts.template')
@php
    $title = $title ?? '';
    $username = $username ?? 'Admin';
@endphp
@section('title', 'AP Soft | ' . $title)

@section('body')

    <div class="pdf-container ">
        @yield('pdf-main')
    </div>

@endsection

@section('script')
    @yield('script')
@endsection
