<header class="sticky-nav shadow-sm">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="text-2xl font-bold text-primary">
                Lombok<span class="text-accent">RentHub</span>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex space-x-8">
                <a href="/" class="font-medium text-gray-700 hover:text-primary transition">Home</a>
                <a href="/blog" class="font-medium text-gray-700 hover:text-primary transition">Blog</a>
                <a href="{{ route('mobil.list') }}" class="font-medium text-gray-700 hover:text-primary transition">Car Rental</a>
                <a href="{{ route('motor.list') }}" class="font-medium text-gray-700 hover:text-primary transition">Scooter Rental</a>
                <a href="{{ route('carpool.list') }}" class="font-medium text-gray-700 hover:text-primary transition">Car Pool</a>
                <a href="{{ route('voucher.list') }}" class="font-medium text-gray-700 hover:text-primary transition">Promotion</a>
                <a href="/#faq" class="font-medium text-gray-700 hover:text-primary transition">FAQ</a>
            </nav>

            <!-- Right Section -->
            <div class="flex items-center space-x-4">
                <button class="hidden lg:block text-gray-700 hover:text-primary transition">
                    <i class="fas fa-search"></i>
                </button>

                <a href="{{ route('mitra.create') }}" class="hidden lg:block">
                    <button class="bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                        Become Partner
                    </button>
                </a>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="lg:hidden text-gray-700 transition-transform">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden lg:hidden bg-white py-4 px-4 rounded-lg shadow-lg mt-2">
            <div class="flex flex-col space-y-4">
                <a href="/" class="font-medium text-gray-700 hover:text-primary">Home</a>
                <a href="/blog" class="font-medium text-gray-700 hover:text-primary">Blog</a>
                <a href="{{ route('mobil.list') }}" class="font-medium text-gray-700 hover:text-primary">Car Rental</a>
                <a href="{{ route('motor.list') }}" class="font-medium text-gray-700 hover:text-primary">Scooter Rental</a>
                <a href="{{ route('carpool.list') }}" class="font-medium text-gray-700 hover:text-primary">Car Pool</a>
                <a href="{{ route('voucher.list') }}" class="font-medium text-gray-700 hover:text-primary">Promotion</a>
                <a href="/#faq" class="font-medium text-gray-700 hover:text-primary">FAQ</a>

                <!-- Partner Button on Mobile -->
                <a href="{{ route('mitra.create') }}"
                   class="block w-full bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg text-center rounded-lg transition">
                    Become Partner
                </a>
            </div>
        </div>
    </div>
</header>
