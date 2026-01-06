{{-- 
View: List of articles
Displays all articles present in the database.
Connected to the index() method of ArticleController.
--}}

<x-layout title="Articles">

    <x-image :src="$article->image" class="w-full h-48 object-cover rounded mb-4" />

    <h1 class="text-3xl font-bold mb-6">All Articles</h1>

    <a href="{{ route('articles.create') }}"
        class="inline-block mb-6 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Create New Article
    </a>

    @forelse ($articles as $article)
        <x-card>
            <h2 class="text-2xl font-semibold">{{ $article->title }}</h2>

            <p class="text-gray-600 mt-2">
                {{ Str::limit($article->content, 120) }}
            </p>

            <div class="mt-4 flex gap-4">
                <a href="{{ route('articles.show', $article) }}" class="text-blue-600 hover:underline">
                    Read
                </a>

                <a href="{{ route('articles.edit', $article) }}" class="text-yellow-600 hover:underline">
                    Edit
                </a>

                <form action="{{ route('articles.destroy', $article) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 hover:underline">
                        Delete
                    </button>
                </form>
            </div>
        </x-card>
    @empty
        <p class="text-gray-600">No articles available.</p>
    @endforelse

</x-layout>
