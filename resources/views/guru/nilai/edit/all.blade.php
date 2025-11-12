@extends('layouts.app2')
@section('pageTitle', 'Edit Nilai')
@section('title', 'Edit Nilai')
@section('content')
    <div class="w-full">
        <!-- Header -->
        <div class="bg-brand-500 text-gray-200 px-6 py-4 rounded-t-xl">
            <h3 class="text-lg font-semibold">Edit Nilai Siswa</h3>
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

            <!-- Existing Nilai Table -->
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg mt-4">
                <div class="flex justify-between items-center mb-4">
                    <h4 class="text-lg font-semibold">Edit Nilai Siswa</h4>
                </div>
                @if($existingNilai && $existingNilai->count() > 0)
                    <div class="space-y-6">
                        @foreach($existingNilai as $judul => $nilaiList)
                            <div
                                class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 overflow-hidden">
                                <!-- Nilai Header -->
                                <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-4">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h3 class="text-lg font-semibold">{{ $judul }}</h3>
                                            <p class="text-blue-100">Jumlah Siswa: {{ $nilaiList->count() }}</p>
                                        </div>
                                        <div class="text-right">
                                            <span class="text-sm text-blue-100">Nilai #{{ $loop->iteration }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit Form for this Nilai -->
                                <div class="p-6">
                                    <form class="edit-nilai-form grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6"
                                        data-judul="{{ $judul }}">
                                        @php
                                            $firstNilai = $nilaiList->first()?->first();
                                        @endphp
                                        <div class="form-group">
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama
                                                Nilai</label>
                                            <input type="text"
                                                class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                                value="{{ $judul }}" >
                                        </div>
                                        <div class="form-group">
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bobot
                                                Nilai</label>
                                            <input type="number"
                                                class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 bobot-input"
                                                value="{{ $firstNilai ? $firstNilai->bobot : 1 }}" min="1" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sumber
                                                Nilai</label>
                                            <select
                                                class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sumber-select"
                                                required>
                                                <option value="manual" {{ $firstNilai && $firstNilai->sumber == 'manual' ? 'selected' : '' }}>Manual</option>
                                                <option value="soal" {{ $firstNilai && $firstNilai->sumber == 'soal' ? 'selected' : '' }}>Dari Soal</option>
                                            </select>
                                        </div>

                                        <!-- Manual Input Section -->
                                        <div class="form-group md:col-span-2 lg:col-span-4 manual-input"
                                            style="display: {{ $firstNilai && $firstNilai->sumber == 'manual' ? 'block' : 'none' }};">
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nilai Manual
                                                untuk Semua Siswa</label>
                                            <div class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-2"
                                                id="manual-nilai-inputs-{{ $loop->index }}">
                                                @foreach($siswa as $s)
    @php
        $nilai = $nilaiList[$s->id]->first() ?? null;
    @endphp
    <div class="flex items-center space-x-2">
        <label class="w-32 text-sm font-medium">{{ $s->nama_siswa }}</label>
        <input type="number"
            class="form-control flex-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 nilai-input"
            value="{{ $nilai ? $nilai->nilai : '' }}" min="0" max="100"
            placeholder="Nilai">
    </div>
