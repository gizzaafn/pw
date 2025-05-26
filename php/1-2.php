<?php
$koneksi = new mysqli("localhost", "root", "", "tokodb");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$sql = "SELECT nama_produk, harga FROM produk";
$result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html>
<head><title>Daftar Produk</title></head>
<body>
    <h2>Produk Kami</h2>
    <ul>
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <li><?= $row['nama_produk']; ?> - Rp<?= number_format($row['harga'], 0, ',', '.'); ?></li>
        <?php endwhile; ?>
    <?php else: ?>
        <li>Produk tidak ditemukan</li>
    <?php endif; ?>
    </ul>
</body>
</html>
