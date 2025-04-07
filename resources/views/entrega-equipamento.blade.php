@extends('layouts.content')

@section('content')
    @include('layouts.menu-lateral')
    <section class="centro">
        <header class="cabecalho">
            <h1 class="cabecalho-title"><a href="{{ route('homepage') }}">Homepage</a> / <a href="{{ route('cadastros') }}">Cadastros</a> / Usuários</h1>
            <i class="fa-solid fa-users-gear"></i>
        </header>
        <article class="conteudo">
            <form method="post" action="createUser">
                @csrf

                <header class="container-cabecalho">
                    <h1>Entrega de equipamento</h1>
                </header>
                <label for="serial"><p>Serial do equipamento<span> *</span></p>
                    <div>
                        <i class="fa-solid fa-microchip"></i>
                        <select name="serial" id="serial">
                            <option value="{{ old('serial') }}">Selecione o turno</option>
                            @foreach ($equipamentos as $equipamento)
                                <option value="{{ $equipamento->serial }}">{{ $equipamento->serial . ' - ' . $equipamento->modelo}}</option>
                            @endforeach

                        </select>
                    </div>
                    @error('serial')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #serial {
                                border: 1px solid #f00
                            }
                        </style>
                    @enderror
                </label>

                <label for="matricula_colaborador"><p>Matrícula do colaborador<span> *</span></p>
                    <div>
                        <i class="fa-solid fa-user-tag"></i>
                        <input type="text" name="matricula_colaborador" id="matricula_colaborador" placeholder="Complete com a matrícula do colaborador" value="{{ old('matricula_colaborador') }}">
                    </div>
                    @error('matricula_colaborador')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #matricula_colaborador {
                                border: 1px solid #f00
                            }
                        </style>
                    @enderror
                </label>
                <label for="turno"><p>Turno<span> *</span></p>
                    <div>
                        <i class="fa-solid fa-business-time"></i>
                        <select name="turno" id="turno">
                            <option value="{{ old('turno') }}">Selecione o turno</option>
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
                    <button type="submit">Cadastrar</button>
                    <a href="{{ route('cadastros')}}"><button type="button" id="btn-cancelar">Cancelar</button></a>
                </div>
            </form>

        </article>
        @include('layouts.rodape')
    </section>
@endsection
