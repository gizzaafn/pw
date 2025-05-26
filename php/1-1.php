<?php
date_default_timezone_set('Asia/Jakarta');
$jam = date("H");
if ($jam >= 5 && $jam < 12) { $salam = "Selamat Pagi"; }
elseif ($jam >= 12 && $jam < 18) { $salam = "Selamat Siang"; }
elseif ($jam >= 18 && $jam < 21) { $salam = "Selamat Sore"; }
else { $salam = "Selamat Malam"; }
?>

<!DOCTYPE html>
<html>
<head><title>Salam Dinamis</title></head>
<body>
    <h1> <?php echo $salam; ?>, Mahasiswa!</h1>
</body>
</html>
