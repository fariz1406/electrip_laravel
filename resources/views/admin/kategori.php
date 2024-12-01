<?php

include '../service/database.php';

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>kategori</title>
</head>

<body>
  <?php include '../includes/navbar_admin.html'; ?>

  List Kategori
  <div>
    <table>
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($data = mysqli_fetch_array($queryKategori)) {
          $jumlah = 1;
          if ($jumlahKategori == 0) {
        ?>
            <tr>
              <td>tidak ada data kategori</td>
            </tr>
          <?php
          } else {
          ?>
            <tr>
              <td><?php echo $jumlah; ?></td>
              <td><?php echo $data['nama']; ?></td>
            </tr>


        <?php
        $jumlah++;
          }
        }
        ?>
      </tbody>
    </table>
  </div>

</body>

</html>