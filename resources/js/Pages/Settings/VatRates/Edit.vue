<script setup>
defineProps({
    vatRate: Object,
});
</script>

<template>
    <div class="min-h-screen bg-slate-950 p-8 text-white">
        <h1 class="text-3xl font-bold">Editar Taxa de IVA</h1>

        <p class="mt-2 text-slate-400">
            Edição da taxa de IVA (em construção).
        </p>

        <div class="mt-6 p-4 bg-slate-800 rounded">
            <p class="text-sm text-slate-300">
                Aqui vamos permitir editar o nome e a percentagem do IVA.
            </p>

            <div class="mt-4 text-sm text-slate-400">
                <p><strong>Nome:</strong> {{ vatRate.name }}</p>
                <p><strong>Taxa:</strong> {{ vatRate.rate }}%</p>
            </div>
        </div>
    </div>
</template>
