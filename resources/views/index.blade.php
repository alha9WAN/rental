<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LombokRentHub - Kurasi Terbaik Sewa Mobil & Motor di Lombok</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
{{-- link css --}}
<link rel="stylesheet" href="{{ asset('css-web/index.css') }}">
{{-- link js  --}}
<script src="{{ asset('js-web/index.js') }}"></script>

<body class="font-sans bg-light text-dark">
    <!-- Header Navbar -->
    <header class="sticky-nav shadow-sm">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <div class="text-2xl font-bold text-primary">Lombok<span class="text-accent">RentHub</span></div>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="#vehicles" class="font-medium text-gray-700 hover:text-primary transition duration-300">Kendaraan</a>
                    <a href="#steps" class="font-medium text-gray-700 hover:text-primary transition duration-300">Cara Sewa</a>
                    <a href="#testimonials" class="font-medium text-gray-700 hover:text-primary transition duration-300">Testimoni</a>
                    <a href="#vouchers" class="font-medium text-gray-700 hover:text-primary transition duration-300">Voucher</a>
                    <a href="#faq" class="font-medium text-gray-700 hover:text-primary transition duration-300">FAQ</a>
                </nav>

                <div class="flex items-center space-x-4">
                    <button class="hidden md:block text-gray-700 hover:text-primary transition duration-300">
                        <i class="fas fa-search"></i>
                    </button>
                    <button class="bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                        Masuk
                    </button>
                    <button class="md:hidden text-gray-700">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

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
    <section id="vehicles" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Kurasi <span class="text-primary">Mobil</span> Terbaik</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Kami memilihkan mobil terbaik dari partner terpercaya di seluruh Lombok.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                                                {{--  @foeach mobil --}}
@foreach ($mobils as $mobil )
                <!-- Mobil 1 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover border border-gray-100 relative car-card">
                    <div class="relative">
       <img src="{{ asset('storage/' . $mobil->gambar) }}" alt="{{ $mobil->nama }}" class="w-full h-50 object-cover">

        <div class="absolute top-4 right-4
            {{ $mobil->status == 'tersedia' ? 'bg-blue-500' : 'bg-red-500' }}
            text-white text-xs font-semibold px-3 py-1 rounded-full">
            {{ ucfirst($mobil->status) }}
        </div>

        <div class="absolute bottom-4 left-4 bg-white bg-opacity-90 text-xs font-semibold px-3 py-1 rounded-full flex items-center">
            <i class="fas fa-star text-yellow-500 mr-1"></i> {{ $mobil->rating }}
        </div>
                        <!-- Eye Icon dengan Link -->
                        <a href="/detail-mobil-avanza" class="eye-icon-container">
                            <i class="fas fa-eye eye-icon"></i>
                        </a>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                              <h3 class="text-xl font-bold">{{ $mobil->nama }}</h3>
                                  <span class="text-primary font-bold"> Rp {{ number_format($mobil->harga_per_hari, 0, ',', '.') }}
                               <span class="text-sm font-normal">/hari</span>
            </span>
                        </div>
                          <p class="text-gray-600 mb-4">{{ $mobil->deskripsi }}</p>

                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <i class="fas fa-car-side mr-2 text-primary"></i>
                            <span class="mr-4">{{ $mobil->tipe }}</span>
                            <i class="fas fa-users mr-2 text-primary"></i>
                            <span>{{ $mobil->kursi }}</span>


            <i class="fas fa-layer-group ml-2 mr-2 text-primary"></i>
            <span>{{ $mobil->mobilKategori->nama }}</span>

                        </div>

                        <div class="mb-4">
                            <div class="text-sm text-gray-500 mb-1">Disewakan oleh:</div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-primary rounded-full
                                    flex items-center justify-center text-white text-sm font-bold mr-2">{{ $mobil->inisial_vendor }}</div>
                                    <div>
                                        <div class="font-semibold">{{ $mobil->vendor }}</div>
                                        <div class="text-xs text-gray-500 flex items-center">
                                            <i class="fas fa-map-marker-alt mr-1"></i>
                                            <div class="font-semibold"></div>
                                                {{ $mobil->lokasi }}
                                        </div>
                                    </div>
                                </div>
                                <a href="https://wa.me/{{ $mobil->whatsapp }}" class="company-whatsapp" target="_blank">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>

                      <a href="#" class="block w-full bg-primary hover:bg-blue-700 text-white font-semibold py-3 rounded-lg text-center transition duration-300">
                    Lihat Detail & Sewa
                      </a>

                    </div>
                </div>
                @endforeach
            {{-- end @foeach mobil --}}
            </div>

            <div class="text-center mt-12">
                <button class="border-2 border-primary text-primary hover:bg-primary hover:text-white font-semibold py-3 px-8 rounded-lg transition duration-300">
                    Lihat Semua Mobil <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Section 3: List Motor -->
    <section class="py-16 bg-light">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Kurasi <span class="text-secondary">Motor</span> Terbaik</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Pilihan motor terbaik dari partner terpercaya untuk menjelajahi Lombok.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

 {{-- @foreach motor --}}
