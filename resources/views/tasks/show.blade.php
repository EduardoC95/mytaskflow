@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-4xl rounded-2xl border border-[#c5ad88] bg-[#f6ead2]/90 p-6 shadow">
        <div class="mb-8 flex flex-wrap items-start justify-between gap-4">
            <div>
                <h1 class="text-4xl font-bold text-[#3b2a1d]">{{ $task->title }}</h1>

                <p class="mt-2 text-sm text-[#7b5a3a]">
                    Criada em {{ $task->created_at->format('d/m/Y H:i') }}
                </p>
            </div>

            <div class="flex flex-wrap gap-2">
                <a href="{{ route('tasks.edit', $task) }}"
                   class="rounded-xl border border-[#c5ad88] bg-[#fff8e8] px-5 py-3 text-sm font-bold text-[#4a3423] transition hover:bg-[#f6ead2]">
                    Editar
                </a>

                <a href="{{ route('tasks.index') }}"
                   class="rounded-xl bg-[#4f565f] px-5 py-3 text-sm font-bold text-[#f6ead2] transition hover:bg-[#3f4650]">
                    Voltar
                </a>
            </div>
        </div>

        <div class="space-y-6">
            <div>
                <h2 class="mb-2 text-sm font-bold uppercase tracking-wide text-[#7b5a3a]">
                    Descrição
                </h2>

                <p class="leading-7 text-[#3b2a1d]">
                    {{ $task->description ?: 'Sem descrição.' }}
                </p>
            </div>

            <div class="grid gap-4 sm:grid-cols-3">
                <div class="rounded-2xl border border-[#c5ad88] bg-[#fff8e8] p-5">
                    <p class="text-sm text-[#7b5a3a]">Prioridade</p>
                    <p class="mt-2 text-xl font-bold text-[#3b2a1d]">
                        {{ $task->priority === 'high' ? 'Alta' : ($task->priority === 'medium' ? 'Média' : 'Baixa') }}
                    </p>
                </div>

                <div class="rounded-2xl border border-[#c5ad88] bg-[#fff8e8] p-5">
                    <p class="text-sm text-[#7b5a3a]">Estado</p>
                    <p class="mt-2 text-xl font-bold text-[#3b2a1d]">
                        {{ $task->status === 'completed' ? 'Concluída' : 'Pendente' }}
                    </p>
                </div>

                <div class="rounded-2xl border border-[#c5ad88] bg-[#fff8e8] p-5">
                    <p class="text-sm text-[#7b5a3a]">Vencimento</p>
                    <p class="mt-2 text-xl font-bold text-[#3b2a1d]">
                        {{ $task->due_date ? $task->due_date->format('d/m/Y') : 'Sem data' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
