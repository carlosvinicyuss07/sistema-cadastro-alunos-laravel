<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alunos = Aluno::paginate(5); // adiciona paginação automática
        return view('alunos.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'idade' => 'required|integer',
            'nota' => 'required|numeric',
        ]);

        Aluno::create($request->all());

        return redirect()->route('alunos.index')
                        ->with('success', 'Aluno cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aluno $aluno)
    {
        return view('alunos.show', compact('aluno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aluno $aluno)
    {
        return view('alunos.edit', compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aluno $aluno)
    {
        $request->validate([
           'nome' => 'required|string|max:255',
           'idade' => 'required|integer',
           'nota' => 'required|numeric',
        ]);

        $aluno->update($request->all());

        return redirect()->route('alunos.index')
                        ->with('success', 'Aluno atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aluno $aluno)
    {
        $aluno->delete();

        return redirect()->route('alunos.index')
                        ->with('success', 'Aluno removido com sucesso!');
    }
}
