@extends('layouts.app')

@section('content')
    <h1>Editar Aluno</h1>

    <form action="{{ route('alunos.update', $aluno) }}" method="POST">
        @csrf
        @method('PUT')
        Nome: <input type="text" name="nome" value="{{ $aluno->nome }}" required> <br>
        Idade: <input type="number" name="idade" value="{{ $aluno->idade }}" required> <br>
        Nota: <input type="number" step="0.1" name="nota" value="{{ $aluno->nota }}" required> <br>
        <button type="submit" class="link-botao">Atualizar</button>
    </form>

@endsection
