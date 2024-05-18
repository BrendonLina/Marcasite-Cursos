<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect('dashboard');
        }

        return view('index');
    }

    public function login(Request $request)
    {
        $credenciais = $request->validate([
            'email' => ['required', 'email', 'max:40'],
            'password' => ['required', 'min:6']
        ],[
            'email.required' => 'Email é obrigatório.',
            'email.email' => 'Email inválido.',
            'email.max' => 'Caracteres máximo de 40 atingido.',
            'password.required' => 'Senha obrigatória.',
            'password.min' => 'Senha deve ter no minimo 6 caracteres.'
        ]);
        
        
        if(Auth::attempt($credenciais)){

            $request->session()->regenerate();
            
            return redirect()->intended('dashboard');
        }
        if(!Auth::check()){

            return redirect()->back()->with('danger','Email ou Senha incorreto');
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('index');
    }
}
