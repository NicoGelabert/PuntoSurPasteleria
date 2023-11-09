<?php
/** @var \Illuminate\Database\Eloquent\Collection $categories */
?>

<x-app-layout>
    <div class="px-5 max-w-screen-xl mx-auto flex justify-evenly items-center py-32">
        <div id="categorybuttons">
            @foreach ($categories as $category)
                <a href="{{$category->slug}}" class="" alt="">
                    <img src="{{$category->icon}}" class="" alt="{{$category->name}}" />
                    <h5>{{$category->name}}</h5>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>

<script>
    const buttonsContainer = document.getElementById("categorybuttons");
    const childrenButtons = buttonsContainer.querySelectorAll("a")
    childrenButtons.forEach((item,index) =>{
        ((index > 0 && index < 3) || (index > 4 && index < 7)) ? item.classList.add('btn-primary') : item.classList.add('btn-secondary');
    })

</script>