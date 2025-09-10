@extends('layouts.app')

@section('content')

    <h1>Detalhes do Aluno</h1>
    <p><b>ID:</b> {{ $aluno->id }}</p>
    <p><b>Nome:</b> {{ $aluno->nome }}</p>
    <p><b>Idade:</b> {{ $aluno->idade }}</p>
    <p><b>Nota:</b> {{ $aluno->nota }}</p>
    <a href="{{ route('alunos.index') }}" class="link-botao-red">Voltar</a>

@endsection
