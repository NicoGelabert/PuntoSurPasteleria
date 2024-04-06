<x-app-layout>
    <div class="px-5 max-w-screen-xl flex items-center justify-evenly py-32 mx-auto w-full">
        @foreach($alergens as $alergen)
        <div class="mb-8">
            <a href="{{ route('alergen.view', $alergen->slug) }}" class="flex items-center gap-4">
                <img src="{{ url($alergen?->icon) }}" alt="{{$alergen->name}}" class="">
                <h4>{{$alergen->name}}</h4>
            </a>
        </div>
        @endforeach
    </div>
</x-app-layout>