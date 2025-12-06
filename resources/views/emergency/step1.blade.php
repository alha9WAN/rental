@extends('components.page')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
<script>
    Swal.fire({
        title: "Success!",
        text: "{{ session('success') }}",
        icon: "success",
        confirmButtonColor: '#3085d6'
    });
</script>
@endif

@if ($errors->any())
<script>
    Swal.fire({
        title: "Failed!",
        text: "There are input errors, please check the form again.",
        icon: "error",
        confirmButtonColor: '#d33'
    });
</script>
@endif

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }

        .step-circle {
            width: 40px; height: 40px;
        }
        @media (min-width: 640px) { .step-circle { width: 48px; height: 48px; } }
        @media (min-width: 768px) { .step-circle { width: 52px; height: 52px; } }

        input[name="assistance_type"]:checked ~ .flex-1 {
            border-color: #3b82f6 !important;
            background-color: #eff6ff !important;
        }

        /* Animasi */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn { animation: fadeIn 0.3s ease-out; }

        /* Style untuk intl-tel-input */
        .iti {
            width: 100%;
        }
        .iti__country-list {
            z-index: 9999 !important;
        }
        /* Pastikan input phone memiliki width 100% */
        #phone {
            width: 100% !important;
        }
    </style>

    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Header -->

        <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-3xl p-8 mb-8 shadow-xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-72 h-72 bg-white/10 rounded-full -translate-y-1/3 translate-x-1/4"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/4"></div>

            <div class="relative z-10">
                <div class="flex flex-col items-center gap-6 mb-6">
                    <i class="fas fa-life-ring text-6xl text-white"></i>
                    <h1 class="text-3xl md:text-4xl font-bold text-center">
                        Emergency Assistant<br class="sm:hidden"> Lombok Tourism
                    </h1>
                </div>
                <p class="text-lg text-blue-100 text-center max-w-3xl mx-auto">
                    24/7 Emergency Assistance Service for Tourists in Lombok
                </p>
            </div>
        </div>

        <!-- Progress Steps -->
        <div class="bg-white rounded-3xl shadow-lg p-7 mb-8 border border-gray-100">
            <div class="relative">
                <div class="absolute top-1/2 left-0 right-0 h-2 bg-gray-200 transform -translate-y-1/2"></div>
                <div class="relative flex justify-between">
                    <!-- Step 1 Active -->
                    <div class="flex flex-col items-center z-10">
                        <div class="step-circle rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-lg shadow-lg">
                            <i class="fas fa-user"></i>
                        </div>
                        <span class="mt-3 font-semibold text-base text-blue-600 text-center">
                            Personal<br>Information
                        </span>
                    </div>
                    <!-- Step 2 Inactive -->
                    <div class="flex flex-col items-center z-10">
                        <div class="step-circle rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-bold text-lg">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        <span class="mt-3 font-semibold text-base text-gray-500 text-center">
                            Confirm<br>& Pay
                        </span>
                    </div>
                    <!-- Step 3 Inactive -->
                    <div class="flex flex-col items-center z-10">
                        <div class="step-circle rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-bold text-lg">
                            <i class="fas fa-check"></i>
                        </div>
                        <span class="mt-3 font-semibold text-base text-gray-500 text-center">
                            Complete
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="bg-white rounded-3xl shadow-lg p-8 animate-fadeIn border border-gray-100">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-7 pb-6 border-b border-gray-100">
                <i class="fas fa-user-circle text-blue-600 mr-3"></i>
                Emergency Assistance Request Form
            </h2>

            <form id="emergencyForm" method="POST" action="{{ route('emergency.step1.store') }}">
                @csrf
                <!-- Personal Information -->
                <div class="space-y-6 mb-8">
                  <!-- ID Unik (Readonly) -->
<div class="space-y-2">
    <label class="block text-gray-700 font-semibold text-lg">
        ID <span class="text-red-500">*</span>
    </label>
    <input type="text" id="unique_id" name="unique_id" readonly
        class="w-full px-5 py-4 border border-gray-300 rounded-2xl bg-gray-100 cursor-not-allowed"
        placeholder="Auto Generated"
        value="{{ $uniqueId ?? '' }}">
