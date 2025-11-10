@extends('layouts.app2')
@section('pageTitle', 'Nilai')
@section('title', 'Nilai')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="bg-gradient-to-br from-[#CB1C8D] to-[#F56EB3] dark:from-[#CB1C8D] dark:to-[#F56EB3] rounded-2xl p-8 mb-8 text-white shadow-2xl relative overflow-hidden">
            <div class="absolute inset-0 bg-white/10"></div>
            <div class="relative z-10 flex items-center justify-between">
                <div class="animate-fade-in">
                    <h1 class="text-4xl font-extrabold mb-3 text-white dark:text-gray-100">Nilai Akademik</h1>
                    <p class="text-white/90 dark:text-gray-200 text-lg font-medium">Lihat nilai akademik Anda</p>
                    <div class="mt-4 flex items-center space-x-4">
                        <div class="flex items-center bg-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm font-medium text-white dark:text-gray-100">{{ $nilaiTotal->count() }} Mata Pelajaran</span>
                        </div>
                    </div>
                </div>
                
                <div class="hidden md:block animate-bounce-slow">
                    <div class="relative">
                        <svg class="w-20 h-20 text-white/90 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-yellow-400 rounded-full flex items-center justify-center">
                            <svg class="w-3 h-3 text-yellow-800" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Daftar Nilai --}}
        @if($nilaiTotal->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                @foreach($nilaiTotal as $index => $nilai)
                    <div class="group bg-white dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 hover:shadow-2xl hover:shadow-[#CB1C8D]/20 hover:-translate-y-2 transition-all duration-500 overflow-hidden relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#CB1C8D]/15 to-[#F56EB3]/15 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                        <!-- Header -->
                        <div class="relative bg-gradient-to-br from-[#CB1C8D] to-[#F56EB3] p-6 text-white">
                            <div class="absolute inset-0 bg-black/10"></div>
                            <div class="relative flex justify-between items-start">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mr-4 shadow-lg">
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-white mb-1">{{ $nilai->mapel->nama_mapel ?? 'N/A' }}</h3>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white/20 text-white">
                                            Nilai Akademik
                                        </span>
                                    </div>
                                </div>
                                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                                    <span class="text-xs font-bold text-white">{{ $index + 1 }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="relative p-6">
                            <div class="space-y-4 mb-6">
                                <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700/30 rounded-xl">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-[#F56EB3]/20 dark:bg-[#CB1C8D]/20 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-4 h-4 text-[#CB1C8D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Rata-rata Nilai</p>
                                            <p class="font-semibold text-gray-900 dark:text-white text-lg">{{ number_format($nilai->rata_rata, 2) }}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between p-3 bg-pink-50 dark:bg-pink-900/20 rounded-xl">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-[#CB1C8D]/10 dark:bg-[#CB1C8D]/30 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-4 h-4 text-[#CB1C8D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Detail Nilai</p>
                                            @php
                                                $details = json_decode($nilai->nilai_details, true);
                                            @endphp
                                            <p class="font-semibold text-gray-900 dark:text-white">
                                                {{ is_array($details) && count($details) > 0 ? count($details).' Komponen' : 'Tidak ada detail' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('nilai.detail', $nilai->id) }}" class="group/btn w-full inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-[#CB1C8D] to-[#F56EB3] hover:from-[#b5187f] hover:to-[#e15fa5] border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest shadow-lg hover:shadow-xl focus:ring-4 focus:ring-pink-500/25 focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-0.5 relative overflow-hidden">
                                <span class="relative z-10">Lihat Detail</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20 bg-gradient-to-br from-gray-50 to-[#F56EB3]/10 dark:from-gray-800 dark:to-gray-900 rounded-2xl border border-gray-200/50 dark:border-gray-700/50 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-[#CB1C8D]/10 to-[#F56EB3]/10"></div>
                <div class="relative z-10">
                    <div class="mb-8 animate-bounce">
                        <div class="w-24 h-24 bg-[#F56EB3]/30 dark:bg-[#CB1C8D]/30 rounded-full flex items-center justify-center mx-auto shadow-lg">
                            <svg class="w-12 h-12 text-[#CB1C8D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Belum ada Nilai</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-lg max-w-md mx-auto leading-relaxed">Belum ada nilai akademik yang tersedia untuk Anda saat ini. Silakan tunggu pengumuman dari guru Anda.</p>
                </div>
            </div>
        @endif
    </div>



    <script>
        function openModal(nilaiId) {
            fetch(`/nilai/detail/${nilaiId}`)
                .then(response => response.json())
                .then(data => {
                    let content = `
                        <div class="mb-6 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-xl border border-blue-200 dark:border-blue-800">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h4 class="text-lg font-bold text-blue-900 dark:text-blue-100">${data.mapel}</h4>
                                    <p class="text-blue-700 dark:text-blue-300">Rata-rata: <span class="font-semibold">${data.rata_rata ? data.rata_rata.toFixed(2) : 'N/A'}</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-4">
                    `;
                    if (data.nilai_details && Array.isArray(data.nilai_details)) {
                        data.nilai_details.forEach(detail => {
                            content += `
                                <div class="p-4 bg-gray-50 dark:bg-gray-700/30 rounded-xl border border-gray-200 dark:border-gray-600">
                                    <div class="flex justify-between items-start mb-3">
                                        <h4 class="font-semibold text-gray-900 dark:text-white text-lg">${detail.judul_nilai}</h4>
                                        <span class="text-2xl font-bold text-blue-600 dark:text-blue-400">${detail.nilai}</span>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4 text-sm">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <span class="text-gray-600 dark:text-gray-400">Bobot: <span class="font-medium text-gray-900 dark:text-white">${detail.bobot}</span></span>
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-2 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                            <span class="text-gray-600 dark:text-gray-400">Sumber: <span class="font-medium text-gray-900 dark:text-white">${detail.sumber}</span></span>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });
                    } else {
                        content += '<div class="text-center py-8"><p class="text-gray-600 dark:text-gray-400">Tidak ada detail nilai tersedia.</p></div>';
                    }
                    content += '</div>';
                    document.getElementById('modalContent').innerHTML = content;
                    document.getElementById('modalDetail').classList.remove('hidden');
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('modalContent').innerHTML = '<div class="text-center py-8"><p class="text-red-600">Terjadi kesalahan saat memuat detail nilai.</p></div>';
                    document.getElementById('modalDetail').classList.remove('hidden');
                });
        }

        function closeModal() {
            document.getElementById('modalDetail').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('modalDetail').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
@endsection
