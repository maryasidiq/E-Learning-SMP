# Buku Panduan Lengkap Sistem Informasi Akademik SMP Negeri 2 Mlati

## ELSDUMI - E-Learning SMP Negeri 2 Mlati

---

**Versi:** 2.0 - Edisi Lengkap  
**Tanggal:** Desember 2024  
**Dibuat untuk:** SMP Negeri 2 Mlati  
**Penulis:** Tim IT SMP Negeri 2 Mlati  
**Editor:** Administrator Sistem ELSDUMI

---

## Kata Pengantar

Selamat datang di **Buku Panduan Lengkap Sistem Informasi Akademik SMP Negeri 2 Mlati (ELSDUMI)**.

Buku panduan ini dirancang sebagai panduan komprehensif untuk membantu seluruh pengguna sistem - mulai dari siswa, guru, hingga administrator - dalam memahami dan mengoptimalkan penggunaan platform e-learning SMP Negeri 2 Mlati.

### Tujuan Buku Panduan:

- **Untuk Siswa:** Membantu siswa memahami cara menggunakan sistem untuk mendukung proses pembelajaran
- **Untuk Guru:** Memberikan panduan lengkap dalam mengelola materi pembelajaran dan penilaian
- **Untuk Admin:** Menyediakan panduan manajemen sistem dan data akademik
- **Untuk Semua Pengguna:** Memastikan penggunaan sistem yang efektif dan efisien

### Struktur Buku:

Buku ini terbagi menjadi beberapa bagian utama dengan penjelasan detail, langkah-langkah praktis, serta tips dan trik penggunaan sistem.

---

## Daftar Isi

### BAB I: PENDAHULUAN DAN PERSIAPAN

