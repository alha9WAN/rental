@extends('components.page')
@section('content')

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

    /* Perbaikan Responsivitas untuk Layar Kecil */
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
            font-size: 16px; /* Mencegah zoom pada iOS */
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
            font-size: 16px; /* Mencegah zoom pada iOS */
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

<main class="container-extra-wide mx-auto px-8 py-6 mobile-padding">
    <div class="w-full form-container">
        <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
            <!-- Header Form -->
            <div class="bg-blue-500 p-6 text-white mobile-header">
                <div class="flex items-center space-x-3">
                    <div class="bg-white bg-opacity-20 p-3 rounded-full">
                        <i class="fas fa-user-plus mobile-icon"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold mobile-text">Tambah Mitra Rental Baru</h2>
                        <p class="text-blue-100 text-base mt-1 mobile-text">Isi formulir di bawah ini untuk menambahkan mitra rental baru ke dalam sistem</p>
                    </div>
                </div>
            </div>

            <!-- Form Content -->
            <form id="form-mitra" class="p-6 space-y-6 mobile-section">
                <!-- Informasi Dasar -->
                <div class="bg-gray-50 p-6 rounded-xl mobile-section">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center mobile-text">
                        <i class="fas fa-user-circle text-blue-500 mr-2 mobile-icon"></i>
                        Informasi Dasar Mitra
                    </h3>
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 mobile-grid">
                        <!-- Nama -->
                        <div>
                            <label for="nama" class="block text-base font-medium text-gray-700 mb-1 flex items-center mobile-label">
                                Nama Lengkap
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-user text-gray-400 mobile-icon"></i>
                                </div>
                                <input type="text" id="nama" name="nama" required
                                       class="pl-10 w-full px-4 py-2 text-sm border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 mobile-input"
                                       placeholder="Masukkan nama lengkap mitra">
                            </div>
                        </div>

                        <!-- No HP -->
                        <div>
                            <label for="no_hp" class="block text-base font-medium text-gray-700 mb-1 flex items-center mobile-label">
                                Nomor HP/WhatsApp
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-phone text-gray-400 mobile-icon"></i>
                                </div>
                                <input type="tel" id="no_hp" name="no_hp" required
                                       class="pl-10 w-full px-4 py-2 text-sm border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 mobile-input"
                                       placeholder="Contoh: 081234567890">
                            </div>
                        </div>
                    </div>

                    <!-- Email dan Perusahaan -->
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 mt-4 mobile-grid">
                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-base font-medium text-gray-700 mb-1 flex items-center mobile-label">
                                Email
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400 mobile-icon"></i>
                                </div>
                                <input type="email" id="email" name="email"
                                       class="pl-10 w-full px-4 py-2 text-sm border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 mobile-input"
                                       placeholder="contoh@email.com">
                            </div>
                        </div>

                        <!-- Perusahaan -->
                        <div>
                            <label for="perusahaan" class="block text-base font-medium text-gray-700 mb-1 flex items-center mobile-label">
                                Nama Perusahaan
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-building text-gray-400 mobile-icon"></i>
                                </div>
                                <input type="text" id="perusahaan" name="perusahaan"
                                       class="pl-10 w-full px-4 py-2 text-sm border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 mobile-input"
                                       placeholder="Nama perusahaan (jika ada)">
                            </div>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="mt-4">
                        <label for="alamat" class="block text-base font-medium text-gray-700 mb-1 flex items-center mobile-label">
                            Alamat Lengkap
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute top-2 left-3 pointer-events-none">
                                <i class="fas fa-map-marker-alt text-gray-400 mobile-icon"></i>
                            </div>
                            <textarea id="alamat" name="alamat" rows="3" required
                                      class="pl-10 w-full px-4 py-2 text-sm border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 mobile-textarea"
                                      placeholder="Masukkan alamat lengkap mitra"></textarea>
                        </div>
                    </div>
                </div>

                <!-- Informasi Kendaraan -->
                <div class="bg-gray-50 p-6 rounded-xl border-t-4 border-blue-500 mobile-section">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4 flex items-center mobile-text">
                        <i class="fas fa-car text-blue-500 mr-2 mobile-icon"></i>
                        Informasi Kendaraan
                    </h3>

                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 mobile-grid">
                        <!-- Jenis Kendaraan -->
                        <div>
                            <label for="jenis_kendaraan" class="block text-base font-medium text-gray-700 mb-1 flex items-center mobile-label">
                                Jenis Kendaraan
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-list text-gray-400 mobile-icon"></i>
                                </div>
                                <select id="jenis_kendaraan" name="jenis_kendaraan" required
                                        class="pl-10 w-full px-4 py-2 text-sm border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 appearance-none mobile-input">
                                    <option value="">Pilih Jenis Kendaraan</option>
                                    <option value="mobil">Mobil</option>
                                    <option value="motor">Motor</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                    <i class="fas fa-chevron-down text-gray-400 mobile-icon"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Nama Kendaraan -->
                        <div>
                            <label for="nama_kendaraan" class="block text-base font-medium text-gray-700 mb-1 flex items-center mobile-label">
                                Nama/Merk Kendaraan
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-car text-gray-400 mobile-icon"></i>
                                </div>
                                <input type="text" id="nama_kendaraan" name="nama_kendaraan" required
                                       class="pl-10 w-full px-4 py-2 text-sm border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 mobile-input"
                                       placeholder="Contoh: Toyota Avanza, Honda Vario">
                            </div>
                        </div>
                    </div>

                    <!-- Harga Sewa -->
                    <div class="mt-4">
                        <label for="harga_sewa" class="block text-base font-medium text-gray-700 mb-1 flex items-center mobile-label">
                            Harga Sewa (per hari)
                        </label>
                        <div class="relative rounded-lg shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-money-bill-wave text-gray-400 mobile-icon"></i>
                            </div>
                            <div class="absolute inset-y-0 left-10 flex items-center pointer-events-none">
                                <span class="text-gray-500 text-sm mobile-text">Rp</span>
                            </div>
                            <input type="number" id="harga_sewa" name="harga_sewa" step="0.01" min="0"
                                   class="pl-16 w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 mobile-input"
                                   placeholder="0.00">
                        </div>
                        <p class="mt-1 text-xs text-gray-500 mobile-text">Masukkan harga sewa per hari dalam Rupiah</p>
                    </div>

                    <!-- Deskripsi -->
                    <div class="mt-4">
                        <label for="deskripsi" class="block text-base font-medium text-gray-700 mb-1 flex items-center mobile-label">
                            Deskripsi Kendaraan
                        </label>
                        <div class="relative">
                            <div class="absolute top-1 left-3 pointer-events-none">
                                <i class="fas fa-file-alt text-gray-400 mobile-icon"></i>
                            </div>
                            <textarea id="deskripsi" name="deskripsi" rows="3"
                                      class="pl-10 w-full px-4 py-2 text-sm border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 mobile-textarea"
                                      placeholder="Deskripsi tambahan tentang kendaraan"></textarea>
                        </div>
                    </div>
                </div>

             <!-- Tombol Aksi -->
<div class="flex flex-col sm:flex-row justify-center sm:justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-4">
    <button type="button" id="btn-batal" class="px-6 py-3 border border-blue-500 rounded-lg shadow-sm text-sm font-medium text-blue-500 bg-white hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300 flex items-center justify-center mobile-button">
        <i class="fas fa-times mr-2 mobile-icon"></i>
        Batal
    </button>
    <button type="submit" class="px-6 py-3 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300 flex items-center justify-center mobile-button">
        <i class="fas fa-save mr-2 mobile-icon"></i>
        Simpan Data Mitra
    </button>
</div>
            </form>
        </div>
    </div>
</main>

@endsection
