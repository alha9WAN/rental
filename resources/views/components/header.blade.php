   <!-- Header Navbar -->

    <header class="sticky-nav shadow-sm">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <div class="text-2xl font-bold text-primary">Lombok<span class="text-accent">RentHub</span></div>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="/" class="font-medium text-gray-700 hover:text-primary transition duration-300">Home</a>
                     <a href="/blog" class="font-medium text-gray-700 hover:text-primary transition duration-300">Blog</a>
                    <a href="{{ route('mobil.list') }}" class="font-medium text-gray-700 hover:text-primary transition duration-300">Car Rental</a>
                    <a href="{{ route('motor.list') }}" class="font-medium text-gray-700 hover:text-primary transition duration-300">Scooter Rental</a>
                    <a href="{{ route('carpool.list') }}" class="font-medium text-gray-700 hover:text-primary transition duration-300">Car Pool</a>
                    <a href="{{ route('voucher.list') }}" class="font-medium text-gray-700 hover:text-primary transition duration-300">Promotion</a>
                    <a href="#faq" class="font-medium text-gray-700 hover:text-primary transition duration-300">FAQ</a>
                </nav>

                <div class="flex items-center space-x-4">
                    <button class="hidden md:block text-gray-700 hover:text-primary transition duration-300">
                        <i class="fas fa-search"></i>
                    </button>

                  <a href="{{ route('mitra.create') }}">
              <button class="bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                    Jadi Mitra
            </button>
            </a>

                    <button id="mobile-menu-button" class="md:hidden text-gray-700 transition-transform duration-300">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation Menu -->
            <div id="mobile-menu" class="md:hidden bg-white py-4 px-4 rounded-lg shadow-lg mt-2">
                <div class="flex flex-col space-y-4">
                    <a href="/" class="font-medium text-gray-700 hover:text-primary transition duration-300 py-2">Home</a>
                  <a href="/blog" class="font-medium text-gray-700 hover:text-primary transition duration-300">Blog</a>
                    <a href="{{ route('mobil.list') }}" class="font-medium text-gray-700 hover:text-primary transition duration-300 py-2">Car Rental</a>
                    <a href="{{ route('motor.list') }}" class="font-medium text-gray-700 hover:text-primary transition duration-300 py-2">Scooter Rental</a>
                    <a href="{{ route('carpool.list') }}" class="font-medium text-gray-700 hover:text-primary transition duration-300 py-2">Car Pool</a>
                    <a href="{{ route('voucher.list') }}" class="font-medium text-gray-700 hover:text-primary transition duration-300 py-2">Promotion</a>
                    <a href="/#faq" class="font-medium text-gray-700 hover:text-primary transition duration-300 py-2">FAQ</a>
                    {{-- <div class="pt-2 border-t border-gray-200">
                        <button class="w-full bg-primary hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300">
                            Jadi Mitra
                        </button>
                    </div> --}}
                </div>
            </div>
        </div>
    </header>

        <!-- END Header Navbar -->
