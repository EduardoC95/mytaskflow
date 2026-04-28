<script setup>
defineProps({
    country: Object,
});
</script>

<template>
    <div class="min-h-screen bg-slate-950 p-8 text-white">
        <h1 class="text-3xl font-bold">Editar País</h1>

        <p class="mt-2 text-slate-400">
            Edição do país (em construção).
        </p>

        <div class="mt-6 p-4 bg-slate-800 rounded">
            <p class="text-sm text-slate-300">
                Aqui vamos permitir editar o código e nome do país.
            </p>

            <div class="mt-4 text-sm text-slate-400">
                <p><strong>Código:</strong> {{ country.code }}</p>
                <p><strong>Nome:</strong> {{ country.name }}</p>
            </div>
        </div>
    </div>
</template>