@foreach ($motors as $motor)
<div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover border border-gray-100 relative car-card">
    <div class="relative">
        <img src="{{ asset('storage/' . $motor->gambar) }}" alt="{{ $motor->nama }}" class="w-full h-45 object-cover">

        <div class="absolute top-4 right-4
     {{ $motor->status == 'tersedia' ? 'bg-blue-500' : 'bg-red-500' }}
            text-white text-xs font-semibold px-3 py-1 rounded-full">
            {{ ucfirst($motor->status) }}
        </div>

        <div class="absolute bottom-4 left-4 bg-white bg-opacity-90 text-xs font-semibold px-3 py-1 rounded-full flex items-center">
            <i class="fas fa-star text-yellow-500 mr-1"></i> {{ $motor->rating }}
        </div>

        {{-- tombol lihat detail --}}
        <a href="" class="eye-icon-container">
            <i class="fas fa-eye eye-icon"></i>
        </a>
    </div>

    <div class="p-6">
        <div class="flex justify-between items-start mb-2">
            <h3 class="text-xl font-bold">{{ $motor->nama }}</h3>
            <span class="text-secondary font-bold">
                Rp {{ number_format($motor->harga_per_hari, 0, ',', '.') }}
                <span class="text-sm font-normal">/hari</span>
            </span>
        </div>

        <p class="text-gray-600 mb-4">{{ $motor->deskripsi }}</p>

        <div class="flex items-center text-sm text-gray-500 mb-4">
            <i class="fas fa-motorcycle mr-2 text-secondary"></i>
            <span class="mr-4">{{ $motor->tipe }}</span>
            <i class="fas fa-gas-pump mr-2 text-secondary"></i>
            <span>{{ $motor->bahan_bakar }}</span>
            <i class="fas fa-layer-group ml-2 mr-2 text-secondary"></i>
            <span>{{ $motor->kategoriMotor->nama ?? '-' }}</span>
        </div>

        <div class="mb-4">
            <div class="text-sm text-gray-500 mb-1">Disewakan oleh:</div>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-white text-sm font-bold mr-2">
                        {{ $motor->inisial_vendor }}
                    </div>
                    <div>
                        <div class="font-semibold">{{ $motor->vendor }}</div>
                        <div class="text-xs text-gray-500 flex items-center">
                            <i class="fas fa-map-marker-alt mr-1"></i> {{ $motor->lokasi }}
                        </div>
                    </div>
                </div>
                <a href="https://wa.me/{{ $motor->whatsapp }}" class="company-whatsapp" target="_blank">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
        </div>

        {{-- tombol sewa --}}
        <a href="#" class="block w-full bg-primary hover:bg-blue-700 text-white font-semibold py-3 rounded-lg text-center transition duration-300">
            Lihat Detail & Sewa
        </a>
    </div>
</div>
@endforeach
{{-- end @foreach motor --}}



            </div>

            <div class="text-center mt-12">
                <button class="border-2 border-secondary text-secondary hover:bg-secondary hover:text-white font-semibold py-3 px-8 rounded-lg transition duration-300">
                    Lihat Semua Motor <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Section 4: Langkah Mudah Sewa -->
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

    <!-- Section 5: Testimoni -->
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
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
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
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
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
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="opacity-90">"Sangat recommended! Proses dari booking sampai pengambilan kendaraan lancar berkat kurasi yang tepat."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section 6: Voucher Restoran -->
    <section id="vouchers" class="py-16 bg-light">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Voucher & Diskon <span class="text-accent">Restoran</span></h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Nikmati penawaran spesial dari restoran terbaik di Lombok selama menyewa kendaraan dari partner kami.</p>
            </div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach ($vouchers as $voucher)
        <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover">
            <div class="relative">
                <img src="{{ asset('storage/' . $voucher->gambar) }}"
                     alt="{{ $voucher->nama }}"
                     class="w-full h-50 object-cover">

                @if ($voucher->diskon)
                    <div class="absolute top-4 right-4 bg-accent text-white text-xs font-semibold px-3 py-1 rounded-full">
                        Diskon {{ rtrim(rtrim(number_format($voucher->diskon, 2, ',', '.'), '0'), ',') }}%
                    </div>
                @endif
            </div>

            <div class="p-6">
                <h3 class="text-xl font-bold mb-2">{{ $voucher->nama }}</h3>
                <p class="text-gray-600 mb-4">{{ $voucher->deskripsi }}</p>

                <div class="flex justify-between items-center">
                    <div class="text-sm text-gray-500">
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
    @endforeach
</div>
{{-- End @foreach voucher --}}




        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="text-2xl font-bold text-primary mb-4">Lombok<span class="text-accent">RentHub</span></div>
                    <p class="text-gray-400 mb-4">Platform kurasi terbaik untuk sewa kendaraan di Lombok.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="#vehicles" class="text-gray-400 hover:text-white transition duration-300">Kendaraan</a></li>
                        <li><a href="#steps" class="text-gray-400 hover:text-white transition duration-300">Cara Sewa</a></li>
                        <li><a href="#testimonials" class="text-gray-400 hover:text-white transition duration-300">Testimoni</a></li>
                        <li><a href="#vouchers" class="text-gray-400 hover:text-white transition duration-300">Voucher</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Bantuan</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Hubungi Kami</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Kontak</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2 text-primary"></i>
                            Mataram, Lombok, Indonesia
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-2 text-primary"></i>
                            +62 812-3456-7890
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-2 text-primary"></i>
                            info@lombokrenthub.com
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2023 LombokRentHub. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
