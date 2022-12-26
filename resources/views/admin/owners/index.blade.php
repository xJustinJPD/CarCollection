<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Owners') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- the session success alert that comes up if the owner was succesfully deleted --}}
        <x-alert-success>
                {{ session('success') }}
        </x-alert-success>

        {{-- button that links to the create.blade.php view --}}
        <a href="{{ route('admin.owners.create') }}" class="btn-link btn-lg mb-2 my-4">+ New Owner</a>

        {{-- a for each loop looping through each owner and displaying the intended values on the page --}}

        @forelse ($owners as $owner)
            <div class="my-5 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <a href="{{ route('admin.owners.show', $owner->id) }}">
            
                <h3>    
                    <strong>Owner ID</strong> 
                        <hr>
                            {{ Str::limit($owner->id, 200)}}
                </h3>

                <h3>    
                    <strong>Owner Name</strong> 
                        <hr>
                            {{ Str::limit($owner->name, 200)}}
                </h3>

                <h3>    
                    <strong>Owner Address</strong> 
                        <hr>
                            {{ Str::limit($owner->address, 400)}}
                </h3>

                {{-- was meant to be a timestamp but was having major issues with errors and couldnt figure out at all how to get working --}}
                {{-- <p> {{ $owner->updated_at->diffForHumans() }} </p> --}}
                    </a>
            </div>

            {{-- empty function incase of user having no owners --}}
            @empty
            <p class="font-bold text-5xl">No owners to display.</p> 
        @endforelse

        {{ $owners->links() }}
            </div>
    </div>
</x-app-layout>
