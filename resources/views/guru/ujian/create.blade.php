@extends('layouts.app2')
@section('pageTitle', 'Tambah Ujian')
@section('title', 'Tambah Ujian')
@section('content')
    <div class="max-w-4xl mx-auto bg-white dark:bg-white/[0.03] rounded-xl border border-gray-200 dark:border-gray-800 p-6">
        <h1 class="text-2xl mb-6 dark:text-gray-300">Tambah Ujian Baru</h1>

        <form action="{{ route('ujian.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul Ujian</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul') }}"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
                @error('judul')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="3"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{!! old('deskripsi') !!}</textarea>
                @error('deskripsi')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="mapel_kelas" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mata Pelajaran
                    dan Kelas</label>
                <select id="mapel_kelas" name="mapel_kelas"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
                    <option value="">Pilih Mata Pelajaran dan Kelas</option>
                    @foreach($mapelKelas as $item)
                        <option value="{{ $item->mapel_id }}-{{ $item->kelas_id }}" {{ old('mapel_kelas') == $item->mapel_id . '-' . $item->kelas_id ? 'selected' : '' }}>{{ $item->nama_mapel }} - {{ $item->nama_kelas }}</option>
                    @endforeach
                </select>
                @error('mapel_kelas')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="waktu_mulai" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Waktu
                        Mulai</label>
                    <input type="datetime-local" id="waktu_mulai" name="waktu_mulai" value="{{ old('waktu_mulai') }}"
                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                    @error('waktu_mulai')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="waktu_selesai" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Waktu
                        Selesai</label>
                    <input type="datetime-local" id="waktu_selesai" name="waktu_selesai" value="{{ old('waktu_selesai') }}"
                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                    @error('waktu_selesai')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="durasi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Durasi
                        (menit)</label>
                    <input type="number" id="durasi" name="durasi" value="{{ old('durasi') }}" min="1"
                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                    @error('durasi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('ujian.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Kembali
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection