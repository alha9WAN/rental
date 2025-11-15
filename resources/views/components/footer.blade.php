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
                        <li><a href="/" class="text-gray-400 hover:text-white transition duration-300">Home</a></li>
                        <li><a href="/blog" class="text-gray-400 hover:text-white transition duration-300">Blog</a></li>
                        <li><a href="{{ route('mobil.list') }}" class="text-gray-400 hover:text-white transition duration-300">Car Rental</a></li>
                        <li><a href="{{ route('motor.list') }}" class="text-gray-400 hover:text-white transition duration-300">Scooter Rental</a></li>
                        <li><a href="{{ route('carpool.list') }}" class="text-gray-400 hover:text-white transition duration-300">Car Pool</a></li>
                        <li><a href="{{ route('voucher.list') }}" class="text-gray-400 hover:text-white transition duration-300">Promotion</a></li>
                        <li><a href="/#faq" class="text-gray-400 hover:text-white transition duration-300">FAQ</a></li>
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
    <!-- END Footer -->
