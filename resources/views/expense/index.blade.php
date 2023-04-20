@extends('layouts.body-main', ['title' => __('titles.expene.index')])

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
                <span>{{ __('index.admin.table.expense_type') }}</span>
            </div>
            <div class="name-container w-[11.11%]">
                <span>{{ __('index.admin.table.verify') }}</span>
            </div>
            <div class="name-container w-[11.11%]">
                <span>{{ __('index.admin.table.expense_price') }}</span>
            </div>
            <div class="name-container w-[11.11%]">
                <span>{{ __('index.admin.table.note') }}</span>
            </div>
            <div class="name-container w-[11.11%]">
                <span>{{ __('index.admin.table.expense_date') }}</span>
            </div>
            <div class="name-container w-[11.11%]">
                <span>{{ __('index.admin.table.created_at') }}</span>
            </div>
            <div class="action-container">
                <span>{{ __('index.admin.table.actions') }}</span>
            </div>
            <div class="create-container">
                <a href="{{ route('expense.create') }}">
                    <div class="icon">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <div class="text">
                        <span>{{ __('index.admin.actions.create') }}</span>
                    </div>
                </a>
            </div>
        </div>
        @forelse ($expenses as $expense)
            @if ($expense->username === auth()->user()->username)
                <div class="index-content !bg-cBlue-100/20">
                @else
                    <div class="index-content">
            @endif
            <div class="name-container w-[11.11%]">
                <span>{{ $expense->id }}</span>
            </div>
            <div class="name-container w-[11.11%]">
                <span>{{ $expense->name }}</span>
            </div>
            <div class="name-container w-[11.11%]">
                <span>{{ $expense->expenseType->name }}</span>
            </div>
            <div class="name-container w-[11.11%]">
                <span>{{ $expense->verify }}</span>
            </div>
            <div class="name-container w-[11.11%]">
                <span>{{ number_format((float) $expense->expense_price, 0) }}</span>
            </div>
            <div class="name-container w-[11.11%]">
                <span>{{ $expense->note }}</span>
            </div>
            <div class="name-container w-[11.11%]">
                <span>{{ $expense->expense_date }}</span>
            </div>
            <div class="name-container w-[11.11%]">
                <span>{{ $expense->created_at }}</span>
            </div>

            <div class="action-container">
                <form action="{{ route('expense.edit', ['expense' => $expense->id]) }}" method="post">
                    @method('get')
                    @csrf
                    <button type="submit" class="edit" title="{{ __('index.admin.actions.edit') }}">
                        <i class="fas fa-pencil"></i>
                    </button>
                </form>
                <form action="{{ route('expense.destroy', ['expense' => $expense->id]) }}" method="post">
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
        <span>{{ __('content.no_expenses') }}</span>
    </div>
    @endforelse
    <div style="direction: ltr;">
        {{ $expenses->links() }}
    </div>
    </div>

@endsection


@section('footerClass', 'min-w-[1280px]')
