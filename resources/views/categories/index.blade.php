<x-app-layout>
    <div class="px-5 max-w-screen-xl flex flex-col justify-evenly items-center py-32">
        @foreach($categories as $category)    
        <h1>{{$category->name}}</h1>
        <ul>
            @foreach($category->products as $product)
            <li>
                <a href="{{ route('product.view', [$product->category?->slug, $product->slug ]) }}">{{$product->title}}</a>
            </li>
            @endforeach
        </ul>
        @endforeach
        
    </div>
</x-app-layout>