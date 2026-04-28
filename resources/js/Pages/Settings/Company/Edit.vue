<script setup>
defineProps({
    company: Object,
});
</script>

<template>
    <div class="min-h-screen bg-slate-950 p-8 text-white">
        <div>
            <h1 class="text-3xl font-bold">Empresa</h1>

            <p class="mt-2 text-slate-400">
                Configurações dos dados da empresa usados na aplicação e nos PDFs.
            </p>
        </div>

        <div class="mt-8 rounded-lg border border-slate-700 bg-slate-900 p-6">
            <p class="text-sm text-slate-300">
                Formulário de edição dos dados da empresa em construção.
            </p>

            <div v-if="company" class="mt-6 grid gap-4 text-sm text-slate-300 md:grid-cols-2">
                <p><strong>Nome:</strong> {{ company.name }}</p>
                <p><strong>NIF:</strong> {{ company.tax_number }}</p>
                <p><strong>Morada:</strong> {{ company.address }}</p>
                <p><strong>Código Postal:</strong> {{ company.postal_code }}</p>
                <p><strong>Localidade:</strong> {{ company.city }}</p>
            </div>

            <div v-else class="mt-6 text-sm text-slate-400">
                Ainda não existem dados da empresa configurados.
            </div>
        </div>
    </div>
</template>
