{{-- 
Component: Label
Etichetta riutilizzabile per i campi dei form.
--}}

@props(['for'])

<label for="{{ $for }}" class="block font-medium text-gray-700 mb-1">
    {{ $slot }}
</label>
