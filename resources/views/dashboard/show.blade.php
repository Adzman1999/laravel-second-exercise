<x-layout>

    {{-- <div class="container">
        <h1>Product Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->category->name }}</p>
                <p class="card-text">{{ $product->description }}</p>
                @if ($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail"
                        width="300">
                @endif
            </div>
        </div>
    </div> --}}

    <header class="text-center mb-2 mt-24">
        <h2 class="text-2xl font-bold uppercase mb-5">Product Details</h2>
    </header>
    <div class="p-10 flex justify-center items-center ">

        <div class="flex justify-center items-center gap-y-2" style="width: 600px">

            <img class="hidden w-48 mr-6 md:block" style="width: 300px; height: 300px; object-fit: contain"
                src="{{ $product->image ? asset('storage/' . $product->image) : asset('/images/no-image.png') }}"
                alt="product" />
            <div>
                <h3 class="text-1xl font-bold">
                    <a style="text-transform: uppercase">{{ $product->name }}</a>
                </h3>

                <div>
                    <div>
                        <i class="fa-solid fa-shapes"></i> {{ $product->category->name }}
                    </div>
                    <div>
                        <i class="fa-solid fa-barcode"></i> {{ $product->sku }}
                    </div>

                    <hr />
                    <div>
                        <i class="fa-solid fa-circle-info"></i> {{ $product->description }}
                    </div>
                </div>
            </div>




            <hr />


        </div>

    </div>


    </div>

</x-layout>
