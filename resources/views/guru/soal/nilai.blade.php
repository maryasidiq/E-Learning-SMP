@extends('layouts.app2')
@section('pageTitle', 'Nilai Soal')
@section('title', 'Nilai Soal')
@section('content')
    <!-- Header Section -->
    <div
    class="max-w-7xl mx-auto
    bg-gradient-to-br from-blue-600 via-purple-700 to-indigo-800 
    dark:from-blue-800 dark:via-purple-900 dark:to-indigo-900 
    rounded-2xl p-8 mb-8 text-white shadow-2xl relative overflow-hidden">

        <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent"></div>
        <div class="relative z-10 flex items-center justify-between">
            <div class="animate-fade-in">
                <h1
                    class="text-4xl font-extrabold mb-3 bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent">
                    Nilai Soal</h1>
                <p class="text-blue-100 text-xl font-medium">{{ $soal->judul }}</p>
                @if($soal->deskripsi)
                    <p class="text-blue-100/80 text-lg mt-2">{!! $soal->deskripsi !!}</p>
                @endif
                <div class="mt-4 flex items-center space-x-4">
                    <div class="flex items-center bg-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm font-medium">Hasil Penilaian</span>
                    </div>
                </div>
            </div>
            <div class="hidden md:block animate-bounce-slow">
                <div class="relative">
                    <svg class="w-20 h-20 text-white/80 drop-shadow-lg" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                        </path>
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

    <div class="max-w-7xl mx-auto bg-white dark:bg-white/[0.03] rounded-xl border border-gray-200 dark:border-gray-800 p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Mata Pelajaran</h3>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-300">{{ $soal->mapel->nama_mapel }}</p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Kelas</h3>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-300">{{ $soal->kelas->nama_kelas }}</p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Jumlah Siswa</h3>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-300">{{ $totalSiswa }}</p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Rata-rata Nilai</h3>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-300">{{ number_format($rataRata, 1) }}</p>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 p-4 rounded-lg border border-green-200 dark:border-green-800">
                <div class="flex items-center">
                    <div class="p-2 bg-green-100 dark:bg-green-800 rounded-lg">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-600 dark:text-green-400">Nilai Tertinggi</p>
                        <p class="text-2xl font-bold text-green-700 dark:text-green-300">{{ number_format($nilaiTertinggi, 1) }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 p-4 rounded-lg border border-blue-200 dark:border-blue-800">
                <div class="flex items-center">
                    <div class="p-2 bg-blue-100 dark:bg-blue-800 rounded-lg">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-blue-600 dark:text-blue-400">Total Siswa</p>
                        <p class="text-2xl font-bold text-blue-700 dark:text-blue-300">{{ $totalSiswa }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-gradient-to-r from-red-50 to-rose-50 dark:from-red-900/20 dark:to-rose-900/20 p-4 rounded-lg border border-red-200 dark:border-red-800">
                <div class="flex items-center">
                    <div class="p-2 bg-red-100 dark:bg-red-800 rounded-lg">
                        <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-red-600 dark:text-red-400">Nilai Terendah</p>
                        <p class="text-2xl font-bold text-red-700 dark:text-red-300">{{ number_format($nilaiTerendah, 1) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        @if($totalSiswa > 0)
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <!-- Pie Chart -->
            <div class="bg-white dark:bg-white/[0.03] rounded-xl border border-gray-200 dark:border-gray-800 p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-300 mb-4">Distribusi Status Kelulusan</h3>
                <div class="h-64">
                    <canvas id="statusChart"></canvas>
                </div>
            </div>

            <!-- Histogram -->
            <div class="bg-white dark:bg-white/[0.03] rounded-xl border border-gray-200 dark:border-gray-800 p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-300 mb-4">Distribusi Nilai</h3>
                <div class="h-64">
                    <canvas id="histogramChart"></canvas>
                </div>
            </div>
        </div>
        @endif

        <!-- Daftar Nilai Siswa -->
        @if($nilaiSiswa->count() > 0)
            <!-- Desktop Table View -->
            <div class="hidden md:block overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03] shadow-sm">
                <div class="max-w-full overflow-x-auto">
                    <table class="min-w-full">
                        <!-- table header start -->
                        <thead>
                            <tr class="border-b border-gray-100 dark:border-gray-800 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-gray-800 dark:to-gray-700">
                                <th class="px-6 py-4">
                                    <div class="flex items-center">
                                        <p class="font-bold text-sm dark:text-gray-300 text-gray-700">
                                            No
                                        </p>
                                    </div>
                                </th>
                                <th class="px-6 py-4">
                                    <div class="flex items-center">
                                        <p class="font-bold text-sm dark:text-gray-300 text-gray-700">
                                            Nama Siswa
                                        </p>
                                    </div>
                                </th>
                                <th class="px-6 py-4">
                                    <div class="flex items-center">
                                        <p class="font-bold text-sm dark:text-gray-300 text-gray-700">
                                            No Induk
                                        </p>
                                    </div>
                                </th>
                                <th class="px-6 py-4">
                                    <div class="flex items-center">
                                        <p class="font-bold text-sm dark:text-gray-300 text-gray-700">
                                            Jumlah Soal
                                        </p>
                                    </div>
                                </th>
                                <th class="px-6 py-4">
                                    <div class="flex items-center">
                                        <p class="font-bold text-sm dark:text-gray-300 text-gray-700">
                                            Nilai Akhir
                                        </p>
                                    </div>
                                </th>
                                <th class="px-6 py-4">
                                    <div class="flex items-center">
                                        <p class="font-bold text-sm dark:text-gray-300 text-gray-700">
                                            Status
                                        </p>
                                    </div>
                                </th>
                                <th class="px-6 py-4">
                                    <div class="flex items-center">
                                        <p class="font-bold text-sm dark:text-gray-300 text-gray-700">
                                            Aksi
                                        </p>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <!-- table header end -->
                        <!-- table body start -->
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                            @foreach($nilaiSiswa as $index => $data)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/30 transition-colors duration-150">
                                    <td class="px-6 py-4">
                                        <span class="text-gray-800 text-sm dark:text-gray-400 font-medium">
                                            {{ $index + 1 }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center mr-3">
                                                <span class="text-white text-xs font-bold">{{ strtoupper(substr($data['siswa']->nama_siswa, 0, 1)) }}</span>
                                            </div>
                                            <span class="text-gray-800 text-sm dark:text-gray-400 font-medium">
                                                {{ $data['siswa']->nama_siswa }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-gray-800 text-sm dark:text-gray-400">
                                            {{ $data['siswa']->no_induk }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-gray-800 text-sm dark:text-gray-400">
                                            {{ $data['jumlah_soal'] }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <span class="text-2xl font-bold {{ $data['nilai_akhir'] >= 70 ? 'text-green-600' : ($data['nilai_akhir'] >= 50 ? 'text-yellow-600' : 'text-red-600') }} mr-2">
                                                {{ number_format($data['nilai_akhir'], 1) }}
                                            </span>
                                            <span class="text-xs text-gray-500">/100</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($data['nilai_akhir'] >= 70)
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800 border border-green-200">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                                </svg>
                                                Lulus
                                            </span>
                                        @elseif($data['nilai_akhir'] >= 50)
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800 border border-yellow-200">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                                Remedial
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800 border border-red-200">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                                Tidak Lulus
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('soal.detail-jawaban', [Crypt::encrypt($soal->id), Crypt::encrypt($data['siswa']->id)]) }}"
                                            class="inline-flex items-center px-3 py-2 bg-blue-100 hover:bg-blue-200 text-blue-800 text-xs font-medium rounded-lg transition-colors duration-200">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            Lihat Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Mobile Card View -->
            <div class="md:hidden space-y-4">
                @foreach($nilaiSiswa as $index => $data)
                    <div class="bg-white dark:bg-white/[0.03] rounded-xl border border-gray-200 dark:border-gray-800 p-4 shadow-sm hover:shadow-md transition-shadow duration-150">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center mr-3">
                                    <span class="text-white text-sm font-bold">{{ strtoupper(substr($data['siswa']->nama_siswa, 0, 1)) }}</span>
                                </div>
                                <div>
                                    <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-300">{{ $data['siswa']->nama_siswa }}</h3>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">{{ $data['siswa']->no_induk }}</p>
                                </div>
                            </div>
                            <span class="text-xs text-gray-500 dark:text-gray-400">#{{ $index + 1 }}</span>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-3">
                            <div class="text-center">
                                <p class="text-xs text-gray-500 dark:text-gray-400">Jumlah Soal</p>
                                <p class="text-lg font-semibold text-gray-900 dark:text-gray-300">{{ $data['jumlah_soal'] }}</p>
                            </div>
                            <div class="text-center">
                                <p class="text-xs text-gray-500 dark:text-gray-400">Nilai Akhir</p>
                                <p class="text-2xl font-bold {{ $data['nilai_akhir'] >= 70 ? 'text-green-600' : ($data['nilai_akhir'] >= 50 ? 'text-yellow-600' : 'text-red-600') }}">
                                    {{ number_format($data['nilai_akhir'], 1) }}
                                </p>
                            </div>
                        </div>

                        <div class="flex justify-center">
                            @if($data['nilai_akhir'] >= 70)
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-green-100 text-green-800 border border-green-200">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                    Lulus
                                </span>
                            @elseif($data['nilai_akhir'] >= 50)
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-yellow-100 text-yellow-800 border border-yellow-200">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    Remedial
                                </span>
                            @else
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-red-100 text-red-800 border border-red-200">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    Tidak Lulus
                                </span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                    </path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-300">Belum ada siswa yang mengerjakan soal</h3>
                <p class="mt-1 text-sm text-gray-500">Nilai akan muncul setelah siswa menyelesaikan soal.</p>
            </div>
        @endif
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8 mt-8">

        <!-- Tombol 1 -->
        <form action="{{ route('soal.toggle-nilai-visibility', Crypt::encrypt($soal->id)) }}"
              method="POST" class="w-full">
            @csrf
            @method('POST')

            <button type="submit"
                class="group w-full inline-flex items-center justify-center px-6 py-4
                    {{ $soal->show_nilai 
                        ? 'bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 focus:ring-red-500/25' 
                        : 'bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 focus:ring-green-500/25' 
                    }}
                    border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest
                    shadow-lg hover:shadow-xl
                    focus:ring-4 focus:ring-offset-2
                    transition-all duration-300 transform
                    hover:scale-[1.02] hover:-translate-y-0.5
                    relative overflow-hidden">

                <div class="absolute inset-0 bg-gradient-to-r
                    from-white/0 via-white/10 to-white/0
                    -translate-x-full group-hover:translate-x-full
                    transition-transform duration-700"></div>

                @if($soal->show_nilai)
                    <span class="relative z-10">Sembunyikan Nilai</span>
                @else
                    <span class="relative z-10">Tampilkan Nilai</span>
                @endif
            </button>
        </form>

        <!-- Tombol 2 -->
        <a href="{{ route('soal.index') }}"
            class="group w-full inline-flex items-center justify-center px-6 py-4
                bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800
                border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest
                shadow-lg hover:shadow-xl
                focus:ring-4 focus:ring-gray-500/25 focus:ring-offset-2
                transition-all duration-300 transform
                hover:scale-[1.02] hover:-translate-y-0.5
                relative overflow-hidden">

            <div class="absolute inset-0 bg-gradient-to-r
                from-white/0 via-white/10 to-white/0
                -translate-x-full group-hover:translate-x-full
                transition-transform duration-700"></div>

            <span class="relative z-10">Kembali</span>
        </a>
    </div>
</div>



@endsection

@section('script')
@if($totalSiswa > 0)
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script>
$(document).ready(function() {
    // Status Chart (Pie Chart)
    const statusCtx = document.getElementById('statusChart').getContext('2d');
    const statusChart = new Chart(statusCtx, {
        type: 'doughnut',
        data: {
            labels: @json($chartData['labels']),
            datasets: [{
                data: @json($chartData['data']),
                backgroundColor: @json($chartData['backgroundColor']),
                borderColor: @json($chartData['borderColor']),
                borderWidth: 2,
                hoverBorderWidth: 3,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true,
                        font: {
                            size: 12
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.parsed || 0;
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = total > 0 ? Math.round((value / total) * 100) : 0;
                            return `${label}: ${value} siswa (${percentage}%)`;
                        }
                    }
                }
            },
            cutout: '60%'
        }
    });

    // Histogram Chart
    const histogramCtx = document.getElementById('histogramChart').getContext('2d');
    const histogramChart = new Chart(histogramCtx, {
        type: 'bar',
        data: {
            labels: @json($histogramData['labels']),
            datasets: [{
                label: 'Jumlah Siswa',
                data: @json($histogramData['data']),
                backgroundColor: 'rgba(59, 130, 246, 0.8)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1,
                borderRadius: 4,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        font: {
                            size: 12
                        }
                    },
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)'
                    }
                },
                x: {
                    ticks: {
                        font: {
                            size: 11
                        }
                    },
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return `Jumlah Siswa: ${context.parsed.y}`;
                        }
                    }
                }
            },
            animation: {
                duration: 1000,
                easing: 'easeInOutQuart'
            }
        }
    });
});
</script>
@endif
@endsection
