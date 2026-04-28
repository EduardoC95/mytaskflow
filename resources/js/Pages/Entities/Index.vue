<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, router } from '@inertiajs/vue3';

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

const destroyEntity = (entity) => {
    if (confirm(`Tens a certeza que queres apagar "${entity.name}"?`)) {
        router.delete(`/entities/${entity.id}`);
    }
};
</script>

<template>
    <section class="rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] p-8 shadow-md">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-4xl font-bold">
                    {{ title(type) }}
                </h1>

                <p class="mt-3 text-lg text-[#805f3d]">
                    Gestão de {{ title(type).toLowerCase() }}.
                </p>
            </div>

            <Link
                :href="createUrl(type)"
                class="rounded-xl border border-[#b89a68] bg-[#fff1d6] px-6 py-3 text-center font-bold text-[#2f241b] shadow hover:bg-[#f8dfae]"
            >
                + Nova Entidade
            </Link>
        </div>
    </section>

    <section class="mt-8 overflow-hidden rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] shadow-md">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[1000px] text-left">
                <thead class="bg-[#535c66] text-[#fff1d6]">
                    <tr>
                        <th class="px-6 py-4">NIF</th>
                        <th class="px-6 py-4">Nome</th>
                        <th class="px-6 py-4">País</th>
                        <th class="px-6 py-4">Telefone</th>
                        <th class="px-6 py-4">Telemóvel</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Estado</th>
                        <th class="px-6 py-4 text-right">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-if="!entities?.data?.length">
                        <td colspan="8" class="px-6 py-12 text-center text-[#805f3d]">
                            Ainda não existem registos.
                        </td>
                    </tr>

                    <tr
                        v-for="entity in entities.data"
                        :key="entity.id"
                        class="border-t border-[#d9c39a] transition hover:bg-[#fff1d6]"
                    >
                        <td class="px-6 py-4">{{ entity.nif }}</td>

                        <td class="px-6 py-4">
                            <div class="font-bold">{{ entity.name }}</div>

                            <div class="mt-1 flex flex-wrap gap-1">
                                <span
                                    v-if="entity.is_client"
                                    class="rounded-full bg-[#4f6f3a]/15 px-2 py-1 text-xs font-bold text-[#3f5c2f] ring-1 ring-[#4f6f3a]/30"
                                >
                                    Cliente
                                </span>

                                <span
                                    v-if="entity.is_supplier"
                                    class="rounded-full bg-[#b7791f]/15 px-2 py-1 text-xs font-bold text-[#7c4a03] ring-1 ring-[#b7791f]/30"
                                >
                                    Fornecedor
                                </span>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            {{ entity.country?.name || '-' }}
                        </td>

                        <td class="px-6 py-4">{{ entity.phone || '-' }}</td>
                        <td class="px-6 py-4">{{ entity.mobile || '-' }}</td>
                        <td class="px-6 py-4">{{ entity.email || '-' }}</td>

                        <td class="px-6 py-4">
                            <span
                                :class="entity.is_active
                                    ? 'bg-[#4f6f3a]/15 text-[#3f5c2f] ring-[#4f6f3a]/30'
                                    : 'bg-[#8b2f2f]/15 text-[#8b2f2f] ring-[#8b2f2f]/30'"
                                class="rounded-full px-3 py-1 text-xs font-bold ring-1"
                            >
                                {{ entity.is_active ? 'Ativo' : 'Inativo' }}
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-2">
                                <Link
                                    :href="`/entities/${entity.id}/edit`"
                                    class="rounded-lg border border-[#b89a68] px-4 py-2 font-bold hover:bg-[#f8dfae]"
                                >
                                    Editar
                                </Link>

                                <button
                                    type="button"
                                    @click="destroyEntity(entity)"
                                    class="rounded-lg bg-[#8b2f2f] px-4 py-2 font-bold text-[#fff8e8] hover:bg-[#742626]"
                                >
                                    Apagar
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section
        v-if="entities?.links?.length > 3"
        class="mt-6 flex flex-wrap justify-center gap-2"
    >
        <Link
            v-for="link in entities.links"
            :key="link.label"
            :href="link.url || '#'"
            v-html="link.label"
            class="rounded-xl border border-[#c5aa7c] px-4 py-2 text-sm font-bold"
            :class="[
                link.active
                    ? 'bg-[#535c66] text-[#f6ead2]'
                    : 'bg-[#f6ecd6] text-[#3b2a1d] hover:bg-[#fff1d6]',
                !link.url ? 'pointer-events-none opacity-40' : ''
            ]"
        />
    </section>
</template>
