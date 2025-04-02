<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class ShowPagesController extends Controller
{

    // LOGIN PAGE
    public function loginPage()
    {
        return view('login');
    }

    // HOMEPAGE PAGE
    public function homepagePage()
    {
        return view('homepage');
    }

    // CADASTROS PAGE
    public function cadastrosPage()
    {
        return view('cadastros');
    }

    // USUÁRIOS PAGES
    public function usuariosPage()
    {

        $dado = Usuario::all();
        return view('usuarios', compact('dado'));
    }
}
