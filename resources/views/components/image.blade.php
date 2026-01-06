{{-- 
Component: Image
Scopo: mostra un'immagine proveniente dallo storage pubblico.
Props:
    - src: percorso dell'immagine salvato nel database
    - alt: testo alternativo (opzionale)
    - class: classi CSS aggiuntive (opzionali)
--}}

@props([
    'src' => null,
    'alt' => '',
])

@if ($src)
    <img src="{{ asset('storage/' . $src) }}" alt="{{ $alt }}"
        {{ $attributes->merge(['class' => 'rounded shadow']) }}>
@endif
