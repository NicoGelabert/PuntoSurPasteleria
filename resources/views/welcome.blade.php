
    <x-app-layout>
        <div id="hero_banner" class="mx-auto max-w-screen-xl flex flex-col md:flex-row md:flex-wrap items-center justify-around md:justify-center relative h-auto lg:h-screen max-h-screen splide">
            <div class="w-full relative isolatemd:pt-0 md:pb-0 splide__track pt-24 md:pt-16 ">
                <ul class="splide__list max-w-[1024px] !mx-auto">
                    @foreach ($slider_images as $slider_image)
                    <li class="splide__slide slider bg-gradient flex flex-col sm:flex-row items-center justify-evenly md:justify-center {{$slider_image -> background}} px-8">
                        <div class="text-left slide-in-left">
                            <h1>{{$slider_image -> headline}}</h1>
                            <p class="mt-2 text-lg leading-8 text-gray-600 w-full">{{$slider_image -> description}}</p>
                            <div class="flex gap-3 my-6 md:justify-start">
                                <a href="{{$slider_image -> link}}" class="btn-primary">
                                {{__('Ver ')}}{{$slider_image -> headline}} 
                                </a>
                            </div>
                        </div>            
                        <div class="">
                            <img class="image_slide max-h-[450px] sm:max-h-[500px] w-full mx-auto" src="{{$slider_image -> image}}" alt="">
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <ul class="splide__pagination"></ul>
        </div>

        <div class="px-5 max-w-screen-xl mx-auto flex justify-evenly items-center my-20">
            <div id="categoryimagesection" class="hidden sm:inline-block mix-blend-multiply max-w-[350px] lg:w-3/5">
                <img src="{{ asset('storage/img/muffins.png') }}" alt="">
            </div>
            <div id="categorybuttons">
                @foreach ($categories as $category)
                    <a href="{{ route('categories.view', $category->slug) }}" class="" alt="">
                        <div class="h-full flex flex-wrap flex-col justify-evenly px-2 lg:px-4">
                            <img src="{{$category -> icon}}" alt="{{$category -> name}}">
                            <h5>{{$category -> name}}</h5>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <x-promo-welcome />

        <section id="image-carousel" class="px-5 max-w-screen-xl splide my-16 mx-auto" aria-label="Latest products">
            <div class="mb-8 text-center">
                <h2 class="text-2xl text-3xl">{{__('Latest products')}}
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
                        ]) }})" class="splide__slide border-transparent overflow-hidden rounded-lg bg-white underline-hover">
                        <a href="{{ route('product.view', [$product->category?->slug, $product->slug ]) }}" class="aspect-w-3 aspect-h-2 block">
                            <img src="{{ $product->image }}" alt="{{$product->title}}" class="card-image object-cover hover:scale-105 hover:rotate-1 transition-transform" />
                            <div class="p-4 card-listing">
                                <div class="flex justify-center w-full gap-4">
                                    @foreach ($product->alergens as $alergen)
                                        <img src="{{ url($alergen?->icon) }}" alt="{{ $alergen?->name }}">
                                    @endforeach
                                </div>
                                <div class="flex flex-col items-center justify-center">
                                    <p class="small category_subtitle">{{$product->category?->slug}}</p>
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
                    </li>
                    @endforeach
                </ul>
            </div>
        </section>
        
        <hr class="mt-24 h-px border-t-0 bg-transparent bg-gradient-to-r from-transparent via-neutral-500 to-transparent opacity-25 dark:opacity-100" />

        <x-newsletter />
        
    </x-app-layout>
<style>
    @keyframes rotateAnimation {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(180deg); }
    }

    /* Aplicar la animación de rotación */
    .rotating {
        animation: rotateAnimation 0.25s linear 1;
    }
    /* Animaciones de movimiento */
    /* Animación para botón activo */
    .active-animation {
        transition: transform 0.3s ease; /* Duración y tipo de transición */
        transform: translateX(10px); /* Desplazamiento inicial */
    }

    /* Animación para revertir */
    .active-animation.revert {
        transform: translateX(0); /* Desplazamiento de regreso a su posición original */
    }

</style>
<script>
    const buttonsContainer = document.getElementById("categorybuttons");
    const childrenButtons = buttonsContainer.querySelectorAll("a");
    childrenButtons.forEach((item,index) =>{
        ((index > 0 && index < 3) || (index > 4 && index < 7)) ? item.classList.add('btn-primary') : item.classList.add('btn-secondary');
    })

</script>
