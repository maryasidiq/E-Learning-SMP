@extends('layouts.app2')
@section('pageTitle', 'Tambah Soal Quis')
@section('title', 'Tambah Soal Quis')
@section('content')
    <div class="max-w-4xl mx-auto bg-white dark:bg-white/[0.03] rounded-xl border border-gray-200 dark:border-gray-800 p-6">
        <h1 class="text-2xl mb-6 dark:text-gray-300">Tambah Soal untuk Quis: {{ $quis->judul }}</h1>

        <!-- Form untuk jumlah soal -->
        <div id="jumlah_soal_form" class="mb-6">
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                <div class="mb-4">
                    <label for="jumlah_soal" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Jumlah
                        Soal yang Akan Dibuat</label>
                    <input type="number" id="jumlah_soal" name="jumlah_soal" min="1" max="50"
                        value="{{ old('jumlah_soal', 1) }}"
                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('jumlah_soal')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="pdf_file" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Upload PDF
                        untuk Generate Soal Otomatis (Opsional)</label>
                    <input type="file" id="pdf_file" name="pdf_file" accept=".pdf"
                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <p class="mt-1 text-sm text-gray-500">Upload PDF materi untuk generate soal otomatis menggunakan AI</p>
                    @error('pdf_file')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex space-x-2">
                    <button type="button" onclick="generateSoalForm()"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Buat Form Soal Manual
                    </button>
                    <button type="button" onclick="generateSoalFromPDF()"
                        class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Generate dari PDF
                    </button>
                </div>
            </div>
        </div>

        <!-- Form soal dinamis -->
        <form id="soal_form" action="{{ route('quis.store-soal', Crypt::encrypt($quis->id)) }}" method="POST"
            style="display: none;">
            @csrf

            <div id="soal_container">
                <!-- Soal akan di-generate di sini -->
            </div>

            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('quis.show', Crypt::encrypt($quis->id)) }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:bg-gray-400 active:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Kembali
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Simpan Semua Soal
                </button>
            </div>
        </form>
    </div>

    <script>
        function generateSoalForm() {
            const jumlahSoal = parseInt(document.getElementById('jumlah_soal').value);
            if (!jumlahSoal || jumlahSoal < 1 || jumlahSoal > 50) {
                alert('Masukkan jumlah soal antara 1-50');
                return;
            }

            const container = document.getElementById('soal_container');
            container.innerHTML = '';

            for (let i = 1; i <= jumlahSoal; i++) {
                const soalDiv = document.createElement('div');
                soalDiv.className = 'mb-8 bg-gray-50 dark:bg-gray-800 p-4 rounded-lg';
                soalDiv.innerHTML = `
                                    <h3 class="text-lg font-semibold mb-4 dark:text-gray-300">Soal ${i}</h3>

                                    <div class="mb-4">
                                        <label for="tipe_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipe Soal</label>
                                        <select id="tipe_${i}" name="soal[${i}][tipe]"
                                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                            required onchange="toggleOptions(${i})">
                                            <option value="">Pilih Tipe Soal</option>
                                            <option value="pilihan_ganda">Pilihan Ganda</option>
                                            <option value="essay">Essay</option>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="pertanyaan_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pertanyaan</label>
                                        <textarea id="pertanyaan_${i}" name="soal[${i}][pertanyaan]" rows="4"
                                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                            required></textarea>
                                    </div>

                                    <div id="pilihan_ganda_options_${i}" class="mb-4" style="display: none;">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pilihan Jawaban</label>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <label for="pilihan_a_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan A</label>
                                                <input type="text" id="pilihan_a_${i}" name="soal[${i}][pilihan_a]"
                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                            </div>

                                            <div>
                                                <label for="pilihan_b_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan B</label>
                                                <input type="text" id="pilihan_b_${i}" name="soal[${i}][pilihan_b]"
                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                            </div>

                                            <div>
                                                <label for="pilihan_c_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan C</label>
                                                <input type="text" id="pilihan_c_${i}" name="soal[${i}][pilihan_c]"
                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                            </div>

                                            <div>
                                                <label for="pilihan_d_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan D</label>
                                                <input type="text" id="pilihan_d_${i}" name="soal[${i}][pilihan_d]"
                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                            </div>

                                            <div>
                                                <label for="pilihan_e_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan E (Opsional)</label>
                                                <input type="text" id="pilihan_e_${i}" name="soal[${i}][pilihan_e]"
                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                            </div>

                                            <div>
                                                <label for="jawaban_benar_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jawaban Benar</label>
                                                <select id="jawaban_benar_${i}" name="soal[${i}][jawaban_benar]"
                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                    <option value="">Pilih Jawaban Benar</option>
                                                    <option value="a">A</option>
                                                    <option value="b">B</option>
                                                    <option value="c">C</option>
                                                    <option value="d">D</option>
                                                    <option value="e">E</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="bobot_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bobot Nilai</label>
                                        <input type="number" id="bobot_${i}" name="soal[${i}][bobot]" value="1" min="1"
                                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                            required>
                                    </div>
                                `;
                container.appendChild(soalDiv);
            }

            document.getElementById('jumlah_soal_form').style.display = 'none';
            document.getElementById('soal_form').style.display = 'block';
        }

        function generateSoalFromPDF() {
            const pdfFile = document.getElementById('pdf_file').files[0];
            const jumlahSoal = parseInt(document.getElementById('jumlah_soal').value);

            if (!pdfFile) {
                alert('Pilih file PDF terlebih dahulu');
                return;
            }

            if (!jumlahSoal || jumlahSoal < 1 || jumlahSoal > 50) {
                alert('Masukkan jumlah soal antara 1-50');
                return;
            }

            // Show loading
            const button = document.querySelector('button[onclick="generateSoalFromPDF()"]');
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Memproses...';
            button.disabled = true;

            const formData = new FormData();
            formData.append('pdf_file', pdfFile);
            formData.append('jumlah_soal', jumlahSoal);
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

            fetch('/guru/quis/generate-soal-pdf', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.cache_key) {
                        // Start polling for results
                        pollForResults(data.cache_key);
                    } else {
                        alert('Error: ' + (data.message || 'Terjadi kesalahan'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat memproses PDF');
                })
                .finally(() => {
                    button.innerHTML = originalText;
                    button.disabled = false;
                });
        }

        function populateSoalForm(soalData) {
            const container = document.getElementById('soal_container');
            container.innerHTML = '';

            soalData.forEach((soal, index) => {
                const i = index + 1;
                const soalDiv = document.createElement('div');
                soalDiv.className = 'mb-8 bg-gray-50 dark:bg-gray-800 p-4 rounded-lg';
                soalDiv.innerHTML = `
                                    <h3 class="text-lg font-semibold mb-4 dark:text-gray-300">Soal ${i}</h3>

                                    <div class="mb-4">
                                        <label for="tipe_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipe Soal</label>
                                        <select id="tipe_${i}" name="soal[${i}][tipe]"
                                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                            required onchange="toggleOptions(${i})">
                                            <option value="">Pilih Tipe Soal</option>
                                            <option value="pilihan_ganda" ${soal.tipe === 'pilihan_ganda' ? 'selected' : ''}>Pilihan Ganda</option>
                                            <option value="essay" ${soal.tipe === 'essay' ? 'selected' : ''}>Essay</option>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="pertanyaan_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pertanyaan</label>
                                        <textarea id="pertanyaan_${i}" name="soal[${i}][pertanyaan]" rows="4"
                                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                            required>${soal.pertanyaan || ''}</textarea>
                                    </div>

                                    <div id="pilihan_ganda_options_${i}" class="mb-4" style="display: ${soal.tipe === 'pilihan_ganda' ? 'block' : 'none'};">
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pilihan Jawaban</label>

                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <label for="pilihan_a_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan A</label>
                                                <input type="text" id="pilihan_a_${i}" name="soal[${i}][pilihan_a]" value="${soal.pilihan_a || ''}"
                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                            </div>

                                            <div>
                                                <label for="pilihan_b_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan B</label>
                                                <input type="text" id="pilihan_b_${i}" name="soal[${i}][pilihan_b]" value="${soal.pilihan_b || ''}"
                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                            </div>

                                            <div>
                                                <label for="pilihan_c_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan C</label>
                                                <input type="text" id="pilihan_c_${i}" name="soal[${i}][pilihan_c]" value="${soal.pilihan_c || ''}"
                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                            </div>

                                            <div>
                                                <label for="pilihan_d_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan D</label>
                                                <input type="text" id="pilihan_d_${i}" name="soal[${i}][pilihan_d]" value="${soal.pilihan_d || ''}"
                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                            </div>

                                            <div>
                                                <label for="pilihan_e_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilihan E (Opsional)</label>
                                                <input type="text" id="pilihan_e_${i}" name="soal[${i}][pilihan_e]" value="${soal.pilihan_e || ''}"
                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                            </div>

                                            <div>
                                                <label for="jawaban_benar_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jawaban Benar</label>
                                                <select id="jawaban_benar_${i}" name="soal[${i}][jawaban_benar]"
                                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                    <option value="">Pilih Jawaban Benar</option>
                                                    <option value="a" ${soal.jawaban_benar === 'a' ? 'selected' : ''}>A</option>
                                                    <option value="b" ${soal.jawaban_benar === 'b' ? 'selected' : ''}>B</option>
                                                    <option value="c" ${soal.jawaban_benar === 'c' ? 'selected' : ''}>C</option>
                                                    <option value="d" ${soal.jawaban_benar === 'd' ? 'selected' : ''}>D</option>
                                                    <option value="e" ${soal.jawaban_benar === 'e' ? 'selected' : ''}>E</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="bobot_${i}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bobot Nilai</label>
                                        <input type="number" id="bobot_${i}" name="soal[${i}][bobot]" value="${soal.bobot || 1}" min="1"
                                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                            required>
                                    </div>
                                `;
                container.appendChild(soalDiv);
            });

            document.getElementById('jumlah_soal_form').style.display = 'none';
            document.getElementById('soal_form').style.display = 'block';
        }

        function pollForResults(cacheKey) {
            const button = document.querySelector('button[onclick="generateSoalFromPDF()"]');
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Memproses...';
            button.disabled = true;

            const pollInterval = setInterval(() => {
                fetch('/guru/quis/check-generate-status', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ cache_key: cacheKey })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success && data.soal) {
                            clearInterval(pollInterval);
                            populateSoalForm(data.soal);
                            button.innerHTML = originalText;
                            button.disabled = false;
                        } else if (data.processing) {
                            // Continue polling
                            button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Masih diproses...';
                        } else {
                            clearInterval(pollInterval);
                            alert('Error: ' + (data.message || 'Terjadi kesalahan'));
                            button.innerHTML = originalText;
                            button.disabled = false;
                        }
                    })
                    .catch(error => {
                        clearInterval(pollInterval);
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat memeriksa status');
                        button.innerHTML = originalText;
                        button.disabled = false;
                    });
            }, 2000); // Poll every 2 seconds

            // Stop polling after 5 minutes
            setTimeout(() => {
                clearInterval(pollInterval);
                button.innerHTML = originalText;
                button.disabled = false;
                alert('Timeout: Proses memakan waktu terlalu lama. Silakan coba lagi.');
            }, 300000); // 5 minutes
        }

        function toggleOptions(soalIndex) {
            const tipe = document.getElementById(`tipe_${soalIndex}`).value;
            const options = document.getElementById(`pilihan_ganda_options_${soalIndex}`);
            if (tipe === 'pilihan_ganda') {
                options.style.display = 'block';
            } else {
                options.style.display = 'none';
            }
        }
    </script>
@endsection