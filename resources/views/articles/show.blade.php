{{-- 
View: Show Article (show)
Purpose: displays a single article with title and content.
Functions: link to edit or return to the list.
--}}

<x-layout :title="$article->title">

    <x-image :src="$article->image" class="w-full h-64 object-cover rounded mb-6" />

    <x-card>
        <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>


        <p class="text-gray-700 leading-relaxed">
            {{ $article->content }}
        </p>

        <div class="mt-6 flex gap-4">
            <a href="{{ route('articles.edit', $article) }}" class="text-yellow-600 hover:underline">Edit</a>

            <a href="{{ route('articles.index') }}" class="text-blue-600 hover:underline">Back to list</a>
        </div>
    </x-card>

</x-layout>
