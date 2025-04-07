<?php

namespace App\Http\Controllers;

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
                'nome.required' => 'O nome deve ser preenchido.',
                'usuario.required' => 'O usuário deve ser preenchido.',
                'email.required' => 'O e-mail deve ser preenchido.',
                'email.email' => 'O e-mail informado não é válido.',
                'site.required' => 'O site deve ser preenchido.',
                'perfil.required' => 'O perfil deve ser preenchido.',
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
                'nome.required' => 'O nome deve ser preenchido.',
                'usuario.required' => 'O usuário deve ser preenchido.',
                'email.required' => 'O e-mail deve ser preenchido.',
                'email.email' => 'O e-mail informado não é válido.',
                'site.required' => 'O site deve ser preenchido.',
                'perfil.required' => 'O perfil deve ser preenchido.'
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
                'descricao.required' => 'A descrição deve ser preenchida.'
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
                'avaria.required' => 'A descrição da avaria deve ser preenchida.',
                'tipo_avaria.required' => 'O tipo da avaria deve ser preenchido.'
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
                'turno.required' => 'A descrição do turno deve ser preenchida.'
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
                'departamento.required' => 'A descrição do departamento deve ser preenchida.'
            ]
        );
    }

    // CREATE AND UPDATE EQUIPANENTOS
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
                'marca.required' => 'A marca deve ser preenchida.',
                'modelo.required' => 'O modelo deve ser preenchido.',
                'serial.required' => 'O serial deve ser preenchido.',
                'patrimonio.required' => 'O patrimonio deve ser informado.',
                'site_equipamento.required' => 'O site do equipamento deve ser preenchido.',
                'status.required' => 'O status deve ser preenchido.',
            ]
        );
    }
}
