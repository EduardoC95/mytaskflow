<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineOptions({
    layout: AppLayout,
});

defineProps({
    vatRate: Object,
});
</script>

<template>
    <section class="rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] p-8 shadow-md">
        <h1 class="text-4xl font-bold">Editar Taxa de IVA</h1>

        <p class="mt-3 text-lg text-[#805f3d]">
            Edição da taxa de IVA.
        </p>
    </section>

    <section class="mt-8 rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] p-8 shadow-md">
        <div v-if="vatRate" class="space-y-3 text-sm text-[#6f4b2a]">
            <p><strong>Nome:</strong> {{ vatRate.name }}</p>
            <p><strong>Taxa:</strong> {{ vatRate.rate }}%</p>
        </div>

        <p v-else class="text-sm text-[#6f4b2a]">
            Aqui vamos permitir editar o nome e a percentagem do IVA.
        </p>
    </section>
</template>
