@extends('layouts.app2')
@section('pageTitle', 'Edit Soal Quis')
@section('title', 'Edit Soal Quis')
@section('content')
    <div class="max-w-4xl mx-auto bg-white dark:bg-white/[0.03] rounded-xl border border-gray-200 dark:border-gray-800 p-6">
        <h1 class="text-2xl mb-6 dark:text-gray-300">Edit Soal untuk Soal: {{ $soal->judul }}</h1>

        <form action="{{ route('soal.update-soal', [Crypt::encrypt($soal->id), Crypt::encrypt($soalDetail->id)]) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="tipe" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipe Soal</label>
                <select id="tipe" name="tipe"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required onchange="toggleOptions()">
                    <option value="">Pilih Tipe Soal</option>
                    <option value="pilihan_ganda" {{ $soalDetail->tipe == 'pilihan_ganda' ? 'selected' : '' }}>Pilihan Ganda
                    </option>
                    <option value="essay" {{ $soalDetail->tipe == 'essay' ? 'selected' : '' }}>Essay</option>
                </select>
                @error('tipe')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="pertanyaan"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pertanyaan</label>
                <textarea id="pertanyaan" name="pertanyaan" rows="4"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor"
                    required>{!! old('pertanyaan', $soalDetail->pertanyaan) !!}</textarea>
                @error('pertanyaan')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gambar (Opsional - Maksimal
                    4)</label>
                <div id="gambar_container" class="space-y-2">
                    @if($soalDetail->gambar && is_array($soalDetail->gambar))
                        @foreach($soalDetail->gambar as $index => $gambar)
                            <div class="flex items-center space-x-2">
                                <input type="file" id="gambar_{{ $index + 1 }}" name="gambar[]" accept="image/*"
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                <img src="{{ asset('storage/' . $gambar) }}" alt="Gambar Soal {{ $index + 1 }}"
                                    class="max-w-xs h-auto rounded-lg border">
                                <button type="button" onclick="removeExistingGambar(this, {{ $index }})"
                                    class="px-3 py-1 bg-red-500 text-white rounded text-sm">Hapus</button>
                            </div>
                        @endforeach
                    @endif
                    <div class="flex items-center space-x-2">
                        <input type="file" id="gambar_new" name="gambar[]" accept="image/*"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <button type="button" onclick="addGambar()"
                            class="px-3 py-1 bg-blue-500 text-white rounded text-sm">+</button>
                    </div>
                </div>
                <p class="mt-1 text-sm text-gray-500">Format: JPG, PNG, GIF. Maksimal 2MB per gambar</p>
                @error('gambar')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                @error('gambar.*')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div id="pilihan_ganda_options" class="mb-4"
                style="display: {{ $soalDetail->tipe == 'pilihan_ganda' ? 'block' : 'none' }};">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pilihan Jawaban</label>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="pilihan_a" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan
                            A</label>
                        <textarea id="pilihan_a" name="pilihan_a" rows="2"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor">{!! old('pilihan_a', $soalDetail->pilihan_a) !!}</textarea>
                        @error('pilihan_a')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="pilihan_b" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan
                            B</label>
                        <textarea id="pilihan_b" name="pilihan_b" rows="2"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor">{!! old('pilihan_b', $soalDetail->pilihan_b) !!}</textarea>
                        @error('pilihan_b')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="pilihan_c" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan
                            C</label>
                        <textarea id="pilihan_c" name="pilihan_c" rows="2"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor">{!! old('pilihan_c', $soalDetail->pilihan_c) !!}</textarea>
                        @error('pilihan_c')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="pilihan_d" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan
                            D</label>
                        <textarea id="pilihan_d" name="pilihan_d" rows="2"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor">{!! old('pilihan_d', $soalDetail->pilihan_d) !!}</textarea>
                        @error('pilihan_d')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="pilihan_e" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan E
                            (Opsional)</label>
                        <textarea id="pilihan_e" name="pilihan_e" rows="2"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 ckeditor">{!! old('pilihan_e', $soalDetail->pilihan_e) !!}</textarea>
                        @error('pilihan_e')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="jawaban_benar"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jawaban Benar</label>
                        <select id="jawaban_benar" name="jawaban_benar"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Pilih Jawaban Benar</option>
                            <option value="a" {{ old('jawaban_benar', $soalDetail->jawaban_benar) == 'a' ? 'selected' : '' }}>
                                A
                            </option>
                            <option value="b" {{ old('jawaban_benar', $soalDetail->jawaban_benar) == 'b' ? 'selected' : '' }}>
                                B
                            </option>
                            <option value="c" {{ old('jawaban_benar', $soalDetail->jawaban_benar) == 'c' ? 'selected' : '' }}>
                                C
                            </option>
                            <option value="d" {{ old('jawaban_benar', $soalDetail->jawaban_benar) == 'd' ? 'selected' : '' }}>
                                D
                            </option>
                            <option value="e" {{ old('jawaban_benar', $soalDetail->jawaban_benar) == 'e' ? 'selected' : '' }}>
                                E
                            </option>
                        </select>
                        @error('jawaban_benar')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label for="bobot" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bobot Nilai</label>
                <input type="number" id="bobot" name="bobot" value="{{ old('bobot', $soalDetail->bobot) }}" min="1"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
                @error('bobot')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('soal.show', Crypt::encrypt($soal->id)) }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Kembali
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Update Soal
                </button>
            </div>
        </form>
    </div>

    <script>
        function toggleOptions() {
            const tipe = document.getElementById('tipe').value;
            const options = document.getElementById('pilihan_ganda_options');
            if (tipe === 'pilihan_ganda') {
                options.style.display = 'block';
            } else {
                options.style.display = 'none';
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function () {
            toggleOptions();
        });

        function addGambar() {
            const container = document.getElementById('gambar_container');
            const inputs = container.querySelectorAll('input[type="file"]');
            if (inputs.length >= 4) {
                alert('Maksimal 4 gambar per soal');
                return;
            }

            const newIndex = inputs.length + 1;
            const div = document.createElement('div');
            div.className = 'flex items-center space-x-2';
            div.innerHTML = `
                                                <input type="file" id="gambar_${newIndex}" name="gambar[]" accept="image/*"
                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                <button type="button" onclick="removeGambar(this)" class="px-3 py-1 bg-red-500 text-white rounded text-sm">-</button>
                                            `;
            container.appendChild(div);
        }

        function removeGambar(button) {
            button.parentElement.remove();
        }

        function removeExistingGambar(button, index) {
            if (confirm('Apakah Anda yakin ingin menghapus gambar ini?')) {
                // Mark for deletion by setting a hidden input
                const container = button.parentElement;
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = `delete_gambar[${index}]`;
                hiddenInput.value = '1';
                container.appendChild(hiddenInput);

                // Hide the image and button
                button.style.display = 'none';
                container.querySelector('img').style.display = 'none';
                container.querySelector('input[type="file"]').required = false;
            }
        }
    </script>

    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    <script>
        // Initialize CKEditor for all ckeditor class elements
        document.querySelectorAll('.ckeditor').forEach(function (element) {
            ClassicEditor
                .create(element, {
                    toolbar: ['bold', 'italic', 'underline', '|', 'bulletedList', '|', 'undo', 'redo'],
                    ckfinder: {
                        uploadUrl: '/admin/upload-image' // You can configure this later for image uploads
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endsection