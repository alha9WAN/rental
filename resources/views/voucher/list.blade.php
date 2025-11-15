@extends('components.page')
@section('content')
<!-- Section 6: Voucher Restoran -->
<section id="vouchers" class="py-10">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Voucher & Diskon <span class="text-yellow-500">Restoran</span></h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Nikmati penawaran spesial dari restoran terbaik di Lombok selama menyewa kendaraan dari partner kami.</p>
        </div>

        <!-- Search and Filter Section -->
        <div class="search-section rounded-2xl shadow-lg p-8 mb-12 border border-gray-100">
            <form action="{{ route('voucher.list') }}" method="GET" class="flex flex-col lg:flex-row gap-6 items-end">
                <!-- Search Box -->
                <div class="flex-1 w-full">
                    <label class="block text-gray-700 font-semibold mb-3 text-lg" for="search">
                        <i class="fas fa-search mr-2 text-yellow-500"></i>Cari Voucher
                    </label>
                    <div class="search-box flex rounded-xl overflow-hidden bg-white transition-all border border-gray-200">
                        <input type="text"
                               id="search"
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Cari berdasarkan nama Voucher dan diskon"
                               class="flex-1 pl-5 pr-4 py-4 focus:outline-none text-gray-700 placeholder-gray-400 text-lg">
                    </div>
                </div>

                <!-- Category Filter -->
                <div class="flex-1 w-full">
                    <label class="block text-gray-700 font-semibold mb-3 text-lg" for="category">
                        <i class="fas fa-tags mr-2 text-yellow-500"></i>Kategori Voucher
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
                        <div class="pointer-events-none absolute inset-y-0 right-4 flex items-center text-yellow-500">
                            <i class="fas fa-chevron-down text-lg"></i>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="w-full lg:w-auto flex gap-4">
                    <button type="submit"
                            class="flex items-center justify-center bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-4 px-8 rounded-xl transition duration-300 transform hover:scale-105 text-lg min-w-[140px]">
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

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($vouchers as $voucher)
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover voucher-card">
                <div class="relative">
                    <img src="{{ asset('storage/' . $voucher->gambar) }}" alt="{{ $voucher->nama }}" class="w-full h-48 object-cover">

                    @if ($voucher->diskon)
                    <div class="absolute top-4 right-4 bg-yellow-500 text-white text-xs font-semibold px-3 py-1 rounded-full">
                        Diskon {{ rtrim(rtrim(number_format($voucher->diskon, 2, ',', '.'), '0'), ',') }}%
                    </div>
                    @endif

                    <a href="" class="eye-icon-container">
                        <i class="fas fa-eye eye-icon"></i>
                    </a>
                </div>

                <!-- Harga di bawah gambar -->
<div class="px-6 pt-4">
    <div class="flex items-center justify-between">
        <h3 class="text-lg font-semibold text-gray-800">
            {{ $voucher->nama }}
        </h3>
        <div class="text-right">
            <p class="text-sm text-gray-500">Harga</p>
            <p class="text-md font-bold text-yellow-500">
    Rp {{ number_format($voucher->harga, 0, ',', '.') }}            </p>
        </div>
    </div>
</div>


                <div class="p-6 pt-2">
                    <!-- TAGLINE VOUCHER -->
                    <p class="text-yellow-500 mb-4 italic font-bold text-md">"{{ $voucher->tagline }}"</p>

                    <p class="text-gray-600 mb-4">{{ $voucher->deskripsi }}</p>

                    <!-- FITUR VOUCHER -->
                    <div class="flex flex-wrap gap-2 mb-4">
                        @php
                            $fitur = is_string($voucher->fitur) ? json_decode($voucher->fitur, true) : $voucher->fitur;
                            $fitur = is_array($fitur) ? $fitur : explode(',', $voucher->fitur);
                        @endphp
                        @foreach($fitur as $item)
                            <span class="bg-yellow-500 text-white text-xs font-medium px-2.5 py-0.5 rounded">
                                {{ trim($item) }}
                            </span>
                        @endforeach
                    </div>

                    <div class="flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            <i class="fas fa-clock mr-1 text-yellow-500"></i>
                            Berlaku hingga: {{ \Carbon\Carbon::parse($voucher->berlaku_hingga)->translatedFormat('d F Y') }}
                        </div>
                        <a href="https://wa.me/{{ $voucher->whatsapp }}"
                           class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 text-sm inline-block"
                           target="_blank">
                            Dapatkan Voucher
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-10 flex justify-center">
            {{ $vouchers->appends(request()->query())->links('pagination::tailwind') }}
        </div>
    </div>
</section>

<script>
    document.getElementById('reset-filter').addEventListener('click', function() {
        window.location.href = "{{ route('voucher.list') }}";
    });
</script>
@endsection
