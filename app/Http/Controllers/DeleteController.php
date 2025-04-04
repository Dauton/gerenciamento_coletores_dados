<?php

namespace App\Http\Controllers;

use App\Models\Avaria;
use App\Models\Site;
use App\Models\Turno;
use App\Models\Usuario;

class DeleteController extends Controller
{
    public function deleteUser($id)
    {
        Usuario::where('id', $id)->delete();
        return redirect('/usuarios')->with('alertSuccess', 'Usuário excluído com sucesso.');
    }
    public function deleteSite($id)
    {
        Site::where('id', $id)->delete();
        return redirect('/sites')->with('alertSuccess', 'Site excluído com sucesso.');
    }
    public function deleteAvaria($id)
    {
        Avaria::where('id', $id)->delete();
        return redirect('/avarias')->with('alertSuccess', 'Avaria excluída com sucesso.');
    }
    public function deleteTurno($id)
    {
        Turno::where('id', $id)->delete();
        return redirect('/turnos')->with('alertSuccess', 'Turno excluído com sucesso.');
    }
}
