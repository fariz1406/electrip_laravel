<?php

include 'actions/session.php';

include 'service/database.php';

$query = mysqli_query($con, "SELECT * FROM pemesanan p JOIN kendaraan k ON p.kendaraan_id = k.id WHERE p.pengguna_id = $_SESSION[id] AND p.status = 'diproses' ");

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesanan saya</title>
  <link rel="stylesheet" href="styles/pesanan.css">
</head>

<body>
  <?php include 'includes/navbar.php'; ?>
  <?php include "includes/sidebar.php" ?>


  <div class="container">

    <div class="pilihan">
        <ul>
          <a href="pesanan.php"><li><h2>belum dibayar</h2></li></a>
          <a href="pesanan-diproses.php"><li><h2 class="disini">di proses</h2></li></a>
          <a href="pesanan-dikirim.php"><li><h2>di kirim</h2></li></a>
          <a href="pesanan-dipakai.php"><li><h2>di pakai</h2></li></a>
          <a href="pesanan-selesai.php"><li><h2>Riwayat</h2></li></a>
        </ul>
    </div>

    <hr>

<?php while ($data = mysqli_fetch_array($query)) { ?>

    <div class="card">
      <div class="image-box">
        <img src="images/foto/<?php echo $data ['foto'] ?>">
      </div>
      <div class="text">
        <h2>Merk : <?php echo $data ['nama'] ?></h2>
        <h3>Biaya : RP. <?php echo $data ['biaya'] ?></h3>

        <hr class="garis">

        <h3 class="alamat" >Di Jemput atau Diantar Ke : <?php echo $data ['lokasi'] ?></h3>
        <h4>Estimasi waktu Pengambilan atau Pengiriman : <?php echo $data ['waktu'] ?></h4>

      </div>
    </div>

<?php } ?>

  </div>

<?php

?>
</body>
</html>