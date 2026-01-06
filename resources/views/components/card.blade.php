{{-- 
Component: Card
Card responsive per annunci e articoli.
--}}

<div class="bg-white/90 backdrop-blur-md rounded-lg shadow p-5 flex flex-col gap-3 w-full max-w-sm">

    @isset($title)
        <h2 class="text-xl font-bold">{{ $title }}</h2>
    @endisset

    @isset($subtitle)
        <p class="text-gray-600 text-sm">{{ $subtitle }}</p>
    @endisset

    <div class="text-gray-800">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="pt-3 border-t border-gray-300 text-sm">
            {{ $footer }}
        </div>
    @endisset
</div>
