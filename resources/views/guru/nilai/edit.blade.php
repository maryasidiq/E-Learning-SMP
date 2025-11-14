@extends('layouts.app2')
@section('pageTitle', 'Edit Nilai Siswa')
@section('title', 'Edit Nilai Siswa')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div
            class="bg-gradient-to-br from-[#CB1C8D] to-[#F56EB3] dark:from-[#CB1C8D] dark:to-[#F56EB3] rounded-2xl p-8 mb-8 text-white shadow-2xl relative overflow-hidden">
            <div class="absolute inset-0 bg-white/10"></div>
            <div class="relative z-10 flex items-center justify-between">
                <div class="animate-fade-in">
                    <h1 class="text-4xl font-extrabold mb-3 text-white dark:text-gray-100">Edit Nilai Siswa</h1>
                    <p class="text-white/90 dark:text-gray-200 text-lg font-medium">Perbarui nilai akademik siswa</p>
                    <div class="mt-4 flex items-center space-x-4">
                        <div class="flex items-center bg-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                </path>
                            </svg>
                            <span class="text-sm font-medium text-white dark:text-gray-100">Edit Mode</span>
                        </div>
                        <div class="flex items-center bg-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                            <span
                                class="text-sm font-medium text-white dark:text-gray-100">{{ $mapel->mapel->nama_mapel }}</span>
                        </div>
                    </div>
                </div>

                <div class="hidden md:block animate-bounce-slow">
                    <div class="relative">
                        <svg class="w-20 h-20 text-white/90 drop-shadow-lg" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
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

        {{-- Info Siswa --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div
                class="bg-white dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-xl hover:shadow-[#CB1C8D]/10 transition-all duration-300">
                <div class="flex items-center">
                    <div
                        class="w-12 h-12 bg-[#F56EB3]/20 dark:bg-[#CB1C8D]/20 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-[#CB1C8D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Nama Siswa</p>
                        <p class="font-semibold text-gray-900 dark:text-white text-lg">{{ $siswa->nama_siswa }}</p>
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-xl hover:shadow-[#CB1C8D]/10 transition-all duration-300">
                <div class="flex items-center">
                    <div
                        class="w-12 h-12 bg-[#CB1C8D]/20 dark:bg-[#F56EB3]/20 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-[#CB1C8D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">NIS</p>
                        <p class="font-semibold text-gray-900 dark:text-white text-lg">{{ $siswa->no_induk }}</p>
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-xl hover:shadow-[#CB1C8D]/10 transition-all duration-300">
                <div class="flex items-center">
                    <div
                        class="w-12 h-12 bg-[#F56EB3]/20 dark:bg-[#CB1C8D]/20 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-[#CB1C8D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Kelas</p>
                        <p class="font-semibold text-gray-900 dark:text-white text-lg">{{ $siswa->kelas->nama_kelas }}</p>
                    </div>
                </div>
            </div>

            <div
                class="bg-white dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-xl hover:shadow-[#CB1C8D]/10 transition-all duration-300">
                <div class="flex items-center">
                    <div
                        class="w-12 h-12 bg-[#CB1C8D]/20 dark:bg-[#F56EB3]/20 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-[#CB1C8D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Mata Pelajaran</p>
                        <p class="font-semibold text-gray-900 dark:text-white text-lg">{{ $mapel->mapel->nama_mapel }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Form Edit Nilai --}}
        <div
            class="bg-white dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 overflow-hidden shadow-xl">
            <div class="bg-gradient-to-r from-[#CB1C8D] to-[#F56EB3] px-8 py-6">
                <h2 class="text-2xl font-bold text-white">Form Edit Nilai</h2>
                <p class="text-white/90 mt-1">Perbarui nilai siswa dengan informasi yang akurat</p>
            </div>

            <div class="p-8">
                <form id="edit-nilai-form" class="space-y-6">
                    @csrf
                    @foreach($existingNilai as $judul => $nilaiList)
                        <div class="bg-gray-50 dark:bg-gray-800/50 rounded-xl p-6">
                            <h3 class="text-xl font-bold mb-6 text-gray-900 dark:text-white">{{ $judul }}</h3>
                            @foreach($nilaiList as $nilai)
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                                    <div class="form-group">
                                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Nilai</label>
                                        <input type="number" name="nilai[{{ $nilai->id }}]" value="{{ $nilai->nilai }}" min="0"
                                            max="100"
                                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#CB1C8D] focus:border-[#CB1C8D] bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-all duration-200"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Bobot</label>
                                        <input type="number" name="bobot[{{ $nilai->id }}]" value="{{ $nilai->bobot }}" min="1"
                                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#CB1C8D] focus:border-[#CB1C8D] bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-all duration-200"
                                            readonly>
                                    </div>

                                    <div class="form-group">
                                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Sumber</label>
                                        <select name="sumber[{{ $nilai->id }}]"
                                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#CB1C8D] focus:border-[#CB1C8D] bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-all duration-200"
                                            disabled>
                                            <option value="manual" {{ $nilai->sumber == 'manual' ? 'selected' : '' }}>Manual</option>
                                            <option value="soal" {{ $nilai->sumber == 'soal' ? 'selected' : '' }}>Soal</option>
                                        </select>
                                    </div>

                                    <div class="form-group md:col-span-3" id="soal-input-{{ $nilai->id }}"
                                        style="display: {{ $nilai->sumber == 'soal' ? 'block' : 'none' }};">
                                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Pilih
                                            Soal</label>
                                        <select name="soal[{{ $nilai->id }}]"
                                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#CB1C8D] focus:border-[#CB1C8D] bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-all duration-200"
                                            disabled>
                                            <option value="">Pilih Soal</option>
                                            @foreach(\App\Soal::where('mapel_id', $mapel->mapel_id)->get() as $soal)
                                                <option value="{{ $soal->id }}" {{ $nilai->soal_id == $soal->id ? 'selected' : '' }}>
                                                    {{ $soal->judul }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </form>


            </div>
        </div>
        {{-- Action Buttons --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8 mt-8">
            <button type="submit" form="edit-nilai-form"
                class="group bg-gradient-to-r from-[#CB1C8D] to-[#F56EB3] hover:from-[#b5187f] hover:to-[#e15fa5] border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest shadow-lg hover:shadow-xl focus:ring-4 focus:ring-pink-500/25 focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-0.5 relative overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/10 to-white/0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700">
                </div>
                <span class="relative z-10 flex items-center justify-center px-6 py-4">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                        </path>
                    </svg>
                    Simpan Perubahan
                </span>
            </button>
            <a href="{{ route('nilai.show', Crypt::encrypt($mapel->mapel_id)) }}"
                class="group bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest shadow-lg hover:shadow-xl focus:ring-4 focus:ring-gray-500/25 focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-0.5 relative overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/10 to-white/0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700">
                </div>
                <span class="relative z-10 flex items-center justify-center px-6 py-4">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Entry Nilai
                </span>
            </a>
        </div>
    </div>

    <script>
        // Toggle soal input based on sumber selection
        @foreach($existingNilai as $judul => $nilaiList)
            @foreach($nilaiList as $nilai)
                document.querySelector('select[name="sumber[{{ $nilai->id }}]"]').addEventListener('change', function () {
                    const soalInput = document.getElementById('soal-input-{{ $nilai->id }}');
                    if (this.value === 'soal') {
                        soalInput.style.display = 'block';
                    } else {
                        soalInput.style.display = 'none';
                    }
                });
            @endforeach
        @endforeach

        document.getElementById('edit-nilai-form').addEventListener('submit', function (e) {
            e.preventDefault();

            // Konfirmasi sebelum update
            const confirmed = confirm('Apakah Anda yakin ingin mengupdate nilai siswa ini?');
            if (!confirmed) return;

            const formData = new FormData(this);

            fetch('{{ route("guru.nilai.update", $siswa->id) }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        toastr.success(result.success);
                        setTimeout(() => {
                            window.location.href = '{{ route("nilai.show", Crypt::encrypt($mapel->mapel_id)) }}';
                        }, 2000);
                    } else {
                        toastr.error(result.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    toastr.error('Terjadi kesalahan saat menyimpan data');
                });
        });
    </script>
@endsection