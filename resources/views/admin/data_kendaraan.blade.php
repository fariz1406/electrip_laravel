<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Kendaraan</title>
  <link rel="stylesheet" href="{{ asset('css/admin/data_kendaraan.css')}}">
</head>

<body>
@include('partials.sidebar_admin')
  <div class="container">
    <h1>List Semua Kendaraan</h1>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Penyedia</th>
          <th>Nama / Merk</th>
          <th>Kategori</th>
          <th>Harga</th>
          <th>Status</th>
          <th class="text-align">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($jumlahProduk == 0) {
        ?>
          <tr>
            <td colspan="6" style="text-align:center;">Data Kendaraan tidak tersedia</td>
          </tr>

          <?php
        } else {
          $jumlah = 1;
          while ($data = mysqli_fetch_array($query)) {
            if ($data['kategori_id'] == 1) {
              $namaKategori = "mobil";
            } elseif ($data['kategori_id'] == 2) {
              $namaKategori = 'motor';
            }
          ?>

            <tr>
              <td><?php echo $jumlah ?></td>
              <td><?php echo $data['nama_penyedia'] ?></td>
              <td><?php echo $data['nama'] ?></td>
              <td><?php echo $namaKategori ?></td>
              <td>RP <?php echo number_format($data['harga'], 0, ',', '.') ?></td>
              <td><?php echo $data['status'] ?></td>
              <td class="edit" >
                <a href="kendaraan_detail.php?id=<?php echo $data['id']; ?>"><span class="material-symbols-outlined">
                  edit_square
                </span></a>
              </td>
            </tr>

        <?php
            $jumlah++;
          }
        }
        ?>
      </tbody>
    </table>
  </div>

  <div class="tombol"><a href="proses_sediakan.php"><img src="../assets/plus.png" alt=""></a></div>

</body>

</html>