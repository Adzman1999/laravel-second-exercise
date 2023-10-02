@auth
    <x-layout>

        <div class="container mt-24 mb-11">
            <!-- Category Filter -->
            <div style="display: flex; flex-direction: row; justify-content: space-between; margin-bottom: 2rem">

                <form class="lg:ml-12 md:ml-12 ml-5" class action="{{ route('dashboard.index') }}" method="GET">
                    <div class="form-group ">
                        <label for="category" style="font-weight: 700">Category Filter:</label>
                        <select name="category" id="category" class="form-control" onchange="this.form.submit()">
                            @foreach ($categories as $categoryName => $categoryLabel)
                                <option value="{{ $categoryName }}"
                                    {{ $categoryName == $categoryFilter ? 'selected' : '' }}>
                                    {{ $categoryLabel }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>

                <!-- Sort Filter -->
                <form action="{{ route('dashboard.index') }}" method="GET">
                    <div class="form-group">
                        <label for="sort" style="font-weight: 700">Sort by Name:</label>
                        <select name="sort" id="sort" class="form-control" onchange="this.form.submit()">
                            <option value="asc" {{ $sort == 'asc' ? 'selected' : '' }}>Ascending</option>
                            <option value="desc" {{ $sort == 'desc' ? 'selected' : '' }}>Descending</option>
                        </select>
                    </div>
                </form>
            </div>

            <div class="lg:grid lg:grid-cols-3 gap-4 space-y-4 md:space-y-0 mx-4 lg:ml-8">

                @unless (count($products) == 0)
                    @foreach ($products as $product)
                        <x-card>
                            <div class="flex gap-4">
                                <a data-toggle="tooltip" title="View product details" href="products/{{ $product->id }}">
                                    <img class="hidden w-48 mr-6 md:block"
                                        style="  @if ($product->image) object-fit: contain; width: 100px; height: 100px; @else width: 100px; height: 100px; object-fit: contain; @endif"
                                        src="{{ $product->image ? asset('storage/' . $product->image) : asset('/images/no-image.png') }}"
                                        alt="product" />
                                    <div>



                                        <a class="uppercase" data-toggle="tooltip" title="View product details"
                                            href="products/{{ $product->id }}">
                                            <h3 class="fs-1 font-bold">{{ $product->name }} </h3>
                                        </a>


                                        <hr />
                                        <div>
                                            <i class="fa-solid fa-shapes"></i> {{ $product->category->name }}
                                        </div>
                                        <div>
                                            <i class="fa-solid fa-barcode"></i> {{ $product->sku }}
                                        </div>

                                    </div>

                                </a>

                            </div>
                            <div class="flex flex-row-reverse">
                                <div class=" flex flex-row gap-2" style="font-size: 15px;">

                                    <a href="/products/{{ $product->id }}/edit"
                                        class="bg-gray-700 rounded text-white py-1 px-5"><i
                                            class="fa-solid fa-pen-to-square"></i>
                                    </a>


                                    <form method="POST" action="/products/{{ $product->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-gray-900 rounded text-white py-1 px-5">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </x-card>
                    @endforeach
                @else
                    <p>No Product found</p>
                @endunless

            </div>
            <!-- Pagination -->
            <div class="mt-6 p-4 lg:mx-10">
                {{ $products->appends(['category' => $categoryFilter, 'sort' => $sort])->links() }}
            </div>

    </x-layout>
@else
    @include('users.login')
@endauth
