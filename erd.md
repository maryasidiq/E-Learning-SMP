# Entity-Relationship Diagram (ERD) untuk Sistem Informasi Akademik Sekolah Laravel

Berikut adalah ERD untuk database aplikasi Sistem Informasi Akademik Sekolah yang dibangun dengan Laravel. Diagram ini menggunakan sintaks Mermaid untuk representasi visual.

```mermaid
erDiagram
    %% Entities dengan atribut

    USER {
        string name
        string email
        string password
        string role
        string no_induk
        string id_card
    }

    GURU {
        string id_card
        string nip
        string nama_guru
        string kode
        string jk
        string telp
        string tmp_lahir
        date tgl_lahir
        string foto
    }

    MAPEL {
        string nama_mapel
        integer paket_id
        string kelompok
    }

    KELAS {
        string nama_kelas
        integer paket_id
        string kelompok
        integer guru_id
    }

    SISWA {
        string no_induk
        string nis
        string nama_siswa
        integer kelas_id
        string jk
        string telp
        string tmp_lahir
        date tgl_lahir
        string foto
    }

    JADWAL {
        integer hari_id
        integer kelas_id
        integer mapel_id
        integer guru_id
        time jam_mulai
        time jam_selesai
        integer ruang_id
    }

    SOAL {
        string judul
        text deskripsi
        integer guru_id
        integer mapel_id
        integer kelas_id
        datetime waktu_mulai
        datetime waktu_selesai
        integer durasi
        boolean show_nilai
    }

    SOAL_DETAIL {
        integer soal_id
        string tipe
        text pertanyaan
        json gambar
        text pilihan_a
        text pilihan_b
        text pilihan_c
        text pilihan_d
        text pilihan_e
        string jawaban_benar
        integer bobot
    }

    JAWABAN_SOAL {
        integer soal_id
        integer soal_detail_id
        integer siswa_id
        text jawaban
        string file
    }

    NILAI_TOTAL {
        integer siswa_id
        integer mapel_id
        decimal rata_rata
        json nilai_details
    }

    NILAI_AKHIR {
        integer siswa_id
        integer mapel_id
        string judul_nilai
        decimal nilai
        string sumber
        integer bobot
        integer soal_id
    }

    NILAI {
        integer guru_id
        integer kkm
        text deskripsi_a
        text deskripsi_b
        text deskripsi_c
        text deskripsi_d
    }

    MATERI_MAPEL {
        integer guru_id
        integer mapel_id
        integer kelas_id
        string judul
        text deskripsi
        string tipe
        text konten
        string file_path
    }

    PAKET {
        string ket
    }

    PENGUMUMAN {
        string opsi
        text isi
    }

    RAPOT {
        integer siswa_id
        integer kelas_id
        integer guru_id
        integer mapel_id
        decimal p_nilai
        string p_predikat
        text p_deskripsi
        decimal k_nilai
        string k_predikat
        text k_deskripsi
    }

    RUANG {
        string nama_ruang
    }

    SIKAP {
        integer siswa_id
        integer kelas_id
        integer guru_id
        integer mapel_id
        string sikap_1
        string sikap_2
        string sikap_3
    }

    ULANGAN {
        integer siswa_id
        integer kelas_id
        integer guru_id
        integer mapel_id
        decimal ulha_1
        decimal ulha_2
        decimal uts
        decimal ulha_3
        decimal uas
    }

    HARI {
        string nama_hari
    }

    KEHADIRAN {
        string ket
        string color
    }

    ABSEN {
        integer guru_id
        date tanggal
        integer kehadiran_id
    }

    %% Relationships

    GURU ||--o{ JADWAL : "has many"
    GURU }o--o{ MAPEL : "belongs to many"
    GURU ||--o{ KELAS : "belongs to many (through jadwal)"
    GURU ||--o{ ABSEN : "has many"
    GURU ||--o{ SOAL : "has many"
    GURU ||--o{ NILAI : "has one"
    GURU ||--o{ MATERI_MAPEL : "has many"
    GURU ||--o{ RAPOT : "has many"
    GURU ||--o{ SIKAP : "has many"
    GURU ||--o{ ULANGAN : "has many"

    MAPEL ||--o{ JADWAL : "has many"
    MAPEL }o--o{ GURU : "belongs to many"
    MAPEL ||--o{ SOAL : "has many"
    MAPEL ||--o{ NILAI_TOTAL : "has many"
    MAPEL ||--o{ NILAI_AKHIR : "has many"
    MAPEL ||--o{ MATERI_MAPEL : "has many"
    MAPEL ||--o{ RAPOT : "has many"
    MAPEL ||--o{ SIKAP : "has many"
    MAPEL ||--o{ ULANGAN : "has many"
    MAPEL ||--|| PAKET : "belongs to"

    KELAS ||--o{ JADWAL : "has many"
    KELAS ||--o{ SISWA : "has many"
    KELAS ||--o{ SOAL : "has many"
    KELAS ||--o{ MATERI_MAPEL : "has many"
    KELAS ||--o{ RAPOT : "has many"
    KELAS ||--o{ SIKAP : "has many"
    KELAS ||--o{ ULANGAN : "has many"
    KELAS ||--|| GURU : "belongs to"
    KELAS ||--|| PAKET : "belongs to"

    SISWA ||--o{ JAWABAN_SOAL : "has many"
    SISWA ||--o{ NILAI_TOTAL : "has many"
    SISWA ||--o{ NILAI_AKHIR : "has many"
    SISWA ||--o{ RAPOT : "has many"
    SISWA ||--o{ SIKAP : "has many"
    SISWA ||--o{ ULANGAN : "has many"
    SISWA ||--|| KELAS : "belongs to"

    JADWAL ||--|| HARI : "belongs to"
    JADWAL ||--|| KELAS : "belongs to"
    JADWAL ||--|| MAPEL : "belongs to"
    JADWAL ||--|| GURU : "belongs to"
    JADWAL ||--|| RUANG : "belongs to"

    SOAL ||--o{ SOAL_DETAIL : "has many"
    SOAL ||--o{ JAWABAN_SOAL : "has many"
    SOAL ||--o{ NILAI_AKHIR : "has many"
    SOAL ||--|| GURU : "belongs to"
    SOAL ||--|| MAPEL : "belongs to"
    SOAL ||--|| KELAS : "belongs to"

    SOAL_DETAIL ||--o{ JAWABAN_SOAL : "has many"
    SOAL_DETAIL ||--|| SOAL : "belongs to"

    JAWABAN_SOAL ||--|| SOAL : "belongs to"
    JAWABAN_SOAL ||--|| SOAL_DETAIL : "belongs to"
    JAWABAN_SOAL ||--|| SISWA : "belongs to"

    NILAI_TOTAL ||--|| SISWA : "belongs to"
    NILAI_TOTAL ||--|| MAPEL : "belongs to"

    NILAI_AKHIR ||--|| SISWA : "belongs to"
    NILAI_AKHIR ||--|| MAPEL : "belongs to"
    NILAI_AKHIR ||--|| SOAL : "belongs to"

    NILAI ||--|| GURU : "belongs to"

    MATERI_MAPEL ||--|| GURU : "belongs to"
    MATERI_MAPEL ||--|| MAPEL : "belongs to"
    MATERI_MAPEL ||--|| KELAS : "belongs to"

    RAPOT ||--|| SISWA : "belongs to"
    RAPOT ||--|| KELAS : "belongs to"
    RAPOT ||--|| GURU : "belongs to"
    RAPOT ||--|| MAPEL : "belongs to"

    SIKAP ||--|| SISWA : "belongs to"
    SIKAP ||--|| KELAS : "belongs to"
    SIKAP ||--|| GURU : "belongs to"
    SIKAP ||--|| MAPEL : "belongs to"

    ULANGAN ||--|| SISWA : "belongs to"
    ULANGAN ||--|| KELAS : "belongs to"
    ULANGAN ||--|| GURU : "belongs to"
    ULANGAN ||--|| MAPEL : "belongs to"

    ABSEN ||--|| GURU : "belongs to"
    ABSEN ||--|| KEHADIRAN : "belongs to"
```

