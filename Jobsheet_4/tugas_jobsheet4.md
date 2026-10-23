# Laporan Tugas & Analisis — Jobsheet 4: UI/UX Design (SIMPUS-Mini)

**Mata Kuliah**: Pemrograman Web 2026  
**Topik**: UI/UX Design, Wireframe ASCII, User Flow, & Analisis Kebutuhan Sistem  
**Repositori**: `Jobsheet_4`  

---

## 1. Analisis & Pembahasan Bagian 6.3: Cara "Mencoba" Jobsheet Ini

### 1.1 Visualisasi Wireframe ke Tampilan Nyata Berbasis `style.css`

Dalam wireframe (`docs/wireframe.md`), semua komponen digambarkan dalam bentuk ASCII art. Jika diterjemahkan ke tampilan peramban (browser) menggunakan `assets/css/style.css` yang telah dibangun sejak Jobsheet 2 dan 3, rancangan tersebut bertransformasi menjadi:

1. **Kotak Pembatas (`+---+`) & Panel Section**:
   - Diimplementasikan dengan tag semantik `<main>` dan `<section>` / `<article>`.
   - Menggunakan warna latar putih (`background-color: #ffffff`), sudut melengkung halus (`border-radius: 8px`), garis tepi tipis (`border: 1px solid #e2e8f0`), serta efek bayangan lembut (`box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1)`).
2. **Header & Identitas Aplikasi**:
   - Tag `<header>` dengan warna latar biru utama (`#1d5b8a`), teks kontras putih (`#f8fafc`), serta tipografi modern `"Segoe UI", Arial, sans-serif`.
   - Mengadopsi navigasi fleksibel dengan hamburger menu (`nav-toggle` checkbox hack) untuk tampilan mobile (≤480px).
3. **Form Input (`[______________]`)**:
   - Menggunakan elemen `<input type="text">`, `<input type="password">`, dan `<select>`.
   - Berlebar responsif dengan batas maksimal (`max-width: 400px` di desktop, `100%` di mobile), padding nyaman (`0.55rem 0.7rem`), serta border fokus aksen biru (`outline: 2px solid #1d5b8a`).
4. **Tombol Aksi (`[ Masuk ]` / `[ Simpan ]`)**:
   - Elemen `<button type="submit">` dengan latar biru `#1d5b8a`, teks putih tebal sedang (`font-weight: 500`), sudut melengkung `4px`, dan efek transisi hover ke warna lebih gelap `#164869`.
5. **Kartu Statistik Ringkasan (`[Total Buku]`, dll.)**:
   - Elemen `<article>` dalam grid 3 kolom (`display: grid; grid-template-columns: repeat(3, 1fr)`).
   - Menampilkan label abu-abu halus (`#64748b`) dan angka metrik besar menonjol (`font-size: 1.8rem; font-weight: 700; color: #1d5b8a`).
6. **Tabel Data Transaksi & Riwayat**:
   - Elemen `<table>` dibungkus `<div class="table-responsive">` agar mendukung *horizontal scrolling* di layar kecil.
   - Kepala tabel (`thead`) berwarna biru gelap `#1d5b8a` dengan teks putih, baris belang selang-seling (`tbody tr:nth-child(even)`: `#f8fafc`), serta highlight baris saat disorot (`hover`: `#f1f5f9`).

---

### 1.2 Penelusuran Langkah demi Langkah User Flow Peminjaman Buku

User flow peminjaman buku:
```
[Petugas Login] -> [Dashboard] -> [Pilih menu "Peminjaman Baru"]
        -> [Pilih Anggota] -> [Pilih Buku (stok > 0)]
        -> [Simpan] -> [Stok buku berkurang 1] -> [Kembali ke Dashboard]
```

Berikut adalah analisis halaman dan interaksi di setiap tahapan kotak:

