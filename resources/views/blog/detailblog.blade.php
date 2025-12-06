@extends('components.page')
@section('content')

<div class="container mx-auto px-4 py-6">
    <!-- Article Header -->
        <!-- Header lebih kecil dengan tema blue-500 -->
        <header class="relative bg-gradient-to-br from-blue-600 via-blue-500 to-blue-700 text-white rounded-xl lg:rounded-2xl overflow-hidden mb-6 shadow-lg">
            <div class="relative z-10 px-4 py-6 md:px-6 md:py-8 lg:px-8 lg:py-10">
                <div class="max-w-5xl mx-auto text-center">
                    <!-- Category Tag lebih kecil -->
                    <span class="inline-block glass-effect px-4 py-1.5 rounded-full text-xs font-semibold mb-4 tracking-wider uppercase">
                TRAVEL TIPS
                    </span>

                    <!-- Title lebih kecil -->
                    <h1 class="text-xl md:text-2xl lg:text-3xl font-bold mb-3 leading-tight px-2">
                7 Essential Tips for Choosing the Perfect Rental Car
                    </h1>

                    <!-- Subtitle lebih kecil -->
                    <p class="text-sm md:text-base text-blue-100 mb-6 max-w-3xl mx-auto leading-relaxed">
                Expert advice to select the ideal vehicle for your next adventure - comfort, economy, and confidence guaranteed
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


    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <!-- Main Content -->
        <main class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow duration-200">
            <!-- Hero Image -->
            <div class="w-full h-64 rounded-lg overflow-hidden mb-6 relative">
                <img
                    src="https://images.unsplash.com/photo-1549399542-7e3f8b79c341?auto=format&fit=crop&w=1200&q=80"
                    alt="Rental Car Selection"
                    class="w-full h-full object-cover transition-transform duration-500 hover:scale-105"
                >
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent text-white p-3 text-xs text-center">
                    Choose wisely - your rental car can make or break your travel experience
                </div>
            </div>

            <!-- Introduction -->
            <p class="text-gray-600 mb-6 p-4 bg-slate-50 rounded-lg border-l-4 border-blue-500">
                The right rental car transforms your journey from stressful to seamless. Master these 7 tips for a perfect ride.
            </p>

            <!-- Tips Container -->
            <div class="space-y-4 mb-6">
                <!-- Tip 1 -->
                <div class="bg-white rounded-lg p-4 border border-slate-200 hover:border-blue-500 hover:-translate-y-1 hover:shadow-lg transition-all duration-200 flex items-start gap-4">
                    <div class="w-8 h-8 bg-blue-500 text-white rounded-md flex items-center justify-center font-semibold text-sm flex-shrink-0">
                        1
                    </div>
                    <div class="flex-1">
                        <h3 class="font-poppins font-semibold text-lg text-slate-800 mb-1">
                            Assess Space & Passenger Needs
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            Consider passengers, luggage, and special equipment. Compact for solo travel, SUV for families, premium for comfort seekers.
                        </p>
                    </div>
                </div>

                <!-- Tip 2 -->
                <div class="bg-white rounded-lg p-4 border border-slate-200 hover:border-blue-500 hover:-translate-y-1 hover:shadow-lg transition-all duration-200 flex items-start gap-4">
                    <div class="w-8 h-8 bg-blue-500 text-white rounded-md flex items-center justify-center font-semibold text-sm flex-shrink-0">
                        2
                    </div>
                    <div class="flex-1">
                        <h3 class="font-poppins font-semibold text-lg text-slate-800 mb-1">
                            Match Vehicle to Destination
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            City driving? Choose compact. Mountains? Opt for 4WD. Beach trips? Consider ground clearance. Always check road conditions.
                        </p>
                    </div>
                </div>

                <!-- Tip 3 -->
                <div class="bg-white rounded-lg p-4 border border-slate-200 hover:border-blue-500 hover:-translate-y-1 hover:shadow-lg transition-all duration-200 flex items-start gap-4">
                    <div class="w-8 h-8 bg-blue-500 text-white rounded-md flex items-center justify-center font-semibold text-sm flex-shrink-0">
                        3
                    </div>
                    <div class="flex-1">
                        <h3 class="font-poppins font-semibold text-lg text-slate-800 mb-1">
                            Calculate Fuel Efficiency
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            Hybrid for urban, diesel for highways, electric for eco-conscious travel. Fuel costs impact your total budget significantly.
                        </p>
                    </div>
                </div>

                <!-- Tip 4 -->
                <div class="bg-white rounded-lg p-4 border border-slate-200 hover:border-blue-500 hover:-translate-y-1 hover:shadow-lg transition-all duration-200 flex items-start gap-4">
                    <div class="w-8 h-8 bg-blue-500 text-white rounded-md flex items-center justify-center font-semibold text-sm flex-shrink-0">
                        4
                    </div>
                    <div class="flex-1">
                        <h3 class="font-poppins font-semibold text-lg text-slate-800 mb-1">
                            Understand Total Costs
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            Look beyond daily rates. Include insurance, fees, deposits, and mileage limits. Always request all-inclusive pricing upfront.
                        </p>
                    </div>
                </div>

                <!-- Tip 5 -->
                <div class="bg-white rounded-lg p-4 border border-slate-200 hover:border-blue-500 hover:-translate-y-1 hover:shadow-lg transition-all duration-200 flex items-start gap-4">
                    <div class="w-8 h-8 bg-blue-500 text-white rounded-md flex items-center justify-center font-semibold text-sm flex-shrink-0">
                        5
                    </div>
                    <div class="flex-1">
                        <h3 class="font-poppins font-semibold text-lg text-slate-800 mb-1">
                            Book Smart & Early
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            Reserve 2-4 weeks in advance. Peak seasons need earlier booking. Monitor prices - some allow free cancellation if rates drop.
                        </p>
                    </div>
                </div>

                <!-- Tip 6 -->
                <div class="bg-white rounded-lg p-4 border border-slate-200 hover:border-blue-500 hover:-translate-y-1 hover:shadow-lg transition-all duration-200 flex items-start gap-4">
                    <div class="w-8 h-8 bg-blue-500 text-white rounded-md flex items-center justify-center font-semibold text-sm flex-shrink-0">
                        6
                    </div>
                    <div class="flex-1">
                        <h3 class="font-poppins font-semibold text-lg text-slate-800 mb-1">
                            Conduct Pre-Rental Inspection
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            Photograph existing damage. Test lights, wipers, AC. Check fuel level and spare tire. Ensure everything is documented.
                        </p>
                    </div>
                </div>

                <!-- Tip 7 -->
                <div class="bg-white rounded-lg p-4 border border-slate-200 hover:border-blue-500 hover:-translate-y-1 hover:shadow-lg transition-all duration-200 flex items-start gap-4">
                    <div class="w-8 h-8 bg-blue-500 text-white rounded-md flex items-center justify-center font-semibold text-sm flex-shrink-0">
                        7
                    </div>
                    <div class="flex-1">
                        <h3 class="font-poppins font-semibold text-lg text-slate-800 mb-1">
                            Compare Rental Providers
                        </h3>
                        <p class="text-slate-600 text-sm leading-relaxed">
                            International chains offer reliability; local companies provide value. Read recent reviews and check hidden policies.
                        </p>
                    </div>
                </div>
            </div>
        </main>

        <!-- Sidebar -->
        <aside class="space-y-5">
            <!-- Related Articles -->
            <div class="bg-white rounded-lg shadow-lg p-5 border-t-4 border-blue-500">
                <h3 class="font-poppins font-semibold text-lg text-slate-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-newspaper text-blue-500"></i>
                    Related Articles
                </h3>
                <div class="space-y-3">
                    <a href="#" class="flex items-center gap-3 p-3 rounded-md bg-slate-50 hover:bg-blue-50 hover:translate-x-1 transition-all duration-200 no-underline">
                        <img
                            src="https://images.unsplash.com/photo-1580273916550-e323be2ae537?auto=format&fit=crop&w=200&q=80"
                            alt="Budget Travel"
                            class="w-16 h-12 rounded-md object-cover flex-shrink-0"
                        >
                        <h4 class="text-sm font-medium text-slate-800 flex-1">
                            Smart Budgeting for Your Next Vacation
                        </h4>
                    </a>
                    <a href="#" class="flex items-center gap-3 p-3 rounded-md bg-slate-50 hover:bg-blue-50 hover:translate-x-1 transition-all duration-200 no-underline">
                        <img
                            src="https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?auto=format&fit=crop&w=200&q=80"
                            alt="Packing"
                            class="w-16 h-12 rounded-md object-cover flex-shrink-0"
                        >
                        <h4 class="text-sm font-medium text-slate-800 flex-1">
                            Essential Packing Guide for Every Climate
                        </h4>
                    </a>
                    <a href="#" class="flex items-center gap-3 p-3 rounded-md bg-slate-50 hover:bg-blue-50 hover:translate-x-1 transition-all duration-200 no-underline">
                        <img
                            src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?auto=format&fit=crop&w=200&q=80"
                            alt="Insurance"
                            class="w-16 h-12 rounded-md object-cover flex-shrink-0"
                        >
                        <h4 class="text-sm font-medium text-slate-800 flex-1">
                            Travel Insurance: What You Really Need
                        </h4>
                    </a>
                </div>
            </div>

            <!-- Travel Checklist -->
            <div class="bg-white rounded-lg shadow-lg p-5 border-t-4 border-blue-500">
                <h3 class="font-poppins font-semibold text-lg text-slate-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-clipboard-check text-blue-500"></i>
                    Travel Checklist
                </h3>
                <ul class="space-y-2">
                    <li class="flex items-center gap-3 p-2 rounded-md bg-slate-50 hover:bg-blue-50 transition-colors duration-200">
                        <i class="fas fa-check text-emerald-500 text-sm"></i>
                        <span class="text-sm text-slate-800">Valid driver's license & IDP</span>
                    </li>
                    <li class="flex items-center gap-3 p-2 rounded-md bg-slate-50 hover:bg-blue-50 transition-colors duration-200">
                        <i class="fas fa-check text-emerald-500 text-sm"></i>
                        <span class="text-sm text-slate-800">Credit card in driver's name</span>
                    </li>
                    <li class="flex items-center gap-3 p-2 rounded-md bg-slate-50 hover:bg-blue-50 transition-colors duration-200">
                        <i class="fas fa-check text-emerald-500 text-sm"></i>
                        <span class="text-sm text-slate-800">Booking confirmation</span>
                    </li>
                    <li class="flex items-center gap-3 p-2 rounded-md bg-slate-50 hover:bg-blue-50 transition-colors duration-200">
                        <i class="fas fa-check text-emerald-500 text-sm"></i>
                        <span class="text-sm text-slate-800">Insurance documents</span>
                    </li>
                    <li class="flex items-center gap-3 p-2 rounded-md bg-slate-50 hover:bg-blue-50 transition-colors duration-200">
                        <i class="fas fa-check text-emerald-500 text-sm"></i>
                        <span class="text-sm text-slate-800">Offline maps/GPS</span>
                    </li>
                    <li class="flex items-center gap-3 p-2 rounded-md bg-slate-50 hover:bg-blue-50 transition-colors duration-200">
                        <i class="fas fa-check text-emerald-500 text-sm"></i>
                        <span class="text-sm text-slate-800">Emergency contacts</span>
                    </li>
                </ul>
            </div>

        </aside>
    </div>


</div>

@endsection
