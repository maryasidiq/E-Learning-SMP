# Prompt DFD untuk Lucid AI dari Flowchart Terbaru

Berikut adalah prompt untuk membuat Diagram Alir Data (DFD) Level 0, 1, dan 2 berdasarkan flowchart terbaru Sistem Informasi Akademik Sekolah. Prompt ini dirancang untuk digunakan di Lucid AI, dengan instruksi penggunaan simbol DFD standar: Terminator (untuk entitas eksternal), Data Flow (untuk aliran data), Process (untuk proses), dan Data Store (untuk penyimpanan data).

## Prompt untuk DFD Level 0 (Context Diagram)

```
Buat Diagram Alir Data (DFD) Level 0 untuk Sistem Informasi Akademik Sekolah berbasis Laravel berdasarkan flowchart terbaru. Gunakan simbol DFD standar:
- Terminator: Kotak persegi panjang untuk entitas eksternal (Admin, Guru, Siswa).
- Process: Lingkaran untuk proses utama (Sistem Informasi Akademik Sekolah).
- Data Store: Kotak dengan garis terbuka untuk penyimpanan data (Basis Data Sistem, Penyimpanan Berkas, Laporan).
- Data Flow: Panah untuk aliran data antara simbol.

Entitas eksternal: Admin, Guru, Siswa. Sistem utama: Sistem Informasi Akademik Sekolah. Penyimpanan data: Basis Data Sistem, Penyimpanan Berkas, Laporan. Aliran data: Admin, Guru, Siswa mengirim data ke Sistem; Sistem mengirim data ke dan menerima dari Basis Data, Penyimpanan Berkas, Laporan; Sistem mengirim data kembali ke Admin, Guru, Siswa.
```

## Prompt untuk DFD Level 1 (Overview Diagram)

```
Buat Diagram Alir Data (DFD) Level 1 untuk Sistem Informasi Akademik Sekolah berdasarkan flowchart terbaru. Gunakan simbol DFD standar:
- Terminator: Kotak persegi panjang untuk entitas eksternal (Admin, Guru, Siswa).
- Process: Lingkaran untuk proses (Login & Autentikasi, Autentikasi, Pengalihan Peran, Manajemen Data, Fungsi Guru, Fungsi Siswa).
- Data Store: Kotak dengan garis terbuka untuk penyimpanan data (Basis Data Pengguna, Basis Data Guru, Basis Data Siswa, Basis Data Kelas/Mapel/Jadwal, Penyimpanan Berkas, Penyimpanan Laporan, Basis Data Sampah, Basis Data Materi, Basis Data Soal, Basis Data Nilai).
- Data Flow: Panah untuk aliran data antara simbol.

Entitas eksternal: Admin, Guru, Siswa. Proses utama: Login & Autentikasi -> Autentikasi -> Pengalihan Peran -> Manajemen Data (untuk Admin), Fungsi Guru (untuk Guru), Fungsi Siswa (untuk Siswa). Sub-proses Admin: CRUD Guru/Siswa/Kelas/Mapel/Jadwal/Role -> Import/Export Data -> Generate Laporan PDF/Excel -> Trash Management. Sub-proses Guru: Lihat Jadwal -> Materi Mapel -> Soal -> Entry Nilai. Sub-proses Siswa: Lihat Jadwal -> Materi Mapel -> Soal -> Lihat Nilai. Penyimpanan data sesuai dengan proses. Aliran data sesuai dengan flowchart.
```

## Prompt untuk DFD Level 2.1 (Detail Admin)

