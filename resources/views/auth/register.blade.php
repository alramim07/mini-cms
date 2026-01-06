<x-layout title="Register">

    <h1 class="text-2xl font-bold text-center mb-6">
        <i class="fa-solid fa-user-plus mr-2"></i>
        Create a new account
    </h1>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        {{-- Username --}}
        <div>
            <label class="block mb-1 font-medium">Name</label>
            <div class="flex items-center gap-2 bg-gray-100 px-3 py-2 rounded">
                <i class="fa-solid fa-user text-gray-500"></i>
                <input type="text" name="name" required class="w-full bg-transparent focus:outline-none"
                    placeholder="Your name">
            </div>
        </div>

        {{-- Email --}}
        <div>
            <label class="block mb-1 font-medium">Email</label>
            <div class="flex items-center gap-2 bg-gray-100 px-3 py-2 rounded">
                <i class="fa-solid fa-envelope text-gray-500"></i>
                <input type="email" name="email" required class="w-full bg-transparent focus:outline-none"
                    placeholder="Enter your email">
            </div>
        </div>

        {{-- Password --}}
        <div>
            <label class="block mb-1 font-medium">Password</label>
            <div class="flex items-center gap-2 bg-gray-100 px-3 py-2 rounded">
                <i class="fa-solid fa-lock text-gray-500"></i>
                <input type="password" name="password" required class="w-full bg-transparent focus:outline-none"
                    placeholder="Create a password">
            </div>
        </div>

        {{-- Confirm password --}}
        <div>
            <label class="block mb-1 font-medium">Confirm Password</label>
            <div class="flex items-center gap-2 bg-gray-100 px-3 py-2 rounded">
                <i class="fa-solid fa-lock text-gray-500"></i>
                <input type="password" name="password_confirmation" required
                    class="w-full bg-transparent focus:outline-none" placeholder="Repeat your password">
            </div>
        </div>

        {{-- Submit --}}
        <x-button icon="fa-solid fa-user-plus">
            Register
        </x-button>

        {{-- Link login --}}
        <p class="text-center text-sm mt-4">
            Already have an account?
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">
                Login
            </a>
        </p>
    </form>

</x-layout>
