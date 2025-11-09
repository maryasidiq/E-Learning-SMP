@extends('layouts.app2')
@section('pageTitle', 'Entry Nilai')
@section('title', 'Entry Nilai')
@section('content')
    <h1 class="text-2xl mb-4 dark:text-gray-300">Pilih Mata Pelajaran</h1>
    <div class="w-full">
        <div class="card">
            <div class="p-4 bg-white dark:bg-gray-900 shadow space-y-4">
                <!-- Identitas Guru -->
                <div class="mb-4">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 dark:border-gray-700 text-sm">
                        <tbody
                            class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-800 dark:text-gray-300">
                            <tr>
                                <td class="px-6 py-3 font-medium w-48">Nama Guru</td>
                                <td class="px-6 py-3 w-4">:</td>
                                <td class="px-6 py-3">{{ $guru->nama_guru }}</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-3 font-medium">Mata Pelajaran</td>
                                <td class="px-6 py-3">:</td>
                                <td class="px-6 py-3">{{ $guru->mapel->pluck('nama_mapel')->join(', ') }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr class="my-4 border-t border-gray-200 dark:border-gray-700">
                </div>

                <!-- Tabel Daftar Mapel -->
                <div class="overflow-x-auto">
                    <table
                        class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 border border-gray-200 dark:border-gray-700 text-sm">
                        <thead class="bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300">
                            <tr>
                                <th class="px-6 py-3 text-left font-semibold">No.</th>
                                <th class="px-6 py-3 text-left font-semibold">Nama Mata Pelajaran</th>
                                <th class="px-6 py-3 text-left font-semibold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody
                            class="bg-white dark:bg-gray-900 divide-y divide-gray-100 dark:divide-gray-800 dark:text-gray-300">
                            @foreach ($mapel as $mapel_id => $jadwals)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                    <td class="px-6 py-3">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-3">{{ $jadwals->first()->mapel->nama_mapel }}</td>
                                    <td class="px-6 py-3">
                                        <a href="{{ route('nilai.show', Crypt::encrypt($mapel_id)) }}"
                                            class="inline-flex items-center gap-2 px-3 py-1.5 text-sm font-medium text-white rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600 dark:bg-brand-800 dark:hover:bg-brand-700">
                                            Entry Nilai
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="lucide lucide-pen-icon lucide-pen">
                                                <path
                                                    d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection