{{-- 
Component: Input
Campo di input con icona opzionale, stile uniforme e responsive.
--}}

<div class="space-y-1">
    @if (isset($label))
        <label class="font-medium">{{ $label }}</label>
    @endif

    <div class="flex items-center gap-2 bg-gray-100 px-3 py-2 rounded">
        @isset($icon)
            <i class="{{ $icon }} text-gray-500"></i>
        @endisset

        <input
            {{ $attributes->merge([
                'class' => 'w-full bg-transparent focus:outline-none',
            ]) }}>
    </div>

    @error($attributes->get('name'))
        <p class="text-red-600 text-sm">{{ $message }}</p>
    @enderror
</div>
