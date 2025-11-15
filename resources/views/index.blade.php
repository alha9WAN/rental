@extends('components.page')
@section('content')

<!-- Section 1: Hero -->
<section class="gradient-bg text-white">
    <div class="container mx-auto px-4 py-16 md:py-24">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <div class="partner-badge inline-block mb-4">Kurasi Terbaik Partner Sewa Lombok</div>
                <h1 class="text-4xl md:text-6xl font-bold mb-6">Jelajahi <span class="text-accent">Lombok</span> dengan Kendaraan Terbaik</h1>
                <p class="text-xl mb-8 opacity-90">Kami mengkurasi penyedia sewa mobil & motor terpercaya di Lombok. Dapatkan harga terbaik dengan kualitas terjamin.</p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <button class="bg-accent hover:bg-yellow-600 text-white font-semibold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105">
                        <i class="fas fa-car mr-2"></i>Cari Kendaraan
                    </button>
                    <button class="bg-white hover:bg-gray-100 text-primary font-semibold py-3 px-8 rounded-lg transition duration-300">
                        <i class="fas fa-play-circle mr-2"></i>Lihat Demo
                    </button>
                </div>
                <div class="mt-12 flex items-center space-x-6">
                    <div class="text-center">
                        <div class="text-2xl font-bold">50+</div>
                        <div class="text-sm opacity-80">Partner Terpercaya</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold">4.9/5</div>
                        <div class="text-sm opacity-80">Rating Pelanggan</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold">100%</div>
                        <div class="text-sm opacity-80">Kendaraan Terverifikasi</div>
                    </div>
                </div>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1622737133809-d95047b9e673?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Car and Motorcycle" class="rounded-2xl shadow-2xl animate-float">
                    <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-xl shadow-lg">
                        <div class="text-sm text-gray-500">Harga mulai dari</div>
                        <div class="text-2xl font-bold text-primary">Rp 80.000<span class="text-sm font-normal">/hari</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 2: List Mobil -->
<section id="mobil" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Kurasi <span class="text-primary">Mobil</span> Terbaik</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Kami memilihkan mobil terbaik dari partner terpercaya di seluruh Lombok.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($mobils as $mobil)
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover border border-gray-100 relative product-card">
                <div class="relative">
                    <img src="{{ asset('storage/' . $mobil->gambar) }}" alt="{{ $mobil->nama }}" class="w-full h-50 object-cover">
                    <div class="absolute top-4 right-4 bg-blue-500 text-white text-xs font-semibold px-3 py-1 rounded-full">
                        {{ $mobil->mobilKategori->nama }}
                    </div>
                    <div class="absolute bottom-4 left-4 bg-white bg-opacity-90 text-xs font-semibold px-3 py-1 rounded-full flex items-center">
                        <i class="fas fa-star text-yellow-500 mr-1"></i> {{ $mobil->rating }}
                    </div>
                    <a href="/detail-mobil-avanza" class="eye-icon-container eye-icon-mobil">
                        <i class="fas fa-eye eye-icon"></i>
                    </a>
                </div>

                <div class="p-6 card-content">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold">{{ $mobil->nama }}</h3>
                        <p class="text-primary font-bold text-right">
                            <span class="text-gray-500 font-normal">Start from</span><br>
                            Rp.{{ number_format($mobil->harga_per_hari, 0, ',', '.') }}
                            <span class="text-sm font-normal text-gray-600">/hari</span>
                        </p>
                    </div>

                    <!-- TAGLINE MOBIL -->
                    <p class="text-blue-500 mb-4 italic font-bold text-md">"{{ $mobil->tagline }}"</p>

                    <p class="text-gray-600 mb-4">{{ $mobil->deskripsi }}</p>

                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <i class="fas fa-car-side mr-2 text-primary"></i>
                        <span class="mr-4">{{ $mobil->tipe }}</span>
                        <i class="fas fa-users mr-2 text-primary"></i>
                        <span>{{ $mobil->kursi }} Kursi</span>
                    </div>

                    <!-- FITUR MOBIL -->
                                     <div class="flex flex-wrap gap-2 mb-4">
                                        @php
                           $fitur = is_string($mobil->fitur) ? json_decode($mobil->fitur, true) : $mobil->fitur;
                         $fitur = is_array($fitur) ? $fitur : explode(',', $mobil->fitur);
                               @endphp
                         @foreach($fitur as $item)
                    <span class="bg-blue-500 text-white text-xs font-medium px-2.5 py-0.5 rounded">{{ trim($item) }}</span>
                        @endforeach
                     </div>

                    <div class="mb-4">
                        <div class="text-sm text-gray-500 mb-1">Disewakan oleh:</div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white text-sm font-bold mr-2">
                                    {{ $mobil->inisial_vendor }}
                                </div>
                                <div>
                                    <div class="font-semibold">{{ $mobil->vendor }}</div>
                                    <div class="text-xs text-gray-500 flex items-center">
                                        <i class="fas fa-map-marker-alt mr-1"></i>
                                        {{ $mobil->lokasi }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="https://wa.me/{{ $mobil->whatsapp }}"
                           class="flex items-center justify-center w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 rounded-lg text-center transition duration-300 transform hover:scale-105"
                           target="_blank">
                           <i class="fab fa-whatsapp mr-2 text-xl"></i>
                           Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('mobil.list') }}"
               class="inline-block border-2 border-primary text-primary hover:bg-primary hover:text-white font-semibold py-3 px-8 rounded-lg transition duration-300">
               Lihat Semua Mobil <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Section 3: List Motor -->
