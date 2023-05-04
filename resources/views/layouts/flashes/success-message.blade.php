<div
    class="flash-message show-message p-4 bg-cGreen-300 text-white text-lg flex flex-col justify-center gap-2 rounded-lg w-2/4 text-center font-semibold capitalize absolute bottom-[98%] z-[99999]">
    {{-- top-[-6%] --}}
    <span>
        {{ $message }}
    </span>
</div>
@include('layouts.flashes.script-flash')
