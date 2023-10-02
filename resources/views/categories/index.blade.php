<x-layout>
    <div class="container" style="margin-top: 5rem">
        <div class="mb-4 ml-1.5 mt-4 flex flex-row-reverse">
            <a href="/categories/create" class="bg-gray-900 rounded text-white py-2 px-5"><i class="fa-solid fa-plus"></i>
                Create new category</a>
        </div>

        <div class="lg:grid lg:grid-cols-3 gap-4 space-y-4 md:space-y-0 mx-4 lg:ml-8">

            @unless (count($categories) == 0)
                @foreach ($categories as $category)
                    <x-card>
                        <div class="flex flex-col">
                            <div class="flex items-center flex-row gap-2">
                                <h3 class="fs-1 font-bold">
                                    <p style="text-transform: uppercase">
                                        {{ $category->name }}</p>
                                </h3>
                            </div>

                            <hr />
                            <div class="text-lg mb-2mt-2">
                                <div>
                                    <i class="fa-solid fa-circle-info"></i> {{ $category->description }}
                                </div>
                                <div class="flex flex-row-reverse">
                                    <div class=" flex flex-row gap-2" style="font-size: 15px">

                                        <a href="/categories/{{ $category->id }}/edit"
                                            class="bg-gray-700 rounded text-white py-1 px-5"><i
                                                class="fa-solid fa-pen-to-square"></i>
                                        </a>


                                        <form method="POST" action="/categories/{{ $category->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-gray-900 rounded text-white py-1 px-5">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </x-card>
                @endforeach
            @else
                <p>No Categories found</p>
            @endunless

        </div>
    </div>
</x-layout>
