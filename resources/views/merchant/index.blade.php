@extends('layouts.body-main', ['title' => __('titles.merchant.index')])

@section('body-main')

    <div class="body-main  flex flex-col gap-2 min-w-[1280px]">
        @include('layouts.flashes.index-message')

        <div class="index-header w-full">
            <div class="name-container w-[20%]">
                <span>{{ __('index.admin.table.name') }}</span>
            </div>
            <div class="desc-container w-[20%]">
                <span>{{ __('index.admin.table.phone') }}</span>
            </div>
            <div class="desc-container w-[20%]">
                <span>{{ __('index.admin.table.title') }}</span>
            </div>
            <div class="updated-at-container w-[20%]">
                <span>{{ __('index.admin.table.updated_at') }}</span>
            </div>
            <div class="created-at-container w-[20%]">
                <span>{{ __('index.admin.table.created_at') }}</span>
            </div>

            <div class="create-container w-[20%]">
                <a href="{{ route('merchant.create') }}">
                    <div class="icon">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <div class="text">
                        <span>{{ __('index.admin.actions.create') }}</span>
                    </div>
                </a>
            </div>
        </div>
        @forelse ($merchants as $merchant)
            @if ($merchant->username === auth()->user()->username)
                <div class="index-content !bg-cBlue-100/20">
                @else
                    <div class="index-content">
            @endif
            <div class="name-container w-[20%]">
                <span>{{ $merchant->name }}</span>
            </div>
            <div class="desc-container w-[20%]">
                <span>{{ $merchant->phone }}</span>
            </div>
            <div class="desc-container w-[20%]">
                <span>{{ $merchant->location }}</span>
            </div>
            <div class="updated-at-container w-[20%]">
                <span>{{ $merchant->updated_at }}</span>
            </div>
            <div class="created-at-container w-[20%]">
                <span>{{ $merchant->created_at }}</span>
            </div>
            <div class="action-container w-[20%]">
                <form action="{{ route('merchant.edit', ['merchant' => $merchant->id]) }}" method="post">
                    @method('get')
                    @csrf
                    <button type="submit" class="edit" title="{{ __('index.admin.actions.edit') }}">
                        <i class="fas fa-pencil"></i>
                    </button>
                </form>
                <form action="{{ route('merchant.destroy', ['merchant' => $merchant->id]) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="delete" title="{{ __('index.admin.actions.delete') }}">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
    </div>
@empty
    <div class="no-content">
        <span>{{ __('content.no_content') }}</span>
    </div>
    @endforelse
    {{ $merchants->links() }}

    </div>

@endsection


@section('footerClass', 'min-w-[1280px]')