</div>

                    <!-- Name -->
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-semibold text-lg">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" name="name" required
                            class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:border-blue-500 focus:ring-3 focus:ring-blue-200 outline-none transition"
                            placeholder="Enter your full name"
                            value="{{ old('name') }}">
                             @error('name')
                               <small class="text-red-500">{{ $message }}</small>
                           @enderror
                    </div>

                    <!-- Email -->
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-semibold text-lg">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:border-blue-500 focus:ring-3 focus:ring-blue-200 outline-none transition"
                            placeholder="your@email.com"
                            value="{{ old('email') }}">
   @error('email')
                               <small class="text-red-500">{{ $message }}</small>
                           @enderror
                    </div>

                    <!-- Phone - PERBAIKAN DI SINI -->
                    <div class="space-y-2">
                        <label class="block text-gray-700 font-semibold text-lg">
                            Phone/WhatsApp Number <span class="text-red-500">*</span>
                        </label>
                        <!-- Hapus class styling dari input, biarkan intl-tel-input mengatur -->
                        <input type="tel" id="phone" name="phone" required
                            class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:border-blue-500 focus:ring-3 focus:ring-blue-200 outline-none transition"
                            placeholder="+62 812-3456-7890"
                            value="{{ old('phone') }}">
                               @error('phone')
                               <small class="text-red-500">{{ $message }}</small>
                           @enderror
                    </div>

                 <!-- Nationality -->
<div class="space-y-2">
    <label class="block text-gray-700 font-semibold text-lg">
        Nationality
    </label>
    <div class="relative">
        <input type="text" id="nationality" name="nationality"
        class="w-full px-12 py-4 border-2 border-gray-300 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition bg-white"
        placeholder="Enter your nationality (optional)"
        value="{{ old('nationality') }}">
        <div class="absolute left-4 top-1/2 transform -translate-y-1/2 pointer-events-none">
        </div>
        <div class="absolute right-4 top-1/2 transform -translate-y-1/2 pointer-events-none">
        </div>
    </div>
   @error('nationality')
                               <small class="text-red-500">{{ $message }}</small>
                           @enderror
                        </div>

           <!-- Location -->
<div class="space-y-2">
    <label class="block text-gray-700 font-semibold text-lg">
        Current Location in Lombok <span class="text-red-500">*</span>
    </label>
    <div class="relative">
        <input type="text" id="location" name="location" required
            class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:border-blue-500 focus:ring-3 focus:ring-blue-200 outline-none transition pr-12"
            placeholder="Enter your current location"
            value="{{ old('location') }}">
    </div>
       @error('location')
                               <small class="text-red-500">{{ $message }}</small>
                           @enderror
</div>
                </div>

                <!-- Urgency Level -->
                <div class="mb-8">
                    <label class="block text-gray-700 font-semibold text-lg mb-4">
                        Urgency Level <span class="text-red-500">*</span>
                    </label>
                    <select id="urgency" name="urgency" required
                        class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:border-blue-500 focus:ring-3 focus:ring-blue-200 outline-none transition bg-white">
                        <option value="">-- Select Urgency Level --</option>
                        <option value="low" {{ old('urgency') == 'low' ? 'selected' : '' }}>LOW - Response within 24 hours</option>
                        <option value="medium" {{ old('urgency') == 'medium' ? 'selected' : '' }}>MEDIUM - Need assistance within 6-12 hours</option>
                        <option value="high" {{ old('urgency') == 'high' ? 'selected' : '' }}>HIGH - Need assistance within 1-6 hours</option>
                        <option value="emergency" {{ old('urgency') == 'emergency' ? 'selected' : '' }}>EMERGENCY - Need immediate assistance (5-15 minutes)</option>
                    </select>
    @error('urgency')
                               <small class="text-red-500">{{ $message }}</small>
                           @enderror
                </div>

                <!-- Language -->
                <div class="mb-8">
                    <label class="block text-gray-700 font-semibold text-lg mb-4">
                        Preferred Language <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select id="language" name="language" required
                            class="w-full px-12 py-4 border-2 border-gray-300 rounded-xl focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition bg-white appearance-none cursor-pointer">
                            <option value="">-- Select Language --</option>
