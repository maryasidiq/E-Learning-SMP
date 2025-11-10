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

            <!-- Form Edit Nilai -->
            @if($existingNilai && $existingNilai->count() > 0)
                @foreach($existingNilai as $judul => $nilaiData)
                    <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg mt-4">
                        <h4 class="text-lg font-semibold mb-4">Form Edit Nilai: {{ $judul }}</h4>
                        <form id="edit-nilai-form-{{ $loop->index }}" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div class="form-group">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Nilai</label>
                                <input type="text"
                                    class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                    value="{{ $judul }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="bobot-{{ $loop->index }}"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bobot Nilai</label>
                                <input type="number"
                                    class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                    id="bobot-{{ $loop->index }}" name="bobot" min="1"
                                    value="{{ $nilaiData->first()->first()->bobot ?? 1 }}" required>
                            </div>
                            <div class="form-group">
                                <label for="sumber-{{ $loop->index }}"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sumber Nilai</label>
                                <select
                                    class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                    id="sumber-{{ $loop->index }}" name="sumber" required>
                                    <option value="manual" {{ $nilaiData->first()->first()->sumber === 'manual' ? 'selected' : '' }}>
                                        Manual
                                    </option>
                                    <option value="soal" {{ $nilaiData->first()->first()->sumber === 'soal' ? 'selected' : '' }}>Dari
                                        Soal
                                    </option>
                                </select>
                            </div>
                            <div class="form-group flex items-end">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Update Nilai
                                </button>
                            </div>
                            <div class="form-group md:col-span-2 lg:col-span-4" id="manual-input-{{ $loop->index }}"
                                style="display: {{ $nilaiData->first()->first()->sumber === 'manual' ? 'block' : 'none' }};">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nilai Manual untuk Semua
                                    Siswa</label>
                                <div class="mt-2 space-y-2" id="manual-nilai-inputs-{{ $loop->index }}">
                                    @foreach($siswa as $s)
                                        <div class="flex items-center space-x-2">
                                            <label class="w-32 text-sm">{{ $s->nama_siswa }}</label>
                                            <input type="number"
                                                class="form-control flex-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                                name="nilai_manual[{{ $s->id }}]" min="0" max="100" placeholder="Nilai"
                                                value="{{ $nilaiData[$s->id][0]->nilai ?? '' }}" required>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group md:col-span-2 lg:col-span-4" id="soal-input-{{ $loop->index }}"
                                style="display: {{ $nilaiData->first()->first()->sumber === 'soal' ? 'block' : 'none' }};">
                                <label for="soal-{{ $loop->index }}"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilih Soal</label>
                                <select
                                    class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                    id="soal-{{ $loop->index }}" name="soal">
                                    <option value="">Pilih Soal</option>
                                    @foreach(\App\Soal::where('mapel_id', $mapel->mapel_id)->get() as $soal)
                                        <option value="{{ $soal->judul }}" {{ $nilaiData->first()->first()->soal == $soal->judul ? 'selected' : '' }}>{{ $soal->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                @endforeach
            @else
                <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg mt-4">
                    <p class="text-gray-700 dark:text-gray-300">Tidak ada nilai yang dapat diedit.</p>
                </div>
            @endif

            <!-- Existing Nilai Table -->
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg mt-4">
                <h4 class="text-lg font-semibold mb-4">Nilai yang Sudah Ada</h4>
                <div class="overflow-x-auto">
                    <table id="edit-nilai-table"
                        class="min-w-full bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-800">
                            <tr>
                                <th class="px-4 py-2 border">No</th>
                                <th class="px-4 py-2 border">Nama Siswa</th>
                                <th class="px-4 py-2 border">NIS</th>
                                <!-- Dynamic columns will be added here -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswa as $s)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2 border">{{ $s->nama_siswa }}</td>
                                    <td class="px-4 py-2 border">{{ $s->no_induk }}</td>
                                    <!-- More cells will be added dynamically -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="flex gap-4 mt-4">
                <a href="{{ route('nilai.show', $mapel->mapel_id) }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <script>
        // Toggle input fields based on sumber selection for each form
        @if($existingNilai && $existingNilai->count() > 0)
            @foreach($existingNilai as $judul => $nilaiData)
                document.getElementById('sumber-{{ $loop->index }}').addEventListener('change', function () {
                    if (this.value === 'manual') {
                        document.getElementById('manual-input-{{ $loop->index }}').style.display = 'block';
                        document.getElementById('soal-input-{{ $loop->index }}').style.display = 'none';
                    } else {
                        document.getElementById('manual-input-{{ $loop->index }}').style.display = 'none';
                        document.getElementById('soal-input-{{ $loop->index }}').style.display = 'block';
                    }
                });

                // Handle form submission for editing nilai
                document.getElementById('edit-nilai-form-{{ $loop->index }}').addEventListener('submit', function (e) {
                    e.preventDefault();
                    const judulNilai = '{{ $judul }}';
                    const bobot = document.getElementById('bobot-{{ $loop->index }}').value;
                    const sumber = document.getElementById('sumber-{{ $loop->index }}').value;
                    const soal = document.getElementById('soal-{{ $loop->index }}').value;

                    if (!bobot || !sumber) {
                        alert('Harap isi semua field yang diperlukan.');
                        return;
                    }

                    // Prepare data for all siswa
                    const data = [];
                                                                                                                                {{ $siswa->pluck('id')->toJson() }}.forEach(siswaId => {
                        let nilai = 0;
                        if (sumber === 'manual') {
                            // Get nilai from individual inputs
                            const nilaiInput = document.querySelector(`#edit-nilai-form-{{ $loop->index }} input[name="nilai_manual[${siswaId}]"]`);
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
                                // Redirect back to nilai page
                                window.location.href = '{{ route("nilai.show", $mapel->mapel_id) }}';
                            } else {
                                toastr.error(result.error);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            toastr.error('Terjadi kesalahan saat menyimpan data');
                        });
                });
            @endforeach
        @endif

                                            // Existing nilai data
                                            const existingNilaiData = @json($existingNilai ?? collect());

        // Siswa data
        const siswaData = @json($siswa);

        // Load existing nilai columns on page load
        document.addEventListener('DOMContentLoaded', function () {
            const table = document.getElementById('edit-nilai-table');
            const thead = table.querySelector('thead tr');
            const tbody = table.querySelector('tbody');

            // Get unique judul_nilai from existing data
            const judulList = Object.keys(existingNilaiData);

            judulList.forEach(function (judul, index) {
                // Add header
                const thNilai = document.createElement('th');
                thNilai.className = 'px-4 py-2 border';
                thNilai.textContent = judul + ' (Nilai)';
                thead.insertBefore(thNilai, thead.lastElementChild);

                const thBobot = document.createElement('th');
                thBobot.className = 'px-4 py-2 border';
                thBobot.textContent = judul + ' (Bobot)';
                thead.insertBefore(thBobot, thead.lastElementChild);

                const thSumber = document.createElement('th');
                thSumber.className = 'px-4 py-2 border';
                thSumber.textContent = judul + ' (Sumber)';
                thead.insertBefore(thSumber, thead.lastElementChild);

                // Add cells to each row
                tbody.querySelectorAll('tr').forEach((row, rowIndex) => {
                    const siswaId = {{ $siswa->pluck('id')->toJson() }}[rowIndex];
                    const existingNilai = existingNilaiData[judul] && existingNilaiData[judul][siswaId] ? existingNilaiData[judul][siswaId][0] : null;

                    const tdNilai = document.createElement('td');
                    tdNilai.className = 'px-4 py-2 border';
                    tdNilai.innerHTML = `<input type="number" name="nilai[${siswaId}][${judul}]" min="0" max="100" placeholder="Nilai" value="${existingNilai ? existingNilai.nilai : ''}" required>`;
                    row.insertBefore(tdNilai, row.lastElementChild);

                    const tdBobot = document.createElement('td');
                    tdBobot.className = 'px-4 py-2 border';
                    tdBobot.innerHTML = `<input type="number" name="bobot[${siswaId}][${judul}]" min="1" value="${existingNilai ? existingNilai.bobot : '1'}" placeholder="Bobot" required>`;
                    row.insertBefore(tdBobot, row.lastElementChild);

                    const tdSumber = document.createElement('td');
                    tdSumber.className = 'px-4 py-2 border';
                    tdSumber.innerHTML = `<select name="sumber[${siswaId}][${judul}]" required>
                                                                    <option value="manual" ${existingNilai && existingNilai.sumber === 'manual' ? 'selected' : ''}>Manual</option>
-                                                                    <option value="soal" ${existingNilai && existingNilai.sumber === 'soal' ? 'selected' : ''}>Soal</option>
-                                                                </select>`;
                    row.insertBefore(tdSumber, row.lastElementChild);
                });
            });
        });
    </script>
@endsection