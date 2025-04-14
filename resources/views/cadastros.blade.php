
@extends('layouts.content')
@section('content')
    @include('layouts.menu-lateral')
    <section class="centro">
        <header class="cabecalho">
            <h1 class="cabecalho-title"><a href="{{ route('homepage') }}">Homepage</a> / Cadastros</h1>
            <i class="fa-solid fa-database"></i>
        </header>
        <article class="conteudo">
            <section class="table-container">

                <h1>Cadastros</h1>

                <table class="DataTable">
                    <thead>
                        <tr>
                            <th>Área</th>
                            <th>Quant. cadastrado</th>
                            <th>Último cadastrado</th>
                            <th> Cadastrar / Gerenciar novo / Gerenciar</th>

                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>Usuários</td>
                                <td>{{$contagemUsuarios}} usuários</td>
                                <td>{{$ultimoCadastroUsuario}}</td>
                                <td>
                                    <a href="{{route('usuarios')}}"><button type="button"> Cadastrar / Gerenciar</button></a>
                                </td>
                            </tr>

                            <tr>
                                <td>Sites</td>
                                <td>{{$contagemSites}} sites</td>
                                <td>{{$ultimoCadastroSite}}</td>
                                <td>
                                    <a href="{{route('sites')}}"><button type="button"> Cadastrar / Gerenciar</button></a>
                                </td>
                            </tr>

                            <tr>
                                <td>Departamentos</td>
                                <td>{{$contagemDepartamentos}} departamentos</td>
                                <td>{{$ultimoCadastroDepartamento}}</td>
                                <td>
                                    <a href="{{route('departamentos')}}"><button type="button"> Cadastrar / Gerenciar</button></a>
                                </td>
                            </tr>

                            <tr>
                                <td>Turnos</td>
                                <td>{{$contagemTurnos}} turnos</td>
                                <td>{{$ultimoCadastroTurno}} </td>
                                <td>
                                    <a href="{{route('turnos')}}"><button type="button"> Cadastrar / Gerenciar</button></a>
                                </td>
                            </tr>

                            <tr>
                                <td>Equipamentos</td>
                                <td>{{$contagemEquipamentos}} equipamentos</td>
                                <td>{{$ultimoCadastroEquipamento}}</td>
                                <td>
                                    <a href="{{route('equipamentos')}}"><button type="button"> Cadastrar / Gerenciar</button></a>
                                </td>
                            </tr>

                            <tr>
                                <td>Avarias</td>
                                <td>{{$contagemAvarias}} avarias</td>
                                <td>{{$ultimoCadastroAvaria}}</td>
                                <td>
                                    <a href="{{route('avarias')}}"><button type="button"> Cadastrar / Gerenciar</button></a>
                                </td>
                            </tr>
                    </tbody>
                </table>
            </section>
        </article>
        @include('layouts.rodape')
    </section>
@endsection
