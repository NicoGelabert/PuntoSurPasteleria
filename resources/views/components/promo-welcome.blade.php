<div class="flex flex-col sm:flex-row relative gap-16 -mx-5 md:mx-4">
    <!-- text -->
    <div class="w-full md:w-1/2 lg:w-3/5 flex flex-col justify-center bg-[url('https://images.pexels.com/photos/1983036/pexels-photo-1983036.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2')] bg-cover md:bg-none text-center md:text-left">
        <div class="bg-black/30 p-8 md:p-0 md:bg-transparent">
            <h2 class="text-3xl font-bold tracking-tight text-white md:text-gray-900 sm:text-4xl md:text-6xl drop-shadow-lg md:drop-shadow-none">{{__('Get vintage. Get real.')}}</h2>
            <p class="my-8 text-xl text-white md:text-gray-500 drop-shadow-lg md:drop-shadow-none">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <div class="w-auto">
                <a href="{{ route('product.index') }}" class="btn-primary">{{__('Shop Collection')}}</a>
            </div>
        </div>
    </div>
    <!-- text -->
    <!-- image -->
    <div class="hidden md:w-1/2 lg:w-2/5 md:flex items-center gap-3 md:gap-6">
        <div class="w-1/3 gap-y-4 flex flex-col">
            <div class="overflow-hidden rounded-lg">
                <img src="https://images.pexels.com/photos/1983036/pexels-photo-1983036.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="" class="h-full w-full object-cover object-center">
            </div>
            <div class="overflow-hidden rounded-lg">
                <img src="https://images.pexels.com/photos/8086616/pexels-photo-8086616.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="" class="h-full w-full object-cover object-center">
            </div>
        </div>
        <div class=" w-1/3 gap-y-4 flex flex-col">
            <div class="overflow-hidden rounded-lg">
                <img src="https://images.pexels.com/photos/3144800/pexels-photo-3144800.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="" class="h-full w-full object-cover object-center">
            </div>
            <div class="overflow-hidden rounded-lg">
                <img src="https://images.pexels.com/photos/3907509/pexels-photo-3907509.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load" alt="" class="h-full w-full object-cover object-center">
            </div>
            <div class="overflow-hidden rounded-lg">
                <img src="https://images.pexels.com/photos/3781267/pexels-photo-3781267.jpeg" alt="" class="h-full w-full object-cover object-center">
            </div>
        </div>
        <div class=" w-1/3 gap-y-4 flex flex-col">
            <div class="overflow-hidden rounded-lg">
                <img src="https://images.pexels.com/photos/2910207/pexels-photo-2910207.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="" class="h-full w-full object-cover object-center">
            </div>
            <div class="overflow-hidden rounded-lg">
                <img src="https://images.pexels.com/photos/3117811/pexels-photo-3117811.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="" class="h-full w-full object-cover object-center">
            </div>
        </div>
    </div>
    <!-- image -->
</div>