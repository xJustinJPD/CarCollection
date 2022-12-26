<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Owner') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        


            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                {{-- form that stores the owner variable and posts it to the database as a new car --}}
                <form action="{{ route('admin.owners.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- inputting the name and address of the owner to be created --}}
                    {{-- each has an error message, I was unable to impliment UUID's as I was getting a lot of errors and had to bypass --}}
                    

                    {{-- name --}}
                    <x-input type="text" name="name" placeholder="Owner Name" class="w-full mt-6" autocomplete="off" :value="@old ('name')"></x-input>
                    @error('name')
                        {{$message}}
                    @enderror

                    {{-- address --}}
                    <x-input type="text" name="address" placeholder="Owner Address" class="w-full mt-6" autocomplete="off" :value="@old ('address')"></x-input>
                                        @error('address')
                        {{$message}}
                    @enderror

                    {{-- save owner button --}}

                    <x-button class="mt-6">Save Owner</x-button>

                </form>


            </div>

            </div>
    </div>
</x-app-layout>
