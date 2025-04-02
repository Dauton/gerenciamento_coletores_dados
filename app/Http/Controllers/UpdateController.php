<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function updateUser(Request $request, $id)
    {
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
}
