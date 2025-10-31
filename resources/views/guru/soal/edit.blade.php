@extends('layouts.app2')
@section('pageTitle', 'Edit Soal')
@section('title', 'Edit Soal')
@section('content')
    <div class="max-w-4xl mx-auto bg-white dark:bg-white/[0.03] rounded-xl border border-gray-200 dark:border-gray-800 p-6">
        <h1 class="text-2xl mb-6 dark:text-gray-300">Edit Soal</h1>

        <form id="formSoal" action="{{ route('soal.update', Crypt::encrypt($soal->id)) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul Soal</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul', $soal->judul) }}"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
                @error('judul')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="3"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{!! old('deskripsi', $soal->deskripsi) !!}</textarea>
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
                        <option value="{{ $item->mapel_id }}-{{ $item->kelas_id }}" {{ old('mapel_kelas', $soal->mapel_id . '-' . $soal->kelas_id) == $item->mapel_id . '-' . $item->kelas_id ? 'selected' : '' }}>
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
                    <label for="waktu_mulai" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Waktu
                        Mulai</label>
                    <input type="datetime-local" id="waktu_mulai" name="waktu_mulai"
                        value="{{ old('waktu_mulai', \Carbon\Carbon::parse($soal->waktu_mulai)->format('Y-m-d\TH:i')) }}"
                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                    @error('waktu_mulai')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="waktu_selesai" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Waktu
                        Selesai</label>
                    <input type="datetime-local" id="waktu_selesai" name="waktu_selesai"
                        value="{{ old('waktu_selesai', \Carbon\Carbon::parse($soal->waktu_selesai)->format('Y-m-d\TH:i')) }}"
                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                    @error('waktu_selesai')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="durasi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Durasi
                        (menit)</label>
                    <input type="number" id="durasi" name="durasi" value="{{ old('durasi', $soal->durasi) }}" min="1"
                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                    @error('durasi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Section untuk mengelola soal -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-4 dark:text-gray-300">Kelola Soal</h2>

                <!-- Existing Soal -->
                @if($soalDetail->count() > 0)
                    <div class="mb-6">
                        <h3 class="text-lg font-medium mb-4 dark:text-gray-300">Soal yang Ada</h3>
                        @foreach($soalDetail as $index => $s)
                            <div class="mb-8 bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                                <div class="flex justify-between items-center mb-4">
                                    <a href="{{ route('soal.edit-soal', [Crypt::encrypt($soal->id), Crypt::encrypt($s->id)]) }}"
                                        class="text-md font-semibold dark:text-gray-300 hover:text-blue-500">Soal
                                        {{ $index + 1 }}</a>
                                    <button type="button" onclick="deleteSoal(event, {{ $s->id }})"
                                        class="inline-flex items-center px-3 py-1 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        Hapus
                                    </button>
                                </div>

                                <input type="hidden" name="existing_soal[{{ $index + 1 }}][id]" value="{{ $s->id }}">

                                <div class="mb-4">
                                    <label for="existing_tipe_{{ $index + 1 }}"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipe Soal</label>
                                    <select id="existing_tipe_{{ $index + 1 }}" name="existing_soal[{{ $index + 1 }}][tipe]"
                                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        required onchange="toggleExistingOptions({{ $index + 1 }})">
                                        <option value="pilihan_ganda" {{ $s->tipe == 'pilihan_ganda' ? 'selected' : '' }}>Pilihan
                                            Ganda</option>
                                        <option value="essay" {{ $s->tipe == 'essay' ? 'selected' : '' }}>Essay</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="existing_pertanyaan_{{ $index + 1 }}"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pertanyaan</label>
                                    <textarea id="existing_pertanyaan_{{ $index + 1 }}"
                                        name="existing_soal[{{ $index + 1 }}][pertanyaan]" rows="4"
                                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        required>{{ $s->pertanyaan }}</textarea>
                                </div>

                                <div id="existing_pilihan_ganda_options_{{ $index + 1 }}" class="mb-4"
                                    style="display: {{ $s->tipe == 'pilihan_ganda' ? 'block' : 'none' }};">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pilihan
                                        Jawaban</label>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label for="existing_pilihan_a_{{ $index + 1 }}"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan A</label>
                                            <input type="text" id="existing_pilihan_a_{{ $index + 1 }}"
                                                name="existing_soal[{{ $index + 1 }}][pilihan_a]" value="{{ $s->pilihan_a }}"
                                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        </div>

                                        <div>
                                            <label for="existing_pilihan_b_{{ $index + 1 }}"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan B</label>
                                            <input type="text" id="existing_pilihan_b_{{ $index + 1 }}"
                                                name="existing_soal[{{ $index + 1 }}][pilihan_b]" value="{{ $s->pilihan_b }}"
                                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        </div>

                                        <div>
                                            <label for="existing_pilihan_c_{{ $index + 1 }}"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan C</label>
                                            <input type="text" id="existing_pilihan_c_{{ $index + 1 }}"
                                                name="existing_soal[{{ $index + 1 }}][pilihan_c]" value="{{ $s->pilihan_c }}"
                                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        </div>

                                        <div>
                                            <label for="existing_pilihan_d_{{ $index + 1 }}"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan D</label>
                                            <input type="text" id="existing_pilihan_d_{{ $index + 1 }}"
                                                name="existing_soal[{{ $index + 1 }}][pilihan_d]" value="{{ $s->pilihan_d }}"
                                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        </div>

                                        <div>
                                            <label for="existing_pilihan_e_{{ $index + 1 }}"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan E
                                                (Opsional)</label>
                                            <input type="text" id="existing_pilihan_e_{{ $index + 1 }}"
                                                name="existing_soal[{{ $index + 1 }}][pilihan_e]" value="{{ $s->pilihan_e }}"
                                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        </div>

                                        <div>
                                            <label for="existing_jawaban_benar_{{ $index + 1 }}"
                                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jawaban
                                                Benar</label>
                                            <select id="existing_jawaban_benar_{{ $index + 1 }}"
                                                name="existing_soal[{{ $index + 1 }}][jawaban_benar]"
                                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                <option value="">Pilih Jawaban Benar</option>
                                                <option value="a" {{ $s->jawaban_benar == 'a' ? 'selected' : '' }}>A</option>
                                                <option value="b" {{ $s->jawaban_benar == 'b' ? 'selected' : '' }}>B</option>
                                                <option value="c" {{ $s->jawaban_benar == 'c' ? 'selected' : '' }}>C</option>
                                                <option value="d" {{ $s->jawaban_benar == 'd' ? 'selected' : '' }}>D</option>
                                                <option value="e" {{ $s->jawaban_benar == 'e' ? 'selected' : '' }}>E</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gambar (Opsional -
                                        Maksimal 4)</label>
                                    <div id="existing_gambar_container_{{ $index + 1 }}" class="space-y-2">
                                        @if($s->gambar && is_array($s->gambar))
                                            @foreach($s->gambar as $gambarIndex => $gambar)
                                                @if($gambar)
                                                    <div class="flex items-center space-x-2 p-2 border rounded">
                                                        <img src="{{ asset('storage/' . $gambar) }}" alt="Gambar Soal {{ $gambarIndex + 1 }}"
                                                            class="max-w-xs h-auto rounded-lg border">
                                                        <button type="button"
                                                            onclick="removeExistingGambar(this, {{ $index + 1 }}, {{ $gambarIndex }})"
                                                            class="px-3 py-1 bg-red-500 text-white rounded text-sm hover:bg-red-600">Hapus</button>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                        <div id="new_gambar_container_{{ $index + 1 }}">
                                            <!-- New image inputs will be added here -->
                                        </div>
                                        <button type="button" onclick="addExistingGambar({{ $index + 1 }})"
                                            class="mt-2 px-3 py-1 bg-blue-500 text-white rounded text-sm hover:bg-blue-600">Tambah
                                            Gambar Baru</button>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">Format: JPG, PNG, GIF. Maksimal 2MB per gambar</p>
                                </div>

                                <div class="mb-4">
                                    <label for="existing_bobot_{{ $index + 1 }}"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bobot Nilai</label>
                                    <input type="number" id="existing_bobot_{{ $index + 1 }}"
                                        name="existing_soal[{{ $index + 1 }}][bobot]" value="{{ $s->bobot }}" min="1"
                                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Form untuk menambah soal baru -->
                <div id="new_soal_section">
                    <h3 class="text-lg font-medium mb-4 dark:text-gray-300">Tambah Soal Baru</h3>

                    <div id="jumlah_soal_form" class="mb-6">
                        <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                            <div class="mb-4">
                                <label for="jumlah_soal"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Jumlah
                                    Soal Baru yang Akan Ditambahkan</label>
                                <input type="number" id="jumlah_soal" name="jumlah_soal" min="1" max="50"
                                    value="{{ old('jumlah_soal', 1) }}"
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @error('jumlah_soal')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex space-x-2">
                                <button type="button" onclick="generateNewSoalForm()"
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Tambah Soal Baru
                                </button>
                                <button type="button" onclick="skipNewSoal()"
                                    class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Lewati
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Form soal baru dinamis -->
                    <div id="new_soal_form_section" style="display: none;">
                        <div id="new_soal_container">
                            <!-- Soal baru akan di-generate di sini -->
                        </div>

                        <div class="mt-4">
                            <button type="button" onclick="addAnotherNewSoal()"
                                class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Tambah Soal Lagi
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('soal.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Kembali
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Update Soal
                </button>
            </div>
        </form>
    </div>

    <script>
        let newSoalIndex = 0;

        function deleteSoal(event, soalId) {
            if (confirm('Apakah Anda yakin ingin menghapus soal ini?')) {
                // Add to delete array
                let deleteInput = document.createElement('input');
                deleteInput.type = 'hidden';
                deleteInput.name = 'delete_soal[]';
                deleteInput.value = soalId;
                document.querySelector('form').appendChild(deleteInput);

                // Hide the soal div
                event.target.closest('.mb-8').style.display = 'none';
            }
        }

        function generateNewSoalForm() {
            const jumlahSoal = parseInt(document.getElementById('jumlah_soal').value);
            if (!jumlahSoal || jumlahSoal < 1 || jumlahSoal > 50) {
                alert('Masukkan jumlah soal antara 1-50');
                return;
            }

            const container = document.getElementById('new_soal_container');
            container.innerHTML = '';

            for (let i = 1; i <= jumlahSoal; i++) {
                addNewSoalToContainer(i);
            }

            document.getElementById('jumlah_soal_form').style.display = 'none';
            document.getElementById('new_soal_form_section').style.display = 'block';
        }

        function addNewSoalToContainer(index) {
            const container = document.getElementById('new_soal_container');
            const soalDiv = document.createElement('div');
            soalDiv.className = 'mb-8 bg-gray-50 dark:bg-gray-800 p-4 rounded-lg';
            soalDiv.innerHTML = `
                                                                                                                                                    <h4 class="text-md font-semibold mb-4 dark:text-gray-300">Soal Baru ${index}</h4>

                                                                                                                                                    <div class="mb-4">
                                                                                                                                                        <label for="new_tipe_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipe Soal</label>
                                                                                                                                                        <select id="new_tipe_${index}" name="soal[${index}][tipe]"
                                                                                                                                                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                                                                                                                            required onchange="toggleNewOptions(${index})">
                                                                                                                                                            <option value="">Pilih Tipe Soal</option>
                                                                                                                                                            <option value="pilihan_ganda">Pilihan Ganda</option>
                                                                                                                                                            <option value="essay">Essay</option>
                                                                                                                                                        </select>
                                                                                                                                                    </div>

                                                                                                                                                    <div class="mb-4">
                                                                                                                                                        <label for="new_pertanyaan_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pertanyaan</label>
                                                                                                                                                        <textarea id="new_pertanyaan_${index}" name="soal[${index}][pertanyaan]" rows="4"
                                                                                                                                                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                                                                                                                            required></textarea>
                                                                                                                                                    </div>

                                                                                                                                                    <div id="new_pilihan_ganda_options_${index}" class="mb-4" style="display: none;">
                                                                                                                                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pilihan Jawaban</label>

                                                                                                                                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                                                                                                                            <div>
                                                                                                                                                                <label for="new_pilihan_a_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan A</label>
                                                                                                                                                                <input type="text" id="new_pilihan_a_${index}" name="soal[${index}][pilihan_a]"
                                                                                                                                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                                                                                                                            </div>

                                                                                                                                                            <div>
                                                                                                                                                                <label for="new_pilihan_b_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan B</label>
                                                                                                                                                                <input type="text" id="new_pilihan_b_${index}" name="soal[${index}][pilihan_b]"
                                                                                                                                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                                                                                                                            </div>

                                                                                                                                                            <div>
                                                                                                                                                                <label for="new_pilihan_c_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan C</label>
                                                                                                                                                                <input type="text" id="new_pilihan_c_${index}" name="soal[${index}][pilihan_c]"
                                                                                                                                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                                                                                                                            </div>

                                                                                                                                                            <div>
                                                                                                                                                                <label for="new_pilihan_d_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan D</label>
                                                                                                                                                                <input type="text" id="new_pilihan_d_${index}" name="soal[${index}][pilihan_d]"
                                                                                                                                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                                                                                                                            </div>

                                                                                                                                                            <div>
                                                                                                                                                                <label for="new_pilihan_e_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan E (Opsional)</label>
                                                                                                                                                                <input type="text" id="new_pilihan_e_${index}" name="soal[${index}][pilihan_e]"
                                                                                                                                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                                                                                                                            </div>

                                                                                                                                                            <div>
                                                                                                                                                                <label for="new_jawaban_benar_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jawaban Benar</label>
                                                                                                                                                                <select id="new_jawaban_benar_${index}" name="soal[${index}][jawaban_benar]"
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
                                                                                                                                                        <label for="new_bobot_${index}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bobot Nilai</label>
                                                                                                                                                        <input type="number" id="new_bobot_${index}" name="soal[${index}][bobot]" value="1" min="1"
                                                                                                                                                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                                                                                                                                            required>
                                                                                                                                                    </div>
                                                                                                                                                `;
            container.appendChild(soalDiv);
            newSoalIndex = index;
        }

        function addAnotherNewSoal() {
            newSoalIndex++;
            addNewSoalToContainer(newSoalIndex);
        }

        function skipNewSoal() {
            document.getElementById('jumlah_soal_form').style.display = 'none';
            document.getElementById('new_soal_form_section').style.display = 'none';
        }

        function toggleExistingOptions(soalIndex) {
            const tipe = document.getElementById(`existing_tipe_${soalIndex}`).value;
            const options = document.getElementById(`existing_pilihan_ganda_options_${soalIndex}`);
            if (tipe === 'pilihan_ganda') {
                options.style.display = 'block';
            } else {
                options.style.display = 'none';
            }
        }

        function toggleNewOptions(soalIndex) {
            const tipe = document.getElementById(`new_tipe_${soalIndex}`).value;
            const options = document.getElementById(`new_pilihan_ganda_options_${soalIndex}`);
            if (tipe === 'pilihan_ganda') {
                options.style.display = 'block';
            } else {
                options.style.display = 'none';
            }
        }

        function removeExistingGambar(button, soalIndex, gambarIndex) {
            if (confirm('Apakah Anda yakin ingin menghapus gambar ini?')) {
                // Add to delete array
                let deleteInput = document.createElement('input');
                deleteInput.type = 'hidden';
                deleteInput.name = `existing_soal[${soalIndex}][delete_gambar][]`;
                deleteInput.value = gambarIndex;
                document.getElementById('formSoal').appendChild(deleteInput);

                // Hide the image and button
                button.style.display = 'none';
                button.closest('.flex.items-center').querySelector('img').style.display = 'none';
                button.closest('.flex.items-center').querySelector('input[type="file"]').required = false;
            }
        }

        function addExistingGambar(soalIndex) {
            const container = document.getElementById(`new_gambar_container_${soalIndex}`);
            const allInputs = document.querySelectorAll(`input[name="existing_soal[${soalIndex}][gambar][]"]`);
            const currentInputs = allInputs.length;

            if (currentInputs >= 4) {
                alert('Maksimal 4 gambar per soal');
                return;
            }

            const newInputDiv = document.createElement('div');
            newInputDiv.className = 'flex items-center space-x-2 mt-2';
            newInputDiv.innerHTML = `
                                        <input type="file" name="existing_soal[${soalIndex}][gambar][]" accept="image/*"
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
@endsection