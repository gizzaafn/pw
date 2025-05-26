<?php
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
<head><title>Ringkasan Belanja</title></head>
<body>
    <h2>Ringkasan Belanja</h2>
    <ul>
        <?php foreach ($keranjang as $item): ?>
            <li><?= $item['jumlah']; ?> x <?= $item['nama']; ?> @ Rp<?= number_format($item['harga'], 0, ',', '.'); ?></li>
        <?php endforeach; ?>
    </ul>
    <p><strong>Total Belanja: Rp<?= number_format($total, 0, ',', '.'); ?></strong></p>
</body>
</html>
