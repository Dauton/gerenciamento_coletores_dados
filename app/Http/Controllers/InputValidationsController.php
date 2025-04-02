<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputValidationsController extends Controller
{
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

    public static function validationsUser(Request $request)
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
}
