<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen bg-[#ead8b8] text-[#3b2a1d] antialiased">
        <div class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(255,255,255,0.35),_transparent_38%)]">
            <header class="border-b border-[#c5ad88] bg-[#4f565f] shadow-lg">
                <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-5 sm:px-6 lg:px-8">
                    <a href="/tasks" class="text-3xl font-bold tracking-tight text-[#f6ead2]">
                        MyTaskFlow
                    </a>

                    <nav class="flex items-center gap-3">
                        <a href="/tasks" class="nav-link">Tarefas</a>

                        <Link href="/clientes" class="nav-link">Clientes</Link>
                        <Link href="/fornecedores" class="nav-link">Fornecedores</Link>
                        <Link href="/contacts" class="nav-link">Contactos</Link>
                        <Link href="/articles" class="nav-link">Artigos</Link>
                    </nav>

                    <a
                        href="/tasks/create"
                        class="rounded-xl border border-[#c8ad83] bg-[#f6ead2] px-5 py-3 text-sm font-bold text-[#3b2a1d] shadow transition hover:bg-[#fff4dc]"
                    >
                        Nova tarefa
                    </a>
                </div>
            </header>

            <main class="mx-auto max-w-6xl px-4 py-8 sm:px-6 lg:px-8">
                <slot />
            </main>
        </div>
    </div>
</template>

<style scoped>
.nav-link {
    border-radius: 0.75rem;
    padding: 0.75rem 1rem;
    font-size: 0.875rem;
    font-weight: 700;
    color: #f6ead2;
    transition: 0.2s ease;
}

.nav-link:hover {
    background: #f6ead2;
    color: #3b2a1d;
}
</style>
