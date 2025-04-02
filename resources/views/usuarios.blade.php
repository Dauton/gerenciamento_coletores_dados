@extends('layouts.content')

@section('content')
    @include('layouts.menu-lateral')
    <section class="centro">
        <header class="cabecalho">
            <h1 class="cabecalho-title"><a href="{{ route('usuarios') }}">Homepage</a> / <a href="{{ route('cadastros') }}">Cadastros</a> / Usuários</h1>
            <i class="fa-solid fa-users-gear"></i>
        </header>
        <article class="conteudo">
            <form method="post" action="createUser">
                @csrf

                <header class="container-cabecalho">
                    <h1>Criação de usuário</h1>
                </header>
                <label for="nome"><p>Nome<span> *</span></p>
                    <div>
                        <input type="text" name="nome" id="nome" placeholder="Complete com o nome" value="{{ old('nome') }}">
                        <i class="fa-solid fa-id-card"></i>
                    </div>
                    @error('nome')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #nome {
                                box-shadow: 0 0 .3em #f00
                            }
                        </style>
                    @enderror
                </label>

                <label for="usuario"><p>Usuário<span> *</span></p>
                    <div>
                        <input type="text" name="usuario" id="usuario" placeholder="Complete com o usuário" value="{{ old('usuario') }}">
                        <i class="fa-solid fa-user-tag"></i>
                    </div>
                    @error('usuario')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #usuario {
                                box-shadow: 0 0 .3em #f00
                            }
                        </style>
                    @enderror
                </label>
                <label for="email"><p>E-mail<span> *</span></p>
                    <div>
                        <input type="email" name="email" id="email" placeholder="Complete com o e-mail" value="{{ old('email') }}">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    @error('email')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #email {
                                box-shadow: 0 0 .3em #f00
                            }
                        </style>
                    @enderror
                </label>
                <label for="site"><p>Site<span> *</span></p>
                    <div>
                        <select name="site" id="site">
                            <option value="{{ old('site') }}">Selecione o site</option>
                            <option value="CDARCEX">CDARCEX</option>
                            <option value="CDNIVEX">CDNIVEX</option>
                        </select>
                        <i class="fa-solid fa-map-location-dot"></i>
                    </div>
                    @error('site')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #site {
                                box-shadow: 0 0 .3em #f00
                            }
                        </style>
                    @enderror
                </label>
                <label for="perfil"><p>Perfil<span> *</span></p>
                    <div>
                        <select name="perfil" id="perfil">
                            <option value="{{ old('perfil') }}">Selecione o perfil</option>
                            <option value="ADMIN">ADMIN</option>
                            <option value="TI SITES">TI SITES</option>
                        </select>
                        <i class="fa-solid fa-user-shield"></i>
                    </div>
                    @error('perfil')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #perfil {
                                box-shadow: 0 0 .3em #f00
                            }
                        </style>
                    @enderror
                </label>
                <label for="senha"><p>Senha<span> *</span></p>
                    <div>
                        <input type="password" name="senha" id="senha" placeholder="Complete a senha" value="{{ old('senha') }}" autocomplete="new-password">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    @error('senha')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #senha {
                                box-shadow: 0 0 .3em #f00
                            }
                        </style>
                    @enderror
                </label>
                <label for="repete_senha"><p>Repita a senha<span> *</span></p>
                    <div>
                        <input type="password" name="repete_senha" id="repete_senha" placeholder="Repita a senha" value="{{ old('repete_senha') }}">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    @error('repete_senha')
                        <p id="input-error">{{ $message }}</p>
                        <style>
                            #repete_senha {
                                box-shadow: 0 0 .3em #f00
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
                    <h1>Gerenciamento de usuários</h1>
                </header>

                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Usuário</th>
                            <th>E-mail</th>
                            <th>Site</th>
                            <th>Perfil</th>
                            <th>Status</th>
                            <th>Gerenciar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dado as $dados)
                            <tr>
                                <td>{{$dados->nome}}</td>
                                <td>{{$dados->usuario}}</td>
                                <td>{{$dados->email}}</td>
                                <td>{{$dados->site}}</td>
                                <td>{{$dados->perfil}}</td>
                                <td>{{$dados->status}}</td>
                                <td>
                                    <a href="update-usuario/{{$dados->id}}"><i class="fa-solid fa-square-pen" id="btn-table-blue"></i></a>
                                    <a href=""><i class="fa-solid fa-square-minus" id="btn-table-red"></i></a>
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
