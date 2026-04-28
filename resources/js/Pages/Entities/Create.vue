<script setup>
defineProps({
    countries: Array,
    type: String,
});
</script>

<template>
    <div class="min-h-screen bg-slate-950 p-8 text-white">
        <h1 class="text-3xl font-bold">
            Criar {{ type === 'client' ? 'Cliente' : type === 'supplier' ? 'Fornecedor' : 'Entidade' }}
        </h1>

        <p class="mt-2 text-slate-400">
            Formulário de criação de entidade (em construção).
        </p>

        <div class="mt-6 p-4 bg-slate-800 rounded">
            <p class="text-sm text-slate-300">
                Aqui vamos criar o formulário completo com Shadcn Vue.
            </p>

            <div class="mt-4 text-sm text-slate-400">
                <p><strong>Países disponíveis:</strong></p>
                <ul class="list-disc ml-5 mt-2">
                    <li v-for="country in countries" :key="country.id">
                        {{ country.name }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
