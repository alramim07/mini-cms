{{-- 
Component: Alert
Scopo: mostra messaggi di successo o errore.
Props:
    - type: success | error
--}}

@props(['type' => 'success'])

@php
    $classes =
        $type === 'success' ? 'bg-green-100 text-green-800 border-green-300' : 'bg-red-100 text-red-800 border-red-300';
@endphp

<div class="border px-4 py-3 rounded mb-4 {{ $classes }}">
    {{ $slot }}
</div>
