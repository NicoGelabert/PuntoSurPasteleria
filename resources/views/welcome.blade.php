<?php
    /** @var \Illuminate\Database\Eloquent\Collection $products */
    ?>
    <x-app-layout>
        <div class="mx-auto px-5 pt-32 max-w-screen-xl flex flex-col md:flex-row items-center justify-center relative md:h-screen">
            <div class="w-full md:w-3/5 relative isolate px-6 md:pt-0 md:pb-0 lg:px-8 slide-in-left">
                <div class="text-left">
                    <h1>Happiness is a piece of cake</h1>
                    <p class="mt-2 text-lg leading-8 text-gray-600">{{__('E-commerce site developed with Laravel, Vue JS and Tailwind.')}}</p>
                    <div class="flex gap-3 my-6 md:justify-start">
                        <a href="{{ route('product.index') }}" class="btn-primary">
                        {{__('See all')}}
                        </a>
                    </div>
                </div>
            </div>
            <div>
                <img src="{{ asset('storage/img/first_cake.png') }}" alt="">
            </div>
        </div>

        <x-category-buttons />

        <x-promo-welcome />

        <section id="image-carousel" class="px-5 max-w-screen-xl splide my-16 mx-auto" aria-label="Latest products">
            <div class="mb-8 text-center">
                <h2 class="text-2xl font-bold text-3xl">{{__('Latest products')}}
            </div>
            <div class="splide__track mx-8">
                <ul class="splide__list">
                    @foreach($products as $product)
                    <li x-data="productItem({{ json_encode([
                        'id' => $product->id,
                        'slug' => $product->slug,
                        'image' => $product->image,
                        'title' => $product->title,
                        'price' => $product->price,
                        'addToCartUrl' => route('cart.add', $product)
                    ]) }})" class="splide__slide border-transparent overflow-hidden rounded-lg bg-white">
                        <a href="{{ route('product.view', $product->slug) }}"
                        class="aspect-w-3 aspect-h-2 block">
                            <img src="{{ $product->image }}" alt="{{$product->title}}"
                            class="card-image object-cover hover:scale-105 hover:rotate-1 transition-transform">
                            <div class="p-4 card-listing">
                                <div class="flex justify-center w-full">
                                    <img src="{{ asset('storage/iconos/gluten.jpg') }}" alt="">
                                    <img src="{{ asset('storage/iconos/lactose.jpg') }}" alt="">
                                    <img src="{{ asset('storage/iconos/sugar.jpg') }}" alt="">
                                    <img src="{{ asset('storage/iconos/egg.jpg') }}" alt="">
                                </div>
                                <div class="flex justify-center">
                                    <h3 class="underline-hover w-fit">
                                        {{$product->title}}
                                    </h3>
                                </div>
                                <div class="price-container relative flex justify-center">
                                    <h5 class="font-number pl-4 text-lg md:text-xl lg:text-2xl">${{$product->price}}</h5>
                                </div>
                                <div class="price-container relative flex">
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
                    </li>
                    @endforeach
                </ul>
            </div>
        </section>
        
        <hr class="mt-24 h-px border-t-0 bg-transparent bg-gradient-to-r from-transparent via-neutral-500 to-transparent opacity-25 dark:opacity-100" />

        <x-newsletter />
        
    </x-app-layout>
