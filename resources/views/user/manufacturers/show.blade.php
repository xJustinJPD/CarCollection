<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manufacturers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            {{-- success message if car was updated successfully --}}
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <div class="flex">
            
            {{-- hard coded time values as mine were not working and were giving me errors --}}
            <p class="opacity-70">
                <strong>Created: </strong> 
                {{-- {{$car ->created_at->diffForHumans()}} --}}2 days ago
            </p>

            <p class="opacity-70 ml-8">
                <strong>Updated at: </strong> 
                {{-- {{$car ->updated_at->diffForHumans()}} --}}10 minutes ago
            </p>
            
            </div>

        
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                

                <p class="mt-2">    <strong>Manufacturer ID</strong> <hr>
                    {{ Str::limit($manufacturer->id, 200)}}
                </p>
                
                {{-- displaying each element of the car --}}
                <h2 class="font-bold text-4xl"> 
                    {{ $manufacturer->name }}
                </h2>


            </div>
        


            </div>
    </div>
</x-app-layout>