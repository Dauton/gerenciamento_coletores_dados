<?php

namespace App\Http\Controllers;

use App\Models\Avaria;
use App\Models\Departamento;
use App\Models\Equipamento;
use App\Models\Site;
use App\Models\Turno;
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

    // SITES PAGE
    public function sitesPage()
    {

        $exibir = Site::all();

        return view('sites', compact('exibir'));
    }

    // AVARIAS PAGE
    public function avariasPage()
    {
        $exibir = Avaria::all();
        return view('avarias', compact('exibir'));
    }

    // TURNOS PAGE
    public function turnosPage()
    {
        $exibir = Turno::all();
        return view('turnos', compact('exibir'));
    }

    // DEPARTAMENTOS PAGE
    public function departamentosPage()
    {
        $exibir = Departamento::all();
        return view('departamentos', compact('exibir'));
    }

    // EQUIPAMENTOS PAGES
    public function equipamentosPage()
    {
        $exibir = Equipamento::all();
        return view('equipamentos', compact('exibir'));
    }

    // ENTREGA DE EQUIPAMENTO PAGE
    public function entregaEquipamentoPage()
    {
        $equipamentos = Equipamento::all()->where('site_equipamento', session('usuario.site'));
        $turnos = Turno::all();
        return view('entrega-equipamento', compact('equipamentos', 'turnos'));
    }

    // _________________________________________________________________________________________________________________



    // UPDATE PASSWORD USER PAGE
    public function updatePasswordPage($id)
    {
        $exibir = Usuario::where('id', $id)->first();
        return view('update-senha', compact('exibir'));
    }

    // UPDATE USER PAGE
    public function updateUsuarioPage($id)
    {
        $exibir = Usuario::where('id', $id)->first();
        return view('update-usuario', compact('exibir'));
    }

    // UPDATE SITE PAGE
    public function updateSitePage($id)
    {
        $exibir = Site::where('id', $id)->first();
        return view('update-site', compact('exibir'));
    }

    // UPDATE AVARIA PAGE
    public function updateAvariaPage($id)
    {
        $exibir = Avaria::where('id', $id)->first();
        return view('update-avaria', compact('exibir'));
    }

    // UPDATE TURNO PAGE
    public function updateTurnoPage($id)
    {
        $exibir = Turno::where('id', $id)->first();
        return view('update-turno', compact('exibir'));
    }

    // UPDATE DEPARTAMENTO PAGE
    public function updateDepartamentoPage($id)
    {
        $exibir = Departamento::where('id', $id)->first();
        return view('update-departamento', compact('exibir'));
    }

    // UPDATE EQUIPAMENTO PAGE
    public function updateEquipamentoPage($id)
    {
        $exibir = Equipamento::where('id', $id)->first();
        $sites = Site::all();
        return view('update-equipamento', compact('exibir', 'sites'));
    }
}
