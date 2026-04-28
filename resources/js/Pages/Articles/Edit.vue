<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineOptions({
    layout: AppLayout,
});

defineProps({
    article: Object,
});
</script>

<template>
    <section class="rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] p-8 shadow-md">
        <h1 class="text-4xl font-bold">Editar Artigo</h1>

        <p class="mt-3 text-lg text-[#805f3d]">
            Edição do artigo.
        </p>
    </section>

    <section class="mt-8 rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] p-8 shadow-md">
        <div v-if="article" class="space-y-3 text-sm text-[#6f4b2a]">
            <p><strong>Referência:</strong> {{ article.reference }}</p>
            <p><strong>Nome:</strong> {{ article.name }}</p>
            <p><strong>Preço:</strong> {{ article.price }} €</p>
        </div>

        <p v-else class="text-sm text-[#6f4b2a]">
            Aqui vamos carregar os dados do artigo e permitir edição.
        </p>
    </section>
</template>
