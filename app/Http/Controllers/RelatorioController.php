<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use App\Models\Relatorio;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{

    // ENTREGA O EQUIPAMENTO
    public function entregaEquipamento(Request $request)
    {
        // VALIDAÇÃO DOS CAMPOS
        InputValidationsController::validationsEntregaEquipamento($request);

        // VERIFICA SE O EQUIPAMENTO SELECIONADO ESTÁ EM USO
        $verificaSituacaoEquipamento = Equipamento::where('patrimonio', $request->input('equipamento'))->first();
        if ($verificaSituacaoEquipamento->situacao === 'EM USO') {
            return redirect()->back()->withInput()->with('alertError', "Esse equipamento já está em uso.");
        }

        $equipamento = $request->input('equipamento');
        $colaborador = $request->input('colaborador');
        $agente_entrega = session('usuario.nome');

        Relatorio::insert([
            'equipamento' => $equipamento,
            'colaborador' => $colaborador,
            'agente_entrega' => $agente_entrega
        ]);

        // ALTERA A SITUAÇÃO DO EQUIPAMENTO ENTREGUE PARA "EM USO"
        Equipamento::where('patrimonio', $equipamento)->update([
            'situacao' => 'EM USO'
        ]);

        return redirect()->back()->with('alertSuccess', "Equipamento entregue para $colaborador com sucesso.");
    }

    // DEVOLVE O EQUIPAMENTO
    public function devolveEquipamento(Request $request, $id)
    {
        // VALIDAÇÃO DOS CAMPOS
        InputValidationsController::validationsDevolveEquipamento($request);

        $agente_devolucao = session('usuario.nome');
        $avaria = $request->input('avaria');
        $foto_avaria = $request->input('foto_avaria');
        $equipamento = $request->input('equipamento');

        // CASO NÃO HOUVER AVARIA
        if ($request->input('ha_avaria') === 'NÃO') {
            $avaria = 'NÃO';
        }

        $foto_avaria = $_FILES['foto_avaria'];
        $nome = $foto_avaria['name'];
        $tmp_name = $foto_avaria['tmp_name'];

        $extensao = pathinfo($nome, PATHINFO_EXTENSION);
        $novo_nome = uniqid() . '.' . $extensao;
        move_uploaded_file($tmp_name, "assets/uploads/$novo_nome");

        Relatorio::where('id', $id)->update([
            'agente_devolucao' => $agente_devolucao,
            'data_devolucao' => date('Y-m-d H:i:s'),
            'avaria' => $avaria,
            'foto_avaria' => "assets/uploads/$novo_nome"
        ]);

        Equipamento::where('patrimonio', $equipamento)->update([
            'situacao' => 'LIVRE'
        ]);

        return redirect('homepage')->with('alertSuccess', "Equipamento devolvido com sucesso.");
    }
}
