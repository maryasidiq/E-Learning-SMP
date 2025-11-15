@extends('layouts.app2')
@section('pageTitle', 'Tambah Soal')
@section('title', 'Tambah Soal')
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
                        Tambah Soal Baru</h1>
                    <p class="text-blue-100 text-xl font-medium">Buat soal baru untuk siswa Anda</p>
                    <div class="mt-4 flex items-center space-x-4">
                        <div class="flex items-center bg-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm font-medium">Form Pembuatan Soal</span>
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
        <div
            class="bg-white dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 shadow-xl overflow-hidden">
            <div class="p-8">
                <form action="{{ route('soal.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="judul" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul
                            Soal</label>
                        <input type="text" id="judul" name="judul" value="{{ old('judul') }}"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                        @error('judul')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="3"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{!! old('deskripsi') !!}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="mapel_kelas" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mata
                            Pelajaran
                            dan Kelas</label>
                        <select id="mapel_kelas" name="mapel_kelas"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                            required>
                            <option value="">Pilih Mata Pelajaran dan Kelas</option>
                            @foreach($mapelKelas as $item)
                                <option value="{{ $item->mapel_id }}-{{ $item->kelas_id }}" {{ old('mapel_kelas') == $item->mapel_id . '-' . $item->kelas_id ? 'selected' : '' }}>
                                    {{ $item->nama_mapel }} - {{ $item->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                        @error('mapel_kelas')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mb-4">
                        <div>
                            <label for="waktu_mulai"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Waktu
                                Mulai</label>
                            <input type="datetime-local" id="waktu_mulai" name="waktu_mulai"
                                value="{{ old('waktu_mulai') }}"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                required>
                            @error('waktu_mulai')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="waktu_selesai"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Waktu
                                Selesai</label>
                            <input type="datetime-local" id="waktu_selesai" name="waktu_selesai"
                                value="{{ old('waktu_selesai') }}"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                required>
                            @error('waktu_selesai')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="durasi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Durasi
                                (menit)</label>
                            <input type="number" id="durasi" name="durasi" value="{{ old('durasi') }}" min="1"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                required>
                            @error('durasi')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Section untuk menambah soal -->
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold mb-4 dark:text-gray-300">Soal</h2>

                        <!-- Form untuk jumlah soal -->
                        <div id="jumlah_soal_form" class="mb-6">
                            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                                <div class="mb-4">
                                    <label for="jumlah_soal"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Jumlah
                                        Soal yang Akan Dibuat (Opsional)</label>
                                    <input type="number" id="jumlah_soal" name="jumlah_soal" min="1" max="50"
                                        value="{{ old('jumlah_soal', 1) }}"
                                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                    @error('jumlah_soal')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="flex flex-col sm:flex-row sm:space-x-2 space-y-2 sm:space-y-0">

                                    <button type="button" onclick="generateSoalForm()" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 
                    bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 
                    hover:from-blue-700 hover:via-purple-700 hover:to-indigo-700 
                    border border-transparent rounded-xl font-bold text-sm text-white uppercase 
                    tracking-widest shadow-lg hover:shadow-xl focus:ring-4 focus:ring-blue-500/25 
                    focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] 
                    hover:-translate-y-0.5 relative overflow-hidden">

                                        <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/10 to-white/0 
                    translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700"></div>

                                        <span class="relative z-10">Tambah Soal Manual</span>
                                    </button>

                                    <button type="button" onclick="skipSoal()" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-3
                    bg-gradient-to-br from-gray-600 via-slate-700 to-gray-800 
                    dark:from-gray-800 dark:via-slate-900 dark:to-gray-900 
                    border border-transparent rounded-md font-semibold text-xs text-white uppercase 
                    tracking-widest hover:from-gray-700 hover:via-slate-800 hover:to-gray-900 
                    focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 
                    transition ease-in-out duration-150 shadow-lg">
                                        Lewati (Buat Soal Tanpa Pertanyaan)
                                    </button>

                                </div>

                            </div>
                        </div>

                        <!-- Form soal dinamis -->
                        <div id="soal_form_section" style="display: none;">
                            <div id="soal_container">
                                <!-- Soal akan di-generate di sini -->
                            </div>

                            <div class="mt-4">
                                <button type="button" onclick="addAnotherSoal()"
                                    class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Tambah Soal Lagi
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons inside form -->
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-between mt-6 space-y-3 sm:space-y-0 sm:space-x-3">

    <a href="{{ route('soal.index') }}"
        class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 
        bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 
        border border-transparent rounded-xl font-bold text-sm text-white uppercase 
        tracking-widest shadow-lg hover:shadow-xl focus:ring-4 focus:ring-gray-500/25 
        focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] 
        hover:-translate-y-0.5 relative overflow-hidden">

        <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/10 to-white/0 
        translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700"></div>

        <svg class="w-5 h-5 mr-3 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>

        <span class="relative z-10">Kembali</span>
    </a>

    <button type="submit"
        class="group w-full inline-flex items-center justify-center px-6 py-4
               bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600
               hover:from-blue-700 hover:via-purple-700 hover:to-indigo-700
               border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest
               shadow-lg hover:shadow-xl
               focus:ring-4 focus:ring-blue-500/25 focus:ring-offset-2
               transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-0.5
               relative overflow-hidden">

        <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/10 to-white/0 
        translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700"></div>

        <svg class="w-5 h-5 mr-3 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 13l4 4L19 7"></path>
        </svg>

        <span class="relative z-10">Simpan Soal</span>
    </button>

