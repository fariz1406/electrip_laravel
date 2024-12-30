<?php

include 'actions/session.php';

include("service/database.php");

$id = htmlspecialchars($_GET['id']);

$queryKendaraan = mysqli_query($con, "SELECT * FROM kendaraan WHERE id = '$id' ");
$kendaraan = mysqli_fetch_array($queryKendaraan);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pemesanan Mobil</title>
  <link rel="stylesheet" href="styles/pemesanan_mobil.css" />
</head>

<body>

  <div class="wrap">
    <ul>
      <li><a href="pilihanmobil.php">Mobil</a></li>
      <li><a href="pilihanmotor.php">Motor</a></li>
    </ul>
  </div>

  <hr />

  <div class="container">
    <div class="wrapper2">
      <div class="image-box">
        <img src="images/foto/<?php echo $kendaraan['foto'];  ?>" />
      </div>
      <div class="text-box">
        <div class="wrapper-text-box">
          <h1><?php echo $kendaraan['nama']; ?></h1>
          <h3>tahun : <?php echo $kendaraan['tahun']; ?></h3>
          <h3 class="status">Status : <strong><?php echo $kendaraan['status']; ?></strong></h3>
          <h3>Rp. <?php echo $kendaraan['harga']; ?> / 24 jam</h3>
        </div>
      </div>
      <div class="button-wrapper">
        <a href="pilihanmobil.php" class="text-decoration">
          <button class="btn batal">BATAL</button></a>
        <a href="checkout.php?id=<?php echo $id ?>"><button class="btn beli">PESAN</button></a>
      </div>
    </div>
    <div class="Deskripsi">
      <h3>Deskripsi</h3>
      <p><?php echo $kendaraan['deskripsi']; ?><span>Lihat Selengkapnya.....</span></p>
    </div>
  </div>
</body>

</html>