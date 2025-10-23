@extends('layouts.app2')
@section('pageTitle', 'Tambah Latihan')
@section('title', 'Tambah Latihan')
@section('content')
    <div class="max-w-4xl mx-auto bg-white dark:bg-white/[0.03] rounded-xl border border-gray-200 dark:border-gray-800 p-6">
        <h1 class="text-2xl mb-6 dark:text-gray-300">Tambah Latihan Baru</h1>

        <form action="{{ route('latihan.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul Latihan</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul') }}"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
                @error('judul')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="3"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{!! old('deskripsi') !!}</textarea>
                @error('deskripsi')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="mapel_kelas" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mata Pelajaran
                    dan Kelas</label>
                <select id="mapel_kelas" name="mapel_kelas"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
                    <option value="">Pilih Mata Pelajaran dan Kelas</option>
                    @foreach($mapelKelas as $item)
                        <option value="{{ $item->mapel_id }}-{{ $item->kelas_id }}" {{ old('mapel_kelas') == $item->mapel_id . '-' . $item->kelas_id ? 'selected' : '' }}>{{ $item->nama_mapel }} - {{ $item->nama_kelas }}</option>
                    @endforeach
                </select>
                @error('mapel_kelas')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="waktu_mulai" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Waktu
                        Mulai</label>
                    <input type="datetime-local" id="waktu_mulai" name="waktu_mulai" value="{{ old('waktu_mulai') }}"
                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                    @error('waktu_mulai')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="waktu_selesai" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Waktu
                        Selesai</label>
                    <input type="datetime-local" id="waktu_selesai" name="waktu_selesai" value="{{ old('waktu_selesai') }}"
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
                <h2 class="text-xl font-semibold mb-4 dark:text-gray-300">Soal Latihan</h2>

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

                        <div class="flex space-x-2">
                            <button type="button" onclick="generateSoalForm()"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Tambah Soal Manual
                            </button>
                            <button type="button" onclick="skipSoal()"
                                class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Lewati (Buat Latihan Tanpa Soal)
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

            <div class="flex items-center justify-between">
                <a href="{{ route('latihan.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Kembali
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Simpan Latihan
                </button>
            </div>
        </form>
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
                                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                                    required></textarea>
                                                            </div>

                                                            <div id="pilihan_ganda_options_${index}" class="mb-4" style="display: none;">
                                                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pilihan Jawaban</label>

                                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                                    <div>
                                                                        <label for="pilihan_a_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan A</label>
                                                                        <input type="text" id="pilihan_a_${index}" name="soal[${index}][pilihan_a]"
                                                                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                                    </div>

                                                                    <div>
                                                                        <label for="pilihan_b_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan B</label>
                                                                        <input type="text" id="pilihan_b_${index}" name="soal[${index}][pilihan_b]"
                                                                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                                    </div>

                                                                    <div>
                                                                        <label for="pilihan_c_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan C</label>
                                                                        <input type="text" id="pilihan_c_${index}" name="soal[${index}][pilihan_c]"
                                                                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                                    </div>

                                                                    <div>
                                                                        <label for="pilihan_d_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan D</label>
                                                                        <input type="text" id="pilihan_d_${index}" name="soal[${index}][pilihan_d]"
                                                                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                                    </div>

                                                                    <div>
                                                                        <label for="pilihan_e_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan E (Opsional)</label>
                                                                        <input type="text" id="pilihan_e_${index}" name="soal[${index}][pilihan_e]"
                                                                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
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
    </script>
@endsection