@extends('layouts.body-main', ['title' => __('titles.expene.edit')])

@section('body-main')
    <div class="body-main py-12 flex justify-center items-center gap-2 w-full">

        @include('layouts.messages')
        <form action="{{ route('expense.update', ['expense' => $expense->id]) }}" method="post" class="create-form"
            enctype="multipart/form-data">
            @csrf
            @method('post')
            @include('layouts.error-validation')


            <div class="create-name">
                {{-- <span class="w-full text-white">ناو</span> --}}
                <input type="text" class="input" name="name" class="input" placeholder="ناو"
                    value="{{ $expense->name }}">
            </div>

            <div class="create-name flex gap-2 w-full">
                <select list="browsers" name="expense_id" class="!w-3/4 input" value="{{ old('expense_id') }}"
                    placeholder="جۆری خەرجی">
                    <option disabled>جۆری خەرجی</option>
                    @foreach ($expense_types as $expense_type)
                        <option value="{{ $expense_type->id }}">{{ $expense_type->name }}</option>
                    @endforeach
                </select>

                <a class="bg-cGold-300 btn !w-1/4 justify-center" href="{{ route('expenseType.create') }}">
                    <i class="fas fa-plus text-2xl cursor-pointer"></i>
                </a>
            </div>



            <div class="create-name">
                {{-- <span class="w-full text-white">ڕوونکردنەوە</span> --}}
                <input name="verify" type="text" class="input" value="{{ $expense->verify }}"
                    placeholder="ڕوونکردنەوە">
            </div>

            <div class="create-name">
                {{-- <span class="w-full text-white">بڕی خەرجی</span> --}}
                <input name="expense_price" type="number" min="0" class="input"
                    value="{{ $expense->expense_price }}" placeholder="بڕی خەرجی">
            </div>

            <div class="create-name">
                {{-- <span class="w-full text-white">بەروار</span> --}}
                <input name="expense_date" type="date" value="{{ $expense->expense_date }}" class="input">
            </div>

            <div class="create-name">
                {{-- <span class="w-full text-white">تێبینی</span> --}}
                <input name="note" type="text" class="input h-20" value="{{ $expense->note }}" placeholder="تێبینی">
            </div>

            <div class="create-submit">
                <input type="submit" name="submit" value="{{ __('index.admin.actions.update') }}" class="btn">
            </div>
        </form>
    </div>
@endsection

@section('footerClass', 'min-w-[350px]')
