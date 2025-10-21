@extends('layouts.app2')
@section('pageTitle', 'Edit Materi Mapel')
@section('title', 'Edit Materi Mapel')
@section('content')
    <div class="max-w-4xl mx-auto bg-white dark:bg-white/[0.03] rounded-xl border border-gray-200 dark:border-gray-800 p-6">
        <h1 class="text-2xl mb-6 dark:text-gray-300">Edit Materi</h1>

        <form action="{{ route('materi.update', $materi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="mapel_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mata
                    Pelajaran</label>
                <select id="mapel_id" name="mapel_id"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
                    <option value="">Pilih Mata Pelajaran</option>
                    @foreach($mapel as $item)
                        <option value="{{ $item->id }}" {{ $materi->mapel_id == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_mapel }}
                        </option>
                    @endforeach
                </select>
                @error('mapel_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul Materi</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul', $materi->judul) }}"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
                @error('judul')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" rows="3"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor-editor">{!! old('deskripsi', $materi->deskripsi) !!}</textarea>
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
                    <option value="teks" {{ old('tipe', $materi->tipe) == 'teks' ? 'selected' : '' }}>Teks</option>
                    <option value="pdf" {{ old('tipe', $materi->tipe) == 'pdf' ? 'selected' : '' }}>PDF</option>

                    <option value="file" {{ old('tipe', $materi->tipe) == 'file' ? 'selected' : '' }}>File Lainnya</option>
                </select>
                @error('tipe')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4" id="konten-field" style="display: {{ $materi->tipe == 'teks' ? 'block' : 'none' }};">
                <label for="konten" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Konten Teks</label>
                <textarea id="konten" name="konten" rows="10"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor-editor">{!! old('konten', $materi->konten) !!}</textarea>
                @error('konten')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4" id="file-field"
                style="display: {{ in_array($materi->tipe, ['pdf', 'ppt', 'excel', 'file']) ? 'block' : 'none' }};">
                <label for="file" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Upload File Baru
                    (Opsional)</label>
                <input type="file" id="file" name="file" accept=".pdf,.ppt,.pptx,.xls,.xlsx,.doc,.docx"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                @if($materi->file_path)
                    <p class="mt-2 text-sm text-gray-600">File saat ini: <a href="{{ asset($materi->file_path) }}"
                            target="_blank" class="text-blue-600">{{ basename($materi->file_path) }}</a></p>
                    @php
                        $extension = strtolower(pathinfo($materi->file_path, PATHINFO_EXTENSION));
                    @endphp
                    @if($materi->tipe == 'pdf' || ($materi->tipe == 'file' && $extension == 'pdf'))
                        <div class="mt-2">
                            <embed src="{{ asset($materi->file_path) }}" type="application/pdf" width="100%" height="400px" />
                        </div>
                    @elseif($materi->tipe == 'file' && in_array($extension, ['docx', 'ppt', 'pptx', 'doc', 'xls', 'xlsx']))
                        <div class="mt-2">
                            <iframe
                                src="https://docs.google.com/viewer?url={{ urlencode(asset($materi->file_path)) }}&embedded=true"
                                width="100%" height="400px" style="border: none;"></iframe>
                        </div>
                    @endif
                @endif
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
                    Update
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

        // Trigger change on page load if there's a selected value
        document.getElementById('tipe').dispatchEvent(new Event('change'));
    </script>
@endsection