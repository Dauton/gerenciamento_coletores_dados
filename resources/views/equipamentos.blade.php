@extends('layouts.content')

@section('content')
    @include('layouts.menu-lateral')
    <section class="centro">
        <header class="cabecalho">
            <h1 class="cabecalho-title"><a href="{{ route('homepage') }}">Homepage</a> / <a href="{{ route('cadastros') }}">Cadastros</a> / Equipamentos</h1>
            <i class="fa-solid fa-microchip"></i>
        </header>
        <article class="conteudo">
            <form method="post" action="createEquipamento">
                @csrf

                <header class="container-cabecalho">
                    <h1>Cadastro de equipamento</h1>
                </header>
                <label for="marca"><p>Marca<span> *</span></p>
                    <div>
                        <i class="fa-solid fa-microchip"></i>
                        <input type="text" name="marca" id="marca" placeholder="Complete com a marca" value="{{ old('marca') }}">
                    </div>
                    @error('marca')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #marca {
                                border: 1px solid #f00
                            }
                        </style>
                    @enderror
                </label>

                <label for="modelo"><p>Modelo<span> *</span></p>
                    <div>
                        <i class="fa-solid fa-microchip"></i>
                        <input type="text" name="modelo" id="modelo" placeholder="Complete com o modelo" value="{{ old('modelo') }}">
                    </div>
                    @error('modelo')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #modelo {
                                border: 1px solid #f00
                            }
                        </style>
                    @enderror
                </label>
                <label for="serial"><p>Serial<span> *</span></p>
                    <div>
                        <i class="fa-solid fa-tag"></i>
                        <input type="text" name="serial" id="serial" placeholder="Complete com o serial" value="{{ old('serial') }}">
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
                <label for="patrimonio"><p>Patrimônio<span> *</span></p>
                    <div>
                        <i class="fa-solid fa-tag"></i>
                        <input type="text" name="patrimonio" id="patrimonio" placeholder="Complete com o patrimônio" value="{{ old('patrimonio') }}">
                    </div>
                    @error('patrimonio')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #patrimonio {
                                border: 1px solid #f00
                            }
                        </style>
                    @enderror
                </label>
            </label>
            <label for="site_equipamento"><p>Site do equipanento<span> *</span></p>
                <div>
                    <i class="fa-solid fa-map-location-dot"></i>
                    <select name="site_equipamento" id="site_equipamento">
                        <option value="{{ old('site_equipamento') }}">Selecione o site</option>
                        <option value="CDARCEX">CDARCEX</option>
                        <option value="CDAMBEX">CDAMBEX</option>
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
                <label for="status"><p>Status<span> *</span></p>
                    <div>
                        <i class="fa-solid fa-circle-check"></i>
                        <select name="status" id="status">
                            <option value="{{ old('status') }}">Selecione o status</option>
                            <option value="PRODUÇÃO">PRODUÇÃO</option>
                            <option value="MANUTENÇÃO">MANUTENÇÃO</option>
                        </select>
                    </div>
                    @error('status')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #status {
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
                    <h1>Gerenciamento de equipamentos</h1>
                </header>

                <table>
                    <thead>
                        <tr>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Serial</th>
                            <th>Patrimômio</th>
                            <th>Site</th>
                            <th>Status</th>
                            <th>Cadastrado em</th>
                            <th>Gerenciar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($exibir as $exibe)
                            <tr>
                                <td>{{$exibe->marca}}</td>
                                <td>{{$exibe->modelo}}</td>
                                <td>{{$exibe->serial}}</td>
                                <td>{{$exibe->patrimonio}}</td>
                                <td>{{$exibe->site_equipamento}}</td>
                                <td>{{$exibe->status}}</td>
                                <td>{{ \Carbon\Carbon::parse($exibe->created_at)->format('d/m/Y - H:i') }}</td>
                                <td>
                                    <a href="update-equipamento/{{$exibe->id}}"><i class="fa-solid fa-square-pen" id="btn-table-blue"></i></a>
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
