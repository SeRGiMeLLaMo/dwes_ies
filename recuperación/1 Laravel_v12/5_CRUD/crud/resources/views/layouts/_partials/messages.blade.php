@if ($message = Session::get('success'))
    <div class="alert success-alert">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('danger'))
    <div class="alert danger-alert">
        <strong>{{ $message }}</strong>
    </div>
@endif
