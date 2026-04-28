<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineOptions({
    layout: AppLayout,
});

defineProps({
    entity: Object,
    countries: Array,
});
</script>

<template>
    <section class="rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] p-8 shadow-md">
        <h1 class="text-4xl font-bold">Editar Entidade</h1>

        <p class="mt-3 text-lg text-[#805f3d]">
            Edição da entidade.
        </p>
    </section>

    <section class="mt-8 rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] p-8 shadow-md">
        <div v-if="entity" class="space-y-3 text-sm text-[#6f4b2a]">
            <p><strong>Nome:</strong> {{ entity.name }}</p>
            <p><strong>NIF:</strong> {{ entity.nif }}</p>
            <p><strong>Email:</strong> {{ entity.email || '-' }}</p>
        </div>

        <p v-else class="text-sm text-[#6f4b2a]">
            Aqui vamos permitir editar todos os dados da entidade.
        </p>
    </section>
</template>
