@extends('layouts.pdf-main')

@section('pdf-main')
    <div class="bg-cGold-300 text-white flex justify-between px-2 header-pdf">
        <div class="flex flex-col justify-evenly">
            <span class="text-2xl">{{ __('pdf.company.name') }}</span>
            <span>{{ __('pdf.company.description') }}</span>
        </div>
        <div>
            <img class="w-3/4
            p-4" src="{{ asset('img/logo.png') }}" alt="logo">
        </div>
    </div>

    <div class="flex items-center py-4">


        <span class="flex-shrink text-2xl text-gray-500 px-4 italic font-light">{{ __('pdf.report') }}</span>
        <div class="flex-grow h-3 bg-gray-400"></div>
    </div>



    <div class="flex justify-between pb-6">
        <div class="flex flex-col px-4 w-1/4 a">
            <div class="flex gap-2 justify-between border-b-[1px] border-cGold-200 w-full">
                <span class="c_2 w-1/2 p-1 a"> {{ __('pdf.total.transport') }}</span>
                <span class="w-1/2 p-1 a text-left">${{ number_format($total->transport_total, 0) }}</span>
            </div>
            <div class="flex gap-2 justify-between border-b-[1px] border-cGold-200 w-full">
                <span class="c_2 w-1/2 p-1 a"> {{ __('pdf.total.coc') }}</span>
                <span class="w-1/2 p-1 a text-left">${{ number_format($total->coc_total, 0) }}</span>
            </div>
            <div class="flex gap-2 justify-between border-b-[1px] border-cGold-200 w-full">
                <span class="c_2 w-1/2 p-1 a"> {{ __('pdf.total.custom') }}</span>
                <span class="w-1/2 p-1 a text-left">${{ number_format($total->balance_total, 0) }}</span>
            </div>
            <div class="flex gap-2 justify-between border-b-[1px] border-cGold-200 w-full">
                <span class="c_2 w-1/2 p-1 a"> {{ __('pdf.total.balance') }}</span>
                <span class="w-1/2 p-1 a text-left">${{ number_format($total->custom_total, 0) }}</span>
            </div>
            <div class="flex gap-2 justify-between border-b-[1px] border-cGold-200 w-full">
                <span class="c_3 w-1/2 p-1 a"> {{ __('pdf.total.all') }}</span>
                <span class="w-1/2 p-1 a text-left">${{ number_format($total->total, 0) }}</span>
            </div>
            <div class="flex gap-2 justify-between border-b-[1px] border-cGold-200 w-full">
                <span class="c_4  w-1/2 p-1 a"> {{ __('pdf.total.recive') }}</span>
                <span class="w-1/2 p-1 a text-left">${{ number_format($total->recive_total, 0) }}</span>
            </div>
            <div class="flex gap-2 justify-between border-b-[1px] border-cGold-200 w-full">
                <span class="c_4  w-1/2 p-1 a"> {{ __('pdf.total.amount') }}</span>
                <span class="w-1/2 p-1 a text-left">${{ number_format($total->amount_total, 0) }}</span>
            </div>
        </div>
    </div>




    <div class="overflow-x-auto">
        <table class="table w-full">
            <thead class="bg-cGold-200 text-white">
                <tr>
                    <th class="px-2 py-1">{{ __('index.admin.table.id') }}</th>
                    <th class="px-2 py-1">{{ __('index.admin.table.name') }}</th>
                    <th class="px-2 py-1">{{ __('index.admin.table.phone') }}</th>
                    <th class="px-2 py-1">{{ __('index.admin.table.car') }}</th>
                    <th class="px-2 py-1">{{ __('index.admin.table.number') }}</th>
                    <th class="px-2 py-1">{{ __('index.admin.table.shasi_number') }}</th>
                    <th class="px-2 py-1">{{ __('index.admin.table.color') }}</th>
                    <th class="px-2 py-1">{{ __('index.admin.table.model') }}</th>
                    <th class="px-2 py-1">{{ __('index.admin.table.border') }}</th>
                    <th class="px-2 py-1">{{ __('index.admin.table.transport') }}</th>
                    <th class="px-2 py-1">{{ __('index.admin.table.coc') }}</th>
                    <th class="px-2 py-1">{{ __('index.admin.table.gumrk') }}</th>
                    <th class="px-2 py-1">{{ __('index.admin.table.rasid') }}</th>
                    <th class="px-2 py-1">{{ __('index.admin.table.total') }}</th>
                    <th class="px-2 py-1">{{ __('index.admin.table.amount_price') }}</th>
                    <th class="px-2 py-1">{{ __('index.admin.table.in_sh') }}</th>
                    <th class="px-2 py-1">{{ __('index.admin.table.inv_agr') }}</th>
                    <th class="px-2 py-1">{{ __('index.admin.table.expense_date') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($treats as $treat)
                    <tr class="counter-container">
                        <td class=" px-3 py-2 text-center c_1">{{ $loop->iteration }}</td>
                        <td class=" px-3 py-2 text-center c_1">{{ $treat->merchant->name }}</td>
                        <td class=" px-3 py-2 text-center c_1">{{ $treat->merchant->phone }}</td>
                        <td class=" px-3 py-2 text-center c_1">{{ $treat->car_name }}</td>
                        <td class=" px-3 py-2 text-center c_1">{{ $treat->car_number }}</td>
                        <td class=" px-3 py-2 text-center c_1">{{ $treat->shasi_number }}</td>
                        <td class=" px-3 py-2 text-center c_1">{{ $treat->color }}</td>
                        <td class=" px-3 py-2 text-center c_1">{{ $treat->model }}</td>
                        <td class=" px-3 py-2 text-center c_1">{{ $treat->border }}</td>
                        <td class=" px-3 py-2 text-center c_2">${{ number_format($treat->transport_price, 0) }}</td>
                        <td class=" px-3 py-2 text-center c_2">${{ number_format($treat->coc_price, 0) }}</td>
                        <td class=" px-3 py-2 text-center c_2">${{ number_format($treat->balance_price, 0) }}</td>
                        <td class=" px-3 py-2 text-center c_2">${{ number_format($treat->custom_price, 0) }}</td>
                        <td class=" px-3 py-2 text-center c_3">${{ number_format($treat->total_price, 0) }}</td>
                        <td class=" px-3 py-2 text-center c_4">${{ number_format($treat->amount_price, 0) }}</td>
                        <td class=" px-3 py-2 text-center c_5">{{ $treat->in_sh }}</td>
                        <td class=" px-3 py-2 text-center c_5">{{ $treat->inv_agr }}</td>
                        <td class=" px-3 py-2 text-center c_5">{{ $treat->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        window.onload = function() {
            if (navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|Windows Phone)/)) {} else {
                window.print();
            }
        };
        window.addEventListener("beforeprint", function(event) {});
        window.addEventListener("afterprint", function(event) {
            window.history.back();
        });
    </script>
@endsection


{{-- @section('footerClass', 'min-w-[6.5280px]') --}}
