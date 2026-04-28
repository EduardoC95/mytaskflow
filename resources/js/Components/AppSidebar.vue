<script setup>
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage();

const isActive = (route) => page.url.startsWith(route);
</script>

<template>
    <aside class="rounded-2xl border border-[#c5aa7c] bg-[#f6ecd6] p-5 shadow-md">
        <h2 class="mb-5 text-lg font-bold text-[#3b2a1d]">Menu</h2>

        <nav class="space-y-2">
            <Link href="/tasks" class="menu-link" :class="{ active: isActive('/tasks') }">
                Tarefas
            </Link>

            <Link href="/clientes" class="menu-link" :class="{ active: isActive('/clientes') }">
                Clientes
            </Link>

            <Link href="/fornecedores" class="menu-link" :class="{ active: isActive('/fornecedores') }">
                Fornecedores
            </Link>

            <Link href="/contacts" class="menu-link" :class="{ active: isActive('/contacts') }">
                Contactos
            </Link>

            <Link href="/articles" class="menu-link" :class="{ active: isActive('/articles') }">
                Artigos
            </Link>

            <div class="pt-5 text-xs font-bold uppercase tracking-wide text-[#805f3d]">
                Configurações
            </div>

            <Link href="/settings/countries" class="menu-link" :class="{ active: isActive('/settings/countries') }">
                Países
            </Link>

            <Link href="/settings/vat-rates" class="menu-link" :class="{ active: isActive('/settings/vat-rates') }">
                IVA
            </Link>

            <Link href="/settings/company" class="menu-link" :class="{ active: isActive('/settings/company') }">
                Empresa
            </Link>
        </nav>
    </aside>
</template>

<style scoped>
.menu-link {
    display: block;
    border-radius: 0.75rem;
    padding: 0.75rem 1rem;
    font-weight: 700;
    color: #3b2a1d;
    transition: 0.2s ease;
}

.menu-link:hover,
.menu-link.active {
    background: #535c66;
    color: #f6ead2;
}
</style>
