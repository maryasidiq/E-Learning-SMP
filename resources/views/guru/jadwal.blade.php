{{-- @extends('template_backend.home')
@section('heading', 'Jadwal Guru')
@section('heading')
Jadwal Guru {{ Auth::user()->guru(Auth::user()->id_card) ? Auth::user()->guru(Auth::user()->id_card)->nama_guru :
Auth::user()->name }}
@endsection
@section('page')
<li class="breadcrumb-item active">Jadwal Guru</li>
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <table id="example2" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Kelas</th>
                        <th>Jam Mengajar</th>
                        <th>Ruang Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal as $data)
                    <tr>
                        <td>{{ $data->hari->nama_hari }}</td>
                        <td>{{ $data->kelas->nama_kelas }}</td>
                        <td>{{ $data->jam_mulai }} - {{ $data->jam_selesai }}</td>
                        <td>{{ $data->ruang->nama_ruang }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->
@endsection
@section('script')
<script>
    $("#JadwalGuru").addClass("active");
</script>
@endsection --}}

@extends('layouts.app2')
@section('pageTitle', 'Jadwal Mengajar')
@section('title', 'Jadwal Mengajar')
@section('content')
    <h1 class="text-2xl mb-4 dark:text-gray-300">List Jadwal Mengajar</h1>
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="max-w-full overflow-x-auto">
            <table class="min-w-full">
                <!-- table header start -->
                <thead>
                    <tr class="border-b border-gray-100 dark:border-gray-800">
                        <th class="px-5 py-3 sm:px-6">
                            <div class="flex items-center">
                                <p class="font-bold text-theme-sm dark:text-gray-300">
                                    Hari
                                </p>
                            </div>
                        </th>
                        <th class="px-5 py-3 sm:px-6">
                            <div class="flex items-center">
                                <p class="font-bold text-theme-sm dark:text-gray-300">
                                    Mapel
                                </p>
                            </div>
                        </th>
                        <th class="px-5 py-3 sm:px-6">
                            <div class="flex items-center">
                                <p class="font-bold text-theme-sm dark:text-gray-300">
                                    Kelas
                                </p>
                            </div>
                        </th>
                        <th class="px-5 py-3 sm:px-6">
                            <div class="flex items-center">
                                <p class="font-bold text-theme-sm dark:text-gray-300">
                                    Jam Mengajar
                                </p>
                            </div>
                        </th>
                        <th class="px-5 py-3 sm:px-6">
                            <div class="flex items-center">
                                <p class="font-bold text-theme-sm dark:text-gray-300">
                                    Ruang Kelas
                                </p>
                            </div>
                        </th>
                    </tr>
                </thead>
                <!-- table header end -->
                <!-- table body start -->
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                    @foreach ($jadwal as $data)
                        <tr>
                            <td class="px-5 py-4 sm:px-6">
                                <span class="text-gray-800 text-theme-sm dark:text-gray-400">
                                    {{ $data->hari->nama_hari }}
                                </span>
                            </td>
                            <td class="px-5 py-4 sm:px-6">
                                <span class="text-gray-800 text-theme-sm dark:text-gray-400">
                                    {{ $data->mapel->nama_mapel }}
                                </span>
                            </td>
                            <td class="px-5 py-4 sm:px-6">
                                <div class="flex flex-col">
                                    <span class="text-gray-800 text-theme-sm dark:text-gray-400">
                                        {{ $data->kelas->nama_kelas }}
                                    </span>
                                    <small
                                        class="text-gray-500 text-theme-sm dark:text-gray-400">{{ $data->guru->nama_guru }}</small>
                                </div>
                            </td>
                            <td class="px-5 py-4 sm:px-6">
                                <span class="text-gray-800 text-theme-sm dark:text-gray-400">
                                    {{ $data->jam_mulai . ' - ' . $data->jam_selesai }}
                                </span>
                            </td>
                            <td class="px-5 py-4 sm:px-6">
                                <span class="text-gray-800 text-theme-sm dark:text-gray-400">
                                    {{ $data->ruang->nama_ruang }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection