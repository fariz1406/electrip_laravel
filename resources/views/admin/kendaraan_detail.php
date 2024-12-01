<?php

include "../service/database.php";

$id = htmlspecialchars($_GET['id']);

$queryKendaraan = mysqli_query($con, "SELECT * FROM kendaraan k JOIN penyedia p ON k.penyedia_id = p.id WHERE k.id = '$id' ");
$data = mysqli_fetch_array($queryKendaraan);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Kendaraan Anda</title>
  <link rel="stylesheet" href="styles/kendaraan_detail.css" />
</head>

<body>
<?php include '../includes/sidebar_admin.php' ?>

  <div class="main-content">
    <div class="posisi-gambar">
  <p class="product-description">Foto Kendaraan : </p>
  <div class="product-image"><img src="../images/foto/<?php echo $data['foto'] ?>"></div>
  <p class="product-description">Foto STNK : </p>
  <div class="stnk-image"><img src="../images/stnk/<?php echo $data['stnk'] ?>"></div>
    </div>
        <div class="product-details">
            <h1 class="product-name"><?php echo $data['nama'] ?></h1>
            <p class="product-price">Rp <?php echo number_format($data['harga'], 0, ',', '.') ?></p>
            <p class="product-description">Penyedia : <?php echo $data['nama_penyedia'] ?></p>
            <p class="product-description">Status : <?php echo $data['status'] ?></p>
            <p class="product-description">Tahun : <?php echo $data['tahun'] ?></p>
            <p class="product-description">Informasi tambahan : <?php echo $data['informasi_tambahan'] ?></p>
        </div>

  </div>

  <?php

  if (isset($_POST['hapus'])) {
    $queryHapusKendaraan = mysqli_query($con, "DELETE FROM kendaraan WHERE `kendaraan`.`id` = '$id' ");

    if ($queryHapusKendaraan) {
      ?>
        <div class="pesan-peringatan">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          <strong>Selamat!</strong> Data berhasil Tersimpan.
        </div>

        <meta http-equiv="refresh" content="3; url=data_kendaraan.php" />
  <?php
    } else {
      echo "yahh gagal";
    }
  }
  ?>

</body>

</html>