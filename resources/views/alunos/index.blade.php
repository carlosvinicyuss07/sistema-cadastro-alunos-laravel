@extends('layouts.app')

@section('content')

    <h1>Lista de Alunos</h1>

    <a href="{{ route('alunos.create') }}">Cadastrar Novo Aluno</a>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Nota</th>
            <th>Ações</th>
        </tr>
        @foreach($alunos as $aluno)
            <tr>
                <td>{{ $aluno->id }}</td>
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
        @endforeach
    </table>

    {{ $alunos->links() }}

@endsection
