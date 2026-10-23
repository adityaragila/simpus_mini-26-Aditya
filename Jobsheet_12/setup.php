<?php
require __DIR__ . '/includes/koneksi.php';

try {
    $sql1 = file_get_contents(__DIR__ . '/sql/01_buku_anggota.sql');
    $pdo->exec($sql1);
    echo "Tabel buku dan anggota berhasil dibuat / diverifikasi.<br>";

    $sql2 = file_get_contents(__DIR__ . '/sql/02_users.sql');
    $pdo->exec($sql2);
    echo "Tabel users berhasil dibuat / diverifikasi.<br>";

    $sql3 = file_get_contents(__DIR__ . '/sql/03_peminjaman.sql');
    $pdo->exec($sql3);
    echo "Tabel peminjaman berhasil dibuat / diverifikasi.<br>";

    echo "<strong>Setup Jobsheet 12 selesai dan berhasil!</strong>";
} catch (PDOException $e) {
    die("Setup gagal: " . $e->getMessage());
}
