@extends('layouts.app2')
@section('pageTitle', 'Panduan Pengguna')
@section('title', 'Panduan Pengguna Sistem Informasi Akademik SMP Negeri 2 Mlati')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl p-8 mb-8 text-white shadow-2xl">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">Panduan Pengguna</h1>
                <p class="text-xl opacity-90">Sistem Informasi Akademik SMP Negeri 2 Mlati</p>
                <p class="text-lg mt-2 opacity-80">ELSDUMI - E-Learning SMP Negeri 2 Mlati</p>
            </div>
        </div>

        <!-- Table of Contents -->
        <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 mb-8 shadow-xl">
            <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">Daftar Isi</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div>
                    <h3 class="font-semibold text-lg mb-3 text-blue-600 dark:text-blue-400">Umum</h3>
                    <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                        <li><a href="#pendahuluan" class="hover:text-blue-600">Pendahuluan</a></li>
                        <li><a href="#login" class="hover:text-blue-600">Cara Login</a></li>
                        <li><a href="#dashboard" class="hover:text-blue-600">Dashboard</a></li>
                    </ul>
                </div>
                @if(Auth::user()->role == 'Siswa')
                    <div>
                        <h3 class="font-semibold text-lg mb-3 text-green-600 dark:text-green-400">Untuk Siswa</h3>
                        <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                            <li><a href="#siswa-jadwal" class="hover:text-green-600">Melihat Jadwal</a></li>
                            <li><a href="#siswa-materi" class="hover:text-green-600">Mengakses Materi</a></li>
                            <li><a href="#siswa-soal" class="hover:text-green-600">Mengerjakan Soal</a></li>
                            <!-- <li><a href="#siswa-nilai" class="hover:text-green-600">Melihat Nilai</a></li> -->
                            <li><a href="#siswa-rapot" class="hover:text-green-600">Melihat Nilai Akademik</a></li>
                        </ul>
                    </div>
                @endif
                @if(Auth::user()->role == 'Guru')
                    <div>
                        <h3 class="font-semibold text-lg mb-3 text-purple-600 dark:text-purple-400">Untuk Guru</h3>
                        <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                            <!-- <li><a href="#guru-absen" class="hover:text-purple-600">Mengisi Absensi</a></li> -->

                            <li><a href="#guru-materi" class="hover:text-purple-600">Upload Materi</a></li>
                            <li><a href="#guru-soal" class="hover:text-purple-600">Membuat Soal</a></li>
                            <li><a href="#guru-nilai" class="hover:text-purple-600">Input Nilai Akademik</a></li>
                        </ul>
                    </div>
                @endif
                <div>
                    <h3 class="font-semibold text-lg mb-3 text-orange-600 dark:text-orange-400">Lainnya</h3>
                    <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                        <li><a href="#pengaturan" class="hover:text-orange-600">Pengaturan Profil</a></li>
                        <li><a href="#bantuan" class="hover:text-orange-600">Bantuan & Dukungan</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Content Sections -->
        <div class="space-y-8">
            <!-- Pendahuluan -->
            <section id="pendahuluan" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl">
                <h2 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">Pendahuluan</h2>
                <div class="prose prose-lg dark:prose-invert max-w-none">
                    <p>Sistem Informasi Akademik SMP Negeri 2 Mlati (ELSDUMI) adalah platform e-learning yang dirancang
                        untuk memfasilitasi proses pembelajaran di sekolah. Sistem ini menyediakan berbagai fitur untuk
                        siswa, guru, dan administrator sekolah.</p>
                    <p>Sistem ini dibangun dengan teknologi modern untuk memastikan kemudahan penggunaan dan keamanan data.
                        Panduan ini akan membantu Anda memahami cara menggunakan sistem ini secara efektif.</p>
                </div>
            </section>

            <!-- Login -->
            <section id="login" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl">
                <h2 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">Cara Login</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-4 text-blue-600 dark:text-blue-400">Langkah-langkah Login:</h3>
                        <ol class="list-decimal list-inside space-y-2 text-gray-600 dark:text-gray-300">
                            <li>Buka browser dan akses alamat website sekolah</li>
                            <li>Klik tombol "Login" di halaman utama</li>
                            <li>Masukkan email dan password yang telah diberikan</li>
                            <li>Klik tombol "Masuk"</li>
                            <li>Anda akan diarahkan ke dashboard sesuai role Anda</li>
                        </ol>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4">
                        <h4 class="font-semibold mb-2">Catatan:</h4>
                        <ul class="list-disc list-inside space-y-1 text-sm text-gray-600 dark:text-gray-300">
                            <li>Pastikan menggunakan email yang valid</li>
                            <li>Password case-sensitive</li>
                            <li>Jika lupa password, hubungi administrator</li>
                            <li>Sistem akan logout otomatis setelah 2 jam tidak aktif</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Dashboard -->
            <section id="dashboard" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl">
                <h2 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">Dashboard</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4">Dashboard adalah halaman utama setelah login yang
                    menampilkan informasi penting.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-semibold mb-3">Fitur Dashboard:</h3>
                        <ul class="space-y-2">
                            <li class="flex items-center"><span class="w-2 h-2 bg-blue-500 rounded-full mr-3"></span>Jadwal
                                pelajaran hari ini</li>
                            <li class="flex items-center"><span
                                    class="w-2 h-2 bg-green-500 rounded-full mr-3"></span>Pengumuman sekolah</li>
                            <li class="flex items-center"><span
                                    class="w-2 h-2 bg-purple-500 rounded-full mr-3"></span>Tanggal dan waktu real-time</li>
                            <!-- <li class="flex items-center"><span
                                        class="w-2 h-2 bg-orange-500 rounded-full mr-3"></span>Status kehadiran guru</li> -->
                        </ul>
                    </div>
                    <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-4">
                        <h4 class="font-semibold text-blue-800 dark:text-blue-200 mb-2">Tips:</h4>
                        <p class="text-sm text-blue-700 dark:text-blue-300">Dashboard akan menampilkan jadwal real-time.
                            Jika ada perubahan jadwal, sistem akan memperbarui secara otomatis setiap menit.</p>
                    </div>
                </div>
            </section>

            @if(Auth::user()->role == 'Siswa')
                <!-- Siswa Sections -->
                <section id="siswa-jadwal" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl">
                    <h2 class="text-3xl font-bold mb-6 text-green-600 dark:text-green-400">Untuk Siswa - Melihat Jadwal</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-xl font-semibold mb-4">Cara Melihat Jadwal:</h3>
                            <ol class="list-decimal list-inside space-y-2 text-gray-600 dark:text-gray-300">
                                <li>Login sebagai siswa</li>
                                <li>Klik menu "Jadwal" di sidebar</li>
                                <li>Pilih "Jadwal Siswa"</li>
                                <li>Lihat jadwal pelajaran Anda</li>
                            </ol>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4">
                            <p class="text-sm text-green-700 dark:text-green-300">Jadwal menampilkan mata pelajaran, waktu,
                                ruangan, dan nama guru pengajar.</p>
                        </div>
                    </div>
                </section>

                <section id="siswa-materi" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl">
                    <h2 class="text-3xl font-bold mb-6 text-green-600 dark:text-green-400">Untuk Siswa - Mengakses Materi</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-xl font-semibold mb-4">Cara Mengakses Materi:</h3>
                            <ol class="list-decimal list-inside space-y-2 text-gray-600 dark:text-gray-300">
                                <li>Klik menu "Materi" di sidebar</li>
                                <li>Pilih "Materi Siswa"</li>
                                <li>Browse materi yang tersedia</li>
                                <li>Klik judul materi untuk melihat detail</li>
                                <li>Download file materi jika diperlukan</li>
                            </ol>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4">
                            <p class="text-sm text-green-700 dark:text-green-300">Materi berisi file PDF, dokumen, atau video
                                pembelajaran yang diupload oleh guru.</p>
                        </div>
                    </div>
                </section>

                <section id="siswa-soal" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl">
                    <h2 class="text-3xl font-bold mb-6 text-green-600 dark:text-green-400">Untuk Siswa - Mengerjakan Soal</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-xl font-semibold mb-4">Cara Mengerjakan Soal:</h3>
                            <ol class="list-decimal list-inside space-y-2 text-gray-600 dark:text-gray-300">
                                <li>Klik menu "Soal" di sidebar</li>
                                <li>Pilih "Soal Siswa"</li>
                                <li>Klik tombol "Kerjakan" pada soal yang tersedia</li>
                                <li>Jawab pertanyaan sesuai instruksi</li>
                                <li>Klik "Simpan Jawaban" setelah selesai</li>
                            </ol>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4">
                            <p class="text-sm text-green-700 dark:text-green-300">Soal dapat berupa pilihan ganda, essay, atau
                                upload file. Pastikan mengerjakan sebelum batas waktu habis.</p>
                        </div>
                    </div>
                </section>

                <!-- <section id="siswa-nilai" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl">
                            <h2 class="text-3xl font-bold mb-6 text-green-600 dark:text-green-400">Untuk Siswa - Melihat Nilai</h2>
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <div>
                                    <h3 class="text-xl font-semibold mb-4">Cara Melihat Nilai:</h3>
                                    <ol class="list-decimal list-inside space-y-2 text-gray-600 dark:text-gray-300">
                                        <li>Klik menu "Soal " di sidebar</li>
                                        <li>Pilih "Nilai Siswa"</li>
                                        <li>Lihat nilai per mata pelajaran</li>
                                        <li>Klik detail untuk melihat breakdown nilai</li>
                                    </ol>
                                </div>
                                <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4">
                                    <p class="text-sm text-green-700 dark:text-green-300">Nilai mencakup nilai ulangan, tugas, dan nilai
                                        akhir. Hubungi guru jika ada pertanyaan.</p>
                                </div>
                            </div>
                        </section> -->

                <section id="siswa-rapot" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl">
                    <h2 class="text-3xl font-bold mb-6 text-green-600 dark:text-green-400">Untuk Siswa - Melihat Nilai Akademik
                    </h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-xl font-semibold mb-4">Cara Melihat Nilai Akademik:</h3>
                            <ol class="list-decimal list-inside space-y-2 text-gray-600 dark:text-gray-300">
                                <li>Klik menu "nilai" di sidebar</li>
                                <li>Pilih "Lihat Lainnya"</li>
                                <li>Lihat nilai akhir dan predikat</li>
                                <li>Download nilai jika tersedia</li>
                            </ol>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4">
                            <p class="text-sm text-green-700 dark:text-green-300">Nilai akademik berisi nilai akhir semester dan
                                penilaian sikap siswa.</p>
                        </div>
                    </div>
                </section>
            @endif

            @if(Auth::user()->role == 'Guru')
                <!-- Guru Sections -->
                <!-- <section id="guru-absen" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl">
                            <h2 class="text-3xl font-bold mb-6 text-purple-600 dark:text-purple-400">Untuk Guru - Mengisi Absensi</h2>
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <div>
                                    <h3 class="text-xl font-semibold mb-4">Cara Mengisi Absensi:</h3>
                                    <ol class="list-decimal list-inside space-y-2 text-gray-600 dark:text-gray-300">
                                        <li>Klik menu "Absen" di sidebar</li>
                                        <li>Pilih "Absen Harian"</li>
                                        <li>Pilih tanggal yang diinginkan</li>
                                        <li>Isi status kehadiran untuk setiap siswa</li>
                                        <li>Klik "Simpan" untuk menyimpan data</li>
                                    </ol>
                                </div>
                                <div class="bg-purple-50 dark:bg-purple-900/20 rounded-lg p-4">
                                    <p class="text-sm text-purple-700 dark:text-purple-300">Status absensi: Hadir (hijau), Sakit
                                        (kuning), Izin (biru), Alpha (merah).</p>
                                </div>
                            </div>
                        </section> -->



                <section id="guru-materi" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl">
                    <h2 class="text-3xl font-bold mb-6 text-purple-600 dark:text-purple-400">Untuk Guru - Upload Materi</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-xl font-semibold mb-4">Cara Upload Materi:</h3>
                            <ol class="list-decimal list-inside space-y-2 text-gray-600 dark:text-gray-300">
                                <li>Klik menu "Materi" di sidebar</li>
                                <li>Klik "Tambah Materi Baru"</li>
                                <li>Isi judul dan deskripsi</li>
                                <li>Upload file (PDF, DOC, PPT, dll)</li>
                                <li>Pilih kelas dan mapel terkait</li>
                                <li>Klik "Simpan"</li>
                            </ol>
                        </div>
                        <div class="bg-purple-50 dark:bg-purple-900/20 rounded-lg p-4">
                            <p class="text-sm text-purple-700 dark:text-purple-300">Materi akan dapat diakses siswa sesuai kelas
                                yang dipilih. Ukuran file maksimal 10MB.</p>
                        </div>
                    </div>
                </section>

                <section id="guru-soal" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl">
                    <h2 class="text-3xl font-bold mb-6 text-purple-600 dark:text-purple-400">Untuk Guru - Membuat Soal</h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-xl font-semibold mb-4">Cara Membuat Soal:</h3>
                            <ol class="list-decimal list-inside space-y-2 text-gray-600 dark:text-gray-300">
                                <li>Klik menu "Soal" di sidebar</li>
                                <li>Klik "Tambah Soal Baru"</li>
                                <li>Isi judul dan deskripsi soal</li>
                                <li>Tambah pertanyaan satu per satu</li>
                                <li>Pilih tipe jawaban (pilihan ganda, essay)</li>
                                <li>Set waktu pengerjaan dan nilai</li>
                                <li>Klik "Simpan"</li>
                            </ol>
                        </div>
                        <div class="bg-purple-50 dark:bg-purple-900/20 rounded-lg p-4">
                            <p class="text-sm text-purple-700 dark:text-purple-300">Soal dapat dibuat dari template Excel atau
                                manual. Siswa dapat mengerjakan secara online.</p>
                        </div>
                    </div>
                </section>
                <section id="guru-nilai" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl">
                    <h2 class="text-3xl font-bold mb-6 text-purple-600 dark:text-purple-400">Untuk Guru - Input Nilai Akademik
                    </h2>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-xl font-semibold mb-4">Cara Input Nilai Akademik:</h3>
                            <ol class="list-decimal list-inside space-y-2 text-gray-600 dark:text-gray-300">
                                <li>Klik menu "Nilai" di sidebar</li>
                                <li>Pilih mata pelajaran Anda</li>
                                <li>Klik "Tambah Nilai" untuk siswa tertentu</li>
                                <li>Isi nilai ulangan, tugas, dll</li>
                                <li>Klik "Update" untuk menyimpan</li>
                            </ol>
                        </div>
                        <div class="bg-purple-50 dark:bg-purple-900/20 rounded-lg p-4">
                            <p class="text-sm text-purple-700 dark:text-purple-300">Nilai dapat diinput per siswa atau massal.
                                Pastikan nilai sudah benar sebelum disimpan.</p>
                        </div>
                    </div>
                </section>
            @endif



            <!-- Pengaturan -->
            <section id="pengaturan" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl">
                <h2 class="text-3xl font-bold mb-6 text-orange-600 dark:text-orange-400">Pengaturan Profil</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-4">Cara Mengubah Profil:</h3>
                        <ol class="list-decimal list-inside space-y-2 text-gray-600 dark:text-gray-300">
                            <li>Klik menu "Profile" di sidebar</li>
                            <li>Pilih "Pengaturan Profile"</li>
                            <li>Edit data pribadi (nama, email, dll)</li>
                            <li>Upload foto profil baru</li>
                            <li>Klik "Ubah Profile" untuk menyimpan</li>
                        </ol>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold mb-4">Cara Mengubah Password:</h3>
                        <ol class="list-decimal list-inside space-y-2 text-gray-600 dark:text-gray-300">
                            <li>Klik menu "Profile" > "Pengaturan Password"</li>
                            <li>Masukkan password lama</li>
                            <li>Masukkan password baru (minimal 8 karakter)</li>
                            <li>Konfirmasi password baru</li>
                            <li>Klik "Ubah Password"</li>
                        </ol>
                    </div>
                </div>
            </section>

            <!-- Bantuan -->
            <section id="bantuan" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl">
                <h2 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">Bantuan & Dukungan</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-4 text-blue-600 dark:text-blue-400">Jika Mengalami Masalah:</h3>
                        <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                            <li>• Cek koneksi internet</li>
                            <li>• Refresh halaman browser</li>
                            <li>• Clear cache browser</li>
                            <li>• Gunakan browser terbaru (Chrome, Firefox, Edge)</li>
                            <li>• Logout dan login kembali</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold mb-4 text-green-600 dark:text-green-400">Kontak Dukungan:</h3>
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4">
                            <p class="text-gray-700 dark:text-gray-300">
                                <strong>Admin Sistem:</strong><br>
                                Email: admin@smpn2mlati.sch.id<br>
                                Telp: (0274) 1234567<br>
                                <br>
                                <strong>Tim IT Sekolah</strong><br>
                                Gedung Administrasi<br>
                                SMP Negeri 2 Mlati
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <div class="mt-12 text-center">
            <div class="bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-600 rounded-2xl p-6">
                <h3 class="text-xl font-bold mb-2 text-gray-900 dark:text-white">Terima Kasih</h3>
                <p class="text-gray-600 dark:text-gray-300">Panduan ini dibuat untuk memudahkan penggunaan Sistem Informasi
                    Akademik SMP Negeri 2 Mlati. Semoga bermanfaat!</p>
                <!-- <p class="text-sm text-gray-500 dark:text-gray-400 mt-4">© 2024 SMP Negeri 2 Mlati - ELSDUMI</p> -->
            </div>
        </div>
    </div>

    <style>
        /* Smooth scrolling for anchor links */
        html {
            scroll-behavior: smooth;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        /* Print styles */
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>

    <script>
        // Add smooth scrolling to all anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add active class to current section in TOC
        window.addEventListener('scroll', function () {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('a[href^="#"]');

            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (pageYOffset >= sectionTop - 60) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('font-bold', 'text-blue-600');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('font-bold', 'text-blue-600');
                }
            });
        });
    </script>
@endsection