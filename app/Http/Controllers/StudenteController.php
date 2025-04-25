<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studente;
class StudenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Studente::query();

    if ($request->filled('nome')) {
        $nome = $request->nome;
        $query->where('Nome', 'like', '%' . $nome . '%')
              ->orderByRaw("CASE WHEN Nome = ? THEN 0 ELSE 1 END", [$nome]);
    }

    if ($request->filled('cognome')) {
        $query->where('Cognome', 'like', '%' . $request->cognome . '%');
    }

    if ($request->filled('classe')) {
        $query->where('Anno', 'like', '%' . $request->classe . '%');
    }

    if ($request->filled('sezione')) {
        $query->where('Sezione', 'like', '%' . $request->sezione . '%');
    }

    if ($request->filled('specializzazione')) {
        $query->where('Specializzazione', 'like', '%' . $request->specializzazione . '%');
    }

    $studenti = $query->orderBy('ID')->paginate(10);

    return view('app', compact('studenti'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //route --> \studenti\create
        return view('studenti.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nome' => 'required|string|max:25',
            'Cognome' => 'required|string|max:25',
            'Anno' => 'required|integer|between:1,5',
            'Sezione' => 'required|string|max:1',
            'Specializzazione' => 'required|string|max:20',
        ]);
    
        \App\Models\Studente::create($validated);
    
        return redirect()->route('home')->with('success', 'Studente aggiunto con successo.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //route --> 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //route --> \studente\{id}\edit
        $studente=Studente::findorFail($id);
        return view('studenti.edit',["studente" => $studente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validate the input data
         $request->validate([
            'Nome' => 'required|string|max:25',
            'Cognome' => 'required|string|max:25',
            'Anno' => 'required|integer|between:1,5',
            'Sezione' => 'required|string|max:1',
            'Specializzazione' => 'required|string|max:20',
        ]);

        // Find the student by ID
        $studente = Studente::findOrFail($id);

        // Update the student's information
        $studente->update([
            'Nome' => $request->Nome,
            'Cognome' => $request->Cognome,
            'Anno' => $request->Anno,
            'Sezione' => $request->Sezione,
            'Specializzazione' => $request->Specializzazione,
        ]);

        // Redirect back to the students' list or any other page with a success message
        return redirect()->route('home')->with('success', 'Studente aggiornato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $studente = Studente::findOrFail($id);
    $studente->delete();

    return redirect()->route('home')->with('success', 'Studente eliminato con successo.');
}

}
