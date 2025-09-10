<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Alunos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

@php
    /**
    * @var \App\Models\Aluno $aluno
    */
@endphp

@section('content')

    @if(Auth::check() && Auth::user()->role === 'admin')
        <a href="{{ route('alunos.create') }}" class="link-botao">Cadastrar Novo Aluno</a>
    @endif

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

        <button type="submit" class="link-botao">Filtrar</button>

        <a href="{{ route('alunos.index') }}">
            <button type="button" class="link-botao-red">Limpar</button>
        </a>
    </form>

    <table class="table-auto border-collapse border border-gray-400 w-full text-left">
        <thead>
        <tr>
            <th class="border border-gray-400 px-4 py-2">Nome</th>
            <th class="border border-gray-400 px-4 py-2">Idade</th>
            <th class="border border-gray-400 px-4 py-2">Nota</th>
            <th class="border border-gray-400 px-4 py-2">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($alunos as $aluno)
            <tr>
                <td class="border border-gray-400 px-4 py-2">{{ $aluno->nome }}</td>
                <td class="border border-gray-400 px-4 py-2">{{ $aluno->idade }}</td>
                <td class="border border-gray-400 px-4 py-2">{{ $aluno->nota }}</td>
                <td class="border border-gray-400 px-4 py-2">
                    <a href="{{ route('alunos.show', $aluno) }}" class="text-blue-500">Ver</a>

                    @if(Auth::check() && Auth::user()->role === 'admin')
                        |
                        <a href="{{ route('alunos.edit', $aluno) }}" class="text-green-500">Editar</a> |
                        <form action="{{ route('alunos.destroy', $aluno) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('Tem certeza que deseja excluir esse aluno da lista?')">Excluir</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    {{ $alunos->links('pagination::simple-default') }}

@endsection

</x-app-layout>
