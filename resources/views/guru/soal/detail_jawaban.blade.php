@extends('layouts.app2')
@section('pageTitle', 'Detail Jawaban Siswa')
@section('title', 'Detail Jawaban Siswa')
@section('content')
    <!-- Header Section -->
    <div
        class="max-w-7xl mx-auto bg-gradient-to-br from-blue-600 via-purple-700 to-indigo-800 dark:from-blue-800 dark:via-purple-900 dark:to-indigo-900 rounded-2xl p-8 mb-8 text-white shadow-2xl relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent"></div>
        <div class="relative z-10 flex items-center justify-between">
            <div class="animate-fade-in">
                <h1
                    class="text-4xl font-extrabold mb-3 bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent">
                    Detail Jawaban Siswa
                </h1>
                <p class="text-blue-100 text-xl font-medium">{{ $siswa->nama_siswa }}</p>
                <p class="text-blue-100/80 text-lg mt-2">No Induk: {{ $siswa->no_induk }}</p>
                <div class="mt-4 flex items-center space-x-4">
                    <div class="flex items-center bg-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm font-medium">Nilai Akhir: {{ number_format($nilaiAkhir, 1) }}/100</span>
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
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Judul Soal</h3>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-300">{{ $soal->judul }}</p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</h3>
                <p
                    class="text-lg font-semibold {{ $nilaiAkhir >= 70 ? 'text-green-600' : ($nilaiAkhir >= 50 ? 'text-yellow-600' : 'text-red-600') }}">
                    @if($nilaiAkhir >= 70)
                        Lulus
                    @elseif($nilaiAkhir >= 50)
                        Remedial
                    @else
                        Tidak Lulus
                    @endif
                </p>
            </div>
        </div>

        <!-- Daftar Jawaban Siswa -->
        @if($jawabanSiswa->count() > 0)
            <div class="space-y-6">
                @foreach($jawabanSiswa as $index => $jawaban)
                    <div class="bg-white dark:bg-white/[0.03] rounded-xl border border-gray-200 dark:border-gray-800 p-6 shadow-sm">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <span
                                    class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full text-sm font-bold mr-3">
                                    {{ $index + 1 }}
                                </span>
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-300">
                                        Soal {{ $index + 1 }}
                                        <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                                                                        @if($jawaban->soalDetail->tipe == 'pilihan_ganda')
                                                                                                            bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                                                                                        @elseif($jawaban->soalDetail->tipe == 'essay')
                                                                                                            bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                                                                                        @else
                                                                                                            bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200
                                                                                                        @endif">
                                            {{ ucfirst(str_replace('_', ' ', $jawaban->soalDetail->tipe)) }}
                                        </span>
                                    </h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Bobot: {{ $jawaban->soalDetail->bobot }}
                                        poin</p>
                                </div>
                            </div>
                            <div class="text-right">
                                @if($jawaban->soalDetail->tipe != 'essay')
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold
                                                                                                {{ $jawaban->nilai_akhir >= 70 ? 'bg-green-100 text-green-800' : ($jawaban->nilai_akhir >= 50 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                        {{ number_format($jawaban->nilai_akhir, 1) }}/{{ $jawaban->soalDetail->bobot }} poin
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Pertanyaan -->
                        <div class="mb-4">
                            <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pertanyaan:</h4>
                            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                                {!! $jawaban->soalDetail->pertanyaan !!}
                            </div>
                        </div>

                        <!-- Gambar Pertanyaan -->
                        @if($jawaban->soalDetail->gambar && count($jawaban->soalDetail->gambar) > 0)
                            <div class="mb-4">
                                <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Gambar:</h4>
                                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                                    @foreach($jawaban->soalDetail->gambar as $gambar)
                                        <div class="relative">
                                            <img src="{{ asset('storage/' . $gambar) }}" alt="Gambar soal"
                                                class="w-full h-32 object-cover rounded-lg border border-gray-200 dark:border-gray-700">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Pilihan Jawaban (untuk pilihan ganda) -->
                        @if($jawaban->soalDetail->tipe == 'pilihan_ganda')
                            <div class="mb-4">
                                <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pilihan Jawaban:</h4>
                                <div class="grid grid-cols-1 gap-2">
                                    @php
                                        $pilihan = ['a', 'b', 'c', 'd', 'e'];
                                        $jawabanUser = strtolower($jawaban->jawaban);
                                        $jawabanBenar = strtolower($jawaban->soalDetail->jawaban_benar);
                                    @endphp
                                    @foreach($pilihan as $pil)
                                        @if($jawaban->soalDetail->{'pilihan_' . $pil})
                                            <div
                                                class="flex items-center p-3 rounded-lg border
                                                                                                                                                                            @if($pil == $jawabanUser && $pil == $jawabanBenar)
                                                                                                                                                                                border-green-500 bg-green-50 dark:bg-green-900/20
                                                                                                                                                                            @elseif($pil == $jawabanUser)
                                                                                                                                                                                border-blue-500 bg-blue-50 dark:bg-blue-900/20
                                                                                                                                                                            @elseif($pil == $jawabanBenar)
                                                                                                                                                                                border-green-500 bg-green-50 dark:bg-green-900/20
                                                                                                                                                                            @else
                                                                                                                                                                                border-gray-200 dark:border-gray-700
                                                                                                                                                                            @endif">
                                                <span
                                                    class="font-bold text-lg mr-3 {{ $pil == $jawabanUser ? 'text-blue-600' : ($pil == $jawabanBenar ? 'text-green-600' : 'text-gray-700 dark:text-gray-300') }}">
                                                    {{ strtoupper($pil) }}.
                                                </span>
                                                <span
                                                    class="flex-1 {{ $pil == $jawabanUser ? 'text-blue-800 dark:text-blue-200' : ($pil == $jawabanBenar ? 'text-green-800 dark:text-green-200' : 'text-gray-700 dark:text-gray-300') }}">
                                                    {{ strip_tags($jawaban->soalDetail->{'pilihan_' . $pil}) }}
                                                </span>
                                                @if($pil == $jawabanBenar)
                                                    <svg class="w-5 h-5 text-green-600 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                @endif
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Jawaban Siswa -->
                        <div class="mb-4">
                            <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Jawaban Siswa:</h4>
                            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                                @if($jawaban->soalDetail->tipe == 'pilihan_ganda')
                                    @if($jawaban->jawaban)
                                        <span
                                            class="text-2xl font-bold
                                                                                                                                                @if(strtolower($jawaban->jawaban) == strtolower($jawaban->soalDetail->jawaban_benar))
                                                                                                                                                    text-green-600
                                                                                                                                                @else
                                                                                                                                                    text-red-600
                                                                                                                                                @endif">
                                            {{ strtoupper($jawaban->jawaban) }}
                                        </span>
                                        <span
                                            class="ml-2 text-sm
                                                                                                                                                @if(strtolower($jawaban->jawaban) == strtolower($jawaban->soalDetail->jawaban_benar))
                                                                                                                                                    text-green-600
                                                                                                                                                @else
                                                                                                                                                    text-red-600
                                                                                                                                                @endif">
                                            @if(strtolower($jawaban->jawaban) == strtolower($jawaban->soalDetail->jawaban_benar))
                                                (Benar)
                                            @else
                                                (Salah)
                                            @endif
                                        </span>
                                    @else
                                        <span class="text-gray-500 italic">Tidak dijawab</span>
                                    @endif
                                @else
                                    @if($jawaban->jawaban)
                                        <div class="prose prose-sm max-w-none dark:prose-invert">
                                            {!! nl2br(e($jawaban->jawaban)) !!}
                                        </div>
                                    @else
                                        <span class="text-gray-500 italic">Tidak dijawab</span>
                                    @endif
                                @endif
                            </div>
                        </div>



                        <!-- File Upload (jika ada) -->
                        @if($jawaban->file)
                            <div class="mb-4">
                                <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">File Upload:</h4>
                                <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                                    <a href="{{ asset('storage/' . $jawaban->file) }}" target="_blank"
                                        class="inline-flex items-center px-4 py-2 bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium rounded-lg transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                        Lihat File
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach


        @else
                <div class="text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                        </path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-300">Belum ada jawaban</h3>
                    <p class="mt-1 text-sm text-gray-500">Siswa belum menjawab soal ini.</p>
                </div>
            @endif
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8 mt-8">
                <a href="{{ route('soal.nilai', Crypt::encrypt($soal->id)) }}"
                    class="group w-full inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest shadow-lg hover:shadow-xl focus:ring-4 focus:ring-gray-500/25 focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-0.5 relative overflow-hidden">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/10 to-white/0 -translate-x-full group-hover:translate-x-full transition-transform duration-700">
                    </div>
                    <span class="relative z-10">Kembali</span>
                </a>
            </div>
        </div>
@endsection