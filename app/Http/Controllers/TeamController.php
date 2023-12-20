<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Http\Events\RequestHandled;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $teams = Team::all();
        //Mostrar view
        return view('teams.index', compact('users', 'teams'));
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
        //
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
    public function edit(Team $team): View
    {
        $teamId = $team->id;

        //Vai buscar os users sem Equipa
        $usersNotInTeam = User::whereDoesntHave('teams', function ($query) use ($teamId) {
            $query->where('team_id', $teamId);
        })->get();

        // Load users associated with the team
        $usersInTeam = $team->users;
        
        // Mostrar view
        return view('teams.edit', compact('usersNotInTeam', 'usersInTeam', 'team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        //Dificulta a vida dos maus
        $validated = $request->validate([]);

        //Request é o que foi selecionado e depois estou a esepcificar o que quero do que foi selecionado
        if($request->user_id != null){

            foreach ($request->user_id as $user) {

                //Coloca na tabela
                $team->users()->syncWithoutDetaching([$user]);

            }
        }
        else
        {
            
        }
        

        session()->flash('Yipiiee!!!');
        return redirect()->route('teams.edit', compact('team'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function remove(Request $request, Team $team)
    {
        //Dificulta a vida dos maus
        $validated = $request->validate([]);

        //Request é o que foi selecionado e depois estou a esepcificar o que quero do que foi selecionado
        if($request->user_id != null){
            foreach ($request->user_id as $user) {

                //Detach tira da tabela
                $team->users()->detach([$user]);

            }
        }
        else{}

        session()->flash('Yipiiee!!!');
        return redirect()->route('teams.edit', compact('team'));
    }
}
