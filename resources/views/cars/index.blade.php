<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cars') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <a href="{{ route('cars.create') }}" class="btn-link btn-lg mb-2">+ New Car</a>

        @forelse ($cars as $car)
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                <h2 class="font-bold text-2xl"> 
                    <a href="{{ route('cars.show', $car->id) }}">{{ $car->make }}</a>
                </h2>

                <p class="mt-2">
                    {{ Str::limit($car->desc, 50)}}
                </p>

                {{-- <p> {{ $car->updated_at->diffForHumans() }} </p> --}}

            </div>
            @empty
            <p class="font-bold text-5xl">No cars to display.</p> 
        @endforelse

        {{ $cars->links() }}
            </div>
    </div>
</x-app-layout>
