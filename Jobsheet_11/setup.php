<?php
require __DIR__ . '/includes/koneksi.php';

try {
    $sql1 = file_get_contents(__DIR__ . '/sql/01_buku_anggota.sql');
    $pdo->exec($sql1);
    echo "Tabel buku dan anggota berhasil dibuat / diperiksa.<br>";

    $sql2 = file_get_contents(__DIR__ . '/sql/02_users.sql');
    $pdo->exec($sql2);
    echo "Tabel users berhasil dibuat / diperiksa.<br>";

    echo "Setup Jobsheet 11 selesai!";
} catch (PDOException $e) {
    die("Setup gagal: " . $e->getMessage());
}
