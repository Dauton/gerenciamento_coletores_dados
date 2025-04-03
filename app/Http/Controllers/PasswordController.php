<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function updatePassword(Request $request, $id)
    {

        InputValidationsController::validationsUpdatePassword($request);

        $senha = $request->input('senha');

        Usuario::where('id', $id)->update([
            'senha' => password_hash($senha, PASSWORD_ARGON2ID)
        ]);

        if($id == session('usuario.id')) {
            return redirect(route('homepage'))->with('alertSuccess', 'Senha resetada com sucesso.');
        }
            return redirect("/update-usuario/$id")->with('alertSuccess', 'Senha resetada com sucesso.');
    }
}   
