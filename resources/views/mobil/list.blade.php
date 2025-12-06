@extends('components.page')
@section('content')
<body class="font-sans bg-white text-dark mobil-page">

    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 text-gray-800">Car <span class="text-primary">Rental</span> Options</h1>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">Choose your vehicle and contact directly with verified independent service providers.</p>
        </div>

        <!-- Search and Filter Section -->
        <div class="search-section rounded-2xl shadow-lg p-8 mb-12 border border-gray-100">
            <form action="{{ route('mobil.list') }}" method="GET" class="flex flex-col lg:flex-row gap-6 items-end">
                <!-- Search Box -->
                <div class="flex-1 w-full">
                    <label class="block text-gray-700 font-semibold mb-3 text-lg" for="search">
                        <i class="fas fa-search mr-2 text-primary"></i>Search Car
                    </label>
                    <div class="search-box flex rounded-xl overflow-hidden bg-white transition-all border border-gray-200">
                        <input type="text"
                               id="search"
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Search by Car Name, type, or price..."
                               class="flex-1 pl-5 pr-4 py-4 focus:outline-none text-gray-700 placeholder-gray-400 text-lg">
                    </div>
                </div>

                <!-- Category Filter -->
                <div class="flex-1 w-full">
                    <label class="block text-gray-700 font-semibold mb-3 text-lg" for="category">
                        <i class="fas fa-filter mr-2 text-primary"></i>Car Category
                    </label>
                    <div class="relative">
                        <select id="category" name="category"
                            class="w-full px-5 py-4 rounded-xl focus:outline-none appearance-none bg-white text-gray-700 text-lg border border-gray-200">
                            <option value="all" {{ $selectedCategory == 'all' ? 'selected' : '' }}>All Categories</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->nama }}"  {{ $selectedCategory == $kategori->nama ? 'selected' : '' }}>
                                    {{ ucfirst($kategori->nama) }}
                                </option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-primary">
                            <i class="fas fa-chevron-down text-lg"></i>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="w-full lg:w-auto flex gap-4">
                    <button type="submit"
                            class="flex items-center justify-center bg-primary hover:bg-blue-600 text-white font-bold py-4 px-8 rounded-xl transition duration-300 transform hover:scale-105 text-lg min-w-[140px]">
                        <i class="fas fa-search mr-2"></i>
                        Search
                    </button>
                    <button type="button" id="reset-filter"
                            class="flex items-center justify-center bg-gray-500 hover:bg-gray-600 text-white font-bold py-4 px-6 rounded-xl transition duration-300 transform hover:scale-105 text-lg min-w-[140px]">
                        <i class="fas fa-redo mr-2"></i>
                        Reset
                    </button>
                </div>
            </form>
        </div>

        <!-- Car List - PROPORTIONAL IMAGE IMPROVEMENT -->
        <div class="space-y-4" id="car-container">
            @foreach ($mobils as $mobil)
            <div class="bg-white rounded-xl overflow-hidden shadow-lg card-hover border border-gray-100 flex flex-col md:flex-row">
                <!-- Image - IMAGE SIZE IMPROVEMENT -->
                <div class="md:w-2/5 lg:w-1/3 xl:w-1/4 relative">
                    <img src="{{ asset('storage/' . $mobil->gambar) }}" alt="{{ $mobil->nama }}" class="w-full h-48 md:h-56 lg:h-48 xl:h-56 object-cover">
                    <div class="image-overlay"></div>
                    <div class="absolute top-2 right-2 bg-blue-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                        {{ $mobil->mobilKategori->nama }}
                    </div>
                    <div class="absolute bottom-2 left-2 bg-white bg-opacity-90 text-xs font-semibold px-2 py-1 rounded-full flex items-center">
                        <i class="fas fa-star text-yellow-500 mr-1"></i> {{ $mobil->rating }}
                    </div>
                    <a href="/detail-mobil-avanza" class="eye-icon-container">
                        <i class="fas fa-eye eye-icon text-sm"></i>
                    </a>
                </div>

                <!-- Content - CONTENT SIZE IMPROVEMENT -->
                <div class="p-4 md:w-3/5 lg:w-2/3 xl:w-3/4 flex flex-col justify-between">
                    <div>
                        <div class="flex flex-col md:flex-row md:justify-between md:items-start mb-3">
                            <h3 class="text-lg font-bold">{{ $mobil->nama }}</h3>
                            <p class="text-primary font-bold text-right mt-1 md:mt-0 text-sm">
                                <span class="text-gray-500 font-normal text-xs">Start from</span><br>
                                Rp.{{ number_format($mobil->harga_per_hari, 0, ',', '.') }}
                                <span class="text-xs font-normal text-gray-600">/day</span>
                            </p>
                        </div>

                        <!-- CAR TAGLINE -->
                        <p class="text-blue-500 mb-2 italic font-medium text-sm">"{{ $mobil->tagline }}"</p>

                        <p class="text-gray-600 mb-2 text-sm">{{ Str::limit($mobil->deskripsi, 100) }}</p>

                        <div class="flex flex-wrap items-center text-xs text-gray-500 mb-3 gap-2">
                            <div class="flex items-center">
                                <i class="fas fa-car-side mr-1 text-primary"></i>
                                <span>{{ $mobil->tipe }}</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-users mr-1 text-primary"></i>
                                <span>{{ $mobil->kursi }} Seats</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-suitcase mr-1 text-primary"></i>
                                <span>2 Luggage</span>
                            </div>
                        </div>

                        <!-- CAR FEATURES -->
                        <div class="flex flex-wrap gap-1 mb-3">
                            @php
                                $fitur = is_string($mobil->fitur) ? json_decode($mobil->fitur, true) : $mobil->fitur;
                                $fitur = is_array($fitur) ? $fitur : explode(',', $mobil->fitur);
                            @endphp
                            @foreach(array_slice($fitur, 0, 4) as $item)
                                <span class="bg-blue-500 text-white text-xs font-medium px-2 py-0.5 rounded">{{ trim($item) }}</span>
                            @endforeach
                            @if(count($fitur) > 4)
                                <span class="bg-gray-400 text-white text-xs font-medium px-2 py-0.5 rounded">+{{ count($fitur) - 4 }} more</span>
                            @endif
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white text-xs font-bold mr-2">
                                {{ $mobil->inisial_vendor }}
                            </div>
                            <div>
                                <div class="font-semibold text-sm">{{ $mobil->vendor }}</div>
                                <div class="text-xs text-gray-500 flex items-center">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    <div class="font-semibold">{{ Str::limit($mobil->lokasi, 18) }}</div>
                                </div>
                            </div>
                        </div>

                        <a href="https://wa.me/{{ $mobil->whatsapp }}"
                           class="flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 transform hover:scale-105 text-sm min-w-[140px]"
                           target="_blank">
                           <i class="fab fa-whatsapp mr-1 text-sm"></i>
                           Contact Us
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            {{ $mobils->appends(request()->query())->links('pagination::tailwind') }}
        </div>
    </div>

    <script>
        document.getElementById('reset-filter').addEventListener('click', function() {
            window.location.href = "{{ route('mobil.list') }}";
        });
    </script>

@endsection
