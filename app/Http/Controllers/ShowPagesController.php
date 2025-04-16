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
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use sapiensConn;

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

        $equipamentos = Equipamento::all();
        $colaboradores = SapiensController::listaColaboradores();
        $turnos = Turno::all();
        $departamentos = Departamento::all();
        $relatorios = Relatorio::all()->where('data_devolucao', NULL);
        return view(
            'homepage',
            compact('equipamentos', 'colaboradores', 'turnos', 'departamentos', 'relatorios')
        );
    }

    public function devolveEquipamentoPage($id)
    {
        $idRelatorio = Relatorio::where('id', $id)->first();
        $exibir = Relatorio::all()->where('id', $id);
        $avarias = Avaria::orderBy('tipo_avaria')->get();

        // CASO HAJA A TENTATIVA DE ACESSAR UM RELATÓRIO JÁ CONCLUÍDO
        if (!empty($exibir->first()->data_devolucao)) {
            return redirect()->back()->with('alertError', 'Esse equipamento já foi devolvido.');
        }

        return view('devolve-equipamento', compact('idRelatorio', 'exibir', 'avarias'));
    }

    // CADASTROS PAGE
    public function cadastrosPage()
    {
        $contagemUsuarios = DadosCadastrosController::contaUsuarios();
        $contagemSites = DadosCadastrosController::contaSites();
        $contagemDepartamentos = DadosCadastrosController::contaDepartamentos();
        $contagemTurnos = DadosCadastrosController::contaTurnos();
        $contagemAvarias = DadosCadastrosController::contaAvarias();
        $contagemEquipamentos = DadosCadastrosController::contaEquipamentos();
        $contagemColaboradores = DadosCadastrosController::contaColaboradores();

        $ultimoCadastroUsuario = DadosCadastrosController::ultimoCadastroUsuario();
        $ultimoCadastroSite = DadosCadastrosController::ultimoCadastroSite();
        $ultimoCadastroDepartamento = DadosCadastrosController::ultimoCadastroDepartamento();
        $ultimoCadastroTurno = DadosCadastrosController::ultimoCadastroTurno();
        $ultimoCadastroEquipamento = DadosCadastrosController::ultimoCadastroEquipamento();
        $ultimoCadastroAvaria = DadosCadastrosController::ultimoCadastroAvaria();
        $ultimoCadastroColaborador = DadosCadastrosController::ultimoCadastroColaborador();

        return view('cadastros', compact(
            'contagemUsuarios',
            'contagemSites',
            'contagemDepartamentos',
            'contagemTurnos',
            'contagemEquipamentos',
            'contagemAvarias',
            'contagemColaboradores',

            'ultimoCadastroUsuario',
            'ultimoCadastroSite',
            'ultimoCadastroDepartamento',
            'ultimoCadastroTurno',
            'ultimoCadastroEquipamento',
            'ultimoCadastroAvaria',
            'ultimoCadastroColaborador'
        ));
    }

    // USERS PAGE
    public function usuariosPage()
    {
        $exibir = Usuario::all();
        $sites = Site::orderBy('descricao')->get();
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
        $sites = Site::orderBy('descricao')->get();
        return view('equipamentos', compact('exibir', 'sites'));
    }

    public function relatoriosPage()
    {
        $relatorios = Relatorio::limit(0)->get();
        $sites = Site::orderBy('descricao')->get();
        $equipamentos = Equipamento::orderBy('modelo')->get();
        return view('relatorios', compact('relatorios', 'sites', 'equipamentos'));
    }

    public function colaboradoresPage()
    {
        $colaboradores = Colaborador::all();
        $sites = Site::orderBy('descricao')->get();
        return view('colaboradores', compact('colaboradores', 'sites'));
    }

    // _________________________________________________________________________________________________________________



    // UPDATE PASSWORD USER PAGE
    public function updatePasswordPage($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException) {
            return redirect()->back()->with('alertError', 'Ops! algo deu errado.');
        }

        $exibir = Usuario::where('id', $id)->first();
        return view('update-senha', compact('exibir'));
    }

    // UPDATE USER PAGE
    public function updateUsuarioPage($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException) {
            return redirect()->back()->with('alertError', 'Ops! algo deu errado.');
        }

        $exibir = Usuario::where('id', $id)->first();
        $sites = Site::orderBy('descricao')->get();
        return view('update-usuario', compact('exibir', 'sites'));
    }

    // UPDATE SITE PAGE
    public function updateSitePage($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException) {
            return redirect()->back()->with('alertError', 'Ops! algo deu errado.');
        }

        $exibir = Site::where('id', $id)->first();
        return view('update-site', compact('exibir'));
    }

    // UPDATE AVARIA PAGE
    public function updateAvariaPage($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException) {
            return redirect()->back()->with('alertError', 'Ops! algo deu errado.');
        }

        $exibir = Avaria::where('id', $id)->first();
        return view('update-avaria', compact('exibir'));
    }

    // UPDATE TURNO PAGE
    public function updateTurnoPage($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException) {
            return redirect()->back()->with('alertError', 'Ops! algo deu errado.');
        }

        $exibir = Turno::where('id', $id)->first();
        return view('update-turno', compact('exibir'));
    }

    // UPDATE DEPARTAMENTO PAGE
    public function updateDepartamentoPage($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException) {
            return redirect()->back()->with('alertError', 'Ops! algo deu errado.');
        }

        $exibir = Departamento::where('id', $id)->first();
        return view('update-departamento', compact('exibir'));
    }

    // UPDATE EQUIPAMENTO PAGE
    public function updateEquipamentoPage($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException) {
            return redirect()->back()->with('alertError', 'Ops! algo deu errado.');
        }

        $exibir = Equipamento::where('id', $id)->first();
        $sites = Site::orderBy('descricao')->get();
        return view('update-equipamento', compact('exibir', 'sites'));
    }

    // UPDATE COLABORADOR PAGE
    public function updateColaboradorPage($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException) {
            return redirect()->back()->with('alertError', 'Ops! algo deu errado.');
        }

        $exibir = Colaborador::where('id', $id)->first();
        $sites = Site::orderBy('descricao')->get();
        return view('update-colaborador', compact('exibir', 'sites'));
    }
}
