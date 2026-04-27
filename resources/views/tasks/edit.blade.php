@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-4xl rounded-2xl border border-[#c5ad88] bg-[#f6ead2]/90 p-6 shadow">
        <h1 class="mb-6 text-4xl font-bold text-[#3b2a1d]">Editar tarefa</h1>

        <form action="{{ route('tasks.update', $task) }}" method="POST">
            @method('PUT')
            @include('tasks._form')
        </form>
    </div>
@endsection
