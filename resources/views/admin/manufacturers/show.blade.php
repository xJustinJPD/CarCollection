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

            {{-- link to the edit car view --}}
            <a href="{{route('admin.manufacturers.edit', $manufacturer)}}" class="btn-link ml-auto">Edit Manufacturer</a>

            {{-- form designed to delete a note --}}
            <form action="{{ route('admin.manufacturers.destroy', $manufacturer) }}" method="post" enctype="multipart/form-data">
            {{-- method and csrf from blade functionality --}}
            @method('delete')
            @csrf
            {{-- button to delete with a confirmation button to make sure --}}
            <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you want to delete this car?')">Delete Car</button>
            </form>

            
            
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