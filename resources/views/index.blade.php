@extends('components.page')
@section('content')

<!-- Section 1: Hero -->
<section class="gradient-bg text-white">
    <div class="container mx-auto px-4 py-16 md:py-24">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <div class="partner-badge inline-block mb-4">Verified Vehicle Rental Partner</div>
                <h1 class="text-4xl md:text-6xl font-bold mb-6">Explore <span class="text-accent">Lombok</span> with Premium Vehicles</h1>
                <p class="text-3xl mb-8 opacity-90">
                    Curated and verified car and scooter rental providers. Skip the hassle, get the right price.
                </p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <button class="bg-accent hover:bg-yellow-600 text-white font-semibold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105">
                        <i class="fas fa-car mr-2"></i>Find Vehicles
                    </button>
                    <button class="bg-white hover:bg-gray-100 text-primary font-semibold py-3 px-8 rounded-lg transition duration-300">
                        <i class="fas fa-play-circle mr-2"></i>Watch Demo
                    </button>
                </div>
                <div class="mt-12 flex items-center space-x-6">
                    <div class="text-center">
                        <div class="text-2xl font-bold">50+</div>
                        <div class="text-sm opacity-80">Trusted Partners</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold">4.9/5</div>
                        <div class="text-sm opacity-80">Customer Rating</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold">100%</div>
                        <div class="text-sm opacity-80">Verified Vehicles</div>
                    </div>
                </div>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <div class="relative">
                    <img src="{{ asset('img/hero.png') }}"
                         alt="Car and Motorcycle"
                         class="rounded-2xl shadow-2xl animate-float max-w-[600px] w-full">
                    <div class="absolute -bottom-6 -left-6 bg-white p-4 rounded-xl shadow-lg">
                        <div class="text-sm text-gray-500">Car rental starts from </div>
                        <div class="text-2xl font-bold text-primary">IDR 200,000<span class="text-sm font-normal">/10 hours.</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 2: Car Categories -->
<section id="mobil" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Featured <span class="text-primary">Car</span> Rentals</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Select vehicles and rent directly from verified rental providers.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
            <!-- Compact -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover border border-gray-100 relative">
                <div class="relative">
                    <img src="{{ asset('img/mobil.png') }}" alt="Compact Car" class="w-full h-50 object-cover">
                    <div class="absolute top-3 right-3 bg-primary text-white text-xs font-semibold px-2 py-1 rounded-full">
                        Compact
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 text-gray-800"><span class="text-blue-500">Compact</span> Car</h3>
                    <p class="text-gray-600 mb-4 text-sm">Fuel-efficient vehicles, perfect for city trips and small families.</p>
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Capacity:</span>
                            <span class="font-semibold">4 People</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Price from:</span>
                            <span class="font-bold text-primary">IDR 250,000/day</span>
                        </div>
                    </div>
                    <a href="{{ route('mobil.list', ['kategori' => 'Compact']) }}"
                       class="block w-full bg-primary hover:bg-blue-700 text-white text-center font-semibold py-3 px-4 rounded-lg transition duration-300">
                        View Options
                    </a>
                </div>
            </div>

            <!-- Medium -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover border border-gray-100 relative">
                <div class="relative">
                    <img src="{{ asset('img/mobil.png') }}" alt="Medium Car" class="w-full h-50 object-cover">
                    <div class="absolute top-3 right-3 bg-primary text-white text-xs font-semibold px-2 py-1 rounded-full">
                        Medium
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 text-gray-800"><span class="text-blue-500">Medium</span> Car</h3>
                    <p class="text-gray-600 mb-4 text-sm">Comfortable for long journeys, with more spacious luggage room.</p>
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Capacity:</span>
                            <span class="font-semibold">6 People</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Price from:</span>
                            <span class="font-bold text-primary">IDR 350,000/day</span>
                        </div>
                    </div>
                    <a href="{{ route('mobil.list', ['kategori' => 'Medium']) }}"
                       class="block w-full bg-primary hover:bg-blue-700 text-white text-center font-semibold py-3 px-4 rounded-lg transition duration-300">
                        View Options
                    </a>
                </div>
            </div>

            <!-- Large -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover border border-gray-100 relative">
                <div class="relative">
                    <img src="{{ asset('img/mobil.png') }}" alt="Large Car" class="w-full h-50 object-cover">
                    <div class="absolute top-3 right-3 bg-primary text-white text-xs font-semibold px-2 py-1 rounded-full">
                        Large
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 text-gray-800"><span class="text-blue-500">Large</span> Car</h3>
                    <p class="text-gray-600 mb-4 text-sm">Luxurious and comfortable for special occasions or business trips.</p>
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Capacity:</span>
                            <span class="font-semibold">8 People</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Price from:</span>
                            <span class="font-bold text-primary">IDR 500,000/day</span>
                        </div>
                    </div>
                    <a href="{{ route('mobil.list', ['kategori' => 'Large']) }}"
                       class="block w-full bg-primary hover:bg-blue-700 text-white text-center font-semibold py-3 px-4 rounded-lg transition duration-300">
                        View Options
                    </a>
                </div>
            </div>

            <!-- Mini Bus -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover border border-gray-100 relative">
                <div class="relative">
                    <img src="{{ asset('img/mobil.png') }}" alt="Mini Bus" class="w-full h-50 object-cover">
                    <div class="absolute top-3 right-3 bg-primary text-white text-xs font-semibold px-2 py-1 rounded-full">
                        Mini Bus
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Mini <span class="text-blue-500">Bus</span></h3>
                    <p class="text-gray-600 mb-4 text-sm">Ideal for large groups, families, or group tours.</p>
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Capacity:</span>
                            <span class="font-semibold">12-15 People</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Price from:</span>
                            <span class="font-bold text-primary">IDR 750,000/day</span>
                        </div>
                    </div>
                    <a href="{{ route('mobil.list', ['kategori' => 'Mini Bus']) }}"
                       class="block w-full bg-primary hover:bg-blue-700 text-white text-center font-semibold py-3 px-4 rounded-lg transition duration-300">
                        View Options
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('mobil.list', ['kategori' => 'all']) }}"
               class="inline-block border-2 border-primary text-primary hover:bg-primary hover:text-white font-semibold py-3 px-8 rounded-lg transition duration-300">
                View All Cars <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>
