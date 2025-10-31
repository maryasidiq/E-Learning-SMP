@extends('layouts.app2')
@section('pageTitle', 'Detail Soal')
@section('title', 'Detail Soal')
@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div
            class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 rounded-xl p-8 mb-8 text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-black/10"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-3xl font-bold">{{ $soal->judul }}</h1>
                                <p class="text-indigo-100 text-lg">Detail Soal</p>
                            </div>
                        </div>
                        @if($soal->deskripsi)
                            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 border border-white/20">
                                <p class="text-indigo-50 leading-relaxed">{!! $soal->deskripsi !!}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Info Soal Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-6 mb-8">
            <div
                class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 p-6 rounded-xl border border-blue-200 dark:border-blue-800 hover:shadow-lg transition-all duration-300">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-blue-500 dark:bg-gray-800 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-blue-700 dark:text-white">Mata Pelajaran</h3>
                        <p class="text-lg font-bold text-blue-900 dark:text-white">{{ $soal->mapel->nama_mapel }}</p>
                    </div>
                </div>
            </div>

            <div
                class="bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 p-6 rounded-xl border border-green-200 dark:border-green-800 hover:shadow-lg transition-all duration-300">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-green-500 dark:bg-gray-800 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-green-700 dark:text-white">Kelas</h3>
                        <p class="text-lg font-bold text-green-900 dark:text-white">{{ $soal->kelas->nama_kelas }}</p>
                    </div>
                </div>
            </div>

            <div
                class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 p-6 rounded-xl border border-purple-200 dark:border-purple-800 hover:shadow-lg transition-all duration-300">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-purple-500 dark:bg-gray-800 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-purple-700 dark:text-white">Waktu Mulai</h3>
                        <p class="text-lg font-bold text-purple-900 dark:text-white">
                            {{ \Carbon\Carbon::parse($soal->waktu_mulai)->format('d/m/Y H:i') }}
                        </p>
                    </div>
                </div>
            </div>

            <div
                class="bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 p-6 rounded-xl border border-orange-200 dark:border-orange-800 hover:shadow-lg transition-all duration-300">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-orange-500 dark:bg-gray-800 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-orange-700 dark:text-white">Waktu Selesai</h3>
                        <p class="text-lg font-bold text-orange-900 dark:text-white">
                            {{ \Carbon\Carbon::parse($soal->waktu_selesai)->format('d/m/Y H:i') }}
                        </p>
                    </div>
                </div>
            </div>

            <div
                class="bg-gradient-to-br from-red-50 to-red-100 dark:from-red-900/20 dark:to-red-800/20 p-6 rounded-xl border border-red-200 dark:border-red-800 hover:shadow-lg transition-all duration-300">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-red-500 dark:bg-gray-800 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-red-700 dark:text-white">Durasi</h3>
                        <p class="text-lg font-bold text-red-900 dark:text-white">{{ $soal->durasi }} menit</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status Pengerjaan -->
        <div class="mb-8">
            @if($sudahMengerjakan)
                <div
                    class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 border border-green-200 dark:border-green-800 p-6 rounded-xl">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-green-800 dark:text-green-200">Soal Selesai</h3>
                            <p class="text-green-600 dark:text-green-400">Anda sudah mengerjakan Soal ini</p>
                        </div>
                    </div>
                    @php
                        $siswa = Auth::user()->siswa(Auth::user()->no_induk);
                        $nilaiAkhir = \App\JawabanSoal::where('Soal_id', $soal->id)
                            ->where('siswa_id', $siswa->id)
                            ->first()->nilai_akhir ?? 0;
                    @endphp
                    @if($soal->show_nilai ?? false)
                        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-green-200 dark:border-green-700">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Nilai Anda:</span>
                                </div>
                                <span
                                    class="text-2xl font-bold {{ $nilaiAkhir >= 70 ? 'text-green-600' : ($nilaiAkhir >= 50 ? 'text-yellow-600' : 'text-red-600') }}">
                                    {{ number_format($nilaiAkhir, 1) }}
                                </span>
                            </div>
                        </div>
                    @endif
                </div>
            @else
                <div
                    class="bg-gradient-to-r from-yellow-50 to-amber-50 dark:from-yellow-900/20 dark:to-amber-900/20 border border-yellow-200 dark:border-yellow-800 p-6 rounded-xl">
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-yellow-500 rounded-xl flex items-center justify-center mr-4">
                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-yellow-800 dark:text-yellow-200">Belum Dikerjakan</h3>
                            <p class="text-yellow-600 dark:text-yellow-400">Anda belum mengerjakan Soal ini</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
            <a href="{{ route('soal.siswa') }}"
                class="inline-flex items-center px-6 py-3 bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-xl font-semibold text-sm text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-700 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Kembali ke Daftar Soal
            </a>

            @if(!$sudahMengerjakan)
                <a href="{{ route('soal.siswa.kerjakan', Crypt::encrypt($soal->id)) }}"
                    class="inline-flex items-center px-8 py-3 bg-gradient-to-r from-green-600 to-emerald-600 border border-transparent rounded-xl font-semibold text-sm text-white uppercase tracking-widest hover:from-green-700 hover:to-emerald-700 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-300 transform hover:scale-105"
                    onclick="return confirm('Apakah Anda yakin ingin memulai Soal? Setelah memulai, Anda akan memiliki waktu {{ $soal->durasi }} menit untuk menyelesaikan Soal ini. Pastikan koneksi internet Anda stabil dan jangan refresh halaman selama mengerjakan Soal.')">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1.586a1 1 0 01.707.293l.707.707A1 1 0 0012.414 11H13m-3 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    Mulai Mengerjakan
                </a>
            @endif
        </div>
    </div>
@endsection