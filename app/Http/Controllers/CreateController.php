<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Usuario;
use Illuminate\Http\Request;

class CreateController extends Controller
{

    // CRIAÇÃO DE USUÁRIO
    public function createUser(Request $request)
    {

        InputValidationsController::validationsCreateUser($request);

        $nome = $request->input('nome');
        $usuario = $request->input('usuario');
        $email = $request->input('email');
        $site = $request->input('site');
        $perfil = $request->input('perfil');
        $senha = $request->input('senha');
        $status = 'ATIVADO';

        Usuario::insert([
            'nome' => trim(mb_strtoupper($nome)),
            'usuario' => trim(mb_strtoupper($usuario)),
            'email' => trim(mb_strtoupper($email)),
            'site' => trim(mb_strtoupper($site)),
            'perfil' => trim(mb_strtoupper($perfil)),
            'senha' => trim(password_hash($senha, PASSWORD_ARGON2ID)),
            'status' => $status
        ]);

        return redirect('usuarios')->with('alertSuccess', 'Usuário cadastrado com sucesso.');

    }

    public function createSite(Request $request)
    {

        InputValidationsController::validationsSite($request);

        $descricao = $request->input('descricao');
        $created_by = session('usuario.nome');

        Site::insert([
            'descricao' => trim(mb_strtoupper($descricao)),
            'created_by' => $created_by
        ]);

        return redirect('/sites')->with('alertSuccess', 'Site cadastrado com sucesso.');

    }
}
