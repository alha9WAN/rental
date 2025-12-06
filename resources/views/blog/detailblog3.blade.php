@extends('components.page')
@section('content')
   <style>
       @keyframes fadeInUp {
           from {
               opacity: 0;
               transform: translateY(20px);
           }
           to {
               opacity: 1;
               transform: translateY(0);
           }
       }
       .animate-fade-in-up {
           animation: fadeInUp 0.6s ease-out forwards;
       }
       .hover-lift {
           transition: transform 0.3s ease, box-shadow 0.3s ease;
       }
       .hover-lift:hover {
           transform: translateY(-4px);
           box-shadow: 0 20px 40px rgba(59, 130, 246, 0.15);
       }
       .gradient-text {
           background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
           -webkit-background-clip: text;
           -webkit-text-fill-color: transparent;
           background-clip: text;
       }
       .glass-effect {
           background: rgba(255, 255, 255, 0.1);
           backdrop-filter: blur(10px);
           border: 1px solid rgba(255, 255, 255, 0.2);
       }
       .tip-number-gradient {
           background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
           box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
       }
   </style>
</head>
<body class="bg-white to-white min-h-screen font-sans">
   <!-- Container dengan padding lebar -->
   <div class="container mx-auto px-4 sm:px-8 lg:px-16 xl:px-24 2xl:px-32 py-6">
       <!-- Header lebih kecil dengan tema blue-500 -->
       <header class="relative bg-gradient-to-br from-blue-600 via-blue-500 to-blue-700 text-white rounded-xl lg:rounded-2xl overflow-hidden mb-6 shadow-lg">
           <div class="relative z-10 px-4 py-6 md:px-6 md:py-8 lg:px-8 lg:py-10">
               <div class="max-w-5xl mx-auto text-center">
                   <!-- Category Tag lebih kecil -->
                   <span class="inline-block glass-effect px-4 py-1.5 rounded-full text-xs font-semibold mb-4 tracking-wider uppercase">
                       DESTINATIONS
                   </span>


                   <!-- Title lebih kecil -->
                   <h1 class="text-xl md:text-2xl lg:text-3xl font-bold mb-3 leading-tight px-2">
                       5 Best Road Trip Destinations in Indonesia
                   </h1>


                   <!-- Subtitle lebih kecil -->
                   <p class="text-sm md:text-base text-blue-100 mb-6 max-w-3xl mx-auto leading-relaxed">
                       Explore Indonesia's breathtaking beauty with unforgettable road trips using rental cars
                   </p>


                   <!-- Meta Info lebih compact -->
                   <div class="flex flex-wrap justify-center items-center gap-3 md:gap-4 pt-4 border-t border-blue-400/20">
                       <div class="flex items-center space-x-2">
                           <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center">
                               <i class="far fa-calendar-alt text-blue-200 text-xs"></i>
                           </div>
                           <div class="text-left">
                               <div class="text-[10px] text-blue-300">Published</div>
                               <div class="text-xs font-semibold">Mar 5, 2023</div>
                           </div>
                       </div>


                       <div class="flex items-center space-x-2">
                           <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center">
                               <i class="far fa-clock text-blue-200 text-xs"></i>
                           </div>
                           <div class="text-left">
                               <div class="text-[10px] text-blue-300">Read Time</div>
                               <div class="text-xs font-semibold">8 min read</div>
                           </div>
                       </div>


                       <div class="flex items-center space-x-2">
                           <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center">
                               <i class="far fa-user text-blue-200 text-xs"></i>
                           </div>
                           <div class="text-left">
                               <div class="text-[10px] text-blue-300">Author</div>
                               <div class="text-xs font-semibold">Andi Rahman</div>
                           </div>
                       </div>


                       <div class="flex items-center space-x-2">
                           <div class="w-8 h-8 rounded-full bg-white/10 flex items-center justify-center">
                               <i class="far fa-eye text-blue-200 text-xs"></i>
                           </div>
                           <div class="text-left">
                               <div class="text-[10px] text-blue-300">Views</div>
                               <div class="text-xs font-semibold">4.2k</div>
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
                           src="https://images.unsplash.com/photo-1506197603052-3cc9c3a201bd?auto=format&fit=crop&w=1200&q=80"
                           alt="Indonesian Road Trip"
                           class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-700"
                       >
                       <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
                       <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                           <p class="text-xs md:text-sm opacity-90 italic">Discover Indonesia's hidden gems through unforgettable road trip adventures</p>
                       </div>
                   </div>
               </div>


               <!-- Introduction Card -->
               <div class="bg-gradient-to-r from-blue-50 to-white rounded-xl p-4 md:p-6 mb-6 border border-blue-100 shadow-sm">
                   <div class="flex items-start space-x-3 md:space-x-4">
                       <div class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
                           <i class="fas fa-map-marked-alt text-blue-600 text-base md:text-lg"></i>
                       </div>
                       <div class="flex-1">
                           <p class="text-gray-700 leading-relaxed text-base">
                               <span class="font-semibold text-blue-600">Indonesia offers some of the world's most spectacular road trip routes.</span>
                               From volcanic landscapes to pristine beaches, these destinations promise unforgettable adventures with your rental car.
                           </p>
                       </div>
                   </div>
               </div>


               <!-- Destinations Container -->
               <div class="space-y-4 md:space-y-6 mb-8">
                   <!-- Destination 1 -->
                   <div class="bg-white rounded-xl p-4 md:p-6 shadow-sm border border-gray-100 hover-lift animate-fade-in-up" style="animation-delay: 0.1s;">
                       <div class="flex items-start space-x-4 md:space-x-5">
                           <div class="tip-number-gradient w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center flex-shrink-0">
                               <span class="text-white font-bold text-base md:text-lg">1</span>
                           </div>
                           <div class="flex-1">
                               <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-2">
                                   Bali - Coastal Road Adventure
                               </h3>
                               <div class="pl-0 md:pl-2">
                                   <p class="text-gray-600 leading-relaxed mb-3">
                                       Experience Bali's stunning coastline from Kuta to Uluwatu. Enjoy cliffside views, hidden beaches, and vibrant sunsets along this breathtaking route.
                                   </p>
                                   <div class="grid grid-cols-2 md:grid-cols-3 gap-2 md:gap-3">
                                       <div class="bg-blue-50 rounded-lg p-2 text-center hover:bg-blue-100 transition-colors">
                                           <div class="text-blue-600 font-semibold text-xs md:text-sm">Best Time</div>
                                           <div class="text-xs text-gray-600 mt-1">Apr-Oct</div>
                                       </div>
                                       <div class="bg-blue-50 rounded-lg p-2 text-center hover:bg-blue-100 transition-colors">
                                           <div class="text-blue-600 font-semibold text-xs md:text-sm">Distance</div>
                                           <div class="text-xs text-gray-600 mt-1">150 km</div>
                                       </div>
                                       <div class="bg-blue-50 rounded-lg p-2 text-center hover:bg-blue-100 transition-colors">
                                           <div class="text-blue-600 font-semibold text-xs md:text-sm">Duration</div>
                                           <div class="text-xs text-gray-600 mt-1">3-4 days</div>
                                       </div>
                                   </div>
                                   <div class="mt-3 bg-blue-50 rounded-lg p-3 border border-blue-100">
                                       <div class="flex items-center space-x-2 text-blue-700">
                                           <i class="fas fa-star text-sm"></i>
                                           <span class="font-semibold text-sm">Must-See:</span>
                                           <span class="text-xs md:text-sm">Uluwatu Temple, Padang Padang Beach, Dreamland Beach</span>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>


                   <!-- Destination 2 -->
                   <div class="bg-white rounded-xl p-4 md:p-6 shadow-sm border border-gray-100 hover-lift animate-fade-in-up" style="animation-delay: 0.2s;">
                       <div class="flex items-start space-x-4 md:space-x-5">
                           <div class="tip-number-gradient w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center flex-shrink-0">
                               <span class="text-white font-bold text-base md:text-lg">2</span>
                           </div>
                           <div class="flex-1">
                               <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-2">
                                   Java - Volcano Circuit
                               </h3>
                               <div class="pl-0 md:pl-2">
                                   <p class="text-gray-600 leading-relaxed mb-3">
                                       Journey through Java's volcanic heartland from Yogyakarta to Mount Bromo. Witness ancient temples and sunrise over volcanic landscapes.
                                   </p>
                                   <div class="grid grid-cols-2 md:grid-cols-3 gap-2 md:gap-3">
                                       <div class="bg-blue-50 rounded-lg p-2 text-center hover:bg-blue-100 transition-colors">
                                           <div class="text-blue-600 font-semibold text-xs md:text-sm">Best Time</div>
                                           <div class="text-xs text-gray-600 mt-1">May-Sep</div>
                                       </div>
                                       <div class="bg-blue-50 rounded-lg p-2 text-center hover:bg-blue-100 transition-colors">
                                           <div class="text-blue-600 font-semibold text-xs md:text-sm">Distance</div>
                                           <div class="text-xs text-gray-600 mt-1">350 km</div>
                                       </div>
                                       <div class="bg-blue-50 rounded-lg p-2 text-center hover:bg-blue-100 transition-colors">
                                           <div class="text-blue-600 font-semibold text-xs md:text-sm">Duration</div>
                                           <div class="text-xs text-gray-600 mt-1">5-6 days</div>
                                       </div>
                                   </div>
                                   <div class="mt-3 bg-blue-50 rounded-lg p-3 border border-blue-100">
                                       <div class="flex items-center space-x-2 text-blue-700">
                                           <i class="fas fa-mountain text-sm"></i>
                                           <span class="font-semibold text-sm">Highlights:</span>
                                           <span class="text-xs md:text-sm">Borobudur, Mount Bromo, Ijen Crater</span>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>


                   <!-- Destination 3 -->
                   <div class="bg-white rounded-xl p-4 md:p-6 shadow-sm border border-gray-100 hover-lift animate-fade-in-up" style="animation-delay: 0.3s;">
                       <div class="flex items-start space-x-4 md:space-x-5">
                           <div class="tip-number-gradient w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center flex-shrink-0">
                               <span class="text-white font-bold text-base md:text-lg">3</span>
                           </div>
                           <div class="flex-1">
                               <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-2">
                                   Lombok - Island Paradise Route
                               </h3>
                               <div class="pl-0 md:pl-2">
                                   <p class="text-gray-600 leading-relaxed mb-3">
                                       Discover Lombok's pristine beaches and traditional villages. From Senggigi to the stunning south coast, experience untouched natural beauty.
                                   </p>
                                   <div class="grid grid-cols-2 md:grid-cols-3 gap-2 md:gap-3">
                                       <div class="bg-blue-50 rounded-lg p-2 text-center hover:bg-blue-100 transition-colors">
                                           <div class="text-blue-600 font-semibold text-xs md:text-sm">Best Time</div>
                                           <div class="text-xs text-gray-600 mt-1">Apr-Nov</div>
                                       </div>
                                       <div class="bg-blue-50 rounded-lg p-2 text-center hover:bg-blue-100 transition-colors">
                                           <div class="text-blue-600 font-semibold text-xs md:text-sm">Distance</div>
                                           <div class="text-xs text-gray-600 mt-1">200 km</div>
                                       </div>
                                       <div class="bg-blue-50 rounded-lg p-2 text-center hover:bg-blue-100 transition-colors">
                                           <div class="text-blue-600 font-semibold text-xs md:text-sm">Duration</div>
                                           <div class="text-xs text-gray-600 mt-1">4-5 days</div>
                                       </div>
                                   </div>
                                   <div class="mt-3 bg-blue-50 rounded-lg p-3 border border-blue-100">
                                       <div class="flex items-center space-x-2 text-blue-700">
                                           <i class="fas fa-umbrella-beach text-sm"></i>
                                           <span class="font-semibold text-sm">Beach Gems:</span>
                                           <span class="text-xs md:text-sm">Kuta Lombok, Tanjung Aan, Mawun Beach</span>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>


                   <!-- Destination 4 -->
                   <div class="bg-white rounded-xl p-4 md:p-6 shadow-sm border border-gray-100 hover-lift animate-fade-in-up" style="animation-delay: 0.4s;">
                       <div class="flex items-start space-x-4 md:space-x-5">
                           <div class="tip-number-gradient w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center flex-shrink-0">
                               <span class="text-white font-bold text-base md:text-lg">4</span>
                           </div>
                           <div class="flex-1">
                               <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-2">
                                   Sumatra - Lake Toba Expedition
                               </h3>
                               <div class="pl-0 md:pl-2">
                                   <p class="text-gray-600 leading-relaxed mb-3">
                                       Explore the world's largest volcanic lake and Batak culture. The journey from Medan to Lake Toba offers stunning mountain scenery.
                                   </p>
                                   <div class="grid grid-cols-2 md:grid-cols-3 gap-2 md:gap-3">
                                       <div class="bg-blue-50 rounded-lg p-2 text-center hover:bg-blue-100 transition-colors">
                                           <div class="text-blue-600 font-semibold text-xs md:text-sm">Best Time</div>
                                           <div class="text-xs text-gray-600 mt-1">Jun-Sep</div>
                                       </div>
                                       <div class="bg-blue-50 rounded-lg p-2 text-center hover:bg-blue-100 transition-colors">
                                           <div class="text-blue-600 font-semibold text-xs md:text-sm">Distance</div>
                                           <div class="text-xs text-gray-600 mt-1">175 km</div>
                                       </div>
                                       <div class="bg-blue-50 rounded-lg p-2 text-center hover:bg-blue-100 transition-colors">
                                           <div class="text-blue-600 font-semibold text-xs md:text-sm">Duration</div>
                                           <div class="text-xs text-gray-600 mt-1">3-4 days</div>
                                       </div>
                                   </div>
                                   <div class="mt-3 bg-blue-50 rounded-lg p-3 border border-blue-100">
                                       <div class="flex items-center space-x-2 text-blue-700">
                                           <i class="fas fa-water text-sm"></i>
                                           <span class="font-semibold text-sm">Cultural Experience:</span>
                                           <span class="text-xs md:text-sm">Batak villages, Samosir Island, Sipisopiso Waterfall</span>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>


                   <!-- Destination 5 -->
                   <div class="bg-white rounded-xl p-4 md:p-6 shadow-sm border border-gray-100 hover-lift animate-fade-in-up" style="animation-delay: 0.5s;">
                       <div class="flex items-start space-x-4 md:space-x-5">
                           <div class="tip-number-gradient w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center flex-shrink-0">
                               <span class="text-white font-bold text-base md:text-lg">5</span>
                           </div>
                           <div class="flex-1">
                               <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-2">
                                   Flores - Komodo Adventure Trail
                               </h3>
                               <div class="pl-0 md:pl-2">
                                   <p class="text-gray-600 leading-relaxed mb-3">
                                       Journey through Flores to see Komodo dragons and pink beaches. This route combines wildlife, culture, and spectacular island scenery.
                                   </p>
                                   <div class="grid grid-cols-2 md:grid-cols-3 gap-2 md:gap-3">
                                       <div class="bg-blue-50 rounded-lg p-2 text-center hover:bg-blue-100 transition-colors">
                                           <div class="text-blue-600 font-semibold text-xs md:text-sm">Best Time</div>
                                           <div class="text-xs text-gray-600 mt-1">Jul-Oct</div>
                                       </div>
                                       <div class="bg-blue-50 rounded-lg p-2 text-center hover:bg-blue-100 transition-colors">
                                           <div class="text-blue-600 font-semibold text-xs md:text-sm">Distance</div>
                                           <div class="text-xs text-gray-600 mt-1">300 km</div>
                                       </div>
                                       <div class="bg-blue-50 rounded-lg p-2 text-center hover:bg-blue-100 transition-colors">
                                           <div class="text-blue-600 font-semibold text-xs md:text-sm">Duration</div>
                                           <div class="text-xs text-gray-600 mt-1">6-7 days</div>
                                       </div>
                                   </div>
                                   <div class="mt-3 bg-blue-50 rounded-lg p-3 border border-blue-100">
                                       <div class="flex items-center space-x-2 text-blue-700">
                                           <i class="fas fa-dragon text-sm"></i>
                                           <span class="font-semibold text-sm">Wildlife & Nature:</span>
                                           <span class="text-xs md:text-sm">Komodo Island, Pink Beach, Kelimutu Lakes</span>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>


               <!-- Road Trip Tips Section -->
               <div class="bg-gradient-to-r from-blue-50 to-white rounded-xl p-4 md:p-6 mb-6 border border-blue-100 shadow-sm">
                   <h3 class="text-lg md:text-xl font-bold text-gray-900 mb-4 flex items-center">
                       <i class="fas fa-car text-blue-600 mr-3"></i>
                       Road Trip Essentials for Indonesia
                   </h3>
                   <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                       <div class="bg-white rounded-lg p-4 border border-gray-200">
                           <div class="flex items-center space-x-3 mb-2">
                               <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                                   <i class="fas fa-car text-blue-600"></i>
                               </div>
                               <div>
                                   <div class="font-semibold text-blue-700">Vehicle Choice</div>
                                   <div class="text-sm text-gray-600">SUV for mountain roads</div>
                               </div>
                           </div>
                       </div>
                       <div class="bg-white rounded-lg p-4 border border-gray-200">
                           <div class="flex items-center space-x-3 mb-2">
                               <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                                   <i class="fas fa-passport text-blue-600"></i>
                               </div>
                               <div>
                                   <div class="font-semibold text-blue-700">Documents</div>
                                   <div class="text-sm text-gray-600">Int'l license & insurance</div>
                               </div>
                           </div>
                       </div>
                       <div class="bg-white rounded-lg p-4 border border-gray-200">
                           <div class="flex items-center space-x-3 mb-2">
                               <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                                   <i class="fas fa-sun text-blue-600"></i>
                               </div>
                               <div>
                                   <div class="font-semibold text-blue-700">Best Season</div>
                                   <div class="text-sm text-gray-600">Dry season (Apr-Oct)</div>
                               </div>
                           </div>
                       </div>
                       <div class="bg-white rounded-lg p-4 border border-gray-200">
                           <div class="flex items-center space-x-3 mb-2">
                               <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center">
                                   <i class="fas fa-map text-blue-600"></i>
                               </div>
                               <div>
                                   <div class="font-semibold text-blue-700">Navigation</div>
                                   <div class="text-sm text-gray-600">Offline maps essential</div>
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
                               <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=200&q=80"
                                    alt="Bali Travel"
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                           </div>
                           <div>
                               <h4 class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors text-sm">Ultimate Bali Travel Guide 2023</h4>
                               <p class="text-xs text-gray-500 mt-1">10 min read</p>
                           </div>
                       </a>
                       <a href="#" class="group flex items-start space-x-3 p-2 rounded-lg hover:bg-blue-50 transition-colors duration-300">
                           <div class="w-16 h-12 rounded-lg overflow-hidden flex-shrink-0">
                               <img src="https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?auto=format&fit=crop&w=200&q=80"
                                    alt="Indonesia Culture"
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                           </div>
                           <div>
                               <h4 class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors text-sm">Indonesian Culture & Customs Guide</h4>
                               <p class="text-xs text-gray-500 mt-1">7 min read</p>
                           </div>
                       </a>
                       <a href="#" class="group flex items-start space-x-3 p-2 rounded-lg hover:bg-blue-50 transition-colors duration-300">
                           <div class="w-16 h-12 rounded-lg overflow-hidden flex-shrink-0">
                               <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?auto=format&fit=crop&w=200&q=80"
                                    alt="Island Hopping"
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                           </div>
                           <div>
                               <h4 class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors text-sm">Island Hopping in Eastern Indonesia</h4>
                               <p class="text-xs text-gray-500 mt-1">9 min read</p>
                           </div>
                       </a>
                   </div>
               </div>


               <!-- Travel Checklist -->
               <div class="bg-white rounded-xl p-4 md:p-6 shadow-sm mb-6 border border-gray-100">
                   <h3 class="text-lg font-bold text-gray-900 mb-4 pb-2 border-b border-gray-200 flex items-center">
                       <i class="fas fa-clipboard-check text-blue-500 mr-2 text-sm"></i>
                       Road Trip Checklist
                   </h3>
                   <div class="space-y-3">
                       <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-blue-50 transition-colors group">
                           <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center group-hover:bg-blue-200">
                               <i class="fas fa-car text-blue-600 text-xs"></i>
                           </div>
                           <span class="text-sm font-medium text-gray-800">Reliable rental vehicle</span>
                       </div>
                       <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-blue-50 transition-colors group">
                           <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center group-hover:bg-blue-200">
                               <i class="fas fa-map-marked-alt text-blue-600 text-xs"></i>
                           </div>
                           <span class="text-sm font-medium text-gray-800">GPS & offline maps</span>
                       </div>
                       <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-blue-50 transition-colors group">
                           <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center group-hover:bg-blue-200">
                               <i class="fas fa-passport text-blue-600 text-xs"></i>
                           </div>
                           <span class="text-sm font-medium text-gray-800">International license</span>
                       </div>
                       <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-blue-50 transition-colors group">
                           <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center group-hover:bg-blue-200">
                               <i class="fas fa-sun text-blue-600 text-xs"></i>
                           </div>
                           <span class="text-sm font-medium text-gray-800">Sun protection</span>
                       </div>
                       <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-blue-50 transition-colors group">
                           <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center group-hover:bg-blue-200">
                               <i class="fas fa-water text-blue-600 text-xs"></i>
                           </div>
                           <span class="text-sm font-medium text-gray-800">Emergency water supply</span>
                       </div>
                       <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-blue-50 transition-colors group">
                           <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center group-hover:bg-blue-200">
                               <i class="fas fa-first-aid text-blue-600 text-xs"></i>
                           </div>
                           <span class="text-sm font-medium text-gray-800">First aid kit</span>
                       </div>
                   </div>
               </div>


               <!-- Share Widget -->
               <div class="bg-white rounded-xl p-4 md:p-6 shadow-sm border border-gray-100">
                   <h3 class="text-lg font-bold text-gray-900 mb-4 pb-2 border-b border-gray-200 flex items-center">
                       <i class="fas fa-share-alt text-blue-500 mr-2 text-sm"></i>
                       Share This Guide
                   </h3>
                   <p class="text-sm text-gray-600 mb-4 text-center">Found these destinations amazing? Share with fellow travelers!</p>
                   <div class="flex justify-center space-x-3">
                       <a href="#" class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white hover:bg-blue-600 hover:scale-110 transition-all shadow">
                           <i class="fab fa-facebook-f text-xs"></i>
                       </a>
                       <a href="#" class="w-10 h-10 rounded-full bg-blue-400 flex items-center justify-center text-white hover:bg-blue-500 hover:scale-110 transition-all shadow">
                           <i class="fab fa-twitter text-xs"></i>
                       </a>
                       <a href="#" class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white hover:bg-blue-600 hover:scale-110 transition-all shadow">
                           <i class="fab fa-instagram text-xs"></i>
                       </a>
                   </div>
               </div>
           </aside>
       </div>
   </div>




@endsection
