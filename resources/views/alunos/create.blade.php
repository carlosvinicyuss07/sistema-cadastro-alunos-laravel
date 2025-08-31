@extends('layouts.app')

@section('content')

    <h1>Novo Aluno</h1>

    <form action="{{ route('alunos.store') }}" method="POST">
        @csrf
        Nome: <input type="text" name="nome" required> <br>
        Idade: <input type="number" name="idade" required> <br>
        Nota: <input type="number" step="0.1" name="nota" required> <br>
        <button type="submit">Salvar</button>
    </form>

@endsection
