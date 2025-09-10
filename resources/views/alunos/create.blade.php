@extends('layouts.app')

@section('content')

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>Novo Aluno</h1>

    <form action="{{ route('alunos.store') }}" method="POST">
        @csrf
        Nome: <input type="text" name="nome" required> <br>
        Idade: <input type="number" name="idade" required> <br>
        Nota: <input type="number" step="0.1" name="nota" required> <br>
        <button type="submit" class="link-botao">Salvar</button>
    </form>

@endsection