@endforeach
                                            </div>
                                        </div>

                                        <!-- Soal Input Section -->
                                        <div class="form-group md:col-span-2 lg:col-span-4 soal-input"
                                            style="display: {{ $firstNilai && $firstNilai->sumber == 'soal' ? 'block' : 'none' }};">
                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilih
                                                Soal</label>
                                            <select
                                                class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 soal-select">
                                                <option value="">Pilih Soal</option>
                                                @foreach(\App\Soal::where('mapel_id', $mapel->mapel_id)->get() as $soal)
                                                    <option value="{{ $soal->id }}" {{ $firstNilai && $firstNilai->soal_id == $soal->id ? 'selected' : '' }}>{{ $soal->judul }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-gray-50 dark:bg-gray-800 p-8 rounded-lg text-center">
                        <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-gray-900 dark:text-gray-100">Tidak ada nilai yang dapat diedit
                        </h3>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Belum ada nilai yang dimasukkan untuk mata
                            pelajaran ini.</p>
                    </div>
                @endif
            </div>
            
            <div class="flex gap-4 mt-4">
                <a href="{{ route('nilai.show', $mapel->mapel_id) }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Kembali
                </a>
                @if($existingNilai && $existingNilai->count() > 0)
                    <button id="update-semua-nilai"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Update Semua Nilai
                    </button>
                @endif
            </div>
        </div>
    </div>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    // toggle manual/soal input
    document.querySelectorAll('.sumber-select').forEach(function (select) {
        select.addEventListener('change', function () {
            const form = this.closest('.edit-nilai-form');
            const manualInput = form.querySelector('.manual-input');
            const soalInput = form.querySelector('.soal-input');
            if (this.value === 'manual') {
                manualInput.style.display = 'block';
                soalInput.style.display = 'none';
            } else {
                manualInput.style.display = 'none';
                soalInput.style.display = 'block';
            }
        });
    });

    // =============================
    // 🔹 UPDATE SEMUA NILAI SEKALIGUS
    // =============================
    const updateBtn = document.getElementById('update-semua-nilai');
    if (updateBtn) {
        updateBtn.addEventListener('click', function () {
            // Konfirmasi sebelum update
            const confirmed = confirm('Apakah Anda yakin ingin mengupdate semua nilai?');
            if (!confirmed) return;

            updateBtn.disabled = true;
            updateBtn.textContent = 'Menyimpan...';

            const allData = [];
            const siswaIds = @json($siswa->pluck('id'));

            // Loop semua form nilai
            document.querySelectorAll('.edit-nilai-form').forEach(function (form) {
                const judulBaru = form.querySelector('input[type="text"]').value.trim();
                const judulLama = form.dataset.judul; // judul lama
                const bobot = form.querySelector('.bobot-input').value;
                const sumber = form.querySelector('.sumber-select').value;
                const soal = form.querySelector('.soal-select') ? form.querySelector('.soal-select').value : '';

                form.querySelectorAll('.nilai-input').forEach(function (input, index) {
                    const nilai = parseFloat(input.value) || 0;
                    allData.push({
                        siswa_id: siswaIds[index],
                        mapel_id: {{ $mapel->mapel_id }},
                        judul_lama: judulLama,
                        judul_nilai: judulBaru,
                        nilai: nilai,
                        sumber: sumber,
                        bobot: parseInt(bobot) || 1,
                        soal: soal
                    });
                });
            });

            // Kirim semua data ke backend
            fetch('{{ route("guru.nilai.update.all", $mapel->mapel_id) }}', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(allData)
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    toastr.success(result.success);
                    // Redirect ke halaman nilai setelah sukses
                    setTimeout(() => {
                        window.location.href = '{{ route("nilai.show", $mapel->mapel_id) }}';
                    }, 2000);
                } else {
                    toastr.error(result.error || 'Gagal menyimpan data');
                    updateBtn.disabled = false;
                    updateBtn.textContent = 'Update Semua Nilai';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                toastr.error('Terjadi kesalahan saat menyimpan data');
                updateBtn.disabled = false;
                updateBtn.textContent = 'Update Semua Nilai';
            });
        });
    }
});
</script>

    <!-- <script>
        // Toggle input fields based on sumber selection
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.sumber-select').forEach(function (select) {
                select.addEventListener('change', function () {
                    const form = this.closest('.edit-nilai-form');
                    const manualInput = form.querySelector('.manual-input');
                    const soalInput = form.querySelector('.soal-input');
                    if (this.value === 'manual') {
                        manualInput.style.display = 'block';
                        soalInput.style.display = 'none';
                    } else {
                        manualInput.style.display = 'none';
                        soalInput.style.display = 'block';
                    }
                });
            });

            // Handle form submission for updating nilai
            document.querySelectorAll('.edit-nilai-form').forEach(function (form) {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    const judul = this.dataset.judul;
                    const submitBtn = this.querySelector('.update-nilai-btn');
                    submitBtn.disabled = true;
                    submitBtn.textContent = 'Menyimpan...';

                    const bobot = this.querySelector('.bobot-input').value;
                    const sumber = this.querySelector('.sumber-select').value;
                    const soal = this.querySelector('.soal-select') ? this.querySelector('.soal-select').value : '';

                    // Prepare data for all siswa
                    const data = [];
                    this.querySelectorAll('.nilai-input').forEach(function (input, index) {
                        const siswaId = {{ $siswa->pluck('id')->toJson() }}[index];
                        const nilai = parseFloat(input.value) || 0;
                        data.push({
                            siswa_id: siswaId,
                            mapel_id: {{ $mapel->mapel_id }},
                            judul_nilai: judul,
                            nilai: nilai,
                            sumber: sumber,
                            bobot: parseInt(bobot) || 1,
                            soal: soal
                        });
                    });

                    // Send AJAX to update
                    fetch('{{ route("guru.nilai.update.all", $mapel->mapel_id) }}', {
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
                            } else {
                                toastr.error(result.error);
                            }
                            submitBtn.disabled = false;
                            submitBtn.textContent = 'Update ' + judul;
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            toastr.error('Terjadi kesalahan saat menyimpan data');
                            submitBtn.disabled = false;
                            submitBtn.textContent = 'Update ' + judul;
                        });
                });
            });
        });
    </script> -->
@endsection