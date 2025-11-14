@extends('layouts.app2')
@section('pageTitle', 'Edit Nilai')
@section('title', 'Edit Nilai')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="bg-gradient-to-br from-[#CB1C8D] to-[#F56EB3] dark:from-[#CB1C8D] dark:to-[#F56EB3] rounded-2xl p-8 mb-8 text-white shadow-2xl relative overflow-hidden">
            <div class="absolute inset-0 bg-white/10"></div>
            <div class="relative z-10 flex items-center justify-between">
                <div class="animate-fade-in">
                    <h1 class="text-4xl font-extrabold mb-3 text-white dark:text-gray-100">Edit Nilai Siswa</h1>
                    <p class="text-white/90 dark:text-gray-200 text-lg font-medium">Perbarui nilai akademik siswa secara massal</p>
                    <div class="mt-4 flex items-center space-x-4">
                        <div class="flex items-center bg-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                            </svg>
                            <span class="text-sm font-medium text-white dark:text-gray-100">Edit</span>
                        </div>
                        <div class="flex items-center bg-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <span class="text-sm font-medium text-white dark:text-gray-100">{{ $mapel->mapel->nama_mapel }}</span>
                        </div>
                    </div>
                </div>

                <div class="hidden md:block animate-bounce-slow">
                    <div class="relative">
                        <svg class="w-20 h-20 text-white/90 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-green-400 rounded-full flex items-center justify-center">
                            <svg class="w-3 h-3 text-green-800" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Info Kelas --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-xl hover:shadow-[#CB1C8D]/10 transition-all duration-300">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-[#F56EB3]/20 dark:bg-[#CB1C8D]/20 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-[#CB1C8D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Kelas</p>
                        <p class="font-semibold text-gray-900 dark:text-white text-lg">{{ $kelas->pluck('nama_kelas')->join(', ') }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-xl hover:shadow-[#CB1C8D]/10 transition-all duration-300">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-[#CB1C8D]/20 dark:bg-[#F56EB3]/20 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-[#CB1C8D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Wali Kelas</p>
                        <p class="font-semibold text-gray-900 dark:text-white text-lg">{{ $kelas->pluck('guru.nama_guru')->join(', ') }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-xl hover:shadow-[#CB1C8D]/10 transition-all duration-300">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-[#F56EB3]/20 dark:bg-[#CB1C8D]/20 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-[#CB1C8D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Jumlah Siswa</p>
                        <p class="font-semibold text-gray-900 dark:text-white text-lg">{{ $siswa->count() }} Siswa</p>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-xl hover:shadow-[#CB1C8D]/10 transition-all duration-300">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-[#CB1C8D]/20 dark:bg-[#F56EB3]/20 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-[#CB1C8D]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4v10m0 0l-2-2m2 2l2-2m6-6v6m0 0l2-2m-2 2l-2-2"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Semester</p>
                        @php
                            $bulan = date('m');
                            $tahun = date('Y');
                        @endphp
                        <p class="font-semibold text-gray-900 dark:text-white text-lg">{{ $bulan > 6 ? 'Ganjil' : 'Genap' }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Existing Nilai Table --}}
        <div class="bg-white dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 overflow-hidden shadow-xl mb-8">
            <div class="bg-gradient-to-r from-[#CB1C8D] to-[#F56EB3] px-8 py-6">
                <h2 class="text-2xl font-bold text-white">Edit Nilai Siswa</h2>
                <p class="text-white/90 mt-1">Perbarui nilai siswa secara massal dengan mudah</p>
            </div>

            <div class="p-8">
                @if($existingNilai && $existingNilai->count() > 0)
                    <div class="space-y-8">
                        @foreach($existingNilai as $judul => $nilaiList)
                            <div class="bg-gray-50 dark:bg-gray-800/50 rounded-2xl border border-gray-200/50 dark:border-gray-700/50 overflow-hidden shadow-lg">
                                <!-- Nilai Header -->
                                <div class="bg-gradient-to-r from-[#CB1C8D] to-[#F56EB3] text-white px-8 py-6">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <h3 class="text-2xl font-bold">{{ $judul }}</h3>
                                            <p class="text-white/90 mt-1">Jumlah Siswa: {{ $nilaiList->count() }}</p>
                                        </div>
                                        <div class="text-right">
                                            <span class="text-sm text-white/80 bg-white/20 rounded-full px-3 py-1">Nilai #{{ $loop->iteration }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Edit Form for this Nilai -->
                                <div class="p-8">
                                    <form class="edit-nilai-form grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8" data-judul="{{ $judul }}">
                                        @php
                                            $firstNilai = $nilaiList->first()?->first();
                                        @endphp
                                        <div class="form-group">
                                            <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Nama Nilai</label>
                                            <input type="text" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#CB1C8D] focus:border-[#CB1C8D] bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-all duration-200" value="{{ $judul }}">
                                        </div>
                                        <div class="form-group">
                                            <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Bobot Nilai</label>
                                            <input type="number" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#CB1C8D] focus:border-[#CB1C8D] bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-all duration-200 bobot-input" value="{{ $firstNilai ? $firstNilai->bobot : 1 }}" min="1" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Sumber Nilai</label>
                                            <select class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#CB1C8D] focus:border-[#CB1C8D] bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-all duration-200 sumber-select" required>
                                                <option value="manual" {{ $firstNilai && $firstNilai->sumber == 'manual' ? 'selected' : '' }}>Manual</option>
                                                <option value="soal" {{ $firstNilai && $firstNilai->sumber == 'soal' ? 'selected' : '' }}>Dari Soal</option>
                                            </select>
                                        </div>

                                        <!-- Manual Input Section -->
                                        <div class="form-group md:col-span-2 lg:col-span-4 manual-input" style="display: {{ $firstNilai && $firstNilai->sumber == 'manual' ? 'block' : 'none' }};">
                                            <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-4">Nilai Manual untuk Semua Siswa</label>
                                            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4" id="manual-nilai-inputs-{{ $loop->index }}">
                                                @foreach($siswa as $s)
                                                    @php
                                                        $nilai = $nilaiList[$s->id]->first() ?? null;
                                                    @endphp
                                                    <div class="flex items-center space-x-4 bg-white dark:bg-gray-700 rounded-xl p-4 shadow-sm">
                                                        <label class="w-32 text-sm font-semibold text-gray-900 dark:text-white">{{ $s->nama_siswa }}</label>
                                                        <input type="number" class="form-control flex-1 px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#CB1C8D] focus:border-[#CB1C8D] bg-white dark:bg-gray-600 text-gray-900 dark:text-white transition-all duration-200 nilai-input" value="{{ $nilai ? $nilai->nilai : '' }}" min="0" max="100" placeholder="Nilai">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <!-- Soal Input Section -->
                                        <div class="form-group md:col-span-2 lg:col-span-4 soal-input" style="display: {{ $firstNilai && $firstNilai->sumber == 'soal' ? 'block' : 'none' }};">
                                            <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Pilih Soal</label>
                                            <select class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#CB1C8D] focus:border-[#CB1C8D] bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-all duration-200 soal-select">
                                                <option value="">Pilih Soal</option>
                                                @foreach(\App\Soal::where('mapel_id', $mapel->mapel_id)->get() as $soal)
                                                    <option value="{{ $soal->id }}" {{ $firstNilai && $firstNilai->soal_id == $soal->id ? 'selected' : '' }}>{{ $soal->judul }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-gray-50 dark:bg-gray-800/50 p-12 rounded-2xl text-center">
                        <svg class="mx-auto h-20 w-20 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <h3 class="mt-6 text-xl font-bold text-gray-900 dark:text-white">Tidak ada nilai yang dapat diedit</h3>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Belum ada nilai yang dimasukkan untuk mata pelajaran ini.</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8 mt-8">
            @if($existingNilai && $existingNilai->count() > 0)
                <button id="update-semua-nilai" class="group bg-gradient-to-r from-[#CB1C8D] to-[#F56EB3] hover:from-[#b5187f] hover:to-[#e15fa5] border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest shadow-lg hover:shadow-xl focus:ring-4 focus:ring-pink-500/25 focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-0.5 relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/10 to-white/0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700"></div>
                    <span class="relative z-10 flex items-center justify-center px-6 py-4">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Update Semua Nilai
                    </span>
                </button>
            @endif
            <a href="{{ route('nilai.show', $mapel->mapel_id) }}" class="group bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest shadow-lg hover:shadow-xl focus:ring-4 focus:ring-gray-500/25 focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-0.5 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/10 to-white/0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700"></div>
                <span class="relative z-10 flex items-center justify-center px-6 py-4">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Entry Nilai
                </span>
            </a>
        </div>
    </div>
    
    <script>
document.addEventListener('DOMContentLoaded', function () {
    // toggle manual/soal input
    document.querySelectorAll('.sumber-select').forEach(function (select) {
        select.addEventListener('change', function () {
            const form = this.closest('.edit-nilai-form');
            const manualInput = form.querySelector('.manual-input');
            const soalInput = form.querySelector('.soal-input');
            if (this.value === 'manual') {
                manualInput.style.display = 'block';
                soalInput.style.display = 'none';
            } else {
                manualInput.style.display = 'none';
                soalInput.style.display = 'block';
            }
        });
    });

    // =============================
    // 🔹 UPDATE SEMUA NILAI SEKALIGUS
    // =============================
    const updateBtn = document.getElementById('update-semua-nilai');
    if (updateBtn) {
        updateBtn.addEventListener('click', function () {
            // Konfirmasi sebelum update
            const confirmed = confirm('Apakah Anda yakin ingin mengupdate semua nilai?');
            if (!confirmed) return;

            updateBtn.disabled = true;
            updateBtn.textContent = 'Menyimpan...';

            const allData = [];
            const siswaIds = @json($siswa->pluck('id'));

            // Loop semua form nilai
            document.querySelectorAll('.edit-nilai-form').forEach(function (form) {
                const judulBaru = form.querySelector('input[type="text"]').value.trim();
                const judulLama = form.dataset.judul; // judul lama
                const bobot = form.querySelector('.bobot-input').value;
                const sumber = form.querySelector('.sumber-select').value;
                const soal = form.querySelector('.soal-select') ? form.querySelector('.soal-select').value : '';

                form.querySelectorAll('.nilai-input').forEach(function (input, index) {
                    const nilai = parseFloat(input.value) || 0;
                    allData.push({
                        siswa_id: siswaIds[index],
                        mapel_id: {{ $mapel->mapel_id }},
                        judul_lama: judulLama,
                        judul_nilai: judulBaru,
                        nilai: nilai,
                        sumber: sumber,
                        bobot: parseInt(bobot) || 1,
                        soal: soal
                    });
                });
            });

            // Kirim semua data ke backend
            fetch('{{ route("guru.nilai.update.all", $mapel->mapel_id) }}', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(allData)
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    toastr.success(result.success);
                    // Redirect ke halaman nilai setelah sukses
                    setTimeout(() => {
                        window.location.href = '{{ route("nilai.show", $mapel->mapel_id) }}';
                    }, 2000);
                } else {
                    toastr.error(result.error || 'Gagal menyimpan data');
                    updateBtn.disabled = false;
                    updateBtn.textContent = 'Update Semua Nilai';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                toastr.error('Terjadi kesalahan saat menyimpan data');
                updateBtn.disabled = false;
                updateBtn.textContent = 'Update Semua Nilai';
            });
        });
    }
});
</script>
@endsection
