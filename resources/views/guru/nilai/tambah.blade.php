@extends('layouts.app2')
@section('pageTitle', 'Tambah Nilai')
@section('title', 'Tambah Nilai')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div
            class="bg-gradient-to-br from-[#CB1C8D] to-[#F56EB3] dark:from-[#CB1C8D] dark:to-[#F56EB3] rounded-2xl p-8 mb-8 text-white shadow-2xl relative overflow-hidden">
            <div class="absolute inset-0 bg-white/10"></div>
            <div class="relative z-10 flex items-center justify-between">
                <div class="animate-fade-in">
                    <h1 class="text-4xl font-extrabold mb-3 text-white dark:text-gray-100">Tambah Nilai Baru</h1>
                    <p class="text-white/90 dark:text-gray-200 text-lg font-medium">Tambahkan nilai akademik baru untuk
                        siswa</p>
                    <div class="mt-4 flex items-center space-x-4">
                        <div class="flex items-center bg-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm font-medium text-white dark:text-gray-100">{{ $siswa->count() }}
                                Siswa</span>
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
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
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

        {{-- Info Kelas --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
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
                        <p class="font-semibold text-gray-900 dark:text-white text-lg">
                            {{ $kelas->pluck('nama_kelas')->join(', ') }}
                        </p>
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
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Wali Kelas</p>
                        <p class="font-semibold text-gray-900 dark:text-white text-lg">
                            {{ $kelas->pluck('guru.nama_guru')->join(', ') }}
                        </p>
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
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Jumlah Siswa</p>
                        <p class="font-semibold text-gray-900 dark:text-white text-lg">{{ $siswa->count() }} Siswa</p>
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
                                d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4v10m0 0l-2-2m2 2l2-2m6-6v6m0 0l2-2m-2 2l-2-2">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 uppercase tracking-wide">Semester</p>
                        @php
                            $bulan = date('m');
                            $tahun = date('Y');
                        @endphp
                        <p class="font-semibold text-gray-900 dark:text-white text-lg">{{ $bulan > 6 ? 'Ganjil' : 'Genap' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>



        {{-- Form Tambah Nilai --}}
        <div
            class="bg-white dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 overflow-hidden shadow-xl">
            <div class="bg-gradient-to-r from-[#CB1C8D] to-[#F56EB3] px-8 py-6">
                <h2 class="text-2xl font-bold text-white">Form Tambah Nilai</h2>
                <p class="text-white/90 mt-1">Isi informasi nilai yang akan ditambahkan</p>
            </div>

            <div class="p-8">
                <form id="add-nilai-form" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="form-group">
                        <label for="judul_nilai" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Nama
                            Nilai</label>
                        <select
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#CB1C8D] focus:border-[#CB1C8D] bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-all duration-200"
                            id="judul_nilai" name="judul_nilai" required>
                            <option value="">Pilih atau Ketik Nama Nilai</option>
                            <option value="UTS">UTS</option>
                            <option value="UAS">UAS</option>
                            <option value="Tugas">Tugas</option>
                            <option value="Quiz">Quiz</option>
                            <option value="Praktikum">Praktikum</option>
                        </select>
                        <input type="text" id="judul_nilai_custom"
                            class="w-full px-4 py-3 mt-2 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#CB1C8D] focus:border-[#CB1C8D] bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-all duration-200"
                            placeholder="Atau ketik nama nilai custom" style="display: none;">
                    </div>

                    <div class="form-group">
                        <label for="bobot" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Bobot
                            Nilai</label>
                        <input type="number"
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#CB1C8D] focus:border-[#CB1C8D] bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-all duration-200"
                            id="bobot" name="bobot" min="1" value="1" required>
                    </div>

                    <div class="form-group">
                        <label for="sumber" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Sumber
                            Nilai</label>
                        <select
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#CB1C8D] focus:border-[#CB1C8D] bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-all duration-200"
                            id="sumber" name="sumber" required>
                            <option value="manual">Manual</option>
                            <option value="soal">Dari Soal</option>
                        </select>
                    </div>

                    <div class="form-group md:col-span-2 lg:col-span-4" id="manual-input" style="display: block;">
                        <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-3">Nilai Manual untuk
                            Semua Siswa</label>
                        <div class="bg-gray-50 dark:bg-gray-800/50 rounded-xl p-4 space-y-3" id="manual-nilai-inputs">
                            @foreach($siswa as $s)
                                <div class="flex items-center space-x-4 bg-white dark:bg-gray-700/50 rounded-lg p-3">
                                    <label
                                        class="w-32 text-sm font-medium text-gray-700 dark:text-gray-300">{{ $s->nama_siswa }}</label>
                                    <input type="number"
                                        class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#CB1C8D] focus:border-[#CB1C8D] bg-white dark:bg-gray-600 text-gray-900 dark:text-white transition-all duration-200"
                                        name="nilai_manual[{{ $s->id }}]" min="0" max="100" placeholder="Masukkan nilai">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group md:col-span-2 lg:col-span-4" id="soal-input" style="display: none;">
                        <label for="soal" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Pilih
                            Soal</label>
                        <select
                            class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#CB1C8D] focus:border-[#CB1C8D] bg-white dark:bg-gray-700 text-gray-900 dark:text-white transition-all duration-200"
                            id="soal" name="soal">
                            <option value="">Pilih Soal</option>
                            @foreach(\App\Soal::where('mapel_id', $mapel->mapel_id)->get() as $soal)
                                <option value="{{ $soal->id }}">{{ $soal->judul }}</option>
                            @endforeach
                        </select>
                    </div>


                </form>
            </div>
        </div>
        {{-- Action Button --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8 mt-8">
            <button type="submit" id="tambah-nilai-btn"
                class="group bg-gradient-to-r from-[#CB1C8D] to-[#F56EB3] hover:from-[#b5187f] hover:to-[#e15fa5] border border-transparent rounded-xl font-bold text-sm text-white uppercase tracking-widest shadow-lg hover:shadow-xl focus:ring-4 focus:ring-pink-500/25 focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] hover:-translate-y-0.5 relative overflow-hidden">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/10 to-white/0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700">
                </div>
                <span class="relative z-10 flex items-center justify-center px-6 py-4">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Nilai
                </span>
            </button>
            <a href="{{ route('nilai.show', $mapel->mapel_id) }}"
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
        // Toggle input fields based on sumber selection
        document.getElementById('sumber').addEventListener('change', function () {
            if (this.value === 'manual') {
                document.getElementById('manual-input').style.display = 'block';
                document.getElementById('soal-input').style.display = 'none';
            } else {
                document.getElementById('manual-input').style.display = 'none';
                document.getElementById('soal-input').style.display = 'block';
            }
        });

        // Handle judul_nilai selection
        document.getElementById('judul_nilai').addEventListener('change', function () {
            const customInput = document.getElementById('judul_nilai_custom');
            if (this.value === '') {
                customInput.style.display = 'block';
                customInput.required = true;
                this.required = false; // Remove required from select when custom input is shown
            } else {
                customInput.style.display = 'none';
                customInput.required = false;
                customInput.value = '';
                this.required = true; // Ensure select is required when custom input is hidden
            }
        });

        // Function to handle nilai submission
        function submitNilai() {
            // Disable button to prevent double submission
            const submitBtn = document.getElementById('tambah-nilai-btn');
            submitBtn.disabled = true;
            submitBtn.querySelector('span').textContent = 'Menyimpan...';

            let judulNilai = document.getElementById('judul_nilai').value;
            const customJudul = document.getElementById('judul_nilai_custom').value;
            if (judulNilai === '' && customJudul) {
                judulNilai = customJudul;
            }
            const bobot = document.getElementById('bobot').value;
            const sumber = document.getElementById('sumber').value;
            const soal = document.getElementById('soal').value;

            // Check if judul_nilai is provided either from select or custom input
            if (!judulNilai && !customJudul) {
                alert('Harap isi nama nilai.');
                submitBtn.disabled = false;
                submitBtn.querySelector('span').textContent = 'Tambah Nilai';
                return;
            }

            if (!bobot || !sumber) {
                alert('Harap isi semua field yang diperlukan.');
                submitBtn.disabled = false;
                submitBtn.querySelector('span').textContent = 'Tambah Nilai';
                return;
            }

            if (sumber === 'soal' && !soal) {
                alert('Harap pilih soal.');
                submitBtn.disabled = false;
                submitBtn.querySelector('span').textContent = 'Tambah Nilai';
                return;
            }

            // Prepare data for all siswa
            const data = [];
                                                        {{ $siswa->pluck('id')->toJson() }}.forEach(siswaId => {
                let nilai = 0;
                if (sumber === 'manual') {
                    // Get nilai from individual inputs
                    const nilaiInput = document.querySelector(`input[name="nilai_manual[${siswaId}]"]`);
                    nilaiInput.removeAttribute('required');
                    nilai = parseFloat(nilaiInput.value) || 0;
                } else {
                    // For soal, we'll need to get nilai from soal in the controller
                    // For now, set to 0 and let controller handle it
                    nilai = 0;
                }
                data.push({
                    siswa_id: siswaId,
                    mapel_id: {{ $mapel->mapel_id }},
                    judul_nilai: judulNilai,
                    nilai: nilai,
                    sumber: sumber,
                    bobot: parseInt(bobot) || 1,
                    soal: soal
                });
            });

            // Send AJAX to save
            fetch('{{ route("nilai.store") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        toastr.success(result.success);
                        // Redirect back to nilai page
                        window.location.href = '{{ route("nilai.show", $mapel->mapel_id) }}';
                    } else {
                        toastr.error(result.error);
                        submitBtn.disabled = false;
                        submitBtn.querySelector('span').textContent = 'Tambah Nilai';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    toastr.error('Terjadi kesalahan saat menyimpan data');
                    submitBtn.disabled = false;
                    submitBtn.querySelector('span').textContent = 'Tambah Nilai';
                });
        }

        // Handle form submission for adding nilai
        document.getElementById('add-nilai-form').addEventListener('submit', function (e) {
            e.preventDefault();
            submitNilai();
        });

        // Handle button click for adding nilai
        document.getElementById('tambah-nilai-btn').addEventListener('click', function (e) {
            e.preventDefault();
            submitNilai();
        });
    </script>
@endsection