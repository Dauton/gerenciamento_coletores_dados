@extends('layouts.content')

@section('content')
@include('layouts.menu-lateral')

<section class="centro">
    <header class="cabecalho">
        <h1 class="cabecalho-title"><a href="{{ route('homepage') }}">Homepage</a> / Devolução</h1>
        <i class="fa-solid fa-users-gear"></i>
    </header>
    <article class="conteudo">

        <form method="post" action="">
            @csrf

            <header class="container-cabecalho">
                <h1>Busca de relatório</h1>
            </header>

            <label for="buscar_de">
                <p>De<span> *</span></p>
                <div>
                    <i class="fa-solid fa-calendar-days"></i>
                    <input type="date" name="buscar_de" id="buscar_de" value="{{old('buscar_de')}}">
                </div>
                @error('buscar_de')
                <p id="input-error">{{ $message }}</p>
                <style>
                    #buscar_de {
                        border: 1px solid #f00
                    }
                </style>
                @enderror
            </label>

            <label for="buscar_ate">
                <p>Até<span> *</span></p>
                <div>
                    <i class="fa-solid fa-calendar-days"></i>
                    <input type="date" name="buscar_ate" id="buscar_ate" value="{{old('buscar_ate')}}">
                </div>
                @error('buscar_ate')
                <p id="input-error">{{ $message }}</p>
                <style>
                    #buscar_ate {
                        border: 1px solid #f00
                    }
                </style>
                @enderror
            </label>

            <label for="site"><p>Site<span> *</span></p>
                <div>
                    <i class="fa-solid fa-map-location-dot"></i>
                    <select name="site" id="site_equipamento">
                        <option value="">Selecione o site</option>
                        @foreach ($sites as $site)
                            <option value="{{$site->descricao}}">{{$site->descricao}}</option>
                        @endforeach
                    </select>
                </div>
                @error('site_equipamento')
                    <p id="input-error">{{ $message }}</p>
                    <style>
                        #site_equipamento {
                            border: 1px solid #f00
                        }
                    </style>
                @enderror
            </label>

            <div class="container-buttons">
                <button type="submit">Buscar</button>
                <a href="{{ route('homepage')}}"><button type="button" id="btn-cancelar">Cancelar</button></a>
            </div>
        </form>

        <section class="table-container">

            <header class="container-cabecalho">
                <h1>Informações de uso</h1>
            </header>

            <table>
                <thead>
                    <tr>
                        <th>Equipamento</th>
                        <th>Colaborador</th>
                        <th>Entregue por</th>
                        <th>Entregue em</th>
                        <th>Devolução por</th>
                        <th>Devolvido em</th>
                        <th>Avaria</th>
                        <th>Foto da avaria</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="" target="_blank" title="Clique para abrir a foto"><i class="fa-solid fa-image" id="btn-table-blue"></i></a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </section>
    </article>
    @include('layouts.rodape')
</section>
@endsection