<!-- END Section 2: Car Categories -->

<!-- Section 3: Motorcycle Categories - YELLOW THEME -->
<section class="py-16 bg-white" id="motor">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Featured <span class="text-yellow-500">Motorcycle</span> Rentals</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Select vehicles and rent directly from verified rental providers.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
            <!-- Small Matic 110-125cc -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover border border-gray-100 relative">
                <div class="relative">
                    <img src="{{ asset('img/motor.png') }}" alt="Small Matic" class="w-full h-50 object-cover">
                    <div class="absolute top-3 right-3 bg-yellow-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                        110-125cc
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Small <span class="text-yellow-500">Matic</span></h3>
                    <p class="text-gray-600 mb-4 text-sm">Fuel-efficient, easy to ride, suitable for beginners and city use.</p>
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Type:</span>
                            <span class="font-semibold">Automatic</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Price from:</span>
                            <span class="font-bold text-yellow-500">IDR 75,000/12 hours</span>
                        </div>
                    </div>
                    <a href="{{ route('motor.list', ['kategori' => 'Small Matic 110-125cc']) }}"
                       class="block w-full bg-yellow-500 hover:bg-yellow-600 text-white text-center font-semibold py-3 px-4 rounded-lg transition duration-300">
                        View Options
                    </a>
                </div>
            </div>

            <!-- Mid Matic 125-155cc -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover border border-gray-100 relative">
                <div class="relative">
                    <img src="{{ asset('img/motor.png') }}" alt="Mid Matic" class="w-full h-50 object-cover">
                    <div class="absolute top-3 right-3 bg-yellow-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                        125-155cc
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Mid <span class="text-yellow-500">Matic</span></h3>
                    <p class="text-gray-600 mb-4 text-sm">More power, stable for long distance and uphill rides.</p>
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Type:</span>
                            <span class="font-semibold">Automatic</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Price from:</span>
                            <span class="font-bold text-yellow-500">IDR 100,000/12 hours</span>
                        </div>
                    </div>
                    <a href="{{ route('motor.list', ['kategori' => 'Mid Matic 125-155cc']) }}"
                       class="block w-full bg-yellow-500 hover:bg-yellow-600 text-white text-center font-semibold py-3 px-4 rounded-lg transition duration-300">
                        View Options
                    </a>
                </div>
            </div>

            <!-- Sport Manual 150-250cc -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover border border-gray-100 relative">
                <div class="relative">
                    <img src="{{ asset('img/motor.png') }}" alt="Sport Manual" class="w-full h-50 object-cover">
                    <div class="absolute top-3 right-3 bg-yellow-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                        150-250cc
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Sport <span class="text-yellow-500">Manual</span></h3>
                    <p class="text-gray-600 mb-4 text-sm">For experienced riders who enjoy sporty riding sensations.</p>
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Type:</span>
                            <span class="font-semibold">Manual</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Price from:</span>
                            <span class="font-bold text-yellow-500">IDR 150,000/12 hours</span>
                        </div>
                    </div>
                    <a href="{{ route('motor.list', ['kategori' => 'Sport Manual 150-250cc']) }}"
                       class="block w-full bg-yellow-500 hover:bg-yellow-600 text-white text-center font-semibold py-3 px-4 rounded-lg transition duration-300">
                        View Options
                    </a>
                </div>
            </div>

            <!-- Big Scooter 250-350cc -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover border border-gray-100 relative">
                <div class="relative">
                    <img src="{{ asset('img/motor.png') }}" alt="Big Scooter" class="w-full h-50 object-cover">
                    <div class="absolute top-3 right-3 bg-yellow-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                        250-350cc
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Big <span class="text-yellow-500">Scooter</span></h3>
                    <p class="text-gray-600 mb-4 text-sm">Luxurious and comfortable for long-distance touring with complete features.</p>
                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Type:</span>
                            <span class="font-semibold">Automatic</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Price from:</span>
                            <span class="font-bold text-yellow-500">IDR 200,000/12 hours</span>
                        </div>
                    </div>
                    <a href="{{ route('motor.list', ['kategori' => 'Big Scooter 250-350cc']) }}"
                       class="block w-full bg-yellow-500 hover:bg-yellow-600 text-white text-center font-semibold py-3 px-4 rounded-lg transition duration-300">
                        View Options
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('motor.list',['kategori' => 'all']) }}"
               class="inline-block border-2 border-yellow-500 text-yellow-500 hover:bg-yellow-500 hover:text-white font-semibold py-3 px-8 rounded-lg transition duration-300">
                View All Motorcycles <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>
