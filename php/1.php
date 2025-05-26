<?php
date_default_timezone_set('Asia/Jakarta');
$jam = date("H");

if ($jam >= 5 && $jam < 12) { $salam = "Selamat Pagi"; }
elseif ($jam >= 12 && $jam < 18) { $salam = "Selamat Siang"; }
elseif ($jam >= 18 && $jam < 21) { $salam = "Selamat Sore"; }
else { $salam = "Selamat Malam"; }

$koneksi = new mysqli("localhost", "root", "", "tokodb");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

$sql = "SELECT nama_produk, harga FROM produk";
$result = $koneksi->query($sql);

$keranjang = [
    ["nama" => "Buku Tulis", "jumlah" => 2, "harga" => 5000],
    ["nama" => "Pulpen", "jumlah" => 3, "harga" => 3000]
];

$total = 0;
foreach ($keranjang as $item) {
    $total += $item["jumlah"] * $item["harga"];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Salam & Produk</title>
</head>
<body>
    <h1><?= $salam; ?>, Mahasiswa!</h1>

    <h2>Produk Kami</h2>
    <ul>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <li><?= $row['nama_produk']; ?> - Rp<?= number_format($row['harga'], 0, ',', '.'); ?></li>
            <?php endwhile; ?>
        <?php else: ?>
            <li>Tidak ada produk</li>
        <?php endif; ?>
    </ul>

    <h2>Ringkasan Belanja</h2>
    <ul>
        <?php foreach ($keranjang as $item): ?>
            <li><?= $item['jumlah']; ?> x <?= $item['nama']; ?> @ Rp<?= number_format($item['harga'], 0, ',', '.'); ?></li>
        <?php endforeach; ?>
    </ul>
    <p><strong>Total Belanja: Rp<?= number_format($total, 0, ',', '.'); ?></strong></p>
</body>
</html>
