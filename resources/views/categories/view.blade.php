<x-app-layout>
    <div class="px-5 max-w-screen-xl flex flex-col justify-evenly items-center py-32">
        
        <h1>{{$categories->name}}</h1>
        <ul>
            @foreach($categories->products as $product)
            <li>
                <a href="{{ route('product.view', [$categories->slug, $product->slug ]) }}">{{$product->title}}</a>
            </li>
            @endforeach
        </ul>
        
    </div>
</x-app-layout>