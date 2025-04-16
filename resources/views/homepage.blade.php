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

            <h1>Entrega de equipamento</h1>

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
                @enderror
            </label>

            <label for="colaborador">
                <p>Colaborador<span> *</span></p>
                <div>
                    <i class="fa-solid fa-user-tag"></i>
                    <select name="colaborador" id="colaborador" class="select2">
                        <option value="" {{ old('colaborador') ? '' : 'selected' }}>Selecione o colaborador</option>
                        @foreach ($colaboradores as $colaborador)
                            <option value="{{ $colaborador['USU_NUMCAD'] . ' - ' . $colaborador['USU_NOMFUN'] }}">{{ $colaborador['USU_NUMCAD'] . ' - ' . $colaborador['USU_NOMFUN'] }}</option>
                        @endforeach
                    </select>
                </div>
                @error('colaborador')
                <p id="input-error">{{ $message }}</p>
                @enderror
            </label>

            <!--<label for="loginAmazon">
                <p>Login Amazon<span> *</span></p>
                <div>
                    <i class="fa-solid fa-user-tag"></i>
                    <input type="number" name="loginAmazon" id="loginAmazon">
                </div>
                @error('loginAmazon')
                <p id="input-error">{{ $message }}</p>
                @enderror
            </label>
            <p id="result">000,00000000000000000000000</p>
            -->

            <label for="departamento">
                <p>Departamento<span> *</span></p>
                <div>
                    <i class="fa-solid fa-business-time"></i>
                    <select name="departamento" id="departamento" class="select2">
                        <option value="" {{ old('departamento') ? '' : 'selected' }}>Selecione o departamento</option>
                        @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->departamento }}" {{ old('departamentos') == $departamento->departamento ? 'selected' : '' }}>{{ $departamento->departamento }}</option>
                        @endforeach
                    </select>
                </div>
                @error('departamento')
                <p id="input-error">{{ $message }}</p>
                @enderror
            </label>

            <label for="turno">
                <p>Turno<span> *</span></p>
                <div>
                    <i class="fa-solid fa-business-time"></i>
                    <select name="turno" id="turno" class="select2">
                        <option value="" {{ old('turno') ? '' : 'selected' }}>Selecione o turno</option>
                        @foreach ($turnos as $turno)
                        <option value="{{ $turno->turno }}" {{ old('turnos') == $turno->turno ? 'selected' : '' }}>{{ $turno->turno }}</option>
                        @endforeach
                    </select>
                </div>
                @error('turno')
                <p id="input-error">{{ $message }}</p>
                @enderror
            </label>

            <div class="container-buttons">
                <button type="submit">Entregar</button>
                <a href="{{ route('homepage')}}"><button type="button" id="btn-cancelar">Cancelar</button></a>
            </div>
        </form>

        <section class="table-container">

            <h1>Equipamento em uso no momento (pendente de devolução)</h1>

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
                            <a href="{{"devolve-equipamento/$exibe->id"}}"><i class="fa-solid fa-circle-down" id="btn-table-blue"></i></a>
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
