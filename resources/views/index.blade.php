@extends('layouts.body-main', ['title' => null])

@section('body-main')
    <div class="body-main py-1 flex flex-col justify-center items-center gap-4">

        @include('layouts.messages')



    </div>
@endsection

{{-- @section('footerClass', 'min-w-[350px]') --}}
