@extends('components.page')
@section('content')



   <div class="container mx-auto px-4 py-8">
       <!-- Header Section -->
       <div class="text-center mb-12">
           <h1 class="text-4xl md:text-5xl font-bold mb-4 text-gray-800">Carpool - <span class="text-primary">Rute Lombok & Sekitarnya</span></h1>
           <p class="text-gray-600 max-w-2xl mx-auto text-lg">Berbagi perjalanan, berbagi pengalaman. Hemat biaya dengan carpool ke destinasi favorit di Lombok.</p>
       </div>


      <!-- Search and Filter Section -->
       <div class="search-section rounded-2xl shadow-lg p-8 mb-12 border border-gray-100">
           <form action="{{ route('carpool.list') }}" method="GET" class="flex flex-col lg:flex-row gap-6 items-end">


               <!-- Search Box -->
               <div class="flex-1 w-full">
                   <label class="block text-gray-700 font-semibold mb-3 text-lg" for="search">
                       <i class="fas fa-search mr-2 text-primary"></i>Cari Car Pool
                   </label>
                   <div class="search-box flex rounded-xl overflow-hidden bg-white transition-all border border-gray-200">
                       <input type="text"
                              id="search"
                              name="search"
                              value="{{ request('search') }}"
                              placeholder="Cari berdasarkan Nama Rute, Harga, atau Jam nya..."
                              class="flex-1 pl-5 pr-4 py-4 focus:outline-none text-gray-700 placeholder-gray-400 text-lg">
                   </div>
               </div>


               <!-- Category Filter -->
               <div class="flex-1 w-full">
                   <label class="block text-gray-700 font-semibold mb-3 text-lg" for="category">
                       <i class="fas fa-filter mr-2 text-primary"></i>Kategori Car Pool
                   </label>
                   <div class="relative">
                       <select id="category" name="category"
                           class="w-full px-5 py-4 rounded-xl focus:outline-none appearance-none bg-white text-gray-700 text-lg border border-gray-200">
                           <option value="all"  {{ request('category') == 'all' ? 'selected' : '' }}> Semua Kategori</option>
                                 @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->name }}" {{ request('category') == $kategori->name ? 'selected' : '' }}>
                                    {{ ucfirst($kategori->name) }}
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
                   <!-- Search Button -->
                   <button type="submit"
                           class="flex items-center justify-center bg-primary hover:bg-purple-600 text-white font-bold py-4 px-8 rounded-xl transition duration-300 transform hover:scale-105 text-lg min-w-[140px]">
                       <i class="fas fa-search mr-2"></i>
                       Cari
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
       <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="carpool-container">
           <!-- Carpool 1 - Mataram ➜ Senggigi -->
                                         @foreach ($carPools as $carPool)
           <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover border border-gray-100 relative carpool-card" data-category="mataram senggigi" data-name="mataram senggigi">
               <div class="relative">
                   <img src="{{ asset('storage/' . $carPool->gambar) }}" alt="{{ $carPool->nama_rute }}" class="w-full h-48 object-cover">
                   <div class="image-overlay"></div>
                   <div class="absolute top-4 right-4 route-badge text-white text-xs font-semibold px-3 py-1 rounded-full">
{{ $carPool->kategori->name ?? '-' }}                   </div>
                   <div class="absolute bottom-4 left-4 bg-white bg-opacity-90 text-xs font-semibold px-3 py-1 rounded-full flex items-center">
                       <i class="fas fa-star text-yellow-500 mr-1"></i> {{ $carPool->rating }}
                   </div>
                   <!-- Eye Icon dengan Link - Muncul di tengah saat hover -->
                   <a href="/detail-carpool-mataram-senggigi" class="eye-icon-container">
                       <i class="fas fa-eye eye-icon"></i>
                   </a>
               </div>
               <div class="p-6">
                   <div class="flex justify-between items-start mb-2">
                       <h3 class="text-xl font-bold">{{ $carPool->nama_rute }}</h3>
                       <p class="text-primary font-bold text-right">
                           <span class="text-gray-500 font-normal text-sm">Harga per kursi</span><br>
                                         Rp. {{ number_format($carPool->harga_per_kursi, 0, ',', '.') }}

                           <span class="text-sm font-normal text-gray-600">/kursi</span>
                       </p>
                   </div>


                   <p class="text-gray-600 mb-4">"{{ $carPool->tagline }}"</p>


                   <div class="text-gray-600 mb-4 text-sm">
                   {{ $carPool->deskripsi }}

                   </div>


                                      <div class="flex flex-wrap gap-2 mb-4">
    @php
        $fitur = is_string($carPool->fitur) ? json_decode($carPool->fitur, true) : $carPool->fitur;
        $fitur = is_array($fitur) ? $fitur : explode(',', $carPool->fitur);
    @endphp
    @foreach($fitur as $item)
        <span class="bg-purple-500 text-white text-xs font-medium px-2.5 py-0.5 rounded">
            {{ trim($item) }}
        </span>
    @endforeach
