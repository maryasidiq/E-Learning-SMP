@extends('layouts.app2')
@section('pageTitle', 'Detail Soal')
@section('title', 'Detail Soal')
@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div
            class="bg-gradient-to-br from-blue-600 via-purple-700 to-indigo-800 dark:from-blue-800 dark:via-purple-900 dark:to-indigo-900 rounded-2xl p-8 mb-8 text-white shadow-2xl relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent"></div>
            <div class="relative z-10">
                <div class="flex justify-between items-start">
                    <div class="animate-fade-in">
                        <h1
                            class="text-4xl font-extrabold mb-3 bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent">
                            {{ $soal->judul }}
                        </h1>
                        @if($soal->deskripsi)
                            <p class="text-blue-100 text-xl font-medium leading-relaxed">{!! $soal->deskripsi !!}</p>
                        @endif
                        <div class="mt-4 flex items-center space-x-4">
                            <div class="flex items-center bg-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm font-medium">{{ $soalDetail->count() }} Soal</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        


        <!-- Info Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8 ">
            <div
                class="bg-white dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-lg hover:shadow-blue-500/10 transition-all duration-300">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide">Mata
                            Pelajaran</h3>
                        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $soal->mapel->nama_mapel }}</p>
                    </div>
                </div>
            </div>
            <div
                class="bg-white dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-lg hover:shadow-green-500/10 transition-all duration-300">
                <div class="flex items-center">
                    <div
                        class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide">Kelas</h3>
                        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $soal->kelas->nama_kelas }}</p>
                    </div>
                </div>
            </div>
            <div
                class="bg-white dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-lg hover:shadow-purple-500/10 transition-all duration-300">
                <div class="flex items-center">
                    <div
                        class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide">Waktu Mulai
                        </h3>
                        <p class="text-lg font-bold text-gray-900 dark:text-white">
                            {{ \Carbon\Carbon::parse($soal->waktu_mulai)->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
            </div>
            <div
                class="bg-white dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-lg hover:shadow-orange-500/10 transition-all duration-300">
                <div class="flex items-center">
                    <div
                        class="w-12 h-12 bg-orange-100 dark:bg-orange-900/30 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide">Durasi</h3>
                        <p class="text-xl font-bold text-gray-900 dark:text-white">{{ $soal->durasi }} menit</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

    <!-- Tombol Edit Soal -->
    <a href="{{ route('soal.edit', Crypt::encrypt($soal->id)) }}"
        class="group w-full bg-gradient-to-r from-yellow-600 via-amber-600 to-yellow-700 
        hover:from-yellow-700 hover:via-amber-700 hover:to-yellow-800 
        border border-transparent rounded-xl font-bold text-sm text-white uppercase 
        tracking-widest shadow-lg hover:shadow-xl focus:ring-4 focus:ring-yellow-500/25 
        focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] 
        hover:-translate-y-0.5 relative overflow-hidden">

        <div
            class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/10 to-white/0 
            translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700">
        </div>

        <span class="relative z-10 flex items-center justify-center px-6 py-4">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                </path>
            </svg>
            Edit Soal
        </span>
    </a>

    <!-- Tombol Tambah Soal -->
    <a href="{{ route('soal.create-soal', Crypt::encrypt($soal->id)) }}"
        class="group bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 hover:from-blue-700 hover:via-purple-700 hover:to-indigo-700 border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest shadow-lg hover:shadow-xl focus:ring-4 focus:ring-blue-500/25 focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-0.5 relative overflow-hidden">

        <div
            class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/10 to-white/0 
            translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700">
        </div>

        <span class="relative z-10 flex items-center justify-center px-6 py-4">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Tambah Soal
        </span>
    </a>

</div>
        <!-- Daftar Soal -->
        <div class="mb-8">
            <div class="flex items-center justify-between mb-6 mt-8">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Daftar Soal</h2>
                <div class="flex items-center bg-blue-50 dark:bg-blue-900/20 rounded-full px-4 py-2">
                    <svg class="w-5 h-5 mr-2 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-sm font-medium text-blue-800 dark:text-blue-200">{{ $soalDetail->count() }} Soal</span>
                </div>
            </div>

            @if($soalDetail->count() > 0)
                <div class="space-y-6">
                    @foreach($soalDetail as $index => $item)
                        <div class="group bg-white dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 hover:shadow-2xl hover:shadow-blue-500/10 hover:-translate-y-1 transition-all duration-500 overflow-hidden relative">
                            <!-- Gradient Border Effect -->
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-500/20 via-purple-500/20 to-indigo-500/20 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                            <!-- Card Header -->
<div class="relative bg-gradient-to-br from-blue-500 via-purple-600 to-indigo-600 p-6 text-white">
    <div class="absolute inset-0 bg-black/10"></div>

    <div class="relative flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">

        <!-- Bagian Kiri (Nomor + Info Soal) -->
        <div class="flex items-start">
            <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mr-4 shadow-lg shrink-0">
                <span class="text-lg font-bold text-white">{{ $index + 1 }}</span>
            </div>

            <div>
                <h3 class="text-xl font-bold text-white mb-1">Soal {{ $index + 1 }}</h3>

                <div class="flex flex-wrap items-center gap-2">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white/20 text-white backdrop-blur-sm">
                        {{ ucfirst(str_replace('_', ' ', $item->tipe)) }}
                    </span>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white/20 text-white backdrop-blur-sm">
                        Bobot: {{ $item->bobot }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Bagian Tombol -->
        <div class="flex flex-row sm:flex-row gap-2 w-full sm:w-auto justify-start sm:justify-end">

            <a href="{{ route('soal.edit-soal', [Crypt::encrypt($soal->id), Crypt::encrypt($item->id)]) }}"
                class="inline-flex items-center justify-center px-4 py-2 bg-white/20 backdrop-blur-sm text-white text-sm font-medium rounded-xl hover:bg-white/30 transition-all duration-300 transform hover:scale-105">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
                Edit
            </a>

            <form action="{{ route('soal.destroy-soal', [Crypt::encrypt($soal->id), Crypt::encrypt($item->id)]) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="inline-flex items-center justify-center px-4 py-2 bg-red-500/80 backdrop-blur-sm text-white text-sm font-medium rounded-xl hover:bg-red-500 transition-all duration-300 transform hover:scale-105"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus soal ini?')">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                        </path>
                    </svg>
                    Hapus
                </button>
            </form>
        </div>

    </div>
</div>


                            <!-- Card Body -->
                            <div class="relative p-6">
                                @if($item->gambar && is_array($item->gambar))
                                    <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 justify-items-center">
                                        @foreach($item->gambar as $gambar)
                                            @if($gambar)
                                                <img src="{{ asset('storage/' . $gambar) }}" alt="Gambar Soal" class="max-w-full max-h-32 w-auto h-auto rounded-xl shadow-md object-contain border border-gray-200 dark:border-gray-700">
                                            @endif
                                        @endforeach
                                    </div>
                                @elseif($item->gambar)
                                    <div class="mb-4 flex justify-center">
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Soal" class="max-w-xs max-h-32 w-auto h-auto rounded-xl shadow-md object-contain border border-gray-200 dark:border-gray-700">
                                    </div>
                                @endif

                                <div class="mb-4">
                                    <style>
                                        .pertanyaan-content ul {
                                            list-style-type: disc !important;
                                            padding-left: 1.5rem !important;
                                        }

                                        .pertanyaan-content li {
                                            margin-bottom: 0.25rem !important;
                                        }
                                    </style>
                                    <div class="prose dark:prose-invert dark:text-white max-w-none pertanyaan-content">
                                        {!! $item->pertanyaan !!}
                                    </div>
                                </div>

                                @if($item->tipe == 'pilihan_ganda')
                                    <div class="space-y-3">
                                        @if($item->pilihan_a)
                                            <div class="flex items-start p-3 bg-gray-50 dark:bg-gray-700/30 rounded-xl">
                                                <span class="font-bold mr-3 mt-1 text-blue-600 dark:text-blue-400">A.</span>
                                                <div class="flex-1 dark:text-white">{!! $item->pilihan_a !!}</div>
                                                @if($item->jawaban_benar == 'a')
                                                    <span class="ml-3 text-green-600 font-bold bg-green-100 dark:bg-green-900/30 px-2 py-1 rounded-lg text-sm">✓ Jawaban Benar</span>
                                                @endif
                                            </div>
                                        @endif
                                        @if($item->pilihan_b)
                                            <div class="flex items-start p-3 bg-gray-50 dark:bg-gray-700/30 rounded-xl">
                                                <span class="font-bold mr-3 mt-1 text-blue-600 dark:text-blue-400">B.</span>
                                                <div class="flex-1 dark:text-white">{!! $item->pilihan_b !!}</div>
                                                @if($item->jawaban_benar == 'b')
                                                    <span class="ml-3 text-green-600 font-bold bg-green-100 dark:bg-green-900/30 px-2 py-1 rounded-lg text-sm">✓ Jawaban Benar</span>
                                                @endif
                                            </div>
                                        @endif
                                        @if($item->pilihan_c)
                                            <div class="flex items-start p-3 bg-gray-50 dark:bg-gray-700/30 rounded-xl">
                                                <span class="font-bold mr-3 mt-1 text-blue-600 dark:text-blue-400">C.</span>
                                                <div class="flex-1 dark:text-white">{!! $item->pilihan_c !!}</div>
                                                @if($item->jawaban_benar == 'c')
                                                    <span class="ml-3 text-green-600 font-bold bg-green-100 dark:bg-green-900/30 px-2 py-1 rounded-lg text-sm">✓ Jawaban Benar</span>
                                                @endif
                                            </div>
                                        @endif
                                        @if($item->pilihan_d)
                                            <div class="flex items-start p-3 bg-gray-50 dark:bg-gray-700/30 rounded-xl">
                                                <span class="font-bold mr-3 mt-1 text-blue-600 dark:text-blue-400">D.</span>
                                                <div class="flex-1 dark:text-white">{!! $item->pilihan_d !!}</div>
                                                @if($item->jawaban_benar == 'd')
                                                    <span class="ml-3 text-green-600 font-bold bg-green-100 dark:bg-green-900/30 px-2 py-1 rounded-lg text-sm">✓ Jawaban Benar</span>
                                                @endif
                                            </div>
                                        @endif
                                        @if($item->pilihan_e)
                                            <div class="flex items-start p-3 bg-gray-50 dark:bg-gray-700/30 rounded-xl">
                                                <span class="font-bold mr-3 mt-1 text-blue-600 dark:text-blue-400">E.</span>
                                                <div class="flex-1 dark:text-white" >{!! $item->pilihan_e !!}</div>
                                                @if($item->jawaban_benar == 'e')
                                                    <span class="ml-3 text-green-600 font-bold bg-green-100 dark:bg-green-900/30 px-2 py-1 rounded-lg text-sm">✓ Jawaban Benar</span>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                @else
                                    <div class="text-center py-4 bg-orange-50 dark:bg-orange-900/20 border border-orange-200 dark:border-orange-800 rounded-xl">
                                        <svg class="w-8 h-8 text-orange-600 dark:text-orange-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        <div class="text-orange-800 dark:text-orange-200 font-medium">Jawaban Essay</div>
                                        <p class="text-sm text-orange-600 dark:text-orange-300">Dinilai secara subjektif oleh guru</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 bg-gradient-to-br from-gray-50 via-blue-50/30 to-purple-50/30 dark:from-gray-800 dark:via-gray-700 dark:to-gray-800 rounded-2xl border border-gray-200/50 dark:border-gray-700/50 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 via-purple-500/5 to-indigo-500/5"></div>
                    <div class="relative z-10">
                        <div class="mb-8 animate-bounce">
                            <div class="w-24 h-24 bg-gradient-to-br from-blue-100 to-purple-100 dark:from-blue-900/30 dark:to-purple-900/30 rounded-full flex items-center justify-center mx-auto shadow-lg">
                                <svg class="w-12 h-12 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Belum ada Soal</h3>
                        <p class="text-gray-600 dark:text-gray-300 text-lg max-w-md mx-auto leading-relaxed">Belum ada soal yang dibuat untuk ujian ini. Tambahkan soal pertama untuk memulai.</p>
                        <div class="mt-8 flex justify-center">
                            <a href="{{ route('soal.create-soal', Crypt::encrypt($soal->id)) }}"
                                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded-full font-medium shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Tambah Soal Pertama
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        <!-- Footer Actions -->
        <div class="flex items-center justify-center mt-8">
            <a href="{{ route('soal.index') }}"
                class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest shadow-lg hover:shadow-xl focus:ring-4 focus:ring-gray-500/25 focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-0.5 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/10 to-white/0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700"></div>
                <svg class="w-5 h-5 mr-3 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span class="relative z-10">Kembali ke Daftar Soal</span>
            </a>
        </div>
    </div>
@endsection

<style>
    .animate-fade-in {
        animation: fadeIn 0.8s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
