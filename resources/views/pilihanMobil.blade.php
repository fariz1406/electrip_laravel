<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pilihan Mobil</title>

  <link rel="stylesheet" href="{{ asset('css/pilihanKendaraan.css') }}" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body>

@include('partials.navbar')

  <form action="{{ route('pilihan') }}" method="get">
    <div class="pencarian">
      <input type="text" name="search" placeholder="Cari Disini...." value="{{ $request->get('search') }}">
      <button><span class="material-symbols-outlined">search</span></button>
    </div>
  </form>

  <div class="wrap">
    <ul>
      <li class="aktif-sekarang"><a href="pilihan">Mobil</a></li>
      <li><a href="pilihanMotor">Motor</a></li>
    </ul>
  </div>

  <hr />

  <div class="container">

  @foreach($kendaraan as $data)
    <div class="card">
      <div class="image-box">
        <img src="{{ asset('img/kendaraan/' . $data->foto) }}" />
      </div>
      <div class="teks">
        <h3>{{ $data->nama }}</h3>
        <p>RP {{ $data->harga }} Per 24 jam</p>
      </div>
      <div class="button-wrapper">
        <a href="" class="text-decoration">
          <button class="btn detail">DETAIL</button></a>
        <a href="{{ route('pesanan.checkout', $data->id) }}" class="text-decoration">
          <button class="btn beli">PESAN</button></a>
      </div>
    </div>
    @endforeach


  </div>

</body>

</html>