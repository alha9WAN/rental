@extends('components.page')
@section('content')
 

    <!-- Container dengan padding lebar -->
    <div class="container mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 2xl:px-32 py-6">
        <!-- Header lebih kecil dengan tema blue-500 -->
        <header class="relative bg-gradient-to-br from-blue-600 via-blue-500 to-blue-700 text-white rounded-xl lg:rounded-2xl overflow-hidden mb-6 shadow-lg">
            <div class="relative z-10 px-4 py-6 md:px-6 md:py-8 lg:px-8 lg:py-10">
                <div class="max-w-5xl mx-auto text-center">
                    <!-- Category Tag lebih kecil -->
                    <span class="inline-block glass-effect px-4 py-1.5 rounded-full text-xs font-semibold mb-4 tracking-wider uppercase">
                        CAR MAINTENANCE
                    </span>

                    <!-- Title lebih kecil -->
                    <h1 class="text-xl md:text-2xl lg:text-3xl font-bold mb-3 leading-tight px-2">
                        How to Maintain Rental Cars for Optimal Performance
                    </h1>

                    <!-- Subtitle lebih kecil -->
                    <p class="text-sm md:text-base text-blue-100 mb-6 max-w-3xl mx-auto leading-relaxed">
                        Essential maintenance tips to ensure your rental car performs reliably throughout your journey
                    </p>

                    <!-- Meta Info lebih compact -->
                    <div class="flex flex-wrap justify-center items-center gap-3 md:gap-4 pt-4 border-t border-blue-400/20">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center">
                                <i class="far fa-calendar-alt text-blue-200 text-xs"></i>
                            </div>
                            <div class="text-left">
                                <div class="text-[10px] text-blue-300">Published</div>
                                <div class="text-xs font-semibold">Mar 10, 2023</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center">
                                <i class="far fa-clock text-blue-200 text-xs"></i>
                            </div>
                            <div class="text-left">
                                <div class="text-[10px] text-blue-300">Read Time</div>
                                <div class="text-xs font-semibold">7 min read</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center">
                                <i class="far fa-user text-blue-200 text-xs"></i>
                            </div>
                            <div class="text-left">
                                <div class="text-[10px] text-blue-300">Author</div>
                                <div class="text-xs font-semibold">Sarah Johnson</div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center">
                                <i class="far fa-eye text-blue-200 text-xs"></i>
                            </div>
                            <div class="text-left">
                                <div class="text-[10px] text-blue-300">Views</div>
                                <div class="text-xs font-semibold">3.1k</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
            <!-- Main Content Column -->
            <main class="lg:col-span-2">
                <!-- Hero Image -->
                <div class="rounded-xl overflow-hidden mb-6 hover-lift">
                    <div class="relative h-48 md:h-64 lg:h-72 overflow-hidden">
                        <img
                            src="https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?auto=format&fit=crop&w=1200&q=80"
                            alt="Car Maintenance"
                            class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-700"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                            <p class="text-xs md:text-sm opacity-90 italic">Proper maintenance ensures your rental car performs optimally throughout your trip</p>
                        </div>
                    </div>
                </div>

                <!-- Introduction Card -->
                <div class="bg-gradient-to-r from-blue-50 to-white rounded-xl p-4 md:p-6 mb-6 border border-blue-100 shadow-sm">
                    <div class="flex items-start space-x-3 md:space-x-4">
                        <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-tools text-blue-600 text-base md:text-lg"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-gray-700 leading-relaxed text-base">
                                <span class="font-semibold text-blue-600">Proper maintenance is crucial for ensuring your rental car performs reliably.</span>
                                These essential tips will help you keep your vehicle in optimal condition throughout your journey.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Tips Container -->
                <div class="space-y-4 md:space-y-6 mb-8">
                    <!-- Tip 1 -->
                    <div class="bg-white rounded-xl p-4 md:p-6 shadow-sm border border-gray-100 hover-lift animate-fade-in-up" style="animation-delay: 0.1s;">
                        <div class="flex items-start space-x-4 md:space-x-5">
                            <div class="tip-number-gradient w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-white font-bold text-base md:text-lg">1</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-2">
                                    Daily Visual Inspection
                                </h3>
                                <div class="pl-0 md:pl-2">
                                    <p class="text-gray-600 leading-relaxed mb-3">
                                        Before starting your journey, check tire pressure, fluid levels, and lights. Look for any visible damage or leaks that need attention.
                                    </p>
                                    <div class="bg-blue-50 rounded-lg p-3 border border-blue-100">
                                        <div class="flex items-center space-x-2 text-blue-700">
                                            <i class="fas fa-check-circle text-sm"></i>
                                            <span class="font-semibold text-sm">Check Daily:</span>
                                            <span class="text-xs md:text-sm">Tires, fluids, lights, wipers</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tip 2 -->
                    <div class="bg-white rounded-xl p-4 md:p-6 shadow-sm border border-gray-100 hover-lift animate-fade-in-up" style="animation-delay: 0.2s;">
                        <div class="flex items-start space-x-4 md:space-x-5">
                            <div class="tip-number-gradient w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-white font-bold text-base md:text-lg">2</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-2">
                                    Monitor Fluid Levels
                                </h3>
                                <div class="pl-0 md:pl-2">
                                    <p class="text-gray-600 leading-relaxed mb-3">
                                        Regularly check engine oil, coolant, brake fluid, and windshield washer fluid. Low levels can cause serious damage to the vehicle.
                                    </p>
                                    <div class="grid grid-cols-2 gap-2 md:gap-3">
                                        <div class="bg-blue-50 rounded-lg p-2 text-center hover:bg-blue-100 transition-colors">
                                            <div class="text-blue-600 font-semibold text-xs md:text-sm">Engine Oil</div>
                                            <div class="text-xs text-gray-600 mt-1">Check weekly</div>
                                        </div>
                                        <div class="bg-blue-50 rounded-lg p-2 text-center hover:bg-blue-100 transition-colors">
                                            <div class="text-blue-600 font-semibold text-xs md:text-sm">Coolant</div>
                                            <div class="text-xs text-gray-600 mt-1">Monthly check</div>
                                        </div>
                                        <div class="bg-blue-50 rounded-lg p-2 text-center hover:bg-blue-100 transition-colors">
                                            <div class="text-blue-600 font-semibold text-xs md:text-sm">Brake Fluid</div>
                                            <div class="text-xs text-gray-600 mt-1">Visual inspect</div>
                                        </div>
                                        <div class="bg-blue-50 rounded-lg p-2 text-center hover:bg-blue-100 transition-colors">
                                            <div class="text-blue-600 font-semibold text-xs md:text-sm">Washer Fluid</div>
                                            <div class="text-xs text-gray-600 mt-1">Refill as needed</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tip 3 -->
                    <div class="bg-white rounded-xl p-4 md:p-6 shadow-sm border border-gray-100 hover-lift animate-fade-in-up" style="animation-delay: 0.3s;">
                        <div class="flex items-start space-x-4 md:space-x-5">
                            <div class="tip-number-gradient w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-white font-bold text-base md:text-lg">3</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-2">
                                    Tire Maintenance
                                </h3>
                                <div class="pl-0 md:pl-2">
                                    <p class="text-gray-600 leading-relaxed mb-3">
                                        Maintain proper tire pressure and check tread depth regularly. Rotate tires as recommended and inspect for damage.
                                    </p>
                                    <div class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg p-3 md:p-4">
                                        <div class="flex justify-between text-center">
                                            <div>
                                                <div class="text-base md:text-lg font-bold text-blue-700">32-35</div>
                                                <div class="text-xs text-gray-600 mt-1">PSI (Standard)</div>
                                            </div>
                                            <div>
                                                <div class="text-base md:text-lg font-bold text-blue-700">4/32"</div>
                                                <div class="text-xs text-gray-600 mt-1">Min Tread Depth</div>
                                            </div>
                                            <div>
                                                <div class="text-base md:text-lg font-bold text-blue-700">5-7k</div>
                                                <div class="text-xs text-gray-600 mt-1">Miles/Rotation</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tip 4 -->
                    <div class="bg-white rounded-xl p-4 md:p-6 shadow-sm border border-gray-100 hover-lift animate-fade-in-up" style="animation-delay: 0.4s;">
                        <div class="flex items-start space-x-4 md:space-x-5">
                            <div class="tip-number-gradient w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-white font-bold text-base md:text-lg">4</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-2">
                                    Brake System Check
                                </h3>
                                <div class="pl-0 md:pl-2">
                                    <p class="text-gray-600 leading-relaxed mb-3">
                                        Listen for unusual noises when braking. Check brake pads and fluid levels regularly to ensure safety on the road.
                                    </p>
                                    <div class="bg-red-50 rounded-lg p-3 border border-red-100">
                                        <div class="flex items-center space-x-2 text-red-700">
                                            <i class="fas fa-exclamation-triangle text-sm"></i>
                                            <span class="font-semibold text-sm">Warning Signs:</span>
                                            <span class="text-xs md:text-sm">Squeaking, grinding, vibration</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tip 5 -->
                    <div class="bg-white rounded-xl p-4 md:p-6 shadow-sm border border-gray-100 hover-lift animate-fade-in-up" style="animation-delay: 0.5s;">
                        <div class="flex items-start space-x-4 md:space-x-5">
                            <div class="tip-number-gradient w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-white font-bold text-base md:text-lg">5</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-2">
                                    Electrical System Care
                                </h3>
                                <div class="pl-0 md:pl-2">
                                    <p class="text-gray-600 leading-relaxed mb-3">
                                        Test all lights, signals, and electronics regularly. Keep the battery terminals clean and check connections.
                                    </p>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                        <div class="bg-yellow-50 rounded-lg p-3 text-center">
                                            <div class="text-yellow-600 font-semibold">Essential Checks</div>
                                            <div class="text-xs text-gray-600 mt-1">Lights, signals, battery</div>
                                        </div>
                                        <div class="bg-blue-50 rounded-lg p-3 text-center">
                                            <div class="text-blue-600 font-semibold">Electronics</div>
                                            <div class="text-xs text-gray-600 mt-1">AC, radio, charging ports</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tip 6 -->
                    <div class="bg-white rounded-xl p-4 md:p-6 shadow-sm border border-gray-100 hover-lift animate-fade-in-up" style="animation-delay: 0.6s;">
                        <div class="flex items-start space-x-4 md:space-x-5">
                            <div class="tip-number-gradient w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-white font-bold text-base md:text-lg">6</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-2">
                                    Interior Maintenance
                                </h3>
                                <div class="pl-0 md:pl-2">
                                    <p class="text-gray-600 leading-relaxed mb-3">
                                        Keep the interior clean and organized. Regularly clean air filters and check seatbelts for proper function.
                                    </p>
                                    <div class="bg-blue-50 rounded-lg p-3 border border-blue-100">
                                        <div class="flex items-center space-x-2 text-blue-700">
                                            <i class="fas fa-broom text-sm"></i>
                                            <span class="font-semibold text-sm">Regular Tasks:</span>
                                            <span class="text-xs md:text-sm">Clean interior, check air filters</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </main>

            <!-- Sidebar Column -->
            <aside class="lg:col-span-1">
                <!-- Related Articles -->
                <div class="bg-white rounded-xl p-4 md:p-6 shadow-sm mb-6 border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 pb-2 border-b border-gray-200 flex items-center">
                        <i class="fas fa-newspaper text-blue-500 mr-2 text-sm"></i>
                        Related Articles
                    </h3>
                    <div class="space-y-4">
                        <a href="#" class="group flex items-start space-x-3 p-2 rounded-lg hover:bg-blue-50 transition-colors duration-300">
                            <div class="w-16 h-12 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1549399542-7e3f8b79c341?auto=format&fit=crop&w=200&q=80"
                                     alt="Car Selection"
                                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors text-sm">Choosing the Perfect Rental Car</h4>
                                <p class="text-xs text-gray-500 mt-1">5 min read</p>
                            </div>
                        </a>
                        <a href="#" class="group flex items-start space-x-3 p-2 rounded-lg hover:bg-blue-50 transition-colors duration-300">
                            <div class="w-16 h-12 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1533473359331-0135ef1b58bf?auto=format&fit=crop&w=200&q=80"
                                     alt="Fuel Efficiency"
                                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors text-sm">Maximizing Fuel Efficiency</h4>
                                <p class="text-xs text-gray-500 mt-1">6 min read</p>
                            </div>
                        </a>
                        <a href="#" class="group flex items-start space-x-3 p-2 rounded-lg hover:bg-blue-50 transition-colors duration-300">
                            <div class="w-16 h-12 rounded-lg overflow-hidden flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1593941707882-a5bba5338fe2?auto=format&fit=crop&w=200&q=80"
                                     alt="Winter Driving"
                                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors text-sm">Winter Driving Safety Tips</h4>
                                <p class="text-xs text-gray-500 mt-1">8 min read</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Maintenance Checklist -->
                <div class="bg-white rounded-xl p-4 md:p-6 shadow-sm mb-6 border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 pb-2 border-b border-gray-200 flex items-center">
                        <i class="fas fa-clipboard-check text-blue-500 mr-2 text-sm"></i>
                        Maintenance Checklist
                    </h3>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-blue-50 transition-colors group">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center group-hover:bg-blue-200">
                                <i class="fas fa-tire text-blue-600 text-xs"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-800">Tire pressure & condition</span>
                        </div>
                        <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-blue-50 transition-colors group">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center group-hover:bg-blue-200">
                                <i class="fas fa-oil-can text-blue-600 text-xs"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-800">Engine oil level</span>
                        </div>
                        <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-blue-50 transition-colors group">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center group-hover:bg-blue-200">
                                <i class="fas fa-tint text-blue-600 text-xs"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-800">Coolant & brake fluid</span>
                        </div>
                        <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-blue-50 transition-colors group">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center group-hover:bg-blue-200">
                                <i class="fas fa-lightbulb text-blue-600 text-xs"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-800">All lights & signals</span>
                        </div>
                        <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-blue-50 transition-colors group">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center group-hover:bg-blue-200">
                                <i class="fas fa-wind text-blue-600 text-xs"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-800">Air filter condition</span>
                        </div>
                        <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-blue-50 transition-colors group">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center group-hover:bg-blue-200">
                                <i class="fas fa-battery-full text-blue-600 text-xs"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-800">Battery connections</span>
                        </div>
                    </div>
                </div>

                <!-- Share Widget -->
                <div class="bg-white rounded-xl p-4 md:p-6 shadow-sm border border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 pb-2 border-b border-gray-200 flex items-center">
                        <i class="fas fa-share-alt text-blue-500 mr-2 text-sm"></i>
                        Share This Guide
                    </h3>
                    <p class="text-sm text-gray-600 mb-4 text-center">Found these maintenance tips helpful? Share with fellow travelers!</p>
                    <div class="flex justify-center space-x-3">
                        <a href="#" class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white hover:bg-blue-600 hover:scale-110 transition-all shadow">
                            <i class="fab fa-facebook-f text-xs"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-blue-400 flex items-center justify-center text-white hover:bg-blue-500 hover:scale-110 transition-all shadow">
                            <i class="fab fa-twitter text-xs"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white hover:bg-blue-600 hover:scale-110 transition-all shadow">
                            <i class="fab fa-whatsapp text-xs"></i>
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </div>


@endsection
