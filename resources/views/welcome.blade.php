{{-- 
|--------------------------------------------------------------------------
| View: Welcome
|--------------------------------------------------------------------------
| Initial CMS page with quick access to:
| - Public announcements
| - Create announcement (if logged in)
|
| UI:
| - Visible background (no white box)
| - Title with blue/orange gradient
| - Gradient buttons with shadow
| - Centered and responsive layout
|--------------------------------------------------------------------------
--}}

<x-layout title="Welcome">

    <div class="min-h-screen flex flex-col justify-center items-center bg-cover bg-center text-center"
        style="background-image: url('/images/bg.png')">

        {{-- Title with gradient --}}
        <h1
            class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-transparent bg-clip-text 
        bg-gradient-to-r from-blue-500 to-orange-500 drop-shadow-[0_4px_8px_rgba(0,0,0,0.7)] mb-16 text-center">
            Mini CMS Announcements
        </h1>

        {{-- Buttons --}}
        <div class="flex flex-wrap justify-center gap-4 sm:gap-6">

            {{-- Public announcements --}}
            <a href="{{ route('announcements.index') }}"
                class="px-4 py-2 text-sm sm:px-5 sm:py-3 sm:text-base md:px-6 md:py-3   md:text-lg
                        rounded font-semibold text-white
                        bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800
                        shadow-[0_4px_6px_rgba(0,0,0,0.4)] border border-blue-800
                        transform hover:scale-[1.02] transition duration-200">
                📢 View Announcements
            </a>




            {{-- If logged in: show Create Announcement --}}
            @auth
                <a href="{{ route('announcements.create') }}"
                    class="px-4 py-2 text-sm sm:px-5 sm:py-3 sm:text-base md:px-6 md:py-3 md:text-lg
                        rounded font-semibold text-black
                        bg-gradient-to-r from-yellow-300 to-yellow-500 hover:from-yellow-400 hover:to-yellow-600
                        shadow-[0_4px_6px_rgba(0,0,0,0.3)] border border-yellow-600
                        transform hover:scale-[1.02] transition duration-200">
                    ➕ Create Announcement                    
                </a>




            @endauth

        </div>

    </div>

</x-layout>
