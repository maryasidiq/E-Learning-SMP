@extends('layouts.app2')
@section('pageTitle', 'Edit Soal Ujian')
@section('title', 'Edit Soal Ujian')
@section('content')
    <div class="max-w-4xl mx-auto bg-white dark:bg-white/[0.03] rounded-xl border border-gray-200 dark:border-gray-800 p-6">
        <h1 class="text-2xl mb-6 dark:text-gray-300">Edit Soal untuk Ujian: {{ $ujian->judul }}</h1>

        <form action="{{ route('ujian.updateSoal', [Crypt::encrypt($ujian->id), Crypt::encrypt($soal->id)]) }}"
            method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="tipe" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipe Soal</label>
                <select id="tipe" name="tipe"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required onchange="toggleOptions()">
                    <option value="">Pilih Tipe Soal</option>
                    <option value="pilihan_ganda" {{ $soal->tipe == 'pilihan_ganda' ? 'selected' : '' }}>Pilihan Ganda
                    </option>
                    <option value="essay" {{ $soal->tipe == 'essay' ? 'selected' : '' }}>Essay</option>
                </select>
                @error('tipe')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="pertanyaan"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pertanyaan</label>
                <textarea id="pertanyaan" name="pertanyaan" rows="4"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>{!! old('pertanyaan', $soal->pertanyaan) !!}</textarea>
                @error('pertanyaan')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div id="pilihan_ganda_options" class="mb-4"
                style="display: {{ $soal->tipe == 'pilihan_ganda' ? 'block' : 'none' }};">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pilihan Jawaban</label>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="pilihan_a" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan
                            A</label>
                        <input type="text" id="pilihan_a" name="pilihan_a" value="{{ old('pilihan_a', $soal->pilihan_a) }}"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @error('pilihan_a')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="pilihan_b" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan
                            B</label>
                        <input type="text" id="pilihan_b" name="pilihan_b" value="{{ old('pilihan_b', $soal->pilihan_b) }}"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @error('pilihan_b')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="pilihan_c" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan
                            C</label>
                        <input type="text" id="pilihan_c" name="pilihan_c" value="{{ old('pilihan_c', $soal->pilihan_c) }}"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @error('pilihan_c')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="pilihan_d" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan
                            D</label>
                        <input type="text" id="pilihan_d" name="pilihan_d" value="{{ old('pilihan_d', $soal->pilihan_d) }}"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @error('pilihan_d')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="pilihan_e" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan E
                            (Opsional)</label>
                        <input type="text" id="pilihan_e" name="pilihan_e" value="{{ old('pilihan_e', $soal->pilihan_e) }}"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
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
                            <option value="a" {{ old('jawaban_benar', $soal->jawaban_benar) == 'a' ? 'selected' : '' }}>A
                            </option>
                            <option value="b" {{ old('jawaban_benar', $soal->jawaban_benar) == 'b' ? 'selected' : '' }}>B
                            </option>
                            <option value="c" {{ old('jawaban_benar', $soal->jawaban_benar) == 'c' ? 'selected' : '' }}>C
                            </option>
                            <option value="d" {{ old('jawaban_benar', $soal->jawaban_benar) == 'd' ? 'selected' : '' }}>D
                            </option>
                            <option value="e" {{ old('jawaban_benar', $soal->jawaban_benar) == 'e' ? 'selected' : '' }}>E
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
                <input type="number" id="bobot" name="bobot" value="{{ old('bobot', $soal->bobot) }}" min="1"
                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    required>
                @error('bobot')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('ujian.show', Crypt::encrypt($ujian->id)) }}"
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
    </script>
@endsection