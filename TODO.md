# TODO: Modifikasi Sistem Nilai Guru

## 1. Update Migration for nilai_akhir

- [x] Rename table from nilai_latihan to nilai_akhir in migration file.
- [x] Change column nilai_ke to judul_nilai (string).

## 2. Update Model

- [x] Rename NilaiLatihan.php to NilaiAkhir.php.
- [x] Update fillable: ['siswa_id', 'mapel_id', 'judul_nilai', 'nilai', 'sumber', 'bobot'].
- [x] Add relationships if needed.

## 3. Rename and Update Controller

- [x] Rename UlanganController.php to NilaiController.php.
- [x] Update methods: index (mapel selection), create (kelas selection), show (nilai entry).
- [x] Add new method mapel() for /guru/nilai/mapel.
- [x] Update store method for dynamic latihan, sources, bobot, validations.

## 4. Update Routes

- [x] Change ulangan._ routes to nilai._.
- [x] Add Route::get('/guru/nilai/mapel', 'NilaiController@mapel')->name('guru.nilai.mapel').

## 5. Rename and Modify Views

- [x] Rename guru/ulangan/ to guru/nilai/.
- [x] Modify kelas.blade.php: Change titles, breadcrumbs to "Entry Nilai".
- [x] Modify nilai.blade.php: Use TailwindCSS, dynamic latihan table, sources dropdown, bobot input, auto-calc rata-rata, buttons (Tambah Nilai, Simpan Nilai, Export).
- [x] Add new mapel.blade.php for mapel selection.

## 6. Update Sidebars

- [x] In partials/sidebar.blade.php and template_backend/sidebar.blade.php: Change "Entry Nilai Ulangan" to "Entry Nilai".
- [x] Remove "Entry Nilai Rapot" and "Deskripsi Predikat" menus.

## 7. Implement JavaScript

- [x] Add JS for dynamic latihan columns, AJAX save, calculations.

## 8. Validations and Calculations

- [x] Server-side validations: nilai 0-100, bobot >=1.
- [x] Auto-calc rata-rata: sum(nilai \* bobot) / sum(bobot).
- [x] For soal source: Calculate average from JawabanSoal.

## 9. Modify nilai_total table

- [x] Add nilai_details column (JSON) to store all grades.
- [x] Update NilaiTotal model fillable.
- [x] Update calculateRataRata to store nilai_details.

## 10. Test and Finalize

- [x] Run migrations, test UI, calculations, validations.
- [x] Remove old views: Deleted guru/ulangan and guru/rapot directories
