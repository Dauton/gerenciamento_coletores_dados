@extends('layouts.content')

@section('content')
@include('layouts.menu-lateral')
<section class="centro">
    <header class="cabecalho">
        <h1 class="cabecalho-title">Homepage</h1>
        <i class="fa-solid fa-house-chimney"></i>
    </header>
    <article class="conteudo">
        <form method="post" action="entregaEquipamento">
            @csrf

            <header class="container-cabecalho">
                <h1>Entrega de equipamento</h1>
            </header>
            <label for="equipamento">
                <p>Equipamento<span> *</span></p>
                <div>
                    <i class="fa-solid fa-microchip"></i>
                    <select name="equipamento" id="equipamento" class="select2">
                        <option value="" {{ old('equipamento') ? '' : 'selected' }}>Selecione o equipamento</option>
                        @foreach ($equipamentos as $equipamento)
                            <option value="{{ $equipamento->patrimonio }}" {{ old('equipamento') == $equipamento->patrimonio ? 'selected' : '' }}>{{ $equipamento->patrimonio . ' - ' . $equipamento->modelo }}</option>
                        @endforeach
                    </select>

                </div>
                @error('equipamento')
                <p id="input-error">{{ $message }}</p>
                <style>
                    #equipamento {
                        border: 1px solid #f00
                    }
                </style>
                @enderror
            </label>

            <label for="colaborador">
                <p>Colaborador<span> *</span></p>
                <div>
                    <i class="fa-solid fa-user-tag"></i>
                    <select name="colaborador" id="colaborador" class="select2">
                        <option value="" {{ old('colaborador') ? '' : 'selected' }}>Selecione o colaborador</option>
                        @foreach ($colaboradors as $colaborador)
                            <option value="{{ $colaborador->matricula_colaborador . ' - ' . $colaborador->nome_colaborador }}">{{ $colaborador->matricula_colaborador . ' - ' . $colaborador->nome_colaborador }}</option>
                        @endforeach
                    </select>
                </div>
                @error('colaborador')
                <p id="input-error">{{ $message }}</p>
                <style>
                    #matricula_colaborador {
                        border: 1px solid #f00
                    }
                </style>
                @enderror
            </label>
            
            <label for="departamento">
                <p>Departamentos<span> *</span></p>
                <div>
                    <i class="fa-solid fa-business-time"></i>
                    <select name="departamento" id="departamento" class="select2">
                        <option value="" {{ old('departamento') ? '' : 'selected' }}>Selecione o departamento</option>
                        @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->departamento }}">{{ $departamento->departamento }}</option>
                        @endforeach
                    </select>
                </div>
                @error('departamento')
                <p id="input-error">{{ $message }}</p>
                <style>
                    #departamento {
                        border: 1px solid #f00
                    }
                </style>
                @enderror
            </label>

            <label for="turno">
                <p>Turno<span> *</span></p>
                <div>
                    <i class="fa-solid fa-business-time"></i>
                    <select name="turno" id="turno" class="select2">
                        <option value="" {{ old('turno') ? '' : 'selected' }}>Selecione o turno</option>
                        @foreach ($turnos as $turno)
                        <option value="{{ $turno->turno }}">{{ $turno->turno }}</option>
                        @endforeach
                    </select>
                </div>
                @error('turno')
                <p id="input-error">{{ $message }}</p>
                <style>
                    #site {
                        border: 1px solid #f00
                    }
                </style>
                @enderror
            </label>

            <div class="container-buttons">
                <button type="submit">Entregar</button>
                <a href="{{ route('homepage')}}"><button type="button" id="btn-cancelar">Cancelar</button></a>
            </div>
        </form>

        <section class="table-container">

            <header class="container-cabecalho">
                <h1>Equipamento em uso no momento (pendete de devolução)</h1>
            </header>

            <table class="DataTable">
                <thead>
                    <tr>
                        <th>Equipamento</th>
                        <th>Colaborador</th>
                        <th>Departamento</th>
                        <th>Turno</th>
                        <th>Entregue pelo agente</th>
                        <th>Data/horário da entrega</th>
                        <th>Devolução</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($relatorios as $exibe)
                    <tr>
                        <td>{{$exibe->equipamento}}</td>
                        <td>{{$exibe->colaborador}}</td>
                        <td>{{$exibe->departamento}}</td>
                        <td>{{$exibe->turno}}</td>
                        <td>{{$exibe->agente_entrega}}</td>
                        <td>{{\Carbon\Carbon::parse($exibe->data_entrega)->format('d/m/Y - H:i')}}</td>
                        <td>
                            <a href="{{"devolve-equipamento/$exibe->id"}}" ><i class="fa-solid fa-circle-down" id="btn-table-blue"></i></a>
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
