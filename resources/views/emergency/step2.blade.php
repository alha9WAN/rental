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

        .file-upload {
            border: 2px dashed #cbd5e1;
            transition: all 0.3s ease;
        }
        .file-upload:hover {
            border-color: #3b82f6;
            background-color: #eff6ff;
        }
        .file-upload.drag-over {
            border-color: #3b82f6;
            background-color: #dbeafe;
        }

        .bank-card {
            border: 2px solid #e5e7eb;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .bank-card:hover {
            border-color: #93c5fd;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        .bank-card.selected {
            border-color: #3b82f6;
            background-color: #eff6ff;
            box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.3);
        }

        .animate-fadeIn {
            animation: fadeIn 0.3s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .urgency-badge {
            display: inline-block;
            padding: 0.25rem 1rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 600;
        }
        .urgency-low { background-color: #d1fae5; color: #065f46; }
        .urgency-medium { background-color: #fef3c7; color: #92400e; }
        .urgency-high { background-color: #fed7aa; color: #9a3412; }
        .urgency-emergency { background-color: #fecaca; color: #991b1b; }
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
                    <!-- Step 1 Completed -->
                    <div class="flex flex-col items-center z-10">
                        <div class="step-circle rounded-full bg-green-500 text-white flex items-center justify-center font-bold text-lg shadow-lg">
                            <i class="fas fa-check"></i>
                        </div>
                        <span class="mt-3 font-semibold text-base text-green-600 text-center">
                            Personal<br>Information
                        </span>
                    </div>
                    <!-- Step 2 Active -->
                    <div class="flex flex-col items-center z-10">
                        <div class="step-circle rounded-full bg-blue-600 text-white flex items-center justify-center font-bold text-lg shadow-lg">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        <span class="mt-3 font-semibold text-base text-blue-600 text-center">
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
                <i class="fas fa-clipboard-check text-blue-600 mr-3"></i>
                Confirmation & Payment
            </h2>

           <!-- Order Details -->
<div class="mb-8">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-xl font-bold flex items-center gap-2">
            <i class="fas fa-info-circle text-blue-600"></i>
            Order Details
        </h3>
        <div class="text-lg font-bold text-blue-600 flex items-center gap-2">
            <i class="fas fa-hashtag"></i>
            ID: {{ $emergency->unique_id }}
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-2xl p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Column 1 -->
            <div class="space-y-5">
                <div>
                    <div class="text-sm text-gray-600 mb-1">Full Name</div>
                    <div id="summary-name" class="font-bold text-gray-800 text-lg">{{ $emergency->name }}</div>
                </div>
                <div>
                    <div class="text-sm text-gray-600 mb-1">Email</div>
                    <div id="summary-email" class="font-bold text-gray-800 text-lg">{{ $emergency->email }}</div>
                </div>
                <div>
                    <div class="text-sm text-gray-600 mb-1">Phone/WhatsApp</div>
                    <div id="summary-phone" class="font-bold text-gray-800 text-lg">{{ $emergency->phone }}</div>
                </div>
            </div>

            <!-- Column 2 -->
            <div class="space-y-5">
                <div>
                    <div class="text-sm text-gray-600 mb-1">Nationality</div>
                    <div id="summary-nationality" class="font-bold text-gray-800 text-lg flex items-center gap-2">
                        <i class="fas fa-globe-americas text-green-500"></i>
                        <span>{{ $emergency->nationality ?? '-' }}</span>
                    </div>
                </div>
                <div>
                    <div class="text-sm text-gray-600 mb-1">Location</div>
                    <div class="font-bold text-gray-800 text-lg flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-red-500"></i>
                        <span id="summary-location">{{ $emergency->location }}</span>
                    </div>
                </div>
                <div>
                    <div class="text-sm text-gray-600 mb-1">Urgency Level</div>
                    <div class="font-bold text-lg">
                        <span id="summary-urgency" class="urgency-badge">{{ ucfirst($emergency->urgency) }}</span>
                    </div>
                </div>
            </div>

            <!-- Column 3 -->
            <div class="space-y-5">
                <div>
                    <div class="text-sm text-gray-600 mb-1">Preferred Language</div>
                    <div id="summary-language" class="font-bold text-gray-800 text-lg flex items-center gap-2">
                        <i class="fas fa-language text-purple-500"></i>
                        <span>{{ ucfirst($emergency->language) }}</span>
                    </div>
                </div>
                <div>
                    <div class="text-sm text-gray-600 mb-1">Number of People</div>
                    <div class="font-bold text-gray-800 text-lg flex items-center gap-2">
                        <i class="fas fa-users text-blue-500"></i>
                        <span id="summary-people">{{ $emergency->people_count ?? 0 }}</span> people
                    </div>
                </div>
            </div>
        </div>

        <!-- Type of Assistance -->
        <div class="mt-6 pt-6 border-t border-gray-200">
            <div class="text-sm text-gray-600 mb-3 flex items-center gap-2">
                <i class="fas fa-hands-helping text-blue-500"></i>
                Type of Assistance Requested
            </div>
            <div id="summary-assistance" class="flex flex-wrap gap-3">
                @if(!empty($emergency->assistance_type))
                    @foreach ($emergency->assistance_type as $type)
                        <span class="px-5 py-4 bg-blue-100 text-blue-700 rounded-full text-sm">{{ ucfirst($type) }}</span>
                    @endforeach
                @else
                    <div class="text-gray-500 italic">No assistance selected</div>
                @endif
            </div>
        </div>

        <!-- Description -->
        <div class="mt-6 pt-6 border-t border-gray-200">
            <div class="text-sm text-gray-600 mb-2 flex items-center gap-2">
                <i class="fas fa-comment-alt text-gray-500"></i>
                Problem Description
            </div>
            <div id="summary-description" class="bg-gray-50 rounded-xl p-4 text-gray-700 leading-relaxed">
                {{ $emergency->description }}
            </div>
        </div>
    </div>
</div>

            <!-- Bank Information -->
            <div class="mb-8">
                <h3 class="text-xl font-bold text-gray-800 mb-4">
                    <i class="fas fa-university text-green-600 mr-2"></i>
                    Transfer to Our Bank Account
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <!-- BCA -->
                    <div class="bank-card rounded-2xl p-5 bg-white">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center">
                                <i class="fas fa-university text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Bank BCA</h4>
                                <div class="text-xs text-gray-500">Recommended</div>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div>
                                <div class="text-xs text-gray-600">Account Number</div>
                                <div class="font-bold text-blue-700 text-lg">1234 5678 9012</div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-600">Account Name</div>
                                <div class="font-semibold text-gray-800">PT Lombok Tourism</div>
                            </div>
                        </div>
                    </div>

                    <!-- Mandiri -->
                    <div class="bank-card rounded-2xl p-5 bg-white">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center">
                                <i class="fas fa-university text-red-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Bank Mandiri</h4>
                                <div class="text-xs text-gray-500">Alternative</div>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div>
                                <div class="text-xs text-gray-600">Account Number</div>
                                <div class="font-bold text-red-700 text-lg">9876 5432 1098</div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-600">Account Name</div>
                                <div class="font-semibold text-gray-800">PT Lombok Tourism</div>
                            </div>
                        </div>
                    </div>

                    <!-- BRI -->
                    <div class="bank-card rounded-2xl p-5 bg-white">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center">
                                <i class="fas fa-university text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">Bank BRI</h4>
                                <div class="text-xs text-gray-500">Alternative</div>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <div>
                                <div class="text-xs text-gray-600">Account Number</div>
                                <div class="font-bold text-green-700 text-lg">5678 9012 3456</div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-600">Account Name</div>
                                <div class="font-semibold text-gray-800">PT Lombok Tourism</div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Payment Proof Upload -->
            <form id="paymentForm" method="POST" action="{{ route('emergency.submitPayment', $emergency->id) }}" enctype="multipart/form-data">
                @csrf

<!-- Cost Breakdown -->
<div class="mb-8">
    <h4 class="font-bold text-lg text-gray-800 mb-4 flex items-center gap-2">
        <i class="fas fa-receipt text-gray-600"></i>
        Cost Breakdown
    </h4>

    <div class="space-y-3">

        <!-- Basic Fee -->
        <div class="flex justify-between items-center py-3 border-b border-gray-300">
            <span class="text-gray-700">Basic Service Fee</span>
            <span class="text-gray-900 font-semibold">Rp 150,000</span>
                </div>

        <!-- Urgency Fee -->
        <div class="flex justify-between items-center py-3 border-b border-gray-300">
            <span class="text-gray-700">Urgency Fee</span>
            <span id="urgency-cost" class="text-gray-900 font-semibold">Rp 50,000</span>
        </div>

        <!-- Total -->
        <div class="flex justify-between items-center py-4 bg-blue-50 rounded-xl px-4 mt-4">
            <span class="text-gray-900 font-bold text-lg">Total Payment</span>
            <span id="total-cost" class="text-blue-600 font-bold text-2xl">Rp 200,000</span>

            <!-- DATA UNTUK KIRIM KE DATABASE -->
            <input type="hidden" name="total_payment" value="200000">
        </div>
    </div>
</div>
   @error('total_payment')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror


                <div class="mb-8">
                    <h4 class="text-xl font-bold text-gray-800 mb-4">
                        <i class="fas fa-camera text-blue-600 mr-2"></i>
                        Upload Payment Proof <span class="text-red-500">*</span>
                    </h4>

                    <!-- File Upload Area -->
                    <div class="mb-6">
                        <div class="file-upload rounded-2xl p-8 text-center cursor-pointer bg-white" id="fileUploadArea">
                            <input type="file" id="paymentProof" name="payment_proof" accept="image/*,.pdf" class="hidden" required>

                            <div class="flex flex-col items-center justify-center">
                                <div class="w-20 h-20 mb-5 bg-blue-50 rounded-full flex items-center justify-center shadow-md">
                                    <i class="fas fa-cloud-upload-alt text-blue-600 text-3xl"></i>
                                </div>

                                <h5 class="font-bold text-gray-800 mb-2 text-lg">
                                    Drop or Choose File
                                </h5>

                                <p class="text-gray-600 mb-5 max-w-md mx-auto text-sm">
                                    Upload screenshot or photo of your bank transfer receipt
                                </p>

                                <button type="button" id="uploadButton"
                                    class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium py-2.5 px-6 rounded-lg transition shadow-md hover:shadow-lg flex items-center gap-2 text-sm">
                                    <i class="fas fa-upload"></i>
                                    Browse Files
                                </button>

                                <p class="text-xs text-gray-500 mt-3">
                                    Max. file size: 5MB • JPG, PNG, PDF
                                </p>
                            </div>

                        </div>

   @error('payment_proof')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
                        <!-- File Preview -->
                      <div id="filePreview" class="mt-4 hidden">
    <div class="bg-green-50 border border-green-300 rounded-xl p-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center">
                    <i class="fas fa-file-invoice text-green-600"></i>
                </div>
                <div>
                    <div class="font-medium text-gray-800" id="fileName">File uploaded</div>
                    <div class="text-xs text-gray-600" id="fileSize">-</div>
                </div>
            </div>
            <button type="button" id="removeFile" class="text-red-500 hover:text-red-700">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- PREVIEW GAMBAR -->
        <img id="imagePreview" src="" alt="" class="mt-3 rounded-lg max-h-40 hidden">
    </div>
</div>

                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-7 border-t border-gray-100">
                    <a href="{{ route('emergency.step1') }}"
                        class="flex-1 bg-gradient-to-r from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 text-gray-800 font-semibold py-4 px-4 rounded-xl border border-gray-300 transition flex items-center justify-center gap-2">
                        <i class="fas fa-arrow-left"></i>
                        Back to Form
                    </a>
                    <button type="submit" id="confirmPayment"
                        class="flex-1 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-semibold py-4 px-4 rounded-xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <i class="fas fa-paper-plane"></i>
                        Submit Payment Proof
                    </button>
                </div>
            </form>
        </div>
    </div>

<script>
    const uploadButton = document.getElementById("uploadButton");
    const fileInput = document.getElementById("paymentProof");
    const uploadArea = document.getElementById("fileUploadArea");
    const imagePreview = document.getElementById("imagePreview");

    // Klik tombol atau area → buka file picker
    uploadButton.addEventListener("click", () => fileInput.click());

    // Event saat file dipilih
    fileInput.addEventListener("change", function () {
        const file = this.files[0];
        if (!file) return;

        // Tampilkan info file
        document.getElementById("filePreview").classList.remove("hidden");
        document.getElementById("fileName").textContent = file.name;
        document.getElementById("fileSize").textContent =
            (file.size / 1024).toFixed(1) + " KB";

        // Jika file adalah gambar → tampilkan preview
        if (file.type.startsWith("image/")) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imagePreview.classList.remove("hidden");
            };
            reader.readAsDataURL(file);
        } else {
            // Jika bukan gambar → sembunyikan preview image
            imagePreview.classList.add("hidden");
            imagePreview.src = "";
        }
    });

    // Hapus file
    document.getElementById("removeFile").addEventListener("click", function () {
        fileInput.value = "";
        imagePreview.classList.add("hidden");
        imagePreview.src = "";
        document.getElementById("filePreview").classList.add("hidden");
    });
</script>


@endsection
