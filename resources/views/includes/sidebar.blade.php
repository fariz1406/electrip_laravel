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
      z-index: 1;
    }

    body {
      margin: 0px;
      background: #ffffff;
      padding: 0px;
    }

    .sidebar {
      width: 25%;
      height: 100%;
      background-color: #2b2b2b;
      position: fixed;
      top: 0;
      left: 0;
    }

    .kotak {
      width: 289px;
      height: 155px;
      background-color: #ffcc00;
      border-radius: 8px;
      position: absolute;
    }

    .kotak1 {
      width: 230px;
      height: 69px;
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

    .row ul li a {
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

    #logout a {
      color: #ffcc00;
    }

    #logout a:hover {
      color: #c09b08;
    }

    .foto-sidebar {
      height: 45px;
      width: 45px;
      margin-top: 10px;
      margin-left: 10px;
      border: 1px solid black;
      border-radius: 50%;
    }

    .foto-sidebar img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
      border-radius: 50%;
    }

    .kotak1 h3 {
      margin-left: 63px;
      font-size: 15px;
      color: #ffcc00;
      margin-left: 67px;
      margin-top: -55px;
    }

    .kotak1 p {
      font-size: 10px;
      color: #ffffff;
      margin-top: 8px;
      margin-left: 67px;
    }

    .kotak2 {
      width: 140px;
      height: 23px;
      background-color: #2b2b2b;
      display: flex;
      position: absolute;
      top: 129px;
      left: 13px;
      border-radius: 40px;
      color: #ffffff;
      font-size: 11px;
      align-items: center;
      padding: 1px;
    }

    .kotak2 span {
      font-size: 20px;
      margin-left: 1px;
    }

    .kotak2 p {
      margin-left: 7px;
    }

    .row .settings2 {
      margin-top: 10px;
      margin-bottom: 2px;
      font-size: 17px;
      opacity: 0.5;
    }

    .row .logout {
      color: #ffcc00;
    }

    /* batas sidebar */
  </style>
</head>

<body>
  <!-- sidebar -->
  <!-- resources/views/layouts/sidebar.blade.php -->

  <div class="sidebar">
    <div class="kotak">
      <div class="kotak1">

        <div class="foto-sidebar">
        @foreach ($data as $datas)
          <img src="{{ asset('img/foto/'. $datas->foto_profil) }}">
        </div>
      @endforeach
        <h3>{{ Auth::user()->nama }}</h3>
        <p>{{ Auth::user()->email }}</p>
      </div>

      <div class="kotak2">
        @if (Auth::user()->penggunaVerifikasi->validasi == 'setuju')
        <span class="material-symbols-outlined" style="color: green;">check_circle</span>
        <p>Sudah Terverifikasi</p>
        @else
        <span class="material-symbols-outlined" style="color: red;">cancel</span>
        <p>Belum Verifikasi</p>
        @endif
      </div>
    </div>


    <!-- Navigation Menu -->
    <div class="row">
      <ul>
        <li class="settings">Pengaturan</li>
        <li>
          <a href=""><span>Edit Profil</span></a>
        </li>
        <li>
          <a href=""><span>Penyedia</span></a>
        </li>
        <li>
          <a href=""><span>Pesanan Saya</span></a>
        </li>
        <li>
          <a href=""><span>Verifikasi</span></a>
        </li>
        <li class=""><span>Lainnya</span></li>
        <li>
          <a href=""><span>Bantuan dan Dukungan</span></a>
        </li>
        <li id="logout">
          <a href=""><span>Keluar</span></a>
        </li>
      </ul>
    </div>
  </div>
</body>

</html>