<section class="py-16 bg-white" id="motor">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Kurasi <span class="text-secondary">Motor</span> Terbaik</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Pilihan motor terbaik dari partner terpercaya untuk menjelajahi Lombok.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($motors as $motor)
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover border border-gray-100 relative product-card">
                <div class="relative">
                    <img src="{{ asset('storage/' . $motor->gambar) }}" alt="{{ $motor->nama }}" class="w-full h-50 object-cover">
                    <div class="absolute top-4 right-4 bg-green-500 text-white text-xs font-semibold px-3 py-1 rounded-full">
{{ ucwords(str_replace('_', '–', $motor->kategoriMotor->nama ?? '-')) }}
                    </div>
                    <div class="absolute bottom-4 left-4 bg-white bg-opacity-90 text-xs font-semibold px-3 py-1 rounded-full flex items-center">
                        <i class="fas fa-star text-yellow-500 mr-1"></i> {{ $motor->rating }}
                    </div>
                    <a href="/detail-motor-scoopy" class="eye-icon-container eye-icon-motor">
                        <i class="fas fa-eye eye-icon"></i>
                    </a>
                </div>

                <div class="p-6 card-content">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold">{{ $motor->nama }}</h3>
                        <p class="text-green-500 font-bold text-right">
                            <span class="text-gray-500 font-normal">Start from</span><br>
                            Rp. {{ number_format($motor->harga_per_hari, 0, ',', '.') }}
                            <span class="text-sm font-normal text-gray-600">/12 Jam</span>
                        </p>
                    </div>

                    <!-- TAGLINE MOTOR -->
                    <p class="text-green-500 mb-4 italic font-bold text-md">"{{ $motor->tagline }}"</p>

                    <p class="text-gray-600 mb-4">{{ $motor->deskripsi }}</p>

                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <i class="fas fa-motorcycle mr-2 text-secondary"></i>
                        <span class="mr-4">{{ $motor->tipe }}</span>
                        <i class="fas fa-gas-pump mr-2 text-secondary"></i>
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
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center text-white text-sm font-bold mr-2">
                                    {{ $motor->inisial_vendor }}
                                </div>
                                <div>
                                    <div class="font-semibold">{{ $motor->vendor }}</div>
                                    <div class="text-xs text-gray-500 flex items-center">
                                        <i class="fas fa-map-marker-alt mr-1"></i>
                                        {{ $motor->lokasi }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="https://wa.me/{{ $motor->whatsapp }}"
                           class="flex items-center justify-center w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-3 rounded-lg text-center transition duration-300 transform hover:scale-105"
                           target="_blank">
                           <i class="fab fa-whatsapp mr-2 text-xl"></i>
                           Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('motor.list') }}"
               class="inline-block border-2 border-secondary text-secondary hover:bg-secondary hover:text-white font-semibold py-3 px-8 rounded-lg transition duration-300">
               Lihat Semua Motor <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Section 4: List Carpool -->
