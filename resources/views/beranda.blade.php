<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Beranda</title>
  <link rel="stylesheet" href="{{ asset('css/beranda.css') }}" />
</head>
<style>
    .popup-overlay {
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }
    
    .popup-content {
        background: white;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
    }
    
    .popup-content button {
        background-color: #FFCC00;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    
    .popup-content button:hover {
        background-color: #ffcc0f;
    }
</style>
<body>

@include('partials.navbar')

@if(session('first_login_done') && !$dataAda)
    <div id="popup" class="popup-overlay">
        <div class="popup-content">
            <h2>Verifikasi Akun Anda</h2>
            <p>Untuk melanjutkan, harap verifikasi akun Anda.</p>
            <a href="{{ route('verifikasi.index') }}">
                <button>Verifikasi Sekarang</button>
            </a>
        </div>
    </div>
@endif
  <div class="wrapper1">
    <section id="Home" class="overlay">
      <div class="overlay-content">
        <h1>
          Jelajahi Dunia Luar <br />
          <span>Tanpa Polusi</span>
        </h1>

        <form action="beranda.php" method="post">
          <button type="submit" name="pesan">Pesan Sekarang</button>
        </form>
      </div>
    </section>
  </div>
  <div class="wrapper2">
    <div class="gmbr1">
      <img src="{{ asset('img/baterai.png') }}" alt="" />
      <p>Recharge</p>
    </div>
    <div class="gmbr2">
      <img src="{{ asset('img/uang.png') }}" alt="" />
      <p>Ekonomis</p>
    </div>
    <div class="gmbr3">
      <img src="{{ asset('img/udara.png') }}" alt="" />
      <p>Ramah Lingkungan</p>
    </div>
  </div>
  <div class="wrapper3">
    <p>
      <span>Tentang Electrip</span> <br />
      sewakan kendaraan mu, dan dapatkan pemasukan tambahan setiap hari,<br />
      kami yakin bahwa kolaborasi ini akan membawa manfaat besar dan juga<br />
      bagi lingkungan bersama sama, kami dapat memberikan akses yang lebih<br />
      luas kepada masyarakat untuk merasakan keunggulan kendaraan listrik<br />
      dalam perjalanan sehari-hari
    </p>

    <a href="lainnya_Penyedia.php"><button>Klik Disini</button></a>
  </div>

</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const popup = document.getElementById('popup');
        const closeBtn = popup.querySelector('button');

        closeBtn.addEventListener('click', function () {
            popup.style.display = 'none';
        });
    });
</script>
</html>