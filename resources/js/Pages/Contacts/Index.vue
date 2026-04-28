<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineOptions({
    layout: AppLayout,
});

defineProps({
    contacts: Object,
});
</script>

<template>
    <section class="rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] p-8 shadow-md">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold">Contactos</h1>

                <p class="mt-3 text-lg text-[#805f3d]">
                    Gestão de contactos associados às entidades.
                </p>
            </div>

            <a
                href="/contacts/create"
                class="rounded-xl border border-[#b89a68] bg-[#fff1d6] px-6 py-3 font-bold text-[#2f241b] shadow hover:bg-[#f8dfae]"
            >
                + Novo Contacto
            </a>
        </div>
    </section>

    <section class="mt-8 overflow-hidden rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] shadow-md">
        <table class="w-full text-left">
            <thead class="bg-[#535c66] text-[#fff1d6]">
                <tr>
                    <th class="px-6 py-4">Nome</th>
                    <th class="px-6 py-4">Apelido</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Telefone</th>
                    <th class="px-6 py-4 text-right">Ações</th>
                </tr>
            </thead>

            <tbody>
                <tr v-if="!contacts?.data?.length">
                    <td colspan="5" class="px-6 py-12 text-center text-[#805f3d]">
                        Ainda não existem contactos.
                    </td>
                </tr>

                <tr
                    v-for="contact in contacts.data"
                    :key="contact.id"
                    class="border-t border-[#d9c39a] hover:bg-[#fff1d6]"
                >
                    <td class="px-6 py-4 font-bold">{{ contact.first_name }}</td>
                    <td class="px-6 py-4">{{ contact.last_name || '-' }}</td>
                    <td class="px-6 py-4">{{ contact.email || '-' }}</td>
                    <td class="px-6 py-4">{{ contact.phone || '-' }}</td>
                    <td class="px-6 py-4 text-right">
                        <a
                            :href="`/contacts/${contact.id}/edit`"
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
