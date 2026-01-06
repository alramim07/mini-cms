{{-- 
Component: Button Group
Scopo: contenitore responsive per gruppi di pulsanti
Uso: <x-button-group> ... </x-button-group>
--}}

<div
    {{ $attributes->merge([
        'class' => 'w-full max-w-xl mx-auto flex flex-wrap justify-center gap-4 sm:gap-6 mt-6',
    ]) }}>
    {{ $slot }}
</div>
