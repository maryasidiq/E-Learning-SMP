@extends('layouts.app2')
@section('pageTitle', 'Detail Materi Mapel')
@section('title', 'Detail Materi Mapel')
@section('content')
    <div class="max-w-4xl mx-auto bg-white dark:bg-white/[0.03] rounded-xl border border-gray-200 dark:border-gray-800 p-6">
        <h1 class="text-2xl mb-6 dark:text-gray-300">{{ $materi->judul }}</h1>

        <div class="mb-4">
            <strong class="text-gray-700 dark:text-gray-300">Mata Pelajaran:</strong>
            <span class="text-gray-900 dark:text-gray-100">{{ $materi->mapel->nama_mapel }}</span>
        </div>

        <div class="mb-4">
            <strong class="text-gray-700 dark:text-gray-300">Kelas:</strong>
            <span class="text-gray-900 dark:text-gray-100">{{ $materi->kelas->nama_kelas }}</span>
        </div>

        <div class="mb-4">
            <strong class="text-gray-700 dark:text-gray-300">Tipe Materi:</strong>
            <span class="text-gray-900 dark:text-gray-100">{{ ucfirst($materi->tipe) }}</span>
        </div>

        @if($materi->deskripsi)
            <div class="mb-4">
                <strong class="text-gray-700 dark:text-gray-300">Deskripsi:</strong>
                <div class="text-gray-900 dark:text-gray-100 mt-2">{!! $materi->deskripsi !!}</div>
            </div>
        @endif

        @if($materi->tipe == 'teks' && $materi->konten)
            <div class="mb-4">
                <strong class="text-gray-700 dark:text-gray-300">Konten:</strong>
                <div class="ck-content mt-2 p-4 bg-gray-100 dark:bg-gray-800 rounded-md">
                    {!! $materi->konten !!}
                </div>

            </div>
        @elseif($materi->file_path)
            <div class="mb-4">
                <strong class="text-gray-700 dark:text-gray-300">File:</strong>
                <div class="mt-2">
                    @php
                        $extension = strtolower(pathinfo($materi->file_path, PATHINFO_EXTENSION));
                        $isEmbeddable = in_array($extension, ['pdf', 'docx', 'ppt', 'pptx', 'doc', 'xls', 'xlsx']);
                    @endphp
                    @if($materi->tipe == 'pdf' || ($materi->tipe == 'file' && $extension == 'pdf'))
                        <div class="mb-4">
                            <embed src="{{ asset($materi->file_path) }}" type="application/pdf" width="100%" height="600px" />
                        </div>
                    @elseif($materi->tipe == 'file' && in_array($extension, ['docx', 'ppt', 'pptx', 'doc', 'xls', 'xlsx']))
                        <div class="mb-4">
                            <iframe
                                src="https://docs.google.com/viewer?url={{ urlencode(asset($materi->file_path)) }}&embedded=true"
                                width="100%" height="600px" style="border: none;"></iframe>
                        </div>
                    @endif
                    <a href="{{ asset($materi->file_path) }}" target="_blank"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        Download File
                    </a>
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Nama file: {{ basename($materi->file_path) }}</p>
                </div>
            </div>
        @endif

        <div class="mb-4">
            <strong class="text-gray-700 dark:text-gray-300">Dibuat pada:</strong>
            <span class="text-gray-900 dark:text-gray-100">{{ $materi->created_at->format('d M Y, H:i') }}</span>
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('materi.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400">
                Kembali ke Daftar
            </a>
            <div class="space-x-2">
                <a href="{{ route('materi.edit', Crypt::encrypt($materi->id)) }}"
                    class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-700">
                    Edit
                </a>
                <form action="{{ route('materi.destroy', $materi->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus materi ini?')">
                        Hapus
                    </button>
                </form>
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
        color: #2563eb;
        text-decoration: underline;
    }
</style>