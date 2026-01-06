<x-layout title="Login">

    <h1 class="text-2xl font-bold text-center mb-6">
        <i class="fa-solid fa-right-to-bracket mr-2"></i>
        Login to your account
    </h1>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

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
                    placeholder="Enter your password">
            </div>
        </div>

        {{-- Remember me --}}
        <label class="flex items-center gap-2 text-sm">
            <input type="checkbox" name="remember" class="rounded">
            Remember me
        </label>

        {{-- Submit --}}
        <x-button icon="fa-solid fa-arrow-right">
            Login
        </x-button>

        {{-- Link registration --}}
        <p class="text-center text-sm mt-4">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">
                Register
            </a>
        </p>
    </form>

</x-layout>
