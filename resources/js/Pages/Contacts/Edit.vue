<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineOptions({
    layout: AppLayout,
});

defineProps({
    contact: Object,
});
</script>

<template>
    <section class="rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] p-8 shadow-md">
        <h1 class="text-4xl font-bold">Editar Contacto</h1>

        <p class="mt-3 text-lg text-[#805f3d]">
            Edição do contacto.
        </p>
    </section>

    <section class="mt-8 rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] p-8 shadow-md">
        <div v-if="contact" class="space-y-3 text-sm text-[#6f4b2a]">
            <p><strong>Nome:</strong> {{ contact.first_name }}</p>
            <p><strong>Apelido:</strong> {{ contact.last_name }}</p>
            <p><strong>Email:</strong> {{ contact.email }}</p>
        </div>

        <p v-else class="text-sm text-[#6f4b2a]">
            Aqui vamos permitir editar os dados do contacto.
        </p>
    </section>
</template>
