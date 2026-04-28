<script setup>
defineProps({
    entity: Object,
    countries: Array,
});
</script>

<template>
    <div class="min-h-screen bg-slate-950 p-8 text-white">
        <h1 class="text-3xl font-bold">
            Editar Entidade
        </h1>

        <p class="mt-2 text-slate-400">
            Edição da entidade (em construção).
        </p>

        <div class="mt-6 p-4 bg-slate-800 rounded">
            <p class="text-sm text-slate-300">
                Aqui vamos permitir editar todos os dados da entidade.
            </p>

            <div class="mt-4 text-sm text-slate-400">
                <p><strong>Nome:</strong> {{ entity.name }}</p>
                <p><strong>NIF:</strong> {{ entity.nif }}</p>
            </div>
        </div>
    </div>
</template>
