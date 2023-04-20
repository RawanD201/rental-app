@extends('layouts.body-main', ['title' => __('titles.car.index')])

@section('body-main')

    <div class="body-main py-12 flex flex-col gap-2 min-w-[1280px]">
        @include('layouts.flashes.index-message')

        <div class="index-header w-full">
            <div class="name-container w-[7%] w-[7%]">
                <span>{{ __('index.admin.table.id') }}</span>
            </div>
            <div class="name-container w-[7%]">
                <span>{{ __('index.admin.table.car') }}</span>
            </div>
            <div class="name-container w-[7%]">
                <span>{{ __('index.admin.table.model') }}</span>
            </div>
            <div class="name-container w-[7%]">
                <span>{{ __('index.admin.table.color') }}</span>
            </div>
            <div class="name-container w-[7%]">
                <span>{{ __('index.admin.table.america_price') }}</span>
            </div>
            <div class="name-container w-[7%]">
                <span>{{ __('index.admin.table.dubai_transfer') }}</span>
            </div>
            <div class="name-container w-[7%]">
                <span>{{ __('index.admin.table.repair') }}</span>
            </div>
            <div class="name-container w-[7%]">
                <span>{{ __('index.admin.table.gumrk') }}</span>
            </div>
            <div class="name-container w-[7%]">
                <span>{{ __('index.admin.table.total') }}</span>
            </div>
            <div class="name-container w-[7%]">
                <span>{{ __('index.admin.table.sell') }}</span>
            </div>
            <div class="name-container w-[7%]">
                <span>{{ __('index.admin.table.expense_date') }}</span>
            </div>
            <div class="name-container w-[7%]">
                <span>{{ __('index.admin.table.created_at') }}</span>
            </div>
            <div class="action-container">
                <span>{{ __('index.admin.table.actions') }}</span>
            </div>
            <div class="create-container">
                <a href="{{ route('car.create') }}">
                    <div class="icon">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <div class="text">
                        <span>{{ __('index.admin.actions.create') }}</span>
                    </div>
                </a>
            </div>
        </div>
        @forelse ($cars as $car)
            @if ($car->username === auth()->user()->username)
                <div class="index-content !bg-cBlue-100/20">
                @else
                    <div class="index-content w-full">
            @endif
            <div class="name-container w-[7%]">
                <span>{{ $car->id }}</span>
            </div>
            <div class="name-container w-[7%]">
                <span>{{ $car->car }}</span>
            </div>
            <div class="name-container w-[7%]">
                <span>{{ $car->model }}</span>
            </div>
            <div class="name-container w-[7%]">
                <span>{{ $car->color }}</span>
            </div>
            <div class="name-container w-[7%]">
                <span>{{ number_format((float) $car->america_price, 0) }}</span>
            </div>
            <div class="name-container w-[7%]">
                <span>{{ number_format((float) $car->dubai_transfer, 0) }}</span>
            </div>
            <div class="name-container w-[7%]">
                <span>{{ number_format((float) $car->repair_price, 0) }}</span>
            </div>
            <div class="name-container w-[7%]">
                <span>{{ number_format((float) $car->gumrk_price, 0) }}</span>
            </div>
            <div class="name-container w-[7%]">
                <span>{{ number_format((float) $car->total_price, 0) }}</span>
            </div>
            <div class="name-container w-[7%]">
                <span>{{ number_format((float) $car->sell_price, 0) }}</span>
            </div>
            <div class="name-container w-[7%]">
                <span>{{ $car->date }}</span>
            </div>
            <div class="name-container w-[7%]">
                <span>{{ $car->created_at }}</span>
            </div>

            <div class="action-container w-[10%]">
                <form action="{{ route('car.edit', ['car' => $car->id]) }}" method="post">
                    @method('get')
                    @csrf
                    <button type="submit" class="edit" title="{{ __('index.admin.actions.edit') }}">
                        <i class="fas fa-pencil"></i>
                    </button>
                </form>
                <form action="{{ route('car.destroy', ['car' => $car->id]) }}" method="post">
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
        <span>{{ __('content.no_cars') }}</span>
    </div>
    @endforelse
    <div style="direction: ltr;">
        {{ $cars->links() }}
    </div>

    </div>

@endsection


@section('footerClass', 'min-w-[1280px]')
