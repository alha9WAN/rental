@extends('components.page')
@section('content')
<section class="min-h-screen bg-white py-20 px-6 relative overflow-hidden">
    <!-- Elemen dekoratif gradasi biru -->
    <div class="absolute top-0 left-0 w-72 h-72 bg-gradient-to-br from-blue-100 via-blue-200 to-transparent rounded-full blur-3xl opacity-50 -z-10 animate-float-slow"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-gradient-to-tl from-blue-200 via-blue-100 to-transparent rounded-full blur-3xl opacity-40 -z-10 animate-float-slow"></div>

    <div class="max-w-6xl mx-auto">
        <!-- HERO SECTION -->
        <div class="relative mb-20 text-center">
            <h1 class="text-5xl md:text-5xl font-extrabold mb-6 tracking-tight drop-shadow-sm">
                Blog <span class="text-blue-500"> Kami</span>
            </h1>

            <p class="text-gray-600 text-lg md:text-xl max-w-2xl mx-auto mb-6 animate-fadeIn">
                Temukan tips perjalanan, panduan sewa mobil, dan berita terbaru seputar dunia transportasi bersama kami.
            </p>
        </div>

        <!-- KONTEN UTAMA -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-14 items-center">
            <!-- TEKS KIRI -->
            <div class="space-y-6 animate-fadeInLeft">
                <h2 class="text-3xl md:text-4xl font-extrabold leading-tight text-gray-900">
                    Nikmati <span class="text-blue-600 drop-shadow-sm">Perjalanan Nyaman</span> Bersama Kami
                </h2>

                <p class="text-gray-700 leading-relaxed text-justify">
                    Kami menyediakan layanan rental mobil yang aman, nyaman, dan terpercaya untuk berbagai kebutuhan —
                    mulai dari perjalanan bisnis, wisata keluarga, hingga transportasi harian.
                    Dengan armada terbaik dan layanan profesional, kami siap menemani setiap perjalanan Anda.
                </p>

                <p class="text-gray-700 leading-relaxed text-justify">
                    Melalui blog ini, kami berbagi tips seputar berkendara, panduan memilih mobil yang tepat,
                    hingga informasi menarik tentang destinasi populer di seluruh Indonesia.
                </p>

                <p class="text-gray-700 leading-relaxed text-justify">
                    Dapatkan juga update promo dan berita terbaru dari dunia otomotif dan layanan transportasi modern.
                    Kami berkomitmen menghadirkan pengalaman rental mobil yang mudah, cepat, dan menyenangkan.
                </p>

                <a href="#artikel"
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-full shadow-lg font-semibold tracking-wide transition-all duration-300 transform hover:-translate-y-1 hover:shadow-2xl">
                    Lihat Artikel Terbaru
                </a>
            </div>

            <!-- GAMBAR KANAN (DIBERIKAN ANIMASI MELAYANG) -->
            <div class="animate-float-slow relative">
                <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=900&q=80"
                     alt="Mobil Rental"
                     class="rounded-3xl shadow-2xl w-full object-cover transition-transform duration-700 hover:scale-105 border border-blue-100">
                <div class="absolute -bottom-6 left-1/2 -translate-x-1/2 w-2/3 h-10 bg-blue-200/20 rounded-full blur-3xl"></div>
            </div>
        </div>
    </div>
</section>


@endsection



