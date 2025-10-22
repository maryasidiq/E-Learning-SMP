@extends('layouts.app2')
@section('pageTitle', 'Materi Pembelajaran')
@section('title', 'Materi Pembelajaran')
@section('content')
    <h1 class="text-2xl mb-4 dark:text-gray-300">Materi Pembelajaran</h1>

    @php
        $groupedMateri = $materi->groupBy(function($item) {
            return $item->mapel->nama_mapel;
        });
        $no = 1;
    @endphp

    @forelse ($groupedMateri as $namaMapel => $materiMapel)
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-3 text-gray-800 dark:text-gray-200 flex items-center">
                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                {{ $namaMapel }}
                <span class="ml-2 text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded-full">{{ $materiMapel->count() }} materi</span>
            </h2>

            <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                <div class="max-w-full overflow-x-auto">
                    <table class="min-w-full">
                        <!-- table header start -->
                        <thead>
                            <tr class="border-b border-gray-100 dark:border-gray-800 bg-gray-50 dark:bg-gray-800/50">
                                <th class="px-5 py-3 sm:px-6">
                                    <div class="flex items-center">
                                        <p class="font-bold text-theme-sm dark:text-gray-300">
                                            No
                                        </p>
                                    </div>
                                </th>
                                <th class="px-5 py-3 sm:px-6">
                                    <div class="flex items-center">
                                        <p class="font-bold text-theme-sm dark:text-gray-300">
                                            Judul
                                        </p>
                                    </div>
                                </th>
                                <th class="px-5 py-3 sm:px-6">
                                    <div class="flex items-center">
                                        <p class="font-bold text-theme-sm dark:text-gray-300">
                                            Tipe
                                        </p>
                                    </div>
                                </th>
                                <th class="px-5 py-3 sm:px-6">
                                    <div class="flex items-center">
                                        <p class="font-bold text-theme-sm dark:text-gray-300">
                                            Guru
                                        </p>
                                    </div>
                                </th>
                                <th class="px-5 py-3 sm:px-6">
                                    <div class="flex items-center">
                                        <p class="font-bold text-theme-sm dark:text-gray-300">
                                            Aksi
                                        </p>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <!-- table header end -->
                        <!-- table body start -->
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                            @forelse ($materiMapel as $item)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800/30">
                                    <td class="px-5 py-4 sm:px-6">
                                        <span class="text-gray-800 text-theme-sm dark:text-gray-400">
                                            {{ $no++ }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                                @if($item->tipe == 'teks')
                                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                    </svg>
                                                @elseif($item->tipe == 'pdf')
                                                    <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                                    </svg>
                                                @else
                                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                    </svg>
                                                @endif
                                            </div>
                                            <div>
                                                <span class="text-gray-800 text-theme-sm dark:text-gray-400 font-medium">
                                                    {{ $item->judul }}
                                                </span>
                                                <br>
                                                @if($item->deskripsi)
                                                    <span class="text-xs text-gray-500 dark:text-gray-500 line-clamp-2">
                                                        {!! Str::limit(strip_tags($item->deskripsi), 100) !!}
                                                    </span>
                                                    <br>
                                                @endif
                                                <span class="text-xs text-gray-500 dark:text-gray-500">
                                                    {{ $item->mapel->nama_mapel }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            @if($item->tipe == 'teks') bg-blue-100 text-blue-800
                                            @elseif($item->tipe == 'pdf') bg-red-100 text-red-800
                                            @else bg-green-100 text-green-800 @endif">
                                            {{ ucfirst($item->tipe) }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <span class="text-gray-800 text-theme-sm dark:text-gray-400">
                                            {{ $item->guru->nama_guru }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('materi.siswa.show', Crypt::encrypt($item->id)) }}"
                                                class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full hover:bg-blue-200 transition-colors">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                                Lihat
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-5 py-4 sm:px-6 text-center text-gray-500">
                                        Belum ada materi yang ditambahkan untuk mapel ini.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-300">Belum ada materi</h3>
            <p class="mt-1 text-sm text-gray-500">Belum ada materi yang tersedia untuk kelas Anda.</p>
        </div>
    @endforelse
@endsection
