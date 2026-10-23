# Jobsheet 11 — Keamanan Web Dasar

**Sub-CPMK:** Menerapkan prinsip keamanan web dasar.

## Perubahan dari Jobsheet 10
- Tambah `includes/helpers.php` (`e()` untuk `htmlspecialchars`) dan `includes/csrf.php` (`csrf_token()`, `csrf_field()`, `csrf_verify()`), keduanya di-`require_once` dari `includes/header.php`.
- **XSS**: seluruh output data dari database/`$_GET` (judul, pengarang, nama, alamat, no_hp, nilai pencarian, nama petugas di navbar) dibungkus `e()`.
- **CSRF**: token tersembunyi ditambahkan ke semua form POST (Tambah/Edit/Hapus Buku & Anggota, Login, Register); setiap `proses_*.php` dan `hapus.php` memanggil `csrf_verify()` sebelum menyentuh database.
- **Session fixation**: `session_regenerate_id(true)` dipanggil di `auth/proses_login.php` setelah login berhasil.
- **SQL Injection**: diaudit ulang (tidak ada perubahan kode — sejak Jobsheet 8 semua query sudah prepared statement).
- Tambah `docs/security-checklist.md` — dokumen audit lengkap dengan bukti before/after per kerentanan.

## Cara Menjalankan
**Opsi 1 — PHP built-in server:**
```bash
php -S localhost:8000
```

**Opsi 2 — Laragon (Apache):**
Akses lewat browser di: `http://localhost/Dasweb2026/Jobsheet_11/`.

## Cara Menguji
1. **CSRF**: login, lalu coba kirim `curl -X POST http://localhost:8000/buku/proses_tambah.php -d "judul=x"` tanpa `csrf_token` &rarr; harus mendapat HTTP 403.
2. **XSS**: tambah buku dengan judul `<script>alert(1)</script>` &rarr; di Daftar Buku harus tampil sebagai teks, bukan pop-up.
3. **Guard order**: akses `proses_tambah.php` lewat POST tanpa login sama sekali &rarr; tetap redirect ke Login (guard `auth.php` jalan lebih dulu daripada `csrf_verify()`).
4. **SQL Injection**: coba login dengan username `' OR '1'='1` dan password sembarang &rarr; muncul pesan "Username atau password salah".