| No | Kotak Alur | Halaman yang Terbuka | Aksi Pengguna & Logika Sistem |
|---|---|---|---|
| 1 | `[Petugas Login]` | `login.html` | Petugas memasukkan kredensial (`username` & `password`). Fitur dilindungi otorisasi sehingga aktor Tamu tidak dapat mengakses. |
| 2 | `[Dashboard]` | `index.html` (Dashboard Petugas) | Setelah login berhasil, petugas diarahkan ke dashboard utama yang menampilkan metrik statistik perpustakaan dan tombol aksi cepat. |
| 3 | `[Pilih menu "Peminjaman Baru"]` | `peminjaman/tambah.html` | Petugas mengklik tombol aksi cepat `[ + Peminjaman Baru ]` atau menu navigasi "Peminjaman". Halaman formulir peminjaman terbuka. |
| 4 | `[Pilih Anggota]` | `peminjaman/tambah.html` | Petugas memilih nama/nomor anggota peminjam dari elemen `<select>` dropdown atau field pencarian autokomplit. |
| 5 | `[Pilih Buku (stok > 0)]` | `peminjaman/tambah.html` | **Aturan Bisnis Kritis**: Sistem hanya menampilkan buku yang memiliki `stok > 0`. Buku yang stoknya 0 otomatis disembunyikan atau di-disable agar tidak terjadi peminjaman fiktif. |
| 6 | `[Simpan]` | `peminjaman/tambah.html` | Petugas menekan tombol `<button type="submit">Simpan Peminjaman</button>`. Form dikirim ke server. |
| 7 | `[Stok buku berkurang 1]` | *(Proses Sistem / Backend)* | Sistem mencatat transaksi baru pada basis data, lalu menjalankan pembaruan: `UPDATE buku SET stok = stok - 1 WHERE id = ...`. |
| 8 | `[Kembali ke Dashboard]` | `index.html` (Dashboard Petugas) | Sistem mengarahkan kembali ke Dashboard dengan notifikasi pesan sukses (*flash alert*). Angka kartu "Sedang Dipinjam" bertambah 1 dan transaksi muncul di tabel transaksi terbaru. |

---

### 1.3 Perbandingan Navbar & Kartu Statistik: `index.html` vs Wireframe Dashboard Petugas

Tabel perbandingan antara `index.html` yang sudah berjalan (Jobsheet 3) dengan rancangan pada Wireframe Dashboard Petugas:

| Komponen | Status di `index.html` Saat Ini | Status di Wireframe Dashboard Petugas | Keterangan / Analisis Perubahan |
|---|---|---|---|
| **Brand Logo** | Ada (`SIMPUS-Mini`) | Ada (`SIMPUS-Mini`) | **Sama persis**; identitas aplikasi di sisi kiri atas header. |
| **Menu Beranda** | Ada (`Beranda`) | Ada (`Beranda`) | **Sama persis**; tautan kembali ke halaman utama. |
| **Menu Buku** | Ada (`Daftar Buku`, `Tambah Buku`) | Ada (`Buku`) | **Disederhanakan**; di wireframe disatukan menjadi menu `Buku` (bisa berupa dropdown atau halaman list dengan tombol tambah). |
| **Menu Anggota** | Ada (`Daftar Anggota`) | Ada (`Anggota`) | **Sama fungsi**; penamaan lebih ringkas. |
| **Menu Peminjaman** | **Belum Ada** | **Ada (`Peminjaman`)** | **BARU**; menu navigasi transaksi baru untuk mengelola peminjaman dan pengembalian. |
| **Profil Petugas & Logout** | **Belum Ada** | **Ada (`(Nama Petugas) Logout`)** | **BARU**; indikator identitas akun yang sedang login dan tombol keluar untuk keamanan sesi. |
| **Kartu [Total Buku]** | Ada (`12`) | Ada (`[Total Buku]`) | **Sama persis**; menampilkan jumlah judul/koleksi buku terdaftar. |
| **Kartu [Total Anggota]** | Ada (`8`) | Ada (`[Total Anggota]`) | **Sama persis**; menampilkan jumlah anggota aktif. |
| **Kartu [Sedang Dipinjam]** | Ada (`3`) | Ada (`[Sedang Dipinjam]`) | **Sama persis**; menampilkan transaksi peminjaman aktif. |
| **Aksi Cepat** | **Belum Ada** (ada sambutan teks statis) | **Ada (`[ + Peminjaman Baru ]`, `[ + Pengembalian ]`)** | **BARU**; pintasan interaktif agar petugas dapat langsung memproses transaksi tanpa repot membuka sub-menu. |
| **Tabel Transaksi Terbaru** | **Belum Ada** | **Ada (Tabel riwayat peminjaman terkini)** | **BARU**; tabel ringkasan aktivitas peminjaman terakhir yang langsung terlihat begitu login. |

