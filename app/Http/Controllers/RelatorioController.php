<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use App\Models\Relatorio;
use App\Models\Site;
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

        $site = session('usuario.site');
        $equipamento = $request->input('equipamento');
        $colaborador = $request->input('colaborador');
        $departamento = $request->input('departamento');
        $turno = $request->input('turno');
        $agente_entrega = session('usuario.nome');

        Relatorio::insert([
            'site' => $site,
            'equipamento' => $equipamento,
            'colaborador' => $colaborador,
            'departamento' => $departamento,
            'turno' => $turno,
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

        // LÓGICA DA FOTO DA AVARIA
        $foto_avaria = $_FILES['foto_avaria'];
        $nome = $foto_avaria['name'];
        $tmp_name = $foto_avaria['tmp_name'];

        $extensao = pathinfo($nome, PATHINFO_EXTENSION);
        $novo_nome = date('d-m-Y-') . uniqid() . '.' . $extensao;
        move_uploaded_file($tmp_name, "assets/uploads/$novo_nome");
        $arquivo_gravado = "assets/uploads/$novo_nome";

        // CASO NÃO HOUVER AVARIA
        if ($request->input('ha_avaria') === 'NÃO') {
            $avaria = 'NÃO';
            $arquivo_gravado = NULL;
        }

        Relatorio::where('id', $id)->update([
            'agente_devolucao' => $agente_devolucao,
            'data_devolucao' => now(),
            'avaria' => $avaria,
            'foto_avaria' => $arquivo_gravado
        ]);

        Equipamento::where('patrimonio', $equipamento)->update([
            'situacao' => 'LIVRE'
        ]);

        return redirect('homepage')->with('alertSuccess', "Equipamento devolvido com sucesso.");
    }

    // BUSCA RELATÓRIOS
    public function buscaRelatorio(Request $request)
    {
        $data_inicio = $request->input('data_inicio');
        $data_final = $request->input('data_final');
        $site = $request->input('site');
        $equipamento = $request->input('equipamento');

        $query = Relatorio::query()->where('site', session('usuario.site'))->limit(200);

        if ($data_inicio && $data_final) {
            $data_inicio .= ' 00:00:00';
            $data_final  .= ' 23:59:59';
            $query->whereBetween('data_entrega', [$data_inicio, $data_final]);
        }
        if ($site) {
            $query->where('site', $site);
        }
        if ($equipamento) {
            $query->where('equipamento', $equipamento);
        }

        $relatorios = $query->orderBy('data_devolucao')->get();
        $sites = SapiensController::listaSites();
        $equipamentos = Equipamento::all();

        if(count($relatorios) < 1) {
            return view('relatorios',[
                'relatorios' => $relatorios,
                'sites' => $sites,
                'equipamentos' => $equipamentos,
                'alertError '=> 'Nenhum valor encontrado'
            ]);
        }
        return view('relatorios', [
            'relatorios' => $relatorios,
            'sites' => $sites,
            'equipamentos' => $equipamentos,
            'alertInfo' => 'Exibindo relatório conforme dados buscados'
        ]);
    }
}
