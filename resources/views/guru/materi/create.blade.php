@extends('layouts.app2')
@section('pageTitle', 'Tambah Materi Mapel')
@section('title', 'Tambah Materi Mapel')
@section('content')
    <div class="max-w-4xl mx-auto bg-white dark:bg-white/[0.03] rounded-xl border border-gray-200 dark:border-gray-800 p-6">
        <h1 class="text-2xl mb-6 dark:text-gray-300">Tambah Materi Baru</h1>

        <form action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="mapel_kelas" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mata Pelajaran
                    dan Kelas</label>
                <select id="mapel_kelas" name="mapel_kelas"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
                    <option value="">Pilih Mata Pelajaran dan Kelas</option>
                    @php
                        $guru = Auth::user()->guru(Auth::user()->id_card);
                        $jadwals = \App\Jadwal::where('guru_id', $guru->id)->with(['mapel', 'kelas'])->get()->groupBy('mapel_id');
                    @endphp
                    @foreach($jadwals as $mapelId => $jadwalGroup)
                        @php
                            $mapel = $jadwalGroup->first()->mapel;
                            $kelasNames = $jadwalGroup->pluck('kelas.nama_kelas')->unique()->sort()->join(', ');
                        @endphp
                        @foreach($jadwalGroup as $jadwal)
                            <option value="{{ $jadwal->mapel_id }}-{{ $jadwal->kelas_id }}">{{ $mapel->nama_mapel }} -
                                {{ $jadwal->kelas->nama_kelas }}</option>
                        @endforeach
                    @endforeach
                </select>
                @error('mapel_kelas')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul Materi</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul') }}"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
                @error('judul')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="3"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor-editor">{!! old('deskripsi') !!}</textarea>
                @error('deskripsi')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tipe" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipe Materi</label>
                <select id="tipe" name="tipe"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
                    <option value="">Pilih Tipe</option>
                    <option value="teks" {{ old('tipe') == 'teks' ? 'selected' : '' }}>Teks</option>
                    <option value="pdf" {{ old('tipe') == 'pdf' ? 'selected' : '' }}>PDF</option>
                    <option value="file" {{ old('tipe') == 'file' ? 'selected' : '' }}>File Lainnya</option>
                </select>
                @error('tipe')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4" id="konten-field" style="display: none;">
                <label for="konten" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Konten Teks</label>
                <textarea id="konten" name="konten" rows="10"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor-editor">{!! old('konten') !!}</textarea>
                @error('konten')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4" id="file-field" style="display: none;">
                <label for="file" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Upload File</label>
                <input type="file" id="file" name="file" accept=".pdf,.ppt,.pptx,.xls,.xlsx,.doc,.docx"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <div id="file-preview" class="mt-2" style="display: none;">
                    <embed id="file-embed" src="" type="application/pdf" width="100%" height="400px" />
                </div>
                @error('file')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('materi.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Kembali
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Simpan
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script>
        // Initialize CKEditor for existing editors
        document.querySelectorAll('.ckeditor-editor').forEach(function (element) {
            ClassicEditor
                .create(element, {
                    toolbar: ['bold', 'italic', 'underline', '|', 'bulletedList', '|', 'link', '|', 'blockQuote', 'codeBlock', '|', 'undo', 'redo'],
                    ckfinder: {
                        uploadUrl: '/admin/upload-image' // You can configure this later for image uploads
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        });

        document.getElementById('tipe').addEventListener('change', function () {
            var tipe = this.value;
            var kontenField = document.getElementById('konten-field');
            var fileField = document.getElementById('file-field');

            if (tipe === 'teks') {
                kontenField.style.display = 'block';
                fileField.style.display = 'none';
                // Initialize CKEditor for the konten field if not already done
                if (!document.querySelector('#konten').classList.contains('ck-editor__editable')) {
                    ClassicEditor
                        .create(document.querySelector('#konten'), {
                            toolbar: ['bold', 'italic', 'underline', '|', 'bulletedList', '|', 'link', '|', 'blockQuote', 'codeBlock', '|', 'undo', 'redo'],
                            ckfinder: {
                                uploadUrl: '/admin/upload-image' // You can configure this later for image uploads
                            }
                        })
                        .catch(error => {
                            console.error(error);
                        });
                }
            } else if (tipe === 'pdf' || tipe === 'ppt' || tipe === 'excel' || tipe === 'file') {
                kontenField.style.display = 'none';
                fileField.style.display = 'block';
            } else {
                kontenField.style.display = 'none';
                fileField.style.display = 'none';
            }
        });

        document.getElementById('file').addEventListener('change', function () {
            var file = this.files[0];
            var preview = document.getElementById('file-preview');
            var embed = document.getElementById('file-embed');
            if (file && (file.type === 'application/pdf' || (file.name.toLowerCase().endsWith('.pdf')))) {
                var url = URL.createObjectURL(file);
                embed.src = url;
                preview.style.display = 'block';
            } else if (file && (file.name.toLowerCase().endsWith('.docx') || file.name.toLowerCase().endsWith('.ppt') || file.name.toLowerCase().endsWith('.pptx') || file.name.toLowerCase().endsWith('.doc') || file.name.toLowerCase().endsWith('.xls') || file.name.toLowerCase().endsWith('.xlsx'))) {
                // For other office files, show a placeholder or message since we can't preview them directly
                embed.src = 'data:text/html;charset=utf-8,<div style="display:flex;align-items:center;justify-content:center;height:100%;font-family:Arial,sans-serif;"><div style="text-align:center;"><h3>File Preview</h3><p>This file type will be displayed using Google Docs Viewer after upload.</p></div></div>';
                preview.style.display = 'block';
            } else {
                preview.style.display = 'none';
            }
        });

        // Trigger change on page load if there's a selected value
        document.getElementById('tipe').dispatchEvent(new Event('change'));
    </script>
@endsection