<!--END  Section 3: Motorcycle List -->

<!-- Section 4: Carpool Call to Action - BLUE THEME -->
<section class="py-20 bg-white" id="carpool">
    <div class="container mx-auto px-4">
        <!-- Header Section - Center -->
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900">
                Carpool - <span class="text-blue-500">Lombok & Surrounding Routes</span>
            </h2>
            <p class="text-gray-600 text-xl max-w-2xl mx-auto">
                Share rides, share experiences. Save costs by carpooling to popular destinations in Lombok.
            </p>
        </div>

        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <!-- Features List -->
                    <div class="space-y-6">
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center mr-6">
                                <i class="fas fa-check text-blue-500 text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-1">Save Travel Costs</h3>
                                <p class="text-gray-600">Save up to 70% on transportation costs by sharing vehicles</p>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center mr-6">
                                <i class="fas fa-check text-blue-500 text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-1">Meet New Travel Companions</h3>
                                <p class="text-gray-600">Find interesting travel companions from various regions</p>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-blue-100 rounded-2xl flex items-center justify-center mr-6">
                                <i class="fas fa-check text-blue-500 text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-1">Complete Routes</h3>
                                <p class="text-gray-600">Access to all popular destinations in Lombok with flexible schedules</p>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-6">
                        <a href="{{ route('carpool.list') }}"
                           class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-4 px-8 rounded-2xl text-center transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center">
                            <i class="fas fa-car-side mr-3 text-lg"></i>
                            View All Routes
                        </a>
                        <a href="https://wa.me/6281234567890"
                           class="border-2 border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white font-bold py-4 px-8 rounded-2xl text-center transition-all duration-300 transform hover:scale-105 flex items-center justify-center"
                           target="_blank">
                            <i class="fab fa-whatsapp mr-3 text-lg"></i>
                            Route Consultation
                        </a>
                    </div>
                </div>

                <!-- Right Column - Floating Animation -->
                <div class="relative">
                    <div class="relative z-10 animate-float">
                        <img src="{{ asset('img/carpol.png') }}"
                             alt="Happy travelers carpooling in Lombok"
                             class="w-full max-w-lg mx-auto rounded-3xl shadow-2xl">
                    </div>

                    <div class="absolute -top-4 -right-4 w-20 h-20 bg-blue-100 rounded-2xl flex items-center justify-center animate-float-delayed shadow-lg">
                        <i class="fas fa-map-marker-alt text-blue-500 text-xl"></i>
                    </div>

                    <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-yellow-100 rounded-2xl flex items-center justify-center animate-float-delayed-2 shadow-lg">
                        <i class="fas fa-users text-yellow-500 text-lg"></i>
                    </div>

                    <div class="absolute -z-10 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-72 h-72 bg-gradient-to-br from-blue-50 to-blue-50 rounded-full blur-3xl opacity-60"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section 5: Easy Rental Steps -->
