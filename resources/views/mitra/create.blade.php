@extends('components.page')
@section('content')
{{-- link js sweetalert --}}
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

<main class="container-extra-wide mx-auto px-8 py-6 mobile-padding">
    <div class="w-full form-container">
        <div class="bg-white rounded-xl shadow-2xl overflow-hidden">

            <!-- Header -->
            <div class="bg-blue-500 p-6 text-white">
                <div class="flex items-center space-x-3">
                    <div class="bg-white bg-opacity-20 p-3 rounded-full">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Add New Rental Partner</h2>
                        <p class="text-blue-100">Fill out the form below correctly</p>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('mitra.store') }}" method="POST" class="p-6 space-y-6">
                @csrf

                <!-- Partner Information -->
                <div class="bg-gray-50 p-6 rounded-xl">
                    <h3 class="text-xl font-semibold mb-4 flex items-center">
                        <i class="fas fa-user-circle text-blue-500 mr-2"></i> Partner Information
                    </h3>

                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-4">

                        <!-- Name -->
                        <div>
                            <label class="block font-medium mb-1">Full Name <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-user absolute left-3 top-3 text-gray-400"></i>
                                <input type="text" name="nama" value="{{ old('nama') }}"
                                    class="pl-10 w-full px-4 py-2 border rounded-lg"
                                    placeholder="Enter full name">
                            </div>
                            @error('nama')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <label class="block font-medium mb-1">Phone/WhatsApp Number <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <i class="fas fa-phone absolute left-3 top-3 text-gray-400"></i>
                                <input type="tel" name="no_hp" value="{{ old('no_hp') }}"
                                    class="pl-10 w-full px-4 py-2 border rounded-lg {{ $errors->has('no_hp') ? 'border-red-500' : 'border-gray-300' }}"
                                    placeholder="081234567890">
                            </div>
                            @error('no_hp')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 mt-4">

                        <!-- Email -->
                        <div>
                            <label class="block font-medium mb-1">Email</label>
                            <div class="relative">
                                <i class="fas fa-envelope absolute left-3 top-3 text-gray-400"></i>
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="pl-10 w-full px-4 py-2 border rounded-lg {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}"
                                    placeholder="email@example.com">
                            </div>
                            @error('email')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Company -->
                        <div>
                            <label class="block font-medium mb-1">Company</label>
                            <div class="relative">
                                <i class="fas fa-building absolute left-3 top-3 text-gray-400"></i>
                                <input type="text" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}"
                                    class="pl-10 w-full px-4 py-2 border rounded-lg "
                                    placeholder="Company name (optional)">
                            </div>
                        </div>

                    </div>

                    <!-- Address -->
                    <div class="mt-4">
                        <label class="block font-medium mb-1">Address <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <i class="fas fa-map-marker-alt absolute left-3 top-3 text-gray-400"></i>
                            <textarea name="alamat" rows="3"
                                class="pl-10 w-full px-4 py-2 border rounded-lg "
                                placeholder="Enter complete address">{{ old('alamat') }}</textarea>
                        </div>
                        @error('alamat')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Vehicle Information -->
                <div class="bg-gray-50 p-6 rounded-xl border-t-4 border-blue-500">
                    <h3 class="text-xl font-semibold mb-4 flex items-center">
                        <i class="fas fa-car text-blue-500 mr-2"></i> Vehicle Information
                    </h3>

                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-4">

                        <!-- Vehicle Type -->
                        <div>
                            <label class="block font-medium mb-1">Vehicle Type <span class="text-red-500">*</span></label>
                            <select name="jenis_kendaraan"
                                class="w-full px-4 py-2 border rounded-lg ">
                                <option value="">Select Type</option>
                                <option value="mobil" {{ old('jenis_kendaraan') == 'mobil' ? 'selected' : '' }}>Car</option>
                                <option value="motor" {{ old('jenis_kendaraan') == 'motor' ? 'selected' : '' }}>Motorcycle</option>
                            </select>
                            @error('jenis_kendaraan')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Vehicle Name -->
                        <div>
                            <label class="block font-medium mb-1">Vehicle Name <span class="text-red-500">*</span></label>
                            <input type="text" name="nama_kendaraan" value="{{ old('nama_kendaraan') }}"
                                class="w-full px-4 py-2 border rounded-lg {{ $errors->has('nama_kendaraan') ? 'border-red-500' : 'border-gray-300' }}"
                                placeholder="Toyota Avanza / Honda Vario">
                            @error('nama_kendaraan')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="mt-4">
                        <label class="block font-medium mb-1">Rental Price / Day</label>
                        <input type="number" name="harga_sewa" value="{{ old('harga_sewa') }}"
                            class="w-full px-4 py-2 border rounded-lg" placeholder="0">
                    </div>

                    <!-- Description -->
                    <div class="mt-4">
                        <label class="block font-medium mb-1">Description</label>
                        <textarea name="deskripsi" rows="3"
                            class="w-full px-4 py-2 border rounded-lg">{{ old('deskripsi') }}</textarea>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end gap-4 pt-4">
                    <a href="{{ route('index') }}" class="px-6 py-3 border rounded-lg text-blue-500 hover:bg-blue-100">
                        <i class="fas fa-times mr-2"></i> Cancel
                    </a>
                    <button type="submit"
                        class="px-6 py-3 rounded-lg bg-blue-500 text-white hover:bg-blue-600">
                        <i class="fas fa-save mr-2"></i> Save
                    </button>
                </div>

            </form>
        </div>
    </div>
</main>

<style>
.container-extra-wide {
    max-width: 99%;
}
@media (min-width: 1280px) {
    .container-extra-wide {
        max-width: 1800px;
    }
}
.form-container {
    max-width: none;
}
/* Responsiveness Improvements for Small Screens */
@media (max-width: 400px) {
    .container-extra-wide {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }
    .mobile-padding {
        padding-left: 0.75rem;
        padding-right: 0.75rem;
    }
    .mobile-text {
        font-size: 0.875rem;
    }
    .mobile-input {
        font-size: 16px; /* Prevents zoom on iOS */
        padding-top: 0.75rem;
        padding-bottom: 0.75rem;
        height: auto;
    }
    .mobile-button {
        width: 100%;
        margin-bottom: 0.5rem;
        padding-top: 0.75rem;
        padding-bottom: 0.75rem;
        font-size: 0.875rem;
    }
    .mobile-grid {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }
    .mobile-label {
        font-size: 0.875rem;
    }
    .mobile-textarea {
        min-height: 80px;
        font-size: 16px; /* Prevents zoom on iOS */
    }
    .mobile-header {
        padding: 1rem;
    }
    .mobile-header h2 {
        font-size: 1.25rem;
    }
    .mobile-header p {
        font-size: 0.8rem;
    }
    .mobile-section {
        padding: 1rem;
    }
    .mobile-section h3 {
        font-size: 1.125rem;
    }
    .mobile-icon {
        font-size: 1rem;
    }
}
</style>

@endsection
