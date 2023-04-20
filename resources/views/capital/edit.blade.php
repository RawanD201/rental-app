@extends('layouts.body-main', ['title' => __('titles.capital.edit')])

@section('body-main')

    <div x-cloak x-show="open"
        class="fixed inset-x-5 top-14 lg:inset-24 xl:w-2/6 xl:inset-x-[30%] xl:h-min xl:inset-y-[10%] flex flex-col rounded bg-white gap-[10px] shadow-xl z-[9999] xl:justify-start dir1">
        <div class="text-white text-base p-1 px-2 rounded-t flex items-center justify-between bg-yellow-500">
            <span>جۆری خەرجی </span>
            <div>
                <button type="button" @click="open =  false">
                    <i class="fa-solid fa-xmark text-2xl cursor-pointer"></i></button>
            </div>
        </div>

        <form action=" {{ route('capital.store') }}" name="form" method="post">
            @csrf
            <div class="flex flex-col justify-center items-center gap-3">
                <div class="flex justify-center text-center w-3/4 md:w-1/2 dir gap-2">
                    <input class="p-2 bg-gray-200 outline-none text-center rounded w-full" placeholder="سەرمایە"
                        type="number" name="capital_money">
                    <button type="submit"
                        class="bg-gray-700 rounded duration-[300ms] px-3 flex items-center hover:shadow-2xl ease-in-out transition-all translate-y-0 hover:translate-y-[-2px]"><i
                            class="fa fa-plus text-white text-semibold "></i></button>
                </div>
            </div>
        </form>
        <!-- modal-table -->
        <div class="flex flex-col items-center 	xl:justify-items-center gap-2 p-1">
            <table class="text-center w-full dir">
                <thead class="bg-gray-900 flex text-white w-full rounded">
                    <tr class="flex w-full justify-center">
                        <th class="p-4 w-1/2">زنجیرە</th>
                        <th class="p-4 w-full">سەرمایە</th>
                        <th class="p-4 w-1/3"></th>
                    </tr>
                </thead>
                <tbody class="bg-grey-light flex flex-col items-center overflow-y-scroll w-full shadow-xl"
                    style="height: 50vh;">
                    @foreach ($expense_type as $expense_typee)
                        <tr x-data="{ view: true, input: '{{ $expense_typee->name }}' }" class="flex w-full  hover:bg-gray-200 justify-center ">
                            <td class="p-4 w-1/2"> {{ $expense_typee->id }} </td>

                            <td class="p-4 w-full"> <span x-text="input" x-show="view">
                                </span>
                                <div x-cloak x-show="!view">
                                    <input type="text" x-model="input" class="border-2 border-gray-200" />
                                </div>
                            </td>
                            <td class="p-4 w-1/3">
                                <div class="flex item-center justify-center">

                                    <form x-cloak x-show="!view"
                                        action="{{ route('expense.updateType', ['id' => $expense_typee->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('patch')
                                        <input type="hidden" x-model="input" name="name">
                                        <button type="submit">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>

                                    <div x-cloak x-show="view" @click="view = !view"
                                        class="w-5 mr-2 transform hover:text-blue-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </div>


                                    <form x-cloak x-show="view"
                                        action="{{ route('expense.deleteType', ['id' => $expense_typee->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" x-model="input" name="name">
                                        <button type="submit"><i
                                                class="fa-solid fa-trash-can w-5 mr-2 transform hover:text-rose-500 hover:scale-110"></i></button>
                                    </form>



                                </div>
                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>
        </div>
    </div>
@endsection


@section('footerClass', 'min-w-[1280px]')
