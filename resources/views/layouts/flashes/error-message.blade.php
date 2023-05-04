<div
    class="flash-message show-message p-4 bg-cRed-100 text-white text-lg flex flex-col justify-center gap-2 rounded-lg w-2/4 text-center font-semibold capitalize absolute bottom-[94%] ">
    {{-- top-[-6%] --}}
    <span>
        {{ $message }}
    </span>
</div>
@include('layouts.flashes.script-flash')
