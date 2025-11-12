@extends('template_backend.home')
@section('heading', 'Pilih Guru dan Mata Pelajaran')
@section('page')
    <li class="breadcrumb-item active">Pilih Guru dan Mata Pelajaran</li>
@endsection
@section('content')
    @php
        $no = 1;
    @endphp
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Guru dan Mata Pelajaran yang Diajarkan</h3>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Guru</th>
                            <th>NIP</th>
                            <th>Mata Pelajaran</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gurus as $guru)
                            @if($guru->jadwals->count() > 0)
                                @php
                                    $jadwalsGrouped = $guru->jadwals->groupBy('mapel_id');
                                @endphp
                                @foreach ($jadwalsGrouped as $mapelId => $jadwals)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $guru->nama_guru }}</td>
                                        <td>{{ $guru->nip }}</td>
                                        <td>{{ $jadwals->first()->mapel->nama_mapel }}</td>
                                        <td>
                                            @php
                                                $kelasNames = $jadwals->pluck('kelas.nama_kelas')->unique()->sort();
                                            @endphp
                                            {{ $kelasNames->join(', ') }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.nilai.show', Crypt::encrypt($mapelId)) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i> Lihat Nilai
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#Nilai").addClass("active");
        $("#liNilai").addClass("menu-open");
        $("#LihatNilai").addClass("active");
    </script>
@endsection