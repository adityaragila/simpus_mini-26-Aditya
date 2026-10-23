# Jobsheet 3 — Responsive Design (CSS Murni)

Sub-CPMK: Membangun tampilan responsif.

## Perubahan dari Jobsheet 2
1. **Tambah `<meta name="viewport">`** di semua halaman untuk mencegah mobile browser melakukan zoom-out otomatis dan memastikan skala 1:1.
2. **Navbar Hamburger Menu**: Memakai teknik *checkbox hack* murni CSS (`input[type=checkbox] + label`), aktif di layar ≤480px tanpa JavaScript.
3. **Tabel Responsif**: Tabel dibungkus `<div class="table-responsive">` dengan CSS `overflow-x: auto` agar dapat digeser (scroll horizontal) di layar sempit.
4. **Media Query di `style.css`**: Grid kartu statistik beralih dari 3 kolom → 2 kolom (tablet ≤768px) → 1 kolom (mobile ≤480px).

## Struktur Folder
```
Jobsheet_3/
├── index.html                  # Beranda SIMPUS-Mini
├── assets/
│   └── css/
│       └── style.css           # CSS dengan checkbox hack & media queries
├── buku/
│   ├── list.html               # Tabel dibungkus .table-responsive
│   └── tambah.html             # Form tambah buku responsif
├── anggota/
│   ├── list.html               # Tabel dibungkus .table-responsive
│   └── tambah.html             # Form tambah anggota responsif
├── README.md
└── Dokumentasi/
    └── README.md               # Penjelasan materi teknis Jobsheet 3
```

## Cara Menjalankan & Menguji
1. Buka `index.html` di browser (misalnya Google Chrome).
2. Buka **DevTools** (`F12` atau klik kanan > *Inspect*).
3. Aktifkan *Responsive Mode* (`Ctrl + Shift + M`).
4. Uji pada 3 ukuran breakpoint:
   - **Mobile (≤ 480px)**: Hamburger menu aktif, kartu bertumpuk 1 kolom, form selebar layar.
   - **Tablet (~ 768px)**: Kartu statistik tersusun 2 kolom.
   - **Desktop (≥ 1024px)**: Menu horizontal terlihat penuh, kartu statistik 3 kolom sejajar.
