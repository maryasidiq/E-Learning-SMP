@extends('template_backend.home')
@section('heading', 'Lihat Nilai Siswa')
@section('page')
    <li class="breadcrumb-item"><a href="{{ route('admin.nilai.mapel') }}">Pilih Mata Pelajaran</a></li>
    <li class="breadcrumb-item active">Lihat Nilai Siswa</li>
@endsection
@section('content')
    @php
        $no = 1;
    @endphp
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Lihat Nilai Siswa - {{ $mapel->nama_mapel }}</h3>
                <div class="card-tools">
                    <a href="{{ route('nilai.export', Crypt::encrypt($mapel->id)) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-download"></i> Export ke Excel
                    </a>
                </div>
            </div>
            <div class="card-body">
                <!-- Info Kelas -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <table class="table table-sm">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold">Nama Kelas</td>
                                    <td>:</td>
                                    <td>{{ $kelas->pluck('nama_kelas')->join(', ') }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Wali Kelas</td>
                                    <td>:</td>
                                    <td>{{ $kelas->pluck('guru.nama_guru')->join(', ') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-sm">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold">Jumlah Siswa</td>
                                    <td>:</td>
                                    <td>{{ $siswa->count() }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Mata Pelajaran</td>
                                    <td>:</td>
                                    <td>{{ $mapel->nama_mapel }}</td>
                                </tr>
                                @php
                                    $bulan = date('m');
                                @endphp
                                <tr>
                                    <td class="font-weight-bold">Semester</td>
                                    <td>:</td>
                                    <td>{{ $bulan > 6 ? 'Semester Ganjil' : 'Semester Genap' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Table -->
                <table id="nilai-table" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>NIS</th>
                            <!-- Dynamic Latihan Columns will be added here -->
                            <th>Rata-rata</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $s)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $s->nama_siswa }}</td>
                                <td>{{ $s->no_induk }}</td>
                                <!-- More cells will be added dynamically -->
                                <td class="rata-rata-{{ $s->id }}">0</td>
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
                    const existingNilai = getExistingNilai(judul, siswaId);

                    const tdNilai = document.createElement('td');
                    tdNilai.className = 'px-4 py-2 border';
                    tdNilai.textContent = existingNilai ? existingNilai.nilai : '-';
                    row.insertBefore(tdNilai, row.lastElementChild);
                });
            });

            // Calculate initial rata-rata
            calculateAllRataRata();
        });

        // Function to get existing nilai for a specific siswa and judul
        function getExistingNilai(judulNilai, siswaId) {
            if (existingNilaiData[judulNilai] && existingNilaiData[judulNilai][siswaId]) {
                return existingNilaiData[judulNilai][siswaId][0];
            }
            return null;
        }

        // Function to calculate rata-rata for all siswa
        function calculateAllRataRata() {
                    {{ $siswa->pluck('id')->toJson() }}.forEach(siswaId => {
            let total = 0;
            let totalBobot = 0;
            const judulList = Object.keys(existingNilaiData);
            judulList.forEach(judul => {
                const existingNilai = getExistingNilai(judul, siswaId);
                if (existingNilai) {
                    const nilai = parseFloat(existingNilai.nilai) || 0;
                    const bobot = parseInt(existingNilai.bobot) || 1;
                    total += nilai * bobot;
                    totalBobot += bobot;
                }
            });
            const rataRata = totalBobot > 0 ? (total / totalBobot).toFixed(2) : 0;
            const rataRataCell = document.querySelector(`.rata-rata-${siswaId}`);
            if (rataRataCell) {
                rataRataCell.textContent = rataRata;
            }
        });
        }
    </script>
@endsection
@section('script')
    <script>
        $("#Nilai").addClass("active");
        $("#liNilai").addClass("menu-open");
        $("#LihatNilai").addClass("active");
    </script>
@endsection