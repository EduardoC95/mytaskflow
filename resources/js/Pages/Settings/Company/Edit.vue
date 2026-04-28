<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineOptions({
    layout: AppLayout,
});

defineProps({
    company: Object,
});
</script>

<template>
    <section class="rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] p-8 shadow-md">
        <h1 class="text-4xl font-bold">Empresa</h1>

        <p class="mt-3 text-lg text-[#805f3d]">
            Configurações dos dados da empresa usados na aplicação e nos PDFs.
        </p>
    </section>

    <section class="mt-8 rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] p-8 shadow-md">
        <p class="text-sm text-[#6f4b2a]">
            Formulário de edição dos dados da empresa.
        </p>

        <div v-if="company" class="mt-6 grid gap-4 text-sm text-[#6f4b2a] md:grid-cols-2">
            <p><strong>Nome:</strong> {{ company.name }}</p>
            <p><strong>NIF:</strong> {{ company.tax_number }}</p>
            <p><strong>Morada:</strong> {{ company.address }}</p>
            <p><strong>Código Postal:</strong> {{ company.postal_code }}</p>
            <p><strong>Localidade:</strong> {{ company.city }}</p>
        </div>

        <div v-else class="mt-6 text-sm text-[#6f4b2a]">
            Ainda não existem dados da empresa configurados.
        </div>
    </section>
</template>
