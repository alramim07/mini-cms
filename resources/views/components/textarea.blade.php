{{-- 
Component: Textarea
Campo di testo multilinea per contenuti lunghi.
--}}

@props(['name'])

<textarea name="{{ $name }}" id="{{ $name }}" rows="5"
    {{ $attributes->merge(['class' => 'w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500']) }}>{{ old($name) }}</textarea>
