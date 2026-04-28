<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineOptions({
    layout: AppLayout,
});

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
    <section class="rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] p-8 shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold">
                    {{ title(type) }}
                </h1>

                <p class="mt-3 text-lg text-[#805f3d]">
                    Gestão de {{ title(type).toLowerCase() }}.
                </p>
            </div>

            <a
                :href="createUrl(type)"
                class="rounded-xl border border-[#b89a68] bg-[#fff1d6] px-6 py-3 font-bold text-[#2f241b] shadow hover:bg-[#f8dfae]"
            >
                + Nova Entidade
            </a>
        </div>
    </section>

    <section class="mt-8 overflow-hidden rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] shadow-md">
        <table class="w-full text-left">
            <thead class="bg-[#535c66] text-[#fff1d6]">
                <tr>
                    <th class="px-6 py-4">NIF</th>
                    <th class="px-6 py-4">Nome</th>
                    <th class="px-6 py-4">Telefone</th>
                    <th class="px-6 py-4">Telemóvel</th>
                    <th class="px-6 py-4">Website</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4 text-right">Ações</th>
                </tr>
            </thead>

            <tbody>
                <tr v-if="!entities?.data?.length">
                    <td colspan="7" class="px-6 py-12 text-center text-[#805f3d]">
                        Ainda não existem registos.
                    </td>
                </tr>

                <tr
                    v-for="entity in entities.data"
                    :key="entity.id"
                    class="border-t border-[#d9c39a] hover:bg-[#fff1d6]"
                >
                    <td class="px-6 py-4">{{ entity.nif }}</td>
                    <td class="px-6 py-4 font-bold">{{ entity.name }}</td>
                    <td class="px-6 py-4">{{ entity.phone || '-' }}</td>
                    <td class="px-6 py-4">{{ entity.mobile || '-' }}</td>
                    <td class="px-6 py-4">{{ entity.website || '-' }}</td>
                    <td class="px-6 py-4">{{ entity.email || '-' }}</td>
                    <td class="px-6 py-4 text-right">
                        <a
                            :href="`/entities/${entity.id}/edit`"
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
