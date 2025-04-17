@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    </div>
@endif
@extends('layouts.content')

@section('content')
    @include('layouts.menu-lateral')
    <section class="centro">
        <header class="cabecalho">
            <h1 class="cabecalho-title"><a href="{{ route('homepage') }}">Homepage</a> / <a href="{{ route('cadastros') }}">Cadastros</a> / <a href='{{ route('colaboradores') }}'>Colaboradores</a> / Edição de colaborador</h1></h1>
            <i class="fa-solid fa-users-gear"></i>
        </header>
        <article class="conteudo">
            <form method="post" action="/updateColaborador/{{ $exibir->id }}">
                @csrf

                <h1>Edição de colaborador</h1>

                <label for="nome_colaborador"><p>Nome<span> *</span></p>
                    <div>
                        <i class="fa-solid fa-id-card"></i>
                        <input type="text" name="nome_colaborador" id="nome_colaborador" placeholder="Complete com o nome do colaborador" value="{{ $exibir->nome_colaborador }}">
                    </div>
                    @error('nome_colaborador')
                        <p id="input-error">{{ $message }}</p>
                    @enderror
                </label>

                <label for="matricula_colaborador"><p>Matrícula<span> *</span></p>
                    <div>
                        <i class="fa-solid fa-user-tag"></i>
                        <input type="text" name="matricula_colaborador" id="matricula_colaborador" placeholder="Complete com a matrícula do colaborador" value="{{ $exibir->matricula_colaborador }}">
                    </div>
                    @error('matricula_colaborador')
                        <p id="input-error">{{ $message }}</p>
                    @enderror
                </label>
                <label for="site_colaborador"><p>Site<span> *</span></p>
                    <div>
                        <i class="fa-solid fa-map-location-dot"></i>
                        <select name="site_colaborador" id="site_colaborador" class="select2">
                            <option value="{{ $exibir->site_colaborador }}">{{ $exibir->site_colaborador }}</option>
                            @foreach ($sites as $site)
                                <option value="{{$site['usu_nomfil']}}">{{$site['usu_nomfil']}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('site_colaborador')
                        <p id="input-error">{{ $message }}</p>
                    @enderror
                </label>

                <div class="container-buttons">
                    <button type="submit">Submeter</button>
                    <a href="{{ route('colaboradores')}}"><button type="button" id="btn-cancelar">Cancelar</button></a>
                </div>

            </form>

        </article>
        @include('layouts.rodape')
    </section>
    <div id="float-buttons">
        <a><button type="button" id="float-button" class="float-button-red"><i class="fa-solid fa-trash"></i></button></a>
    </div>
    @section('executa-confirmacao')
        <a href="/deleteColaborador/{{ Crypt::encrypt($exibir->id) }}"><button type="button" id="btn-red">Excluir</button></a>
    @endsection
@endsection
