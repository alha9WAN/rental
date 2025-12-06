<footer class="bg-dark text-white py-14">
    <div class="container mx-auto max-w-7xl px-4 lg:px-6">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 lg:gap-16">

            <!-- Brand -->
            <div>
                <div class="text-2xl font-bold text-primary mb-4">
                    Lombok<span class="text-accent">RentHub</span>
                </div>
                <p class="text-gray-400 mb-6 leading-relaxed">
                    Curated and verified car and scooter rental providers. Skip the struggle, get the right price.
                </p>

                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="/" class="text-gray-400 hover:text-white transition">Home</a></li>
                    <li><a href="/blog" class="text-gray-400 hover:text-white transition">Blog</a></li>
                    <li><a href="{{ route('mobil.list') }}" class="text-gray-400 hover:text-white transition">Car Rental</a></li>
                    <li><a href="{{ route('motor.list') }}" class="text-gray-400 hover:text-white transition">Scooter Rental</a></li>
                    <li><a href="{{ route('carpool.list') }}" class="text-gray-400 hover:text-white transition">Car Pool</a></li>
                    <li><a href="{{ route('voucher.list') }}" class="text-gray-400 hover:text-white transition">Promotion</a></li>
                    <li><a href="/#faq" class="text-gray-400 hover:text-white transition">FAQ</a></li>
                </ul>
            </div>

            <!-- Help -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Help</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition">FAQ</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Terms & Conditions</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Privacy Policy</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition">Contact Us</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Contact</h3>
                <ul class="space-y-3 text-gray-400">
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt mr-3 text-primary mt-1"></i>
                        Mataram, Lombok, Indonesia
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone mr-3 text-primary"></i>
                        +62 812-3456-7890
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-envelope mr-3 text-primary"></i>
                        info@lombokrenthub.com
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-800 mt-10 pt-6 text-center text-gray-400 text-sm">
            <p>&copy; 2023 LombokRentHub. All rights reserved.</p>
        </div>

    </div>
</footer>
