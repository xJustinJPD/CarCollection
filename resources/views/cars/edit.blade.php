<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- <a href="{{ route('cars.create') }}" class="btn-link btn-lg mb-2">+ New Car</a> --}}


            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                <form action="{{ route('cars.update', $car) }}" method="post">
                    @method('put')
                    @csrf
                    <x-input 
                    type="text" 
                    name="make" 
                    placeholder="Car Model"
                    class="w-full mt-6" autocomplete="off"
                    :value="@old ('make', $car->make)">
                    </x-input>
                    @error('make')
                        {{$message}}
                    @enderror
                    <x-input 
                    type="text" 
                    name="model" 
                    placeholder="Car Type" 
                    class="w-full mt-6" 
                    autocomplete="off" 
                    :value="@old ('model', $car->model)">>
                    </x-input>
                     @error('model')
                        {{$message}}
                    @enderror
                    <x-input 
                    type="text" 
                    name="colour" 
                    placeholder="Colour" 
                    class="w-full mt-6" 
                    autocomplete="off" 
                    :value="@old ('colour', $car->colour)">
                    </x-input>
                    @error('colour')
                        {{$message}}
                    @enderror
                    <x-textarea 
                    name="desc" 
                    rows="10" 
                    placeholder="Description of car..."  
                    class="w-full mt-6" 
                    :value="@old ('desc', $car->desc)">
                    </x-textarea>
                                        @error('desc')
                        {{$message}}
                    @enderror
                    <x-button class="mt-6">Save Car</x-button>

                 </form>


            </div>

            </div>
    </div>
</x-app-layout>