<section id="steps" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Easy Rental <span class="text-primary">Steps</span></h2>
            <p class="text-gray-600 max-w-2xl mx-auto">In just 4 simple steps, your dream vehicle is ready to accompany your journey.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="text-center p-6">
                <div class="bg-primary text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">1</div>
                <h3 class="text-xl font-semibold mb-3">Select Vehicle</h3>
                <p class="text-gray-600">Choose a car or motorcycle that suits your travel needs from various trusted partners</p>
            </div>

            <div class="text-center p-6">
                <div class="bg-primary text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">2</div>
                <h3 class="text-xl font-semibold mb-3">Contact Partner</h3>
                <p class="text-gray-600">We connect you directly with vehicle providers to confirm availability</p>
            </div>

            <div class="text-center p-6">
                <div class="bg-primary text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">3</div>
                <h3 class="text-xl font-semibold mb-3">Rental Process</h3>
                <p class="text-gray-600">Complete payment and sign rental agreement with selected partner</p>
            </div>

            <div class="text-center p-6">
                <div class="bg-primary text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">4</div>
                <h3 class="text-xl font-semibold mb-3">Pick Up Vehicle</h3>
                <p class="text-gray-600">Pick up vehicle at partner location and enjoy your journey in Lombok</p>
            </div>
        </div>
    </div>
</section>

<!-- Section 6: Testimonials -->
<section id="testimonials" class="py-16 bg-gradient-to-r from-primary to-blue-600 text-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">What Our <span class="text-accent">Customers</span> Say</h2>
            <p class="max-w-2xl mx-auto opacity-90">Hear direct experiences from customers who have used our services.</p>
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
                <p class="opacity-90">"LombokRentHub really helped me find a trusted car rental. The process is easy and prices are transparent."</p>
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
                <p class="opacity-90">"With LombokRentHub, I don't need to search for motorcycle rentals. All recommended partners are trustworthy."</p>
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
                <p class="opacity-90">"Highly recommended! The process from booking to vehicle pickup went smoothly thanks to proper curation."</p>
            </div>
        </div>
    </div>
</section>

<!-- Section 7: Restaurant Vouchers -->
<section id="vouchers" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 max-w-2xl mx-auto leading-snug">
                <span class="text-yellow-500">Promotions</span> and <span class="text-yellow-500">Discounts</span><br>
                Shops, Salon/Spa and Restaurants
            </h2>
            <p class="text-gray-600 max-w-xl mx-auto">
                Enjoy special offers from the best shops and restaurants in Lombok.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
            @foreach ($vouchers as $voucher)
            <div class="bg-white rounded-2xl overflow-hidden shadow-lg card-hover border border-gray-100 relative">
                <div class="relative">
                    <img src="{{ asset('storage/' . $voucher->gambar) }}" alt="{{ $voucher->nama }}" class="w-full h-40 object-cover">

                    @if ($voucher->diskon)
                    <div class="absolute top-3 right-3 bg-yellow-500 text-white text-xs font-semibold px-2 py-1 rounded-full">
                        Discount {{ rtrim(rtrim(number_format($voucher->diskon, 2, ',', '.'), '0'), ',') }}%
                    </div>
                    @endif

                    <a href="#" class="eye-icon-container">
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
                                IDR {{ number_format($voucher->harga, 0, ',', '.') }}
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

        <div class="text-center mt-12">
            <a href="{{ route('voucher.list') }}"
               class="inline-block border-2 border-yellow-500 text-yellow-500 hover:bg-yellow-500 hover:text-white font-semibold py-3 px-8 rounded-lg transition duration-300">
                View All Vouchers <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Section 8: Virtual Assistance for Emergency -->