<section class="py-16 bg-white" id="carpool">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Carpool - <span class="text-purple-600">Rute Lombok & Sekitarnya</span></h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Berbagi perjalanan, berbagi pengalaman. Hemat biaya dengan carpool ke destinasi favorit di Lombok.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($carrPools as $carrPool)
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover border border-gray-100 relative product-card">
                <div class="relative">
                    <img src="{{ asset('storage/' . $carrPool->gambar) }}" alt="{{ $carrPool->nama_rute }}" class="w-full h-50 object-cover">
                    <div class="absolute top-4 right-4 bg-purple-500 text-white text-xs font-semibold px-3 py-1 rounded-full">
                        {{ $carrPool->kategori->name ?? '-' }}
                    </div>
                    <div class="absolute bottom-4 left-4 bg-white bg-opacity-90 text-xs font-semibold px-3 py-1 rounded-full flex items-center">
                        <i class="fas fa-star text-yellow-500 mr-1"></i> {{ $carrPool->rating }}
                    </div>
                    <a href="/detail-carpool-mataram-senggigi" class="eye-icon-container eye-icon-carpool">
                        <i class="fas fa-eye eye-icon"></i>
                    </a>
                </div>

                <div class="p-6 card-content">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold">{{ $carrPool->nama_rute }}</h3>
                        <p class="text-purple-600 font-bold text-right">
                            <span class="text-gray-500 font-normal text-sm">Harga per kursi</span><br>
                            Rp. {{ number_format($carrPool->harga_per_kursi, 0, ',', '.') }}
                            <span class="text-sm font-normal text-gray-600">/kursi</span>
                        </p>
                    </div>

                    <p class="text-purple-600 mb-4 italic font-bold text-md">"{{ $carrPool->tagline }}"</p>

                    <div class="text-gray-600 mb-4 text-sm">
                        {{ $carrPool->deskripsi }}
                    </div>

                    <!-- FITUR CARPOOL -->

                                      <div class="flex flex-wrap gap-2 mb-4">
    @php
        $fitur = is_string($carrPool->fitur) ? json_decode($carrPool->fitur, true) : $carrPool->fitur;
        $fitur = is_array($fitur) ? $fitur : explode(',', $carrPool->fitur);
    @endphp
    @foreach($fitur as $item)
        <span class="bg-purple-500 text-white text-xs font-medium px-2.5 py-0.5 rounded">
            {{ trim($item) }}
        </span>
    @endforeach
</div>

                    <div class="mb-4">
                        <div class="text-sm text-gray-500 mb-1">Jam Berangkat:</div>
                        <div class="font-semibold">{{ $carrPool->jam_berangkat }} WITA</div>
                    </div>

                    <div class="card-footer">
                        <a href="https://wa.me/{{ $carrPool->whatsapp }}"
                           class="flex items-center justify-center w-full bg-purple-500 hover:bg-purple-600 text-white font-semibold py-3 rounded-lg text-center transition duration-300 transform hover:scale-105"
                           target="_blank">
                           <i class="fab fa-whatsapp mr-2 text-xl"></i>
                           Gabung Sekarang
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('carpool.list') }}"
               class="inline-block border-2 border-purple-500 text-purple-500 hover:bg-purple-500 hover:text-white font-semibold py-3 px-8 rounded-lg transition duration-300">
               Lihat Semua Carpool <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Section 5: Langkah Mudah Sewa -->
<section id="steps" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Langkah Mudah <span class="text-primary">Menyewa</span></h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Hanya dalam 4 langkah sederhana, kendaraan impian Anda siap menemani perjalanan.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center p-6">
                <div class="bg-primary text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">1</div>
                <h3 class="text-xl font-semibold mb-3">Pilih Kendaraan</h3>
                <p class="text-gray-600">Pilih mobil atau motor yang sesuai dengan kebutuhan perjalanan Anda dari berbagai partner terpercaya</p>
            </div>

            <div class="text-center p-6">
                <div class="bg-primary text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">2</div>
                <h3 class="text-xl font-semibold mb-3">Hubungi Partner</h3>
                <p class="text-gray-600">Kami sambungkan Anda langsung dengan partner penyedia kendaraan untuk konfirmasi ketersediaan</p>
            </div>

            <div class="text-center p-6">
                <div class="bg-primary text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">3</div>
                <h3 class="text-xl font-semibold mb-3">Proses Sewa</h3>
                <p class="text-gray-600">Lakukan pembayaran dan penandatanganan perjanjian sewa dengan partner yang dipilih</p>
            </div>

            <div class="text-center p-6">
                <div class="bg-primary text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">4</div>
                <h3 class="text-xl font-semibold mb-3">Ambil Kendaraan</h3>
                <p class="text-gray-600">Ambil kendaraan di lokasi partner dan nikmati perjalanan Anda di Lombok</p>
            </div>
        </div>
    </div>
