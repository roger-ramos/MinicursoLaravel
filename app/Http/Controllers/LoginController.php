<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function showLogin()
    {
        //nome do arquivo sem o blade.php
        return view('login');
    }

    //autenticar o usuario
    public function submitLogin(Request $request)
    {
        //REQUEST: dados que vem do formulario
        //validar os dados do usuario
        //email e password
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ])->validate();
        
        //tentar autenticar
        if(Auth::attempt($request->only('email', 'password'))){
            //autenticado
            return Redirect::to('/');
        }else{
            //credenciais incorretas
            return Redirect::back()->withErrors(['Credenciais inválidas']);
        }

        
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}
