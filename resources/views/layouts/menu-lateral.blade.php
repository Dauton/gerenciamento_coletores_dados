<div id="back-menu"></div>
<nav class="menu-lateral">
    <div class="usuario-info">
        <i class="fa-solid fa-circle-user"></i>
        <h2>Bem vindo(a)!</h2>
        <p>{{ session('usuario.nome') }} <br> {{ session('usuario.site')  }}</p>
    </div>
    <ul>
        <li><a href="{{ route('homepage') }}"><i class="fa-solid fa-house"></i>Entregar / Devolver</a></li>
        <li><a href="{{ route('relatorios') }}"><i class="fa-solid fa-magnifying-glass"></i>Relatórios</a></li>
        <li><a href="{{ route('cadastros') }}"><i class="fa-solid fa-database"></i>Cadastros</a></li>
        <li><a href="{{ route('update-senha', Crypt::encrypt(session('usuario.id'))) }}"><i class="fa-solid fa-key"></i>Minha senha</a></li>
        <hr>
        <li><a href="{{ route('logout', Crypt::encrypt(session('usuario.id'))) }}"><i class="fa-solid fa-right-from-bracket"></i>Sair</a></li>
    </ul>
    <div class="bottom-menu">
        <img src="{{ asset("assets/img/id-logo-branco-extenso.png") }}" alt="logo-idl">
        <p>{{ now()->format('d/m/Y') }}
    </div>
</nav>