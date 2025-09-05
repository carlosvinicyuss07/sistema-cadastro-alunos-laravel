@extends('layouts.app')

@section('content')

    <h1>Lista de Alunos</h1>

    <a href="{{ route('alunos.create') }}">Cadastrar Novo Aluno</a>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form method="GET" action="{{ route('alunos.index') }}">
        <input type="text" name="nome" placeholder="Buscar por nome"
               value="{{ request('nome') }}">

        <input type="number" name="idade" placeholder="Filtrar por idade"
               value="{{ request('idade') }}">

        <input type="number" step="0.1" name="nota" placeholder="Filtrar por nota"
               value="{{ request('nota') }}">

        <button type="submit">Filtrar</button>

        <a href="{{ route('alunos.index') }}">
            <button type="button">Limpar</button>
        </a>
    </form>

    <table border="1" cellpadding="5">
        <tr>
            <th>Nome</th>
            <th>Idade</th>
            <th>Nota</th>
            <th>Ações</th>
        </tr>
        @forelse($alunos as $aluno)
            <tr>
                <td>{{ $aluno->nome }}</td>
                <td>{{ $aluno->idade }}</td>
                <td>{{ $aluno->nota }}</td>
                <td>
                    <a href="{{ route('alunos.show', $aluno) }}">Ver</a>
                    <a href="{{ route('alunos.edit', $aluno) }}">Editar</a>
                    <form action="{{ route('alunos.destroy', $aluno) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Deseja excluir este aluno?')">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Nenhum aluno encontrado.</td>
            </tr>
        @endforelse
    </table>

    {{ $alunos->links('pagination::simple-default') }}

@endsection
