<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Usuario;
use DateTime;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function updateUser(Request $request, $id)
    {

        InputValidationsController::validationsUpdateUser($request);

        $nome = $request->input('nome');
        $usuario = $request->input('usuario');
        $email = $request->input('email');
        $site = $request->input('site');
        $perfil = $request->input('perfil');

        Usuario::where('id', $id)->update([
            'nome' => trim(mb_strtoupper($nome)),
            'usuario' => trim(mb_strtoupper($usuario)),
            'email' => trim(mb_strtoupper($email)),
            'site' => trim(mb_strtoupper($site)),
            'perfil' => trim(mb_strtoupper($perfil))
        ]);

        return redirect('/usuarios')->with('alertSuccess', 'Usuário editado com sucesso.');

    }

    public function updateSite(Request $request, $id)
    {

        InputValidationsController::validationsSite($request);

        $descricao = $request->input('descricao');
        
        Site::where('id', $id)->update([
            'descricao' => trim(mb_strtoupper($descricao)),
            'updated_at' => date('Y-m-d H:i:s') 
        ]);

        return redirect('/sites')->with('alertSuccess', 'Site editado com sucesso.');
    }
}
