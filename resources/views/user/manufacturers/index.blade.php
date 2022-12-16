<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manufacturers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- the session success alert that comes up if the car was succesfully deleted --}}
        <x-alert-success>
                {{ session('success') }}
        </x-alert-success>

        {{-- button that links to the create.blade.php view --}}
        {{-- <a href="{{ route('admin.manufacturers.create') }}" class="btn-link btn-lg mb-2 my-4">+ New Manufacturer</a> --}}

        {{-- a for each loop looping through each car and displaying the intended values on the page --}}

        @forelse ($manufacturers as $manufacturer)
            <div class="my-5 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <a href="{{ route('admin.manufacturers.show', $manufacturer->id) }}">
            
                <h3>    
                    <strong>Manufacturer ID</strong> 
                        <hr>
                            {{ Str::limit($manufacturer->id, 200)}}
                </h3>

                <h3>    
                    <strong>Manufacturer Name</strong> 
                        <hr>
                            {{ Str::limit($manufacturer->name, 200)}}
                </h3>

                <h3>    
                    <strong>Manufacturer Address</strong> 
                        <hr>
                            {{ Str::limit($manufacturer->address, 400)}}
                </h3>

                {{-- was meant to be a timestamp but was having major issues with errors and couldnt figure out at all how to get working --}}
                {{-- <p> {{ $car->updated_at->diffForHumans() }} </p> --}}
                    </a>
            </div>

            {{-- empty function incase of user having no notes --}}
            @empty
            <p class="font-bold text-5xl">No manufacturers to display.</p> 
        @endforelse

        {{ $manufacturers->links() }}
            </div>
    </div>
</x-app-layout>
