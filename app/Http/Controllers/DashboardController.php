<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreCourseRequest;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Auth::user()->name;

        return view('dashboard.index', compact('data'));
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
        // return view('cursos.editar', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function curso()
    {
        return view('cursos.index');
    }

    public function cadastrarCursos(StoreCourseRequest $request)
    {
        try{
            // $this->authorize('create', User::class);

            $curso = Curso::create([
                'name' => $request->name,
                'value' => $request->value,
                'vacancies' => $request->vacancies,
                'registrations' => $request->registrations,
                'registrations_up_to' => $request->registrations_up_to,
                'description' => $request->description,
                'is_active' => $request->is_active,
                'image' => $request->image,
            ]);

            if($curso){
                return redirect()->route('cadastrar.cursos')->with('success', [
                    'title' => 'Parabéns!',
                    'message' => 'Curso ' . $request->name . ' foi criado com sucesso!',
                ]);
            } else {
                return redirect()->back()->with('error', [
                    'title' => 'Aconteceu um erro!',
                    'message' => 'O Curso ' . $request->name . ' não foi criado.',
                ]);
            }
        } catch (Exception $exception) {
            return redirect()->back()->with('error', [
                'title' => 'Erro ao criar o usuário:',
                'message' => $exception->getMessage()
            ]);
        }
    }
}
