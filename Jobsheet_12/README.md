# Jobsheet 12 — Integrasi Modul Peminjaman

**Sub-CPMK:** Mengintegrasikan front-end dan back-end proyek secara utuh.

## Perubahan dari Jobsheet 11
- Tambah `sql/03_peminjaman.sql` — tabel peminjaman (relasi ke buku dan anggota), melengkapi ERD yang sudah dirancang di Jobsheet 8.
- Tambah modul Peminjaman (menghubungkan seluruh entitas yang sudah dibangun sejak Jobsheet 8-10 sekaligus):
  - `peminjaman/tambah.php` + `proses_tambah.php`: pilih anggota + buku (dropdown hanya stok > 0), simpan transaksi dan kurangi stok buku dalam satu transaction (`beginTransaction` / `commit` / `rollBack`) dengan `SELECT ... FOR UPDATE` untuk mencegah race condition stok.
  - `peminjaman/kembali.php` + `proses_kembali.php`: daftar transaksi aktif (`status = 'dipinjam'`), tombol Kembalikan menambah kembali stok buku dalam transaction serupa.
  - `peminjaman/riwayat.php`: histori peminjaman per anggota (`JOIN` peminjaman + buku).
- `includes/header.php`: navbar menambahkan menu Peminjaman Baru, Pengembalian, Riwayat (hanya saat login).
- `index.php`: kartu "Sedang Dipinjam" kini `COUNT(*) FROM peminjaman WHERE status = 'dipinjam'` (sebelumnya statis 0).

## Cara Menjalankan
Jalankan skema database:
```bash
psql -d simpus_mini -f sql/03_peminjaman.sql
```
Atau akses `setup.php` untuk instalasi/verifikasi tabel secara otomatis.

**Opsi 1 — PHP built-in server:**
```bash
php -S localhost:8000
```

**Opsi 2 — Laragon (Apache):**
Akses lewat browser di: `http://localhost/Dasweb2026/Jobsheet_12/`.

## Pengujian End-to-End yang Disarankan
1. Registrasi petugas &rarr; Login.
2. Tambah Buku (kalau belum ada) & Tambah Anggota (kalau belum ada).
3. Klik **Peminjaman Baru**, pilih anggota dan buku, simpan &rarr; cek Daftar Buku, amati stok buku itu berkurang 1.
4. Kembali ke Beranda, amati kartu "Sedang Dipinjam" bertambah.
5. Klik **Pengembalian**, cari transaksi yang baru dibuat, klik "Kembalikan" &rarr; cek stok buku bertambah kembali, dan transaksi hilang dari daftar aktif.
6. Klik **Riwayat**, pilih anggota yang sama &rarr; transaksi tadi muncul, berstatus "Selesai".
7. Logout, coba akses `/peminjaman/tambah.php` langsung &rarr; amati diarahkan ke Login.

## Catatan
- Operasi stok memakai `SELECT ... FOR UPDATE` di dalam transaction, bukan sekadar `UPDATE buku SET stok = stok - 1` tanpa pengecekan, agar stok tidak bisa menjadi negatif bila dua peminjaman diproses hampir bersamaan.
