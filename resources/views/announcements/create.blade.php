{{-- 
View: Announcement Create
Purpose: allows registered users to create an announcement.
--}}

<x-layout title="Create Announcement">

    <h1 class="text-2xl font-bold mb-6 text-center">
        <i class="fa-solid fa-plus mr-2"></i>
        Create a new announcement
    </h1>

    <form method="POST" action="{{ route('announcements.store') }}" class="space-y-6">
        @csrf

        <x-input label="Title" name="title" icon="fa-solid fa-heading" required />

        <div>
            <label class="font-medium">Content</label>
            <textarea name="body" rows="5" class="w-full bg-gray-100 px-3 py-2 rounded focus:outline-none"
                placeholder="Write the content..." required></textarea>
        </div>

        <x-button icon="fa-solid fa-check" class="bg-green-600 hover:bg-green-700">
            Publish Announcement
        </x-button>
    </form>

</x-layout>
