@extends('layouts.body-main', ['title' => __('titles.archive')])
@section('body-main')

    <div class="body-main p-2 flex flex-col gap-2 min-w-[1280px]">

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
                            <td class=" px-4 py-2 text-center">${{ number_format($treat->balance_price, 0) }}</td>
                            <td class=" px-4 py-2 text-center">${{ number_format($treat->custom_price, 0) }}</td>
                            <td class=" px-4 py-2 text-center">${{ number_format($treat->total_price, 0) }}</td>
                            <td class=" px-4 py-2 text-center">${{ number_format($treat->amount_price, 0) }}</td>
                            <td class=" px-4 py-2 text-center">{{ $treat->in_sh }}</td>
                            <td class=" px-4 py-2 text-center">{{ $treat->inv_agr }}</td>
                            <td class=" px-4 py-2 text-center">{{ $treat->created_at }}</td>

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

@endsection
@section('footerClass', 'min-w-[1280px]')