---

## 2. Penyelesaian & Jawaban Bagian 6.4: Ide Latihan Tambahan

### 2.1 Latihan 1: Wireframe Halaman Baru "Registrasi Anggota Baru" (Konvensi ASCII)

Sesuai aturan konvensi simbol ASCII ([bab 2 §2.2](02-cara-membaca-wireframe.md)):
- `+---+` dan `|` = batas luar & pembatas section
- `[______________]` = kotak input teks/formulir
- `[ dropdown ... ]` = elemen pilihan dropdown
- `[  Teks  ]` = tombol aksi (*button*)

```text
+-------------------------------------------------------------+
|                         SIMPUS-Mini                         |
|-------------------------------------------------------------|
|                                                             |
|                 [ Registrasi Anggota Baru ]                 |
|   Lengkapi formulir di bawah ini untuk menjadi anggota      |
|                                                             |
|   Nomor Identitas (NIK/NISN) : [_________________________]  |
|   Nama Lengkap               : [_________________________]  |
|   Jenis Kelamin              : [ dropdown: L / P         ]  |
|   Alamat Lengkap             : [_________________________]  |
|   Nomor WhatsApp / HP        : [_________________________]  |
|   Alamat Email Aktif         : [_________________________]  |
|                                                             |
|                     [  Daftar Sekarang  ]                   |
|                                                             |
|   Sudah memiliki akun? Silakan [ Login di sini ]            |
|   <--- Kembali ke Katalog Beranda                           |
+-------------------------------------------------------------+
```

---

### 2.2 Latihan 2: User Flow "Petugas Mencari Anggota yang Tunggakannya Lewat Jatuh Tempo"

#### A. Diagram Alur (ASCII Flow)
```
[Petugas Login] -> [Dashboard] -> [Pilih menu "Peminjaman" / "Tunggakan"]
        -> [Filter Status: "Terlambat / Lewat Jatuh Tempo"]
        -> [Sistem Memfilter & Menampilkan Daftar Tunggakan Aktif]
        -> [Petugas Melihat Detail: Nama, Judul Buku, Tgl Pinjam, Hari Terlambat, Denda]
        -> <Aksi Petugas Terhadap Anggota>
             |
             +---> (Opsi A) [Klik "Kirim Peringatan"] -> [Sistem Kirim Notifikasi/Pesan WA]
             |
             +---> (Opsi B) [Klik "Proses Pengembalian"] 
             |            -> [Hitung Total Denda] -> [Konfirmasi Pembayaran Denda]
             |            -> [Tandai Selesai & Tambah Stok Buku +1]
             |
             +---> (Opsi C) [Tandai "Buku Hilang / Rusak"]
                          -> [Kenakan Biaya Penggantian Buku] -> [Update Status Selesai]
        -> [Kembali ke Daftar Tunggakan / Dashboard]
```

#### B. Aturan Bisnis (Business Rules) pada Alur Ini:
1. **Perhitungan Jatuh Tempo**: Jatuh tempo otomatis dihitung `tgl_pinjam + 7 hari`. Jika `tgl_sekarang > tgl_jatuh_tempo` dan buku belum kembali, maka status transaksi otomatis menjadi `Terlambat`.
2. **Akumulasi Denda**: Denda terhitung otomatis dengan rumus: `(hari_keterlambatan) * tarif_denda_per_hari` (misal Rp 1.000 / hari).
3. **Sanksi Sistem (Auto-Suspend)**: Anggota yang memiliki minimal 1 transaksi berstatus `Terlambat` otomatis terkunci di sistem sehingga **tidak dapat melakukan peminjaman baru** sampai buku dikembalikan dan denda lunas.

---

### 2.3 Latihan 3: Identifikasi Edge Case Tambahan

#### Edge Case Utama: Petugas Meminjamkan Buku yang Sama ke Anggota yang Sama Dua Kali Berturut-turut

- **Skenario Masalah**:
  Anggota A sudah meminjam buku "Laskar Pelangi" dan belum mengembalikannya. Beberapa hari kemudian, Petugas mencoba meminjamkan kembali 1 eksemplar buku "Laskar Pelangi" kepada Anggota A.