## Penjelasan ERD

### Entitas Utama:

- **USER**: Tabel untuk autentikasi pengguna (guru, siswa, admin)
- **GURU**: Data guru pengajar
- **MAPEL**: Mata pelajaran
- **KELAS**: Kelas siswa
- **SISWA**: Data siswa
- **JADWAL**: Jadwal pelajaran
- **SOAL**: Soal ujian/latihan
- **SOAL_DETAIL**: Detail pertanyaan dalam soal
- **JAWABAN_SOAL**: Jawaban siswa untuk soal
- **NILAI_TOTAL**: Total nilai siswa per mapel
- **NILAI_AKHIR**: Nilai akhir siswa
- **NILAI**: Kriteria nilai (KKM, deskripsi)
- **MATERI_MAPEL**: Materi pembelajaran
- **PAKET**: Paket kurikulum
- **PENGUMUMAN**: Pengumuman sistem
- **RAPOT**: Raport siswa
- **RUANG**: Ruangan kelas
- **SIKAP**: Penilaian sikap siswa
- **ULANGAN**: Nilai ulangan siswa
- **HARI**: Hari dalam seminggu
- **KEHADIRAN**: Status kehadiran
- **ABSEN**: Absensi guru

### Hubungan Utama:

- Guru mengajar banyak mapel dan kelas
- Mapel diajarkan oleh banyak guru dan memiliki banyak jadwal
- Kelas memiliki banyak siswa dan jadwal
- Siswa termasuk dalam satu kelas dan memiliki banyak nilai
- Soal terdiri dari banyak detail pertanyaan
- Siswa menjawab soal dan mendapatkan nilai

Diagram ini dapat divisualisasikan menggunakan Mermaid di editor yang mendukungnya, seperti GitHub, VSCode dengan ekstensi Mermaid, atau online tools seperti mermaid.live.