<option value="indonesia" {{ old('language') == 'indonesia' ? 'selected' : '' }}>Indonesian</option>
                            <option value="english" {{ old('language') == 'english' ? 'selected' : '' }}>English</option>
                            <option value="mandarin" {{ old('language') == 'mandarin' ? 'selected' : '' }}>Mandarin</option>
                            <option value="japanese" {{ old('language') == 'japanese' ? 'selected' : '' }}>Japanese</option>
                            <option value="korean" {{ old('language') == 'korean' ? 'selected' : '' }}>Korean</option>
                            <option value="arabic" {{ old('language') == 'arabic' ? 'selected' : '' }}>Arabic</option>
                            <option value="french" {{ old('language') == 'french' ? 'selected' : '' }}>French</option>
                            <option value="german" {{ old('language') == 'german' ? 'selected' : '' }}>German</option>
                            <option value="spanish" {{ old('language') == 'spanish' ? 'selected' : '' }}>Spanish</option>
                            <option value="other" {{ old('language') == 'other' ? 'selected' : '' }}>Other Language</option>
                        </select>
                        <div class="absolute left-4 top-1/2 transform -translate-y-1/2 pointer-events-none">
                            <i class="fas fa-globe text-blue-500"></i>
                        </div>
                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2 pointer-events-none">
                            <i class="fas fa-chevron-down text-gray-500"></i>
                        </div>
                    </div>
   @error('language')
                               <small class="text-red-500">{{ $message }}</small>
                           @enderror
                </div>

                <!-- Type of Assistance -->
                <div class="mb-8">
                    <label class="block text-gray-700 font-semibold text-lg mb-4">
                        Type of Assistance Needed <span class="text-red-500">*</span>
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">


                        <!-- Medical -->
                        <label class="flex items-start p-4 border-2 border-gray-200 rounded-xl hover:border-red-400 hover:bg-red-50 cursor-pointer transition-all">
                            <input type="checkbox" name="assistance_type[]" value="medical" class="w-5 h-5 mr-3 mt-1" >
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center">
                                        <i class="fas fa-ambulance text-red-500 text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="font-bold text-gray-800">Medical</span>
                                        <span class="text-xs px-2 py-0.5 bg-red-100 text-red-600 rounded-full ml-2">Urgent</span>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-600">First aid, ambulance service, hospital referral</p>
                            </div>
                        </label>

                        <!-- Transportation -->
                        <label class="flex items-start p-4 border-2 border-gray-200 rounded-xl hover:border-blue-400 hover:bg-blue-50 cursor-pointer transition-all">
                            <input type="checkbox" name="assistance_type[]" value="transport" class="w-5 h-5 mr-3 mt-1" >
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center">
                                        <i class="fas fa-car text-blue-500 text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="font-bold text-gray-800">Transportation</span>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-600">Taxi arrangement, vehicle rental, airport pick-up</p>
                            </div>
                        </label>

                        <!-- Documents -->
                        <label class="flex items-start p-4 border-2 border-gray-200 rounded-xl hover:border-green-400 hover:bg-green-50 cursor-pointer transition-all">
                            <input type="checkbox" name="assistance_type[]" value="document" class="w-5 h-5 mr-3 mt-1" >
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center">
                                        <i class="fas fa-passport text-green-500 text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="font-bold text-gray-800">Documents</span>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-600">Lost passport recovery, embassy contact</p>
                            </div>
                        </label>

                        <!-- Communication -->
                        <label class="flex items-start p-4 border-2 border-gray-200 rounded-xl hover:border-purple-400 hover:bg-purple-50 cursor-pointer transition-all">
                            <input type="checkbox" name="assistance_type[]" value="communication" class="w-5 h-5 mr-3 mt-1" >
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center">
                                        <i class="fas fa-comments text-purple-500 text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="font-bold text-gray-800">Communication</span>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-600">Translation service, interpreter assistance</p>
                            </div>
                        </label>

                        <!-- Accommodation -->
                        <label class="flex items-start p-4 border-2 border-gray-200 rounded-xl hover:border-yellow-400 hover:bg-yellow-50 cursor-pointer transition-all">
                            <input type="checkbox" name="assistance_type[]" value="accommodation" class="w-5 h-5 mr-3 mt-1" >
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-10 h-10 rounded-lg bg-yellow-100 flex items-center justify-center">
                                        <i class="fas fa-hotel text-yellow-500 text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="font-bold text-gray-800">Accommodation</span>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-600">Hotel booking, emergency shelter arrangement</p>
                            </div>
                        </label>

                        <!-- Other -->
                        <label class="flex items-start p-4 border-2 border-gray-200 rounded-xl hover:border-gray-400 hover:bg-gray-50 cursor-pointer transition-all">
                            <input type="checkbox" name="assistance_type[]" value="other" class="w-5 h-5 mr-3 mt-1" >
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center">
                                        <i class="fas fa-tools text-gray-500 text-lg"></i>
                                    </div>
                                    <div>
                                        <span class="font-bold text-gray-800">Other</span>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-600">Other type of assistance not listed above</p>
                            </div>
                        </label>
                    </div>
   @error('assistance_type')
                               <small class="text-red-500">{{ $message }}</small>
                           @enderror                </div>

                <!-- Description -->
                <div class="mb-8">
                    <label class="block text-gray-700 font-semibold text-lg mb-3">
                        Problem/Need Description <span class="text-red-500">*</span>
                    </label>
                    <textarea id="description" name="description" required rows="5"
                        class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:border-blue-500 focus:ring-3 focus:ring-blue-200 outline-none transition resize-none"
                        placeholder="Describe your problem or needed assistance in detail..."></textarea>
   @error('description')
                               <small class="text-red-500">{{ $message }}</small>
                           @enderror
                </div>

                <!-- People Count -->
                <div class="mb-8">
                    <label class="block text-gray-700 font-semibold text-lg mb-2">
                        Number of People  <span class="text-red-500">*</span>
                    </label>
                    <input type="number" id="people_count" name="people_count" min="1" value="1"
                        class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:border-blue-500 focus:ring-3 focus:ring-blue-200 outline-none transition">
                       @error('people_count')
                               <small class="text-red-500">{{ $message }}</small>
                           @enderror
                </div>

                <!-- Emergency Contact -->
                <div class="mb-8">
                    <div class="bg-gradient-to-r from-red-500 to-red-600 text-white rounded-2xl p-6 shadow-lg">
                        <div class="flex flex-col md:flex-row items-center gap-4">
                            <div class="flex-shrink-0">
                                <div class="w-16 h-16 rounded-full bg-white/20 flex items-center justify-center">
                                    <i class="fas fa-phone-alt text-2xl"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-center md:text-left">
                                <h3 class="font-bold text-xl mb-2">24/7 Emergency Contact</h3>
                                <p class="mb-3 text-red-100">For emergencies requiring immediate response</p>
                                <div class="text-2xl font-bold tracking-wide">
                                    <i class="fab fa-whatsapp text-green-300 mr-2"></i>
                                    +62 812-3456-7890
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<!-- Submit + Back Buttons -->
<div class="pt-7 border-t border-gray-100 flex justify-between gap-4">
    <!-- Back Button -->
    <a href="{{ route('index') }}"
       class="w-1/2 text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold text-lg py-5 px-6 rounded-2xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5">
        <i class="fas fa-arrow-left mr-3"></i>
        Back
    </a>

    <!-- Continue Button -->
    <button type="submit" class="w-1/2 block text-center bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold text-lg py-5 px-6 rounded-2xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5">
        <i class="fas fa-arrow-right mr-3"></i>
        Continue to Confirmation & Payment
    </button>
