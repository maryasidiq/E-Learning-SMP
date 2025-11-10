@extends('layouts.app2')
@section('pageTitle', 'Hapus Nilai')
@section('title', 'Hapus Nilai')
@section('content')
    <div class="w-full">
        <!-- Header -->
        <div class="bg-brand-500 text-gray-200 px-6 py-4 rounded-t-xl">
            <h3 class="text-lg font-semibold">Hapus Nilai Siswa</h3>
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

            <!-- Form Hapus Nilai -->
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                <h4 class="text-lg font-semibold mb-4">Pilih Nilai yang Ingin Dihapus</h4>
                <form id="hapus-nilai-form" method="POST" action="{{ route('nilai.destroy', $mapel->mapel_id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="mb-4">
                        <label for="judul_nilai" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama
                            Nilai</label>
                        <select
                            class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                            id="judul_nilai" name="judul_nilai" required>
                            <option value="">Pilih Nama Nilai</option>
                            @foreach($existingNilai as $judul => $nilai)
                                <option value="{{ $judul }}">{{ $judul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex gap-4">
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Hapus Nilai
                        </button>
                        <a href="{{ route('nilai.show', $mapel->mapel_id) }}"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>

            <!-- Table Preview -->
            <div class="overflow-x-auto">
                <table id="nilai-table"
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
    </div>

    <script>
        // Existing nilai data
        const existingNilaiData = @json($existingNilai ?? collect());

        // Siswa data
        const siswaData = @json($siswa);

        // Load existing nilai columns on page load
        document.addEventListener('DOMContentLoaded', function () {
            const table = document.getElementById('nilai-table');
            const thead = table.querySelector('thead tr');
            const tbody = table.querySelector('tbody');

            // Get unique judul_nilai from existing data
            const judulList = Object.keys(existingNilaiData);

            judulList.forEach(function (judul, index) {
                // Add header
                const thNilai = document.createElement('th');
                thNilai.className = 'px-4 py-2 border';
                thNilai.textContent = judul;
                thead.insertBefore(thNilai, thead.lastElementChild);

                // Add cells to each row
                tbody.querySelectorAll('tr').forEach((row, rowIndex) => {
                    const siswaId = {{ $siswa->pluck('id')->toJson() }}[rowIndex];
                    const existingNilai = existingNilaiData[judul] && existingNilaiData[judul][siswaId] ? existingNilaiData[judul][siswaId][0] : null;

                    const tdNilai = document.createElement('td');
                    tdNilai.className = 'px-4 py-2 border';
                    tdNilai.textContent = existingNilai ? existingNilai.nilai : '-';
                    row.insertBefore(tdNilai, row.lastElementChild);
                });
            });
        });
    </script>
@endsection