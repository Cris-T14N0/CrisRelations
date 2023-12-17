<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //Vai buscar todos os Users e Projetos
        $projects = Project::all();
        $users = User::all();

        //Mostrar view
        return view('projects.index', compact('users', 'projects',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = auth()->id();

        # Validação dos dados
        $validated = $request->validate([
            
            'name' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            
        ]);

        
        $validated += [
            'user_id' => $userId,
        ];


        # Gravar na BD 2
        $project = new Project();
        $project->create($validated);

        # Feedback and redirect
        session()->flash('sucesso','Projeto criado!');
        return redirect(route('projects.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit(Project $project): View
    {
        $users = User::all();
        return view('projects.edit', compact('users', 'project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'state' => 'required|string',
            'user_id' => 'required',
        ]);

        //Atualizar na DB
        $project->update($validated);

        //feedback e Redirect
        session() -> flash('sucesso', 'Projeto Editado!');
        return redirect(route('projects.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
