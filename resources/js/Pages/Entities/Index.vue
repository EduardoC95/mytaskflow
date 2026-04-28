<script setup>
defineProps({
    entities: Object,
    type: String,
});

const title = (type) => {
    if (type === 'client') return 'Clientes';
    if (type === 'supplier') return 'Fornecedores';
    return 'Entidades';
};

const createUrl = (type) => {
    if (type === 'client') return '/entities/create?type=client';
    if (type === 'supplier') return '/entities/create?type=supplier';
    return '/entities/create';
};
</script>

<template>
    <div class="min-h-screen bg-slate-950 p-8 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold">
                    {{ title(type) }}
                </h1>

                <p class="mt-2 text-slate-400">
                    Gestão de {{ title(type).toLowerCase() }}.
                </p>
            </div>

            <a
                :href="createUrl(type)"
                class="rounded bg-cyan-500 px-4 py-2 text-sm font-medium text-white hover:bg-cyan-600"
            >
                + Nova Entidade
            </a>
        </div>

        <div class="mt-8 overflow-hidden rounded-lg border border-slate-700 bg-slate-900">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-800 text-slate-300">
                    <tr>
                        <th class="px-4 py-3">NIF</th>
                        <th class="px-4 py-3">Nome</th>
                        <th class="px-4 py-3">Telefone</th>
                        <th class="px-4 py-3">Telemóvel</th>
                        <th class="px-4 py-3">Website</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3 text-right">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <tr
                        v-for="entity in entities.data"
                        :key="entity.id"
                        class="border-t border-slate-800 hover:bg-slate-800/60"
                    >
                        <td class="px-4 py-3">{{ entity.nif }}</td>
                        <td class="px-4 py-3 font-medium">{{ entity.name }}</td>
                        <td class="px-4 py-3">{{ entity.phone || '-' }}</td>
                        <td class="px-4 py-3">{{ entity.mobile || '-' }}</td>
                        <td class="px-4 py-3">{{ entity.website || '-' }}</td>
                        <td class="px-4 py-3">{{ entity.email || '-' }}</td>
                        <td class="px-4 py-3 text-right">
                            <a
                                :href="`/entities/${entity.id}/edit`"
                                class="text-cyan-400 hover:text-cyan-300"
                            >
                                Editar
                            </a>
                        </td>
                    </tr>

                    <tr v-if="!entities.data.length">
                        <td colspan="7" class="px-4 py-8 text-center text-slate-400">
                            Ainda não existem registos.
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
