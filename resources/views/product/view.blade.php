<x-app-layout>
    <div  x-data="productItem({{ json_encode([
                    'id' => $product->id,
                    'slug' => $product->slug,
                    'image' => $product->image,
                    'title' => $product->title,
                    'price' => $product->price,
                    'addToCartUrl' => route('cart.add', $product)
                ]) }})" class=" lg:p-8 mx-auto pt-24 lg:pt-32">
        <div class="flex flex-col md:flex-row gap-12">
            <div class="w-full md:w-1/2">
                <div
                    x-data="{
                      images: ['{{$product->image}}'],
                      activeImage: null,
                      prev() {
                          let index = this.images.indexOf(this.activeImage);
                          if (index === 0)
                              index = this.images.length;
                          this.activeImage = this.images[index - 1];
                      },
                      next() {
                          let index = this.images.indexOf(this.activeImage);
                          if (index === this.images.length - 1)
                              index = -1;
                          this.activeImage = this.images[index + 1];
                      },
                      init() {
                          this.activeImage = this.images.length > 0 ? this.images[0] : null
                      }
                    }"
                    class="max-w-fit flex flex-col-reverse lg:flex-row gap-4 md:sticky top-24" id="imagen"
                >
                    <div class="flex">
                        <template x-for="image in images">
                            <a
                                @click.prevent="activeImage = image"
                                class="cursor-pointer w-[80px] h-[80px] border flex items-center justify-center product-thumbnail"
                                :class="{'product-thumbnail-active': activeImage === image}"
                            >
                                <img :src="image" alt="" class=""/>
                            </a>
                        </template>
                    </div>
                    <div class="relative">
                        <template x-for="image in images">
                            <div
                                x-show="activeImage === image"
                                class="aspect-w-3 aspect-h-2"
                            >
                                <img :src="image" alt="" class="w-auto mx-auto"/>
                            </div>
                        </template>
                        <a
                            @click.prevent="prev"
                            class="cursor-pointer bg-black/30 text-white absolute left-0 top-1/2 -translate-y-1/2"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-10 w-10"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15 19l-7-7 7-7"
                                />
                            </svg>
                        </a>
                        <a
                            @click.prevent="next"
                            class="cursor-pointer bg-black/30 text-white absolute right-0 top-1/2 -translate-y-1/2"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-10 w-10"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M9 5l7 7-7 7"
                                />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 product-view" id="texto">
                <h1 class="text-3xl font-semibold">
                    {{$product->title}}
                </h1>
                <!-- <label for="quantity" class="block font-bold mr-4">
                    Quantity
                </label> -->
                <div class="flex flex-wrap justify-between align-center gap-y-4 my-8">
                    <div x-data="{value: 1}" class="font-number md:my-6 text-2xl lg:text-3xl">${{$product->price}}</div>
                    <div class="flex items-center content-center quantity">
                        <button id="down" class="btn btn-default" onclick=" down('0')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="current" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                        <input
                            type="number"
                            name="quantity"
                            x-ref="quantityEl"
                            value="1"
                            min="1"
                            class="w-32 qty"
                            id="myNumber"
                        />
                        <button id="up" class="btn btn-default" onclick="up('10')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="current" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </div>
                    <!-- Add to cart button -->
                    <div class="add-to-cart-container flex-[1_0_100%]">
                        <button
                            @click="addToCart($refs.quantityEl.value)"
                            class="add-to-cart-button flex items-center btn-primary"
                        >
                        <span>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                                id="icon-chat"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                                />
                            </svg>
                        </span>
                        <span class="add-to-cart-text">Add to cart</span>
                        </button>
                    </div>
                    <!-- Add to cart button -->
                </div>
                <div class="mb-6" x-data="{expanded: false}">
                    <div
                        x-show="expanded"
                        x-collapse.min.120px
                        class="text-gray-500 wysiwyg-content"
                    >
                        {{ $product->description }}
                    </div>
                    <p class="text-right">
                        <a
                            @click="expanded = !expanded"
                            href="javascript:void(0)"
                            class="text-purple-500 hover:text-purple-700"
                            x-text="expanded ? 'Read Less' : 'Read More'"
                        ></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function up(max) {
    document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) + 1;
    if (document.getElementById("myNumber").value >= parseInt(max)) {
        document.getElementById("myNumber").value = max;
    }
    }
    function down(min) {
        document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) - 1;
        if (document.getElementById("myNumber").value <= parseInt(min)) {
            document.getElementById("myNumber").value = min;
        }
    }

</script>
<style>
    .quantity {
        display: -ms-inline-flexbox;
        display: inline-flex;
        align-items: stretch;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    }
    .quantity .qty {
        width: 50px;
        height: 40px;
        line-height: 40px;
        background-color:transparent;
        border: 0;
        text-align: center;
        margin-bottom: 0;
    }
    .quantity button{
        color:white;
        height:auto;
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>