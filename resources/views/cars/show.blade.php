<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cars') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <div class="flex">
            
            <p class="opacity-70">
                <strong>Created: </strong> 
                {{-- {{$car ->created_at->diffForHumans()}} --}}2 days ago
            </p>

            <p class="opacity-70 ml-8">
                <strong>Updated at: </strong> 
                {{-- {{$car ->updated_at->diffForHumans()}} --}}10 minutes ago
            </p>

            <a href="{{route('cars.edit', $car)}}" class="btn-link ml-auto">Edit Car</a>
            <form action="{{ route('cars.destroy', $car) }}" method="post">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you want to delete this car?')">Delete Car</button>
            </form>

            
            
            </div>

        
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                <h2 class="font-bold text-4xl"> 
                    {{ $car->make }}
                </h2>

                <p class="mt-6 whitespace-pre-wrap">{{ ($car->desc) }}</p>


            </div>
        

       
            </div>
    </div>
</x-app-layout>