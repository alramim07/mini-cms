{{-- 
|--------------------------------------------------------------------------
| Admin Page – Announcement Management
|--------------------------------------------------------------------------
| This page displays all announcements that require administrator approval.
| Each card represents an announcement created by users and not yet approved.
|
| Available features:
| - View title, author and content preview
| - Approve an announcement (makes it public on the site)
| - Delete an announcement (permanently removes content)
|
| Access:
| This page is protected by the "admin" middleware and is visible only to
| users with administrator role.
|
| UI:
| The cards are responsive, with Approve/Delete buttons and consistent layout
| with the rest of the CMS.
|--------------------------------------------------------------------------
--}}
<x-layout title="Announcements to Approve">

    <h1 class="text-2xl font-bold mb-6 text-center">
        <i class="fa-solid fa-shield-halved mr-2"></i>
        Announcements Pending Approval
    </h1>

    <div class="flex flex-wrap justify-center gap-6">
        @forelse($announcements as $announcement)
            <x-card :title="$announcement->title" :subtitle="'Published by ' . $announcement->user->name">
                <p class="text-gray-700">
                    {{ Str::limit($announcement->body, 150) }}
                </p>

                <x-slot:footer>
                    <div class="flex justify-between items-center">

                        {{-- APPROVE --}}
                        <form method="POST" action="{{ route('admin.announcements.approve', $announcement) }}">
                            @csrf
                            @method('PATCH')

                            <x-button icon="fa-solid fa-check" class="bg-green-600 hover:bg-green-700">
                                Approve
                            </x-button>
                        </form>

                        {{-- DELETE --}}
                        <form method="POST" action="{{ route('admin.announcements.destroy', $announcement) }}">
                            @csrf
                            @method('DELETE')

                            <x-button icon="fa-solid fa-trash" class="bg-red-600 hover:bg-red-700">
                                Delete
                            </x-button>
                        </form>

                    </div>
                </x-slot:footer>
            </x-card>

        @empty
            <p class="text-center text-gray-300">
                No announcements pending approval.
            </p>
        @endforelse
    </div>

</x-layout>
