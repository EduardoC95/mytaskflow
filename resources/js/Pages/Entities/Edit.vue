<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';

defineOptions({
    layout: AppLayout,
});

const props = defineProps({
    entity: Object,
    countries: Array,
});

const form = useForm({
    is_client: Boolean(props.entity?.is_client),
    is_supplier: Boolean(props.entity?.is_supplier),
    nif: props.entity?.nif ?? '',
    name: props.entity?.name ?? '',
    address: props.entity?.address ?? '',
    postal_code: props.entity?.postal_code ?? '',
    city: props.entity?.city ?? '',
    country_id: props.entity?.country_id ?? '',
    phone: props.entity?.phone ?? '',
    mobile: props.entity?.mobile ?? '',
    website: props.entity?.website ?? '',
    email: props.entity?.email ?? '',
    gdpr_consent: Boolean(props.entity?.gdpr_consent),
    notes: props.entity?.notes ?? '',
    is_active: Boolean(props.entity?.is_active),
});

const submit = () => {
    form.put(`/entities/${props.entity.id}`);
};
</script>

<template>
    <section class="rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] p-8 shadow-md">
        <h1 class="text-4xl font-bold">Editar Entidade</h1>

        <p class="mt-3 text-lg text-[#805f3d]">
            Atualiza os dados da entidade.
        </p>
    </section>

    <section class="mt-8 rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] p-8 shadow-md">
        <form @submit.prevent="submit" class="space-y-6">
            <div>
                <label class="mb-2 block font-bold">Tipo</label>

                <div class="flex gap-6">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" v-model="form.is_client">
                        Cliente
                    </label>

                    <label class="flex items-center gap-2">
                        <input type="checkbox" v-model="form.is_supplier">
                        Fornecedor
                    </label>
                </div>

                <p v-if="form.errors.type" class="mt-1 text-sm text-red-700">
                    {{ form.errors.type }}
                </p>
            </div>

            <div class="grid gap-5 md:grid-cols-2">
                <div>
                    <label class="mb-2 block font-bold">NIF *</label>
                    <input v-model="form.nif" class="input" type="text">
                    <p v-if="form.errors.nif" class="error">{{ form.errors.nif }}</p>
                </div>

                <div>
                    <label class="mb-2 block font-bold">Nome *</label>
                    <input v-model="form.name" class="input" type="text">
                    <p v-if="form.errors.name" class="error">{{ form.errors.name }}</p>
                </div>

                <div>
                    <label class="mb-2 block font-bold">Morada</label>
                    <input v-model="form.address" class="input" type="text">
                </div>

                <div>
                    <label class="mb-2 block font-bold">Código Postal</label>
                    <input v-model="form.postal_code" class="input" type="text" placeholder="0000-000">
                    <p v-if="form.errors.postal_code" class="error">{{ form.errors.postal_code }}</p>
                </div>

                <div>
                    <label class="mb-2 block font-bold">Localidade</label>
                    <input v-model="form.city" class="input" type="text">
                </div>

                <div>
                    <label class="mb-2 block font-bold">País</label>
                    <select v-model="form.country_id" class="input">
                        <option value="">Selecionar país</option>
                        <option v-for="country in countries" :key="country.id" :value="country.id">
                            {{ country.name }}
                        </option>
                    </select>
                </div>

                <div>
                    <label class="mb-2 block font-bold">Telefone</label>
                    <input v-model="form.phone" class="input" type="text">
                </div>

                <div>
                    <label class="mb-2 block font-bold">Telemóvel</label>
                    <input v-model="form.mobile" class="input" type="text">
                </div>

                <div>
                    <label class="mb-2 block font-bold">Website</label>
                    <input v-model="form.website" class="input" type="text">
                </div>

                <div>
                    <label class="mb-2 block font-bold">Email</label>
                    <input v-model="form.email" class="input" type="email">
                    <p v-if="form.errors.email" class="error">{{ form.errors.email }}</p>
                </div>
            </div>

            <div>
                <label class="mb-2 block font-bold">Observações</label>
                <textarea v-model="form.notes" class="input min-h-28"></textarea>
            </div>

            <div class="flex flex-wrap gap-6">
                <label class="flex items-center gap-2 font-bold">
                    <input type="checkbox" v-model="form.gdpr_consent">
                    Consentimento RGPD
                </label>

                <label class="flex items-center gap-2 font-bold">
                    <input type="checkbox" v-model="form.is_active">
                    Ativo
                </label>
            </div>

            <div class="flex justify-end gap-3">
                <a
                    href="/clientes"
                    class="rounded-xl border border-[#b89a68] bg-[#fff1d6] px-6 py-3 font-bold text-[#2f241b] hover:bg-[#f8dfae]"
                >
                    Cancelar
                </a>

                <button
                    type="submit"
                    :disabled="form.processing"
                    class="rounded-xl bg-[#4f565f] px-6 py-3 font-bold text-[#f6ead2] hover:bg-[#3f4650] disabled:opacity-50"
                >
                    Guardar Alterações
                </button>
            </div>
        </form>
    </section>
</template>

<style scoped>
.input {
    width: 100%;
    border-radius: 0.75rem;
    border: 1px solid #c5aa7c;
    background: #fff8e8;
    padding: 0.75rem 1rem;
    color: #3b2a1d;
    outline: none;
}

.input:focus {
    border-color: #8a5a32;
    box-shadow: 0 0 0 3px rgba(197, 170, 124, 0.35);
}

.error {
    margin-top: 0.25rem;
    font-size: 0.875rem;
    color: #991b1b;
}
</style>
