<x-app-layout>
    <div class="px-5 max-w-screen-xl flex flex-col justify-evenly items-center py-32 mx-auto" id="categories">
        @foreach($categories as $category)
        <div class="mb-8 text-center">
            <h2>{{$category->name}}</h2>
        </div>
        <div
            class="grid gap-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 lg:mx-12 listing mb-8"
        >
            @foreach($category->products as $product)
            <div x-data="productItem({{ json_encode([
                'id' => $product->id,
                'slug' => $product->slug,
                'image' => $product->image,
                'title' => $product->title,
                'price' => $product->price,
                'addToCartUrl' => route('cart.add', $product)
                ]) }})" class="border-transparent overflow-hidden rounded-lg bg-white underline-hover product_listing">
                <a href="{{ route('product.view', [$product->category?->slug, $product->slug ]) }}" class="aspect-w-3 aspect-h-2 block">
                    <img src="{{ $product->image }}" alt="{{$product->title}}" class="card-image object-cover hover:scale-105 hover:rotate-1 transition-transform" />
                    <div class="p-4 card-listing">
                        <div class="flex justify-center w-full gap-4">
                            @foreach ($product->alergens as $alergen)
                                <img src="{{ url($alergen?->icon) }}" alt="{{ $alergen?->name }}">
                            @endforeach
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <p class="small category_subtitle">{{$product->category?->name}}</p>
                            <h4 class="w-fit">
                                {{$product->title}}
                            </h4>
                        </div>
                        <div class="relative flex justify-center">
                            <span class="price">${{$product->price}}</span>
                        </div>
                        <div class="relative flex">
                            <p class="small">{{$product->description}}</p>
                        </div>
                    </div>
                </a>
                <div class="flex justify-center mb-5">
                    <button class="btn-cart-product" @click="addToCart()">
                        <!-- Add to Cart -->
                        <svg
                        xmlns="http://www.w3.org/2000/svg"
                        
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1"
                        >
                            <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                            />
                        </svg>
                    </button>
                </div>
            </div>
            @endforeach
            </div>
        @endforeach
        
    </div>
</x-app-layout>