<?php

namespace App\Http\Controllers;

use App\Models\Avaria;
use App\Models\Site;
use App\Models\Turno;
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

    public function updateAvaria(Request $request, $id)
    {

        InputValidationsController::validationsAvaria($request);

        $avaria = $request->input('avaria');
        $tipo_avaria = $request->input('tipo_avaria');

        Avaria::where('id', $id)->update([
            'avaria' => trim(mb_strtoupper($avaria)),
            'tipo_avaria' => trim(mb_strtoupper($tipo_avaria)),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect('/avarias')->with('alertSuccess', 'Avaria editada com sucesso.');
    }

    public function updateTurno(Request $request, $id)
    {
        InputValidationsController::validationsTurnos($request);

        $turno = $request->input('turno');
        $updated_at = date('Y-m-d H:i:s');

        Turno::where('id', $id)->update(
            [
                'turno' => $turno,
                'updated_at' => $updated_at
            ]
        );

        return redirect('/turnos')->with('alertSuccess', 'Turno editado com sucesso.');
    }
}
