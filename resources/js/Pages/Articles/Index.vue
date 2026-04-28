<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineOptions({
    layout: AppLayout,
});

defineProps({
    articles: Object,
});
</script>

<template>
    <section class="rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] p-8 shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold">Artigos</h1>

                <p class="mt-3 text-lg text-[#805f3d]">
                    Gestão de artigos disponíveis no sistema.
                </p>
            </div>

            <a
                href="/articles/create"
                class="rounded-xl border border-[#b89a68] bg-[#fff1d6] px-6 py-3 font-bold text-[#2f241b] shadow hover:bg-[#f8dfae]"
            >
                + Novo Artigo
            </a>
        </div>
    </section>

    <section class="mt-8 overflow-hidden rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] shadow-md">
        <table class="w-full text-left">
            <thead class="bg-[#535c66] text-[#fff1d6]">
                <tr>
                    <th class="px-6 py-4">Referência</th>
                    <th class="px-6 py-4">Foto</th>
                    <th class="px-6 py-4">Nome</th>
                    <th class="px-6 py-4">Descrição</th>
                    <th class="px-6 py-4">Preço</th>
                    <th class="px-6 py-4 text-right">Ações</th>
                </tr>
            </thead>

            <tbody>
                <tr v-if="!articles?.data?.length">
                    <td colspan="6" class="px-6 py-12 text-center text-[#805f3d]">
                        Ainda não existem artigos.
                    </td>
                </tr>

                <tr
                    v-for="article in articles.data"
                    :key="article.id"
                    class="border-t border-[#d9c39a] hover:bg-[#fff1d6]"
                >
                    <td class="px-6 py-4">{{ article.reference }}</td>
                    <td class="px-6 py-4">
                        <span class="text-[#805f3d]">Sem foto</span>
                    </td>
                    <td class="px-6 py-4 font-bold">{{ article.name }}</td>
                    <td class="px-6 py-4">{{ article.description || '-' }}</td>
                    <td class="px-6 py-4">{{ article.price }} €</td>
                    <td class="px-6 py-4 text-right">
                        <a
                            :href="`/articles/${article.id}/edit`"
                            class="rounded-lg border border-[#b89a68] px-4 py-2 font-bold hover:bg-[#f8dfae]"
                        >
                            Editar
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
</template>
