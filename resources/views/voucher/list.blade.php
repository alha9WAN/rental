@extends('components.page')
@section('content')
<!-- Section 6: Restaurant Vouchers -->
<section id="vouchers" class="py-10">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 max-w-2xl mx-auto leading-snug">
                    <span class="text-yellow-500">Promotions</span> and <span class="text-yellow-500">Discounts</span><br>
                    Shops, Salon/Spa and Restaurants
                </h2>
                <p class="text-gray-600 max-w-xl mx-auto">
                    Enjoy special offers from the best shops and restaurants in Lombok.
                </p>
            </div>
        </div>

        <!-- Search and Filter Section -->
        <div class="search-section rounded-2xl shadow-lg p-8 mb-12 border border-gray-100">
            <form action="{{ route('voucher.list') }}" method="GET" class="flex flex-col lg:flex-row gap-6 items-end">
                <!-- Search Box -->
                <div class="flex-1 w-full">
                    <label class="block text-gray-700 font-semibold mb-3 text-lg" for="region">
                        <i class="fas fa-search mr-2 text-yellow-500"></i>
                        Search Promotion
                    </label>
                    <div class="relative">
                        <select id="region"
                                name="region"
                                class="w-full pl-5 pr-10 py-4 rounded-xl focus:outline-none text-gray-700 text-lg bg-white appearance-none border border-gray-200">
                            <option value="">All Regions</option>
                            <option value="Kuta" {{ request('region') == 'Kuta' ? 'selected' : '' }}>Kuta</option>
                            <option value="Senggigi" {{ request('region') == 'Senggigi' ? 'selected' : '' }}>Senggigi / Batu Bolong / Batu Layar</option>
                            <option value="Gili" {{ request('region') == 'Gili' ? 'selected' : '' }}>Gili Air / Meno / Trawangan</option>
                            <option value="Tanjung" {{ request('region') == 'Tanjung' ? 'selected' : '' }}>Tanjung / Bangsal</option>
                            <option value="Sekotong" {{ request('region') == 'Sekotong' ? 'selected' : '' }}>Sekotong</option>
                            <option value="Lembar" {{ request('region') == 'Lembar' ? 'selected' : '' }}>Lembar</option>
                            <option value="Cakra" {{ request('region') == 'Cakra' ? 'selected' : '' }}>Cakra</option>
                            <option value="Ampenan" {{ request('region') == 'Ampenan' ? 'selected' : '' }}>Ampenan</option>
                            <option value="Bandara" {{ request('region') == 'Bandara' ? 'selected' : '' }}>Airport</option>
                            <option value="Selong Belanak" {{ request('region') == 'Selong Belanak' ? 'selected' : '' }}>Selong Belanak</option>
                            <option value="Other" {{ request('region') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-yellow-500">
                            <i class="fas fa-chevron-down text-lg"></i>
                        </div>
                    </div>
                </div>

                <!-- Category Filter -->
                <div class="flex-1 w-full">
                    <label class="block text-gray-700 font-semibold mb-3 text-lg" for="category">
                        <i class="fas fa-tags mr-2 text-yellow-500"></i>Discount Category
                    </label>
                    <div class="relative">
                        <select id="category" name="category"
                            class="w-full px-5 py-4 rounded-xl focus:outline-none appearance-none bg-white text-gray-700 text-lg border border-gray-200">
                            <option value="all" {{ request('category') == 'all' ? 'selected' : '' }}>All Categories</option>
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

        <!-- Voucher Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
            @foreach ($vouchers as $voucher)
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover voucher-card border border-gray-100">
                <div class="relative">
                    <img src="{{ asset('storage/' . $voucher->gambar) }}" alt="{{ $voucher->nama }}" class="w-full h-40 object-cover">

                    @if ($voucher->diskon)
                    <div class="absolute top-3 right-3 bg-yellow-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                        Discount {{ rtrim(rtrim(number_format($voucher->diskon, 2, ',', '.'), '0'), ',') }}%
                    </div>
                    @endif

                    <a href="" class="eye-icon-container">
                        <i class="fas fa-eye eye-icon"></i>
                    </a>
                </div>

                <!-- Price below image -->
                <div class="px-4 pt-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-base font-semibold text-gray-800">
                            {{ $voucher->nama }}
                        </h3>
                        <div class="text-right">
                            <p class="text-xs text-gray-500">Price</p>
                            <p class="text-sm font-bold text-yellow-500">
                                Rp {{ number_format($voucher->harga, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="p-4 pt-2">
                    <!-- VOUCHER TAGLINE -->
                    <p class="text-yellow-500 mb-2 italic font-medium text-xs">"{{ $voucher->tagline }}"</p>

                    <p class="text-gray-600 mb-2 text-xs">{{ Str::limit($voucher->deskripsi, 70) }}</p>

                    <!-- VOUCHER FEATURES -->
                    <div class="flex flex-wrap gap-1 mb-3">
                        @php
                            $fitur = is_string($voucher->fitur) ? json_decode($voucher->fitur, true) : $voucher->fitur;
                            $fitur = is_array($fitur) ? $fitur : explode(',', $voucher->fitur);
                        @endphp
                        @foreach($fitur as $item)
                            <span class="bg-yellow-500 text-white text-xs font-medium px-2 py-0.5 rounded">
                                {{ trim($item) }}
                            </span>
                        @endforeach
                    </div>

                    <div class="flex flex-col gap-2">
                        <div class="text-xs text-gray-500 text-center">
                            <i class="fas fa-clock mr-1 text-yellow-500"></i>
                            Valid until: {{ \Carbon\Carbon::parse($voucher->berlaku_hingga)->translatedFormat('d M Y') }}
                        </div>
                        <a href="https://wa.me/{{ $voucher->whatsapp }}"
                           class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-3 rounded-lg transition duration-300 text-xs text-center block"
                           target="_blank">
                            Get Voucher
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
