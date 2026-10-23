<?php
require __DIR__ . '/../includes/auth.php';
require __DIR__ . '/../includes/koneksi.php';

$id = (int) ($_POST['id'] ?? 0);
$bukuId = (int) ($_POST['buku_id'] ?? 0);

if ($id && $bukuId) {
    
    $stmt = $pdo->prepare("UPDATE peminjaman SET status = 'kembali' WHERE id = :id");
    $stmt->execute(['id' => $id]);

    
    $update = $pdo->prepare("UPDATE buku SET stok = stok + 1 WHERE id = :buku_id");
    $update->execute(['buku_id' => $bukuId]);

    $_SESSION['flash'] = ['type' => 'success', 'pesan' => 'Buku berhasil dikembalikan dan stok bertambah.'];
}

header('Location: list.php');
exit;
