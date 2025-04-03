<?php

namespace App\Http\Controllers;

use App\Models\Site;
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

    // USERS PAGE
    public function usuariosPage()
    {
        $exibir = Usuario::all();
        return view('usuarios', compact('exibir'));
    }

    // UPDATE USER PAGE
    public function updateUsuarioPage($id)
    {
        $exibir = Usuario::where('id', $id)->first();
        return view('update-usuario', compact('exibir'));
    }

    // UPDATE PASSWORD USER PAGE
    public function updatePasswordPage($id)
    {
        $exibir = Usuario::where('id', $id)->first();
        return view('update-senha', compact('exibir'));
    }

    // SITES PAGE
    public function sitesPage() {
        
        $exibir = Site::all();

        return view('sites', compact('exibir'));

    }

    // UPDATE SITE PAGE
    public function updateSitePage($id)
    {
        $exibir = Site::where('id', $id)->first();
        return view('update-site', compact('exibir'));      
    }
}
