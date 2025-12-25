@extends('layouts.app2')
@section('pageTitle', 'Tambah Soal ')
@section('title', 'Tambah Soal ')
@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div
            class="bg-gradient-to-br from-blue-600 via-purple-700 to-indigo-800 dark:from-blue-800 dark:via-purple-900 dark:to-indigo-900 rounded-2xl p-8 mb-8 text-white shadow-2xl relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent"></div>
            <div class="relative z-10 flex items-center justify-between">
                <div class="animate-fade-in">
                    <h1
                        class="text-4xl font-extrabold mb-3 bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent">
                        Tambah Soal</h1>
                    <p class="text-blue-100 text-xl font-medium">Tambahkan soal baru untuk {{ $soal->judul }}</p>
                    <div class="mt-4 flex items-center space-x-4">
                        <div class="flex items-center bg-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm font-medium">Form Tambah Soal</span>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block animate-bounce-slow">
                    <div class="relative">
                        <svg class="w-20 h-20 text-white/80 drop-shadow-lg" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                        <div
                            class="absolute -top-2 -right-2 w-6 h-6 bg-yellow-400 rounded-full flex items-center justify-center">
                            <svg class="w-3 h-3 text-yellow-800" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Container -->
        <div class="max-w-7xl mx-auto">
            <div
                class="bg-white dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 shadow-xl overflow-hidden">
                <div class="p-8">
                    <!-- Form untuk jumlah soal -->
                    <div id="jumlah_soal_form" class="mb-6">
                        <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                            <div class="mb-4">
                                <label for="jumlah_soal"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Jumlah
                                    Soal yang Akan Dibuat</label>
                                <input type="number" id="jumlah_soal" name="jumlah_soal" min="1" max="50"
                                    value="{{ old('jumlah_soal', 1) }}"
                                    class="mt-1 block w-full border-gray-300
                                                                                                                                                                dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500
                                                                                                                                                                focus:border-blue-500">
                                @error('jumlah_soal')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="excel_file"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Upload
                                    Excel
                                    untuk Generate Soal Otomatis (Opsional)</label>
                                <input type="file" id="excel_file" name="excel_file" accept=".xlsx,.xls"
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <p class="mt-1 text-sm text-gray-500">Upload Excel dengan format soal manual (kolom: tipe,
                                    pertanyaan,
                                    pilihan_a, pilihan_b, pilihan_c, pilihan_d, pilihan_e, jawaban_benar, bobot)
                                </p>
                                @error('excel_file')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                                <!-- Tombol Buat Form Soal Manual -->
                                <button type="button" onclick="generateSoalForm()" class="group w-full inline-flex items-center justify-center px-6 py-4
                               bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600
                               hover:from-blue-700 hover:via-purple-700 hover:to-indigo-700
                               border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest
                               shadow-lg hover:shadow-xl
                               focus:ring-4 focus:ring-blue-500/25 focus:ring-offset-2
                               transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-0.5
                               relative overflow-hidden">

                                    <div class="absolute inset-0 bg-gradient-to-r
                                    from-white/0 via-white/10 to-white/0
                                    -translate-x-full group-hover:translate-x-full
                                    transition-transform duration-700"></div>

                                    <svg class="w-5 h-5 mr-2 relative z-10" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4"></path>
                                    </svg>

                                    <span class="relative z-10">Buat Form Soal Manual</span>
                                </button>

                                <!-- Tombol Generate dari Excel -->
                                <button type="button" onclick="generateSoalFromExcel()" class="group w-full inline-flex items-center justify-center px-6 py-4
                               bg-gradient-to-r from-green-600 to-emerald-600
                               hover:from-green-700 hover:to-emerald-700
                               border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest
                               shadow-lg hover:shadow-xl
                               focus:ring-4 focus:ring-green-500/25 focus:ring-offset-2
                               transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-0.5
                               relative overflow-hidden">

                                    <div class="absolute inset-0 bg-gradient-to-r
                                    from-white/0 via-white/10 to-white/0
                                    -translate-x-full group-hover:translate-x-full
                                    transition-transform duration-700"></div>

                                    <svg class="w-5 h-5 mr-2 relative z-10" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>

                                    <span class="relative z-10">Generate dari Excel</span>
                                </button>

                            </div>

                        </div>
                    </div>

                    <!-- Form soal dinamis -->
                    <form id="soal_form" action="{{ route('soal.store-soal', Crypt::encrypt($soal->id)) }}" method="POST"
                        enctype="multipart/form-data" style="display: none;">
                        @csrf

                        <div id="soal_container">
                            <!-- Soal akan di-generate di sini -->
                        </div>

                        <!-- Footer Actions -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-8">
                            <!-- Tombol Simpan Semua Soal -->
                            <button type="submit"
                                class="group bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 hover:from-blue-700 hover:via-purple-700 hover:to-indigo-700 border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest shadow-lg hover:shadow-xl focus:ring-4 focus:ring-blue-500/25 focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-0.5 relative overflow-hidden">

                                <!-- Shine -->
                                <div class="absolute inset-0 bg-gradient-to-r 
                                    from-white/0 via-white/10 to-white/0
                                    -translate-x-full group-hover:translate-x-full
                                    transition-transform duration-700"></div>

                                <span class="relative z-10 flex items-center justify-center px-6 py-4">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Simpan Semua Soal
                                </span>
                            </button>
                            <!-- Tombol Kembali -->
                            <a href="{{ route('soal.show', Crypt::encrypt($soal->id)) }}" class="group bg-gradient-to-r from-gray-600 to-gray-700 
                               hover:from-gray-700 hover:to-gray-800
                               border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest
                               shadow-lg hover:shadow-xl
                               focus:ring-4 focus:ring-gray-500/25 focus:ring-offset-2
                               transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-0.5
                               relative overflow-hidden">

                                <!-- Shine -->
                                <div class="absolute inset-0 bg-gradient-to-r 
                                    from-white/0 via-white/10 to-white/0
                                    -translate-x-full group-hover:translate-x-full
                                    transition-transform duration-700"></div>

                                <span class="relative z-10 flex items-center justify-center px-6 py-4">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                    </svg>
                                    Kembali
                                </span>
                            </a>
                        </div>

                    </form>
                </div>

                <script>
                    function generateSoalForm() {
                        const jumlahSoal = parseInt(document.getElementById('jumlah_soal').value);
                        if (!jumlahSoal || jumlahSoal < 1 || jumlahSoal > 50) {
                            alert('Masukkan jumlah soal antara 1-50');
                            return;
                        }

                        const container = document.getElementById('soal_container');
                        container.innerHTML = '';

                        for (let i = 1; i <= jumlahSoal; i++) {
                            const soalDiv = document.createElement('div');
                            soalDiv.className = 'mb-8 bg-gray-50 dark:bg-gray-800 p-4 rounded-lg';
                            soalDiv.innerHTML = `
                                                                                                                                                                                                            <h3 class="text-lg font-semibold mb-4 dark:text-gray-300">Soal ${i}</h3>

                                                                                                                                                                                                            <div class="mb-4">
                                                                                                                                                                                                                <label for="tipe_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipe Soal</label>
                                                                                                                                                                                                                <select id="tipe_${i}" name="soal[${i}][tipe]"
                                                                                                                                                                                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                                                                                                                                                                                    required onchange="toggleOptions(${i})">
                                                                                    <option value="">Pilih Tipe Soal</option>
                                                                                    <option value="pilihan_ganda">Pilihan Ganda</option>
                                                                                    <option value="essay">Essay</option>
                                                                                    <option value="tugas">Tugas (Upload File)</option>
                                                                                                                                                                                                                </select>
                                                                                                                                                                                                            </div>

                                                                                                                                            <div class="mb-4">
                                                                                                                                                <label for="pertanyaan_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pertanyaan</label>
                                                                                                                                                <textarea id="pertanyaan_${i}" name="soal[${i}][pertanyaan]" rows="4"
                                                                                                                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor"
                                                                                                                                                    required></textarea>
                                                                                                                                            </div>

                                                                                                                                            <div class="mb-4">
                                                                                                                                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gambar (Opsional - Maksimal 4)</label>
                                                                                                                                                <div id="gambar_container_${i}" class="space-y-2">
                                                                                                                                                    <div class="flex items-center space-x-2">
                                                                                                                                                        <input type="file" id="gambar_${i}_1" name="soal[${i}][gambar][]" accept="image/*"
                                                                                                                                                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                                                                                                                        <button type="button" onclick="addGambar(${i})" class="px-3 py-1 bg-blue-500 text-white rounded text-sm">+</button>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <p class="mt-1 text-sm text-gray-500">Format: JPG, PNG, GIF. Maksimal 2MB per gambar</p>
                                                                                                                                            </div>

                                                                                                                                                                                                            <div id="pilihan_ganda_options_${i}" class="mb-4" style="display: none;">
                                                                                                                                                                                                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pilihan Jawaban</label>

                                                                                                                                                                                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                                                                                                                <div>
                                                                                                                                                    <label for="pilihan_a_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan A</label>
                                                                                                                                                    <textarea id="pilihan_a_${i}" name="soal[${i}][pilihan_a]" rows="2"
                                                                                                                                                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor"></textarea>
                                                                                                                                                </div>

                                                                                                                                                <div>
                                                                                                                                                    <label for="pilihan_b_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan B</label>
                                                                                                                                                    <textarea id="pilihan_b_${i}" name="soal[${i}][pilihan_b]" rows="2"
                                                                                                                                                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor"></textarea>
                                                                                                                                                </div>

                                                                                                                                                <div>
                                                                                                                                                    <label for="pilihan_c_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan C</label>
                                                                                                                                                    <textarea id="pilihan_c_${i}" name="soal[${i}][pilihan_c]" rows="2"
                                                                                                                                                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor"></textarea>
                                                                                                                                                </div>

                                                                                                                                                <div>
                                                                                                                                                    <label for="pilihan_d_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan D</label>
                                                                                                                                                    <textarea id="pilihan_d_${i}" name="soal[${i}][pilihan_d]" rows="2"
                                                                                                                                                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor"></textarea>
                                                                                                                                                </div>

                                                                                                                                                <div>
                                                                                                                                                    <label for="pilihan_e_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan E (Opsional)</label>
                                                                                                                                                    <textarea id="pilihan_e_${i}" name="soal[${i}][pilihan_e]" rows="2"
                                                                                                                                                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor"></textarea>
                                                                                                                                                </div>

                                                                                                                                                                                                                    <div>
                                                                                                                                                                                                                        <label for="jawaban_benar_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jawaban Benar</label>
                                                                                                                                                                                                                        <select id="jawaban_benar_${i}" name="soal[${i}][jawaban_benar]"
                                                                                                                                                                                                                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                                                                                                                                                                                            <option value="">Pilih Jawaban Benar</option>
                                                                                                                                                                                                                            <option value="a">A</option>
                                                                                                                                                                                                                            <option value="b">B</option>
                                                                                                                                                                                                                            <option value="c">C</option>
                                                                                                                                                                                                                            <option value="d">D</option>
                                                                                                                                                                                                                            <option value="e">E</option>
                                                                                                                                                                                                                        </select>
                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>

                                                                                                                                                                                                            <div class="mb-4">
                                                                                                                                                                                                                <label for="bobot_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bobot Nilai</label>
                                                                                                                                                                                                                <input type="number" id="bobot_${i}" name="soal[${i}][bobot]" value="1" min="1"
                                                                                                                                                                                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                                                                                                                                                                                    required>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        `;
                            container.appendChild(soalDiv);
                        }

                        document.getElementById('jumlah_soal_form').style.display = 'none';
                        document.getElementById('soal_form').style.display = 'block';
                        reinitializeCKEditor(); // Reinitialize CKEditor for dynamically added content
                    }

                    function generateSoalFromExcel() {
                        const excelFile = document.getElementById('excel_file').files[0];
                        const jumlahSoal = parseInt(document.getElementById('jumlah_soal').value);

                        if (!excelFile) {
                            alert('Pilih file Excel terlebih dahulu');
                            return;
                        }

                        if (!jumlahSoal || jumlahSoal < 1 || jumlahSoal > 50) {
                            alert('Masukkan jumlah soal antara 1-50');
                            return;
                        }

                        // Show loading
                        const button = document.querySelector('button[onclick="generateSoalFromExcel()"]');
                        const originalText = button.innerHTML;
                        button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Memproses...';
                        button.disabled = true;

                        const formData = new FormData();
                        const csrf = @json($csrf);
                        formData.append('excel_file', excelFile);
                        formData.append('jumlah_soal', jumlahSoal);
                        formData.append('_token', csrf);

                        fetch('/guru/soal/generate-soal-excel', {
                            method: 'POST',
                            body: formData
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success && data.cache_key) {
                                    // Start polling for results
                                    pollForResults(data.cache_key);
                                } else {
                                    alert('Error: ' + (data.message || 'Terjadi kesalahan'));
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('Terjadi kesalahan saat memproses Excel');
                            })
                            .finally(() => {
                                button.innerHTML = originalText;
                                button.disabled = false;
                            });
                    }

                    function populateSoalForm(soalData) {
                        const container = document.getElementById('soal_container');
                        container.innerHTML = '';

                        soalData.forEach((soal, index) => {
                            const i = index + 1;
                            const soalDiv = document.createElement('div');
                            soalDiv.className = 'mb-8 bg-gray-50 dark:bg-gray-800 p-4 rounded-lg';
                            soalDiv.innerHTML = `
                                                                                                                                                                                                            <h3 class="text-lg font-semibold mb-4 dark:text-gray-300">Soal ${i}</h3>

                                                                                                                                                                                                            <div class="mb-4">
                                                                                                                                                                                                                <label for="tipe_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipe Soal</label>
                                                                                                                                                                                                                <select id="tipe_${i}" name="soal[${i}][tipe]"
                                                                                                                                                                                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                                                                                                                                                                                    required onchange="toggleOptions(${i})">
                                                                                <option value="">Pilih Tipe Soal</option>
                                                                                <option value="pilihan_ganda" ${soal.tipe === 'pilihan_ganda' ? 'selected' : ''}>Pilihan Ganda</option>
                                                                                <option value="essay" ${soal.tipe === 'essay' ? 'selected' : ''}>Essay</option>
                                                                                <option value="tugas" ${soal.tipe === 'tugas' ? 'selected' : ''}>Tugas (Upload File)</option>
                                                                                                                                                                                                                </select>
                                                                                                                                                                                                            </div>

                                                                                                                                                                                            <div class="mb-4">
                                                                                                                                                                                                <label for="pertanyaan_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pertanyaan</label>
                                                                                                                                                                                                <textarea id="pertanyaan_${i}" name="soal[${i}][pertanyaan]" rows="4"
                                                                                                                                                                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor"
                                                                                                                                                                                                    required>${soal.pertanyaan || ''}</textarea>
                                                                                                                                                                                            </div>

                                                                                                                                                                                                <div class="mb-4">
                                                                                                                                                                                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gambar (Opsional - Maksimal 4)</label>
                                                                                                                                                                                                    <div id="gambar_container_excel_${i}" class="space-y-2">
                                                                                                                                                                                                        <div class="flex items-center space-x-2">
                                                                                                                                                                                                            <input type="file" id="gambar_excel_${i}_1" name="soal[${i}][gambar][]" accept="image/*"
                                                                                                                                                                                                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                                                                                                                                                                            <button type="button" onclick="addGambarExcel(${i})" class="px-3 py-1 bg-blue-500 text-white rounded text-sm">+</button>
                                                                                                                                                                                                        </div>
                                                                                                                                                                                                    </div>
                                                                                                                                                                                                    <p class="mt-1 text-sm text-gray-500">Format: JPG, PNG, GIF. Maksimal 2MB per gambar</p>
                                                                                                                                                                                                </div>

                                                                                                                                                                                                            <div id="pilihan_ganda_options_${i}" class="mb-4" style="display: ${soal.tipe === 'pilihan_ganda' ? 'block' : 'none'};">
                                                                                                                                                                                                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pilihan Jawaban</label>

                                                                                                                                                                                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                                                                                                                                                                        <div>
                                                                                                                                                                                                            <label for="pilihan_a_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan A</label>
                                                                                                                                                                                                            <textarea id="pilihan_a_${i}" name="soal[${i}][pilihan_a]" rows="2"
                                                                                                                                                                                                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor">${soal.pilihan_a || ''}</textarea>
                                                                                                                                                                                                        </div>

                                                                                                                                                                                                        <div>
                                                                                                                                                                                                            <label for="pilihan_b_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan B</label>
                                                                                                                                                                                                            <textarea id="pilihan_b_${i}" name="soal[${i}][pilihan_b]" rows="2"
                                                                                                                                                                                                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor">${soal.pilihan_b || ''}</textarea>
                                                                                                                                                                                                        </div>

                                                                                                                                                                                                        <div>
                                                                                                                                                                                                            <label for="pilihan_c_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan C</label>
                                                                                                                                                                                                            <textarea id="pilihan_c_${i}" name="soal[${i}][pilihan_c]" rows="2"
                                                                                                                                                                                                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor">${soal.pilihan_c || ''}</textarea>
                                                                                                                                                                                                        </div>

                                                                                                                                                                                                        <div>
                                                                                                                                                                                                            <label for="pilihan_d_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan D</label>
                                                                                                                                                                                                            <textarea id="pilihan_d_${i}" name="soal[${i}][pilihan_d]" rows="2"
                                                                                                                                                                                                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor">${soal.pilihan_d || ''}</textarea>
                                                                                                                                                                                                        </div>

                                                                                                                                                                                                        <div>
                                                                                                                                                                                                            <label for="pilihan_e_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan E (Opsional)</label>
                                                                                                                                                                                                            <textarea id="pilihan_e_${i}" name="soal[${i}][pilihan_e]" rows="2"
                                                                                                                                                                                                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor">${soal.pilihan_e || ''}</textarea>
                                                                                                                                                                                                        </div>

                                                                                                                                                                                                                    <div>
                                                                                                                                                                                                                        <label for="jawaban_benar_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jawaban Benar</label>
                                                                                                                                                                                                                        <select id="jawaban_benar_${i}" name="soal[${i}][jawaban_benar]"
                                                                                                                                                                                                                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                                                                                                                                                                                            <option value="">Pilih Jawaban Benar</option>
                                                                                                                                                                                                                            <option value="a" ${soal.jawaban_benar === 'a' ? 'selected' : ''}>A</option>
                                                                                                                                                                                                                            <option value="b" ${soal.jawaban_benar === 'b' ? 'selected' : ''}>B</option>
                                                                                                                                                                                                                            <option value="c" ${soal.jawaban_benar === 'c' ? 'selected' : ''}>C</option>
                                                                                                                                                                                                                            <option value="d" ${soal.jawaban_benar === 'd' ? 'selected' : ''}>D</option>
                                                                                                                                                                                                                            <option value="e" ${soal.jawaban_benar === 'e' ? 'selected' : ''}>E</option>
                                                                                                                                                                                                                        </select>
                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                </div>
                                                                                                                                                                                                            </div>

                                                                                                                                                                                                            <div class="mb-4">
                                                                                                                                                                                                                <label for="bobot_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bobot Nilai</label>
                                                                                                                                                                                                                <input type="number" id="bobot_${i}" name="soal[${i}][bobot]" value="${soal.bobot || 1}" min="1"
                                                                                                                                                                                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                                                                                                                                                                                    required>
                                                                                                                                                                                                            </div>
                                                                                                                                                                                                        `;
                            container.appendChild(soalDiv);
                        });

                        document.getElementById('jumlah_soal_form').style.display = 'none';
                        document.getElementById('soal_form').style.display = 'block';
                        reinitializeCKEditor(); // Reinitialize CKEditor for dynamically added content
                    }

                    function pollForResults(cacheKey) {
                        const button = document.querySelector('button[onclick="generateSoalFromExcel()"]');
                        const csrf = @json($csrf);
                        const originalText = button.innerHTML;
                        button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Memproses...';
                        button.disabled = true;

                        // Check immediately since processing is now synchronous
                        fetch('/guru/soal/check-generate-status', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrf
                            },
                            body: JSON.stringify({ cache_key: cacheKey })
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success && data.soal) {
                                    populateSoalForm(data.soal);
                                    button.innerHTML = originalText;
                                    button.disabled = false;
                                } else {
                                    alert('Error: ' + (data.message || 'Terjadi kesalahan'));
                                    button.innerHTML = originalText;
                                    button.disabled = false;
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('Terjadi kesalahan saat memeriksa status');
                                button.innerHTML = originalText;
                                button.disabled = false;
                            });
                    }

                    function toggleOptions(soalIndex) {
                        const tipe = document.getElementById(`tipe_${soalIndex}`).value;
                        const options = document.getElementById(`pilihan_ganda_options_${soalIndex}`);
                        if (tipe === 'pilihan_ganda') {
                            options.style.display = 'block';
                        } else {
                            options.style.display = 'none';
                        }
                    }

                    function addGambar(soalIndex) {
                        const container = document.getElementById(`gambar_container_${soalIndex}`);
                        const inputs = container.querySelectorAll('input[type="file"]');
                        if (inputs.length >= 4) {
                            alert('Maksimal 4 gambar per soal');
                            return;
                        }

                        const newIndex = inputs.length + 1;
                        const div = document.createElement('div');
                        div.className = 'flex items-center space-x-2';
                        div.innerHTML = `
                                                                                                        <input type="file" id="gambar_${soalIndex}_${newIndex}" name="soal[${soalIndex}][gambar][]" accept="image/*"
                                                                                                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                                                                        <button type="button" onclick="removeGambar(this)" class="px-3 py-1 bg-red-500 text-white rounded text-sm">-</button>
                                                                                                    `;
                        container.appendChild(div);
                    }

                    function addGambarExcel(soalIndex) {
                        const container = document.getElementById(`gambar_container_excel_${soalIndex}`);
                        const inputs = container.querySelectorAll('input[type="file"]');
                        if (inputs.length >= 4) {
                            alert('Maksimal 4 gambar per soal');
                            return;
                        }

                        const newIndex = inputs.length + 1;
                        const div = document.createElement('div');
                        div.className = 'flex items-center space-x-2';
                        div.innerHTML = `
                                                                                                        <input type="file" id="gambar_excel_${soalIndex}_${newIndex}" name="soal[${soalIndex}][gambar][]" accept="image/*"
                                                                                                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                                                                        <button type="button" onclick="removeGambar(this)" class="px-3 py-1 bg-red-500 text-white rounded text-sm">-</button>
                                                                                                    `;
                        container.appendChild(div);
                    }

                    function removeGambar(button) {
                        button.parentElement.remove();
                    }
                </script>

                <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
                <script>
                    let ckEditors = [];

                    // Function to initialize CKEditor for all ckeditor class elements
                    function initializeCKEditor() {
                        document.querySelectorAll('.ckeditor').forEach(function (element) {
                            // Check if CKEditor is already initialized on this element
                            if (!element.classList.contains('ck-editor__editable')) {
                                ClassicEditor
                                    .create(element, {
                                        toolbar: ['bold', 'italic', 'underline', '|', 'bulletedList', '|', 'undo', 'redo'],
                                        ckfinder: {
                                            uploadUrl: '/admin/upload-image' // You can configure this later for image uploads
                                        }
                                    })
                                    .then(editor => {
                                        ckEditors.push(editor);
                                        // Sync data to textarea on change
                                        editor.model.document.on('change:data', () => {
                                            if (editor.sourceElement) {
                                                editor.sourceElement.value = editor.getData();
                                            }
                                        });
                                        // Initial sync
                                        if (editor.sourceElement) {
                                            editor.sourceElement.value = editor.getData();
                                        }
                                    })
                                    .catch(error => {
                                        console.error(error);
                                    });
                            }
                        });
                    }

                    // Initialize CKEditor on page load
                    document.addEventListener('DOMContentLoaded', function () {
                        initializeCKEditor();

                        // Sync CKEditor content to textareas on form submit
                        const form = document.getElementById('soal_form');
                        if (form) {
                            form.addEventListener('submit', function (e) {
                                ckEditors.forEach(editor => {
                                    if (editor.sourceElement) {
                                        editor.sourceElement.value = editor.getData();
                                    }
                                });
                            });
                        }
                    });

                    // Also initialize when content is dynamically added
                    function reinitializeCKEditor() {
                        setTimeout(initializeCKEditor, 100); // Small delay to ensure DOM is updated
                    }
                </script>
@endsection