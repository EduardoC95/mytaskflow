<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineOptions({
    layout: AppLayout,
});
</script>

<template>
    <section class="rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] p-8 shadow-md">
        <h1 class="text-4xl font-bold">Criar Contacto</h1>

        <p class="mt-3 text-lg text-[#805f3d]">
            Formulário de criação de contacto.
        </p>
    </section>

    <section class="mt-8 rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] p-8 shadow-md">
        <p class="text-sm text-[#6f4b2a]">
            Aqui vamos construir o formulário com:
            nome, apelido, entidade associada e contactos.
        </p>
    </section>
</template>
