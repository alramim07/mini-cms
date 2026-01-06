{{-- 
View: Create Article (create)
Purpose: shows the form to insert a new article.
Functions: sends the data to the controller via POST -> articles.store.
--}}

<x-layout title="Create Article">

    <h1 class="text-3xl font-bold mb-6">Create a new article</h1>

    <x-card>

        <x-form action="{{ route('articles.store') }}" method="POST">

            {{-- Title --}}
            <div>
                <x-label for="title">Title</x-label>
                <x-input name="title" />
            </div>

            {{-- Image --}}
            <div>
                <x-label for="image">Image</x-label>
                <x-input type="file" name="image" accept="image/*" />
            </div>

            {{-- Content --}}
            <div>
                <x-label for="content">Content</x-label>
                <x-textarea name="content" />
            </div>

            <x-button>Create Article</x-button>
        </x-form>

    </x-card>

</x-layout>
