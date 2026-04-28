<script setup>
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage();

const isActive = (route) => {
    return page.url.startsWith(route);
};
</script>

<template>
    <aside class="w-64 min-h-screen bg-slate-900 text-white p-4">
        <h1 class="text-xl font-bold mb-6">MyTaskFlow</h1>

        <nav class="space-y-2">

            <!-- CLIENTES -->
            <Link
                href="/clientes"
                class="block px-4 py-2 rounded hover:bg-slate-700"
                :class="{ 'bg-slate-700': isActive('/clientes') }"
            >
                Clientes
            </Link>

            <!-- FORNECEDORES -->
            <Link
                href="/fornecedores"
                class="block px-4 py-2 rounded hover:bg-slate-700"
                :class="{ 'bg-slate-700': isActive('/fornecedores') }"
            >
                Fornecedores
            </Link>

            <!-- CONTACTOS -->
            <Link
                href="/contacts"
                class="block px-4 py-2 rounded hover:bg-slate-700"
                :class="{ 'bg-slate-700': isActive('/contacts') }"
            >
                Contactos
            </Link>

            <!-- ARTIGOS -->
            <Link
                href="/articles"
                class="block px-4 py-2 rounded hover:bg-slate-700"
                :class="{ 'bg-slate-700': isActive('/articles') }"
            >
                Artigos
            </Link>

            <!-- SETTINGS -->
            <div class="mt-6 text-xs uppercase text-slate-400">
                Configurações
            </div>

            <Link
                href="/settings/countries"
                class="block px-4 py-2 rounded hover:bg-slate-700"
                :class="{ 'bg-slate-700': isActive('/settings/countries') }"
            >
                Países
            </Link>

            <Link
                href="/settings/vat-rates"
                class="block px-4 py-2 rounded hover:bg-slate-700"
                :class="{ 'bg-slate-700': isActive('/settings/vat-rates') }"
            >
                IVA
            </Link>

            <Link
                href="/settings/company"
                class="block px-4 py-2 rounded hover:bg-slate-700"
                :class="{ 'bg-slate-700': isActive('/settings/company') }"
            >
                Empresa
            </Link>

        </nav>
    </aside>
</template>
