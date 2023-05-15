@extends('layouts.body-main', ['title' => __('titles.treat.report')])



@section('body-main')

    <form action="{{ route('treat.report') }}" class="flex items-end gap-3 justify-between">

        <div class=" w-full lg:grid lg:grid-cols-4  gap-1 flex-wrap grid-wrap flex flex-col">
            <div class="create-name w-full justify-center items-center">
                <label for="select-1"
                    class="lg:w-1/4  w-full text-center">{{ __('index.admin.report.merchant_name') }}</label>
                <select id="select-1" name="name" class="input lg:w-10/12 w-full select2">
                    <option></option>
                    @foreach ($merchantNames as $merchantName)
                        <option value="{{ $merchantName->name }}" @selected($merchantName->name == request()->query('name'))>
                            {{ $merchantName->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="create-name w-full justify-center items-center">
                <label for="select-2" class="lg:w-1/4  w-full text-center">{{ __('index.admin.report.phone') }}</label>
                <select id="select-2" name="phone" class="input lg:w-10/12 w-full select2">
                    <option></option>
                    @foreach ($merchantPhones as $merchantPhone)
                        <option value="{{ $merchantPhone->phone }}" @selected($merchantPhone->phone == request()->query('phone'))>
                            {{ $merchantPhone->phone }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="create-name w-full justify-center items-center">
                <label for="select-3" class="lg:w-1/4  w-full text-center">{{ __('index.admin.report.car_name') }}</label>
                <select id="select-3" name="car_name" class="input lg:w-10/12 w-full select2">
                    <option></option>
                    @foreach ($merchantCars as $merchantCar)
                        <option value="{{ $merchantCar }}" @selected($merchantCar == request()->query('car_name'))>
                            {{ $merchantCar }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="create-name w-full justify-center items-center">
                <label for="select-18"
                    class="lg:w-1/4  w-full text-center">{{ __('index.admin.report.car_number') }}</label>
                <select id="select-18" name="car_number" class="input lg:w-10/12 w-full select2">
                    <option></option>
                    @foreach ($merchantCarNumbers as $merchantCarNumber)
                        <option value="{{ $merchantCarNumber }}" @selected($merchantCarNumber == request()->query('car_number'))>
                            {{ $merchantCarNumber }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="create-name w-full justify-center items-center">
                <label for="select-4"
                    class="lg:w-1/4  w-full text-center">{{ __('index.admin.report.shasi_number') }}</label>
                <select id="select-4" name="shasi_number" class="input lg:w-10/12 w-full select2">
                    <option></option>
                    @foreach ($merchantShasis as $merchantShasi)
                        <option value="{{ $merchantShasi }}" @selected($merchantShasi == request()->query('shasi_number'))>
                            {{ $merchantShasi }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="create-name w-full justify-center items-center">
                <label for="select-5" class="lg:w-1/4  w-full text-center">{{ __('index.admin.report.color') }}</label>
                <select id="select-5" name="color" class="input lg:w-10/12 w-full select2">
                    <option></option>
                    @foreach ($merchantColors as $merchantColor)
                        <option value="{{ $merchantColor }}" @selected($merchantColor == request()->query('color'))>
                            {{ $merchantColor }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="create-name w-full justify-center items-center">
                <label for="select-6" class="lg:w-1/4  w-full text-center">{{ __('index.admin.report.model') }}</label>
                <select id="select-6" name="model" class="input lg:w-10/12 w-full select2">
                    <option></option>
                    @foreach ($merchantModels as $merchantModel)
                        <option value="{{ $merchantModel }}" @selected($merchantModel == request()->query('model'))>
                            {{ $merchantModel }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="create-name w-full justify-center items-center">
                <label for="select-7" class="lg:w-1/4  w-full text-center">{{ __('index.admin.report.border') }}</label>
                <select id="select-7" name="border" class="input lg:w-10/12 w-full select2">
                    <option></option>
                    @foreach ($merchantBorders as $merchantBorder)
                        <option value="{{ $merchantBorder }}" @selected($merchantBorder == request()->query('border'))>{{ $merchantBorder }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="create-name w-full justify-center items-center">
                <label for="select-8" class="lg:w-1/4  w-full text-center">{{ __('index.admin.report.transport') }}</label>
                <select id="select-8" name="transport_price" class="input lg:w-10/12 w-full select2">
                    <option></option>
                    @foreach ($merchantTransports as $merchantTransport)
                        <option value="{{ $merchantTransport }}" @selected($merchantTransport == request()->query('transport_price'))>
                            ${{ $merchantTransport }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="create-name w-full justify-center items-center">
                <label for="select-9" class="lg:w-1/4  w-full text-center">{{ __('index.admin.report.coc') }}</label>
                <select id="select-9" name="coc_price" class="input lg:w-10/12 w-full select2">
                    <option></option>
                    @foreach ($merchantCocs as $merchantCoc)
                        <option value="{{ $merchantCoc }}" @selected($merchantCoc == request()->query('coc_price'))>${{ $merchantCoc }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="create-name w-full justify-center items-center">
                <label for="select-10" class="lg:w-1/4  w-full text-center">{{ __('index.admin.report.custom') }}</label>
                <select id="select-10" name="custom_price" class="input lg:w-10/12 w-full select2">
                    <option></option>
                    @foreach ($merchantCustoms as $merchantCustom)
                        <option value="{{ $merchantCustom }}" @selected($merchantCustom == request()->query('custom_price'))>
                            ${{ $merchantCustom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="create-name w-full justify-center items-center">
                <label for="select-11" class="lg:w-1/4  w-full text-center">{{ __('index.admin.report.balance') }}</label>
                <select id="select-11" name="balance_price" class="input lg:w-10/12 w w-full select2">
                    <option></option>
                    @foreach ($merchantBalances as $merchantBalance)
                        <option value="{{ $merchantBalance }}" @selected($merchantBalance == request()->query('balance_price'))>
                            {{ $merchantBalance }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="create-name w-full justify-center items-center">
                <label for="select-12" class="lg:w-1/4  w-full text-center">{{ __('index.admin.report.total') }}</label>
                <select id="select-12" name="total_price" class="input lg:w-10/12 w w-full select2">
                    <option></option>
                    @foreach ($merchantTotals as $merchantTotal)
                        <option value="{{ $merchantTotal }}" @selected($merchantTotal == request()->query('total_price'))>
                            ${{ $merchantTotal }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="create-name w-full justify-center items-center">
                <label for="select-13" class="lg:w-1/4  w-full text-center">{{ __('index.admin.report.amount') }}</label>
                <select id="select-13" name="amount_price" class="input lg:w-10/12 w w-full select2">
                    <option></option>
                    @foreach ($merchantAmounts as $merchantAmounts)
                        <option value="{{ $merchantAmounts }}" @selected($merchantAmounts == request()->query('amount_price'))>
                            ${{ $merchantAmounts }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="create-name w-full justify-center items-center">
                <label for="select-14" class="lg:w-1/4  w-full text-center">{{ __('index.admin.report.in_sh') }}</label>
                <select id="select-14" name="in_sh" class="input lg:w-10/12 w-full select2 ">
                    <option></option>
                    @foreach ($merchantInshs as $merchantInsh)
                        <option value="{{ $merchantInsh }}" @selected($merchantInsh == request()->query('in_sh'))>{{ $merchantInsh }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="create-name w-full justify-center items-center">
                <label for="select-15"
                    class="lg:w-1/4  w-full text-center">{{ __('index.admin.report.inv_arg') }}</label>
                <select id="select-15" name="inv_arg" class="input lg:w-10/12 w-full select2">
                    <option></option>
                    @foreach ($merchantInvagrs as $merchantInvagr)
                        <option value="{{ $merchantInvagr }}" @selected($merchantInvagr == request()->query('inv_arg'))>{{ $merchantInvagr }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="create-name w-full justify-center items-center">
                <label for="select-16"
                    class="lg:w-1/4  w-full text-center">{{ __('index.admin.report.startdate') }}</label>
                <input id="select-16" type="date" name="startdate" class="input lg:w-10/12 w-full">
            </div>

            <div class="create-name w-full justify-center items-center">
                <label for="select-17"
                    class="lg:w-1/4  w-full text-center">{{ __('index.admin.report.enddate') }}</label>
                <input id="select-17" type="date" name="enddate" class="input lg:w-10/12 w-full">
            </div>

            <div class="flex gap-3 lg:justify-center col-span-2">
                <input type="submit" value="{{ __('index.admin.actions.search') }}" class="btn">
                <a href="{{ url()->current() }}"
                    class="btn flex items-center justify-center">{{ __('index.admin.actions.clean') }}</a>
                <div
                    class="w-44 flex items-center justify-center text-yellow-500 bg-white gap-2 text-base font-bold cursor-pointer transition-all border border-cGray-400 border-opacity-10 duration-200 ease-out rounded-full shadow-md hover:bg-white hover:text-cGray-400">
                    <a class=" flex items-center justify-center p-2 gap-2"
                        href="{{ route('treat.report-pdf', $nextQueryStrings) }}">
                        <div class="icon">
                            <i class="fas fa-file-pdf"></i>
                        </div>
                        <div class="text">
                            <span>{{ __('index.admin.actions.pdf') }}</span>
                        </div>
                    </a>
                </div>
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
                        <th class="px-4 py-2">{{ __('index.admin.table.phone') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.car') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.shasi_number') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.color') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.model') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.border') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.transport') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.coc') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.rasid') }}</th>
                        <th class="px-4 py-2">{{ __('index.admin.table.gumrk') }}</th>
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
                            <td class=" px-4 py-2 text-center">{{ $treat->merchant->phone }}</td>
                            <td class=" px-4 py-2 text-center">{{ $treat->car_name }}</td>
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
    <script>
        $('.select2').select2({
            // placeholder: '---ناوێک هەڵبژێرە ---',
            // allowClear: true
        });
    </script>
@endsection





@section('footerClass', 'min-w-[1280px]')
