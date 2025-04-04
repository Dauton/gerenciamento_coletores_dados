@extends('layouts.content')

@section('content')
    @include('layouts.menu-lateral')
    <section class="centro">
        <header class="cabecalho">
            <h1 class="cabecalho-title"><a href="{{ route('homepage') }}">Homepage</a> / <a href="{{ route('cadastros') }}">Cadastros</a> / Usuários</h1>
            <i class="fa-solid fa-users-gear"></i>
        </header>
        <article class="conteudo">
            <form method="post" action="/updateUser/{{ $exibir->id }}">
                @csrf

                <header class="container-cabecalho">
                    <h1>Edição de usuário</h1>
                </header>

                <label for="nome"><p>Nome<span> *</span></p>
                    <div>
                        <input type="text" name="nome" id="nome" placeholder="Complete com o nome" value="{{ $exibir->nome }}">
                        <i class="fa-solid fa-id-card"></i>
                    </div>
                    @error('nome')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #nome {
                                border: 1px solid #f00
                            }
                        </style>
                    @enderror
                </label>

                <label for="usuario"><p>Usuário<span> *</span></p>
                    <div>
                        <input type="text" name="usuario" id="usuario" placeholder="Complete com o usuário" value="{{ $exibir->usuario }}">
                        <i class="fa-solid fa-user-tag"></i>
                    </div>
                    @error('usuario')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #usuario {
                                border: 1px solid #f00
                            }
                        </style>
                    @enderror
                </label>
                <label for="email"><p>E-mail<span> *</span></p>
                    <div>
                        <input type="email" name="email" id="email" placeholder="Complete com o e-mail" value="{{ $exibir->email }}">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    @error('email')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #email {
                                border: 1px solid #f00
                            }
                        </style>
                    @enderror
                </label>
                <label for="site"><p>Site<span> *</span></p>
                    <div>
                        <select name="site" id="site">
                            <option value="{{ $exibir->site }}">{{ $exibir->site }}</option>
                            <option value="CDARCEX">CDARCEX</option>
                            <option value="CDNIVEX">CDNIVEX</option>
                        </select>
                        <i class="fa-solid fa-map-location-dot"></i>
                    </div>
                    @error('site')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #site {
                                border: 1px solid #f00
                            }
                        </style>
                    @enderror
                </label>
                <label for="perfil"><p>Perfil<span> *</span></p>
                    <div>
                        <select name="perfil" id="perfil">
                            <option value="{{ $exibir->perfil }}">{{ $exibir->perfil }}</option>
                            <option value="ADMIN">ADMIN</option>
                            <option value="TI SITES">TI SITES</option>
                        </select>
                        <i class="fa-solid fa-user-shield"></i>
                    </div>
                    @error('perfil')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #perfil {
                                border: 1px solid #f00
                            }
                        </style>
                    @enderror
                </label>

                <div class="container-buttons">
                    <button type="submit">Submeter</button>
                    <a href="{{ route('usuarios')}}"><button type="button" id="btn-cancelar">Cancelar</button></a>
                </div>

            </form>

        </article>
        @include('layouts.rodape')
    </section>
    <div id="float-buttons">
        <a href="/update-senha/{{ $exibir->id }}"><button type="button" id="float-button"><i class="fa-solid fa-key"></i></button></a>
    </div>
@endsection
