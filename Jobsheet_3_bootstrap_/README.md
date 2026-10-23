# Jobsheet 3 (Versi Bootstrap) — Responsive Design dengan Framework

Sub-CPMK: Membangun tampilan responsif memakai framework CSS (Bootstrap 5).

Versi ini adalah alternatif dari Jobsheet 3 (CSS murni) — halaman dan fungsionalitasnya identik, tetapi seluruh tata letak dan komponen dibangun memakai Bootstrap 5.3 via CDN alih-alih menulis CSS dari nol.

## Perubahan dari Jobsheet 3 (CSS Murni)
1. **Bootstrap 5.3 dimuat via CDN**:
   - `bootstrap.min.css` di dalam `<head>`
   - `bootstrap.bundle.min.js` di sebelum penutup `</body>`
2. **Navbar**: Memakai komponen `.navbar`, `.navbar-toggler`, dan `.collapse` bawaan Bootstrap (menggunakan JavaScript resmi Bootstrap), menggantikan teknik *checkbox hack*.
3. **Kartu Statistik (Grid)**: Grid CSS manual diganti sistem grid 12 kolom Bootstrap (`.row` dan `.col-12 .col-md-4`).
4. **Section & Card**: Section dibungkus komponen `.card` dan `.card-body` dengan `.shadow-sm` menggantikan styling `<section>` custom.
5. **Tabel & Form**: Memakai utility class Bootstrap (`.table`, `.table-striped`, `.table-hover`, `.form-label`, `.form-control`, `.form-select`, `.btn-warning`, `.btn-danger`).
6. **`assets/css/style.css` menyusut**: Dari ~245 baris menjadi ~15 baris (hanya override warna brand SIMPUS-Mini `#1d5b8a`).

## Struktur Folder
```
Jobsheet_3_bootstrap_/
├── index.html                  # Beranda SIMPUS-Mini (Bootstrap 5)
├── assets/
│   └── css/
│       └── style.css           # Override kecil (~15 baris)
├── buku/
│   ├── list.html               # Tabel responsif Bootstrap
│   └── tambah.html             # Form Bootstrap
├── anggota/
│   ├── list.html               # Tabel responsif Bootstrap
│   └── tambah.html             # Form Bootstrap
├── README.md
└── Dokumentasi/
    └── README.md               # Dokumentasi perbandingan Bootstrap vs CSS Murni
```

## Cara Menjalankan & Menguji
1. Pastikan komputer terhubung ke internet (karena Bootstrap dimuat dari CDN).
2. Buka `index.html` di browser.
3. Buka **DevTools** (`F12` atau klik kanan > *Inspect*) dan aktifkan *Responsive Mode* (`Ctrl + Shift + M`).
4. Uji pada breakpoint Bootstrap:
   - **Mobile (<768px)**: Navbar collapse menjadi hamburger, kartu statistik menjadi 1 kolom penuh (`col-12`).
   - **Tablet / Desktop (≥768px / ≥992px)**: Kartu statistik berjajar 3 kolom (`col-md-4`), navbar terbuka penuh (`navbar-expand-lg`).
