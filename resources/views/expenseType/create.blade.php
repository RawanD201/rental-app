@extends('layouts.body-main', ['title' => __('titles.expeneseType.create')])

@section('body-main')
    @include('layouts.error-validation')
    <div class="body-main py-12 flex justify-center items-center gap-2 w-full">

        @include('layouts.messages')
        <form action="{{ route('expenseType.store') }}" method="post"
            class="flex align-middle justify-center items-center gap-3">
            @csrf

            <div class="create-name">
                <input list="browsers" name="name" class="input" value="{{ old('name') }}" placeholder="جۆری خەرجی">
            </div>

            <div class="create-submit !mt-0 rounded-sm">
                <input type="submit" name="submit" value="{{ __('index.admin.actions.create') }}" class="btn rounded-sm">
            </div>
        </form>
        <div x-cloak x-show="open" class="body-main py-12 flex flex-col gap-2 min-w-[1280px]">

            <div class="index-header w-[100%]">
                <div class="name-container w-1/4">
                    <span>{{ __('index.admin.table.id') }}</span>
                </div>
                <div class="name-container w-1/4">
                    <span>{{ __('index.admin.table.name') }}</span>
                </div>

                <div class="name-container w-1/4">
                    <span>{{ __('index.admin.table.created_at') }}</span>
                </div>
                <div class="action-container w-1/4">
                    <span>{{ __('index.admin.table.actions') }}</span>
                </div>

            </div>
            @forelse ($expense_types as $expense_type)
                @if ($expense_type->username === auth()->user()->username)
                    <div class="index-content !bg-cBlue-100/20">
                    @else
                        <div class="index-content w-full" x-data="{ view: true, input: '{{ $expense_type->name }}' }">
                @endif
                <div class="name-container w-1/4">
                    <span>{{ $expense_type->id }}</span>
                </div>
                <div class="name-container w-1/4">
                    <div>
                        <span x-text="input" x-show="view">
                        </span>
                        <div x-cloak x-show="!view">
                            <input name="name" type="text" x-model="input"
                                class="border-2 text-center rounded py-2 border-cGold-200" />
                        </div>
                    </div>



                </div>
                <div class="name-container w-1/4">
                    <span>{{ $expense_type->created_at }}</span>
                </div>


                <div class="action-container w-1/4">
                    <span x-cloak x-show="view" @click="view = !view">
                        <button type="submit" class="edit" title="{{ __('index.admin.actions.edit') }}">
                            <i class="fas fa-pencil"></i>
                        </button>
                    </span>

                    <form x-cloak x-show="!view" @click="view = view"
                        action="{{ route('expenseType.update', ['expenseType' => $expense_type->id]) }}" method="post">
                        @method('patch')
                        @csrf
                        <input type="hidden" x-model="input" name="name">
                        <button type="submit" class="edit" title="{{ __('index.admin.actions.update') }}">
                            <i class="fas fa-check"></i>
                        </button>
                    </form>


                    <form x-cloak x-show="view"
                        action="{{ route('expenseType.destroy', ['expenseType' => $expense_type->id]) }}" method="post">
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
            <span>{{ __('content.No_expenseType') }}</span>
        </div>
        @endforelse

        <div style="direction: ltr;">
            {{ $expense_types->links() }}
        </div>

    </div>



    </div>
@endsection

@section('footerClass', 'min-w-[350px]')
