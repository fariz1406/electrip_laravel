<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesanan saya</title>
  <link rel="stylesheet" href="{{ asset('css/pesanan.css') }}">
</head>

<body>
@include('partials.navbar')
@include('partials.sidebar')

  <div class="container">

    <div class="pilihan">
      <ul>
        <a href="{{route('pesanan.belumDibayar')}}"><li><h2>belum dibayar</h2></li></a>
        <a href="{{route('pesanan.diProses')}}"><li><h2>di proses</h2></li></a>
        <a href="{{route('pesanan.diKirim')}}"><li><h2>di kirim</h2></li></a>
        <a href="{{route('pesanan.diPakai')}}"><li><h2>di pakai</h2></li></a>
        <a href="pesanan-selesai.php">
          <li>
            <h2>Riwayat</h2>
          </li>
        </a>
      </ul>
    </div>

    <hr>

    @foreach($dataPesanan as $data)
    
      <div class="card">
        <div class="image-box">
          <img src="{{ asset('img/kendaraan/' . $data->kendaraan->foto) }}">
        </div>

        <div class="text">
          <h2>Merk : {{ $data->kendaraan->nama }}</h2>
          <h3>Biaya : RP. {{ $data->biaya }}</h3>

          <hr class="garis">
          <h3 class="alamat">Di Jemput atau Diantar Ke : {{ $data->lokasi }}</h3>
          <h4>Estimasi waktu Pengambilan atau Pengiriman : {{ $data->waktu }}</h4>

        </div>

        <br>

        <div class="tombol">
          <form action=""></form>
            <a href="">
            <button type="submit" name="bayar"><b>Bayar Sekarang</b></button></a>

        </div>

      </div>
      @endforeach

  </div>

</body>

</html>