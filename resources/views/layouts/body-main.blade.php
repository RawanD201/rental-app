@extends('layouts.template')
@php
    $title = $title ?? '';
    $username = $username ?? 'Admin';
@endphp
@section('title', 'AP Soft - ' . $title)

@section('nav')
    @include('layouts.navbar')
@endsection

@section('body')

    <div class="body-container body__nav--open  @yield('body-container-class')">

        @include('layouts.body-header', ['title' => $title, 'username' => $username])

        @yield('body-main')

        {{-- @include('layouts.body-footer') --}}
    </div>

@endsection

@section('script')
    @yield('script')
@endsection
