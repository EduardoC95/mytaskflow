<script setup>
defineProps({
    contacts: Object,
});
</script>

<template>
    <div class="min-h-screen bg-slate-950 p-8 text-white">
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold">Contactos</h1>

            <a
                href="/contacts/create"
                class="bg-cyan-500 hover:bg-cyan-600 px-4 py-2 rounded text-sm font-medium"
            >
                + Novo Contacto
            </a>
        </div>

        <p class="mt-2 text-slate-400">
            Lista de contactos (em construção).
        </p>

        <div class="mt-6 bg-slate-800 rounded p-4">
            <p class="text-sm text-slate-300">
                Aqui vamos colocar a data-table com Shadcn.
            </p>
        </div>
    </div>
</template>
