<?php

include 'actions/session.php';

include 'service/database.php';
include 'includes/popup.html';

$queryPemesanan = mysqli_query($con, "SELECT * FROM pemesanan p JOIN kendaraan k ON p.kendaraan_id = k.id 
JOIN pemesanan_dipakai d ON p.id = d.pemesanan_id WHERE p.pengguna_id = $_SESSION[id] AND p.status = 'dipakai' ");
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

  <form action="pesanan-dipakai.php" method="POST">
    <div class="container">

      <div class="pilihan">
        <ul>
          <a href="pesanan.php">
            <li>
              <h2>belum dibayar</h2>
            </li>
          </a>
          <a href="pesanan-diproses.php">
            <li>
              <h2>di proses</h2>
            </li>
          </a>
          <a href="pesanan-dikirim.php">
            <li>
              <h2>di kirim</h2>
            </li>
          </a>
          <a href="pesanan-dipakai.php">
            <li>
              <h2 class="disini">di pakai</h2>
            </li>
          </a>
          <a href="pesanan-selesai.php">
            <li>
              <h2>Riwayat</h2>
            </li>
          </a>
        </ul>
      </div>

      <hr>

      <?php while ($dataPemesanan = mysqli_fetch_array($queryPemesanan)) { ?>

        <div class="card">
          <div class="image-box">
            <img src="images/foto/<?php echo $dataPemesanan['foto'] ?>">
          </div>
          <div class="text">
            <?php
            $idPemesanan = $dataPemesanan['pemesanan_id'];
            $idKendaraan = $dataPemesanan['kendaraan_id'];
            $hargaAwal = $dataPemesanan['biaya'];
            $hargaBaru = $dataPemesanan['harga_baru'];
            $tanggalSelesaiBaru = $dataPemesanan['tanggal_selesai_baru'];
            ?>
            <h2>Merk : <?php echo $dataPemesanan['nama'] ?></h2>
            <h3>Biaya : RP. <?php echo $dataPemesanan['harga_baru'] ?></h3>

            <hr class="garis">

            <h3 class="alamat">Di Jemput atau Diantar Ke : <?php echo $dataPemesanan['lokasi'] ?></h3>
            <h4 style="display: flex; gap:5px">Waktu sekarang : <div id="current-date-time"></div>
            </h4>
            <h4>Waktu selesai :
              <?php
              echo $dataPemesanan['tanggal_selesai_baru'];
              ?>
            </h4>

          </div>

          <div class="tombol">
            <button type="submit" name="tambah" style="width: 170px; height: 30px">Tambah durasi</button>
          </div>
          <div class="tombol">
            <button type="submit" name="selesai" style="width: 170px; height: 30px; background-color:green">Selesai</button>
          </div>

        </div>

      <?php } ?>

    </div>

  </form>

  <?php

  if (isset($_POST['tambah'])) {
  ?>

    <button onclick="showPopup()">Tampilkan Pop-up</button>
    <div id="popup-box" class="popup">
      <form action="actions/proses_tambahdurasi.php?id=<?php echo $idPemesanan ?>" method="post">
        <div class="isi-popup">
          <h2>
            <span style="color: red;">Pemberitahuan</span>
            <br>
            saat ingin tambah durasi,
            <br>
            biaya tambahan dibayarkan <span style="color: #ffcc00;">CASH</span>
            <br>
            Pilih Sampai <span style="color: #ffcc00;">Tanggal</span> berapa <br>
            <input type="date" name="tambahdurasi" style="width: 100%;">
          </h2>
        </div>
        <div class="tombol-popup-wrapper">
          <a href="pesanan-dipakai.php"><button class="tombol-popup batal-popup" ">Batal</button></a>

          <button type=" submit" name="tomboltambahdurasi" class="tombol-popup oke-popup">Simpan</button>
        </div>
      </form>
    </div>

    <?php

  } else if (isset($_POST['selesai'])) {

    $querySelesai = mysqli_query($con, "UPDATE pemesanan SET status = 'selesai' WHERE id = '$idPemesanan'; ");
    $queryTersedia = mysqli_query($con, "UPDATE kendaraan SET status = 'tersedia' WHERE id = '$idKendaraan'; ");
    $queryRiwayat = mysqli_query($con, "INSERT INTO pemesanan_riwayat(pengguna_id, kendaraan_id, pemesanan_id, harga_riwayat, tanggal_selesai_riwayat)
    VALUES ('$_SESSION[id]', '$idKendaraan', '$idPemesanan', '$hargaBaru', '$tanggalSelesaiBaru' )");

    if ($querySelesai) {

    ?>

      <button onclick="showPopup()">Tampilkan Pop-up</button>
      <div id="popup-box" class="popup">
        <div class="isi-popup">
          <h2>Oke, pesanan anda telah <span style="color: #ffcc00;">selesai</span></h2>
        </div>
        <div class="tombol-popup-wrapper">
          <button class="tombol-popup batal-popup" onclick="hidePopup()">Batal</button>
          <a href="pesanan-selesai.php">
            <button class="tombol-popup oke-popup">Simpan</button></a>
        </div>
      </div>

    <?php

    } else {

    ?>

      <button onclick="showPopup()">Tampilkan Pop-up</button>
      <div id="popup-box" class="popup">
        <div class="isi-popup">
          <h2><span style="color: red;">ERROR!!</span><br></h2>
        </div>
        <div class="tombol-popup-wrapper">
          <button class="tombol-popup batal-popup" onclick="hidePopup()">Batal</button>
          <a href="">
            <button class="tombol-popup oke-popup">Simpan</button></a>
        </div>
      </div>

  <?php

    }
  }

  ?>

  <script src="actions/waktu_sekarang.js"></script>
</body>

</html>