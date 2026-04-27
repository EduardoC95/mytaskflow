<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyTaskFlow</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#ead8b8] text-[#3b2a1d] antialiased">
    <div class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(255,255,255,0.35),_transparent_38%)]">
        <header class="border-b border-[#c5ad88] bg-[#4f565f] shadow-lg">
            <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-5 sm:px-6 lg:px-8">
                <a href="{{ route('tasks.index') }}" class="text-3xl font-bold tracking-tight text-[#f6ead2]">
                    MyTaskFlow
                </a>

                <a href="{{ route('tasks.create') }}"
                   class="rounded-xl border border-[#c8ad83] bg-[#f6ead2] px-5 py-3 text-sm font-bold text-[#3b2a1d] shadow transition hover:bg-[#fff4dc]">
                    Nova tarefa
                </a>
            </div>
        </header>

        <main class="mx-auto max-w-6xl px-4 py-8 sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 rounded-2xl border border-[#b99664] bg-[#f6ead2] px-5 py-4 text-[#6f4b2a] shadow">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
