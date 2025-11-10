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
                <a href="{{ route('guru.nilai.tambah', Crypt::encrypt($mapel->mapel_id)) }}"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Tambah Nilai
                </a>
                <a href="{{ route('guru.nilai.edit.all', Crypt::encrypt($mapel->mapel_id)) }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Edit Semua Nilai
                </a>
                <a href="{{ route('guru.nilai.hapus', Crypt::encrypt($mapel->mapel_id)) }}"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Hapus Nilai
                </a>
                <button id="export-excel" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    Export ke Excel
                </button>
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
                    <tbody> @foreach ($siswa as $s) <tr>

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
        }

    </script>
@endsection