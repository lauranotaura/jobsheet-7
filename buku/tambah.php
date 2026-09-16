<?php
$page_title = "Tambah Buku";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>
        <section>
            <h2>Tambah Buku Baru</h2>

            <?php if ($flash): ?>
                <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['pesan']; ?></p>
            <?php endif; ?>

            <form action="proses_tambah.php" method="post">
                <div>
                    <label for="judul">Judul Buku</label>
                    <input type="text" id="judul" name="judul" required>
                </div>
                <div>
                    <label for="pengarang">Pengarang</label>
                    <input type="text" id="pengarang" name="pengarang" required>
                </div>
                <div>
                    <label for="tahun">Tahun Terbit</label>
                    <input type="number" id="tahun" name="tahun" required>
                </div>
                <div>
                    <label for="stok">Jumlah Stok</label>
                    <input type="number" id="stok" name="stok" required>
                </div>
                <button type="submit">Simpan Buku</button>
            </form>
        </section>
<?php include __DIR__ . '/../includes/footer.php'; ?>