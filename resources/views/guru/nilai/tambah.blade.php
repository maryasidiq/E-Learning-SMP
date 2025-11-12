@extends('layouts.app2')
@section('pageTitle', 'Tambah Nilai')
@section('title', 'Tambah Nilai')
@section('content')
    <div class="w-full">
        <!-- Header -->
        <div class="bg-brand-500 text-gray-200 px-6 py-4 rounded-t-xl">
            <h3 class="text-lg font-semibold">Tambah Nilai Baru</h3>
        </div>

        <!-- Body -->
        <div class="bg-white dark:bg-gray-900 shadow rounded-b-xl p-6 space-y-6">
            <!-- Info Kelas -->
            <div>
                <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                    <tbody>
                        <tr>
                            <td class="py-1 w-48 font-medium">Nama Kelas</td>
                            <td class="py-1 w-4">:</td>
                            <td class="py-1">{{ $kelas->pluck('nama_kelas')->join(', ') }}</td>
                        </tr>
                        <tr>
                            <td class="py-1 font-medium">Wali Kelas</td>
                            <td class="py-1">:</td>
                            <td class="py-1">{{ $kelas->pluck('guru.nama_guru')->join(', ') }}</td>
                        </tr>
                        <tr>
                            <td class="py-1 font-medium">Jumlah Siswa</td>
                            <td class="py-1">:</td>
                            <td class="py-1">{{ $siswa->count() }}</td>
                        </tr>
                        <tr>
                            <td class="py-1 font-medium">Mata Pelajaran</td>
                            <td class="py-1">:</td>
                            <td class="py-1">{{ $mapel->mapel->nama_mapel }}</td>
                        </tr>
                        <tr>
                            <td class="py-1 font-medium">Guru Mata Pelajaran</td>
                            <td class="py-1">:</td>
                            <td class="py-1">{{ $guru->nama_guru }}</td>
                        </tr>
                        @php
                            $bulan = date('m');
                            $tahun = date('Y');
                        @endphp
                        <tr>
                            <td class="py-1 font-medium">Semester</td>
                            <td class="py-1">:</td>
                            <td class="py-1">{{ $bulan > 6 ? 'Semester Ganjil' : 'Semester Genap' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Back Button -->
            <div class="flex gap-4">
                <a href="{{ route('nilai.show', $mapel->mapel_id) }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Kembali
                </a>
            </div>

            <!-- Form Tambah Nilai -->
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg mt-4">
                <h4 class="text-lg font-semibold mb-4">Form Tambah Nilai</h4>
                <form id="add-nilai-form" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="form-group">
                        <label for="judul_nilai" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama
                            Nilai</label>
                        <select
                            class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            id="judul_nilai" name="judul_nilai" required>
                            <option value="">Pilih atau Ketik Nama Nilai</option>
                            <option value="UTS">UTS</option>
                            <option value="UAS">UAS</option>
                            <option value="Tugas">Tugas</option>
                            <option value="Quiz">Quiz</option>
                            <option value="Praktikum">Praktikum</option>
                        </select>
                        <input type="text" id="judul_nilai_custom"
                            class="form-control mt-2 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Atau ketik nama nilai custom" style="display: none;">
                    </div>
                    <div class="form-group">
                        <label for="bobot" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bobot
                            Nilai</label>
                        <input type="number"
                            class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            id="bobot" name="bobot" min="1" value="1" required>
                    </div>
                    <div class="form-group">
                        <label for="sumber" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sumber Nilai</label>
                        <select
                            class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            id="sumber" name="sumber" required>
                            <option value="manual">Manual</option>
                            <option value="soal">Dari Soal</option>
                        </select>
                    </div>
                    <div class="form-group flex items-end">
                        <button type="submit" id="tambah-nilai-btn"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Tambah Nilai
                        </button>
                    </div>
                    <div class="form-group md:col-span-2 lg:col-span-4" id="manual-input" style="display: block;">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nilai Manual untuk Semua
                            Siswa</label>
                        <div class="mt-2 space-y-2" id="manual-nilai-inputs">
                            @foreach($siswa as $s)
                                <div class="flex items-center space-x-2">
                                    <label class="w-32 text-sm">{{ $s->nama_siswa }}</label>
                                    <input type="number"
                                        class="form-control flex-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                        name="nilai_manual[{{ $s->id }}]" min="0" max="100" placeholder="Nilai">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group md:col-span-2 lg:col-span-4" id="soal-input" style="display: none;">
                        <label for="soal" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilih
                            Soal</label>
                        <select
                            class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            id="soal" name="soal">
                            <option value="">Pilih Soal</option>
                            @foreach(\App\Soal::where('mapel_id', $mapel->mapel_id)->get() as $soal)
                                <option value="{{ $soal->id }}">{{ $soal->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Toggle input fields based on sumber selection
        document.getElementById('sumber').addEventListener('change', function () {
            if (this.value === 'manual') {
                document.getElementById('manual-input').style.display = 'block';
                document.getElementById('soal-input').style.display = 'none';
            } else {
                document.getElementById('manual-input').style.display = 'none';
                document.getElementById('soal-input').style.display = 'block';
            }
        });

        // Handle judul_nilai selection
        document.getElementById('judul_nilai').addEventListener('change', function () {
            const customInput = document.getElementById('judul_nilai_custom');
            if (this.value === '') {
                customInput.style.display = 'block';
                customInput.required = true;
                this.required = false; // Remove required from select when custom input is shown
            } else {
                customInput.style.display = 'none';
                customInput.required = false;
                customInput.value = '';
                this.required = true; // Ensure select is required when custom input is hidden
            }
        });

        // Handle form submission for adding nilai
        document.getElementById('add-nilai-form').addEventListener('submit', function (e) {
            e.preventDefault();

            // Disable button to prevent double submission
            const submitBtn = document.getElementById('tambah-nilai-btn');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Menyimpan...';

            let judulNilai = document.getElementById('judul_nilai').value;
            const customJudul = document.getElementById('judul_nilai_custom').value;
            if (judulNilai === '' && customJudul) {
                judulNilai = customJudul;
            }
            const bobot = document.getElementById('bobot').value;
            const sumber = document.getElementById('sumber').value;
            const soal = document.getElementById('soal').value;

            // Check if judul_nilai is provided either from select or custom input
            if (!judulNilai && !customJudul) {
                alert('Harap isi nama nilai.');
                submitBtn.disabled = false;
                submitBtn.textContent = 'Tambah Nilai';
                return;
            }

            if (!bobot || !sumber) {
                alert('Harap isi semua field yang diperlukan.');
                submitBtn.disabled = false;
                submitBtn.textContent = 'Tambah Nilai';
                return;
            }

            if (sumber === 'soal' && !soal) {
                alert('Harap pilih soal.');
                submitBtn.disabled = false;
                submitBtn.textContent = 'Tambah Nilai';
                return;
            }

            // Prepare data for all siswa
            const data = [];
                                    {{ $siswa->pluck('id')->toJson() }}.forEach(siswaId => {
                let nilai = 0;
                if (sumber === 'manual') {
                    // Get nilai from individual inputs
                    const nilaiInput = document.querySelector(`input[name="nilai_manual[${siswaId}]"]`);
                    nilaiInput.removeAttribute('required');
                    nilai = parseFloat(nilaiInput.value) || 0;
                } else {
                    // For soal, we'll need to get nilai from soal in the controller
                    // For now, set to 0 and let controller handle it
                    nilai = 0;
                }
                data.push({
                    siswa_id: siswaId,
                    mapel_id: {{ $mapel->mapel_id }},
                    judul_nilai: judulNilai,
                    nilai: nilai,
                    sumber: sumber,
                    bobot: parseInt(bobot) || 1,
                    soal: soal
                });
            });

            // Send AJAX to save
            fetch('{{ route("nilai.store") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        toastr.success(result.success);
                        // Redirect back to nilai page
                        window.location.href = '{{ route("nilai.show", $mapel->mapel_id) }}';
                    } else {
                        toastr.error(result.error);
                        submitBtn.disabled = false;
                        submitBtn.textContent = 'Tambah Nilai';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    toastr.error('Terjadi kesalahan saat menyimpan data');
                    submitBtn.disabled = false;
                    submitBtn.textContent = 'Tambah Nilai';
                });
        });
    </script>
@endsection