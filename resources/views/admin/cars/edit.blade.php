<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                {{-- form in which the updated car is posted to the database with its new values --}}
                <form action="{{ route('admin.cars.update', $car) }}" method="post">
                    {{-- blade method as html does not have a update function and csrf token --}}
                    @method('put')
                    @csrf

                    {{-- inputs for the make,model,colour and description of car --}}
                    {{-- each has an error message --}}
                    {{-- make --}}
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
                    {{-- model --}}
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
                    {{-- colour --}}
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
                    {{-- description --}}
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

                    {{-- <div class="form-group">
                    <label for="manufacturer">Manufacturer</label>
                    <select name="manufacturer_id">
                        @foreach ($manufacturers as $manufacturer)
                            <option value="{{$manufacturer->id}}" {{(old('manufacturer_id') == $manufacturer->id) ? "selected" : ""}}>
                                {{$manufacturer->name}}
                            </option>
                        @endforeach
                    </select>
                    </div> --}}

                    {{-- save car button --}}
                    <x-button class="mt-6">Save Car</x-button>

                </form>


            </div>

            </div>
    </div>
</x-app-layout>