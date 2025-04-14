@extends('layouts.content')

@section('content')
@include('layouts.menu-lateral')

<section class="centro">
    <header class="cabecalho">
        <h1 class="cabecalho-title"><a href="{{ route('homepage') }}">Homepage</a> / Relatórios</h1>
        <i class="fa-solid fa-magnifying-glass"></i>
    </header>
    <article class="conteudo">

        <form method="post" action="buscaRelatorio">
            @csrf

            <h1>Busca de relatório</h1>

            <h5>Para obter todos os dados, deixe os campos em branco.</h5>

            <label for="data_inicio">
                <p>De<span> *</span></p>
                <div>
                    <i class="fa-solid fa-calendar-days"></i>
                    <input type="date" name="data_inicio" id="data_inicio" value="{{old('data_inicio')}}">
                </div>
                @error('data_inicio')
                    <p id="input-error">{{ $message }}</p>
                @enderror
            </label>

            <label for="data_final">
                <p>Até<span> *</span></p>
                <div>
                    <i class="fa-solid fa-calendar-days"></i>
                    <input type="date" name="data_final" id="data_final" value="{{old('data_final')}}">
                </div>
                @error('data_final')
                    <p id="input-error">{{ $message }}</p>
                @enderror
            </label>

            <label for="site">
                <p>Site<span> *</span></p>
                <div>
                    <i class="fa-solid fa-map-location-dot"></i>
                    <select name="site" id="site" class="select2">
                        <option value="">Selecione o site</option>
                        @foreach ($sites as $site)
                        <option value="{{$site->descricao}}">{{$site->descricao}}</option>
                        @endforeach
                    </select>
                </div>
                @error('site')
                    <p id="input-error">{{ $message }}</p>
                @enderror
            </label>

            <label for="equipamento">
                <p>Equipamento<span> *</span></p>
                <div>
                    <i class="fa-solid fa-microchip"></i>
                    <select name="equipamento" id="equipamento" class="select2">
                        <option value="">Selecione o equipamento</option>
                        @foreach ($equipamentos as $equipamento)
                        <option value="{{$equipamento->patrimonio}}">{{$equipamento->patrimonio . ' - ' . $equipamento->modelo}}</option>
                        @endforeach
                    </select>
                </div>
                @error('equipamento')
                    <p id="input-error">{{ $message }}</p>
                @enderror
            </label>

            <div class="container-buttons">
                <button type="submit">Buscar</button>
                <a href="{{ route('relatorios')}}"><button type="button" id="btn-cancelar">Resetar</button></a>
            </div>
        </form>
        @if (count($relatorios) < 1)

            @else
            <section class="table-container">

            <h1>Resultado da busca</h1>

            <table class="DataTableExcel">
                <thead>
                    <tr>
                        <th>Equipamento</th>
                        <th>Colaborador</th>
                        <th>Departamento</th>
                        <th>Turno</th>
                        <th>Entregue por</th>
                        <th>Entregue em</th>
                        <th>Confirmou devolução</th>
                        <th>Devolvido em</th>
                        <th>Avaria</th>
                        <th>Foto da avaria</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($relatorios as $relatorio)
                    <tr>
                        <td>{{ $relatorio->equipamento }}</td>
                        <td>{{ $relatorio->colaborador }}</td>
                        <td>{{ $relatorio->departamento }}</td>
                        <td>{{ $relatorio->turno }}</td>
                        <td>{{ $relatorio->agente_entrega }}</td>
                        <td>{{ \Carbon\Carbon::parse($relatorio->data_entrega)->format('d/m/Y - H:i') }}</td>
                        <td>{{ $relatorio->agente_devolucao }}</td>
                        <td>{{ $relatorio->data_devolucao ? \Carbon\Carbon::parse($relatorio->data_devolucao)->format('d/m/Y - H:i') : '' }}</td>
                        <td>{{ $relatorio->avaria }}</td>
                        <td>
                            @if (!empty($relatorio->foto_avaria))
                            <a href="{{ $relatorio->foto_avaria }}" target="_blank" title="Clique para abrir a foto">
                                <i class="fa-solid fa-image" id="btn-table-blue"></i>
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
</section>

<div id="float-buttons">
    <a><button type="button" id="float-button"><i class="fa-solid fa-file-excel"></i></button></a>
</div>

@endif
</article>
@include('layouts.rodape')
</section>

@endsection
