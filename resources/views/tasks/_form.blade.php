@csrf

<div class="space-y-6">
    <div>
        <label for="title" class="mb-2 block text-sm font-semibold text-[#4a3423]">Título</label>
        <input
            type="text"
            name="title"
            id="title"
            value="{{ old('title', $task->title ?? '') }}"
            class="w-full rounded-xl border border-[#c5ad88] bg-[#fff8e8] px-4 py-3 text-[#3b2a1d] outline-none focus:border-[#8a5a32] focus:ring-2 focus:ring-[#c5ad88]/50"
            required
        >
        @error('title')
            <p class="mt-2 text-sm text-[#8b2f2f]">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description" class="mb-2 block text-sm font-semibold text-[#4a3423]">Descrição</label>
        <textarea
            name="description"
            id="description"
            rows="5"
            class="w-full rounded-xl border border-[#c5ad88] bg-[#fff8e8] px-4 py-3 text-[#3b2a1d] outline-none focus:border-[#8a5a32] focus:ring-2 focus:ring-[#c5ad88]/50"
        >{{ old('description', $task->description ?? '') }}</textarea>
        @error('description')
            <p class="mt-2 text-sm text-[#8b2f2f]">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid gap-6 md:grid-cols-2">
        <div>
            <label for="due_date" class="mb-2 block text-sm font-semibold text-[#4a3423]">Data de vencimento</label>
            <input
                type="date"
                name="due_date"
                id="due_date"
                value="{{ old('due_date', isset($task) && $task->due_date ? $task->due_date->format('Y-m-d') : '') }}"
                class="w-full rounded-xl border border-[#c5ad88] bg-[#fff8e8] px-4 py-3 text-[#3b2a1d] outline-none focus:border-[#8a5a32] focus:ring-2 focus:ring-[#c5ad88]/50"
            >
            @error('due_date')
                <p class="mt-2 text-sm text-[#8b2f2f]">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="priority" class="mb-2 block text-sm font-semibold text-[#4a3423]">Prioridade</label>
            <select
                name="priority"
                id="priority"
                class="w-full rounded-xl border border-[#c5ad88] bg-[#fff8e8] px-4 py-3 text-[#3b2a1d] outline-none focus:border-[#8a5a32] focus:ring-2 focus:ring-[#c5ad88]/50"
                required
            >
                <option value="low" @selected(old('priority', $task->priority ?? 'medium') === 'low')>Baixa</option>
                <option value="medium" @selected(old('priority', $task->priority ?? 'medium') === 'medium')>Média</option>
                <option value="high" @selected(old('priority', $task->priority ?? 'medium') === 'high')>Alta</option>
            </select>
            @error('priority')
                <p class="mt-2 text-sm text-[#8b2f2f]">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap items-center gap-3">
        <button
            type="submit"
            class="rounded-xl bg-[#4f565f] px-6 py-3 text-sm font-bold text-[#f6ead2] shadow transition hover:bg-[#3f4650]"
        >
            Guardar
        </button>

        <a href="{{ route('tasks.index') }}"
           class="rounded-xl border border-[#c5ad88] bg-[#fff8e8] px-6 py-3 text-sm font-bold text-[#4a3423] transition hover:bg-[#f6ead2]">
            Cancelar
        </a>
    </div>
</div>
