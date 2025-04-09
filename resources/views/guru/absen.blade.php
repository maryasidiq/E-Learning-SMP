{{-- @extends('template_backend.home')
@section('heading', 'Absen Harian Guru')
@section('page')
  <li class="breadcrumb-item active">Absen Harian guru</li>
@endsection
@section('content')
@php
    $no = 1;
@endphp
<div class="col-md-6">
    <div class="card">
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Guru</th>
                    <th>Ket.</th>
                    <th width="80px">Jam Absen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absen as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->guru->nama_guru }}</td>
                        <td>{{ $data->kehadiran->ket }}</td>
                        <td>{{ $data->created_at->format('H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Absen Harian Guru</h3>
      </div>
      <form action="{{ route('absen.simpan') }}" method="post">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="id_card">Nomor ID Card</label>
                <input type="text" id="id_card" name="id_card" maxlength="5" onkeypress="return inputAngka(event)" class="form-control @error('id_card') is-invalid @enderror">
            </div>
            <div class="form-group">
              <label for="kehadiran_id">Keterangan Kehadiran</label>
              <select id="kehadiran_id" type="text" class="form-control @error('kehadiran_id') is-invalid @enderror select2bs4" name="kehadiran_id">
                <option value="">-- Pilih Keterangan Kehadiran --</option>
                @foreach ($kehadiran as $data)
                  <option value="{{ $data->id }}">{{ $data->ket }}</option>
                @endforeach
              </select>
            </div>
        </div>
        <div class="card-footer">
          <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Absen</button>
        </div>
      </form>
    </div>
</div>
@endsection
@section('script')
    <script>
        $("#AbsenGuru").addClass("active");
    </script>
@endsection --}}

@extends('layouts.app2')
@section('pageTitle', 'Absen Guru')
@section('title', 'Absen Guru')
@section('content')
    <h1 class="text-2xl mb-4 dark:text-gray-300">Absen Harian Guru</h1>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Table Section -->
        <div
            class="overflow-hidden h-fit rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="max-w-full overflow-x-auto">
                <table class="min-w-full">
                    <!-- table header start -->
                    <thead>
                        <tr class="border-b border-gray-100 dark:border-gray-800">
                            <th class="px-5 py-3 sm:px-6">
                                <p class="font-bold text-theme-sm dark:text-gray-300">No</p>
                            </th>
                            <th class="px-5 py-3 sm:px-6">
                                <p class="font-bold text-theme-sm dark:text-gray-300">Nama Guru</p>
                            </th>
                            <th class="px-5 py-3 sm:px-6">
                                <p class="font-bold text-theme-sm dark:text-gray-300">Ket.</p>
                            </th>
                            <th class="px-5 py-3 sm:px-6">
                                <p class="font-bold text-theme-sm dark:text-gray-300">Jam Absen</p>
                            </th>
                        </tr>
                    </thead>
                    <!-- table header end -->
                    <!-- table body start -->
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                        @php
                            $no = 1;
                        @endphp
                        @if ($absen->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center py-4 text-gray-500">Tidak ada data absen</td>
                            </tr>
                        @else
                            @foreach ($absen as $data)
                                <tr>
                                    <td class="px-5 py-4 sm:px-6">
                                        <span class="text-gray-800 text-theme-sm dark:text-gray-400">
                                            {{ $no++ }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <span class="text-gray-800 text-theme-sm dark:text-gray-400">
                                            {{ $data->guru->nama_guru }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <span class="text-gray-800 text-theme-sm dark:text-gray-400">
                                            {{ $data->kehadiran->ket }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <span class="text-gray-800 text-theme-sm dark:text-gray-400">
                                            {{ $data->created_at->format('H:i:s') }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <!-- table body end -->
                </table>
            </div>
            <div class="flex justify-end items-center px-5 py-4 sm:px-6 border-t border-gray-100 dark:border-gray-800">
                {{ $absen->links('vendor.pagination.tailwind') }}
            </div>
        </div>

        <!-- Form Section -->
        <!-- Form Section -->
        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="bg-primary dark:text-white px-6 py-4 rounded-t-xl">
                <h3 class="text-lg font-semibold">Absen Harian Guru</h3>
            </div>

            <form action="{{ route('absen.simpan') }}" method="POST">
                @csrf
                <div class="px-6 py-4 space-y-4">
                    <!-- ID Card Input -->
                    <div>
                        <label for="id_card" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nomor ID
                            Card</label>
                        <input type="text" id="id_card" name="id_card" maxlength="5"
                            onkeypress="return inputAngka(event)"
                            class="mt-1 px-4 py-2 block w-full rounded-md border border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:border-primary focus:ring focus:ring-primary/30 text-sm @error('id_card') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror">
                    </div>

                    <!-- Kehadiran Select -->
                    <div>
                        <label for="kehadiran_id"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Keterangan Kehadiran</label>
                        <select id="kehadiran_id" name="kehadiran_id"
                            class="mt-1 px-4 py-2 block w-full rounded-md border border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:border-primary focus:ring focus:ring-primary/30 text-sm @error('kehadiran_id') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror">
                            <option value="">-- Pilih Keterangan Kehadiran --</option>
                            @foreach ($kehadiran as $data)
                                <option value="{{ $data->id }}">{{ $data->ket }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="bg-gray-50 dark:bg-white/[0.02] px-6 py-4 rounded-b-xl">
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600 dark:bg-brand-800 dark:hover:bg-brand-700">
                        Simpan
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-save-icon lucide-save">
                            <path
                                d="M15.2 3a2 2 0 0 1 1.4.6l3.8 3.8a2 2 0 0 1 .6 1.4V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z" />
                            <path d="M17 21v-7a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v7" />
                            <path d="M7 3v4a1 1 0 0 0 1 1h7" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
