<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;

class AuthController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect('dashboard');
        }

        return view('index');
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpf' => $request->cpf,
            'is_active' => 1,
            'role_id' => 2,
        ]);

        if($user){
            return redirect()->route('cadastro.usuario')->with('success', [
                'title' => 'Parabéns!',
                'message' => 'Usuário ' . $request->name . ' foi criado com sucesso!',
            ]);
        } else {
            return redirect()->back()->with('error', [
                'title' => 'Aconteceu um erro!',
                'message' => 'O usuário ' . $request->name . ' não foi criado.',
            ]);
        }
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

    public function cadastroAluno()
    {
        return view('cadastroaluno');
    }
}
