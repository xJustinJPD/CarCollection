<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Manufacturer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">



            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                {{-- form in which the updated manufacturer is posted to the database with its new values --}}
                <form action="{{ route('admin.manufacturers.update', $manufacturer) }}" method="post">
                    {{-- blade method as html does not have a update function and csrf token --}}
                    @method('put')
                    @csrf

                    {{-- inputs for the name and address of manufacturer --}}
                    {{-- each has an error message --}}
                    {{-- name --}}
                    <x-input 
                    type="text" 
                    name="name" 
                    placeholder="Manufacturer Name"
                    class="w-full mt-6" autocomplete="off"
                    :value="@old ('make', $manufacturer->name)">
                    </x-input>
                    @error('name')
                        {{$message}}
                    @enderror
                    {{-- address --}}
                    <x-input 
                    type="text" 
                    name="address" 
                    placeholder="Manufacturer Address" 
                    class="w-full mt-6" 
                    autocomplete="off" 
                    :value="@old ('address', $manufacturer->address)">>
                    </x-input>
                    @error('address')
                        {{$message}}
                    @enderror

                    {{-- save manufacturer button --}}
                    <x-button class="mt-6">Save Manufacturer</x-button>

                </form>


            </div>

            </div>
    </div>
</x-app-layout>