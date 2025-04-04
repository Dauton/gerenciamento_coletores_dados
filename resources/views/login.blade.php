@extends('layouts.content')

@section('content')
<form method="post" action="{{ route('submitLogin') }}" id="login-form">
    @csrf

    <img src="{{ asset('assets/img/id-logo-extenso.png') }}" alt="logo-idl">

    <label for='usuario'>Usuário
        <div>
            <i class="fa-solid fa-user"></i>
            <input type="text" name="usuario" id="usuario" placeholder="Seu usuário" value="{{ old('usuario') }}">
        </div>
        @error('usuario')
            <p id="input-error">{{ $message }}</p>
            <style>
                #usuario {
                    border: 1px solid #f00 !important
                }
            </style>
        @enderror
    </label>
    <label for='senha'>Senha
        <div>
            <input type="password" name="senha" id="senha" placeholder="Sua senha" value="{{ old('senha') }}">
            <i class="fa-solid fa-lock"></i>
        </div>
        @error('senha')
            <p id="input-error">{{ $message }}</p>
            <style>
                #senha {
                    border: 1px solid #f00 !important
                }
            </style>
        @enderror
    </label>

    <div class="container-buttons">
        <button>Entrar</button>
    </div>

    @if (session('loginError'))
        <p class="login-error">
            {{ session('loginError') }}
        </p>
    @endif

</form>
@endsection
