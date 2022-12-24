<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        


            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                {{-- form that stores the car variable and posts it to the database as a new car --}}
                <form action="{{ route('admin.cars.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    {{-- inputting the image, make, model, colour and description of the car to be created --}}
                    {{-- each has an error message, I was unable to impliment UUID's as I was getting a lot of errors and had to bypass --}}
                    {{-- image --}}
                    <x-input type="file" name="car_image" placeholder="Car Image" class="w-full mt-6" field="car_image"></x-input>
                    @error('car_image')
                        {{$message}}
                    @enderror

                    {{-- make --}}
                    <x-input type="text" name="make" placeholder="Car Make" class="w-full mt-6" autocomplete="off" :value="@old ('make')"></x-input>
                    @error('make')
                        {{$message}}
                    @enderror

                    {{-- model --}}
                    <x-input type="text" name="model" placeholder="Car Model" class="w-full mt-6" autocomplete="off" :value="@old ('model')"></x-input>
                                        @error('model')
                        {{$message}}
                    @enderror

                    {{-- colour --}}
                    <x-input type="text" name="colour" placeholder="Colour" class="w-full mt-6" autocomplete="off" :value="@old ('colour')"></x-input>
                                        @error('colour')
                        {{$message}}
                    @enderror
                    {{-- description --}}
                    <x-textarea name="desc" rows="10" placeholder="Description of car..."  class="w-full mt-6" :value="@old ('desc')"></x-textarea>
                                        @error('desc')
                        {{$message}}
                    @enderror

                    <div class="form-group">
                    <label for="manufacturer">Manufacturer</label>
                    <select name="manufacturer_id">
                        @foreach ($manufacturers as $manufacturer)
                            <option value="{{$manufacturer->id}}" {{(old('manufacturer_id') == $manufacturer->id) ? "selected" : ""}}>
                                {{$manufacturer->name}}
                            </option>
                        @endforeach
                    </select>
                    </div>

                    <div class="form-group">
                        <label for="owners">
                            <strong>Owners</strong> <br>
                        </label>
                        @foreach ($owners as $owner)
                            <input type="checkbox", value="{{$owner->id}}" name="owners[]">
                            {{$owner->name}}
                        @endforeach
                    </div>

                    {{-- save car button --}}

                    <x-button class="mt-6">Save Car</x-button>

                </form>


            </div>

            </div>
    </div>
</x-app-layout>
