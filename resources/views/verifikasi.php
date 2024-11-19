<?php

include 'actions/session.php';

include 'service/database.php';

$pengguna_id = ($_SESSION['id']);

$query = mysqli_query($con, "SELECT * FROM pengguna_verifikasi");

$pengecekan = mysqli_query($con, "SELECT * FROM pengguna_verifikasi WHERE pengguna_id = '$pengguna_id' ");

$dataAda = mysqli_fetch_array($pengecekan);


// untuk acak string
function generateRandomString($length = 10)
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[random_int(0, $charactersLength - 1)];
  }
  return $randomString;
}

// proses menyimpan

if (isset($_POST['simpan'])) {
  $nama_lengkap = ($_POST['nama_lengkap']);
  $nik = ($_POST['nik']);
  $alamat = ($_POST['alamat']);
  $tanggal_lahir = ($_POST['tanggal_lahir']);
  $kelamin = ($_POST['kelamin']);

  // untuk perfotoan
  // $ukuran_foto = $_FILES["foto"]["size"];
  $random_name = generateRandomString(20);

  // untuk foto kendaraan
  $nama_ktp = basename($_FILES["foto_ktp"]["name"]);
  $lokasi_ktp = "images/foto-ktp/";
  $target_ktp = $lokasi_ktp . $nama_ktp;
  $tipe_ktp = strtolower(pathinfo($target_ktp, PATHINFO_EXTENSION)); //contoh jpg, png, dll
  $nama_ktp_baru = $random_name . "." . $tipe_ktp;

  // untuk foto stnk
  $nama_sim = basename($_FILES["foto_sim"]["name"]);
  $lokasi_sim = "images/foto-sim/";
  $target_sim = $lokasi_sim . $nama_sim;
  $tipe_sim = strtolower(pathinfo($target_sim, PATHINFO_EXTENSION)); // contoh jpg, png, dll
  $nama_sim_baru = $random_name . "." . $tipe_sim;

  if ($nama_lengkap == '') {
    echo "nama gaboleh kosong";
  } else {
    if ($tipe_sim != 'jpg' && $tipe_sim != 'jpeg' && $tipe_sim != 'png') {
?>
      <div class="pesan-peringatan" style="background-color: red">
        <span class="silang" onclick="this.parentElement.style.display='none';">&times;</span>
        <strong>Peringatan!</strong> file foto yang dimasukkan harus bertipe png / jpg / jpeg
      </div>
<?php
    } else {
      move_uploaded_file($_FILES["foto_ktp"]["tmp_name"], $lokasi_ktp . $nama_ktp_baru);
      move_uploaded_file($_FILES["foto_sim"]["tmp_name"], $lokasi_sim . $nama_sim_baru);
    }
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>verifikasi</title>
  <!-- icon centang -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link rel="stylesheet" href="styles/verifikasi.css" />
</head>

<body>
<?php include 'includes/pesan_peringatan.html'; ?>
<?php include 'includes/navbar.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<?php

  if (isset($_POST['simpan'])) {

    if ($pengguna_id == $dataAda['pengguna_id']) {

?>

        <div class="pesan-peringatan" style="background-color: red; margin-left: 25%">
          <span class="silang" onclick="this.parentElement.style.display='none';">&times;</span>
          <strong>GAGAL!</strong> Akun Anda Sudah Pernah Verifikasi Sebelumnya.
        </div>

<?php

    } else {

      // query insert to pengguna_verifikasi
      $queryTambah = mysqli_query($con, "INSERT INTO pengguna_verifikasi(pengguna_id, nama_lengkap, nik, kelamin, tanggal_lahir, alamat, foto_ktp, foto_sim) VALUES ('$pengguna_id', '$nama_lengkap', '$nik', '$kelamin', '$tanggal_lahir', '$alamat', '$nama_ktp_baru', '$nama_sim_baru')");

      if ($queryTambah) {

?>
        <div class="pesan-peringatan" style="background-color: #008e37; margin-left: 25%">
          <span class="silang" onclick="this.parentElement.style.display='none';">&times;</span>
          <strong>Selamat!</strong> Data anda Berhasil disimpan.
        </div>

        <meta http-equiv="refresh" content="2; url=beranda.php" />
<?php

      } else {

?>
        <div class="pesan-peringatan" style="background-color: red; margin-left: 25%">
          <span class="silang" onclick="this.parentElement.style.display='none';">&times;</span>
          <strong>Peringatan!</strong> Data anda tidak Berhasil disimpan.
        </div>
<?php
      }
    }
  }
?>

  <div class="wrapper2"></div>
  <div class="container">

    <h2>Verifikasi</h2>

    <!-- kondisi jika user sudah melakukan verifikasi -->
    <?php if ($pengguna_id == $dataAda['pengguna_id']) { ?>
    
      <div class="sudah_verifikasi"><h2 style="color: green; "><span class="material-symbols-outlined">check_circle</span>Sudah verifikasi</h2></div>

      <?php }else { ?>
    <form action="verifikasi.php" method="post" enctype="multipart/form-data">
      <div class="input1">
        <input class="input-text-design" name="nama_lengkap" type="text" required placeholder="Nama Depan" value="<?php echo $_SESSION['nama'] ?>" />
      </div>

      <div class="input2">
        <input class="input-text-design" name="nik" type="text" required placeholder="NIK" />
      </div>

      <div class="input2">
        <input class="input-text-design" name="alamat" type="text" required placeholder="Alamat" />
      </div>

      <div class="input5">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" required />
      </div>

      <div class="jenisK">
        <label class="Jenisk"><b>Jenis Kelamin</b></label><br />
        <input type="radio" name="kelamin" value="pria" /> Pria<br />
        <input type="radio" name="kelamin" value="wanita" /> Wanita<br />
      </div>

      <div class="input-foto">
      <div class="input6">
        <label for="foto_ktp">foto KTP</label>
        <input type="file" name="foto_ktp">
      </div>

      <div class="input7">
        <label for="foto_sim">foto SIM</label>
        <input type="file" name="foto_sim">
      </div>
      </div>

      <div class="radio">
        <input type="radio" name="agreement" value="agree" require /> saya
        telah menyetujui peraturan dan ketentuan yang berlaku<br />
      </div>

      <div class="Button">
        <button class="batal">Batal</button>
        <button type="submit" class="simpan" name="simpan">Simpan</button>
      </div>

    </form>

    <?php } ?>
  </div>

</body>

</html>