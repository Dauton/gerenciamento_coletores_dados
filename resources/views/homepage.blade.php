@extends('layouts.content')

@section('content')
    @include('layouts.menu-lateral')
    <section class="centro">
        <header class="cabecalho">
            <h1 class="cabecalho-title">Homepage / </h1>
            <i class="fa-solid fa-house"></i>
        </header>
        <article class="conteudo">
            <section class="conteudo-title">
                <h1>Entrega / Devolução</h1>
            </section>
            <section class="conteudo-center">
                <div class="links-container">
                    <header class="container-cabecalho">
                        <h1>Selecione o que deseja realizar</h1>
                    </header>
                    <a href="{{ route('entrega-equipamento') }}">
                        <div class="link">
                            <i class="fa-solid fa-arrow-right"></i>
                            <h3>Entregar equipamento</h3>
                        </div>
                    </a>

                    <a href="{{ route('sites') }}">
                        <div class="link">
                            <i class="fa-solid fa-arrow-left"></i>
                            <h3>Devolver equipamento</h3>
                        </div>
                    </a>
                </div>
            </section>
        </article>
        @include('layouts.rodape')
    </section>
@endsection
