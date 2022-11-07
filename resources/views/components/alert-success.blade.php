           {{-- the session success alert if a succesful edit or delete was completed --}}
            @if(session('success'))
                <div class="mb-4 px-4 py-2 bg-green-100 border border-green-200 text-green-700 rounded-md">
                {{ $slot }}
                </div>
            @endif