{{-- 
View: Announcements Index
Purpose: displays all published announcements.
--}}

<x-layout title="Announcements">

    <h1 class="text-2xl font-bold mb-6 text-center">
        <i class="fa-solid fa-bullhorn mr-2"></i>
        All Announcements
    </h1>

    <div class="flex flex-wrap justify-center gap-6">
        @foreach ($announcements as $announcement)
            <x-card :title="$announcement->title" :subtitle="'Published by ' . $announcement->user->name">
                {{ Str::limit($announcement->body, 120) }}

                <x-slot:footer>
                    <a href="{{ route('announcements.show', $announcement) }}" class="text-blue-600 hover:underline">
                        Read more
                    </a>
                </x-slot:footer>
            </x-card>
        @endforeach
    </div>

</x-layout>