<section id="virtual-assistance" class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <!-- Header Section -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full mb-6 shadow-2xl relative transition-transform duration-300 hover:-translate-y-2">
                <i class="fas fa-headset text-white text-3xl"></i>
                <div class="absolute -top-2 -right-2 bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg animate-pulse">
                    <i class="fas fa-bolt mr-1"></i>24/7
                </div>
            </div>
            <h2 class="text-4xl md:text-5xl font-bold mb-4 text-gray-900">
               <span class="text-blue-500">Virtual</span> Emergency Assistant
            </h2>
            <p class="text-gray-600 text-xl max-w-2xl mx-auto leading-relaxed">
                24/7 emergency travel companion in Lombok. Instant assistance when you need it most.
            </p>
        </div>

        <div class="max-w-7xl mx-auto">
            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 gap-8 items-start">
                <div class="space-y-8">
                    <!-- Main Box -->
                    <div class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100 transition-transform duration-300 hover:-translate-y-2">
                        <!-- Service Description -->
                        <div class="flex items-start mb-8">
                            <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mr-5 flex-shrink-0">
                                <i class="fas fa-shield-alt text-blue-600 text-2xl"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">24/7 Emergency Protection</h3>
                                <p class="text-gray-600 leading-relaxed text-lg">
                                    Comprehensive emergency coverage for all travel situations. From vehicle breakdowns to medical emergencies, our dedicated team is always ready to assist you.
                                </p>
                            </div>
                        </div>

                        <!-- Service Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                            <!-- Vehicle Breakdown -->
                            <div class="group bg-white rounded-2xl p-6 shadow-lg border border-gray-100 transition-transform duration-300 hover:-translate-y-2 h-full flex flex-col">
                                <div class="flex items-start mb-4">
                                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mr-4 flex-shrink-0">
                                        <i class="fas fa-car-battery text-blue-600 text-xl"></i>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-900 text-xl mb-3">Vehicle Breakdown</h4>
                                    <p class="text-gray-600 text-base leading-relaxed">Emergency technical assistance & road service with our trusted mechanic network.</p>
                                </div>
                            </div>

                            <!-- Medical Emergency -->
                            <div class="group bg-white rounded-2xl p-6 shadow-lg border border-gray-100 transition-transform duration-300 hover:-translate-y-2 h-full flex flex-col">
                                <div class="flex items-start mb-4">
                                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mr-4 flex-shrink-0">
                                        <i class="fas fa-ambulance text-blue-600 text-xl"></i>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-900 text-xl mb-3">Medical Emergency</h4>
                                    <p class="text-gray-600 text-base leading-relaxed">Ambulance dispatch, hospital coordination, and medical translation services.</p>
                                </div>
                            </div>

                            <!-- Emergency Transportation -->
                            <div class="group bg-white rounded-2xl p-6 shadow-lg border border-gray-100 transition-transform duration-300 hover:-translate-y-2 h-full flex flex-col">
                                <div class="flex items-start mb-4">
                                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mr-4 flex-shrink-0">
                                        <i class="fas fa-taxi text-blue-600 text-xl"></i>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-900 text-xl mb-3">Emergency Transportation</h4>
                                    <p class="text-gray-600 text-base leading-relaxed">Quick pickup & arrangement of alternative transportation when you're stranded.</p>
                                </div>
                            </div>

                            <!-- Urgent Bookings -->
                            <div class="group bg-white rounded-2xl p-6 shadow-lg border border-gray-100 transition-transform duration-300 hover:-translate-y-2 h-full flex flex-col">
                                <div class="flex items-start mb-4">
                                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mr-4 flex-shrink-0">
                                        <i class="fas fa-ticket-alt text-blue-600 text-xl"></i>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-900 text-xl mb-3">Urgent Bookings</h4>
                                    <p class="text-gray-600 text-base leading-relaxed">Emergency ticket booking, hotel reservations, and itinerary changes.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Hotline Section - Bottom -->
                        <div class="bg-white rounded-2xl p-6 border border-blue-200 shadow-lg transition-transform duration-300 hover:-translate-y-2">
                            <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
                                <div class="text-center lg:text-left flex-1">
                                    <p class="text-gray-600 text-sm mb-2 font-semibold uppercase tracking-wide">24/7 Emergency Hotline</p>
                                    <div class="text-2xl lg:text-3xl font-bold text-gray-900 tracking-tight mb-2">+62 812-3456-7890</div>
                                    <p class="text-gray-500 text-sm lg:text-base">Multi-language support available • Call anytime</p>
                                </div>
                                <div class="flex space-x-4">
                                    <a href="tel:+6281234567890"
                                       class="w-14 h-14 bg-blue-600 hover:bg-blue-700 rounded-xl flex items-center justify-center shadow-lg transition-transform duration-300 hover:-translate-y-1">
                                        <i class="fas fa-phone text-white text-lg"></i>
                                    </a>
                                    <a href="https://wa.me/6281234567890"
                                       class="w-14 h-14 bg-green-500 hover:bg-green-600 rounded-xl flex items-center justify-center shadow-lg transition-transform duration-300 hover:-translate-y-1"
                                       target="_blank">
                                        <i class="fab fa-whatsapp text-white text-lg"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                   <!-- TOMBOL PESAN SEKARANG -->
