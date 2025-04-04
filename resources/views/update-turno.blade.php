@extends('layouts.content')

@section('content')
    @include('layouts.menu-lateral')
    <section class="centro">
        <header class="cabecalho">
            <h1 class="cabecalho-title"><a href="{{ route('homepage') }}">Homepage</a> / <a href="{{ route('cadastros') }}">Cadastros</a> / Sites</h1>
            <i class="fa-solid fa-users-gear"></i>
        </header>
        <article class="conteudo">
            <form method="post" action="/updateTurno/{{ $exibir->id }}">
                @csrf

                <header class="container-cabecalho">
                    <h1>Edição de turno</h1>
                </header>

                <label for="turno"><p>Descrição<span> *</span></p>
                    <div>
                        <input type="text" name="turno" id="turno" placeholder="Complete com a descrição do turno" value="{{ $exibir->turno }}">
                        <i class="fa-solid fa-id-card"></i>
                    </div>
                    @error('turno')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #turno {
                                border: 1px solid #f00
                            }
                        </style>
                    @enderror
                </label>

                <div class="container-buttons">
                    <button type="submit">Submeter</button>
                    <a href="{{ route('turnos')}}"><button type="button" id="btn-cancelar">Cancelar</button></a>
                </div>

            </form>

        </article>
        @include('layouts.rodape')
    </section>
@endsection
