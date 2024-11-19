<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Montserrat+Alternates:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

    * {
      text-decoration: none;
      margin: 0px;
      padding: 0px;
      font-family: "Poppins", Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
    }

    /* navbar penyedia */
    .navbar {
      width: 100%;
      height: 44px;
      position: relative;
      background-color: #848484;
    }

    .logo img {
      width: 120px;
      height: 110px;
      position: absolute;
      top: -35px;
      right: 80%;
      left: 35px;
    }

    .menu {
      float: right;
      margin-right: 45px;
      font-size: 19px;
    }

    nav {
      width: 100%;
      margin: auto;
      display: flex;
      line-height: 27px;
      position: sticky;
      position: -webkit-sticky;
      top: 0px;
      background: #ffffff;
      z-index: 1000;
    }

    nav ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
    }

    nav ul li {
      display: inline-block;
      margin: 10px 20px;
      right: 20%;
    }

    nav ul li a {
      color: #ffffff;
      font-weight: none;
      text-align: center;
      padding: 0px 16px 0px 16px;
      text-decoration: none;
    }

    nav ul li a:hover {
      color: #ffcc00;
      text-decoration: underline;
      transition: 0.5s;
    }

    nav ul li a:active {
      color: #ffcc00;
      text-decoration: underline;
      transition: 0.5s;
    }

    .sub-menu-wrap {
      position: absolute;
      top: 40px;
      right: 63px;
      width: 255px;
      overflow: hidden;
      transition: max-height 0.5s, opacity 0.5s ease-in-out;
      border-radius: 10px;
      background-color: #ffffff;
      max-height: 0.5px;
      opacity: 0;
    }

    .sub-menu-wrap.open-menu {
      max-height: 400px;
      opacity: 1;
    }

    .sub-menu {
      background: #fff;
      padding: 20px;
      margin-bottom: 10px;
    }

    .profil {
      display: flex;
      align-items: center;
    }

    .profil p {
      font-size: 23px;
    }

    .profil img {
      width: 40px;
      border-radius: 50%;
      margin-right: 12px;
    }

    .switch {
      position: relative;
      display: inline-block;
      width: 50px;
      height: 21.5px;
    }

    /* Hide default HTML checkbox */
    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    /* The slider */
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: transparent;
      -webkit-transition: 0.4s;
      transition: 0.4s;
      border: 1.5px solid black;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 16px;
      width: 16px;
      left: 2px;
      bottom: 1.5px;
      background-color: rgb(0, 0, 0);
      -webkit-transition: 0.4s;
      transition: 0.4s;
    }

    input:checked+.slider {
      background-color: #000000;
    }

    input:focus+.slider {
      box-shadow: 0 0 1px #ffffff;
    }

    input:checked+.slider:before {
      -webkit-transform: translateX(20px);
      -ms-transform: translateX(20px);
      transform: translateX(20px);
    }

    .slider.round {
      border-radius: 20px;
    }

    .slider.round:before {
      border-radius: 20px;
    }

    /* Ketika checkbox (input) dicentang, atur warna latar belakang toggle (before) menjadi warna background utama */
    input:checked+.slider:before {
      background-color: #ffffff;
    }

    .sub-menu-link {
      display: flex;
      align-items: center;
      text-decoration: none;
      color: #000000;
      margin: 12px 0;
    }

    .sub-menu-link p {
      width: 100%;
    }

    .sub-menu-link:hover p {
      font-size: 110%;
    }

    .sub-menu-link1 .keluar {
      margin-top: 10px;
      display: flex;
      align-items: center;
      text-decoration: none;
      color: #000000;
    }

    .sub-menu-link1:hover {
      font-size: 110%;
    }

    /* batas navbar */
  </style>
</head>

<body>
  <!-- navbar -->
  <nav>
    <div class="navbar">
      <div class="logo"><img src="{{ asset('img/assetElectrip/ElecTrip teks.png') }}" alt="" /></div>
      <div class="menu">

        <ul>
          <li><a href="{{url('/beranda')}}">BERANDA</a></li>
          <li><a href="{{ url('/pilihanmobil') }}">PESAN SEKARANG</a></li>
          <li><a href="#lainnya" onclick="toggleMenu()">LAINNYA</a></li>
        </ul>

        <div class="sub-menu-wrap" id="subMenu">
          <div class="sub-menu">
            <div class="profil">
              <img src="{{ asset('img/assetElectrip/Profile_user.png') }}" alt="" />
              <a href="/profil/edit">Profil</a>
            </div>
            <a href="pesanan.php">
              <p>Pesanan Saya</p>
            </a>
            <a href="lainnya_penyedia.php">
              <p>Penyedia</p>
            </a>
            <a href="edit_profil.php">
              <p>Pengaturan</p>
            </a>
            <a href="bantuandukungan.html">
              <p>Bantuan & Dukungan</p>
            </a>
            <a href="actions/logout.php">Keluar</a>
          </div>
        </div>

      </div>
    </div>
  </nav>

  <script>
    let subMenu = document.getElementById("subMenu");

    function toggleMenu() {
      subMenu.classList.toggle("open-menu");
    }
  </script>
  <!-- batas navbar -->
</body>

</html>