</div>

                </form>
            </div>
        </div>


        <script>
            let soalIndex = 0;

            function generateSoalForm() {
                const jumlahSoal = parseInt(document.getElementById('jumlah_soal').value);
                if (!jumlahSoal || jumlahSoal < 1 || jumlahSoal > 50) {
                    alert('Masukkan jumlah soal antara 1-50');
                    return;
                }

                const container = document.getElementById('soal_container');
                container.innerHTML = '';

                for (let i = 1; i <= jumlahSoal; i++) {
                    addSoalToContainer(i);
                }

                document.getElementById('jumlah_soal_form').style.display = 'none';
                document.getElementById('soal_form_section').style.display = 'block';
            }

            function addSoalToContainer(index) {
                const container = document.getElementById('soal_container');
                const soalDiv = document.createElement('div');
                soalDiv.className = 'mb-8 bg-gray-50 dark:bg-gray-800 p-4 rounded-lg';
                soalDiv.innerHTML = `
                                                                                                                                    <h3 class="text-lg font-semibold mb-4 dark:text-gray-300">Soal ${index}</h3>

                                                                                                                                    <div class="mb-4">
                                                                                                                                        <label for="tipe_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipe Soal</label>
                                                                                                                                        <select id="tipe_${index}" name="soal[${index}][tipe]"
                                                                                                                                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                                                                                                            required onchange="toggleOptions(${index})">
                                                                                                                                            <option value="">Pilih Tipe Soal</option>
                                                                                                                                            <option value="pilihan_ganda">Pilihan Ganda</option>
                                                                                                                                            <option value="essay">Essay</option>
                                                                                                                                        </select>
                                                                                                                                    </div>

                                                                                                                                    <div class="mb-4">
                                                                                                                                        <label for="pertanyaan_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pertanyaan</label>
                                                                                                                                        <textarea id="pertanyaan_${index}" name="soal[${index}][pertanyaan]" rows="4"
                                                                                                                                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor"
                                                                                                                                            required></textarea>
                                                                                                                                    </div>

                                                                                                                                    <div id="pilihan_ganda_options_${index}" class="mb-4" style="display: none;">
                                                                                                                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pilihan Jawaban</label>

                                                                                                                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                                                                                                        <div>
                                                                                                                                            <label for="pilihan_a_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan A</label>
                                                                                                                                            <textarea id="pilihan_a_${index}" name="soal[${index}][pilihan_a]" rows="2"
                                                                                                                                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor"></textarea>
                                                                                                                                        </div>

                                                                                                                                        <div>
                                                                                                                                            <label for="pilihan_b_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan B</label>
                                                                                                                                            <textarea id="pilihan_b_${index}" name="soal[${index}][pilihan_b]" rows="2"
                                                                                                                                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor"></textarea>
                                                                                                                                        </div>

                                                                                                                                        <div>
                                                                                                                                            <label for="pilihan_c_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan C</label>
                                                                                                                                            <textarea id="pilihan_c_${index}" name="soal[${index}][pilihan_c]" rows="2"
                                                                                                                                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor"></textarea>
                                                                                                                                        </div>

                                                                                                                                        <div>
                                                                                                                                            <label for="pilihan_d_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan D</label>
                                                                                                                                            <textarea id="pilihan_d_${index}" name="soal[${index}][pilihan_d]" rows="2"
                                                                                                                                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor"></textarea>
                                                                                                                                        </div>

                                                                                                                                        <div>
                                                                                                                                            <label for="pilihan_e_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan E (Opsional)</label>
                                                                                                                                            <textarea id="pilihan_e_${index}" name="soal[${index}][pilihan_e]" rows="2"
                                                                                                                                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor"></textarea>
                                                                                                                                        </div>

                                                                                                                                            <div>
                                                                                                                                                <label for="jawaban_benar_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jawaban Benar</label>
                                                                                                                                                <select id="jawaban_benar_${index}" name="soal[${index}][jawaban_benar]"
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
                                                                                                                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gambar (Opsional -
                                                                                                                                            Maksimal 4)</label>
                                                                                                                                        <div id="gambar_container_${index}" class="space-y-2">
                                                                                                                                            <div id="new_gambar_container_${index}">
                                                                                                                                                <!-- New image inputs will be added here -->
                                                                                                                                            </div>
                                                                                                                                            <button type="button" onclick="addGambar(${index})"
                                                                                                                                                class="mt-2 px-3 py-1 bg-blue-500 text-white rounded text-sm hover:bg-blue-600">Tambah Gambar</button>
                                                                                                                                        </div>
                                                                                                                                        <p class="mt-1 text-sm text-gray-500">Format: JPG, PNG, GIF. Maksimal 2MB per gambar</p>
                                                                                                                                    </div>

                                                                                                                                    <div class="mb-4">
                                                                                                                                        <label for="bobot_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bobot Nilai</label>
                                                                                                                                        <input type="number" id="bobot_${index}" name="soal[${index}][bobot]" value="1" min="1"
                                                                                                                                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                                                                                                            required>
                                                                                                                                    </div>
                                                                                                                                `;
                container.appendChild(soalDiv);
                soalIndex = index;
            }

            function addAnotherSoal() {
                soalIndex++;
                addSoalToContainer(soalIndex);
            }

            function skipSoal() {
                document.getElementById('jumlah_soal_form').style.display = 'none';
                document.getElementById('soal_form_section').style.display = 'none';
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
                const container = document.getElementById(`new_gambar_container_${soalIndex}`);
                const allInputs = document.querySelectorAll(`input[name="soal[${soalIndex}][gambar][]"]`);
                const currentInputs = allInputs.length;

                if (currentInputs >= 4) {
                    alert('Maksimal 4 gambar per soal');
                    return;
                }

                const newInputDiv = document.createElement('div');
                newInputDiv.className = 'flex items-center space-x-2 mt-2';
                newInputDiv.innerHTML = `
                                                                                    <input type="file" name="soal[${soalIndex}][gambar][]" accept="image/*"
                                                                                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                                                    <button type="button" onclick="removeNewGambar(this)"
                                                                                        class="px-3 py-1 bg-red-500 text-white rounded text-sm hover:bg-red-600">Hapus</button>
                                                                                `;
                container.appendChild(newInputDiv);
            }

            function removeNewGambar(button) {
                button.closest('.flex.items-center').remove();
            }
        </script>

        <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
        <script>
            // Initialize CKEditor for all ckeditor class elements
            document.querySelectorAll('.ckeditor').forEach(function (element) {
                ClassicEditor
                    .create(element, {
                        toolbar: ['bold', 'italic', 'underline', '|', 'bulletedList', '|', 'undo', 'redo'],
                        ckfinder: {
                            uploadUrl: '/admin/upload-image' // You can configure this later for image uploads
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    });
            });
        </script>
@endsection