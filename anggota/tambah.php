<?php
$page_title = "Tambah Anggota";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>
        <section>
            <h2>Tambah Anggota Baru</h2>

            <?php if ($flash): ?>
                <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['pesan']; ?></p>
            <?php endif; ?>

            <form action="proses_tambah.php" method="post">
                <div>
                    <label for="no_anggota">Nomor Anggota</label>
                    <input type="text" id="no_anggota" name="no_anggota" required>
                </div>
                <div>
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" required>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <button type="submit">Simpan Anggota</button>
            </form>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>