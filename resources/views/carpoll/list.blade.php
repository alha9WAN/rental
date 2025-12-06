@extends('components.page')
@section('content')

<div class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold mb-4 text-gray-800">Carpool - <span class="text-blue-500">Lombok & Surrounding Routes</span></h1>
        <p class="text-gray-600 max-w-2xl mx-auto text-lg">Share journeys, share experiences. Save costs by carpooling to favorite destinations in Lombok.</p>
    </div>

    <!-- Search and Filter Section -->
    <div class="carpool-search-section rounded-2xl shadow-lg p-8 mb-12 border border-gray-100">
        <form action="{{ route('carpool.list') }}" method="GET" class="flex flex-col lg:flex-row gap-6 items-end">
            <!-- Search Box -->
            <div class="flex-1 w-full">
                <label class="block text-gray-700 font-semibold mb-3 text-lg" for="search">
                    <i class="fas fa-search mr-2 text-blue-500"></i>Search Car Pool
                </label>
                <div class="carpool-search-box flex rounded-xl overflow-hidden bg-white transition-all border border-gray-200">
                    <input type="text"
                           id="search"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Search by Route Name, Price, or Time..."
                           class="flex-1 pl-5 pr-4 py-4 focus:outline-none text-gray-700 placeholder-gray-400 text-lg">
                </div>
            </div>

            <!-- Category Filter -->
            <div class="flex-1 w-full">
                <label class="block text-gray-700 font-semibold mb-3 text-lg" for="category">
                    <i class="fas fa-filter mr-2 text-blue-500"></i>Car Pool Category
                </label>
                <div class="relative">
                    <select id="category" name="category"
                        class="carpool-filter-select w-full px-5 py-4 rounded-xl focus:outline-none appearance-none bg-white text-gray-700 text-lg border border-gray-200">
                        <option value="all" {{ request('category') == 'all' ? 'selected' : '' }}> All Categories</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->name }}" {{ request('category') == $kategori->name ? 'selected' : '' }}>
                                {{ ucfirst($kategori->name) }}
                            </option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-blue-500">
                        <i class="fas fa-chevron-down text-lg"></i>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="w-full lg:w-auto flex gap-4">
                <!-- Search Button -->
                <button type="submit"
                        class="carpool-search-btn flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white font-bold py-4 px-8 rounded-xl transition duration-300 transform hover:scale-105 text-lg min-w-[140px]">
                    <i class="fas fa-search mr-2"></i>
                    Search
                </button>

                <!-- Reset Filter Button -->
                <button type="button" id="reset-filter"
                        class="flex items-center justify-center bg-gray-500 hover:bg-gray-600 text-white font-bold py-4 px-6 rounded-xl transition duration-300 transform hover:scale-105 text-lg min-w-[140px]">
                    <i class="fas fa-redo mr-2"></i>
                    Reset
                </button>
            </div>
        </form>
    </div>

    <!-- Carpool Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6" id="carpool-container">
        @foreach ($carPools as $carPool)
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg carpool-card-hover border border-gray-100 relative carpool-card">
            <div class="relative">
                <img src="{{ asset('storage/' . $carPool->gambar) }}" alt="{{ $carPool->nama_rute }}" class="w-full h-40 object-cover">
                <div class="carpool-image-overlay"></div>
                <div class="absolute top-3 right-3 bg-blue-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                    {{ $carPool->kategori->name ?? '-' }}
                </div>
                <div class="absolute bottom-3 left-3 bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full flex items-center">
                    <i class="fas fa-star text-yellow-500 mr-1"></i> {{ $carPool->rating }}
                </div>
                <!-- Eye Icon with Link - Appears in center on hover -->
                <a href="/detail-carpool-mataram-senggigi" class="carpool-eye-icon-container">
                    <i class="fas fa-eye carpool-eye-icon"></i>
                </a>
            </div>
            <div class="p-4">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="text-base font-bold">{{ $carPool->nama_rute }}</h3>
                    <p class="text-blue-500 font-bold text-right text-xs">
                        <span class="text-gray-500 font-normal">Price per seat</span><br>
                        Rp. {{ number_format($carPool->harga_per_kursi, 0, ',', '.') }}
                        <span class="text-xs font-normal text-gray-600">/seat</span>
                    </p>
                </div>

                <p class="text-blue-500 mb-2 italic font-medium text-xs">"{{ $carPool->tagline }}"</p>

                <div class="text-gray-600 mb-2 text-xs">
                    {{ Str::limit($carPool->deskripsi, 80) }}
                </div>

                <div class="flex flex-wrap gap-1 mb-3">
                    @php
                        $fitur = is_string($carPool->fitur) ? json_decode($carPool->fitur, true) : $carPool->fitur;
                        $fitur = is_array($fitur) ? $fitur : explode(',', $carPool->fitur);
                    @endphp
                    @foreach($fitur as $item)
                        <span class="bg-blue-500 text-white text-xs font-medium px-2 py-0.5 rounded">
                            {{ trim($item) }}
                        </span>
                    @endforeach
                </div>

                <div class="mb-3">
                    <div class="text-xs text-gray-500 mb-1">Departure Time:</div>
                    <div class="font-semibold text-xs">{{ $carPool->jam_berangkat }} WITA</div>
                </div>

                <!-- JOIN NOW BUTTON -->
                <a href="https://wa.me/{{ $carPool->whatsapp }}"
                   class="flex items-center justify-center w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-lg text-center transition duration-300 transform hover:scale-105 text-xs"
                   target="_blank">
                   <i class="fab fa-whatsapp mr-2 text-lg"></i>
                   Join Now
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-10 flex justify-center">
        {{ $carPools->appends(request()->query())->links('pagination::tailwind') }}
    </div>
</div>

<script>
    document.getElementById('reset-filter').addEventListener('click', function() {
        window.location.href = "{{ route('carpool.list') }}";
    });
</script>
@endsection
