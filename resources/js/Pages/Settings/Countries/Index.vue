<script setup>
defineProps({
    countries: Object,
});
</script>

<template>
    <div class="min-h-screen bg-slate-950 p-8 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold">Países</h1>

                <p class="mt-2 text-slate-400">
                    Gestão de países disponíveis no sistema.
                </p>
            </div>

            <a
                href="/settings/countries/create"
                class="rounded bg-cyan-500 px-4 py-2 text-sm font-medium text-white hover:bg-cyan-600"
            >
                + Novo País
            </a>
        </div>

        <div class="mt-8 overflow-hidden rounded-lg border border-slate-700 bg-slate-900">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-800 text-slate-300">
                    <tr>
                        <th class="px-4 py-3">Código</th>
                        <th class="px-4 py-3">Nome</th>
                        <th class="px-4 py-3">Estado</th>
                        <th class="px-4 py-3 text-right">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <tr
                        v-for="country in countries.data"
                        :key="country.id"
                        class="border-t border-slate-800 hover:bg-slate-800/60"
                    >
                        <td class="px-4 py-3">{{ country.code }}</td>
                        <td class="px-4 py-3 font-medium">{{ country.name }}</td>
                        <td class="px-4 py-3">
                            <span
                                :class="country.is_active
                                    ? 'text-green-400'
                                    : 'text-red-400'"
                            >
                                {{ country.is_active ? 'Ativo' : 'Inativo' }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-right">
                            <a
                                :href="`/settings/countries/${country.id}/edit`"
                                class="text-cyan-400 hover:text-cyan-300"
                            >
                                Editar
                            </a>
                        </td>
                    </tr>

                    <tr v-if="!countries.data.length">
                        <td colspan="4" class="px-4 py-8 text-center text-slate-400">
                            Ainda não existem países.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
