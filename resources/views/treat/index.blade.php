@extends('layouts.body-main', ['title' => __('titles.treat.index')])



@section('body-main')

    <form action="{{ route('treat.index') }}" class="flex flex-col lg:flex-row items-end gap-3 justify-between w-full">

        <div class=" w-full flex flex-col lg:flex-row items-end gap-3">
            <div class="create-name flex flex-col lg:flex-row">
                <label for="select-15" class="w-1/5">ناوی بازرگان</label>
                <select id="select-15" name="search" class="input w-10/12 select2">
                    <option></option>
                    @foreach ($merchants as $merchant)
                        <option value="{{ $merchant->id }}" @selected($merchant->id == request()->query('search'))>{{ $merchant->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="w-full flex gap-2">
                <input type="submit" value="{{ __('index.admin.actions.search') }}" class="btn">
                <a href="{{ url()->current() }}" class="btn">{{ __('index.admin.actions.clean') }}</a>
            </div>
        </div>


        <div class="flex gap-2 flex-wrap lg:flex-nowrap">
            <div
                class="w-44 text-cGreen-300 bg-white gap-2 text-base font-bold cursor-pointer transition-all border border-cGray-400 border-opacity-10 duration-200 ease-out rounded-full shadow-md flex hove:bg-white hover:text-cGray-400">
                <a class="w-full flex items-center justify-center p-2 gap-2"
                    href="{{ route('treat.create', ['treat' => request()->query('search', null)]) }}">
                    <div class="icon">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <div class="text">
                        <span>{{ __('index.admin.actions.create') }}</span>
                    </div>
                </a>
            </div>
            <div
                class="w-44 text-yellow-500 bg-white gap-2 text-base font-bold cursor-pointer transition-all border border-cGray-400 border-opacity-10 duration-200 ease-out rounded-full shadow-md flex hove:bg-white hover:text-cGray-400">
                <a class="w-full flex items-center justify-center p-2 gap-2"
                    href="{{ route('treat.pdf', ['treat' => request()->query('search', null)]) }}">
                    <div class="icon">
                        <i class="fas fa-file-pdf"></i>
                    </div>
                    <div class="text">
                        <span>{{ __('index.admin.actions.pdf') }}</span>
                    </div>
                </a>
            </div>
        </div>

    </form>




    <div class="body-main p-2 flex flex-col gap-2 min-w-[1280px]">

        @include('layouts.flashes.index-message')


        <div class="flex flex-col-reverse">
            <table class="table w-full">
                <thead class="bg-cGold-200 text-white text-sm">
                    <tr>
                        <th class="px-4 py-2">{{ __('index.admin.table.id') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.merchant') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.car') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.number') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.shasi_number') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.color') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.model') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.border') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.transport') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.coc') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.gumrk') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.rasid') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.total') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.amount_price') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.in_sh') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.inv_agr') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.created_at') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.actions') }}</th>
                    </tr>
                </thead>
                @forelse ($treats as $treat)
                    <tbody class="text-sm">
                        <tr>
                            <td class=" px-4 py-2 text-center">{{ $loop->iteration }}</td>
                            <td class=" px-4 py-2 text-center">{{ $treat->merchant->name }}</td>
                            <td class=" px-4 py-2 text-center">{{ $treat->car_name }}</td>
                            <td class=" px-3 py-1 text-center">{{ $treat->car_number }}</td>
                            <td class=" px-4 py-2 text-center">{{ $treat->shasi_number }}</td>
                            <td class=" px-4 py-2 text-center">{{ $treat->color }}</td>
                            <td class=" px-4 py-2 text-center">{{ $treat->model }}</td>
                            <td class=" px-4 py-2 text-center">{{ $treat->border }}</td>
                            <td class=" px-4 py-2 text-center">${{ number_format($treat->transport_price, 0) }}</td>
                            <td class=" px-4 py-2 text-center">${{ number_format($treat->coc_price, 0) }}</td>
                            <td class=" px-4 py-2 text-center">${{ number_format($treat->custom_price, 0) }}</td>
                            <td class=" px-4 py-2 text-center">${{ number_format($treat->balance_price, 0) }}</td>
                            <td class=" px-4 py-2 text-center">${{ number_format($treat->total_price, 0) }}</td>
                            <td class=" px-4 py-2 text-center">${{ number_format($treat->amount_price, 0) }}</td>
                            <td class=" px-4 py-2 text-center">{{ $treat->in_sh }}</td>
                            <td class=" px-4 py-2 text-center">{{ $treat->inv_agr }}</td>
                            <td class=" px-4 py-2 text-center">{{ $treat->created_at }}</td>
                            <td class="px-1 py-2 text-center flex gap-2 ">
                                <form class="create-container px-3 py-2 text-cBlue-300"
                                    action="{{ route('treat.edit', ['treat' => $treat->id]) }}" method="post">
                                    @method('get')
                                    @csrf
                                    <button type="submit" class="edit" title="{{ __('index.admin.actions.edit') }}">
                                        <i class="fas fa-pencil"></i>
                                    </button>
                                </form>
                                <form class="create-container px-3 py-2 text-cRed-100 "
                                    action="{{ route('treat.destroy', ['treat' => $treat->id]) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="delete" title="{{ __('index.admin.actions.delete') }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @empty
                    <div class="no-content p-4 ">
                        <span class="">{{ __('content.no_treats') }}</span>
                    </div>
            </table>
            @endforelse
        </div>


        {{ $treats->withQueryString() }}
    </div>
    <script>
        $('.select2').select2({

        });
    </script>
@endsection





@section('footerClass', 'min-w-[1280px]')
