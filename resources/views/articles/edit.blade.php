{{-- 
View: Edit Article (edit)
Purpose: shows the form for editing an existing article.
Functions: sends the updated data via PUT -> articles.update.
--}}

<x-layout :title="'Edit: ' . $article->title">

    <h1 class="text-3xl font-bold mb-6">Edit article</h1>

    <x-card>

        {{-- Current image preview --}}
        @if ($article->image)
            <x-image :src="$article->image" class="w-full h-64 object-cover rounded mb-6" />
        @endif


        <x-form action="{{ route('articles.update', $article) }}" method="PUT">

            {{-- Title --}}
            <div>
                <x-label for="title">Title</x-label>
                <x-input name="title" :value="$article->title" />
            </div>

            {{-- New image (optional) --}}
            <div>
                <x-label for="image">New image (optional)</x-label>
                <x-input type="file" name="image" accept="image/*" />
            </div>

            {{-- Content --}}
            <div>
                <x-label for="content">Content</x-label>
                <x-textarea name="content">{{ $article->content }}</x-textarea>
            </div>

            <x-button>Update Article</x-button>

        </x-form>

    </x-card>

</x-layout>
