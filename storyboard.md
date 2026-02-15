# Storyboard Sistem Informasi Akademik Sekolah (Laravel)

Storyboard ini menggambarkan alur interaksi pengguna dalam aplikasi Sistem Informasi Akademik Sekolah berbasis Laravel. Setiap scene mewakili layar atau interaksi utama, dengan deskripsi visual dan narasi. Storyboard dibagi berdasarkan peran pengguna: Admin, Guru, dan Siswa.

## Scene 1: Halaman Login (Semua Peran)

**Visual:** Form login sederhana dengan field Email dan Password, tombol "Login", dan link "Lupa Password". Background dengan logo sekolah.

**Narasi:** Pengguna mengakses aplikasi dan diminta login. Jika belum login, mereka melihat halaman ini. Setelah memasukkan kredensial, sistem memverifikasi dan redirect berdasarkan role.

**Interaksi:** Klik "Login" -> Validasi -> Redirect ke Dashboard sesuai role.

---

## Scene 2: Dashboard Admin

**Visual:** Panel dashboard dengan menu sidebar (Manajemen Guru, Siswa, Kelas, Mapel, Jadwal, dll.), statistik ringkas (jumlah siswa, guru, dll.), dan notifikasi pengumuman.

**Narasi:** Admin masuk ke dashboard utama. Mereka dapat mengelola data sekolah, import/export data, generate laporan, dan akses trash management.

**Interaksi:** Klik menu "Guru" -> Halaman CRUD Guru. Klik "Import Siswa" -> Upload file Excel -> Proses import.

---

## Scene 3: Manajemen Data Guru (Admin)

**Visual:** Tabel daftar guru dengan kolom Nama, Email, Mapel, dll. Tombol "Tambah", "Edit", "Hapus", "Export", dan "Import".

**Narasi:** Admin melihat daftar guru. Mereka dapat menambah guru baru, edit data, atau hapus. Ada fitur import dari Excel untuk mass upload.

**Interaksi:** Klik "Tambah Guru" -> Form input data guru -> Simpan -> Kembali ke tabel.

---

## Scene 4: Manajemen Data Siswa (Admin)

**Visual:** Tabel daftar siswa dengan kolom NIS, Nama, Kelas, dll. Tombol "Tambah", "Edit", "Hapus", "Export", "Import", dan "Lihat Kelas".

**Narasi:** Admin mengelola data siswa. Fitur serupa dengan guru, plus filter berdasarkan kelas.

**Interaksi:** Klik "Import Siswa" -> Upload file -> Proses -> Notifikasi sukses.

---

## Scene 5: Manajemen Jadwal (Admin)

**Visual:** Kalender atau tabel jadwal pelajaran dengan filter kelas/mapel. Tombol "Tambah Jadwal", "Edit", "Export".

**Narasi:** Admin membuat jadwal pelajaran untuk setiap kelas. Dapat assign guru ke mapel tertentu.

**Interaksi:** Klik "Tambah Jadwal" -> Pilih Kelas, Mapel, Guru, Hari, Jam -> Simpan.

---

## Scene 6: Dashboard Guru

**Visual:** Dashboard dengan menu Absensi, Materi, Soal, Nilai, Rapot. Widget jadwal harian dan notifikasi tugas.

**Narasi:** Guru masuk dashboard. Mereka fokus pada pengajaran: absensi siswa, upload materi, buat soal, input nilai.

**Interaksi:** Klik "Absensi Harian" -> Halaman absensi.

---

## Scene 7: Absensi Harian (Guru)

**Visual:** Tabel siswa kelas dengan checkbox Hadir/Tidak. Tombol "Simpan Absensi".

**Narasi:** Guru mencatat kehadiran siswa setiap hari. Data disimpan ke database.

**Interaksi:** Centang checkbox -> Klik "Simpan" -> Notifikasi berhasil.

---

## Scene 8: Upload Materi Mapel (Guru)

