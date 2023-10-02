<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Create new product</h2>
        </header>

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">Product Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                    value="{{ old('name') }}" />

                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="sku" class="inline-block text-lg mb-2">SKU</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="sku"
                    value="{{ old('sku') }}" />

                @error('sku')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="category_id" class="inline-block text-lg mb-2">Category</label>
                <select name="category_id" id="category_id" required class="border border-gray-200 rounded p-2 w-full">
                    @foreach ($categories as $categories)
                        <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Product Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="5">{{ old('description') }}</textarea>

                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="image" class="inline-block text-lg mb-2">
                    Product Image
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" />

                @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-6 flex justify-between items-center">
                <a href="/products" class="text-black ml-4"> Back </a>
                <button class="bg-gray-900 text-white rounded py-2 px-4">
                    Create Product
                </button>


            </div>
        </form>
    </x-card>
</x-layout>
