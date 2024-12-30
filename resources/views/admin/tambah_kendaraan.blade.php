<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>proses penyediaan</title>
  <link rel="stylesheet" href="styles/proses_sediakan.css">

</head>

<body>
@include('partials.sidebar_admin')
  <div class="container">


    <form action="" method="post" enctype="multipart/form-data">

      <div class="wrapper-kiri">
        <div class="input-foto">
          <label for="foto">Pilih Gambar/Foto Kendaraan anda</label> <br>
          <img src="img.png">
          <input type="file" name="foto" id="foto">
        </div>

        <div class="input-nama">
          <input type="text" name="nama" id="" class="input-desain" placeholder="Merk / Nama kendaraan"><br>
          <label for="kategori">Pilih Kategori Kendaraan:</label>
          <select name="kategori" id="kategori" class="input-desain">
            <option value="1">Mobil</option>
            <option value="2">Motor</option>
          </select>
        </div>

        <div class="input-kategori">

        </div>

      </div>

      <div class="wrapper-kanan">
        <div class="input-deskripsi">
          <textarea name="deskripsi" id="deskripsi" cols="40" rows="6" placeholder="Deskripsi / Spesifikasi"></textarea>
        </div>

        <div class="input-harga">
          <label for="harga">Range Harga Per 24 Jam</label>
          <input type="number" name="harga" placeholder="RP." class="harga">
        </div>

        <div class="input-stnk">
          <label for="stnk">Foto STNK</label>
          <input type="file" name="stnk">
        </div>

        <div class="input-tahun">
          <label for="informasi_tambahan">Tahun Kendaraan</label>
          <input type="number" name="tahun" class="input-desain" placeholder="Tahun Kendaraan">
        </div>


        <div class="input-kekurangan">
          <label for="informasi_tambahan">Kekurangan / Minus</label>
          <input type="text" name="informasi_tambahan" class="input-desain" placeholder="kosongkan jika lengkap">
        </div>

      </div>

      <div class="tombol">
        <a href="sediakan.php"><button type="button" class="batal">Batal</button></a>
        <button type="submit" class="simpan" name="simpan">Tambah</button>
      </div>

    </form>

  </div>

  <?php

  if (isset($_POST['simpan'])) {
    $idPenyedia = ($_SESSION['id_penyedia']);
    $kategori = ($_POST['kategori']);
    $nama = ($_POST['nama']);
    $deskripsi = ($_POST['deskripsi']);
    $harga = ($_POST['harga']);
    $tahun = ($_POST['tahun']);
    $informasi_tambahan = ($_POST['informasi_tambahan']);

    // untuk perfotoan
    $ukuran_foto = $_FILES["foto"]["size"];
    $random_name = generateRandomString(20);

    // untuk foto stnk
    $nama_stnk = basename($_FILES["stnk"]["name"]);
    $lokasi_stnk = "../images/stnk/";
    $target_stnk = $lokasi_stnk . $nama_stnk;
    $tipe_stnk = strtolower(pathinfo($target_stnk, PATHINFO_EXTENSION)); // contoh jpg, png, dll
    $nama_stnk_baru = $random_name . "." . $tipe_stnk;

    // untuk foto kendaraan
    $nama_foto = basename($_FILES["foto"]["name"]);
    $lokasi_foto = "../images/foto/";
    $target_foto = $lokasi_foto . $nama_foto;
    $tipe_foto = strtolower(pathinfo($target_foto, PATHINFO_EXTENSION)); //contoh jpg, png, dll
    $nama_foto_baru = $random_name . "." . $tipe_foto;

    if ($nama == '') {
      echo "nama gaboleh kosong";
    } else {
      if ($tipe_foto != 'jpg' && $tipe_foto != 'jpeg' && $tipe_foto != 'png') {
  ?>
        <div class="pesan-peringatan">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          <strong>Peringatan!</strong> Jenis Foto harus menggunakan png / jpg / jpeg.
        </div>
      <?php
      } else {
        move_uploaded_file($_FILES["foto"]["tmp_name"], $lokasi_foto . $nama_foto_baru);
        move_uploaded_file($_FILES["stnk"]["tmp_name"], $lokasi_stnk . $nama_stnk_baru);
      }

      // query insert to kendaraan table
      $queryTambah = mysqli_query($con, "INSERT INTO kendaraan(penyedia_id, kategori_id, nama, foto, deskripsi, harga, stnk, tahun, informasi_tambahan) VALUES ('$idPenyedia', '$kategori','$nama', '$nama_foto_baru', '$deskripsi', '$harga', '$nama_stnk_baru', '$tahun', '$informasi_tambahan')");

      if ($queryTambah) {
      ?>
        <div class="pesan-peringatan">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          <strong>Selamat!</strong> Data berhasil Tersimpan.
        </div>

        <meta http-equiv="refresh" content="3; url=sediakan.php" />
  <?php

      }
    }
  }

  ?>

</body>

</html>