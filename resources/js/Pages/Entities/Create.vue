<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineOptions({
    layout: AppLayout,
});

defineProps({
    countries: Array,
    type: String,
});
</script>

<template>
    <section class="rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] p-8 shadow-md">
        <h1 class="text-4xl font-bold">
            Criar {{ type === 'client' ? 'Cliente' : type === 'supplier' ? 'Fornecedor' : 'Entidade' }}
        </h1>

        <p class="mt-3 text-lg text-[#805f3d]">
            Formulário de criação de entidade.
        </p>
    </section>

    <section class="mt-8 rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] p-8 shadow-md">
        <p class="text-sm text-[#6f4b2a]">
            Aqui vamos construir o formulário completo com NIF, nome, morada,
            país, contactos, RGPD e estado.
        </p>

        <div class="mt-6 text-sm text-[#6f4b2a]">
            <p class="font-bold">Países disponíveis:</p>

            <ul class="mt-2 list-disc pl-5">
                <li v-for="country in countries" :key="country.id">
                    {{ country.name }}
                </li>
            </ul>
        </div>
    </section>
</template>
