@extends('layouts.app2')
@section('pageTitle', 'Detail Quis')
@section('title', 'Detail Quis')
@section('content')
    <div class="max-w-6xl mx-auto bg-white dark:bg-white/[0.03] rounded-xl border border-gray-200 dark:border-gray-800 p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold dark:text-gray-300">{{ $quis->judul }}</h1>
                @if($quis->deskripsi)
                    <p class="text-gray-600 dark:text-gray-400 mt-1">{!! $quis->deskripsi !!}</p>
                @endif
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('quis.edit', Crypt::encrypt($quis->id)) }}"
                    class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700 focus:bg-yellow-700 active:bg-yellow-900 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Edit Quis
                </a>
                <a href="{{ route('quis.create-soal', Crypt::encrypt($quis->id)) }}"
                    class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Tambah Soal
                </a>
            </div>
        </div>

        <!-- Info Quis -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Mata Pelajaran</h3>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-300">{{ $quis->mapel->nama_mapel }}</p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Kelas</h3>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-300">{{ $quis->kelas->nama_kelas }}</p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Waktu Mulai</h3>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-300">
                    {{ \Carbon\Carbon::parse($quis->waktu_mulai)->format('d/m/Y H:i') }}
                </p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Durasi</h3>
                <p class="text-lg font-semibold text-gray-900 dark:text-gray-300">{{ $quis->durasi }} menit</p>
            </div>
        </div>

        <!-- Daftar Soal -->
        <div class="mb-6">
            <h2 class="text-xl font-bold mb-4 dark:text-gray-300">Daftar Soal ({{ $soal->count() }})</h2>

            @if($soal->count() > 0)
                <div class="space-y-4">
                    @foreach($soal as $index => $item)
                        <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-lg font-semibold dark:text-gray-300">Soal {{ $index + 1 }}</h3>
                                <div class="flex space-x-2">
                                    <a href="{{ route('quis.edit-soal', [Crypt::encrypt($quis->id), Crypt::encrypt($item->id)]) }}"
                                        class="inline-flex items-center px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-medium rounded-full hover:bg-yellow-200 transition-colors">
                                        Edit
                                    </a>
                                    <form
                                        action="{{ route('quis.destroy-soal', [Crypt::encrypt($quis->id), Crypt::encrypt($item->id)]) }}"
                                        method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center px-3 py-1 bg-red-100 text-red-800 text-xs font-medium rounded-full hover:bg-red-200 transition-colors"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus soal ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="mb-2">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ ucfirst(str_replace('_', ' ', $item->tipe)) }}
                                </span>
                                <span class="ml-2 text-sm text-gray-500 dark:text-gray-400">Bobot: {{ $item->bobot }}</span>
                            </div>
                            <div class="prose dark:prose-invert max-w-none mb-3">
                                {!! $item->pertanyaan !!}
                            </div>
                            @if($item->tipe == 'pilihan_ganda')
                                <div class="space-y-1">
                                    @if($item->pilihan_a)
                                        <div class="flex items-center">
                                            <span class="font-medium mr-2">A.</span>
                                            <span>{{ $item->pilihan_a }}</span>
                                            @if($item->jawaban_benar == 'a')
                                                <span class="ml-2 text-green-600 font-bold">✓ Jawaban Benar</span>
                                            @endif
                                        </div>
                                    @endif
                                    @if($item->pilihan_b)
                                        <div class="flex items-center">
                                            <span class="font-medium mr-2">B.</span>
                                            <span>{{ $item->pilihan_b }}</span>
                                            @if($item->jawaban_benar == 'b')
                                                <span class="ml-2 text-green-600 font-bold">✓ Jawaban Benar</span>
                                            @endif
                                        </div>
                                    @endif
                                    @if($item->pilihan_c)
                                        <div class="flex items-center">
                                            <span class="font-medium mr-2">C.</span>
                                            <span>{{ $item->pilihan_c }}</span>
                                            @if($item->jawaban_benar == 'c')
                                                <span class="ml-2 text-green-600 font-bold">✓ Jawaban Benar</span>
                                            @endif
                                        </div>
                                    @endif
                                    @if($item->pilihan_d)
                                        <div class="flex items-center">
                                            <span class="font-medium mr-2">D.</span>
                                            <span>{{ $item->pilihan_d }}</span>
                                            @if($item->jawaban_benar == 'd')
                                                <span class="ml-2 text-green-600 font-bold">✓ Jawaban Benar</span>
                                            @endif
                                        </div>
                                    @endif
                                    @if($item->pilihan_e)
                                        <div class="flex items-center">
                                            <span class="font-medium mr-2">E.</span>
                                            <span>{{ $item->pilihan_e }}</span>
                                            @if($item->jawaban_benar == 'e')
                                                <span class="ml-2 text-green-600 font-bold">✓ Jawaban Benar</span>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            @else
                                <div class="text-gray-600 dark:text-gray-400 italic">
                                    Jawaban Essay - Dinilai secara subjektif
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 bg-gray-50 dark:bg-gray-800 rounded-lg">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-300">Belum ada soal</h3>
                    <p class="mt-1 text-sm text-gray-500">Tambahkan soal pertama untuk quis ini.</p>
                    <div class="mt-6">
                        <a href="{{ route('quis.create-soal', Crypt::encrypt($quis->id)) }}"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Tambah Soal Pertama
                        </a>
                    </div>
                </div>
            @endif
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('quis.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Kembali ke Daftar Quis
            </a>
        </div>
    </div>
@endsection