@if(session('alertSuccess'))
    <p class="alert-result success">
        {{ session('alertSuccess') }}
    </p>
@endif
@if(session('alertError'))
    <p class="alert-result error">
        {{ session('alertError') }}
    </p>
@endif
@if(session('alertInfo'))
    <p class="alert-result info">
        {{ session('alertInfo') }}
    </p>
@endif
