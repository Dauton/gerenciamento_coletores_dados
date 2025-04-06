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


<div class="container-alert-confirmacao">
    <div class="alert-confirmacao">
        <i class="fa-solid fa-check"></i>
        <h1>Tem certeza?</h1>
        <p>Essa ação não poderá ser desfeita</p>
        <div class="container-buttons">
            @yield('executa-confirmacao')
            <button type="button" id="btn-cancelar" class="btn-cancelar-confirmacao">Cancelar</button>
        </div>
    </div>
</div>