</div>


                   <div class="mb-4">
                       <div class="text-sm text-gray-500 mb-1">Jam Berangkat:</div>
                       <div class="font-semibold">{{ $carPool->jam_berangkat }} WITA</div>
                   </div>


                   <!-- TOMBOL GABUNG SEKARANG -->
                        <a href="https://wa.me/{{ $carPool->whatsapp }}"
                      class="flex items-center justify-center w-full bg-purple-500 hover:bg-purple-600 text-white font-semibold py-3 rounded-lg text-center transition duration-300 transform hover:scale-105"
                      target="_blank">
                      <i class="fab fa-whatsapp mr-2 text-xl"></i>
                      Gabung Sekarang
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



   <style>
       body {
           font-family: 'Poppins', sans-serif;
       }
       .card-hover {
           transition: all 0.3s ease;
       }
       .card-hover:hover {
           transform: translateY(-5px);
           box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
       }
       .search-section {
           background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
       }
       .search-box {
           border: 2px solid #e2e8f0;
           transition: all 0.3s ease;
       }
       .search-box:focus-within {
           border-color: #8b5cf6;
           box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
       }
       .search-btn {
           transition: all 0.3s ease;
           background: #8b5cf6;
           color: white;
       }
       .search-btn:hover {
           background: #7c3aed;
           transform: scale(1.05);
       }
       .filter-select {
           border: 2px solid #e2e8f0;
           transition: all 0.3s ease;
       }
       .filter-select:focus {
           border-color: #8b5cf6;
           box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.1);
           outline: none;
       }
       .eye-icon-container {
           position: absolute;
           top: 50%;
           left: 50%;
           transform: translate(-50%, -50%);
           background: rgba(255, 255, 255, 0.9);
           width: 60px;
           height: 60px;
           border-radius: 50%;
           display: flex;
           align-items: center;
           justify-content: center;
           transition: all 0.3s ease;
           opacity: 0;
           z-index: 10;
           box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
       }
       .card-hover:hover .eye-icon-container {
           opacity: 1;
       }
       .eye-icon-container:hover {
           background: #8b5cf6;
           transform: translate(-50%, -50%) scale(1.05);
       }
       .eye-icon {
           color: #4b5563;
           font-size: 24px;
           transition: all 0.3s ease;
       }
       .eye-icon-container:hover .eye-icon {
           color: white;
       }
       .text-primary {
           color: #8b5cf6;
       }
       .bg-primary {
           background-color: #8b5cf6;
       }
       .border-primary {
           border-color: #8b5cf6;
       }
       .image-overlay {
           position: absolute;
           top: 0;
           left: 0;
           width: 100%;
           height: 100%;
           background: rgba(0, 0, 0, 0.3);
           opacity: 0;
           transition: all 0.3s ease;
           z-index: 5;
       }
       .card-hover:hover .image-overlay {
           opacity: 1;
       }
       .category-badge {
           background: linear-gradient(135deg, #8b5cf6, #7c3aed);
       }
       .route-badge {
           background: linear-gradient(135deg, #a78bfa, #8b5cf6);
       }


/* Responsive improvements */
@media (max-width: 390px) {
    .container {
        padding-left: 0.75rem !important;
        padding-right: 0.75rem !important;
    }

    .search-section {
        padding: 1rem !important;
    }

    .search-box input {
        font-size: 14px !important;
        padding: 0.75rem !important;
    }

    /* Perbaikan placeholder */
    .search-box input::placeholder {
        font-size: 13px;
    }

    .filter-select {
        font-size: 14px !important;
        padding: 0.75rem !important;
    }

    .w-full.lg\\:w-auto.flex.gap-4 {
        width: 100%;
        flex-direction: column;
    }

    .w-full.lg\\:w-auto.flex.gap-4 button {
        width: 100%;
        min-width: auto !important;
    }

    .car-card .p-6 {
        padding: 1rem !important;
    }
}

@media (max-width: 360px) {
    .search-box input::placeholder {
        font-size: 12px;
    }

    .car-card .p-6 {
        padding: 0.75rem !important;
    }

    .text-4xl {
        font-size: 1.75rem !important;
    }

    .text-lg {
        font-size: 0.875rem !important;
    }
}

   </style>
{{-- coba --}}

<script>
       document.getElementById('reset-filter').addEventListener('click', function() {
            // Redirect ke halaman mobil tanpa parameter (reset filter)
            window.location.href = "{{ route('carpool.list') }}";
        });
</script>
@endsection


