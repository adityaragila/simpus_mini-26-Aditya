<?php
$page_title = "Beranda";
include __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/koneksi.php';

$totalBuku = $totalAnggota = $totalDipinjam = '-';

if ($pdo) {
    try {
        $row = $pdo->query("
            SELECT
              (SELECT COUNT(*) FROM buku) AS buku,
              (SELECT COUNT(*) FROM anggota) AS anggota,
              (SELECT COUNT(*) FROM peminjaman WHERE status = 'dipinjam') AS dipinjam
        ")->fetch();
        $totalBuku     = $row['buku'];
        $totalAnggota  = $row['anggota'];
        $totalDipinjam = $row['dipinjam'];
    } catch (PDOException $e) {
        error_log('Query gagal: ' . $e->getMessage());
        $db_error = $e->getMessage();
    }
}
?>
<?php if ($db_error): ?>
    <p><strong>Peringatan:</strong> database belum terhubung.</p>
<?php endif; ?>
        <section>
            <h2>Selamat Datang di Sistem Perpustakaan Mini</h2>
            <p>Aplikasi sederhana untuk mengelola data buku dan anggota perpustakaan.</p>
        </section>

        <section>
            <h2>Ringkasan</h2>
            <article>
                <h3>Total Buku</h3>
                <p><?php echo $totalBuku; ?></p>
            </article>
            <article>
                <h3>Total Anggota</h3>
                <p><?php echo $totalAnggota; ?></p>
            </article>
            <article>
                <h3>Sedang Dipinjam</h3>
                <p><?php echo $totalDipinjam; ?></p>
            </article>
        </section>
<?php include __DIR__ . '/includes/footer.php'; ?>