- **Dampak Buruk**:
  1. *Monopoli Koleksi*: Koleksi buku yang diminati anggota lain tertahan pada satu orang.
  2. *Ambiguitas Pengembalian*: Saat Anggota A mengembalikan 1 buku, petugas rawan salah mencatat transaksi mana yang lunas dan mana yang masih tertunggak, menimbulkan selisih denda.
- **Aturan Bisnis (Business Rule)**:
  > **Aturan 1 Buku per Judul**: Setiap anggota dilarang meminjam lebih dari 1 eksemplar dengan judul/ISBN yang sama dalam periode peminjaman yang bersamaan.
- **Solusi Desain UI & Validasi Sistem**:
  1. **Pada Form Peminjaman (UI)**: Ketika Petugas memilih Anggota A, dropdown buku otomatis memfilter dan **menonaktifkan (disable) judul-judul buku yang sedang aktif dipinjam oleh Anggota A**.
  2. **Pada Validasi Backend**: Query pengecekan:
     ```sql
     SELECT COUNT(*) FROM peminjaman 
     WHERE id_anggota = :id_anggota 
       AND id_buku = :id_buku 
       AND status = 'Dipinjam';
     ```
     Jika hasilnya `> 0`, sistem menolak penyimpanan dan menampilkan pesan galat:
     > *"Gagal menyimpan: Anggota masih memiliki peminjaman aktif untuk buku ini. Harap lakukan pengembalian terlebih dahulu."*

#### Edge Case Penting Lainnya yang Berhasil Diidentifikasi:
1. **Kuota Maksimal Peminjaman Terlampaui (*Borrowing Limit Exceeded*)**:
   - Jika batas kuota peminjaman adalah 3 buku, anggota yang sudah meminjam 3 buku tidak diperkenankan menambah pinjaman baru.
2. **Buku Rusak atau Cacat Saat Dikembalikan (*Damaged Book Condition*)**:
   - Petugas memerlukan opsi checklist kondisi buku saat pengembalian (Baik / Rusak / Hilang) untuk menetapkan denda ganti rugi fisik buku.
3. **Pengembalian Tertukar (*Mismatched Book ID*)**:
   - Terjadi ketika anggota mengembalikan judul buku yang sama namun bukan nomor barcode/inventaris yang tercatat saat ia pinjam. Sistem harus memvalidasi ID fisik buku.
4. **Pembatalan Transaksi Sesaat Setelah Disimpan (*Immediate Cancellation*)**:
   - Petugas salah memilih anggota saat klik Simpan. Harus ada fitur pembatalan dalam toleransi waktu singkat tanpa merusak integritas riwayat dan stok.

---

### 2.4 Latihan 4: Implementasi Nyata Wireframe Login ke HTML Statis

Wireframe login pada `docs/wireframe.md` telah berhasil diimplementasikan secara konkret menjadi dokumen HTML statis pada file [`login.html`](login.html) dan file registrasi pada [`registrasi.html`](registrasi.html).

#### Cuplikan Implementasi Semantik pada `login.html`:
```html
<main class="auth-wrapper">
    <section>
        <div class="auth-header">
            <h2>Login Petugas</h2>
            <p>Silakan masukkan kredensial untuk mengakses sistem</p>
        </div>

        <form action="index.html" method="get">
            <p>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required autofocus>
            </p>
            <p>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </p>
            <p style="margin-top: 1.5rem;">
                <button type="submit" class="btn-block">Masuk</button>
            </p>
        </form>

        <div class="auth-footer">
            <p>Belum punya akun? <a href="registrasi.html">Daftar di sini</a></p>
        </div>
    </section>
</main>
```

#### Keunggulan Implementasi Ini:
1. **Pola Form Semantik `<label>` + `<input>`**: Memenuhi standar aksesibilitas dan kemudahan navigasi kursor (klik label langsung mengaktifkan input).
2. **Elemen `<input type="password">`**: Karakter password disamarkan otomatis oleh browser dengan titik (*bullets*) demi privasi.
3. **Konsisten dengan `style.css`**: Sepenuhnya menggunakan style tema warna `#1d5b8a`, radius `8px`, box-shadow, dan responsif di layar mobile maupun desktop tanpa perlu framework eksternal.
4. **Tersambung ke Halaman Registrasi**: Tautan "Daftar di sini" mengarah langsung ke [`registrasi.html`](registrasi.html) yang merealisasikan wireframe Tamu dari Latihan 1.
