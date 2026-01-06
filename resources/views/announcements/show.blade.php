{{-- 
View: Announcement Show
Purpose: displays a single published announcement.
--}}

<x-layout :title="$announcement->title">

    <h1 class="text-3xl font-bold mb-4">{{ $announcement->title }}</h1>

    <p class="text-gray-300 mb-2">
        <i class="fa-solid fa-user mr-1"></i>
        Published by {{ $announcement->user->name }}
    </p>

    <p class="text-gray-100 leading-relaxed">
        {{ $announcement->body }}
    </p>

    <x-button-group>
        <x-button icon="fa-solid fa-arrow-left">
            <a href="{{ route('announcements.index') }}">Back to announcements</a>
        </x-button>
    </x-button-group>

</x-layout>
