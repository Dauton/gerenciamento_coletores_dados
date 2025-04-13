<div id="back-menu"></div>
<nav class="menu-lateral">
    <div class="usuario-info">
        <i class="fa-solid fa-circle-user"></i>
        <h2>Bem vindo(a)!</h2>
        <p>{{ session('usuario.nome') }} <br> {{ session('usuario.site')  }}</p>
        <a href="{{ route('logout') }}"><button type="button" id="btn-sair">Sair</button></a>
    </div>
    <ul>
        <li><a href="{{ route('homepage') }}"><i class="fa-solid fa-house"></i>Entregar / Devolver<i class="fa-solid fa-angle-right"></i></a></li>
        <li><a href="{{ route('relatorios') }}"><i class="fa-solid fa-magnifying-glass"></i>Relatórios<i class="fa-solid fa-angle-right"></i></a></li>
        <li><a href="{{ route('cadastros') }}"><i class="fa-solid fa-database"></i>Cadastros<i class="fa-solid fa-angle-right"></i></a></li>
        <li><a href="{{ route('update-senha', session('usuario.id')) }}"><i class="fa-solid fa-key"></i>Minha senha<i class="fa-solid fa-angle-right"></i></a></li>
    </ul>
    <div class="bottom-menu">
        <img src="{{ asset("assets/img/id-logo-branco-extenso.png") }}" alt="logo-idl">
        <p>{{ now()->format('d/m/Y') }}
    </div>
</nav>
