<script setup>
defineProps({
    articles: Object,
});
</script>

<template>
    <div class="min-h-screen bg-slate-950 p-8 text-white">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold">Artigos</h1>

            <a
                href="/articles/create"
                class="bg-cyan-500 hover:bg-cyan-600 px-4 py-2 rounded text-sm font-medium"
            >
                + Novo Artigo
            </a>
        </div>

        <p class="mt-2 text-slate-400">
            Lista de artigos (em construção).
        </p>

        <div class="mt-6 bg-slate-800 rounded p-4">
            <p class="text-sm text-slate-300">
                Aqui vamos colocar a data-table com Shadcn.
            </p>
        </div>
    </div>
</template>
