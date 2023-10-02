<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Edit User</h2>
        </header>

        <form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="username" class="inline-block text-lg mb-2">Username </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="username"
                    value="{{ $user->username }}" />

                @error('username')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="first_name" class="inline-block text-lg mb-2">First Name </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="first_name"
                    value="{{ $user->first_name }}" />

                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="last_name" class="inline-block text-lg mb-2">Last Name </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="last_name"
                    value="{{ $user->last_name }}" />

                @error('last_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="middle_name" class="inline-block text-lg mb-2">Middle Name </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="middle_name"
                    value="{{ $user->middle_name }}" />

                @error('middle_name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ $user->email }}" />

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">Password</label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password"
                    value="{{ $user->password }}" />

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6 flex justify-between items-center">
                <a href="/users" class="text-black ml-4"> Back </a>
                <button class="bg-gray-900 text-white rounded py-2 px-4">
                    Update User
                </button>


            </div>

        </form>
    </x-card>
</x-layout>
