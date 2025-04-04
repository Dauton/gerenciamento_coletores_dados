@extends('layouts.content')

@section('content')
    @include('layouts.menu-lateral')
    <section class="centro">
        <header class="cabecalho">
            <h1 class="cabecalho-title"><a href="{{ route('homepage') }}">Homepage</a> / Reset de senha</h1>
            <i class="fa-solid fa-users-gear"></i>
        </header>
        <article class="conteudo">
            <form method="post" action="/updatePassword/{{ $exibir->id }}">
                @csrf

                <header class="container-cabecalho">
                    <h1>Reset de senha</h1>
                </header>

                <h1>Usuário <b>{{ $exibir->nome }}</b></h1>

                <label for="senha"><p>Senha<span> *</span></p>
                    <div>
                        <input type="password" name="senha" id="senha" placeholder="Complete a senha" value="{{ old('senha') }}" autocomplete="new-password">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    @error('senha')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #senha {
                                border: 1px solid #f00
                            }
                        </style>
                    @enderror
                </label>
                <label for="repete_senha"><p>Repita a senha<span> *</span></p>
                    <div>
                        <input type="password" name="repete_senha" id="repete_senha" placeholder="Repita a senha" value="{{ old('repete_senha') }}">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    @error('repete_senha')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #repete_senha {
                                border: 1px solid #f00
                            }
                        </style>
                    @enderror
                </label>

                <div class="container-buttons">
                    <button type="submit">Submeter</button>
                    <a href="{{ url()->previous() }}"><button type="button" id="btn-cancelar">Cancelar</button></a>
                </div>

            </form>

        </article>
        @include('layouts.rodape')
    </section>
@endsection
