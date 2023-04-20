<div class="w-full flex justify-center items-center">
    @if (session()->has('success'))
        <div
            class="flash-message show-message p-4 bg-cGreen-300 text-white text-lg flex flex-col justify-center gap-2 rounded-lg w-2/4 text-center font-semibold capitalize absolute  left-[25%] bottom-[98%]">
            {{-- top-[-15%] --}}
            <span>
                {{ session('success') }}
            </span>
        </div>
    @endif
    @if ($errors->has('failed'))
        <div
            class="flash-message show-message p-4 bg-cRed-100 text-white text-lg flex flex-col justify-center gap-2 rounded-lg w-2/4 text-center font-semibold capitalize absolute left-[25%] bottom-[90%]">
            {{-- top-[-5%] --}}
            <span>
                {{ $errors->first('failed') }}
            </span>
        </div>
    @endif
    @include('layouts.flashes.script-flash')

</div>