```
Buat Diagram Alir Data (DFD) Level 2 untuk Manajemen Admin berdasarkan flowchart terbaru. Gunakan simbol DFD standar:
- Terminator: Kotak persegi panjang untuk Admin.
- Process: Lingkaran untuk proses (Login, Pemeriksaan Autentikasi, Akses Dashboard Admin, CRUD Guru, CRUD Siswa, CRUD Kelas, CRUD Mapel, CRUD Jadwal, Import Data, Export Data, Generate Laporan, Manajemen Sampah).
- Data Store: Kotak dengan garis terbuka untuk penyimpanan data (Basis Data Pengguna, Basis Data Guru, Basis Data Siswa, Basis Data Kelas, Basis Data Mapel, Basis Data Jadwal, Penyimpanan Berkas, Basis Data Laporan, Basis Data Sampah).
- Data Flow: Panah untuk aliran data antara simbol.

Entitas eksternal: Admin. Proses: Login -> Pemeriksaan Autentikasi -> Akses Dashboard Admin -> CRUD Guru, CRUD Siswa, CRUD Kelas, CRUD Mapel, CRUD Jadwal, Import Data, Export Data, Generate Laporan, Manajemen Sampah. Penyimpanan data sesuai. Aliran data: Admin ke proses, proses ke penyimpanan, penyimpanan ke proses, proses ke Admin.
```

## Prompt untuk DFD Level 2.2 (Detail Guru)

```
Buat Diagram Alir Data (DFD) Level 2 untuk Fungsi Guru berdasarkan flowchart terbaru. Gunakan simbol DFD standar:
- Terminator: Kotak persegi panjang untuk Guru.
- Process: Lingkaran untuk proses (Login, Pemeriksaan Autentikasi, Akses Dashboard Guru, Lihat Jadwal, Materi Mapel, Soal, Entry Nilai).
- Data Store: Kotak dengan garis terbuka untuk penyimpanan data (Basis Data Pengguna, Basis Data Jadwal, Basis Data Materi, Basis Data Soal, Basis Data Nilai).
- Data Flow: Panah untuk aliran data antara simbol.

Entitas eksternal: Guru. Proses: Login -> Pemeriksaan Autentikasi -> Akses Dashboard Guru -> Lihat Jadwal -> Materi Mapel -> Soal -> Entry Nilai. Penyimpanan data sesuai. Aliran data: Guru ke proses, proses ke penyimpanan, penyimpanan ke proses, proses ke Guru.
```

## Prompt untuk DFD Level 2.3 (Detail Siswa)

```
Buat Diagram Alir Data (DFD) Level 2 untuk Fungsi Siswa berdasarkan flowchart terbaru. Gunakan simbol DFD standar:
- Terminator: Kotak persegi panjang untuk Siswa.
- Process: Lingkaran untuk proses (Login, Pemeriksaan Autentikasi, Akses Dashboard Siswa, Lihat Jadwal, Materi Mapel, Soal, Lihat Nilai).
- Data Store: Kotak dengan garis terbuka untuk penyimpanan data (Basis Data Pengguna, Basis Data Jadwal, Basis Data Materi, Basis Data Soal, Basis Data Nilai).
- Data Flow: Panah untuk aliran data antara simbol.

Entitas eksternal: Siswa. Proses: Login -> Pemeriksaan Autentikasi -> Akses Dashboard Siswa -> Lihat Jadwal -> Materi Mapel -> Soal -> Lihat Nilai. Penyimpanan data sesuai. Aliran data: Siswa ke proses, proses ke penyimpanan, penyimpanan ke proses, proses ke Siswa.
```

## Cara Menggunakan di Lucid AI

1. **Akses Lucid AI**: Buka https://lucid.ai/ dan login atau buat akun.
2. **Pilih Template**: Pilih "Data Flow Diagram" sebagai template.
3. **Paste Prompt**: Salin salah satu prompt di atas dan paste ke chat Lucid AI atau prompt box.
4. **Generate**: Klik generate untuk membuat diagram visual.
5. **Edit jika Perlu**: Sesuaikan diagram yang dihasilkan jika ada yang kurang.

**Catatan**: Prompt ini berdasarkan flowchart terbaru dengan alur Admin, Guru, dan Siswa. Pastikan Lucid AI menggunakan simbol DFD standar untuk visualisasi yang akurat.
