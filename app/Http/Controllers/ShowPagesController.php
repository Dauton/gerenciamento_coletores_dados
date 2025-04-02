<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Contracts\Encryption\DecryptException;
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

    // USUÁRIOS PAGE
    public function usuariosPage()
    {
        $dado = Usuario::all();
        return view('usuarios', compact('dado'));
    }

    // EDITAR USUÁRIO PAGE
    public function updateUsuarioPage($id)
    {
        $dado = Usuario::where('id', $id)->first();
        return view('update-usuario', compact('dado'));
    }
}
