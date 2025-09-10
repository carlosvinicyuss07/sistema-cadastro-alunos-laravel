<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexAlunoRequest;
use App\Http\Requests\StoreAlunoRequest;
use App\Http\Requests\UpdateAlunoRequest;
use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexAlunoRequest $request)
    {
        $query = Aluno::query();

        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        if ($request->filled('idade')) {
            $query->where('idade', $request->idade);
        }

        if ($request->filled('nota')) {
            $query->where('nota', $request->nota);
        }

        $alunos = $query->orderBy('nome')->paginate(5);

        $alunos->appends($request->all());

        return view('alunos.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Acesso negado.');
        }

        return view('alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlunoRequest $request)
    {

        try {
            DB::transaction(function () use ($request) {
                Aluno::create($request->validated());
            });

            return redirect()
                ->route('alunos.index')
                ->with('success', 'Aluno cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()
                ->route('alunos.index')
                ->with('error', 'Erro ao cadastrar aluno!');
        }

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
    public function update(UpdateAlunoRequest $request, Aluno $aluno)
    {

        try {
            DB::beginTransaction();

            $aluno->update($request->validated());
            DB::commit();

            return redirect()
                ->route('alunos.index')
                ->with('success', 'Aluno atualizado com sucesso!');
        }
        catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->route('alunos.index')
                ->with('error', 'Erro ao atualizar aluno!');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aluno $aluno)
    {
        try {

            DB::beginTransaction();
            $aluno->delete();
            DB::commit();

            return redirect()
                ->route('alunos.index')
                ->with('success', 'Aluno removido com sucesso!');
        }
        catch (\Exception $e) {
            DB::rollBack();
            return redirect()
                ->route('alunos.index')
                ->with('error', 'Erro ao remover aluno!');
        }

    }
}
