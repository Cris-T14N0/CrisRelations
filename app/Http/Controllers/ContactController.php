<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('contacts.index', compact('users'));
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
            
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            
        ]);

        
        $validated += [
            'user_id' => $userId,
        ];


        # Gravar na BD 2
        $contact = new Contact();
        $contact->create($validated);

        # Feedback and redirect
        session()->flash('sucesso','Contacto criado!');
        return redirect(route('contacts.index'));
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}