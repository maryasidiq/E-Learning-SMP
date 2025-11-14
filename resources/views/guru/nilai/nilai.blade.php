@extends('layouts.app2')
@section('pageTitle', 'Entry Nilai')
@section('title', 'Entry Nilai')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div
            class="bg-gradient-to-br from-[#CB1C8D] to-[#F56EB3] dark:from-[#CB1C8D] dark:to-[#F56EB3] rounded-2xl p-8 mb-8 text-white shadow-2xl relative overflow-hidden">
            <div class="absolute inset-0 bg-white/10"></div>
            <div class="relative z-10 flex items-center justify-between">
                <div class="animate-fade-in">
                    <h1 class="text-4xl font-extrabold mb-3 text-white dark:text-gray-100">Entry Nilai Siswa</h1>
                    <p class="text-white/90 dark:text-gray-200 text-lg font-medium">Kelola nilai akademik siswa dengan mudah
                        dan efisien</p>
                    <div class="mt-4 flex items-center space-x-4">
                        <div class="flex items-center bg-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm font-medium text-white dark:text-gray-100">{{ $siswa->count() }}
                                Siswa</span>
                        </div>
                        <div class="flex items-center bg-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                            <span
                                class="text-sm font-medium text-white dark:text-gray-100">{{ $mapel->mapel->nama_mapel }}</span>
                        </div>
                    </div>
                </div>

                <div class="hidden md:block animate-bounce-slow">
                    <div class="relative">
                        <svg class="w-20 h-20 text-white/90 drop-shadow-lg" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12l2 2 4-4m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
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

        {{-- Info Kelas --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div
                class="bg-white dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-xl hover:shadow-[#CB1C8D]/10 transition-all duration-300">
                <div class="flex items-center">
                    <div
                        class="w-12 h-12 bg-[#F56EB3]/20 dark:bg-[#CB1C8D]/20 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-[#CB1C8D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Kelas</p>
                        <p class="font-semibold text-gray-900 dark:text-white text-lg">
                            {{ $kelas->pluck('nama_kelas')->join(', ') }}</p>
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-xl hover:shadow-[#CB1C8D]/10 transition-all duration-300">
                <div class="flex items-center">
                    <div
                        class="w-12 h-12 bg-[#CB1C8D]/20 dark:bg-[#F56EB3]/20 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-[#CB1C8D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Wali Kelas</p>
                        <p class="font-semibold text-gray-900 dark:text-white text-lg">
                            {{ $kelas->pluck('guru.nama_guru')->join(', ') }}</p>
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-xl hover:shadow-[#CB1C8D]/10 transition-all duration-300">
                <div class="flex items-center">
                    <div
                        class="w-12 h-12 bg-[#F56EB3]/20 dark:bg-[#CB1C8D]/20 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-[#CB1C8D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Jumlah Siswa</p>
                        <p class="font-semibold text-gray-900 dark:text-white text-lg">{{ $siswa->count() }} Siswa</p>
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-xl hover:shadow-[#CB1C8D]/10 transition-all duration-300">
                <div class="flex items-center">
                    <div
                        class="w-12 h-12 bg-[#CB1C8D]/20 dark:bg-[#F56EB3]/20 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-[#CB1C8D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4v10m0 0l-2-2m2 2l2-2m6-6v6m0 0l2-2m-2 2l-2-2">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Semester</p>
                        @php
                            $bulan = date('m');
                            $tahun = date('Y');
                        @endphp
                        <p class="font-semibold text-gray-900 dark:text-white text-lg">{{ $bulan > 6 ? 'Ganjil' : 'Genap' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <a href="{{ route('guru.nilai.tambah', $mapel->mapel_id) }}"
                class="group bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest shadow-lg hover:shadow-xl focus:ring-4 focus:ring-blue-500/25 focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-0.5 relative overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/10 to-white/0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700">
                </div>
                <span class="relative z-10 flex items-center justify-center px-6 py-4">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Nilai
                </span>
            </a>

            <a href="{{ route('guru.nilai.edit.all', $mapel->mapel_id) }}"
                class="group bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest shadow-lg hover:shadow-xl focus:ring-4 focus:ring-green-500/25 focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-0.5 relative overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/10 to-white/0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700">
                </div>
                <span class="relative z-10 flex items-center justify-center px-6 py-4">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                        </path>
                    </svg>
                    Edit Semua Nilai
                </span>
            </a>

            <a href="{{ route('guru.nilai.hapus', $mapel->mapel_id) }}"
                class="group bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest shadow-lg hover:shadow-xl focus:ring-4 focus:ring-red-500/25 focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-0.5 relative overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/10 to-white/0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700">
                </div>
                <span class="relative z-10 flex items-center justify-center px-6 py-4">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                        </path>
                    </svg>
                    Hapus Nilai
                </span>
            </a>

            <a href="{{ route('guru.nilai.export', $mapel->mapel_id) }}"
                class="group bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-600 hover:to-yellow-700 border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest shadow-lg hover:shadow-xl focus:ring-4 focus:ring-yellow-500/25 focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-0.5 relative overflow-hidden inline-block">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/10 to-white/0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700">
                </div>
                <span class="relative z-10 flex items-center justify-center px-6 py-4">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    Export Excel
                </span>
            </a>
        </div>

        {{-- Table --}}
        <div
            class="bg-white dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 overflow-hidden shadow-xl">
            <div class="overflow-x-auto">
                <table id="nilai-table"
                    class="min-w-full bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700">
                    <thead class="bg-gradient-to-r from-[#CB1C8D] to-[#F56EB3] text-white">
                        <tr>
                            <th class="px-6 py-4 border border-gray-200 dark:border-gray-700 text-left font-semibold">No
                            </th>
                            <th class="px-6 py-4 border border-gray-200 dark:border-gray-700 text-left font-semibold">Nama
                                Siswa</th>
                            <th class="px-6 py-4 border border-gray-200 dark:border-gray-700 text-left font-semibold">NIS
                            </th>
                            <!-- Dynamic Latihan Columns will be added here -->
                            <th class="px-6 py-4 border border-gray-200 dark:border-gray-700 text-left font-semibold">
                                Rata-rata</th>
                            <th class="px-6 py-4 border border-gray-200 dark:border-gray-700 text-left font-semibold">Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $s)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/50 transition-colors duration-200">
                                <td class="px-6 py-4 border border-gray-200 dark:border-gray-700 dark:text-white">
                                    {{ $loop->iteration }}</td>
                                <td class="px-6 py-4 border border-gray-200 dark:border-gray-700 dark:text-white font-medium">
                                    {{ $s->nama_siswa }}</td>
                                <td class="px-6 py-4 border border-gray-200 dark:border-gray-700 dark:text-white">
                                    {{ $s->no_induk }}</td>
                                <!-- More cells will be added dynamically -->
                                <td
                                    class="px-6 py-4 border border-gray-200 dark:border-gray-700 rata-rata-{{ $s->id }}  font-bold text-[#CB1C8D]">
                                    0</td>
                                <td class="px-6 py-4 border border-gray-200 dark:border-gray-700 dark:text-white">
                                    <a href="{{ route('guru.nilai.edit', ['siswa_id' => $s->id, 'mapel_id' => $mapel->mapel_id]) }}"
                                        class="inline-flex items-center gap-2 px-3 py-1.5 text-sm font-medium text-white rounded-lg bg-[#CB1C8D] shadow-theme-xs hover:bg-[#b5187f] dark:bg-[#F56EB3] dark:hover:bg-[#e15fa5] transition-colors duration-200">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                        Edit
                                    </a>
                                </td>
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

        // Soal map for display
        const soalMap = @json($soalMap ?? []);

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
                    tdNilai.innerHTML = `
            <input 
                type="number" 
                class="latihan-${latihanCount}-${siswaId} mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-800 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                min="0" max="100" 
                placeholder="Nilai" 
                value="${existingNilai ? existingNilai.nilai : ''}"
            >
        `;
                    row.insertBefore(tdNilai, row.lastElementChild);

                    const tdBobot = document.createElement('td');
                    tdBobot.className = 'px-4 py-2 border';
                    tdBobot.innerHTML = `
            <input 
                type="number" 
                class="bobot-${latihanCount}-${siswaId} mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 text-gray-800 dark:text-gray-100 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                min="0" max="100" 
                value="${existingNilai ? existingNilai.bobot : '1'}" 
                placeholder="Bobot"
            >
        `;
                    row.insertBefore(tdBobot, row.lastElementChild);

                    const tdSumber = document.createElement('td');
                    tdSumber.className = 'px-4 py-2 border';
                    const sumberValue = existingNilai ? existingNilai.sumber : 'manual';
                    const sumberText = sumberValue === 'soal' ? (soalMap[existingNilai.soal_id] || 'Soal') : 'Manual';

                    tdSumber.innerHTML = `
        <select 
            class="sumber-${latihanCount}-${siswaId} mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
            style="color:#CB1C8D;"
        >
            <option value="${sumberValue}" selected>${sumberText}</option>
        </select>
    `;
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