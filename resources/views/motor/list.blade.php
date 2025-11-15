@extends('components.page')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 text-gray-800">Kurasi <span class="text-green-500">Motor</span> Terbaik</h1>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">Kami memilihkan motor terbaik dari partner terpercaya di seluruh Lombok.</p>
        </div>

        <!-- Search and Filter Section -->
        <div class="search-section rounded-2xl shadow-lg p-8 mb-12 border border-gray-100">
            <form action="{{ route('motor.list') }}" method="GET" class="flex flex-col lg:flex-row gap-6 items-end">
                <!-- Search Box -->
                <div class="flex-1 w-full">
                    <label class="block text-gray-700 font-semibold mb-3 text-lg" for="search">
                        <i class="fas fa-search mr-2 text-green-500"></i>Cari Motor
                    </label>
                    <div class="search-box flex rounded-xl overflow-hidden bg-white transition-all border border-gray-200">
                        <input type="text"
                               id="search"
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Cari berdasarkan Nama Motor, tipe, atau harga..."
                               class="flex-1 pl-5 pr-4 py-4 focus:outline-none text-gray-700 placeholder-gray-400 text-lg">
                    </div>
                </div>

                <!-- Category Filter -->
                <div class="flex-1 w-full">
                    <label class="block text-gray-700 font-semibold mb-3 text-lg" for="category">
                        <i class="fas fa-filter mr-2 text-green-500"></i>Kategori Motor
                    </label>
                    <div class="relative">
                        <select id="category" name="category"
                            class="w-full px-5 py-4 rounded-xl focus:outline-none appearance-none bg-white text-gray-700 text-lg border border-gray-200">
                            <option value="all" {{ request('category') == 'all' ? 'selected' : '' }}>Semua Kategori</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->nama }}" {{ request('category') == $kategori->nama ? 'selected' : '' }}>
                                    {{ ucfirst($kategori->nama) }}
                                </option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-green-500">
                            <i class="fas fa-chevron-down text-lg"></i>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="w-full lg:w-auto flex gap-4">
                    <button type="submit"
                            class="flex items-center justify-center bg-green-500 hover:bg-green-600 text-white font-bold py-4 px-8 rounded-xl transition duration-300 transform hover:scale-105 text-lg min-w-[140px]">
                        <i class="fas fa-search mr-2"></i>
                        Cari
                    </button>
                    <button type="button" id="reset-filter"
                            class="flex items-center justify-center bg-gray-500 hover:bg-gray-600 text-white font-bold py-4 px-6 rounded-xl transition duration-300 transform hover:scale-105 text-lg min-w-[140px]">
                        <i class="fas fa-redo mr-2"></i>
                        Reset
                    </button>
                </div>
            </form>
        </div>

        <!-- Motor Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="motor-container">
            @foreach ($motors as $motor)
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover border border-gray-100 relative motor-card">
                <div class="relative">
                    <img src="{{ asset('storage/' . $motor->gambar) }}" alt="{{ $motor->nama }}" class="w-full h-50 object-cover">
                    <div class="image-overlay"></div>
                    <div class="absolute top-4 right-4 bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-full">
{{ ucwords(str_replace('_', '–', $motor->kategoriMotor->nama ?? '-')) }}
                    </div>
                    <div class="absolute bottom-4 left-4 bg-white bg-opacity-90 text-xs font-semibold px-3 py-1 rounded-full flex items-center">
                        <i class="fas fa-star text-yellow-500 mr-1"></i> {{ $motor->rating }}
                    </div>
                    <a href="" class="eye-icon-container">
                        <i class="fas fa-eye eye-icon"></i>
                    </a>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold">{{ $motor->nama }}</h3>
                        <p class="text-green-500 font-bold text-right">
                            <span class="text-gray-500 font-normal text-sm">Start from</span><br>
                            Rp. {{ number_format($motor->harga_per_hari, 0, ',', '.') }}
                            <span class="text-sm font-normal text-gray-600">/12 Jam</span>
                        </p>
                    </div>

                    <!-- TAGLINE MOTOR -->
                    <p class="text-green-500 mb-4 italic font-bold text-md">"{{ $motor->tagline }}"</p>

                    <p class="text-gray-600 mb-4">{{ $motor->deskripsi }}</p>

                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <i class="fas fa-motorcycle mr-2 text-green-500"></i>
                        <span class="mr-4">{{ $motor->tipe }}</span>
                        <i class="fas fa-gas-pump mr-2 text-green-500"></i>
                        <span>{{ $motor->bahan_bakar }} km/liter</span>
                    </div>

                    <!-- FITUR MOTOR -->
                                                 <div class="flex flex-wrap gap-2 mb-4">
           @php
           $fitur = is_string($motor->fitur) ? json_decode($motor->fitur, true) : $motor->fitur;
        $fitur = is_array($fitur) ? $fitur : explode(',', $motor->fitur);
       @endphp
        @foreach($fitur as $item)
                        <span class="bg-green-500 text-white text-xs font-medium px-2.5 py-0.5 rounded">{{ trim($item) }}</span>
    @endforeach
              </div>

                    <div class="mb-4">
                        <div class="text-sm text-gray-500 mb-1">Disewakan oleh:</div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white text-sm font-bold mr-2">{{ $motor->inisial_vendor }}</div>
                                <div>
                                    <div class="font-semibold">{{ $motor->vendor }}</div>
                                    <div class="text-xs text-gray-500 flex items-center">
                                        <i class="fas fa-map-marker-alt mr-1"></i>
                                        <div class="font-semibold">{{ $motor->lokasi }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="https://wa.me/{{ $motor->whatsapp }}"
                       class="flex items-center justify-center w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-3 rounded-lg text-center transition duration-300 transform hover:scale-105"
                       target="_blank">
                       <i class="fab fa-whatsapp mr-2 text-xl"></i>
                       Hubungi Kami
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-10 flex justify-center">
            {{ $motors->appends(request()->query())->links('pagination::tailwind') }}
        </div>
    </div>

    <script>
        document.getElementById('reset-filter').addEventListener('click', function() {
            window.location.href = "{{ route('motor.list') }}";
        });
    </script>
@endsection
