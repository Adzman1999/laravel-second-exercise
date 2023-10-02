<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Edit Category</h2>
        </header>

        <form method="POST" action="/categories/{{ $category->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Category Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                    value="{{ $category->name }}" />

                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Category Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10">{{ $category->description }}</textarea>

                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6 flex justify-between items-center">
                <a href="/" class="text-black ml-4"> Back </a>
                <button class="bg-gray-900 text-white rounded py-2 px-4">
                    Update category
                </button>


            </div>
        </form>
    </x-card>
</x-layout>
