<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SapiensController extends Controller
{

    public static function listaColaboradores()
    {

        $host = "10.60.253.20";
        $opcoes = [
            "Database" => "sapiens",
            "Uid" => "consulta",
            "PWD" => "@dM1324",
            "TrustServerCertificate" => true,
            "Encrypt" => true
        ];

        $conn = sqlsrv_connect($host, $opcoes);

        if ($conn === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        $sql = "SELECT USU_NOMFUN, USU_NUMCAD
                FROM usu_tcadfun
                WHERE usu_dessit = 'Ativo'
                ORDER BY usu_nomfun";
        $query = sqlsrv_query($conn, $sql);

        if ($query === false) {
            die(print_r(sqlsrv_errors(), true));
        }
        $usuarios = [];
        while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
            $usuarios[] = $row;
        }

        return $usuarios;
    }

}
