<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Hash;
use Auth;
use Illuminate\Support\Facades\Redirect;
use App\User;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('criar-conta');
    }

    public function createAccount(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ])->validate();

        //criar o usuario
        $user = User::create(
            [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password'))
            ]
        );
        //autenticar usuário
        Auth::login($user);

        return Redirect::to('/');
    }


}
