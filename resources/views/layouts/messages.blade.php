@if (session()->has('success'))
    @include('layouts.flashes.success-message', [
        'message' => session('success'),
    ])
@endif
@if ($errors->has('failed'))
    @include('layouts.flashes.error-message', [
        'message' => $errors->first('failed'),
    ])
@endif
