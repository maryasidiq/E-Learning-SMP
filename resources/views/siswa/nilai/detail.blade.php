@extends('layouts.app2')
@section('pageTitle', 'Detail Nilai')
@section('title', 'Detail Nilai')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div
            class="bg-gradient-to-br from-[#CB1C8D] to-[#F56EB3] dark:from-[#CB1C8D] dark:to-[#F56EB3] rounded-2xl p-8 mb-8 text-white shadow-2xl relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent"></div>
            <div class="relative z-10 flex items-center justify-between">
                <div class="animate-fade-in">
                    <h1 class="text-4xl font-extrabold mb-3 text-white">Detail Nilai Akademik</h1>
                    <p class="text-pink-100 text-xl font-medium">Detail nilai untuk
                        {{ $nilaiTotal->mapel->nama_mapel ?? 'N/A' }}</p>
                    <div class="mt-4 flex items-center space-x-4">
                        <a href="{{ route('nilai.siswa') }}"
                            class="flex items-center bg-white/20 rounded-full px-4 py-2 backdrop-blur-sm hover:bg-white/30 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                                </path>
                            </svg>
                            <span class="text-sm font-medium">Kembali</span>
                        </a>
                    </div>
                </div>

                <div class="hidden md:block animate-bounce-slow">
                    <div class="relative">
                        <svg class="w-20 h-20 text-white/80 drop-shadow-lg" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12l2 2 4-4m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
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

        {{-- Notifikasi --}}
        @if(session('success'))
            <div class="mb-6 bg-pink-50 dark:bg-pink-900/20 border border-pink-200 dark:border-pink-800 p-4 rounded-xl">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-[#CB1C8D] dark:text-[#F56EB3] mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-[#CB1C8D] dark:text-[#F56EB3] font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        {{-- Detail Nilai --}}
        <div
            class="bg-white dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 shadow-2xl overflow-hidden relative">
            <div class="absolute inset-0 bg-gradient-to-r from-[#CB1C8D]/20 to-[#F56EB3]/20 rounded-2xl opacity-50"></div>

            <!-- Header -->
            <div class="relative bg-gradient-to-br from-[#CB1C8D] to-[#F56EB3] p-6 text-white">
                <div class="absolute inset-0 bg-black/10"></div>
                <div class="relative flex justify-between items-start">
                    <div class="flex items-center">
                        <div
                            class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mr-4 shadow-lg">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white mb-1">{{ $nilaiTotal->mapel->nama_mapel ?? 'N/A' }}</h3>
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white/20 text-white backdrop-blur-sm">
                                Detail Nilai Akademik
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Body -->
            <div class="relative p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700/30 rounded-xl">
                        <div class="flex items-center">
                            <div
                                class="w-10 h-10 bg-[#F56EB3]/20 dark:bg-[#CB1C8D]/20 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-[#CB1C8D] dark:text-[#F56EB3]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Rata-rata Nilai
                                </p>
                                <p class="font-semibold text-gray-900 dark:text-white text-xl">
                                    {{ number_format($nilaiTotal->rata_rata, 2) }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-pink-50 dark:bg-pink-900/20 rounded-xl">
                        <div class="flex items-center">
                            <div
                                class="w-10 h-10 bg-[#CB1C8D]/20 dark:bg-[#F56EB3]/20 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-[#CB1C8D] dark:text-[#F56EB3]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Jumlah Komponen
                                </p>
                                <p class="font-semibold text-gray-900 dark:text-white text-xl">{{ count($nilaiDetails) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Detail Komponen Nilai --}}
                @if(count($nilaiDetails) > 0)
                    <div class="space-y-4">
                        <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Komponen Nilai</h4>
                        @foreach($nilaiDetails as $index => $detail)
                            <div
                                class="bg-gray-50 dark:bg-gray-700/30 rounded-xl p-4 border border-gray-200/50 dark:border-gray-600/50">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div
                                            class="w-8 h-8 bg-[#CB1C8D]/20 dark:bg-[#F56EB3]/20 rounded-lg flex items-center justify-center mr-3">
                                            <span
                                                class="text-xs font-bold text-[#CB1C8D] dark:text-[#F56EB3]">{{ $index + 1 }}</span>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-900 dark:text-white">{{ $detail['judul_nilai'] }}</p>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Bobot: {{ $detail['bobot'] }} </p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-xl font-bold text-[#CB1C8D] dark:text-[#F56EB3]">
                                            {{ number_format($detail['nilai'], 2) }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-8">
                        <p class="text-gray-600 dark:text-gray-300">Tidak ada detail nilai tersedia.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection