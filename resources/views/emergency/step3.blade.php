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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }

        .step-circle {
            width: 40px; height: 40px;
        }
        @media (min-width: 640px) { .step-circle { width: 48px; height: 48px; } }
        @media (min-width: 768px) { .step-circle { width: 52px; height: 52px; } }

        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
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
                    <!-- Step 1 Completed -->
                    <div class="flex flex-col items-center z-10">
                        <div class="step-circle rounded-full bg-green-500 text-white flex items-center justify-center font-bold text-lg shadow-lg">
                            <i class="fas fa-check"></i>
                        </div>
                        <span class="mt-3 font-semibold text-base text-green-600 text-center">
                            Personal<br>Information
                        </span>
                    </div>
                    <!-- Step 2 Completed -->
                    <div class="flex flex-col items-center z-10">
                        <div class="step-circle rounded-full bg-green-500 text-white flex items-center justify-center font-bold text-lg shadow-lg">
                            <i class="fas fa-check"></i>
                        </div>
                        <span class="mt-3 font-semibold text-base text-green-600 text-center">
                            Confirm<br>& Pay
                        </span>
                    </div>
                    <!-- Step 3 Active -->
                    <div class="flex flex-col items-center z-10">
                        <div class="step-circle rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-lg shadow-lg">
                            <i class="fas fa-check"></i>
                        </div>
                        <span class="mt-3 font-semibold text-base text-blue-600 text-center">
                            Complete
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Success Section -->
        <div class="bg-white rounded-3xl shadow-lg p-8 animate-fadeIn border border-gray-100">
            <div class="text-center py-12">
                <!-- Success Icon -->
                <div class="w-28 h-28 mx-auto mb-8 bg-gradient-to-br from-green-400 to-green-500 rounded-full flex items-center justify-center shadow-2xl">
                    <i class="fas fa-check-circle text-white text-5xl"></i>
                </div>

                <!-- Success Message -->
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Thank You!</h1>
                <p class="text-lg text-gray-600 mb-6 max-w-2xl mx-auto">
                    Your order has been successfully submitted. The Emergency Assistant team will contact you shortly for further coordination.
                </p>

                <!-- Order Number -->
                <div class="inline-block bg-gradient-to-r from-blue-600 to-blue-700 text-white font-bold text-xl py-5 px-10 rounded-2xl shadow-xl mb-8">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-ticket-alt"></i>
                        <span>Order No: <span class="tracking-wider font-mono">{{ $emergency->unique_id }}</span></span>
                    </div>
                </div>

                <!-- Information -->
                <div class="bg-blue-50 rounded-2xl p-8 text-left mb-8 border border-blue-200 max-w-8xl mx-auto">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0">
                            <i class="fas fa-clock text-yellow-600 text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 text-lg mb-3">Response Timeline</h3>
                            <ul class="space-y-3">
                                <li class="flex items-center gap-3">
                                    <div class="w-6 h-6 rounded-full bg-green-100 flex items-center justify-center">
                                        <i class="fas fa-check text-green-600 text-xs"></i>
                                    </div>
                                    <span class="text-gray-700">Order received - Now</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <div class="w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center">
                                        <i class="fas fa-user-clock text-blue-600 text-xs"></i>
                                    </div>
                                    <span class="text-gray-700">Team confirmation - Within 30 minutes</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <div class="w-6 h-6 rounded-full bg-purple-100 flex items-center justify-center">
                                        <i class="fas fa-headset text-purple-600 text-xs"></i>
                                    </div>
                                    <span class="text-gray-700">Assistance coordination - After confirmation</span>
                                </li>
                            </ul>

                            <div class="mt-6 p-4 bg-yellow-50 border border-yellow-200 rounded-xl">
                                <div class="flex items-center gap-3 mb-2">
                                    <i class="fas fa-exclamation-triangle text-yellow-600"></i>
                                    <span class="font-bold text-gray-800">Attention!</span>
                                </div>
                                <p class="text-gray-700 mb-2">
                                    If there is no confirmation from our team within 30 minutes, please contact the emergency hotline:
                                </p>
                                <div class="text-lg font-bold text-red-600 flex items-center gap-2">
                                    <i class="fas fa-phone-alt"></i>
                                    Hotline: +62 812-3456-7890
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Submit + Back Buttons -->
<!-- Submit + Back Buttons -->
<div class="pt-7 border-t border-gray-100 flex justify-between gap-4">
    <!-- Back Button -->
    <a href="{{ route('index') }}"
       class="w-1/2 text-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold text-lg py-5 px-6 rounded-2xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5">
        <i class="fas fa-arrow-left mr-3"></i>
        Back to home
    </a>
   <a href="{{ route('emergency.step1') }}"
       class="w-1/2 text-center bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold text-lg py-5 px-6 rounded-2xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5">
        <i class="fas fa-arrow-right mr-3"></i>
New Service Request    </a>
</div>





            </div>
        </div>
    </div>

 @endsection

