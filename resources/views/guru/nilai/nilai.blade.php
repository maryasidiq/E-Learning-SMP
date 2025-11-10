@extends('layouts.app2')
@section('pageTitle', 'Entry Nilai')
@section('title', 'Entry Nilai')
@section('content')
    <div class="w-full">
        <!-- Header -->
        <div class="bg-brand-500 text-gray-200 px-6 py-4 rounded-t-xl">
            <h3 class="text-lg font-semibold">Entry Nilai Siswa</h3>
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

            <!-- Buttons -->
            <div class="flex gap-4">
                <button id="save-nilai" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Simpan Nilai
                </button>
                <button id="export-excel" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    Export ke Excel
                </button>
            </div>

            <!-- Form Tambah Nilai -->
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg mt-4">
                <h4 class="text-lg font-semibold mb-4">Tambah Nilai Baru</h4>
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
                        <label for="sumber" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sumber
                            Nilai</label>
                        <select
                            class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            id="sumber" name="sumber" required>
                            <option value="manual">Manual</option>
                            <option value="soal">Dari Soal</option>
                        </select>
                    </div>
                    <div class="form-group flex items-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Tambah Nilai
                        </button>
                    </div>
                    <div class="form-group md:col-span-2 lg:col-span-4" id="manual-input" style="display: block;">
                        <label for="nilai_manual" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nilai
                            Manual</label>
                        <input type="number"
                            class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            id="nilai_manual" name="nilai" min="0" max="100">
                    </div>
                    <div class="form-group md:col-span-2 lg:col-span-4" id="soal-input" style="display: none;">
                        <label for="soal" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilih
                            Soal</label>
                        <select
                            class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            id="soal" name="soal">
                            <option value="">Pilih Soal</option>
                            @foreach(\App\Soal::where('mapel_id', $mapel->mapel_id)->get() as $soal)
                                <option value="{{ $soal->judul }}">{{ $soal->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table id="nilai-table"
                    class="min-w-full bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-800">
                        <tr>
                            <th class="px-4 py-2 border">No</th>
                            <th class="px-4 py-2 border">Nama Siswa</th>
                            <th class="px-4 py-2 border">NIS</th>
                            <!-- Dynamic Latihan Columns will be added here -->
                            <th class="px-4 py-2 border">Rata-rata</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $s)
                            <tr>

                                <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 border">{{ $s->nama_siswa }}</td>
                                <td class="px-4 py-2 border">{{ $s->no_induk }}</td>
                                <!-- More cells will be added dynamically -->
                                <td class="px-4 py-2 border rata-rata-{{ $s->id }}">0</td>
                                <td class="px-4 py-2 border"><a
                                        href="{{ route('guru.nilai.edit', ['siswa_id' => $s->id, 'mapel_id' => $mapel->mapel_id]) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white px-2 py-1 rounded text-sm">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Form Hapus Nilai -->
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg mt-4">
                <h4 class="text-lg font-semibold mb-4">Hapus Nilai</h4>
                <form id="delete-nilai-form" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="judul_delete" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilih
                            Judul Nilai</label>
                        <select
                            class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            id="judul_delete" name="judul_delete" required>
                            <option value="">Pilih Judul Nilai</option>
                            @foreach(($existingNilai ?? collect())->keys() as $judul)
                                <option value="{{ $judul }}">{{ $judul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilih nilai yang Akan
                            Dihapus Nilainya</label>
                        <div class="mt-2">
                            <label class="flex items-center mb-2">
                                <input type="checkbox" id="select-all-grades" class="mr-2">
                                Pilih Semua
                            </label>
                            <div id="grades-list" class="space-y-2">
                                <!-- Students will be populated here -->
                            </div>
                        </div>
                    </div>
                    <div class="form-group md:col-span-2 flex items-end">
                        <button type="button" onclick="deleteNilai()"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Hapus Nilai Terpilih
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let latihanCount = 1;

        // Data nilai soal per siswa
        const nilaiSoalData = @json($nilaiSoal ?? []);

        // Existing nilai data
        const existingNilaiData = @json($existingNilai ?? collect());

        // Siswa data
        const siswaData = @json($siswa);

        // Function to get nilai from soal for a specific siswa
        function getNilaiFromSoal(soalJudul, siswaId) {
            const soalData = nilaiSoalData.find(data => data.judul === soalJudul && data.siswa_id == siswaId);
            return soalData ? soalData.nilai : '';
        }

        // Function to get existing nilai for a specific siswa and judul
        function getExistingNilai(judulNilai, siswaId) {
            if (existingNilaiData[judulNilai] && existingNilaiData[judulNilai][siswaId]) {
                return existingNilaiData[judulNilai][siswaId][0];
            }
            return null;
        }

        // Load existing nilai columns on page load
        document.addEventListener('DOMContentLoaded', function () {
            const table = document.getElementById('nilai-table');
            const thead = table.querySelector('thead tr');
            const tbody = table.querySelector('tbody');

            // Get unique judul_nilai from existing data
            const judulList = Object.keys(existingNilaiData);

            judulList.forEach(function (judul, index) {
                latihanCount = index + 2; // Start from 2 since 1 is reserved

                // Add header
                const thNilai = document.createElement('th');
                thNilai.className = 'px-4 py-2 border';
                thNilai.textContent = judul;
                thead.insertBefore(thNilai, thead.lastElementChild);

                const thBobot = document.createElement('th');
                thBobot.className = 'px-4 py-2 border';
                thBobot.textContent = 'Bobot';
                thead.insertBefore(thBobot, thead.lastElementChild);

                const thSumber = document.createElement('th');
                thSumber.className = 'px-4 py-2 border';
                thSumber.textContent = 'Sumber';
                thead.insertBefore(thSumber, thead.lastElementChild);

                // Add cells to each row
                tbody.querySelectorAll('tr').forEach((row, rowIndex) => {
                    const siswaId = {{ $siswa->pluck('id')->toJson() }}[rowIndex];
                    const existingNilai = getExistingNilai(judul, siswaId);

                    const tdNilai = document.createElement('td');
                    tdNilai.className = 'px-4 py-2 border';
                    tdNilai.innerHTML = `<input type="number" class="latihan-${latihanCount}-${siswaId}" min="0" max="100" placeholder="Nilai" value="${existingNilai ? existingNilai.nilai : ''}">`;
                    row.insertBefore(tdNilai, row.lastElementChild);

                    const tdBobot = document.createElement('td');
                    tdBobot.className = 'px-4 py-2 border';
                    tdBobot.innerHTML = `<input type="number" class="bobot-${latihanCount}-${siswaId}" min="0" max="100" value="${existingNilai ? existingNilai.bobot : '1'}" placeholder="Bobot">`;
                    row.insertBefore(tdBobot, row.lastElementChild);

                    const tdSumber = document.createElement('td');
                    tdSumber.className = 'px-4 py-2 border';
                    tdSumber.innerHTML = `<select class="sumber-${latihanCount}-${siswaId}"><option value="${existingNilai ? existingNilai.sumber : 'manual'}" selected>${existingNilai && existingNilai.sumber === 'soal' ? 'Soal' : 'Manual'}</option></select>`;
                    row.insertBefore(tdSumber, row.lastElementChild);
                });
            });

            // Calculate initial rata-rata
            calculateAllRataRata();
        });

        // Function to calculate rata-rata for all siswa
        function calculateAllRataRata() {
                                                                                                                                                                                                                                                                                                                                                {{ $siswa->pluck('id')->toJson() }}.forEach(siswaId => {
            let total = 0;
            let totalBobot = 0;
            for (let i = 1; i <= latihanCount; i++) {
                const nilaiInput = document.querySelector(`.latihan-${i}-${siswaId}`);
                const bobotInput = document.querySelector(`.bobot-${i}-${siswaId}`);
                if (nilaiInput && bobotInput) {
                    const nilai = parseFloat(nilaiInput.value) || 0;
                    const bobot = parseInt(bobotInput.value) || 1;
                    total += nilai * bobot;
                    totalBobot += bobot;
                }
            }
            const rataRata = totalBobot > 0 ? (total / totalBobot).toFixed(2) : 0;
            const rataRataCell = document.querySelector(`.rata-rata-${siswaId}`);
            if (rataRataCell) {
                rataRataCell.textContent = rataRata;
            }
        });
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
                } else {
                    customInput.style.display = 'none';
                    customInput.required = false;
                    customInput.value = '';
                }
            });

            // Handle form submission for adding nilai
            document.getElementById('add-nilai-form').addEventListener('submit', function (e) {
                e.preventDefault();
                let judulNilai = document.getElementById('judul_nilai').value;
                const customJudul = document.getElementById('judul_nilai_custom').value;
                if (judulNilai === '' && customJudul) {
                    judulNilai = customJudul;
                }
                const bobot = document.getElementById('bobot').value;
                const sumber = document.getElementById('sumber').value;
                const nilaiManual = document.getElementById('nilai_manual').value;
                const soal = document.getElementById('soal').value;

                if (!judulNilai || !bobot || !sumber) {
                    alert('Harap isi semua field yang diperlukan.');
                    return;
                }

                // Prepare data for all siswa
                const data = [];
                                                                                                                                                                                                                                                                                                                        {{ $siswa->pluck('id')->toJson() }}.forEach(siswaId => {
                    let nilai = 0;
                    if (sumber === 'manual') {
                        nilai = parseFloat(nilaiManual) || 0;
                    } else {
                        nilai = getNilaiFromSoal(soal, siswaId) || 0;
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
                            // Add the column dynamically to the table
                            latihanCount++;
                            const table = document.getElementById('nilai-table');
                            const thead = table.querySelector('thead tr');
                            const tbody = table.querySelector('tbody');

                            // Add header
                            const thNilai = document.createElement('th');
                            thNilai.className = 'px-4 py-2 border';
                            thNilai.textContent = judulNilai;
                            thead.insertBefore(thNilai, thead.lastElementChild);

                            const thBobot = document.createElement('th');
                            thBobot.className = 'px-4 py-2 border';
                            thBobot.textContent = 'Bobot';
                            thead.insertBefore(thBobot, thead.lastElementChild);

                            const thSumber = document.createElement('th');
                            thSumber.className = 'px-4 py-2 border';
                            thSumber.textContent = 'Sumber';
                            thead.insertBefore(thSumber, thead.lastElementChild);

                            // Add cells to each row
                            tbody.querySelectorAll('tr').forEach((row, index) => {
                                const siswaId = {{ $siswa->pluck('id')->toJson() }}[index];

                                const tdNilai = document.createElement('td');
                                tdNilai.className = 'px-4 py-2 border';
                                if (sumber === 'manual') {
                                    tdNilai.innerHTML = `<input type="number" class="latihan-${latihanCount}-${siswaId}" min="0" max="100" placeholder="Nilai" value="${nilaiManual}">`;
                                } else {
                                    const soalNilai = getNilaiFromSoal(soal, siswaId);
                                    tdNilai.innerHTML = `<input type="number" class="latihan-${latihanCount}-${siswaId}" min="0" max="100" placeholder="Nilai dari Soal" value="${soalNilai}">`;
                                }
                                row.insertBefore(tdNilai, row.lastElementChild);

                                const tdBobot = document.createElement('td');
                                tdBobot.className = 'px-2 py-2 border';
                                tdBobot.innerHTML = `<input type="number" class="bobot-${latihanCount}-${siswaId}" min="1" value="${bobot}" placeholder="Bobot">`;
                                row.insertBefore(tdBobot, row.lastElementChild);

                                const tdSumber = document.createElement('td');
                                tdSumber.className = 'px-4 py-2 border';
                                tdSumber.innerHTML = `<select class="sumber-${latihanCount}-${siswaId}"><option value="${sumber}" selected>${sumber === 'manual' ? 'Manual' : 'Soal'}</option></select>`;
                                row.insertBefore(tdSumber, row.lastElementChild);


                            });

                            // Reset form
                            this.reset();
                            document.getElementById('manual-input').style.display = 'block';
                            document.getElementById('soal-input').style.display = 'none';

                            // Calculate rata-rata
                            calculateAllRataRata();
                        } else {
                            toastr.error(result.error);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        toastr.error('Terjadi kesalahan saat menyimpan data');
                    });
            });

            document.getElementById('add-latihan').addEventListener('click', function () {
                latihanCount++;
                const table = document.getElementById('nilai-table');
                const thead = table.querySelector('thead tr');
                const tbody = table.querySelector('tbody');

                // Add header
                const thNilai = document.createElement('th');
                thNilai.className = 'px-4 py-2 border';
                thNilai.textContent = `Latihan ${latihanCount}`;
                thead.insertBefore(thNilai, thead.lastElementChild);

                const thBobot = document.createElement('th');
                thBobot.className = 'px-4 py-2 border';
                thBobot.textContent = `Bobot ${latihanCount}`;
                thead.insertBefore(thBobot, thead.lastElementChild);

                const thSumber = document.createElement('th');
                thSumber.className = 'px-4 py-2 border';
                thSumber.textContent = `Sumber ${latihanCount}`;
                thead.insertBefore(thSumber, thead.lastElementChild);

                // Add cells to each row
                tbody.querySelectorAll('tr').forEach((row, index) => {
                    const siswaId = {{ $siswa->pluck('id')->toJson() }}[index];

                    const tdNilai = document.createElement('td');
                    tdNilai.className = 'px-4 py-2 border';
                    tdNilai.innerHTML = `<input type="number" class="latihan-${latihanCount}-${siswaId}" min="0" max="100" placeholder="Nilai">`;
                    row.insertBefore(tdNilai, row.lastElementChild);

                    const tdBobot = document.createElement('td');
                    tdBobot.className = 'px-2 py-2 border';
                    tdBobot.innerHTML = `<input type="number" class="bobot-${latihanCount}-${siswaId}" min="1" value="1" placeholder="Bobot">`;
                    row.insertBefore(tdBobot, row.lastElementChild);

                    const tdSumber = document.createElement('td');
                    tdSumber.className = 'px-4 py-2 border';
                    tdSumber.innerHTML = `
                                                                                                                                                                                                                                                                                                                                                                                                                            <select class="sumber-${latihanCount}-${siswaId}">
                                                                                                                                                                                                                                                                                                                                                                                                                                <option value="manual">Manual</option>
                                                                                                                                                                                                                                                                                                                                                                                                                                <option value="soal">Soal</option>
                                                                                                                                                                                                                                                                                                                                                                                                                            </select>
                                                                                                                                                                                                                                                                                                                                                                                                                        `;
                    row.insertBefore(tdSumber, row.lastElementChild);
                });
            });

            document.getElementById('save-nilai').addEventListener('click', function () {
                // Collect data and send to server
                const data = [];
                                                                                                                                                                                                                                                                                                                                                                                                                {{ $siswa->pluck('id')->toJson() }}.forEach(siswaId => {
                    for (let i = 1; i <= latihanCount; i++) {
                        const nilai = document.querySelector(`.latihan-${i}-${siswaId}`).value;
                        const bobot = document.querySelector(`.bobot-${i}-${siswaId}`).value;
                        const sumber = document.querySelector(`.sumber-${i}-${siswaId}`).value;
                        const judul = document.querySelector(`th:nth-child(${3 + (i - 1) * 3})`).textContent; // Get judul from header
                        if (nilai || bobot) {
                            data.push({
                                siswa_id: siswaId,
                                mapel_id: {{ $mapel->mapel_id }},
                                judul_nilai: judul,
                                nilai: parseFloat(nilai) || 0,
                                sumber: sumber,
                                bobot: parseInt(bobot) || 1
                            });
                        }
                    }
                });

                // Send AJAX request
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
                            // Reset form after successful save
                            document.getElementById('add-nilai-form').reset();
                            document.getElementById('manual-input').style.display = 'block';
                            document.getElementById('soal-input').style.display = 'none';
                        } else {
                            toastr.error(result.error);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        toastr.error('Terjadi kesalahan saat menyimpan data');
                    });
            });

            // Calculate rata-rata on input change
            document.addEventListener('input', function (e) {
                if (e.target.className.includes('latihan-') || e.target.className.includes('bobot-')) {
                    calculateAllRataRata();
                }
            });

            // Handle select all checkbox
            document.getElementById('select-all').addEventListener('change', function () {
                const rowCheckboxes = document.querySelectorAll('.row-checkbox');
                rowCheckboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
                updateDeleteButton();
            });

            // Handle individual grade checkboxes
            document.addEventListener('change', function (e) {
                if (e.target.classList.contains('grade-checkbox')) {
                    updateDeleteButton();
                }
            });

            // Update delete button visibility and count
            function updateDeleteButton() {
                const selectedCheckboxes = document.querySelectorAll('.grade-checkbox:checked');
                const count = selectedCheckboxes.length;
                const deleteButton = document.getElementById('delete-selected');
                const selectedCount = document.getElementById('selected-count');

                selectedCount.textContent = count;
                if (count > 0) {
                    deleteButton.disabled = false;
                    deleteButton.classList.remove('disabled:opacity-50', 'disabled:cursor-not-allowed');
                } else {
                    deleteButton.disabled = true;
                    deleteButton.classList.add('disabled:opacity-50', 'disabled:cursor-not-allowed');
                }
            }

            // Handle judul_delete change to populate students
            // document.getElementById('judul_delete').addEventListener('change', function () {
            //     const judul = this.value;
            //     const gradesList = document.getElementById('grades-list');
            //     const selectAllCheckbox = document.getElementById('select-all-grades');
            //     gradesList.innerHTML = '';
            //     selectAllCheckbox.checked = false;

            //     if (!judul) return;

            //     // Get students who have the selected judul
            //     const students = [];
            //     console.log(siswaData);
            //     siswaData.forEach(siswa => {
            //         if (existingNilaiData[judul] && existingNilaiData[judul][siswa.id]) {
            //             students.push(siswa);
            //         }
            //     });

            //     if (students.length === 0) {
            //         gradesList.innerHTML = '<p class="text-gray-500">Tidak ada siswa dengan judul nilai ini.</p>';
            //         return;
            //     }

            //     students.forEach(siswa => {
            //         const checkbox = document.createElement('label');
            //         checkbox.className = 'flex items-center';
            //         checkbox.innerHTML = `
            //                                                             <input type="checkbox" class="grade-checkbox mr-2" data-siswa-id="${siswa.id}" data-judul="${judul}">
            //                                                             ${siswa.nama_siswa} (${siswa.no_induk})
            //                                                         `;
            //         gradesList.appendChild(checkbox);
            //     });

            //     // Ensure all checkboxes are checked
            //     document.querySelectorAll('#grades-list .grade-checkbox').forEach(cb => cb.checked = true);

            //     // Automatically check the select all checkbox since all are checked
            //     selectAllCheckbox.checked = true;
            // });

            // // Handle select all grades checkbox
            // document.getElementById('select-all-grades').addEventListener('change', function () {
            //     const gradeCheckboxes = document.querySelectorAll('#grades-list .grade-checkbox');
            //     gradeCheckboxes.forEach(checkbox => {
            //         checkbox.checked = this.checked;
            //     });
            // });

            // // Function to delete nilai
            // function deleteNilai() {
            //     const judulDelete = document.getElementById('judul_delete');
            //     const judul = judulDelete.value;
            //     if (!judul) {
            //         alert('Pilih judul nilai terlebih dahulu.');
            //         return;
            //     }

            //     const selectedCheckboxes = document.querySelectorAll('#grades-list .grade-checkbox:checked');
            //     if (selectedCheckboxes.length === 0) {
            //         alert('Pilih setidaknya satu siswa untuk dihapus nilainya.');
            //         return;
            //     }

            //     if (!confirm(`Apakah Anda yakin ingin menghapus nilai "${judul}" untuk siswa yang dipilih?`)) {
            //         return;
            //     }

            //     const grades = Array.from(selectedCheckboxes).map(cb => ({
            //         siswa_id: parseInt(cb.getAttribute('data-siswa-id')),
            //         judul_nilai: cb.getAttribute('data-judul')
            //     }));

            //     console.log('Grades to delete:', grades);

            //     // Send delete request
            //     fetch('{{ route("nilai.batch.destroy") }}', {
            //         method: 'DELETE',
            //         headers: {
            //             'Content-Type': 'application/json',
            //             'X-CSRF-TOKEN': '{{ csrf_token() }}'
            //         },
            //         body: JSON.stringify({ grades: grades, mapel_id: {{ $mapel->mapel_id }} })
            //     })
            //         .then(response => {
            //             console.log('Response status:', response.status);
            //             console.log('Response headers:', response.headers);
            //             return response.text(); // Get raw response first
            //         })
            //         .then(text => {
            //             console.log('Raw response:', text);
            //             try {
            //                 const result = JSON.parse(text);
            //                 console.log('Parsed result:', result);
            //                 if (result.success) {
            //                     toastr.success(result.success);
            //                     // Reload the page to reflect changes
            //                     location.reload();
            //                 } else {
            //                     toastr.error(result.error || 'Terjadi kesalahan');
            //                 }
            //             } catch (e) {
            //                 console.error('JSON parse error:', e);
            //                 toastr.error('Response tidak valid: ' + text);
            //             }
            //         })
            //         .catch(error => {
            //             console.error('Error:', error);
            //             toastr.error('Terjadi kesalahan saat menghapus data');
            //         });
        }

        // ======================
        // BAGIAN HAPUS NILAI
        // ======================

        // Ketika user memilih judul nilai untuk dihapus
        document.getElementById('judul_delete').addEventListener('change', function () {
            const judul = this.value.trim(); // pastikan tidak ada spasi
            const gradesList = document.getElementById('grades-list');
            const selectAllCheckbox = document.getElementById('select-all-grades');

            // Kosongkan daftar siswa
            gradesList.innerHTML = '';
            selectAllCheckbox.checked = false;

            if (!judul) return; // kalau belum pilih, stop dulu

            // Debug (sementara, boleh dihapus setelah tes)
            console.log('existingNilaiData:', existingNilaiData);
            console.log('judul dipilih:', judul);

            // Cari siswa yang punya nilai dengan judul tersebut
            const students = siswaData.filter(siswa => {
                return existingNilaiData[judul]?.[siswa.id] !== undefined;
            });

            if (students.length === 0) {
                gradesList.innerHTML = `
                                                <p class="text-gray-500">
                                                    Tidak ada siswa dengan judul nilai "<strong>${judul}</strong>".
                                                </p>`;
                return;
            }

            // Tampilkan checkbox siswa
            students.forEach(siswa => {
                const label = document.createElement('label');
                label.className = 'flex items-center';
                label.innerHTML = `
                                                <input type="checkbox" 
                                                       class="grade-checkbox mr-2" 
                                                       data-siswa-id="${siswa.id}" 
                                                       data-judul="${judul}" 
                                                       checked>
                                                ${siswa.nama_siswa} (${siswa.no_induk})
                                            `;
                gradesList.appendChild(label);
            });

            // Semua langsung terpilih
            selectAllCheckbox.checked = true;
        });

        // Checkbox "Pilih Semua"
        document.getElementById('select-all-grades').addEventListener('change', function () {
            const gradeCheckboxes = document.querySelectorAll('#grades-list .grade-checkbox');
            gradeCheckboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        // Fungsi hapus nilai
        function deleteNilai() {
            const judulSelect = document.getElementById('judul_delete');
            const judul = judulSelect.value.trim();
            if (!judul) {
                alert('Pilih judul nilai terlebih dahulu.');
                return;
            }

            const selectedCheckboxes = document.querySelectorAll('#grades-list .grade-checkbox:checked');
            if (selectedCheckboxes.length === 0) {
                alert('Pilih setidaknya satu siswa untuk dihapus nilainya.');
                return;
            }

            if (!confirm(`Apakah Anda yakin ingin menghapus nilai "${judul}" untuk siswa yang dipilih?`)) {
                return;
            }

            const grades = Array.from(selectedCheckboxes).map(cb => ({
                siswa_id: parseInt(cb.getAttribute('data-siswa-id')),
                judul_nilai: cb.getAttribute('data-judul')
            }));

            console.log('Grades to delete:', grades);

            fetch('{{ route("nilai.batch.destroy") }}', {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    grades: grades,
                    mapel_id: {{ $mapel->mapel_id }}
                                })

            })

                .then(async response => {
                    // logging useful debug info
                    console.log('Response status:', response.status);
                    console.log('Response headers:', Array.from(response.headers.entries()));

                    const text = await response.text(); // baca raw dulu
                    // coba parse JSON jika memungkinkan
                    try {
                        const json = JSON.parse(text);
                        console.log('Parsed JSON:', json);
                        if (response.ok && json.success) {
                            toastr.success(json.success);
                            setTimeout(() => location.reload(), 700);
                        } else {
                            // jika ada error key, tampilkan; kalau tidak, tampilkan seluruh JSON
                            const errMsg = json.error || (json.message ? json.message : JSON.stringify(json));
                            toastr.error(errMsg || 'Terjadi kesalahan');
                        }
                    } catch (err) {
                        // bukan JSON — tampilkan raw text agar mudah debugging
                        console.error('Response bukan JSON:', text);
                        // Jika status redirect ke login (401/302/419) beri pesan khusus
                        if (response.status === 419 || /csrf/i.test(text)) {
                            toastr.error('Token CSRF kadaluwarsa atau tidak valid (status 419). Silakan refresh halaman dan coba lagi.');
                        } else if (response.status === 401 || response.status === 302) {
                            toastr.error('Anda mungkin tidak terautentikasi. Coba login ulang.');
                        } else {
                            // tampilkan potongan raw response (batasin panjang)
                            const snippet = text.length > 800 ? text.slice(0, 800) + '... (truncated)' : text;
                            toastr.error('Response tidak valid (bukan JSON). Lihat console untuk detail.');
                            console.log('Raw response (truncated):', snippet);
                        }
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                    toastr.error('Terjadi kesalahan koneksi saat menghapus data.');
                });
        }


    </script>
@endsection