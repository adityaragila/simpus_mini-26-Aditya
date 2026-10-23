<?php
require __DIR__ . '/../includes/auth.php';
$page_title = "Tambah Anggota";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>
        <section>
            <h2>Tambah Anggota</h2>

            <?php if ($flash): ?>
                <p class="flash flash-<?php echo e($flash['type']); ?>"><?php echo e($flash['pesan']); ?></p>
            <?php endif; ?>

            <form id="form-tambah" method="post" action="proses_tambah.php">
                <?php echo csrf_field(); ?>
                <p>
                    <label for="nama">Nama</label><br>
                    <input type="text" id="nama" name="nama" required>
                </p>
                <p>
                    <label for="no_anggota">No. Anggota</label><br>
                    <input type="text" id="no_anggota" name="no_anggota" required>
                </p>
                <p>
                    <label>Jenis Kelamin</label>
                    <span style="display: flex; gap: 1.5rem; margin-top: 0.4rem;">
                        <label style="display: flex; align-items: center; gap: 0.4rem; font-weight: normal; cursor: pointer;">
                            <input type="radio" name="jenis_kelamin" value="Laki-laki" style="width: auto; margin: 0;" required> Laki-laki
                        </label>
                        <label style="display: flex; align-items: center; gap: 0.4rem; font-weight: normal; cursor: pointer;">
                            <input type="radio" name="jenis_kelamin" value="Perempuan" style="width: auto; margin: 0;" required> Perempuan
                        </label>
                    </span>
                </p>
                <p>
                    <label for="alamat">Alamat</label><br>
                    <input type="text" id="alamat" name="alamat">
                </p>
                <p>
                    <label for="no_hp">No. HP</label><br>
                    <input type="text" id="no_hp" name="no_hp">
                </p>
                <p>
                    <button type="submit">Simpan</button>
                </p>
            </form>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