</section>

<!-- Section 6: Testimoni -->
<section id="testimonials" class="py-16 bg-gradient-to-r from-primary to-blue-600 text-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Apa Kata <span class="text-accent">Pelanggan</span> Kami</h2>
            <p class="max-w-2xl mx-auto opacity-90">Dengarkan pengalaman langsung dari pelanggan yang telah menggunakan layanan kurasi kami.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-2xl p-6 border border-white border-opacity-20">
                <div class="flex items-center mb-4">
                    <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Sarah" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-semibold">Sarah Wijaya</h4>
                        <div class="flex text-accent">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <p class="opacity-90">"LombokRentHub sangat membantu menemukan rental mobil terpercaya. Prosesnya mudah dan harganya transparan."</p>
            </div>

            <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-2xl p-6 border border-white border-opacity-20">
                <div class="flex items-center mb-4">
                    <img src="https://randomuser.me/api/portraits/men/54.jpg" alt="Budi" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-semibold">Budi Santoso</h4>
                        <div class="flex text-accent">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <p class="opacity-90">"Dengan LombokRentHub, saya tidak perlu repot cari-cari rental motor. Semua partner yang direkomendasikan terpercaya."</p>
            </div>

            <div class="bg-white bg-opacity-10 backdrop-blur-lg rounded-2xl p-6 border border-white border-opacity-20">
                <div class="flex items-center mb-4">
                    <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Dewi" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h4 class="font-semibold">Dewi Anggraini</h4>
                        <div class="flex text-accent">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <p class="opacity-90">"Sangat recommended! Proses dari booking sampai pengambilan kendaraan lancar berkat kurasi yang tepat."</p>
            </div>
        </div>
    </div>
</section>

<!-- Section 7: Voucher Restoran -->
<!-- Section 7: Voucher Restoran -->
<section id="vouchers" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Voucher & Diskon <span class="text-accent">Restoran</span></h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Nikmati penawaran spesial dari restoran terbaik di Lombok selama menyewa kendaraan dari partner kami.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($vouchers as $voucher)
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover voucher-card product-card">
                <div class="relative">
                    <img src="{{ asset('storage/' . $voucher->gambar) }}" alt="{{ $voucher->nama }}" class="w-full h-48 object-cover">

                    @if ($voucher->diskon)
                    <div class="absolute top-4 right-4 bg-accent text-white text-xs font-semibold px-3 py-1 rounded-full">
                        Diskon {{ rtrim(rtrim(number_format($voucher->diskon, 2, ',', '.'), '0'), ',') }}%
                    </div>
                    @endif

                    <a href="#" class="eye-icon-container eye-icon-voucher">
                        <i class="fas fa-eye eye-icon"></i>
                    </a>
                </div>

                <div class="p-6 card-content">
                    <!-- HEADER DENGAN NAMA DAN HARGA -->
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 flex-1 pr-4">
                            {{ $voucher->nama }}
                        </h3>
                        <div class="text-right whitespace-nowrap">
                            <p class="text-xs text-gray-500 mb-1">Harga</p>
                            <p class="text-md font-bold text-yellow-500">
                                Rp {{ number_format($voucher->harga, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>

                    <!-- TAGLINE VOUCHER -->
                    <p class="text-yellow-500 mb-3 italic font-bold text-sm">"{{ $voucher->tagline }}"</p>

                    <p class="text-gray-600 mb-4 text-sm leading-relaxed">{{ $voucher->deskripsi }}</p>

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

                    <!-- FOOTER -->
                    <div class="card-footer pt-4 border-t border-gray-100">
                        <div class="flex justify-between items-center">
                            <div class="text-xs text-gray-500">
                                <i class="fas fa-clock mr-1 text-accent"></i>
                                Berlaku hingga: {{ \Carbon\Carbon::parse($voucher->berlaku_hingga)->translatedFormat('d F Y') }}
                            </div>
                            <a href="https://wa.me/{{ $voucher->whatsapp }}"
                               class="bg-accent hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 text-sm inline-block"
                               target="_blank">
                               Dapatkan Voucher
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('voucher.list') }}"
               class="inline-block border-2 border-yellow-500 text-yellow-500 hover:bg-yellow-500 hover:text-white font-semibold py-3 px-8 rounded-lg transition duration-300">
                Lihat Semua Voucher <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>




@endsection
