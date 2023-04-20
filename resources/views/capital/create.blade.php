@extends('layouts.body-main', ['title' => __('titles.capital.create')])

@section('body-main')
    @include('layouts.error-validation')
    <div class="body-main py-12 flex justify-center items-center gap-2 w-full">

        @include('layouts.messages')
        <form action="{{ route('capital.store') }}" method="post" class="flex align-middle justify-center items-center gap-3">
            @csrf

            <div class="create-name">
                <input list="browsers" type="number" name="capital_money" class="input" value="{{ old('capital_money') }}"
                    placeholder="دەستمایە">
            </div>
            <div class="create-name">
                <input type="text" name="note" class="input" value="{{ old('note') }}"
                    placeholder="{{ __('index.admin.table.note') }}">
            </div>
            <div class="create-name">
                <input type="date" name="date" class="input" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
            </div>

            <div class="create-submit !mt-0 rounded-sm">
                <input type="submit" name="submit" value="{{ __('index.admin.actions.create') }}" class="btn rounded-sm">
            </div>
        </form>
        <div x-cloak x-show="open" class="body-main py-12 flex flex-col gap-2 min-w-[1280px]">

            <div class="index-header w-[100%]">
                <div class="name-container w-1/5">
                    <span>{{ __('index.admin.table.capital') }}</span>
                </div>
                <div class="name-container w-1/5">
                    <span>{{ __('index.admin.table.note') }}</span>
                </div>
                <div class="name-container w-1/5">
                    <span>{{ __('index.admin.table.expense_date') }}</span>
                </div>
                <div class="name-container w-1/5">
                    <span>{{ __('index.admin.table.created_at') }}</span>
                </div>
                <div class="action-container w-1/5">
                    <span>{{ __('index.admin.table.actions') }}</span>
                </div>

            </div>
            @forelse ($capitals as $capital)
                @if ($capital->username === auth()->user()->username)
                    <div class="index-content !bg-cBlue-100/20">
                    @else
                        <div class="index-content w-full" x-data="{ view: true, input: '{{ $capital->capital_money }}', text: '{{ $capital->note }}', date: '{{ $capital->date }}' }">
                @endif
                <div class="name-container w-1/5">
                    <div>
                        <span x-text="input" x-show="view">
                        </span>
                        <div x-cloak x-show="!view">
                            <input name="capital_money" type="number" x-model="input"
                                class="border-2 text-center rounded py-2 border-cGold-200" />
                        </div>
                    </div>
                </div>
                <div class="name-container w-1/5">
                    <div>
                        <span x-text="text" x-show="view">
                        </span>
                        <div x-cloak x-show="!view">
                            <input name="capital_money" type="text" x-model="text"
                                class="border-2 text-center rounded py-2 border-cGold-200" />
                        </div>
                    </div>
                </div>
                <div class="name-container w-1/5">
                    <div>
                        <span x-text="date" x-show="view">
                        </span>
                        <div x-cloak x-show="!view">
                            <input name="date" type="date" x-model="date"
                                value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                class="border-2 text-center rounded py-2 border-cGold-200" />
                        </div>
                    </div>
                </div>


                <div class="name-container w-1/5">
                    <span>{{ $capital->created_at }}</span>
                </div>
                <div class="action-container w-1/5">
                    <span x-cloak x-show="view" @click="view = !view">
                        <button type="submit" class="edit" title="{{ __('index.admin.actions.edit') }}">
                            <i class="fas fa-pencil"></i>
                        </button>
                    </span>

                    <form x-cloak x-show="!view" @click="view = view"
                        action="{{ route('capital.update', ['capital' => $capital->id]) }}" method="post">
                        @method('patch')
                        @csrf
                        <input type="hidden" x-model="input" name="capital_money">
                        <input type="hidden" x-model="text" name="note">
                        <input type="hidden" x-model="date" name="date">
                        <button type="submit" class="edit" title="{{ __('index.admin.actions.update') }}">
                            <i class="fas fa-check"></i>
                        </button>
                    </form>


                    <form x-cloak x-show="view" action="{{ route('capital.destroy', ['capital' => $capital->id]) }}"
                        method="post">
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
            <span>{{ __('content.no_capitals') }}</span>
        </div>
        @endforelse

        <div style="direction: ltr;">
            {{ $capitals->links() }}
        </div>

    </div>



    </div>
@endsection

@section('footerClass', 'min-w-[350px]')
