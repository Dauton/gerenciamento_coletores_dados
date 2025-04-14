<?php

namespace App\Http\Controllers;

use App\Models\Avaria;
use App\Models\Departamento;
use App\Models\Equipamento;
use App\Models\Site;
use App\Models\Turno;
use App\Models\Usuario;

class DadosCadastrosController extends Controller
{

    // CONTAGEM DAS ÁREAS CADASTRADAS
    // CONTA USUÁRIOS CADASTRADOS
    public static function contaUsuarios()
    {
        $contagem = Usuario::count();
        return $contagem;
    }

    // CONTA SITES CADASTRADOS
    public static function contaSites()
    {
        $contagem = Site::count();
        return $contagem;
    }

    // CONTA DEPARTAMENTOS CADASTRADOS
    public static function contaDepartamentos()
    {
        $contagem = Departamento::count();
        return $contagem;
    }

    // CONTA TURNOS CADASTRADOS
    public static function contaTurnos()
    {
        $contagem = Turno::count();
        return $contagem;
    }

    // CONTA EQUIPAMENTOS CADASTRADOS
    public static function contaEquipamentos()
    {
        $contagem = Equipamento::count();
        return $contagem;
    }

    // CONTA AVARIAS CADASTRADOS
    public static function contaAvarias()
    {
        $contagem = Avaria::count();
        return $contagem;
    }

    //_________________________________________________________________________________________


    // ÚLTIMO CADASTRADO DAS ÁREAS

    // ÚLTIMO USUÁRIO CADASTRADO
    public static function ultimoCadastroUsuario()
    {
        $buscaItens = Usuario::get('usuario');
        $ultimo = $buscaItens->last()->usuario;
        return $ultimo;
    }

    // ÚLTIMO SITE CADASTRADO
    public static function ultimoCadastroSite()
    {
        $buscaItens = Site::get('descricao');
        $ultimo = $buscaItens->last()->descricao;
        return $ultimo;
    }

    // ÚLTIMO DEPARTAMENTO CADASTRADO
    public static function ultimoCadastroDepartamento()
    {
        $buscaItens = Departamento::get('departamento');
        $ultimo = $buscaItens->last()->departamento;
        return $ultimo;
    }

    // ÚLTIMO TURNO CADASTRADO
    public static function ultimoCadastroTurno()
    {
        $buscaItens = Turno::get('turno');
        $ultimo = $buscaItens->last()->turno;
        return $ultimo;
    }

    // ÚLTIMO EQUIPAMENTO CADASTRADO
    public static function ultimoCadastroEquipamento()
    {
        $buscaItens = Equipamento::get('patrimonio');
        $ultimo = $buscaItens->last()->patrimonio;
        return $ultimo;
    }

    // ÚLTIMA AVARIA CADASTRADA
    public static function ultimoCadastroAvaria()
    {
        $buscaItens = Avaria::get('avaria');
        $ultimo = $buscaItens->last()->avaria;
        return $ultimo;
    }
}
