@extends('layouts.app')

@section('content')
    <section class="mb-8 rounded-2xl border border-[#c5ad88] bg-[#f6ead2]/90 p-6 shadow">
        <h1 class="text-4xl font-bold text-[#3b2a1d]">Painel MyTaskFlow</h1>
        <p class="mt-2 max-w-2xl text-[#7b5a3a]">
            Organiza tarefas, acompanha prioridades e mantém o teu dia com mais foco e clareza.
        </p>
    </section>

    <div class="mb-6 rounded-2xl border border-[#c5ad88] bg-[#f6ead2]/90 p-5 shadow">
        <form method="GET" action="{{ route('tasks.index') }}" class="grid gap-4 md:grid-cols-4">
            <div>
                <label for="status" class="mb-2 block text-sm font-semibold text-[#4a3423]">Estado</label>
                <select name="status" id="status"
                        class="w-full rounded-xl border border-[#c5ad88] bg-[#fff8e8] px-4 py-3 text-[#3b2a1d] outline-none focus:border-[#8a5a32] focus:ring-2 focus:ring-[#c5ad88]/50">
                    <option value="all">Todos</option>
                    <option value="pending" @selected(request('status') === 'pending')>Pendente</option>
                    <option value="completed" @selected(request('status') === 'completed')>Concluída</option>
                </select>
            </div>

            <div>
                <label for="priority" class="mb-2 block text-sm font-semibold text-[#4a3423]">Prioridade</label>
                <select name="priority" id="priority"
                        class="w-full rounded-xl border border-[#c5ad88] bg-[#fff8e8] px-4 py-3 text-[#3b2a1d] outline-none focus:border-[#8a5a32] focus:ring-2 focus:ring-[#c5ad88]/50">
                    <option value="all">Todas</option>
                    <option value="low" @selected(request('priority') === 'low')>Baixa</option>
                    <option value="medium" @selected(request('priority') === 'medium')>Média</option>
                    <option value="high" @selected(request('priority') === 'high')>Alta</option>
                </select>
            </div>

            <div>
                <label for="due_date" class="mb-2 block text-sm font-semibold text-[#4a3423]">Data</label>
                <input type="date" name="due_date" id="due_date" value="{{ request('due_date') }}"
                       class="w-full rounded-xl border border-[#c5ad88] bg-[#fff8e8] px-4 py-3 text-[#3b2a1d] outline-none focus:border-[#8a5a32] focus:ring-2 focus:ring-[#c5ad88]/50">
            </div>

            <div class="flex items-end gap-2">
                <button type="submit"
                        class="w-full rounded-xl bg-[#4f565f] px-4 py-3 text-sm font-bold text-[#f6ead2] shadow transition hover:bg-[#3f4650]">
                    Filtrar
                </button>

                <a href="{{ route('tasks.index') }}"
                   class="rounded-xl border border-[#c5ad88] bg-[#fff8e8] px-4 py-3 text-sm font-bold text-[#4a3423] transition hover:bg-[#f6ead2]">
                    Limpar
                </a>
            </div>
        </form>
    </div>

    @if($tasks->count())
        <div class="space-y-4">
            @foreach($tasks as $task)
                <article class="rounded-2xl border border-[#c5ad88] bg-[#f6ead2]/90 p-5 shadow transition hover:bg-[#fff4dc]">
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
                        <div>
                            <div class="mb-3 flex flex-wrap items-center gap-2">
                                <h2 class="text-xl font-bold text-[#3b2a1d]">{{ $task->title }}</h2>

                                <span class="rounded-full px-3 py-1 text-xs font-bold
                                    {{ $task->priority === 'high' ? 'bg-[#8b2f2f]/15 text-[#8b2f2f] ring-1 ring-[#8b2f2f]/30' : '' }}
                                    {{ $task->priority === 'medium' ? 'bg-[#b7791f]/15 text-[#7c4a03] ring-1 ring-[#b7791f]/30' : '' }}
                                    {{ $task->priority === 'low' ? 'bg-[#4f6f3a]/15 text-[#3f5c2f] ring-1 ring-[#4f6f3a]/30' : '' }}">
                                    {{ $task->priority === 'high' ? 'Alta' : ($task->priority === 'medium' ? 'Média' : 'Baixa') }}
                                </span>

                                <span class="rounded-full px-3 py-1 text-xs font-bold
                                    {{ $task->status === 'completed' ? 'bg-[#4f6f3a]/15 text-[#3f5c2f] ring-1 ring-[#4f6f3a]/30' : 'bg-[#4f565f]/15 text-[#4f565f] ring-1 ring-[#4f565f]/30' }}">
                                    {{ $task->status === 'completed' ? 'Concluída' : 'Pendente' }}
                                </span>
                            </div>

                            <p class="mb-3 text-sm leading-6 text-[#6f4b2a]">
                                {{ $task->description ?: 'Sem descrição.' }}
                            </p>

                            <p class="text-sm text-[#7b5a3a]">
                                Vencimento:
                                <span class="font-semibold text-[#3b2a1d]">
                                    {{ $task->due_date ? $task->due_date->format('d/m/Y') : 'Sem data' }}
                                </span>
                            </p>
                        </div>

                        <div class="flex flex-wrap gap-2">
                            <a href="{{ route('tasks.show', $task) }}"
                               class="rounded-xl border border-[#c5ad88] bg-[#fff8e8] px-4 py-2 text-sm font-semibold text-[#4a3423] hover:bg-[#f6ead2]">
                                Ver
                            </a>

                            <a href="{{ route('tasks.edit', $task) }}"
                               class="rounded-xl border border-[#c5ad88] bg-[#ead8b8] px-4 py-2 text-sm font-semibold text-[#4a3423] hover:bg-[#f6ead2]">
                                Editar
                            </a>

                            <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                        class="rounded-xl bg-[#4f6f3a] px-4 py-2 text-sm font-bold text-[#fff8e8] hover:bg-[#3f5c2f]">
                                    {{ $task->status === 'completed' ? 'Reabrir' : 'Concluir' }}
                                </button>
                            </form>

                            <form action="{{ route('tasks.destroy', $task) }}" method="POST"
                                  onsubmit="return confirm('Tens a certeza que queres eliminar esta tarefa?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="rounded-xl bg-[#8b2f2f] px-4 py-2 text-sm font-bold text-[#fff8e8] hover:bg-[#742626]">
                                    Apagar
                                </button>
                            </form>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $tasks->links() }}
        </div>
    @else
        <div class="rounded-2xl border border-[#c5ad88] bg-[#f6ead2]/90 p-10 text-center shadow">
            <h2 class="text-2xl font-bold text-[#3b2a1d]">Ainda não tens tarefas</h2>

            <p class="mx-auto mt-3 max-w-md text-[#7b5a3a]">
                Cria a tua primeira tarefa para começares a organizar o teu dia.
            </p>

            <a href="{{ route('tasks.create') }}"
               class="mt-6 inline-flex rounded-xl bg-[#4f565f] px-5 py-3 text-sm font-bold text-[#f6ead2] hover:bg-[#3f4650]">
                Criar primeira tarefa
            </a>
        </div>
    @endif
@endsection
