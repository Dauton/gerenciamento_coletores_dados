@if(session('alertSuccess'))
    <p class="alert-result success" id="alert-result">
        {{ session('alertSuccess') }}
    </p>
@endif
@if(session('alertError'))
    <p class="alert-result error" id="alert-result">
        {{ session('alertError') }}
    </p>
@endif
@if(session('alertInfo'))
    <p class="alert-result info" id="alert-result">
        {{ session('alertInfo') }}
    </p>
@endif
