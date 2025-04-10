<?php

namespace App\Http\Controllers;

use App\Models\Equipamento;
use Illuminate\Http\Request;

class InputValidationsController extends Controller
{

    // LOGIN VALIDATIONS
    public static function validationsLogin(Request $request)
    {
        $request->validate(
            [
                'usuario' => 'required',
                'senha' => 'required'
            ],
            [
                'usuario.required' => 'O usuário deve ser informado.',
                'senha.required' => 'A senha deve ser informada.'
            ]
        );
    }

    // CREATE USER VALIDATIONS
    public static function validationsCreateUser(Request $request)
    {
        $request->validate(
            [
                'nome' => ['required'],
                'usuario' => ['required'],
                'email' => ['required', 'email'],
                'site' => ['required'],
                'perfil' => ['required'],
                'senha' => ['required', 'min: 12', 'regex: /[a-z]/', 'regex: /[A-Z]/', 'regex: /[0-9]/', 'regex: /[!@#$%^&*(),.?":{}|<>]/'],
                'repete_senha' => ['required', 'same:senha']
            ],
            [
                'nome.required' => 'O nome deve ser informado.',
                'usuario.required' => 'O usuário deve ser informado.',
                'email.required' => 'O e-mail deve ser informado.',
                'email.email' => 'O e-mail informado não é válido.',
                'site.required' => 'O site deve ser informado.',
                'perfil.required' => 'O perfil deve ser informado.',
                'senha.required' => 'A senha deve ser informada.',
                'senha.min' => 'A senha deve possuir pelo menos :min caracteres',
                'senha.regex' => 'A senha deve possuir pelo menos uma letra maiúscula, uma letra minuscula, um número e um caractere especial.',
                'repete_senha.required' => 'A senha deve ser confirmada.',
                'repete_senha.same' => 'A senhas não conferem.'
            ]
        );
    }

    // UPDATE USER VALIDATIONS
    public static function validationsUpdateUser(Request $request)
    {
        $request->validate(
            [
                'nome' => ['required'],
                'usuario' => ['required'],
                'email' => ['required', 'email'],
                'site' => ['required'],
                'perfil' => ['required']
            ],
            [
                'nome.required' => 'O nome deve ser informado.',
                'usuario.required' => 'O usuário deve ser informado.',
                'email.required' => 'O e-mail deve ser informado.',
                'email.email' => 'O e-mail informado não é válido.',
                'site.required' => 'O site deve ser informado.',
                'perfil.required' => 'O perfil deve ser informado.'
            ]
        );
    }

    // RESET PASSWORD VALIDATIONS
    public static function validationsUpdatePassword(Request $request)
    {
        $request->validate(
            [
                'senha' => ['required', 'min: 12', 'regex: /[a-z]/', 'regex: /[A-Z]/', 'regex: /[0-9]/', 'regex: /[!@#$%^&*(),.?":{}|<>]/'],
                'repete_senha' => ['required', 'same:senha']
            ],
            [
                'senha.required' => 'A senha deve ser informada.',
                'senha.min' => 'A senha deve possuir pelo menos :min caracteres',
                'senha.regex' => 'A senha deve possuir pelo menos uma letra maiúscula, uma letra minuscula, um número e um caractere especial.',
                'repete_senha.required' => 'A senha deve ser confirmada.',
                'repete_senha.same' => 'A senhas não conferem.'
                ]

            );
    }


    // CREATE AND UPDATE SITE VALIDATIONS
    public static function validationsSite(Request $request)
    {
        $request->validate(
            [
                'descricao' => ['required']
            ],
            [
                'descricao.required' => 'A descrição deve ser informada.'
            ]
        );
    }

    // CREATE AND UPDATE AVARIAS
    public static function validationsAvaria(Request $request)
    {
        $request->validate(
            [
                'avaria' => ['required'],
                'tipo_avaria' => ['required']
            ],
            [
                'avaria.required' => 'A descrição da avaria deve ser informada.',
                'tipo_avaria.required' => 'O tipo da avaria deve ser informado.'
            ]
        );
    }

    // CREATE AND UPDATE TURNOS
    public static function validationsTurnos(Request $request)
    {
        $request->validate(
            [
                'turno'=> ['required']
            ],
            [
                'turno.required' => 'A descrição do turno deve ser informada.'
            ]
        );
    }

    // CREATE AND UPDATE DEPARTAMENTOS
    public static function validationsDepartamento(Request $request)
    {
        $request->validate(
            [
                'departamento' => ['required'],
            ],
            [
                'departamento.required' => 'A descrição do departamento deve ser informada.'
            ]
        );
    }

    // CREATE AND UPDATE EQUIPAMENTOS
    public static function validationsEquipamento(Request $request)
    {
        $request->validate(
            [
                'marca' => ['required'],
                'modelo' => ['required'],
                'serial' => ['required'],
                'patrimonio' => ['required'],
                'site_equipamento' => ['required'],
                'status' => ['required']
            ],
            [
                'marca.required' => 'A marca deve ser informada.',
                'modelo.required' => 'O modelo deve ser informado.',
                'serial.required' => 'O serial deve ser informado.',
                'patrimonio.required' => 'O patrimonio deve ser informado.',
                'site_equipamento.required' => 'O site do equipamento deve ser informado.',
                'status.required' => 'O status deve ser informado.',
            ]
        );
    }

    public static function validationsEntregaEquipamento(Request $request)
    {
        $request->validate(
            [
                'equipamento' => ['required'],
                'colaborador' => ['required'],
                'turno' => ['required']
            ],
            [
                'equipamento.required' => 'O equipamento a ser entregue deve ser informado.',
                'colaborador' => 'O dado do colaborador deve ser informado.',
                'turno' => 'O turno deve ser informado.'
            ]
        );
    }

    public static function validationsDevolveEquipamento(Request $request)
    {
        $request->validate(
            [
                'ha_avaria' => ['required'],
            ],
            [
                'ha_avaria' => 'Deve ser informado se houve não avaria no equipamento.',
            ]
        );
        if($request->input('ha_avaria') === 'SIM') {
            $request->validate(
                [
                    'avaria' => ['required'],
                    'foto_avaria' => ['required', 'extensions:png,jpg,jpeg']
                ],
                [
                    'avaria' => 'A descrição da avaria deve ser informada.',
                    'foto_avaria' => 'A foto da avaria deve ser anexada.',
                    'foto_avaria.extensions' => 'O formato de imagem anxado é inválido ou não permitido.'
                ]
            );
        }
    }
}
