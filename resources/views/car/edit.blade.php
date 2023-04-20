@extends('layouts.body-main', ['title' => __('titles.car.edit')])

@section('body-main')
    <div class="body-main py-12 flex justify-center items-center gap-2 w-full">

        @include('layouts.messages')
        <form action="{{ route('car.update', ['car' => $car->id]) }}" method="post" class="create-form"
            enctype="multipart/form-data">
            @csrf
            @method('post')
            @include('layouts.error-validation')


            <div class="create-name flex flex-col gap-2">
                <span class="w-full text-cGold-100 text-right">سەیارە</span>
                <input type="text" class="input" name="car" class="input" placeholder="سەیارە"
                    value="{{ $car->car }}">
            </div>

            <div class="create-name flex flex-col gap-2">
                <span class="w-full text-cGold-100 text-right">مۆدێل</span>
                <input list="browsers" name="model" class="input" value="{{ $car->model }}" placeholder="مۆدێل">
            </div>
            <datalist id="browsers" class=" hidden">
                <option value="{{ $car->model }}"></option>
            </datalist>


            <div class="create-name flex flex-col gap-2">
                <span class="w-full text-cGold-100 text-right">ڕەنگ</span>
                <input name="color" type="text" class="input" value="{{ $car->color }}" placeholder="ڕەنگ">
            </div>

            <div class="create-name flex flex-col gap-2">
                <span class="w-full text-cGold-100 text-right">نرخی ئەمریکا</span>
                <input name="america_price" type="number" min="0" class="input" value="{{ $car->america_price }}"
                    placeholder="نرخی ئەمریکا">
            </div>

            <div class="create-name flex flex-col gap-2">
                <span class="w-full text-cGold-100 text-right">نقڵی دوبەی</span>
                <input name="dubai_transfer" type="number" min="0" value="{{ $car->dubai_transfer }}" class="input"
                    placeholder=" نقڵی دوبەی">
            </div>

            <div class="create-name flex flex-col gap-2">
                <span class="w-full text-cGold-100 text-right">نرخی چاککردنەوە</span>
                <input name="repair_price" type="number" min="0" class="input" value="{{ $car->repair_price }}"
                    placeholder="نرخی چاککردنەوە">
            </div>

            <div class="create-name flex flex-col gap-2">
                <span class="w-full text-cGold-100 text-right">گومرک</span>
                <input name="gumrk_price" type="number" min="0" class="input" value="{{ $car->gumrk_price }}"
                    placeholder="گومرک">
            </div>


            <div class="create-name flex flex-col gap-2">
                <span class="w-full text-cGold-100 text-right">فرۆشتن</span>
                <input name="sell_price" type="number" min="0" class="input" value="{{ $car->sell_price }}"
                    placeholder="فرۆشتن">
            </div>

            <div class="create-name flex flex-col gap-2">
                <span class="w-full text-cGold-100 text-right">بەروار</span>
                <input name="date" type="date" class="input" value="{{ $car->date }}">
            </div>


            <div class="create-submit">
                <input type="submit" name="submit" value="{{ __('index.admin.actions.update') }}" class="btn">
            </div>
        </form>
    </div>
@endsection

@section('footerClass', 'min-w-[350px]')
