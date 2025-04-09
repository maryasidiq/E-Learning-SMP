@extends('layouts.app2')
@section('pageTitle', 'Ulangan')
@section('title', 'Ulangan')
@section('content')
    <div class="w-full">
        <!-- Header -->
        <div class="bg-brand-500 text-gray-200 px-6 py-4 rounded-t-xl">
            <h3 class="text-lg font-semibold">Nilai Ulangan</h3>
        </div>

        <!-- Body -->
        <div class="bg-white dark:bg-gray-900 shadow rounded-b-xl p-6 space-y-6">
            <!-- Info Kelas -->
            <div>
                <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                    <tbody>
                        <tr>
                            <td class="py-1 w-48 font-medium">No Induk Siswa</td>
                            <td class="py-1 w-4">:</td>
                            <td class="py-1">{{ Auth::user()->no_induk }}</td>
                        </tr>
                        <tr>
                            <td class="py-1 font-medium">Nama Siswa</td>
                            <td class="py-1">:</td>
                            <td class="py-1">{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <td class="py-1 font-medium">Nama Kelas</td>
                            <td class="py-1">:</td>
                            <td class="py-1">{{ $kelas->nama_kelas }}</td>
                        </tr>
                        <tr>
                            <td class="py-1 font-medium">Wali Kelas</td>
                            <td class="py-1">:</td>
                            <td class="py-1">{{ $kelas->guru->nama_guru }}</td>
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
                        <tr>
                            <td class="py-1 font-medium">Tahun Pelajaran</td>
                            <td class="py-1">:</td>
                            <td class="py-1">{{ $bulan > 6 ? "$tahun/" . ($tahun + 1) : $tahun - 1 . "/$tahun" }}</td>
                        </tr>
                    </tbody>
                </table>
                <hr class="my-4 border-t border-gray-200 dark:border-gray-700">
            </div>

            <!-- Tabel Nilai -->
            <div class="overflow-x-auto">
                <table
                    class="min-w-full text-sm text-left border border-gray-200 dark:border-gray-700 divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300">
                        <tr>
                            <th class="px-4 py-2 text-center">No.</th>
                            <th class="px-4 py-2">Mata Pelajaran</th>
                            <th class="px-4 py-2 text-center">ULHA 1</th>
                            <th class="px-4 py-2 text-center">ULHA 2</th>
                            <th class="px-4 py-2 text-center">UTS</th>
                            <th class="px-4 py-2 text-center">ULHA 3</th>
                            <th class="px-4 py-2 text-center">UAS</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-100 dark:divide-gray-800">
                        @foreach ($mapel as $val => $dataMapel)
                            @php
                                $dataMapel = $dataMapel[0];
                            @endphp
                            <tr class="dark:text-white">
                                <td class="px-4 py-2 text-center">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2">{{ $dataMapel->mapel->nama_mapel }}</td>

                                @foreach (['ulha_1', 'ulha_2', 'uts', 'ulha_3', 'uas'] as $key)
                                    @php
                                        $nilai = optional($dataMapel->ulangan($val))[$key] ?? null;
                                    @endphp
                                    <td class="px-4 py-2 text-center">
                                        {{ $nilai !== null ? $nilai : '-' }}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

{{-- @extends('template_backend.home')
@section('heading', 'Nilai Rapot')
@section('page')
  <li class="breadcrumb-item active">Nilai Rapot</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Nilai Rapot Siswa</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
        @csrf
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
                <table class="table" style="margin-top: -10px;">
                    <tr>
                        <td>No Induk Siswa</td>
                        <td>:</td>
                        <td>{{ Auth::user()->no_induk }}</td>
                    </tr>
                    <tr>
                        <td>Nama Siswa</td>
                        <td>:</td>
                        <td class="text-capitalize">{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <td>Nama Kelas</td>
                        <td>:</td>
                        <td>{{ $kelas->nama_kelas }}</td>
                    </tr>
                    <tr>
                        <td>Wali Kelas</td>
                        <td>:</td>
                        <td>{{ $kelas->guru->nama_guru }}</td>
                    </tr>
                    @php
                        $bulan = date('m');
                        $tahun = date('Y');
                    @endphp
                    <tr>
                        <td>Semester</td>
                        <td>:</td>
                        <td>
                            @if ($bulan > 6)
                                {{ 'Semester Ganjil' }}
                            @else
                                {{ 'Semester Genap' }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Tahun Pelajaran</td>
                        <td>:</td>
                        <td>
                            @if ($bulan > 6)
                                {{ $tahun }}/{{ $tahun+1 }}
                            @else
                                {{ $tahun-1 }}/{{ $tahun }}
                            @endif
                        </td>
                    </tr>
                </table>
                <hr>
            </div>
            <div class="col-md-12">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="ctr">No.</th>
                            <th>Mata Pelajaran</th>
                            <th class="ctr">ULHA 1</th>
                            <th class="ctr">ULHA 2</th>
                            <th class="ctr">UTS</th>
                            <th class="ctr">ULHA 3</th>
                            <th class="ctr">UAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mapel as $val => $data)
                            <tr>
                                <?php $data = $data[0]; ?>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->mapel->nama_mapel }}</td>
                                <td class="ctr">{{ ($data->ulangan($val)) ? $data->ulangan($val)['ulha_1'] : " - " }}</td>
                                <td class="ctr">{{ ($data->ulangan($val)) ? $data->ulangan($val)['ulha_2'] : " - " }}</td>
                                <td class="ctr">{{ ($data->ulangan($val)) ? $data->ulangan($val)['uts'] : " - " }}</td>
                                <td class="ctr">{{ ($data->ulangan($val)) ? $data->ulangan($val)['ulha_3'] : " - " }}</td>
                                <td class="ctr">{{ ($data->ulangan($val)) ? $data->ulangan($val)['uas'] : " - " }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection
@section('script')
    <script>
        $("#UlanganSiswa").addClass("active");
    </script>
@endsection --}}
