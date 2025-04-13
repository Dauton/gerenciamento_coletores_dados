<?php

namespace App\Http\Controllers;

use App\Models\Avaria;
use App\Models\Colaborador;
use App\Models\Departamento;
use App\Models\Equipamento;
use App\Models\Relatorio;
use App\Models\Site;
use App\Models\Turno;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;

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

        $equipamentos = Equipamento::all()->where('site_equipamento', session('usuario.site'));
        $colaboradors = Colaborador::all();
        $turnos = Turno::all();
        $departamentos = Departamento::all();
        $relatorios = Relatorio::all()->where('data_devolucao', NULL)->where('site', session('usuario.site'));
        return view(
            'homepage',
            compact('equipamentos', 'colaboradors', 'turnos', 'departamentos', 'relatorios'));
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
        $sites = Site::all();
        return view('usuarios', compact('exibir', 'sites'));
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
        $sites = Site::all();
        return view('equipamentos', compact('exibir', 'sites'));
    }

    public function devolveEquipamentoPage($id)
    {
        $idRelatorio = Relatorio::where('id', $id)->first();
        $exibir = Relatorio::all()->where('id', $id);
        $avarias = Avaria::all();

        // CASO HAJA A TENTATIVA DE ACESSAR UM RELATÓRIO JÁ CONCLUÍDO
        if(!empty($exibir->first()->data_devolucao)) {
            return redirect()->back()->with('alertError', 'Esse equipamento já foi devolvido.');
        }

        return view('devolve-equipamento', compact('idRelatorio', 'exibir', 'avarias'));
    }

    public function relatoriosPage()
    {
        $relatorios = Relatorio::limit(0)->get();
        $sites = Site::all();
        $equipamentos = Equipamento::all();
        return view('relatorios', compact('relatorios', 'sites', 'equipamentos'));
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
        $sites = Site::all();
        return view('update-usuario', compact('exibir', 'sites'));
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