1. [Tentang Sistem ELSDUMI](#tentang-sistem)
2. [Persyaratan Sistem](#persyaratan)
3. [Memulai Penggunaan Sistem](#memulai)
4. [Cara Login](#cara-login)
5. [Navigasi Dasar](#navigasi-dasar)
6. [Dashboard Utama](#dashboard)

### BAB II: UNTUK SISWA

7. [Melihat Jadwal Pelajaran](#siswa-jadwal)
8. [Mengakses Materi Pembelajaran](#siswa-materi)
9. [Mengerjakan Soal dan Ujian](#siswa-soal)
10. [Melihat Nilai dan Rapot](#siswa-nilai)
11. [Mengikuti Pengumuman](#siswa-pengumuman)

### BAB III: UNTUK GURU

12. [Mengisi Absensi Siswa](#guru-absen)
13. [Upload dan Kelola Materi](#guru-materi)
14. [Membuat dan Mengelola Soal](#guru-soal)
15. [Input dan Kelola Nilai](#guru-nilai)
16. [Melihat Laporan Akademik](#guru-laporan)

### BAB IV: UNTUK ADMINISTRATOR

17. [Kelola Data Guru](#admin-guru)
18. [Kelola Data Siswa](#admin-siswa)
19. [Kelola Kelas dan Ruang](#admin-kelas)
20. [Kelola Mata Pelajaran](#admin-mapel)
21. [Kelola Jadwal Pelajaran](#admin-jadwal)
22. [Input dan Kelola Nilai](#admin-nilai)
23. [Generate dan Kelola Rapot](#admin-rapot)
24. [Sistem Pengumuman](#admin-pengumuman)
25. [Manajemen User dan Role](#admin-user)

### BAB V: FITUR LANJUTAN

26. [Import/Export Data Massal](#import-export)
27. [Laporan dan Statistik](#laporan-statistik)
28. [Backup dan Recovery](#backup-recovery)
29. [Integrasi Sistem](#integrasi)

### BAB VI: PENGATURAN DAN KEAMANAN

30. [Pengaturan Profil Pengguna](#pengaturan-profil)
31. [Keamanan Akun](#keamanan-akun)
32. [Manajemen Password](#manajemen-password)

### BAB VII: TROUBLESHOOTING DAN BANTUAN

33. [Masalah Umum dan Solusi](#troubleshooting)
34. [Frequently Asked Questions (FAQ)](#faq)
35. [Kontak Dukungan Teknis](#kontak-dukungan)

### LAMPIRAN

A. [Daftar Kode Error](#kode-error)  
B. [Template Import Data](#template-import)  
C. [Spesifikasi Teknis](#spesifikasi-teknis)  
D. [Glosarium](#glosarium)  
E. [Index](#index)

---

## BAB I: PENDAHULUAN DAN PERSIAPAN

### 1. Tentang Sistem ELSDUMI

Sistem Informasi Akademik SMP Negeri 2 Mlati (ELSDUMI) adalah platform e-learning terintegrasi yang dikembangkan khusus untuk mendukung proses pembelajaran di SMP Negeri 2 Mlati. Sistem ini menggunakan teknologi web modern untuk memfasilitasi interaksi antara siswa, guru, dan administrator sekolah.

#### Visi Sistem:

"Mewujudkan pembelajaran digital yang efektif, efisien, dan terintegrasi untuk meningkatkan kualitas pendidikan di SMP Negeri 2 Mlati."

#### Misi Sistem:

- Memfasilitasi akses materi pembelajaran 24/7
- Menyederhanakan proses administrasi akademik
- Meningkatkan komunikasi antara stakeholder pendidikan
- Menyediakan data akademik yang akurat dan real-time

#### Fitur Utama Sistem:

##### A. Manajemen Akademik

- **Jadwal Pelajaran:** Sistem manajemen jadwal real-time
- **Materi Pembelajaran:** Repository digital materi ajar
- **Ujian Online:** Platform ujian berbasis web
- **Penilaian Akademik:** Sistem penilaian terintegrasi
- **Rapot Digital:** Generate rapot elektronik

##### B. Manajemen Data

- **Data Siswa:** Manajemen data siswa lengkap
- **Data Guru:** Database guru dan kompetensi
- **Data Kelas:** Organisasi kelas dan ruang
- **Data Mata Pelajaran:** Kurikulum dan silabus

##### C. Komunikasi dan Informasi

- **Pengumuman:** Sistem broadcast informasi
- **Dashboard:** Portal informasi personal
- **Notifikasi:** Sistem pemberitahuan real-time

##### D. Keamanan dan Privasi

- **Authentication:** Sistem login berlapis
- **Authorization:** Kontrol akses berbasis role
- **Audit Trail:** Log aktivitas pengguna
- **Data Encryption:** Enkripsi data sensitif

#### Arsitektur Sistem:

Sistem ELSDUMI dibangun dengan arsitektur modern:

- **Frontend:** HTML5, CSS3, JavaScript (Vue.js/React)
- **Backend:** PHP Laravel Framework
- **Database:** MySQL/MariaDB
- **Storage:** Local file system dengan cloud backup
- **Security:** SSL/TLS encryption, CSRF protection

### 2. Persyaratan Sistem

Sebelum menggunakan sistem ELSDUMI, pastikan perangkat Anda memenuhi persyaratan minimum berikut:

#### Persyaratan Hardware:

- **Processor:** Intel Core i3 atau equivalent (minimal)
- **RAM:** 4GB (recommended 8GB)
- **Storage:** 500MB free space untuk aplikasi
- **Internet:** Koneksi stabil minimal 1 Mbps

#### Persyaratan Software:

- **Operating System:**
    - Windows 7 SP1 atau lebih baru
    - macOS 10.12 Sierra atau lebih baru
    - Linux Ubuntu 16.04 atau equivalent
- **Browser Web:**
    - Google Chrome versi 80+
    - Mozilla Firefox versi 75+
    - Microsoft Edge versi 80+
    - Safari versi 13+
- **Additional Software:**
    - Adobe Reader untuk PDF
    - Microsoft Office atau LibreOffice untuk dokumen

#### Persyaratan Jaringan:

- **Bandwidth:** Minimal 1 Mbps download/upload
- **Latency:** Maksimal 100ms ke server
- **Firewall:** Port 80 (HTTP) dan 443 (HTTPS) terbuka
- **Proxy:** Konfigurasi proxy jika diperlukan

#### Persyaratan Khusus untuk Admin:

- **Database Access:** MySQL client tools
- **File Manager:** FTP/SFTP client
- **Backup Tools:** Software backup database
- **Monitoring Tools:** System monitoring software

### 3. Memulai Penggunaan Sistem

#### Langkah Awal Setup:

1. **Persiapan Akun:**

    - Dapatkan email dan password dari administrator
    - Pastikan email aktif dan dapat menerima notifikasi
    - Simpan informasi login di tempat aman

2. **Konfigurasi Browser:**

    - Izinkan cookies untuk domain sistem
    - Izinkan JavaScript execution
    - Izinkan pop-up jika diperlukan
    - Clear cache browser secara berkala

3. **Konfigurasi Keamanan:**

    - Gunakan password yang kuat
    - Aktifkan two-factor authentication jika tersedia
    - Jangan bagikan kredensial login

4. **Pengaturan Notifikasi:**
    - Konfigurasi email notifikasi
    - Atur preferensi notifikasi
    - Test pengiriman notifikasi

#### Checklist Pra-Penggunaan:

- [ ] Email dan password telah diterima
- [ ] Browser memenuhi persyaratan
- [ ] Koneksi internet stabil
- [ ] Perangkat memenuhi spesifikasi
- [ ] Bookmark halaman login
- [ ] Simpan nomor kontak admin

### 4. Cara Login

#### Prosedur Login Standar:

1. **Akses Halaman Login:**

    - Buka browser web
    - Ketik URL sistem: `https://elsdumi.smpn2mlati.sch.id/login`
    - Pastikan menggunakan HTTPS untuk keamanan

2. **Input Kredensial:**

    - **Email:** Masukkan alamat email yang terdaftar
    - **Password:** Masukkan password dengan case-sensitive
    - **Captcha:** Isi captcha jika muncul (anti-bot)

3. **Proses Authentication:**

    - Klik tombol "Masuk" atau tekan Enter
    - Sistem akan memverifikasi kredensial
    - Tunggu proses loading selesai

4. **Redirect ke Dashboard:**
    - Berhasil: Diarahkan ke dashboard sesuai role
    - Gagal: Pesan error akan muncul

#### Tipe Login Berdasarkan Role:

##### Login Siswa:

- Email: NIS@siswa.smpn2mlati.sch.id
- Password: Default dari admin, wajib diubah pertama kali

##### Login Guru:

- Email: NIP@guru.smpn2mlati.sch.id
- Password: Default dari admin

##### Login Admin:

- Email: admin@smpn2mlati.sch.id
- Password: Super admin password

#### Fitur Login Lanjutan:

##### Remember Me:

- Centang untuk menyimpan session lebih lama
- Tidak recommended untuk komputer publik

##### Forgot Password:

1. Klik "Lupa Password?"
2. Masukkan email terdaftar
3. Cek email untuk link reset
4. Ikuti instruksi reset password

##### Two-Factor Authentication (2FA):

- Jika aktif, masukkan kode dari authenticator app
- Kode berubah setiap 30 detik
- Pastikan waktu device akurat

#### Troubleshooting Login:

##### Masalah: "Email atau password salah"

- Solusi: Periksa caps lock, pastikan email benar
- Reset password jika lupa

##### Masalah: "Akun tidak aktif"

- Solusi: Hubungi admin untuk aktivasi akun

##### Masalah: "Terlalu banyak percobaan login"

- Solusi: Tunggu 15 menit atau hubungi admin

##### Masalah: "Browser tidak didukung"

- Solusi: Update browser ke versi terbaru

### 5. Navigasi Dasar

#### Struktur Menu Sistem:

##### Menu Utama (Tersedia untuk Semua Role):

- **Dashboard:** Halaman utama dengan ringkasan
- **Profile:** Pengaturan akun personal
- **Pengumuman:** Informasi dari sekolah
- **Panduan:** Buku panduan penggunaan

##### Menu Siswa:

- **Jadwal:** Melihat jadwal pelajaran
- **Materi:** Akses materi pembelajaran
- **Soal:** Mengerjakan tugas dan ujian
- **Nilai:** Melihat hasil penilaian

##### Menu Guru:

- **Absen:** Mengisi absensi siswa
- **Materi:** Upload materi pembelajaran
- **Soal:** Membuat dan mengelola soal
- **Nilai:** Input penilaian siswa
- **Rapot:** Melihat dan mengelola rapot

##### Menu Admin:

- **Guru:** Manajemen data guru
- **Siswa:** Manajemen data siswa
- **Kelas:** Manajemen kelas dan ruang
- **Mapel:** Manajemen mata pelajaran
- **Jadwal:** Manajemen jadwal pelajaran
- **Nilai:** Input nilai massal
- **Rapot:** Generate rapot kelas
- **Pengumuman:** Broadcast informasi

#### Cara Navigasi:

1. **Sidebar Navigation:**

    - Klik ikon menu untuk expand/collapse
    - Hover untuk preview submenu
    - Klik menu untuk navigasi

2. **Breadcrumb Navigation:**

    - Menampilkan posisi halaman saat ini
    - Klik untuk kembali ke level atas

3. **Search Functionality:**

    - Search box di header
    - Cari data, menu, atau informasi

4. **Quick Actions:**
    - Shortcut buttons di dashboard
    - Context menu pada tabel data

#### Tips Navigasi Efektif:

- Gunakan bookmark untuk halaman sering digunakan
- Manfaatkan search untuk navigasi cepat
- Perhatikan indikator aktif pada menu
- Gunakan shortcut keyboard jika tersedia

### 6. Dashboard Utama

Dashboard adalah halaman pertama setelah login yang memberikan overview informasi penting.

#### Komponen Dashboard:

##### A. Header Dashboard:

- **Welcome Message:** Salam personal dengan nama
- **Role Indicator:** Menampilkan role pengguna
- **Last Login:** Informasi login terakhir
- **Quick Stats:** Statistik singkat

##### B. Widget Informasi:

- **Jadwal Hari Ini:** Preview jadwal pelajaran
- **Pengumuman Terbaru:** 5 pengumuman terakhir
- **Notifikasi:** Pesan sistem dan reminder
- **Quick Links:** Shortcut ke fitur utama

##### C. Statistik Overview:

- **Untuk Siswa:** Jumlah materi, nilai rata-rata, absensi
- **Untuk Guru:** Jumlah kelas, materi diupload, nilai pending
- **Untuk Admin:** Total siswa/guru, statistik sistem

##### D. Recent Activities:

- **Log Aktivitas:** Aktivitas terakhir pengguna
- **Pending Tasks:** Tugas yang perlu diselesaikan
- **System Alerts:** Pemberitahuan sistem

#### Kustomisasi Dashboard:

1. **Layout Options:**

    - Grid layout atau list layout
    - Resize widget sesuai kebutuhan
    - Hide/show widget tertentu

2. **Personalization:**

    - Atur urutan widget
    - Pilih tema warna
    - Set refresh interval

3. **Export Dashboard:**
    - Export sebagai PDF untuk laporan
    - Screenshot untuk dokumentasi

#### Tips Optimasi Dashboard:

- Atur widget sesuai prioritas kerja
- Refresh secara berkala untuk data terbaru
- Manfaatkan notifikasi untuk reminder
- Gunakan sebagai starting point aktivitas harian

---

## Pendahuluan

Sistem Informasi Akademik SMP Negeri 2 Mlati (ELSDUMI) adalah platform e-learning yang dirancang untuk memfasilitasi proses pembelajaran di sekolah. Sistem ini menyediakan berbagai fitur untuk siswa, guru, dan administrator sekolah.

### Fitur Utama Sistem:

- **Manajemen Jadwal** - Pengelolaan jadwal pelajaran secara real-time
- **Materi Pembelajaran** - Upload dan akses materi digital
- **Ujian Online** - Pembuatan dan pengerjaan soal secara daring
- **Penilaian Akademik** - Input dan monitoring nilai siswa
- **Rapot Digital** - Generate dan distribusi rapot elektronik
- **Pengumuman** - Komunikasi sekolah ke siswa dan guru

Sistem ini dibangun dengan teknologi modern untuk memastikan kemudahan penggunaan dan keamanan data. Panduan ini akan membantu Anda memahami cara menggunakan sistem ini secara efektif.

---

## Cara Login

### Langkah-langkah Login:

1. Buka browser dan akses alamat website sekolah
2. Klik tombol "Login" di halaman utama
3. Masukkan email dan password yang telah diberikan
4. Klik tombol "Masuk"
5. Anda akan diarahkan ke dashboard sesuai role Anda

### Catatan Penting:

- Pastikan menggunakan email yang valid
- Password case-sensitive (membedakan huruf besar-kecil)
- Jika lupa password, hubungi administrator
- Sistem akan logout otomatis setelah 2 jam tidak aktif
- Gunakan browser terbaru (Chrome, Firefox, Edge) untuk performa optimal

---

## Dashboard

Dashboard adalah halaman utama setelah login yang menampilkan informasi penting sesuai dengan role pengguna.

### Fitur Dashboard Umum:

- **Jadwal Pelajaran** - Menampilkan jadwal hari ini secara real-time
- **Pengumuman Sekolah** - Informasi penting dari sekolah
- **Tanggal dan Waktu** - Clock digital yang selalu update
- **Menu Navigasi** - Akses cepat ke berbagai modul sistem

### Tips Penggunaan:

- Dashboard akan menampilkan jadwal real-time. Jika ada perubahan jadwal, sistem akan memperbarui secara otomatis setiap menit.
- Periksa pengumuman secara berkala untuk informasi penting dari sekolah.

---

## Untuk Siswa

### Melihat Jadwal

#### Cara Melihat Jadwal:

1. Login sebagai siswa
2. Klik menu "Jadwal" di sidebar 
3. Pilih "Jadwal Siswa"
4. Lihat jadwal pelajaran Anda

#### Informasi yang Ditampilkan:

- Mata pelajaran
- Waktu pelajaran
- Ruangan kelas
- Nama guru pengajar

**Tips:** Jadwal menampilkan informasi lengkap untuk membantu Anda mempersiapkan materi sebelum pelajaran dimulai.

### Mengakses Materi

#### Cara Mengakses Materi:

1. Klik menu "Materi" di sidebar
2. Pilih "Materi Siswa"
3. Browse materi yang tersedia
4. Klik judul materi untuk melihat detail
5. Download file materi jika diperlukan

#### Jenis Materi:

- File PDF dokumen pembelajaran
- Presentasi PowerPoint
- Video tutorial
- File audio
- Materi interaktif lainnya

**Catatan:** Materi diupload oleh guru pengajar sesuai dengan mata pelajaran masing-masing.

### Mengerjakan Soal

#### Cara Mengerjakan Soal:

1. Klik menu "Soal" di sidebar
2. Pilih "Soal Siswa"
3. Klik tombol "Kerjakan" pada soal yang tersedia
4. Jawab pertanyaan sesuai instruksi
5. Klik "Simpan Jawaban" setelah selesai

#### Tipe Soal:

- **Pilihan Ganda** - Pilih jawaban yang benar
- **Essay** - Jawaban dalam bentuk tulisan
- **Upload File** - Upload dokumen sebagai jawaban
- **Soal Campuran** - Kombinasi berbagai tipe

**Peringatan:** Pastikan mengerjakan sebelum batas waktu habis. Sistem akan otomatis menyimpan progress Anda.

### Melihat Nilai Akademik

#### Cara Melihat Nilai Akademik:

1. Klik menu "nilai" di sidebar
2. Pilih "Lihat Lainnya"
3. Lihat nilai akhir dan predikat
4. Download nilai jika tersedia

#### Komponen Nilai:

- Nilai akhir semester
- Penilaian sikap siswa
- Predikat akademik (A, B, C, D)
- Deskripsi pencapaian

**Tips:** Nilai akademik berisi penilaian komprehensif dari berbagai aspek pembelajaran.

---

## Untuk Guru

### Upload Materi

#### Cara Upload Materi:

1. Klik menu "Materi" di sidebar
2. Klik "Tambah Materi Baru"
3. Isi judul dan deskripsi materi
4. Upload file (PDF, DOC, PPT, dll)
5. Pilih kelas dan mata pelajaran terkait
6. Klik "Simpan"

#### Panduan Upload:

- **Ukuran File Maksimal:** 10MB
- **Format yang Didukung:** PDF, DOC, DOCX, PPT, PPTX, XLS, XLSX, MP4, MP3
- **Pengorganisasian:** Materi akan dapat diakses siswa sesuai kelas yang dipilih

### Membuat Soal

#### Cara Membuat Soal:

1. Klik menu "Soal" di sidebar
2. Klik "Tambah Soal Baru"
3. Isi judul dan deskripsi soal
4. Tambah pertanyaan satu per satu
5. Pilih tipe jawaban (pilihan ganda, essay)
6. Set waktu pengerjaan dan nilai
7. Klik "Simpan"

#### Metode Pembuatan Soal:

- **Manual** - Input soal satu per satu
- **Import Excel** - Upload template Excel yang telah diisi
- **Template** - Gunakan soal dari template yang tersedia

**Tips:** Soal dapat dibuat untuk ulangan harian, UTS, atau UAS dengan berbagai tingkat kesulitan.

### Input Nilai Akademik

#### Cara Input Nilai Akademik:

1. Klik menu "Nilai" di sidebar
2. Pilih mata pelajaran Anda
3. Klik "Tambah Nilai" untuk siswa tertentu
4. Isi nilai ulangan, tugas, dll
5. Klik "Update" untuk menyimpan

#### Komponen Penilaian:

- Nilai ulangan harian
- Nilai tugas
- Nilai UTS (Ujian Tengah Semester)
- Nilai UAS (Ujian Akhir Semester)
- Nilai praktikum (jika ada)

**Catatan:** Sistem akan menghitung nilai akhir otomatis berdasarkan bobot yang telah ditentukan.

---

## Untuk Admin

### Kelola Guru

#### Cara Mengelola Data Guru:

1. Klik menu "Guru" di sidebar
2. Pilih "Tambah Guru Baru" untuk menambah data
3. Isi formulir dengan data lengkap guru
4. Upload foto profil guru
5. Klik "Simpan" untuk menyimpan data

#### Data Guru yang Dikelola:

- NIP (Nomor Induk Pegawai)
- Nama lengkap
- Mata pelajaran yang diampu
- Informasi kontak (email, telepon)
- Alamat
- Status kepegawaian

#### Fitur Tambahan:

- Edit data guru
- Hapus data guru (soft delete)
- Import data massal dari Excel
- Export data guru ke Excel

### Kelola Siswa

#### Cara Mengelola Data Siswa:

1. Klik menu "Siswa" di sidebar
2. Pilih "Tambah Siswa Baru"
3. Isi data NIS, nama, kelas, dan informasi orang tua
4. Upload foto siswa
5. Klik "Simpan"

#### Data Siswa yang Dikelola:

- NIS (Nomor Induk Siswa)
- NISN (Nomor Induk Siswa Nasional)
- Nama lengkap
- Kelas dan jurusan
- Tanggal lahir
- Alamat lengkap
- Data orang tua/wali

#### Fitur Import Massal:

- Template Excel tersedia untuk download
- Import data siswa secara massal
- Validasi data otomatis
- Laporan import (sukses/gagal)

### Kelola Kelas

#### Cara Mengelola Kelas:

1. Klik menu "Kelas" di sidebar
2. Klik "Tambah Kelas Baru"
3. Isi nama kelas, tingkat, dan wali kelas
4. Tentukan paket kurikulum
5. Klik "Simpan"

#### Informasi Kelas:

- Nama kelas (contoh: X IPA 1, XI IPS 2)
- Tingkat kelas (7, 8, 9)
- Wali kelas (guru yang bertugas)
- Paket kurikulum (IPA, IPS, Bahasa)
- Tahun ajaran
- Kapasitas maksimal siswa

### Kelola Mata Pelajaran

#### Cara Mengelola Mata Pelajaran:

1. Klik menu "Mata Pelajaran" di sidebar
2. Klik "Tambah Mata Pelajaran Baru"
3. Isi nama mata pelajaran, kode, kelompok, dan KKM
4. Tentukan guru pengajar
5. Klik "Simpan"

#### Kelompok Mata Pelajaran:

- **Kelompok A** - Mata pelajaran wajib (Matematika, Bahasa Indonesia, dll)
- **Kelompok B** - Mata pelajaran wajib (Fisika, Kimia, Biologi, dll)
- **Kelompok C1** - Mata pelajaran pilihan (Bahasa Asing, dll)
- **Kelompok C2** - Mata pelajaran lintas minat
- **Kelompok C3** - Mata pelajaran penciri

### Kelola Jadwal

#### Cara Mengelola Jadwal:

1. Klik menu "Jadwal" di sidebar
2. Klik "Tambah Jadwal Baru"
3. Pilih hari, jam, kelas, mata pelajaran, dan guru
4. Tentukan ruangan
5. Klik "Simpan"

#### Fitur Jadwal:

- **Jadwal Harian** - Pengaturan jadwal per hari
- **Jadwal Mingguan** - Overview jadwal seminggu penuh
- **Import Massal** - Upload jadwal dari file Excel
- **Validasi Konflik** - Cek konflik jadwal guru/ruangan otomatis

**Tips:** Pastikan tidak ada konflik jadwal untuk guru dan ruangan yang sama pada waktu bersamaan.

### Input Nilai

#### Cara Input Nilai:

1. Klik menu "Nilai" di sidebar
2. Pilih mata pelajaran
3. Klik "Tambah Nilai" untuk siswa tertentu
4. Isi nilai ulangan, tugas, UTS, UAS
5. Klik "Update" untuk menyimpan

#### Fitur Input Nilai:

- Input nilai per siswa
- Input nilai massal untuk seluruh kelas
- Kalkulasi nilai akhir otomatis
- Export nilai ke Excel/PDF

### Kelola Rapot

#### Cara Mengelola Rapot:

1. Klik menu "Rapot" di sidebar
2. Pilih kelas dan semester
3. Klik "Generate Rapot" untuk membuat rapot
4. Review dan edit nilai jika diperlukan
5. Klik "Simpan" dan "Cetak" untuk distribusi

#### Komponen Rapot:

- Identitas siswa
- Nilai akademik per mata pelajaran
- Nilai sikap dan perilaku
- Predikat dan deskripsi
- Tanda tangan wali kelas dan kepala sekolah

### Pengumuman

#### Cara Membuat Pengumuman:

1. Klik menu "Pengumuman" di sidebar
2. Klik "Tambah Pengumuman Baru"
3. Isi judul dan isi pengumuman
4. Pilih target penerima (semua, guru, siswa)
5. Klik "Simpan"

#### Target Pengumuman:

- **Semua Pengguna** - Ditampilkan di dashboard semua user
- **Hanya Guru** - Khusus untuk guru
- **Hanya Siswa** - Khusus untuk siswa
- **Per Kelas** - Ditargetkan ke kelas tertentu

---

## Pengaturan Profil

### Cara Mengubah Profil:

1. Klik menu "Profile" di sidebar
2. Pilih "Pengaturan Profile"
3. Edit data pribadi (nama, email, dll)
4. Upload foto profil baru
5. Klik "Ubah Profile" untuk menyimpan

### Cara Mengubah Password:

1. Klik menu "Profile" > "Pengaturan Password"
2. Masukkan password lama
3. Masukkan password baru (minimal 8 karakter)
4. Konfirmasi password baru
5. Klik "Ubah Password"

### Tips Keamanan:

- Gunakan password yang kuat dengan kombinasi huruf, angka, dan simbol
- Jangan gunakan informasi pribadi sebagai password
- Ubah password secara berkala
- Jangan bagikan password ke orang lain

---

## Bantuan & Dukungan

### Jika Mengalami Masalah:

#### Masalah Teknis:

- **Koneksi Internet:** Pastikan koneksi stabil
- **Browser:** Refresh halaman atau clear cache
- **Browser Support:** Gunakan Chrome, Firefox, atau Edge terbaru
- **Logout/Login Ulang:** Coba logout dan login kembali

#### Masalah Fungsional:

- **Tidak Bisa Upload:** Cek ukuran file dan format yang didukung
- **Data Tidak Tersimpan:** Pastikan klik tombol "Simpan" setelah input data
- **Jadwal Tidak Muncul:** Refresh halaman atau hubungi admin

### Kontak Dukungan:

#### Untuk Siswa dan Guru:

- **Admin Sistem:** admin@smpn2mlati.sch.id
- **Telepon:** (0274) 1234567
- **Lokasi:** Gedung Administrasi SMP Negeri 2 Mlati

#### Untuk Admin/Developer:

- **Developer Sistem:** developer@smpn2mlati.sch.id
- **Tim IT Sekolah:** Gedung Administrasi SMP Negeri 2 Mlati

### Prosedur Pelaporan Masalah:

1. Identifikasi masalah secara detail
2. Catat langkah-langkah yang dilakukan sebelum masalah terjadi
3. Screenshot error message jika ada
4. Hubungi kontak dukungan dengan informasi lengkap

---

## Lampiran

### A. Daftar Kode Error Sistem

- **ERR_001:** Koneksi database gagal
- **ERR_002:** File upload terlalu besar
- **ERR_003:** Format file tidak didukung
- **ERR_004:** Session timeout
- **ERR_005:** Akses ditolak

### B. Template Import Data

- Template Excel untuk import siswa
- Template Excel untuk import guru
- Template Excel untuk import jadwal
- Template Excel untuk import nilai

### C. Panduan Teknis

- Spesifikasi sistem minimum
- Browser yang didukung
- Format file yang didukung
- Batasan upload file

---

**Terima Kasih**

Panduan ini dibuat untuk memudahkan penggunaan Sistem Informasi Akademik SMP Negeri 2 Mlati. Semoga panduan ini bermanfaat dan membantu Anda dalam menggunakan sistem ELSDUMI dengan efektif.

**© 2024 SMP Negeri 2 Mlati - ELSDUMI**  
_Dibuat dengan ❤️ untuk kemajuan pendidikan_

---

_Dokumen ini dapat diperbaharui sewaktu-waktu tanpa pemberitahuan sebelumnya. Untuk versi terbaru, silakan akses sistem atau hubungi administrator._
