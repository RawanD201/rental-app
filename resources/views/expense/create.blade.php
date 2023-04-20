@extends('layouts.body-main', ['title' => __('titles.expene.create')])

@section('body-main')
    @include('layouts.error-validation')
    <div class="body-main py-12 flex justify-center items-center gap-2 w-full">

        @include('layouts.messages')
        <form action="{{ route('expense.store') }}" method="post" class="create-form">
            @csrf


            <div class="create-name flex flex-col gap-3">
                <span class="w-full text-cGold-100 text-right">ناو</span>
                <input type="text" class="input" name="name" class="input" value="{{ old('name') }}"
                    placeholder="ناو">
            </div>

            <div class="create-name flex gap-2 w-full pt-4">
                {{-- <span class="w-full text-cGold-100 text-right hidden">جۆری خەرج</span> --}}
                <select list="browsers" name="expense_id" class="!w-3/4 input" value="{{ old('expense_id') }}"
                    placeholder="جۆری خەرجی">
                    <option>جۆری خەرجی</option>
                    @foreach ($expense_types as $expense_type)
                        <option value="{{ $expense_type->id }}">{{ $expense_type->name }}</option>
                    @endforeach
                </select>

                <a class="bg-cGold-300 btn !w-1/4 justify-center flex" href="{{ route('expenseType.create') }}">
                    <i class="fas fa-plus text-2xl cursor-pointer"></i>
                </a>
            </div>


            <div class="create-name flex flex-col gap-3">
                <span class="w-full text-cGold-100 text-right">ڕوونکردنەوە</span>
                <input name="verify" type="text" class="input" value="{{ old('verify') }}" placeholder="ڕوونکردنەوە">
            </div>

            <div class="create-name flex flex-col gap-3">
                <span class="w-full text-cGold-100 text-right">بڕی خەرجی</span>
                <input name="expense_price" type="number" min="0" class="input" value="{{ old('expense_price') }}"
                    placeholder="بڕی خەرجی">
            </div>

            <div class="create-name flex flex-col gap-3">
                <span class="w-full text-cGold-100 text-right">بەروار</span>
                <input name="expense_date" type="date" class="input"
                    value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
            </div>

            <div class="create-name flex flex-col gap-3">
                <span class="w-full text-cGold-100 text-right">تێبینی</span>
                <input name="note" type="text" class="input h-20" value="{{ old('note') }}" placeholder="تێبینی">
            </div>

            <div class="create-submit">
                <input type="submit" name="submit" value="{{ __('index.admin.actions.create') }}" class="btn">
            </div>
        </form>
    </div>
@endsection

@section('footerClass', 'min-w-[350px]')
