<?php
require __DIR__ . '/../includes/auth.php';
$page_title = "Daftar Peminjaman";
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$sql = "SELECT p.*, b.judul, a.nama AS nama_anggota 
        FROM peminjaman p
        JOIN buku b ON p.buku_id = b.id
        JOIN anggota a ON p.anggota_id = a.id
        ORDER BY p.id DESC";
$listPinjam = $pdo->query($sql)->fetchAll();
?>

<!-- Style khusus badge & tombol aksi -->
<style>
    /* Desain Badge Status */
    .badge {
        display: inline-block;
        padding: 0.35rem 0.8rem;
        border-radius: 20px;
        font-size: 0.82rem;
        font-weight: 600;
        text-align: center;
        letter-spacing: 0.3px;
    }
    .badge-dipinjam {
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeeba;
    }
    .badge-kembali {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    
    .btn-kembali {
        background-color: #8d8e8fff !important;
        color: #ffffff !important;
        border: none;
        padding: 0.4rem 0.9rem;
        border-radius: 5px;
        font-weight: 500;
        cursor: pointer;
        transition: 0.2s;
    }
    .btn-kembali:hover {
        background-color: #218838 !important;
    }
    
    .btn-tambah-pinjam {
        display: inline-block;
        background-color: #1d5b8a;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 4px;
        margin-bottom: 1rem;
        text-decoration: none;
        font-weight: 500;
    }
    .btn-tambah-pinjam:hover {
        background-color: #164869;
        text-decoration: none;
    }
</style>

<section>
    <h2>Data Peminjaman Buku</h2>

    <?php if ($flash): ?>
        <p class="flash flash-<?= $flash['type']; ?>"><?= $flash['pesan']; ?></p>
    <?php endif; ?>

    <a href="tambah.php" class="btn-tambah-pinjam">+ Tambah Peminjaman Baru</a>

    <div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>Judul Buku</th>
                <th>Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($listPinjam)): ?>
            <tr><td colspan="5">Belum ada transaksi peminjaman.</td></tr>
            <?php else: ?>
                <?php foreach ($listPinjam as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row['judul']); ?></td>
                    <td><?= htmlspecialchars($row['nama_anggota']); ?></td>
                    <td><?= $row['tanggal_pinjam']; ?></td>
                    <td>
                        <?php if ($row['status'] === 'dipinjam'): ?>
                            <span class="badge badge-dipinjam"> Dipinjam</span>
                        <?php else: ?>
                            <span class="badge badge-kembali"> Sudah Kembali</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($row['status'] === 'dipinjam'): ?>
                            <form method="post" action="kembalikan.php" onsubmit="return confirm('Kembalikan buku ini? Stok buku akan bertambah 1.');" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                <input type="hidden" name="buku_id" value="<?= $row['buku_id']; ?>">
                                <button type="submit" class="btn-kembali">Kembalikan</button>
                            </form>
                        <?php else: ?>
                            <span style="color: #999; font-size: 0.85rem;">Selesai</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    </div>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
