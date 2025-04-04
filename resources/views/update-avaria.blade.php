@extends('layouts.content')

@section('content')
    @include('layouts.menu-lateral')
    <section class="centro">
        <header class="cabecalho">
            <h1 class="cabecalho-title"><a href="{{ route('homepage') }}">Homepage</a> / <a href="{{ route('cadastros') }}">Cadastros</a> / Sites</h1>
            <i class="fa-solid fa-users-gear"></i>
        </header>
        <article class="conteudo">
            <form method="post" action="/updateAvaria/{{ $exibir->id }}">
                @csrf

                <header class="container-cabecalho">
                    <h1>Edição de site</h1>
                </header>

                <label for="avaria"><p>Avaria<span> *</span></p>
                    <div>
                        <input type="text" name="avaria" id="avaria" placeholder="Complete com o nome da avaria" value="{{ $exibir->avaria }}">
                        <i class="fa-solid fa-id-card"></i>
                    </div>
                    @error('avaria')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #avaria {
                                border: 1px solid #f00
                            }
                        </style>
                    @enderror
                </label>

                <label for="tipo_avaria"><p>Avaria<span> *</span></p>
                    <div>
                        <select name="tipo_avaria" id="tipo_avaria">
                            <option value="{{ $exibir->tipo_avaria }}">{{ $exibir->tipo_avaria }}</option>
                            <option value="Sistêmico (Software)">Sistêmico (Software)</option>
                            <option value="Físico (Hardware)">Físico (Hardware)</option>
                        </select>
                        <i class="fa-solid fa-id-card"></i>
                    </div>
                    @error('tipo_avaria')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #avaria {
                                border: 1px solid #f00
                            }
                        </style>
                    @enderror
                </label>

                <div class="container-buttons">
                    <button type="submit">Submeter</button>
                    <a href="{{ route('avarias')}}"><button type="button" id="btn-cancelar">Cancelar</button></a>
                </div>

            </form>

        </article>
        @include('layouts.rodape')
    </section>
@endsection
