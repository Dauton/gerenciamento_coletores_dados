@extends('layouts.content')

@section('content')
    @include('layouts.menu-lateral')
    <section class="centro">
        <header class="cabecalho">
            <h1 class="cabecalho-title"><a href="{{ route('homepage') }}">Homepage</a> / <a href="{{ route('cadastros') }}">Cadastros</a> / Sites</h1>
            <i class="fa-solid fa-users-gear"></i>
        </header>
        <article class="conteudo">
            <form method="post" action="/updateSite/{{ $exibir->id }}">
                @csrf

                <header class="container-cabecalho">
                    <h1>Edição de site</h1>
                </header>

                <label for="descricao"><p>Descrição<span> *</span></p>
                    <div>
                        <input type="text" name="descricao" id="nome" placeholder="Complete com o nome" value="{{ $exibir->descricao }}">
                        <i class="fa-solid fa-id-card"></i>
                    </div>
                    @error('descricao')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #descricao {
                                box-shadow: 0 0 .3em #f00
                            }
                        </style>
                    @enderror
                </label>

                <div class="container-buttons">
                    <button type="submit">Submeter</button>
                    <a href="{{ route('sites')}}"><button type="button" id="btn-cancelar">Cancelar</button></a>
                </div>

            </form>

        </article>
        @include('layouts.rodape')
    </section>
@endsection