<div class="mt-12 pt-8 border-t border-gray-100">
    <div class="text-center">

        <a href="{{ route('emergency.step1') }}" class="w-full max-w-3xl mx-auto block">
            <button class="w-full bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-6 px-12 rounded-2xl shadow-2xl transition-all duration-300 transform hover:-translate-y-2 hover:shadow-3xl flex items-center justify-center gap-4 text-2xl">
                <i class="fas fa-shopping-cart text-2xl"></i>
                <span class="text-2xl">Pesan Sekarang</span>
            </button>
        </a>

        <p class="text-gray-600 text-lg mt-6 max-w-2xl mx-auto leading-relaxed">
            <i class="fas fa-shield-alt text-blue-500 mr-2"></i>
            Dapatkan perlindungan 24/7 selama trip Anda di Lombok. Cukup satu kali pembayaran untuk ketenangan pikiran selama berlibur.
        </p>

    </div>
</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Section 9: Simple Modern FAQ -->
<section id="faq" class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-gray-900">
                Frequently
                <span class="text-blue-500">Asked Questions</span>
            </h2>
            <div class="w-24 h-1 bg-blue-500 mx-auto mb-6 rounded-full"></div>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                Find quick answers to commonly asked questions.
            </p>
        </div>

        <div class="max-w-6xl mx-auto">
            <!-- Grid Layout 3x3 -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- FAQ Item 1 -->
                <div class="faq-item bg-white rounded-xl border border-gray-200 hover:border-blue-300 hover:shadow-lg transition-all duration-300 overflow-hidden">
                    <button class="faq-question w-full text-left p-6 flex justify-between items-center group">
                        <span class="text-lg font-semibold text-gray-900 group-hover:text-blue-500 transition-colors duration-300">
                            <i class="fas fa-car text-blue-500 mr-3"></i>
                            How to rent a vehicle?
                        </span>
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center transition-transform duration-500 group-hover:bg-blue-600">
                            <i class="fas fa-plus text-white text-sm faq-icon"></i>
                        </div>
                    </button>
                    <div class="faq-answer overflow-hidden transition-all duration-500 ease-in-out max-h-0">
                        <div class="px-6 pb-6 text-gray-600 leading-relaxed">
                            <p>Select vehicle, fill form, confirm availability, and complete payment.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="faq-item bg-white rounded-xl border border-gray-200 hover:border-blue-300 hover:shadow-lg transition-all duration-300 overflow-hidden">
                    <button class="faq-question w-full text-left p-6 flex justify-between items-center group">
                        <span class="text-lg font-semibold text-gray-900 group-hover:text-blue-500 transition-colors duration-300">
                            <i class="fas fa-file-alt text-blue-500 mr-3"></i>
                            Rental requirements?
                        </span>
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center transition-transform duration-500 group-hover:bg-blue-600">
                            <i class="fas fa-plus text-white text-sm faq-icon"></i>
                        </div>
                    </button>
                    <div class="faq-answer overflow-hidden transition-all duration-500 ease-in-out max-h-0">
                        <div class="px-6 pb-6 text-gray-600 leading-relaxed">
                            <p>ID card, valid driver's license, minimum age 21 years, and deposit if required.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="faq-item bg-white rounded-xl border border-gray-200 hover:border-blue-300 hover:shadow-lg transition-all duration-300 overflow-hidden">
                    <button class="faq-question w-full text-left p-6 flex justify-between items-center group">
                        <span class="text-lg font-semibold text-gray-900 group-hover:text-blue-500 transition-colors duration-300">
                            <i class="fas fa-money-bill-wave text-blue-500 mr-3"></i>
                            Additional fees?
                        </span>
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center transition-transform duration-500 group-hover:bg-blue-600">
                            <i class="fas fa-plus text-white text-sm faq-icon"></i>
                        </div>
                    </button>
                    <div class="faq-answer overflow-hidden transition-all duration-500 ease-in-out max-h-0">
                        <div class="px-6 pb-6 text-gray-600 leading-relaxed">
                            <p>Delivery, driver, late return, and fuel costs.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="faq-item bg-white rounded-xl border border-gray-200 hover:border-blue-300 hover:shadow-lg transition-all duration-300 overflow-hidden">
                    <button class="faq-question w-full text-left p-6 flex justify-between items-center group">
                        <span class="text-lg font-semibold text-gray-900 group-hover:text-blue-500 transition-colors duration-300">
                            <i class="fas fa-tools text-blue-500 mr-3"></i>
                            Vehicle damage?
                        </span>
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center transition-transform duration-500 group-hover:bg-blue-600">
                            <i class="fas fa-plus text-white text-sm faq-icon"></i>
                        </div>
                    </button>
                    <div class="faq-answer overflow-hidden transition-all duration-500 ease-in-out max-h-0">
                        <div class="px-6 pb-6 text-gray-600 leading-relaxed">
                            <p>Contact rental partner, include photo evidence, and our team will assist with claim process.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="faq-item bg-white rounded-xl border border-gray-200 hover:border-blue-300 hover:shadow-lg transition-all duration-300 overflow-hidden">
                    <button class="faq-question w-full text-left p-6 flex justify-between items-center group">
                        <span class="text-lg font-semibold text-gray-900 group-hover:text-blue-500 transition-colors duration-300">
                            <i class="fas fa-shield-alt text-blue-500 mr-3"></i>
                            Verified partners?
                        </span>
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center transition-transform duration-500 group-hover:bg-blue-600">
                            <i class="fas fa-plus text-white text-sm faq-icon"></i>
                        </div>
                    </button>
                    <div class="faq-answer overflow-hidden transition-all duration-500 ease-in-out max-h-0">
                        <div class="px-6 pb-6 text-gray-600 leading-relaxed">
                            <p>Yes, all partners undergo identity verification, vehicle checks, and service reputation assessment.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="faq-item bg-white rounded-xl border border-gray-200 hover:border-blue-300 hover:shadow-lg transition-all duration-300 overflow-hidden">
                    <button class="faq-question w-full text-left p-6 flex justify-between items-center group">
                        <span class="text-lg font-semibold text-gray-900 group-hover:text-blue-500 transition-colors duration-300">
                            <i class="fas fa-gas-pump text-blue-500 mr-3"></i>
                            Fuel policy?
                        </span>
                        <div class="flex-shrink-0 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center transition-transform duration-500 group-hover:bg-blue-600">
                            <i class="fas fa-plus text-white text-sm faq-icon"></i>
                        </div>
                    </button>
                    <div class="faq-answer overflow-hidden transition-all duration-500 ease-in-out max-h-0">
                        <div class="px-6 pb-6 text-gray-600 leading-relaxed">
                            <p>Rented and returned with full tank. Additional charges if not full.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
