<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cars') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- the session success alert that comes up if the car was succesfully deleted --}}
        <x-alert-success>
                {{ session('success') }}
        </x-alert-success>

        {{-- button that links to the create.blade.php view --}}
        <a href="{{ route('cars.create') }}" class="btn-link btn-lg mb-2 my-4">+ New Car</a>

        {{-- a for each loop looping through each car and displaying the intended values on the page --}}

        @forelse ($cars as $car)
            <div class="my-5 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                    <img src="{{asset('storage/images/' . $car->car_image) }}" width="150" />
                
                

                <h2 class="font-bold text-2xl"> 
                    <a href="{{ route('cars.show', $car->id) }}">{{ $car->make }}</a>
                </h2>

                <p class="mt-2">
                    {{ Str::limit($car->model, 50)}}
                </p>

                <p class="mt-2">
                    {{ Str::limit($car->colour, 50)}}
                </p>

                <p class="mt-2">
                    {{ Str::limit($car->desc, 50)}}
                </p>

                {{-- was meant to be a timestamp but was having major issues with errors and couldnt figure out at all how to get working --}}
                {{-- <p> {{ $car->updated_at->diffForHumans() }} </p> --}}

            </div>

            {{-- empty function incase of user having no notes --}}
            @empty
            <p class="font-bold text-5xl">No cars to display.</p> 
        @endforelse

        {{ $cars->links() }}
            </div>
    </div>
</x-app-layout>
