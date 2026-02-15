@extends('template_backend.home')
@section('pageTitle', 'Panduan Admin')
@section('title', 'Panduan Pengguna Sistem Informasi Akademik SMP Negeri 2 Mlati - Admin')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl p-8 mb-8 text-grey shadow-2xl">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-4">Panduan Admin</h1>
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
                        <li><a href="#dashboard" class="hover:text-blue-600">Dashboard Admin</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-lg mb-3 text-green-600 dark:text-green-400">Manajemen Data</h3>
                    <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                        <li><a href="#guru" class="hover:text-green-600">Kelola Guru</a></li>
                        <li><a href="#siswa" class="hover:text-green-600">Kelola Siswa</a></li>
                        <li><a href="#kelas" class="hover:text-green-600">Kelola Kelas</a></li>
                        <li><a href="#mapel" class="hover:text-green-600">Kelola Mata Pelajaran</a></li>
                        <li><a href="#jadwal" class="hover:text-green-600">Kelola Jadwal</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-lg mb-3 text-purple-600 dark:text-purple-400">Fitur Akademik</h3>
                    <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                        <li><a href="#nilai" class="hover:text-purple-600">Input Nilai</a></li>
                        <li><a href="#rapot" class="hover:text-purple-600">Kelola Rapot</a></li>
                        <li><a href="#pengumuman" class="hover:text-purple-600">Pengumuman</a></li>
                    </ul>
                </div>
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
                        admin sekolah dalam mengelola data akademik dan operasional.</p>
                    <p>Sistem ini dibangun dengan teknologi modern untuk memastikan kemudahan penggunaan dan keamanan data.
                        Panduan ini akan membantu Anda memahami cara menggunakan sistem ini secara efektif sebagai
                        administrator.</p>
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
                            <li>Masukkan email dan password admin yang telah diberikan</li>
                            <li>Klik tombol "Masuk"</li>
                            <li>Anda akan diarahkan ke dashboard admin</li>
                        </ol>
                    </div>
                    <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4">
                        <h4 class="font-semibold mb-2">Catatan:</h4>
                        <ul class="list-disc list-inside space-y-1 text-sm text-gray-600 dark:text-gray-300">
                            <li>Pastikan menggunakan email admin yang valid</li>
                            <li>Password case-sensitive</li>
                            <li>Jika lupa password, hubungi developer sistem</li>
                            <li>Sistem akan logout otomatis setelah 2 jam tidak aktif</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Dashboard Admin -->
            <section id="dashboard" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl">
                <h2 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">Dashboard Admin</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-4">Dashboard admin adalah halaman utama setelah login yang
                    menampilkan informasi penting untuk administrasi sekolah.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-semibold mb-3">Fitur Dashboard:</h3>
                        <ul class="space-y-2">
                            <li class="flex items-center"><span
                                    class="w-2 h-2 bg-blue-500 rounded-full mr-3"></span>Statistik jumlah guru, siswa, dan
                                kelas</li>
                            <li class="flex items-center"><span
                                    class="w-2 h-2 bg-green-500 rounded-full mr-3"></span>Pengumuman sekolah</li>
                            <li class="flex items-center"><span
                                    class="w-2 h-2 bg-purple-500 rounded-full mr-3"></span>Tanggal dan waktu real-time</li>
                            <li class="flex items-center"><span class="w-2 h-2 bg-orange-500 rounded-full mr-3"></span>Menu
                                navigasi ke berbagai modul</li>
                        </ul>
                    </div>
                    <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-4">
                        <h4 class="font-semibold text-blue-800 dark:text-blue-200 mb-2">Tips:</h4>
                        <p class="text-sm text-blue-700 dark:text-blue-300">Dashboard admin menampilkan ringkasan data
                            sekolah.
                            Gunakan menu sidebar untuk mengakses fitur-fitur manajemen data.</p>
                    </div>
                </div>
            </section>

            <!-- Kelola Guru -->
            <section id="guru" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl">
                <h2 class="text-3xl font-bold mb-6 text-green-600 dark:text-green-400">Kelola Guru</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-4">Cara Mengelola Data Guru:</h3>
                        <ol class="list-decimal list-inside space-y-2 text-gray-600 dark:text-gray-300">
                            <li>Klik menu "Guru" di sidebar</li>
                            <li>Pilih "Tambah Guru Baru" untuk menambah data</li>
                            <li>Isi formulir dengan data lengkap guru</li>
                            <li>Upload foto profil guru</li>
                            <li>Klik "Simpan" untuk menyimpan data</li>
                            <li>Gunakan fitur edit untuk mengubah data</li>
                            <li>Gunakan fitur hapus untuk menghapus data</li>
                        </ol>
                    </div>
                    <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4">
                        <p class="text-sm text-green-700 dark:text-green-300">Data guru mencakup NIP, nama, mata pelajaran,
                            dan informasi kontak. Pastikan data akurat untuk keperluan akademik.</p>
                    </div>
                </div>
            </section>

            <!-- Kelola Siswa -->
            <section id="siswa" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl">
                <h2 class="text-3xl font-bold mb-6 text-green-600 dark:text-green-400">Kelola Siswa</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-4">Cara Mengelola Data Siswa:</h3>
                        <ol class="list-decimal list-inside space-y-2 text-gray-600 dark:text-gray-300">
                            <li>Klik menu "Siswa" di sidebar</li>
                            <li>Pilih "Tambah Siswa Baru"</li>
                            <li>Isi data NIS, nama, kelas, dan informasi orang tua</li>
                            <li>Upload foto siswa</li>
                            <li>Klik "Simpan"</li>
                            <li>Gunakan import Excel untuk menambah data massal</li>
                        </ol>
                    </div>
                    <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4">
                        <p class="text-sm text-green-700 dark:text-green-300">Data siswa dapat diimport dari file Excel.
                            Pastikan format data sesuai template yang disediakan.</p>
                    </div>
                </div>
            </section>

            <!-- Kelola Kelas -->
            <section id="kelas" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl">
                <h2 class="text-3xl font-bold mb-6 text-green-600 dark:text-green-400">Kelola Kelas</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-4">Cara Mengelola Kelas:</h3>
                        <ol class="list-decimal list-inside space-y-2 text-gray-600 dark:text-gray-300">
                            <li>Klik menu "Kelas" di sidebar</li>
                            <li>Klik "Tambah Kelas Baru"</li>
                            <li>Isi nama kelas, tingkat, dan wali kelas</li>
                            <li>Tentukan paket kurikulum</li>
                            <li>Klik "Simpan"</li>
                        </ol>
                    </div>
                    <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4">
                        <p class="text-sm text-green-700 dark:text-green-300">Setiap kelas harus memiliki wali kelas dan
                            paket kurikulum yang sesuai dengan jenjang pendidikan.</p>
                    </div>
                </div>
            </section>

            <!-- Kelola Mata Pelajaran -->
            <section id="mapel" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl">
                <h2 class="text-3xl font-bold mb-6 text-green-600 dark:text-green-400">Kelola Mata Pelajaran</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-4">Cara Mengelola Mata Pelajaran:</h3>
                        <ol class="list-decimal list-inside space-y-2 text-gray-600 dark:text-gray-300">
                            <li>Klik menu "Mata Pelajaran" di sidebar</li>
                            <li>Klik "Tambah Mata Pelajaran Baru"</li>
                            <li>Isi nama mapel, kode, kelompok, dan KKM</li>
                            <li>Tentukan guru pengajar</li>
                            <li>Klik "Simpan"</li>
                        </ol>
                    </div>
                    <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4">
                        <p class="text-sm text-green-700 dark:text-green-300">Mata pelajaran dikelompokkan berdasarkan
                            muatan kurikulum (A, B, C1, C2, C3).</p>
                    </div>
                </div>
            </section>

            <!-- Kelola Jadwal -->
            <section id="jadwal" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl">
                <h2 class="text-3xl font-bold mb-6 text-green-600 dark:text-green-400">Kelola Jadwal</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-4">Cara Mengelola Jadwal:</h3>
                        <ol class="list-decimal list-inside space-y-2 text-gray-600 dark:text-gray-300">
                            <li>Klik menu "Jadwal" di sidebar</li>
                            <li>Klik "Tambah Jadwal Baru"</li>
                            <li>Pilih hari, jam, kelas, mapel, dan guru</li>
                            <li>Tentukan ruangan</li>
                            <li>Klik "Simpan"</li>
                            <li>Gunakan import Excel untuk jadwal massal</li>
                        </ol>
                    </div>
                    <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4">
                        <p class="text-sm text-green-700 dark:text-green-300">Jadwal dapat diimport dari file Excel.
                            Pastikan tidak ada konflik jadwal untuk guru dan ruangan yang sama.</p>
                    </div>
                </div>
            </section>

            <!-- Input Nilai -->
            <section id="nilai" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl">
                <h2 class="text-3xl font-bold mb-6 text-purple-600 dark:text-purple-400">Input Nilai</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-4">Cara Input Nilai:</h3>
                        <ol class="list-decimal list-inside space-y-2 text-gray-600 dark:text-gray-300">
                            <li>Klik menu "Nilai" di sidebar</li>
                            <li>Pilih mata pelajaran</li>
                            <li>Klik "Tambah Nilai" untuk siswa tertentu</li>
                            <li>Isi nilai ulangan, tugas, UTS, UAS</li>
                            <li>Klik "Update" untuk menyimpan</li>
                            <li>Gunakan fitur edit massal untuk efisiensi</li>
                        </ol>
                    </div>
                    <div class="bg-purple-50 dark:bg-purple-900/20 rounded-lg p-4">
                        <p class="text-sm text-purple-700 dark:text-purple-300">Nilai dapat diinput per siswa atau massal.
                            Sistem akan menghitung nilai akhir otomatis berdasarkan bobot yang ditentukan.</p>
                    </div>
                </div>
            </section>

            <!-- Kelola Rapot -->
            <section id="rapot" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl">
                <h2 class="text-3xl font-bold mb-6 text-purple-600 dark:text-purple-400">Kelola Rapot</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-4">Cara Mengelola Rapot:</h3>
                        <ol class="list-decimal list-inside space-y-2 text-gray-600 dark:text-gray-300">
                            <li>Klik menu "Rapot" di sidebar</li>
                            <li>Pilih kelas dan semester</li>
                            <li>Klik "Generate Rapot" untuk membuat rapot</li>
                            <li>Review dan edit nilai jika diperlukan</li>
                            <li>Klik "Simpan" dan "Cetak" untuk distribusi</li>
                        </ol>
                    </div>
                    <div class="bg-purple-50 dark:bg-purple-900/20 rounded-lg p-4">
                        <p class="text-sm text-purple-700 dark:text-purple-300">Rapot mencakup nilai akademik, sikap,
                            dan predikat. Pastikan semua nilai telah diinput sebelum generate rapot.</p>
                    </div>
                </div>
            </section>

            <!-- Pengumuman -->
            <section id="pengumuman" class="bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-xl">
                <h2 class="text-3xl font-bold mb-6 text-purple-600 dark:text-purple-400">Pengumuman</h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-xl font-semibold mb-4">Cara Membuat Pengumuman:</h3>
                        <ol class="list-decimal list-inside space-y-2 text-gray-600 dark:text-gray-300">
                            <li>Klik menu "Pengumuman" di sidebar</li>
                            <li>Klik "Tambah Pengumuman Baru"</li>
                            <li>Isi judul dan isi pengumuman</li>
                            <li>Pilih target penerima (semua, guru, siswa)</li>
                            <li>Klik "Simpan"</li>
                        </ol>
                    </div>
                    <div class="bg-purple-50 dark:bg-purple-900/20 rounded-lg p-4">
                        <p class="text-sm text-purple-700 dark:text-purple-300">Pengumuman akan ditampilkan di dashboard
                            pengguna sesuai target yang dipilih. Gunakan untuk informasi penting sekolah.</p>
                    </div>
                </div>
            </section>

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
                                <strong>Developer Sistem:</strong><br>
                                Email: developer@smpn2mlati.sch.id<br>
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