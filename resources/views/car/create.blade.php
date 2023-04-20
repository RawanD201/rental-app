@extends('layouts.body-main', ['title' => __('titles.car.create')])

@section('body-main')
    <div class="body-main py-12 flex justify-center items-center gap-2 w-full">

        @include('layouts.messages')
        <form action="{{ route('car.store') }}" method="post" class="create-form">
            @csrf
            @include('layouts.error-validation')



            <div class="create-name flex flex-col gap-3">
                <span class="w-full text-cGold-100 text-right">ئۆتۆمبێڵ</span>
                <input type="text" name="car" class="input" value="{{ old('car') }}" placeholder="ئۆتۆمبێڵ">
            </div>

            <div class="create-name flex flex-col gap-3">
                <span class="w-full text-cGold-100 text-right">مۆدێل</span>

                <input list="browsers" name="model" class="input" value="{{ old('model') }}" placeholder="مۆدێل">
                {{-- <datalist id="browsers">
                            <option value="{{ $car->model }}"></option>
                        </datalist> --}}
            </div>


            <div class="create-name flex flex-col gap-3">
                <span class="w-full text-cGold-100 text-right">ڕەنگ</span>
                <input name="color" type="text" class="input" value="{{ old('color') }}" placeholder="ڕەنگ">
            </div>

            <div class="create-name flex flex-col gap-3">
                <span class="w-full text-cGold-100 text-right">نرخی ئەمریکا</span>

                <input name="america_price" type="number" min="0" class="input" value="{{ old('america_price') }}"
                    placeholder="نرخی ئەمریکا">
            </div>

            <div class="create-name flex flex-col gap-3">
                <span class="w-full text-cGold-100 text-right">نقڵی دوبەی</span>
                <input name="dubai_transfer" type="number" min="0" class="input"
                    value="{{ old('dubai_transfer') }}" placeholder=" نقڵی دوبەی">
            </div>

            <div class="create-name flex flex-col gap-3">
                <span class="w-full text-cGold-100 text-right">نرخی چاککردنەوە</span>
                <input name="repair_price" type="number" min="0" class="input" value="{{ old('repair_price') }}"
                    placeholder="نرخی چاککردنەوە">
            </div>

            <div class="create-name flex flex-col gap-3">
                <span class="w-full text-cGold-100 text-right">گومرک</span>

                <input name="gumrk_price" type="number" min="0" class="input" value="{{ old('gumrk_price') }}"
                    placeholder="گومرک">
            </div>


            <div class="create-name flex flex-col gap-3">
                <span class="w-full text-cGold-100 text-right">فرۆشتن</span>
                <input name="sell_price" type="number" min="0" class="input" value="{{ old('sell_price') }}"
                    placeholder="فرۆشتن">
            </div>

            <div class="create-name flex flex-col gap-3">
                <span class="w-full text-cGold-100 text-right">بەروار</span>
                <input name="date" type="date" class="input" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
            </div>


            <div class="create-submit">
                <input type="submit" name="submit" value="{{ __('index.admin.actions.create') }}" class="btn">
            </div>
        </form>
    </div>
@endsection

@section('footerClass', 'min-w-[350px]')
