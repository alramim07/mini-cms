{{-- 
|--------------------------------------------------------------------------
| Page: My Announcements
|--------------------------------------------------------------------------
| This page displays all announcements created by the authenticated user.
| Each card includes:
| - image (if present)
| - title
| - announcement status (Approved / Pending approval)
| - link to view the public announcement
|
| Status logic:
| - is_approved = false → Pending approval (yellow badge)
| - is_approved = true  → Approved (green badge)
|
| Note:
| Unapproved announcements are NOT publicly visible.
|--------------------------------------------------------------------------
--}}

<x-layout title="My Announcements">

    <h1 class="text-3xl font-bold mb-8">My Announcements</h1>

    @if ($announcements->isEmpty())
        <p class="text-gray-600">You haven't created any announcements yet.</p>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($announcements as $announcement)
            <x-card>

                {{-- Image (fallback if not exists) --}}
                @if ($announcement->image)
                    <x-image :src="$announcement->image" class="w-full h-48 object-cover rounded mb-4" />
                @else
                    <div class="w-full h-48 bg-gray-200 rounded mb-4 flex items-center justify-center text-gray-500">
                        No image
                    </div>
                @endif

                <h2 class="text-xl font-semibold mb-2">
                    {{ $announcement->title }}
                </h2>

                {{-- Approval status badge --}}
                @if ($announcement->is_approved)
                    <span class="inline-block px-3 py-1 text-sm bg-green-200 text-green-800 rounded mb-4">
                        <i class="fa-solid fa-check mr-1"></i>
                        Approved
                    </span>
                @else
                    <span class="inline-block px-3 py-1 text-sm bg-yellow-200 text-yellow-800 rounded mb-4">
                        <i class="fa-solid fa-clock mr-1"></i>
                        Pending approval
                    </span>
                @endif

                {{-- Link to public announcement (only if approved) --}}
                @if ($announcement->is_approved)
                    <a href="{{ route('announcements.show', $announcement) }}" class="text-blue-600 hover:underline">
                        Go to announcement →
                    </a>
                @else
                    <span class="text-gray-500 text-sm">
                        The announcement is not yet publicly visible.
                    </span>
                @endif

            </x-card>
        @endforeach
    </div>

</x-layout>
