<?php
require __DIR__ . '/../includes/auth.php';
require __DIR__ . '/../includes/koneksi.php';

$bukuId = (int) ($_POST['buku_id'] ?? 0);
$anggotaId = (int) ($_POST['anggota_id'] ?? 0);

if (!$bukuId || !$anggotaId) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Buku dan Anggota wajib dipilih.'];
    header('Location: tambah.php');
    exit;
}


$stmt = $pdo->prepare("SELECT stok FROM buku WHERE id = :id");
$stmt->execute(['id' => $bukuId]);
$buku = $stmt->fetch();

if (!$buku || $buku['stok'] <= 0) {
    $_SESSION['flash'] = ['type' => 'error', 'pesan' => 'Stok buku ini sudah habis!'];
    header('Location: tambah.php');
    exit;
}


$insert = $pdo->prepare("INSERT INTO peminjaman (buku_id, anggota_id) VALUES (:buku_id, :anggota_id)");
$insert->execute(['buku_id' => $bukuId, 'anggota_id' => $anggotaId]);

$update = $pdo->prepare("UPDATE buku SET stok = stok - 1 WHERE id = :id");
$update->execute(['id' => $bukuId]);

$_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Peminjaman berhasil dicatat & stok buku berkurang 1.'];
header('Location: list.php');
exit;
