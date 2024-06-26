<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user) {

            $cursosDoUsuario = $user->cursos;

            return view('alunos.index', compact('user','cursosDoUsuario'));

        }
        return view('alunos.index', compact('user','cursodousuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        $roles = Role::all();
        return view('dashboard.editar', compact('id','user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request,$id)
    {
       
        try{
            
            $user = User::findOrFail($id);

            $data = $request->only([
                'name', 'email', 'cpf','role_id'
            ]);

            $data['is_active'] = $request->boolean('is_active', false);

            $user->update($data);

            return redirect()->route('usuarios')->with('success', [
                'title' => 'Parabéns!',
                'message' => 'O ' . $request->name . ' foi editado com sucesso!',
            ]);

        } catch (Exception $exception) {
            return redirect()->back()->with('danger', [
                'title' => 'Erro ao editar o usuário:',
                'message' => $exception->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();
        return redirect()->route('usuarios')->with('success', [
            'title' => 'Parabéns!',
            'message' => 'Usuário ' .  ' foi excluido com sucesso!',
        ]);
    }

    public function usuarios()
    {
        $users = User::all();

        return view('Dashboard.usuarios', compact('users'));
    }
}
