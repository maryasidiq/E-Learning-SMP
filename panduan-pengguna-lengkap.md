# Panduan Pengguna Lengkap — Sistem Informasi Akademik

Dokumen ini melengkapi `panduan-pengguna.md` yang sudah ada dengan langkah-langkah praktis dan placeholder screenshot yang bisa Anda ambil dan masukkan ke folder `docs/screenshots`.

---

## Ringkasan

- Target pengguna: Siswa, Guru, Administrator
- Tujuan: Panduan langkah-demi-langkah untuk penggunaan fitur umum
- Cara pakai screenshot: Simpan file sesuai nama yang direkomendasikan di `docs/screenshots`

---

## 1. Menjalankan Aplikasi (Untuk yang ingin mengambil screenshot lokal)

Jalankan aplikasi Laravel secara lokal untuk membuka halaman yang akan di-screenshot.

1. Buka terminal di root proyek.

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
php artisan serve --host=127.0.0.1 --port=8000
```

2. Akses aplikasi di: `http://127.0.0.1:8000`

Catatan: Pastikan Anda memiliki akun user (admin/guru/siswa) yang valid untuk login.

---

## 2. Daftar Screenshot yang Disarankan

Ambil screenshot sesuai halaman berikut dan simpan dengan nama file yang disebutkan, lalu letakkan di `docs/screenshots`.

- `01_login.png` — Halaman login
- `02_dashboard_admin.png` — Dashboard admin (setelah login sebagai admin)
- `03_dashboard_guru.png` — Dashboard guru
- `04_dashboard_siswa.png` — Dashboard siswa
- `05_menu_guru.png` — Halaman manajemen guru
- `06_menu_siswa.png` — Halaman manajemen siswa
- `07_form_tambah_siswa.png` — Form tambah siswa
- `08_jadwal_kelas.png` — Tampilan jadwal pelajaran
- `09_materi_list.png` — Daftar materi pelajaran
- `10_upload_materi.png` — Form upload materi (guru)
- `11_absensi.png` — Halaman absensi
- `12_soal_list.png` — Daftar soal/ujian
- `13_mengerjakan_soal.png` — Halaman siswa mengerjakan soal
- `14_nilai_view.png` — Tampilan nilai siswa
- `15_rapot_generate.png` — Proses generate rapot
- `16_import_export.png` — Halaman import/export data
- `17_pengumuman.png` — Halaman pengumuman

Anda dapat menambah screenshot lain sesuai kebutuhan.

---

## 3. Cara Mengambil Screenshot (Windows)

Berikut beberapa cara mudah untuk mengambil screenshot halaman web pada Windows.

A. Snipping Tool / Snip & Sketch

1. Buka halaman yang ingin diambil gambar di browser.
2. Tekan `Windows` lalu ketik "Snipping Tool" atau `Snip & Sketch`.
3. Klik "New" dan pilih area yang diinginkan.
4. Simpan gambar: `Save as` → simpan ke `docs/screenshots/01_login.png` (ubah nama sesuai daftar).

B. Menggunakan Print Screen

1. Tekan `PrtScn` untuk mengambil seluruh layar.
2. Buka Paint atau editor gambar lain.
3. Paste (`Ctrl+V`) lalu crop area yang diinginkan.
4. Simpan ke `docs/screenshots` dengan nama sesuai.

C. Chrome Developer Tools (full page)

1. Buka halaman di Chrome.
2. Tekan `F12` untuk membuka DevTools.
3. Tekan `Ctrl+Shift+P` lalu ketik `screenshot` dan pilih `Capture full size screenshot`.
4. File PNG akan terdownload; pindahkan ke `docs/screenshots` dan beri nama sesuai.

D. Mengambil screenshot dari server staging/produksi

- Jika aplikasi ada di server publik, buka URL halaman terkait dan gunakan cara-cara di atas.
- Pastikan tidak mengekspos data sensitif saat mengambil screenshot.

---

## 4. Memasukkan Screenshot ke Dokumen

Setelah screenshot disimpan di `docs/screenshots`, buka file `panduan-pengguna-lengkap.md` dan ganti placeholder gambar dengan path relatif seperti:

```markdown
![Login](docs/screenshots/01_login.png)
```

Contoh penggunaan di bagian login:

### Contoh: Login

1. Buka halaman login.

![Login](docs/screenshots/01_login.png)

Masukkan email dan password lalu klik tombol "Masuk".

