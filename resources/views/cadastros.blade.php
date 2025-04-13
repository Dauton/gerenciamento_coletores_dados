
@extends('layouts.content')
@section('content')
    @include('layouts.menu-lateral')
    <section class="centro">
        <header class="cabecalho">
            <h1 class="cabecalho-title"><a href="{{ route('homepage') }}">Homepage</a> / Cadastros</h1>
            <i class="fa-solid fa-database"></i>
        </header>
        <article class="conteudo">
            <section class="conteudo-center">
                <div class="links-container">
                    <header class="container-cabecalho">
                        <h1>Selecione o que deseja cadastrar</h1>
                    </header>
                    <a href="{{ route('usuarios') }}">
                        <div class="link">
                            <i class="fa-solid fa-users-gear"></i>
                            <h3>Usuários</h3>
                        </div>
                    </a>

                    <a href="{{ route('sites') }}">
                        <div class="link">
                            <i class="fa-solid fa-map-location-dot"></i>
                            <h3>Sites</h3>
                        </div>
                    </a>

                    <a href="{{ route('departamentos') }}">
                        <div class="link">
                            <i class="fa-solid fa-briefcase"></i>
                            <h3>Departamentos</h3>
                        </div>
                    </a>

                    <a href="{{ route('avarias') }}">
                        <div class="link">
                            <i class="fa-solid fa-burst"></i>
                            <h3>Avarias</h3>
                        </div>
                    </a>

                    <a href="{{ route('turnos') }}">
                        <div class="link">
                            <i class="fa-solid fa-business-time"></i>
                            <h3>Turnos</h3>
                        </div>
                    </a>

                    <a href="{{ route('equipamentos') }}">
                        <div class="link">
                            <i class="fa-solid fa-microchip"></i>
                            <h3>Equipamentos</h3>
                        </div>
                    </a>
                </div>
            </section>
        </article>
        @include('layouts.rodape')
    </section>
@endsection
