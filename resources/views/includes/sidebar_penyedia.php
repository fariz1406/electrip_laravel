<?php

error_reporting(E_ERROR | E_PARSE); // Mengatur level laporan kesalahan agar hanya laporan kesalahan fatal yang ditampilkan

include "../service/database.php";

$querySidebarPenyedia = mysqli_query($con, "SELECT * FROM penyedia_verifikasi WHERE penyedia_id = '$_SESSION[id]' ");
$dataSidebarPenyedia = mysqli_fetch_array($querySidebarPenyedia);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verifikasi</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <style>
      @import url("https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
        /* sidebar */
      * {
          text-decoration: none;
          margin: 0px;
          padding: 0px;
          font-family: "Poppins", Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif;
      }

      body {
          margin: 0px;
          padding: 0px;
          font-family: "Poppins", Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif;
      }

       .sidebar {
          width: 26%;
          height: 100%;
          background-color: #2b2b2b;
          position: fixed;
          top: 0;
          left: 0;
          z-index: 999;
      }
      .kotak {
          width: 289px;
          height: 160px;
          background-color: #FFCC00;
          border-radius: 8px;
          top: 20px;
          position: absolute;
          z-index: 999;
      }
      .kotak1 {
      width: 230px;
      height: 75px;
      background-color: #2b2b2b;
      position: absolute;
      top: 50px;
      left: 10px;
      border-radius: 11px;
      z-index: 999;
      }

      .row ul {
          display: flex;
          flex-direction: column;
          list-style-type: none;
          margin: 5px 0;
          color: #ffffff;
          margin-top: 170px;
          z-index: 999;
          position: absolute;
          left: 15px;
          font-size: 18px;
          gap: 40px;
      }
      .row ul li a{
          color: #ffffff;
      }
      .row ul li a:hover {
          color: #b1b1af;
      }

      .row ul li {
          display: flex;
          align-items: center;
        }

        .row ul li span:first-child {
          flex-grow: 1;
        }

      .row .settings {
          margin-top: -10px;
          margin-bottom: 5px;
          font-size: 17px;
          opacity: 0.5;
      }
      #logout a{
          color: #FFCC00;
      }
      #logout a:hover{
          color: #c09b08;
      }
      .kotak1 img {
          width: 45px;
          margin-left: 10px;
          margin-top: 10px;
          position:sticky;
      }
      .kotak1 h3{
      margin-left: 63px;
      font-size: 15px;
      color: #FFCC00;
      margin-top: -45px;
      z-index: 999;
      margin-left: 67px;

      }

      .kotak1 p{
          font-size: 10px;
          color: #ffffff;
          margin-top: 8px;
          margin-left: 67px;
      }

      .kotak2 {
      width: 140px;
      height: 23px;
      background-color: #2b2b2b;
      position: absolute;
      top: 129px;
      left: 13px;
      border-radius: 40px;
      z-index: 999;
      color: #ffffff;
      font-size: 11px;
      }

      .kotak2 img{
          width: 14px;
          margin-left: 6px;
          margin-top: 4.5px;
          position: absolute;

      }
      .kotak2 p{
          margin-left: 26px;
          margin-top: -26px;
      }



      .row .settings2 {
          margin-top: 10px;
          margin-bottom: 2px;
          font-size: 17px;
          opacity: 0.5;
      }

      .row .logout {
          color: #FFCC00;
      }
      /* batas sidebar */


    </style>
  </head>
  <body>
    <!-- sidebar -->
    <div class="sidebar"></div>
    <div class="row">
      <ul>
        <li class="settings">Pengaturan</li>
        <li>
          <a href="../penyedia/profil_penyedia.php"><span>Edit Profil</span> </a>
        </li>
        <li>
          <a href="mode_pengguna.php"><span>Pengguna</span></a>
        </li>
        <li>
          <a href="#Ganti Sandi"><span> Ganti Sandi</span></a>
        </li>
        <li>
          <a href="../penyedia/verifikasi_penyedia.php"><span> Verifikasi</span></a>
        </li>
        <li class="settings2"><span>Lainnya </span></li>
        <li>
          <a href="../bantuandukungan.html"><span>Bantuan dan Dukungan</span></a>
        </li>
        <li id="logout">
          <a href="../"><span>Log Out Mode Penyedia</span></a>
        </li>
      </ul>
    </div>
    <div class="kotak">
      <div class="kotak1">
        <div class="foto-box">
          <img src="../assets/Profile_user.png" alt="" />
        </div>
        <h3><?php echo $_SESSION['nama'] ?></h3>
        <p><?php echo $_SESSION['email'] ?></p>
      </div>
      <div class="kotak2">
        <!-- <span class="material-symbols-outlined" style="color: green;">check_circle</span><p>Sudah Terverifikasi</p> -->
        <!-- <span class="material-symbols-outlined" style="color: red;">cancel</span><p>Belum Verifikasi</p> -->
<?php

        if ($dataSidebarPenyedia['validasi'] == 'setuju') {

?>

          <span class="material-symbols-outlined" style="color: green;">check_circle</span>
          <p>Sudah Terverifikasi</p>

<?php
        } else {

?>
  
          <span class="material-symbols-outlined" style="color: red;">cancel</span>
          <p>Belum Verifikasi
  
<?php
          } 
?>
      </div>
    </div>
    <!-- batas sidebar -->
  </div>
  </body>
</html>