---

## 5. Panduan Fitur Utama (Ringkasan Langkah)

Berikut ringkasan langkah untuk fitur utama. Sertakan screenshot sesuai daftar di setiap sub-bagian.

- Login

    - Akses `http://127.0.0.1:8000/login`
    - Masukkan kredensial, klik "Masuk"
    - Screenshot: `01_login.png`

- Dashboard

    - Setelah login, pengguna diarahkan ke dashboard sesuai peran
    - Screenshot: `02_dashboard_admin.png` / `03_dashboard_guru.png` / `04_dashboard_siswa.png`

- Manajemen Siswa (Admin)

    - Menu: `Siswa` → `Tambah Siswa`
    - Isi form dan klik `Simpan`
    - Screenshot: `05_menu_guru.png`, `07_form_tambah_siswa.png`

- Manajemen Guru (Admin)

    - Menu: `Guru` → `Tambah Guru`
    - Isi data guru, upload foto jika perlu
    - Screenshot: `05_menu_guru.png`

- Jadwal Pelajaran

    - Menu: `Jadwal` → pilih kelas → atur mata pelajaran dan jam
    - Screenshot: `08_jadwal_kelas.png`

- Materi (Guru)

    - Menu: `Materi` → `Tambah Materi` → upload file / link
    - Screenshot: `09_materi_list.png`, `10_upload_materi.png`

- Absen (Guru)

    - Menu: `Absen` → pilih kelas → centang hadir/tidak
    - Screenshot: `11_absensi.png`

- Soal & Ujian

    - Menu: `Soal` → `Tambah Soal` / siswa mengerjakan soal online
    - Screenshot: `12_soal_list.png`, `13_mengerjakan_soal.png`

- Nilai & Rapot

    - Menu: `Nilai` → input nilai → generate rapot
    - Screenshot: `14_nilai_view.png`, `15_rapot_generate.png`

- Import/Export

    - Menu: `Import/Export` → unggah file Excel / export data
    - Screenshot: `16_import_export.png`

- Pengumuman
    - Menu: `Pengumuman` → buat pengumuman baru
    - Screenshot: `17_pengumuman.png`

---

## 6. Tips Pengambilan Screenshot Berkualitas

- Pastikan notifikasi dan data sensitif disembunyikan.
- Gunakan bahasa tampilan yang konsisten.
- Zoom halaman ke 100% untuk konsistensi ukuran.
- Gunakan Chrome `Capture full size screenshot` untuk seluruh halaman.

---

## 7. Cara Mengunggah Screenshot ke Repo

1. Setelah menyimpan screenshot di `docs/screenshots`, commit dan push ke repository git:

```bash
git add docs/screenshots/*
git commit -m "Add manual screenshots"
git push origin <branch-anda>
```

2. Jika repo besar atau ada file sensitif, pertimbangkan menggunakan branch terpisah.

---

## 8. Jika Saya Mau Bantuan Menangkap Screenshot

Saya bisa membantu menyiapkan skrip headless (Puppeteer) untuk mengambil full-page screenshot otomatis dari URL yang Anda berikan, namun saya tidak bisa mengakses browser atau server Anda tanpa akses. Jika Anda mau, beri tahu apakah Anda ingin saya:

- Menyertakan contoh skrip Puppeteer untuk dijalankan lokal
- Atau instruksi manual yang lebih detil untuk tiap halaman

---

## Lampiran: Contoh Skrip Puppeteer (Opsional)

Skrip ini dijalankan di mesin lokal (Node.js) dan mengambil screenshot full-page.

```javascript
// capture.js
const puppeteer = require("puppeteer");
(async () => {
    const browser = await puppeteer.launch();
    const page = await browser.newPage();
    await page.goto("http://127.0.0.1:8000/login", {
        waitUntil: "networkidle2",
    });
    await page.screenshot({
        path: "docs/screenshots/01_login.png",
        fullPage: true,
    });
    await browser.close();
})();
```

Jalankan:

```bash
npm init -y
npm install puppeteer
node capture.js
```

---

## Penutup

File ini lengkap dengan daftar screenshot dan instruksi untuk menambahkan gambar ke panduan. Setelah Anda mengunggah screenshot ke `docs/screenshots`, beri tahu saya jika ingin saya masukkan gambar langsung ke file markdown atau membuat PDF panduan.

---

© Tim Pengembang Sistem Informasi Akademik
