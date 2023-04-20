@extends('layouts.body-main', ['title' => __('titles.expeneseType.index')])

@section('body-main')

    <div class="body-main py-12 flex flex-col gap-2 min-w-[1280px]">
        @include('layouts.flashes.index-message')

        <div class="index-header w-[100%]">
            <div class="name-container w-[11.11%]">
                <span>{{ __('index.admin.table.id') }}</span>
            </div>
            <div class="name-container w-[11.11%]">
                <span>{{ __('index.admin.table.name') }}</span>
            </div>

            <div class="name-container w-[11.11%]">
                <span>{{ __('index.admin.table.created_at') }}</span>
            </div>
            <div class="action-container">
                <span>{{ __('index.admin.table.actions') }}</span>
            </div>
            <div class="create-container">
                <a href="{{ route('expenseType.create') }}">
                    <div class="icon">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <div class="text">
                        <span>{{ __('index.admin.actions.create') }}</span>
                    </div>
                </a>
            </div>
        </div>
        @forelse ($expense_types as $expense_type)
            @if ($expense_type->username === auth()->user()->username)
                <div class="index-content !bg-cBlue-100/20">
                @else
                    <div class="index-content">
            @endif
            <div class="name-container w-[11.11%]">
                <span>{{ $expense_type->id }}</span>
            </div>
            <div class="name-container w-[11.11%]">
                <span>{{ $expense_type->name }}</span>
            </div>
            <div class="name-container w-[11.11%]">
                <span>{{ $expense_type->created_at }}</span>
            </div>

            <div class="action-container">
                <form action="{{ route('expenseType.destroy', ['expenseType' => $expense_type->id]) }}" method="post">
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
        <span>{{ __('content.no_expenseType') }}</span>
    </div>
    @endforelse

    </div>

@endsection


@section('footerClass', 'min-w-[1280px]')