</div>


            </form>
        </div>
    </div>

    <!-- Load JavaScript di bawah -->
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize phone input
        const phoneInput = document.getElementById('phone');
        const fullPhoneInput = document.getElementById('full_phone');

        // Set default value jika ada old data
        const oldPhoneValue = "{{ old('phone') }}";
        if (oldPhoneValue) {
            phoneInput.value = oldPhoneValue;
        }

        // Inisialisasi intlTelInput
        const iti = window.intlTelInput(phoneInput, {
            initialCountry: "id",
            separateDialCode: true,
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js",
            preferredCountries: ['id', 'us', 'gb', 'au', 'sg', 'my'],
            formatOnDisplay: true,
            autoPlaceholder: "aggressive",
            nationalMode: false
        });

        // Set initial hidden value jika ada old data
        if (oldPhoneValue) {
            setTimeout(() => {
                fullPhoneInput.value = iti.getNumber();
            }, 100);
        }

        // Update hidden input saat nomor berubah
        phoneInput.addEventListener('input', function() {
            if (iti.isValidNumber()) {
                fullPhoneInput.value = iti.getNumber();
            }
        });

        // Juga update saat country berubah
        phoneInput.addEventListener('countrychange', function() {
            if (iti.isValidNumber()) {
                fullPhoneInput.value = iti.getNumber();
            }
        });

        // Validasi sebelum submit
        document.getElementById('emergencyForm').addEventListener('submit', function(e) {
            if (!iti.isValidNumber()) {
                e.preventDefault();
                alert('Please enter a valid phone number');
                phoneInput.focus();
                return false;
            }
            // Pastikan hidden field terisi
            if (!fullPhoneInput.value) {
                fullPhoneInput.value = iti.getNumber();
            }
        });
    });
</script>
@endsection
