<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index');
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
        $curso = Curso::findOrFail($id);
        return view('cursos.editar', compact('id','curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, $id)
    {
        try{
            
            $curso = Curso::findOrFail($id);

            $data = $request->only([
                'name', 'value', 'vacancies', 'registrations', 
                'registrations_up_to', 'description'
            ]);

            $data['is_active'] = $request->boolean('is_active', false);
            

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('images', 'public');
                $data['image'] = $imagePath;
            } else {
                $data['image'] = $curso->image;
            }

            if($data['image'] != null)
            {
                $curso->update($data);

                return redirect()->route('cursos')->with('success', [
                    'title' => 'Parabéns!',
                    'message' => 'O ' . $request->name . ' foi editado com sucesso!',
                ]);
            }

            $curso->update($data);

            return redirect()->route('cursos')->with('success', [
                'title' => 'Parabéns!',
                'message' => 'O ' . $request->name . ' foi editado com sucesso!',
            ]);

        } catch (Exception $exception) {
            return redirect()->back()->with('danger', [
                'title' => 'Erro ao editar o curso:',
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
    public function destroy($id)
    {
        $curso = Curso::find($id);

        $curso->delete();
        return redirect()->route('cursos')->with('success', [
            'title' => 'Parabéns!',
            'message' => 'Curso ' .  ' foi excluido com sucesso!',
        ]);
        
    }

    public function curso()
    {
        $cursos = Curso::all();
       
        return view('cursos.index', compact('cursos'));
    }

    public function cadastrarCursos(StoreCourseRequest $request)
    
    {
        try{
            
            $curso = Curso::create([
                'name' => $request->name,
                'value' => $request->value,
                'vacancies' => $request->vacancies,
                'registrations' => $request->registrations,
                'registrations_up_to' => $request->registrations_up_to,
                'description' => $request->description,
                'is_active' => $request->boolean('is_active'),
                'image' => $request->image,
            ]);

            if($curso['is_active'] == false)
            {
                return redirect()->route('cursos')->with('success', [
                    'title' => 'Parabéns!',
                    'message' => 'Curso ' . $request->name . ' foi criado com sucesso!',
                ]);
            }

            if($curso){
                return redirect()->route('cursos')->with('success', [
                    'title' => 'Parabéns!',
                    'message' => 'Curso ' . $request->name . ' foi criado com sucesso!',
                ]);
            }
                else {
                    return redirect()->back()->with('error', [
                        'title' => 'Aconteceu um erro!',
                        'message' => 'O curso ' . $request->name . ' não foi criado.',
                    ]);
                }
            }
                catch (Exception $exception) {
                    return redirect()->back()->with('error', [
                        'title' => 'Erro ao criar o curso:',
                        'message' => $exception->getMessage()
                    ]);
                }
     }

     public function vitrineDeCurso()
     {
        $cursos = Curso::all();

        return view('cursos.vitrine', compact('cursos'));
     }

     public function cadastrarNoCurso($cursoId)
     {
    
        $user = Auth::user();
    
        
        if ($user) {
           
            $curso = Curso::findOrFail($cursoId);
    
            
            if ($curso) {
                
                $user->cursos()->attach($curso);
    
               
                return redirect()->route('vitrine.curso')->with('success', 'Você foi inscrito no curso com sucesso!');
            }
        }
    
        
        return redirect()->route('vitrine.curso')->with('danger', 'Falha ao inscrever no curso. Por favor, tente novamente.');
    }

}
