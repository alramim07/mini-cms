<x-layout title="Verify your account">

    <h1 class="text-2xl font-bold mb-4">Verify your account</h1>

    <p class="mb-6">
        Registration completed! We have sent you an email with the link to verify your account.
        After verification, you will be able to log in and create your announcements.
    </p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <x-button>Resend verification email</x-button>
    </form>

</x-layout>
