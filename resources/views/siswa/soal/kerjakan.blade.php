@extends('layouts.app2')
@section('pageTitle', 'Kerjakan Soal')
@section('title', 'Kerjakan Soal')
@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 rounded-xl p-6 mb-6 text-white">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold">{{ $soal->judul }}</h1>
                        <p class="text-emerald-100">Kerjakan Soal dengan baik</p>
                    </div>
                </div>
                <div class="text-right">
                    <div class="text-sm text-emerald-100">Waktu Berakhir</div>
                    <div class="text-2xl font-bold" id="countdown">00:00:00</div>
                </div>
            </div>
        </div>

        <!-- Progress Bar -->
        <div class="bg-white dark:bg-white/[0.03] rounded-xl border border-gray-200 dark:border-gray-800 p-6 mb-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-300">Progress Soal</h3>
                <span class="text-sm text-gray-500 dark:text-gray-400" id="progress-text">0 dari {{ count($soalDetail) }}
                    soal</span>
            </div>
            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-3">
                <div class="bg-gradient-to-r from-emerald-500 to-teal-500 h-3 rounded-full transition-all duration-300"
                    id="progress-bar" style="width: 0%"></div>
            </div>
        </div>

        <form id="SoalForm" action="{{ route('soal.siswa.simpan-jawaban', Crypt::encrypt($soal->id)) }}" method="POST">
            @csrf

            @foreach($soalDetail as $index => $item)
                <div
                    class="mb-8 bg-white dark:bg-white/[0.03] rounded-xl border border-gray-200 dark:border-gray-800 overflow-hidden hover:shadow-lg transition-all duration-300">
                    <!-- Question Header -->
                    <div class="bg-gradient-to-r from-blue-500 to-purple-600 p-4">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-white font-bold">{{ $index + 1 }}</span>
                                </div>
                                <h3 class="text-lg font-bold text-white">Soal {{ $index + 1 }}</h3>
                            </div>
                            <div class="flex items-center">
                                <span
                                    class="bg-white/20 text-white px-3 py-1 rounded-full text-sm font-medium">{{ $item->bobot }}
                                    poin</span>
                            </div>
                        </div>
                    </div>

                    <!-- Question Content -->
                    <div class="p-6">
                        <div class="mb-6">
                            @if($item->gambar && is_array($item->gambar))
                                <div class="mb-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2 justify-items-center">
                                    @foreach($item->gambar as $gambar)
                                        <img src="{{ asset('storage/' . $gambar) }}" alt="Gambar Soal"
                                            class="max-w-full max-h-48 w-auto h-auto rounded-lg shadow-md object-contain">
                                    @endforeach
                                </div>
                            @elseif($item->gambar)
                                <div class="mb-4 flex justify-center">
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Soal"
                                        class="max-w-sm max-h-48 w-auto h-auto rounded-lg shadow-md object-contain">
                                </div>
                            @endif
                            <style>
                                .pertanyaan-content ul {
                                    list-style-type: disc !important;
                                    padding-left: 1.5rem !important;
                                }

                                .pertanyaan-content li {
                                    margin-bottom: 0.25rem !important;
                                }
                            </style>
                            <div class="prose prose-lg dark:prose-invert max-w-none pertanyaan-content">
                                {!! $item->pertanyaan !!}
                            </div>
                        </div>

                        @if($item->tipe == 'pilihan_ganda')
                            <div class="space-y-3">
                                @if($item->pilihan_a)
                                    <label
                                        class="flex items-start p-4 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-blue-900/20 hover:border-blue-300 dark:hover:border-blue-600 cursor-pointer transition-all duration-200">
                                        <input type="radio" name="jawaban[{{ $item->id }}]" value="A"
                                            class="mt-1 mr-4 text-blue-600 focus:ring-blue-500">
                                        <div class="flex-1">
                                            <div class="flex items-center mb-1">
                                                <span
                                                    class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-sm font-bold mr-3">A</span>
                                                <span class="text-gray-700 dark:text-gray-300 font-medium">Pilihan A</span>
                                            </div>
                                            <div
                                                class="text-gray-600 dark:text-gray-400 ml-9 prose prose-sm dark:prose-invert max-w-none">
                                                {!! $item->pilihan_a !!}
                                            </div>
                                        </div>
                                    </label>
                                @endif
                                @if($item->pilihan_b)
                                    <label
                                        class="flex items-start p-4 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-blue-900/20 hover:border-blue-300 dark:hover:border-blue-600 cursor-pointer transition-all duration-200">
                                        <input type="radio" name="jawaban[{{ $item->id }}]" value="B"
                                            class="mt-1 mr-4 text-blue-600 focus:ring-blue-500">
                                        <div class="flex-1">
                                            <div class="flex items-center mb-1">
                                                <span
                                                    class="w-6 h-6 bg-green-500 text-white rounded-full flex items-center justify-center text-sm font-bold mr-3">B</span>
                                                <span class="text-gray-700 dark:text-gray-300 font-medium">Pilihan B</span>
                                            </div>
                                            <div
                                                class="text-gray-600 dark:text-gray-400 ml-9 prose prose-sm dark:prose-invert max-w-none">
                                                {!! $item->pilihan_b !!}
                                            </div>
                                        </div>
                                    </label>
                                @endif
                                @if($item->pilihan_c)
                                    <label
                                        class="flex items-start p-4 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-blue-900/20 hover:border-blue-300 dark:hover:border-blue-600 cursor-pointer transition-all duration-200">
                                        <input type="radio" name="jawaban[{{ $item->id }}]" value="C"
                                            class="mt-1 mr-4 text-blue-600 focus:ring-blue-500">
                                        <div class="flex-1">
                                            <div class="flex items-center mb-1">
                                                <span
                                                    class="w-6 h-6 bg-purple-500 text-white rounded-full flex items-center justify-center text-sm font-bold mr-3">C</span>
                                                <span class="text-gray-700 dark:text-gray-300 font-medium">Pilihan C</span>
                                            </div>
                                            <div
                                                class="text-gray-600 dark:text-gray-400 ml-9 prose prose-sm dark:prose-invert max-w-none">
                                                {!! $item->pilihan_c !!}
                                            </div>
                                        </div>
                                    </label>
                                @endif
                                @if($item->pilihan_d)
                                    <label
                                        class="flex items-start p-4 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-blue-900/20 hover:border-blue-300 dark:hover:border-blue-600 cursor-pointer transition-all duration-200">
                                        <input type="radio" name="jawaban[{{ $item->id }}]" value="D"
                                            class="mt-1 mr-4 text-blue-600 focus:ring-blue-500">
                                        <div class="flex-1">
                                            <div class="flex items-center mb-1">
                                                <span
                                                    class="w-6 h-6 bg-orange-500 text-white rounded-full flex items-center justify-center text-sm font-bold mr-3">D</span>
                                                <span class="text-gray-700 dark:text-gray-300 font-medium">Pilihan D</span>
                                            </div>
                                            <div
                                                class="text-gray-600 dark:text-gray-400 ml-9 prose prose-sm dark:prose-invert max-w-none">
                                                {!! $item->pilihan_d !!}
                                            </div>
                                        </div>
                                    </label>
                                @endif
                                @if($item->pilihan_e)
                                    <label
                                        class="flex items-start p-4 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-blue-900/20 hover:border-blue-300 dark:hover:border-blue-600 cursor-pointer transition-all duration-200">
                                        <input type="radio" name="jawaban[{{ $item->id }}]" value="E"
                                            class="mt-1 mr-4 text-blue-600 focus:ring-blue-500">
                                        <div class="flex-1">
                                            <div class="flex items-center mb-1">
                                                <span
                                                    class="w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center text-sm font-bold mr-3">E</span>
                                                <span class="text-gray-700 dark:text-gray-300 font-medium">Pilihan E</span>
                                            </div>
                                            <div
                                                class="text-gray-600 dark:text-gray-400 ml-9 prose prose-sm dark:prose-invert max-w-none">
                                                {!! $item->pilihan_e !!}
                                            </div>
                                        </div>
                                    </label>
                                @endif
                            </div>
                        @elseif($item->tipe == 'essay')
                            <div class="space-y-3">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Jawaban Essay
                                </label>
                                <textarea name="jawaban[{{ $item->id }}]" rows="6"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 resize-vertical"
                                    placeholder="Ketik jawaban Anda di sini..."></textarea>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach

            <!-- Submit Button -->
            <div class="bg-white dark:bg-white/[0.03] rounded-xl border border-gray-200 dark:border-gray-800 p-6">
                <div class="text-center">
                    <button type="button" onclick="confirmSubmit()"
                        class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-green-600 to-emerald-600 border border-transparent rounded-xl font-bold text-lg text-white uppercase tracking-widest hover:from-green-700 hover:to-emerald-700 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-300 transform hover:scale-105 shadow-lg">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Selesai & Kirim Jawaban
                    </button>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-3">
                        Pastikan semua jawaban sudah benar sebelum mengirim
                    </p>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Data dari PHP
        const soalId = {{ $soal->id }};
        const durasiMenit = {{ $soal->durasi }};
        const waktuSelesaiStr = '{{ $soal->waktu_selesai }}'; 
        const serverTime = new Date('{{ now()->format('Y-m-d H:i:s') }}').getTime();
        const totalSoal = {{ count($soalDetail) }};
        
        // LocalStorage Keys
        const STORAGE_KEY_START = `quiz_${soalId}_start_time`;
        const STORAGE_KEY_ANSWERS = `quiz_${soalId}_answers`;

        // 1. Timer Logic with Persistence
        let startTime = localStorage.getItem(STORAGE_KEY_START);
        
        if (!startTime) {
            // First time loading the quiz (or storage cleared)
            startTime = serverTime; 
            localStorage.setItem(STORAGE_KEY_START, startTime);
        } else {
            startTime = parseInt(startTime);
        }

        // Calculate Target End Time based on stored Start Time + Duration
        // Note: JavaScipt timestamps are in milliseconds
        const durationMs = durasiMenit * 60 * 1000;
        const endTimeDuration = startTime + durationMs;
        
        // Calculate Absolute End Time (Hard Deadline from Server)
        const endTimeAbsolute = new Date(waktuSelesaiStr).getTime();
        
        // The actual deadline is the earliest of the two
        const waktuBerakhir = Math.min(endTimeDuration, endTimeAbsolute);

        function updateCountdown() {
            const sekarang = new Date().getTime();
            const selisih = waktuBerakhir - sekarang;

            if (selisih <= 0) {
                document.getElementById('countdown').innerHTML = 'WAKTU HABIS!';
                document.getElementById('countdown').style.color = '#ef4444';
                // Clear storage before submitting to avoid stale data on next attempt (if any)
                localStorage.removeItem(STORAGE_KEY_START);
                localStorage.removeItem(STORAGE_KEY_ANSWERS);
                document.getElementById('SoalForm').submit();
                return;
            }

            const jam = Math.floor(selisih / (1000 * 60 * 60));
            const menit = Math.floor((selisih % (1000 * 60 * 60)) / (1000 * 60));
            const detik = Math.floor((selisih % (1000 * 60)) / 1000);

            let countdownText = '';
            if (jam > 0) {
                countdownText = jam + 'j ' + menit + 'm ' + detik + 's';
            } else {
                countdownText = menit + 'm ' + detik + 's';
            }

            const countdownElem = document.getElementById('countdown');
            if (countdownElem) {
                countdownElem.innerHTML = countdownText;
                // Ubah warna jika waktu tersisa kurang dari 5 menit
                if (selisih < 5 * 60 * 1000) {
                    countdownElem.style.color = '#ef4444';
                } else {
                    countdownElem.style.color = '#ffffff';
                }
            }
        }

        // 2. Answer Persistence Logic
        function loadAnswers() {
            const savedAnswers = JSON.parse(localStorage.getItem(STORAGE_KEY_ANSWERS) || '{}');
            
            // Restore Radio Buttons
            document.querySelectorAll('input[type="radio"]').forEach(radio => {
                const name = radio.name; 
                // name format: jawaban[123]
                if (savedAnswers[name] === radio.value) {
                    radio.checked = true;
                }
            });

            // Restore Textareas
            document.querySelectorAll('textarea').forEach(textarea => {
                const name = textarea.name;
                if (savedAnswers[name]) {
                    textarea.value = savedAnswers[name];
                }
            });

            // Note: File inputs cannot be restored programmatically for security reasons
        }

        function saveAnswer(e) {
            const target = e.target;
            // Only save inputs related to the quiz form
            if (!target.name || !target.name.startsWith('jawaban[')) return;

            const savedAnswers = JSON.parse(localStorage.getItem(STORAGE_KEY_ANSWERS) || '{}');
            savedAnswers[target.name] = target.value;
            localStorage.setItem(STORAGE_KEY_ANSWERS, JSON.stringify(savedAnswers));
            
            updateProgress();
        }

        function updateProgress() {
            const radios = document.querySelectorAll('input[type="radio"]:checked');
            // Check textareas that have content (trim whitespace)
            const textareas = Array.from(document.querySelectorAll('textarea')).filter(t => t.value.trim().length > 0);
            const fileInputs = document.querySelectorAll('input[type="file"]');
            
            const answered = new Set();

            // Count radio button answers
            radios.forEach(radio => {
                const match = radio.name.match(/jawaban\[(\d+)\]/);
                if (match) answered.add(match[1]);
            });

            // Count textarea answers
            textareas.forEach(textarea => {
                const match = textarea.name.match(/jawaban\[(\d+)\]/);
                if (match) answered.add(match[1]);
            });

            // Count file uploads
            fileInputs.forEach(fileInput => {
                if (fileInput.files.length > 0) {
                    const match = fileInput.name.match(/file\[(\d+)\]/);
                    if (match) answered.add(match[1]);
                }
            });

            const answeredCount = answered.size;
            const progressPercent = (answeredCount / totalSoal) * 100;

            const progressBar = document.getElementById('progress-bar');
            const progressText = document.getElementById('progress-text');

            if(progressBar) progressBar.style.width = progressPercent + '%';
            if(progressText) progressText.innerHTML = answeredCount + ' dari ' + totalSoal + ' soal';
        }

        function confirmSubmit() {
            if (confirm('Apakah Anda yakin ingin mengirim jawaban? Pastikan semua jawaban sudah benar.')) {
                // Clear storage on intentional submit
                localStorage.removeItem(STORAGE_KEY_START);
                localStorage.removeItem(STORAGE_KEY_ANSWERS);
                document.getElementById('SoalForm').submit();
            }
        }

        // Event Listeners
        document.addEventListener('DOMContentLoaded', () => {
            loadAnswers();
            updateProgress(); // Initial progress check
            
            // Start timer
            updateCountdown();
            setInterval(updateCountdown, 1000);

            // Listen for changes
            const form = document.getElementById('SoalForm');
            if (form) {
                form.addEventListener('change', saveAnswer);
                form.addEventListener('input', (e) => {
                    // Save textareas on input (debounced could be better but this is simple)
                    if (e.target.tagName === 'TEXTAREA') {
                        saveAnswer(e);
                    }
                });
            }
        });


        // Prevent right-click dan shortcut keyboard (Original protections)
        document.addEventListener('contextmenu', function (e) {
            e.preventDefault();
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'F12' ||
                (e.ctrlKey && e.shiftKey && e.key === 'I') ||
                (e.ctrlKey && e.key === 'U') ||
                (e.ctrlKey && e.key === 'S')) {
                e.preventDefault();
            }
        });

        // Auto-submit saat waktu habis (handled in updateCountdown)
    </script>
@endsection