<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineOptions({
    layout: AppLayout,
});

defineProps({
    country: Object,
});
</script>

<template>
    <section class="rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] p-8 shadow-md">
        <h1 class="text-4xl font-bold">Editar País</h1>

        <p class="mt-3 text-lg text-[#805f3d]">
            Edição do país.
        </p>
    </section>

    <section class="mt-8 rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] p-8 shadow-md">
        <div v-if="country" class="space-y-3 text-sm text-[#6f4b2a]">
            <p><strong>Código:</strong> {{ country.code }}</p>
            <p><strong>Nome:</strong> {{ country.name }}</p>
        </div>

        <p v-else class="text-sm text-[#6f4b2a]">
            Aqui vamos permitir editar o código e nome do país.
        </p>
    </section>
</template>