**Visual:** Form upload file (PDF, DOC) dengan field Judul, Deskripsi, Kelas, Mapel. Tombol "Upload".

**Narasi:** Guru upload materi pembelajaran untuk siswa. Materi dapat diakses siswa berdasarkan kelas/mapel.

**Interaksi:** Pilih file -> Isi form -> Upload -> Materi tersimpan.

---

## Scene 9: Buat Soal Ulangan (Guru)

**Visual:** Form buat soal dengan field Pertanyaan, Pilihan Jawaban, Jawaban Benar. Tombol "Tambah Soal", "Generate dari Excel".

**Narasi:** Guru membuat soal ulangan. Ada fitur generate otomatis dari file Excel/PDF.

**Interaksi:** Klik "Generate dari Excel" -> Upload file -> Proses background -> Soal terbuat.

---

## Scene 10: Input Nilai (Guru)

**Visual:** Tabel nilai siswa per mapel dengan field input skor. Tombol "Simpan", "Export".

**Narasi:** Guru input nilai ulangan siswa. Dapat edit per siswa atau bulk edit.

**Interaksi:** Input skor -> Klik "Simpan" -> Update database.

---

## Scene 11: Dashboard Siswa

**Visual:** Dashboard sederhana dengan menu Jadwal, Materi, Soal, Nilai, Rapot. Widget jadwal hari ini.

**Narasi:** Siswa masuk dashboard. Mereka dapat lihat jadwal, akses materi, kerjakan soal, lihat nilai.

**Interaksi:** Klik "Jadwal" -> Halaman jadwal.

---

## Scene 12: Lihat Jadwal (Siswa)

**Visual:** Tabel atau kalender jadwal pelajaran dengan hari, jam, mapel, guru.

**Narasi:** Siswa melihat jadwal pelajaran mereka. Tidak dapat edit, hanya view.

**Interaksi:** Scroll tabel -> Klik mapel untuk detail (opsional).

---

## Scene 13: Akses Materi (Siswa)

**Visual:** Daftar materi per mapel dengan judul, deskripsi, tombol "Download".

**Narasi:** Siswa download materi yang diupload guru untuk belajar mandiri.

**Interaksi:** Klik "Download" -> File terdownload.

---

## Scene 14: Kerjakan Soal (Siswa)

**Visual:** Halaman soal dengan pertanyaan, pilihan jawaban, timer. Tombol "Jawab", "Simpan Jawaban".

**Narasi:** Siswa mengerjakan ulangan online. Jawaban disimpan otomatis atau manual.

**Interaksi:** Pilih jawaban -> Klik "Simpan" -> Submit -> Lihat hasil jika diizinkan.

---

## Scene 15: Lihat Nilai (Siswa)

**Visual:** Tabel nilai per mapel dengan skor, predikat. Tombol "Detail".

**Narasi:** Siswa melihat nilai ulangan mereka. Dapat lihat detail per soal jika tersedia.

**Interaksi:** Klik "Detail" -> Halaman breakdown nilai.

---

## Scene 16: Lihat Rapot (Siswa)

**Visual:** Halaman rapot dengan nilai akhir, sikap, komentar guru. Tombol "Cetak PDF".

**Narasi:** Siswa melihat rapor akhir semester. Termasuk nilai total dan predikat.

**Interaksi:** Klik "Cetak" -> Download PDF.

---

## Scene 17: Logout (Semua Peran)

**Visual:** Tombol "Logout" di header dashboard. Konfirmasi dialog "Yakin logout?".

**Narasi:** Pengguna logout dari sistem. Kembali ke halaman login.

**Interaksi:** Klik "Logout" -> Konfirmasi -> Redirect ke login.

---

**Catatan:** Storyboard ini berdasarkan flowchart dan routes aplikasi. Setiap scene dapat diimplementasikan sebagai wireframe atau mockup UI. Untuk visualisasi lebih detail, gunakan tools seperti Figma atau Adobe XD.
