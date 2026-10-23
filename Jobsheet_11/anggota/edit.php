<?php
require __DIR__ . '/../includes/auth.php';
$page_title = "Edit Anggota";
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$id = (int) ($_GET['id'] ?? 0);
if (!$id) {
    header('Location: list.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM anggota WHERE id = :id");
$stmt->execute(['id' => $id]);
$anggota = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$anggota) {
    header('Location: list.php');
    exit;
}
?>
        <section>
            <h2>Edit Anggota</h2>

            <?php if ($flash): ?>
                <p class="flash flash-<?php echo e($flash['type']); ?>"><?php echo e($flash['pesan']); ?></p>
            <?php endif; ?>

            <form id="form-tambah" method="post" action="proses_edit.php">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo (int) $anggota['id']; ?>">
                <p>
                    <label for="nama">Nama</label><br>
                    <input type="text" id="nama" name="nama" value="<?php echo e($anggota['nama']); ?>" required>
                </p>
                <p>
                    <label>Jenis Kelamin</label>
                    <span style="display: flex; gap: 1.5rem; margin-top: 0.4rem;">
                        <label style="display: flex; align-items: center; gap: 0.4rem; font-weight: normal; cursor: pointer;">
                            <input type="radio" name="jenis_kelamin" value="Laki-laki" style="width: auto; margin: 0;"
                                <?php echo ($anggota['jenis_kelamin'] ?? '') === 'Laki-laki' ? 'checked' : ''; ?> required> Laki-laki
                        </label>
                        <label style="display: flex; align-items: center; gap: 0.4rem; font-weight: normal; cursor: pointer;">
                            <input type="radio" name="jenis_kelamin" value="Perempuan" style="width: auto; margin: 0;"
                                <?php echo ($anggota['jenis_kelamin'] ?? '') === 'Perempuan' ? 'checked' : ''; ?> required> Perempuan
                        </label>
                    </span>
                </p>

                <p>
                    <label for="no_anggota">No. Anggota</label><br>
                    <input type="text" id="no_anggota" name="no_anggota" value="<?php echo e($anggota['no_anggota']); ?>" required>
                </p>
                <p>
                    <label for="alamat">Alamat</label><br>
                    <input type="text" id="alamat" name="alamat" value="<?php echo e($anggota['alamat'] ?? ''); ?>">
                </p>
                <p>
                    <label for="no_hp">No. HP</label><br>
                    <input type="text" id="no_hp" name="no_hp" value="<?php echo e($anggota['no_hp'] ?? ''); ?>">
                </p>
                <p>
                    <button type="submit">Update</button>
                </p>
            </form>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
