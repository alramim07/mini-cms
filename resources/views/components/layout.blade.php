{{-- 
Component: Layout principale adattato
Scopo: struttura HTML base con sfondo, navbar, toast, contenuto centrato e footer
Uso: <x-layout :title="$title"> ... </x-layout>
--}}

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Mini CMS Portfolio' }}</title>

    {{-- Tailwind via Vite --}}
    @vite('resources/css/app.css')

    {{-- Alpine.js per toast e menu mobile --}}
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="min-h-screen flex flex-col bg-cover bg-center text-white"
    style="background-image: url('{{ asset('images/bg.png') }}');">

    {{-- Toast di successo --}}
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
            class="fixed top-4 right-4 bg-green-600 text-white px-4 py-2 rounded shadow-lg z-50">
            {{ session('success') }}
        </div>
    @endif

    {{-- Navbar --}}
    <x-navbar />

    {{-- Messaggi di errore generali --}}
    @if ($errors->any())
        <x-alert type="error">
            Ci sono degli errori nel form. Controlla i campi e riprova.
        </x-alert>
    @endif

    {{-- Contenuto dinamico centrato e responsive --}}
    <main class="flex flex-col justify-center items-center flex-1 px-4 sm:px-6 lg:px-8">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <x-footer />

</body>

</html>
