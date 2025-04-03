@extends('layouts.content')

@section('content')
    @include('layouts.menu-lateral')
    <section class="centro">
        <header class="cabecalho">
            <h1 class="cabecalho-title"><a href="{{ route('homepage') }}">Homepage</a> / <a href="{{ route('cadastros') }}">Cadastros</a> / Sites</h1>
            <i class="fa-solid fa-map-location-dot"></i>
        </header>
        <article class="conteudo">
            <form method="post" action="createSite">
                @csrf

                <header class="container-cabecalho">
                    <h1>Cadastro de site</h1>
                </header>

                <label for="descricao"><p>Descrição<span> *</span></p>
                    <div>
                        <input type="text" name="descricao" id="descricao" placeholder="Complete com o nome do site" value="{{ old('descricao') }}">
                        <i class="fa-solid fa-map-location-dot"></i>
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
                    <button type="submit">Cadastrar</button>
                    <a href="{{ route('cadastros')}}"><button type="button" id="btn-cancelar">Cancelar</button></a>
                </div>

            </form>

            <section class="table-container">

                <header class="container-cabecalho">
                    <h1>Gerenciamento de usuários</h1>
                </header>

                <table>
                    <thead>
                        <tr>
                            <th>ID site</th>
                            <th>Descrição</th>
                            <th>Cadastrado por</th>
                            <th>Data cadastro</th>
                            <th>Gerenciar</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($exibir as $exibe)
                            <tr>
                                <td>{{ $exibe->id }}</td>
                                <td>{{ $exibe->descricao }}</td>
                                <td>{{ $exibe->created_by }}</td>
                                <td>{{ date_format($exibe->created_at, 'd/m/Y - H:i') }}</td>
                                <td>
                                    <a href="update-site/{{ $exibe->id }}"><i class="fa-solid fa-square-pen" id="btn-table-blue"></i></a>
                                    <a href=""><i class="fa-solid fa-square-minus" id="btn-table-red"></i></a>
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
