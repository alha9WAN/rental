@extends('components.page')
@section('content')

<!-- NEWS ARTICLE SECTION -->
<section id="articles" class="py-16 bg-white px-6">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold text-gray-900 mb-4">Our <span class="text-blue-600">Blog</span></h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Tips, guides, and latest information about car rental and travel</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="articlesGrid">

            <!-- NEWS CARD 1 -->
            <div class="article-card bg-white rounded-2xl overflow-hidden shadow-lg card-hover border border-gray-100">
                <div class="relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1549399542-7e3f8b79c341?auto=format&fit=crop&w=600&q=80"
                         alt="Car Rental Tips"
                         class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
                    <div class="absolute top-4 left-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                        Tips
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center text-gray-500 text-sm mb-3">
                        <i class="far fa-calendar-alt mr-2"></i>
                        <span>March 15, 2023</span>
                        <span class="mx-2">•</span>
                        <i class="far fa-clock mr-1"></i>
                        <span>5 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">7 Tips for Choosing the Right Rental Car for Vacation</h3>
                    <p class="text-gray-600 mb-4">Complete guide to choosing a rental car that suits your travel needs...</p>
                    <a href="{{ route('blog1') }}" class="text-blue-600 font-semibold flex items-center hover:text-blue-800 transition-colors group">
                        Read More
                        <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>

            <!-- NEWS CARD 2 -->
            <div class="article-card bg-white rounded-2xl overflow-hidden shadow-lg card-hover border border-gray-100">
                <div class="relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?auto=format&fit=crop&w=600&q=80"
                         alt="Car Maintenance"
                         class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
                    <div class="absolute top-4 left-4 bg-green-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                        Maintenance
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center text-gray-500 text-sm mb-3">
                        <i class="far fa-calendar-alt mr-2"></i>
                        <span>March 10, 2023</span>
                        <span class="mx-2">•</span>
                        <i class="far fa-clock mr-1"></i>
                        <span>7 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">How to Maintain Rental Cars for Optimal Performance</h3>
                    <p class="text-gray-600 mb-4">Learn how to properly maintain rental cars to ensure performance and comfort during your journey...</p>
                    <a href="{{ route('blog2') }}" class="text-blue-600 font-semibold flex items-center hover:text-blue-800 transition-colors group">
                        Read More
                        <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>

            <!-- NEWS CARD 3 -->
            <div class="article-card bg-white rounded-2xl overflow-hidden shadow-lg card-hover border border-gray-100">
                <div class="relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1506197603052-3cc9c3a201bd?auto=format&fit=crop&w=600&q=80"
                         alt="Tourist Destinations"
                         class="w-full h-48 object-cover transition-transform duration-500 hover:scale-110">
                    <div class="absolute top-4 left-4 bg-purple-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                        Destinations
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center text-gray-500 text-sm mb-3">
                        <i class="far fa-calendar-alt mr-2"></i>
                        <span>March 5, 2023</span>
                        <span class="mx-2">•</span>
                        <i class="far fa-clock mr-1"></i>
                        <span>8 min read</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">5 Best Road Trip Destinations in Indonesia</h3>
                    <p class="text-gray-600 mb-4">Explore Indonesia's beauty with road trips using rental cars to these amazing destinations...</p>
                    <a href="{{ route('blog3') }}" class="text-blue-600 font-semibold flex items-center hover:text-blue-800 transition-colors group">
                        Read More
                        <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>


        </div>

        <!-- LOAD MORE BUTTON -->
        <div class="text-center mt-12">
            <button id="loadMoreBtn" class="bg-white text-blue-600 border border-blue-600 hover:bg-blue-50 px-8 py-3 rounded-full font-semibold transition-all duration-300 transform hover:-translate-y-1 hover:shadow-md">
                Load More Articles
            </button>
        </div>
    </div>
</section>

@endsection
