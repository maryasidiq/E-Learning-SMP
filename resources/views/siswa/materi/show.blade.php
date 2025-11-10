@extends('layouts.app2')
@section('pageTitle', 'Detail Materi Pembelajaran')
@section('title', 'Detail Materi Pembelajaran')

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header Section -->
        <div class="bg-gradient-to-br from-emerald-600 via-teal-700 to-cyan-800 dark:from-emerald-800 dark:via-teal-900 dark:to-cyan-900 rounded-2xl p-8 mb-8 text-white shadow-2xl relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent"></div>
            <div class="relative z-10">
                <div class="flex items-center justify-between">
                    <div class="animate-fade-in">
                        <div class="flex items-center mb-4">
                            <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center mr-6 shadow-lg">
                                @if($materi->tipe == 'teks')
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                @elseif($materi->tipe == 'pdf')
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                @else
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                @endif
                            </div>
                            <div>
                                <h1 class="text-4xl font-extrabold mb-2 bg-gradient-to-r from-white to-emerald-100 bg-clip-text text-transparent">{{ $materi->judul }}</h1>
                                <p class="text-emerald-100 text-lg font-medium">{{ $materi->mapel->nama_mapel }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-6">
                            <div class="flex items-center bg-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-9 0V1m10 3V1m0 3l1 1v16a2 2 0 01-2 2H6a2 2 0 01-2-2V5l1-1z"></path>
                                </svg>
                                <span class="text-sm font-medium">{{ ucfirst($materi->tipe) }}</span>
                            </div>
                            <div class="flex items-center bg-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="text-sm font-medium">{{ $materi->guru->nama_guru }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block animate-bounce-slow">
                        <div class="relative">
                            <svg class="w-24 h-24 text-white/80 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <div class="absolute -top-2 -right-2 w-8 h-8 bg-yellow-400 rounded-full flex items-center justify-center">
                                <svg class="w-4 h-4 text-yellow-800" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                @if($materi->deskripsi)
                    <!-- Description Card -->
                    <div class="bg-white dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-8 shadow-xl hover:shadow-2xl transition-all duration-500">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-100 to-teal-100 dark:from-emerald-900/30 dark:to-teal-900/30 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Deskripsi Materi</h2>
                        </div>
                        <div class="prose prose-lg dark:prose-invert max-w-none">
                            {!! $materi->deskripsi !!}
                        </div>
                    </div>
                @endif

                @if($materi->tipe == 'teks' && $materi->konten)
                    <!-- Text Content Card -->
                    <div class="bg-white dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-8 shadow-xl hover:shadow-2xl transition-all duration-500">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-cyan-100 dark:from-blue-900/30 dark:to-cyan-900/30 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Konten Materi</h2>
                        </div>
                        <div class="ck-content prose prose-lg dark:prose-invert max-w-none p-6 bg-gray-50 dark:bg-gray-700/30 rounded-xl">
                            {!! $materi->konten !!}
                        </div>
                    </div>
                @elseif($materi->file_path)
                    <!-- File Content Card -->
                    <div class="bg-white dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-8 shadow-xl hover:shadow-2xl transition-all duration-500">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
    <div class="flex items-center">
        <div
            class="w-12 h-12 bg-gradient-to-br from-red-100 to-pink-100 dark:from-red-900/30 dark:to-pink-900/30 rounded-xl flex items-center justify-center mr-4">
            <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                </path>
            </svg>
        </div>
        <div>
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">File Materi</h2>
            <p class="text-gray-600 dark:text-gray-400 break-words max-w-[250px] sm:max-w-none">
                {{ basename($materi->file_path) }}
            </p>
        </div>
    </div>

    <a href="{{ asset($materi->file_path) }}" target="_blank"
        class="inline-flex items-center justify-center w-full sm:w-auto px-5 py-2.5 sm:px-6 sm:py-3
               bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700
               border border-transparent rounded-xl font-semibold text-sm sm:text-base text-white
               uppercase tracking-wide shadow-lg hover:shadow-xl focus:ring-4 focus:ring-emerald-500/25
               focus:ring-offset-2 transition-all duration-300 transform hover:scale-105">
        <svg class="w-4 h-4 sm:w-5 sm:h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        <span>Download File</span>
    </a>
</div>


                        @php
                            $extension = strtolower(pathinfo($materi->file_path, PATHINFO_EXTENSION));
                        @endphp
                        @if($materi->tipe == 'pdf' || ($materi->tipe == 'file' && $extension == 'pdf'))
                            <div class="rounded-xl overflow-hidden shadow-2xl">
                                <embed src="{{ asset($materi->file_path) }}" type="application/pdf" width="100%" height="600px" />
                            </div>
                        @elseif($materi->tipe == 'file' && in_array($extension, ['docx', 'ppt', 'pptx', 'doc', 'xls', 'xlsx']))
                            <div class="rounded-xl overflow-hidden shadow-2xl">
                                <iframe
                                    src="https://docs.google.com/viewer?url={{ urlencode(asset($materi->file_path)) }}&embedded=true"
                                    width="100%" height="600px" style="border: none;"></iframe>
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Info Card -->
                <div class="bg-white dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-6 shadow-xl hover:shadow-2xl transition-all duration-500">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-3 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Informasi Materi
                    </h3>

                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700/30 rounded-xl">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-emerald-100 dark:bg-emerald-900/30 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Mata Pelajaran</p>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $materi->mapel->nama_mapel }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-blue-50 dark:bg-blue-900/20 rounded-xl">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-9 0V1m10 3V1m0 3l1 1v16a2 2 0 01-2 2H6a2 2 0 01-2-2V5l1-1z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Tipe Materi</p>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ ucfirst($materi->tipe) }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-purple-50 dark:bg-purple-900/20 rounded-xl">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Guru Pengajar</p>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $materi->guru->nama_guru }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-amber-50 dark:bg-amber-900/20 rounded-xl">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-amber-100 dark:bg-amber-900/30 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Dibuat Pada</p>
                                    <p class="font-semibold text-gray-900 dark:text-white">{{ $materi->created_at->format('d M Y, H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Back Button Card -->
                <div class="bg-white dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-6 shadow-xl hover:shadow-2xl transition-all duration-500">
                    <a href="{{ route('materi.siswa') }}"
                        class="w-full inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest shadow-lg hover:shadow-xl focus:ring-4 focus:ring-gray-500/25 focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-0.5 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/10 to-white/0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700"></div>
                        <svg class="w-5 h-5 mr-3 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        <span class="relative z-10">Kembali ke Daftar</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .ck-content h1,
    .ck-content h2,
    .ck-content h3 {
        font-weight: 600;
        margin-top: 1rem;
        color: #111827;
    }

    .dark .ck-content h1,
    .dark .ck-content h2,
    .dark .ck-content h3 {
        color: #f9fafb;
    }

    .ck-content ul {
        list-style: disc;
        margin-left: 1.5rem;
    }

    .ck-content ol {
        list-style: decimal;
        margin-left: 1.5rem;
    }

    .ck-content a {
        color: #059669;
        text-decoration: underline;
    }

    .ck-content a:hover {
        color: #047857;
    }

    .dark .ck-content a {
        color: #10b981;
    }

    .dark .ck-content a:hover {
        color: #34d399;
    }
</style>
