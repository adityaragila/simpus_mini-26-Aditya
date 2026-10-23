<?php
require __DIR__ . '/../includes/auth.php';
$page_title = "Pinjam Buku";
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';


$bukuList = $pdo->query("SELECT id, judul, stok FROM buku WHERE stok > 0 ORDER BY judul ASC")->fetchAll();


$anggotaList = $pdo->query("SELECT id, nama, no_anggota FROM anggota ORDER BY nama ASC")->fetchAll();

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>
<style>
    .btn-batal {
        display: inline-block;
        background-color: #9c2e10ff;
        color: #ffffff !important;
        padding: 0.6rem 1.4rem;
        border-radius: 4px;
        text-decoration: none !important;
        font-size: 1rem;
        margin-left: 0.5rem;
        vertical-align: middle;
        transition: 0.2s;
    }
    .btn-batal:hover {
        background-color: #5a6268;
    }
</style>

<section>
    <h2>Transaksi Peminjaman Buku</h2>

    <?php if ($flash): ?>
        <p class="flash flash-<?= $flash['type']; ?>"><?= $flash['pesan']; ?></p>
    <?php endif; ?>

    <form method="post" action="proses_tambah.php">
        <div>
            <label for="buku_id">Pilih Buku (Hanya yang ada stok):</label><br>
            <select name="buku_id" id="buku_id" required>
                <option value="">-- Pilih Buku --</option>
                <?php foreach ($bukuList as $b): ?>
                    <option value="<?= $b['id']; ?>"><?= htmlspecialchars($b['judul']); ?> (Sisa Stok: <?= $b['stok']; ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>
        <div>
            <label for="anggota_id">Pilih Anggota Peminjam:</label><br>
            <select name="anggota_id" id="anggota_id" required>
                <option value="">-- Pilih Anggota --</option>
                <?php foreach ($anggotaList as $a): ?>
                    <option value="<?= $a['id']; ?>"><?= htmlspecialchars($a['nama']); ?> - <?= $a['no_anggota']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <br>
        <button type="submit">Simpan Peminjaman</button>
        <a href="list.php" class="btn-batal">Batal</a>

    </form>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
