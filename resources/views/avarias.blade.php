@extends('layouts.content')

@section('content')
    @include('layouts.menu-lateral')
    <section class="centro">
        <header class="cabecalho">
            <h1 class="cabecalho-title"><a href="{{ route('homepage') }}">Homepage</a> / <a href="{{ route('cadastros') }}">Cadastros</a> / Avarias</h1>
            <i class="fa-solid fa-burst"></i>
        </header>
        <article class="conteudo">
            <form method="post" action="createAvaria">
                @csrf

                <header class="container-cabecalho">
                    <h1>Cadastro de avaria</h1>
                </header>

                <label for="avaria"><p>Avaria<span> *</span></p>
                    <div>
                        <i class="fa-solid fa-burst"></i>
                        <input type="text" name="avaria" id="avaria" placeholder="Complete com o nome da avaria" value="{{ old('avaria') }}">
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

                <label for="avaria"><p>Tipo da varia<span> *</span></p>
                    <div>
                        <i class="fa-solid fa-burst"></i>
                        <select name="tipo_avaria" id="tipo_avaria">
                            <option value="">Selecione o tipo da avaria</option>
                            <option value="Sistêmico (Software)">Sistêmico (Software)</option>
                            <option value="Físico (Hardware)">Físico (Hardware)</option>
                        </select>
                    </div>
                    @error('tipo_avaria')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #tipo_avaria {
                                border: 1px solid #f00
                            }
                        </style>
                    @enderror
                </label>

                <div class="container-buttons">
                    <button type="submit">Cadastrar</button>
                    <a href="{{ route('cadastros')}}"><button type="button" id="btn-cancelar">Cancelar</button></a>
                </div>

            </form>

            <section class="table-container">

                <header class="container-cabecalho">
                    <h1>Gerenciamento de avarias</h1>
                </header>

                <table>
                    <thead>
                        <tr>
                            <th>ID avaria</th>
                            <th>Avaria</th>
                            <th>Tipo da avaria</th>
                            <th>Data cadastro</th>
                            <th>Gerenciar</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($exibir as $exibe)
                            <tr>
                                <td>{{ $exibe->id }}</td>
                                <td>{{ $exibe->avaria }}</td>
                                <td>{{ $exibe->tipo_avaria }}</td>
                                <td>{{ date_format($exibe->created_at, 'd/m/Y - H:i') }}</td>
                                <td>
                                    <a href="update-avaria/{{$exibe->id}}"><i class="fa-solid fa-square-pen" id="btn-table-blue"></i></a>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </section>

        </article>
        @include('layouts.rodape')
    </section>
@endsection
