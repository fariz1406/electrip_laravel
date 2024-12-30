<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CheckOut</title>
  <link rel="stylesheet" href="{{ asset('css/checkout.css') }}" />
</head>

<body>
@include('partials.navbar')

  <div class="container">

    <div class="wrapper2">
      
      <div class="image-box">
        <img src="{{ asset('img/kendaraan/' . $kendaraan->foto) }}" />
      </div>

      <div class="isi-teks">
        <div class="wrapper-isi-teks">
        <h3>{{ $kendaraan->nama }}</h3>
        <h4>tahun : {{ $kendaraan->tahun }}</h4>
        <h4>Rp. {{ $kendaraan->harga }} / 24 jam</h4>
        </div>
      </div>
    </div>

    <div class="wrapper-input">
      <form action="{{ route('pesanan.submit', $kendaraan->id) }}" id="checkoutForm" method="post">
        @csrf
        <input type="hidden" name="pengguna_id" value="{{ Auth::user()->id }}">
        <div class="pembayaran">
        <input type="datetime-local"  name="waktu_pakai" id="datetime-design" require>
        <h2 style="color: white; padding: 0 15px">Sampai</h2>
        <input type="date"  name="waktu_selesai" id="datetime-design" require>
        </div>
        <div class="areatext">
          <textarea name="lokasi" id="lokasi" class="input-text-area" cols="60" rows="5" placeholder="Alamat Pengantaran / penjemputan" require></textarea>
          <textarea name="pesan" id="pesan" class="input-text-area" cols="60" rows="5" placeholder="Pesan (Opsional)"></textarea>
        </div>
    </div>

    <div class="Button">
      <button class="batal" onclick="goBack()">Batal</button>
      <button class="simpan" name="checkout">Check Out</button>
    </div>

    </form>

  </div>

</body>

</html>

<script>
function goBack() {
  window.history.back();
}
</script>
