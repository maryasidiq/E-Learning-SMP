# Flowchart Sistem Informasi Akademik Sekolah (Laravel)

Berikut adalah flowchart utama dari aplikasi Sistem Informasi Akademik Sekolah berbasis Laravel. Flowchart ini menggunakan sintaks Mermaid untuk visualisasi.

```mermaid
---
config:
  layout: fixed
---
flowchart TB
    A["Start: User Mengakses Aplikasi"] --> B{"Apakah User Sudah Login?"}
    B -- Tidak --> C["Halaman Login"]
    C --> D["Proses Login"]
    D --> E{"Cek Email dan Password"}
    E -- Valid --> F["Redirect Berdasarkan Role"]
    E -- Invalid --> C
    F --> G{"Role User"}
    G -- Admin/Operator --> H["Dashboard Admin"]
    G -- Guru --> I["Dashboard Guru"]
    G -- Siswa --> J["Dashboard Siswa"]
    H --> K["Manajemen Data"]
    K --> L["CRUD Guru, Siswa, Kelas, Mapel, Jadwal, dan Role"]
    L --> M["Import/Export Data"]
    M --> N["Generate Laporan PDF/Excel"]
    N --> O["Trash Management"]
    O --> P["End"]
    I --> Q["Lihat Jadwal"]
    Q --> R["Materi Mapel"]
    R --> S["Soal"]
    S --> T["Entry Nilai"]
    T --> P
    J --> V["Lihat Jadwal"]
    V --> W["Materi Mapel"]
    W --> X["Soal"]
    X --> Y["Lihat Nilai"]
    Y --> P
    P --> AA{"Logout?"}
    AA -- Ya --> BB["Logout"]
    BB --> A
    AA -- Tidak --> F
    B -- Ya --> F
```

## Penjelasan Flowchart:

1. **Start**: User mengakses aplikasi.
2. **Login Check**: Jika belum login, ke halaman login.
3. **Login Process**: Validasi email dan password.
4. **Role Check**: Berdasarkan role (Admin, Guru, Siswa), redirect ke dashboard masing-masing.
5. **Admin Functions**: Manajemen data lengkap, import/export, laporan, trash management.
6. **Guru Functions**: Absensi, materi, soal, nilai, rapot.
7. **Siswa Functions**: Lihat jadwal, materi, soal, nilai, rapot.
8. **End/Loop**: User bisa logout atau kembali ke dashboard.

Untuk melihat flowchart secara visual, salin kode Mermaid di atas ke editor online seperti https://mermaid.live/ atau https://mermaid-js.github.io/mermaid-live-editor/.
