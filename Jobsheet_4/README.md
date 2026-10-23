# Jobsheet 4 — UI/UX Design (SIMPUS-Mini)

Sub-CPMK: Merancang UI/UX aplikasi (proyek).

## Ringkasan Jobsheet 4
Jobsheet 4 berfokus pada tahapan **desain dan rancangan sebelum penulisan logika kode**:
1. **Wireframe ASCII**: Sketsa halaman login, dashboard petugas, formulir peminjaman, pengembalian, dan riwayat peminjaman per anggota di [`docs/wireframe.md`](docs/wireframe.md).
2. **User Flow**: Diagram alur pengguna langkah demi langkah untuk alur peminjaman dan pengembalian buku, lengkap dengan pemetaan aturan bisnis (*business rules*).
3. **Analisis Otorisasi Aktor**: Pemisahan peran antara **Tamu** (hanya melihat katalog) dan **Petugas** (CRUD data & transaksi peminjaman).
4. **Implementasi Nyata Wireframe Login**: Pembuatan [`login.html`](login.html) dan [`registrasi.html`](registrasi.html) berbasis form semantik dan `style.css`.
5. **Laporan & Jawaban Tugas Lengkap**: Semua poin latihan 6.3 dan 6.4 terjawab secara terstruktur di [`tugas_jobsheet4.md`](tugas_jobsheet4.md).

## Struktur Folder
```
Jobsheet_4/
├── index.html                  # Beranda SIMPUS-Mini (dengan navigasi Login)
├── login.html                  # Implementasi wireframe Login Petugas
├── registrasi.html             # Implementasi wireframe Registrasi Tamu
├── tugas_jobsheet4.md          # Laporan & jawaban tugas 6.3 dan 6.4 lengkap
├── docs/
│   └── wireframe.md            # Spesifikasi wireframe & user flow utama
├── assets/
│   └── css/
│       └── style.css           # CSS terpadu (responsive + auth wrapper)
├── buku/
│   ├── list.html               # Tabel katalog buku
│   └── tambah.html             # Form tambah buku
├── anggota/
│   ├── list.html               # Tabel daftar anggota
│   └── tambah.html             # Form tambah anggota
├── README.md                   # Panduan jobsheet 4
└── Dokumentasi/
    └── README.md               # Penjelasan modul materi
```

## Cara Menjalankan & Menguji
1. Buka `login.html` atau `index.html` di browser (misalnya Google Chrome).
2. Uji alur antarmuka:
   - Dari `login.html`, coba navigasi ke `registrasi.html` melalui link "Daftar di sini".
   - Dari `login.html`, coba tekan tombol "Masuk" untuk masuk ke `index.html`.
   - Dari `index.html`, klik menu "Login" di navbar.
3. Buka [`tugas_jobsheet4.md`](tugas_jobsheet4.md) untuk membaca analisis mendalam perbandingan navbar/statistik, penelusuran user flow, serta identifikasi edge case.
