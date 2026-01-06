{{-- 
|--------------------------------------------------------------------------
| Component: Navbar
|--------------------------------------------------------------------------
| Navbar responsive con:
| - Effetto blur da desktop
| - Hamburger menu da mobile
| - Menu mobile apribile con Alpine.js
|--------------------------------------------------------------------------
--}}

<nav x-data="{ open: false }" class="fixed top-0 left-0 w-full z-50 bg-white/30 backdrop-blur-md border-b border-white/20">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex justify-between items-center">

        {{-- Logo --}}
        <a href="{{ route('home') }}" class="text-xl font-bold text-white drop-shadow">
            Mini CMS Annunci
        </a>

        {{-- Menu desktop --}}
        <div class="hidden md:flex space-x-6 text-white font-medium">
            <a href="{{ route('articles.index') }}">Articoli</a>
            <a href="{{ route('announcements.index') }}">Annunci</a>
            <a href="{{ route('announcements.mine') }}">I miei annunci</a>
        </div>

        {{-- Utente desktop --}}
        @auth
            <div class="hidden md:flex items-center space-x-4 text-white">
                <span>Ciao, {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-sm underline">Esci</button>
                </form>
            </div>
        @endauth

        {{-- Hamburger mobile --}}
        <button @click="open = !open" class="md:hidden text-white text-2xl">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>

    {{-- Menu mobile --}}
    <div x-show="open" x-transition
        class="md:hidden bg-white/20 backdrop-blur-md border-t border-white/20 text-blue-600 px-6 py-4 space-y-4">

        <a href="{{ route('articles.index') }}" class="block">Articoli</a>
        <a href="{{ route('announcements.index') }}" class="block">Annunci</a>
        <a href="{{ route('announcements.mine') }}" class="block">I miei annunci</a>

        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="underline">Esci</button>
            </form>
        @endauth
    </div>

</nav>
