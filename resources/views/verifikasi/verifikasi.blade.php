<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verifikasi</title>
  <link rel="stylesheet" href="{{ asset('css/verifikasi.css') }}" />
</head>
<style>
  * {
    text-decoration: none;
    margin: 0px;
    padding: 0px;
  }

  body {
    margin: 0px;
    padding: 0px;
    background-color: #121212;
  }

  .container {
    width: 50%;
    height: auto;
    background-color: rgb(235, 233, 233);
    padding: 30px;
    border-radius: 25px;
    margin-left: 37%;
    margin-bottom: 250px;
    position: absolute;
    top: 70px;
    left: 0px;
    box-shadow: 0px 0px 1px #848484;
  }

  .container h2 {
    text-align: center;
  }

  .sudah_verifikasi {
    width: 100%;
    margin: 220px 0;
    text-align: center;
    font-size: 25px;
  }


  .wrapper2 {
    width: 600;
    height: 150px;
    background-color: #ffcc00;
    margin-left: 25%;
    overflow: hidden;
  }

  .container img {
    margin-top: 40px;
    width: 80px;
    margin-left: 300px;
  }

  .container h3 {
    margin-left: 307px;
    margin-top: 4.5px;
    font-size: 23px;
  }

  .input-text-design {
    width: 40%;
    height: 30px;
    background-color: white;
    border-radius: 11px;
    font-size: 1rem;
    outline: none;
    padding: 0 20px;
    margin-left: 23.5%;
    margin-bottom: 28px;
  }

  .input4 {
    margin-left: 350px;
    margin-top: -29px;
  }

  .input4 input {
    height: 30px;
    width: 100px;
    background: #ffffff;
    border: #6e6767;
    outline: none;
    border-radius: 11px;
    color: #0c0c0c;
    font-size: 1rem;
    padding: 0 20px;
    margin-bottom: 20px;
  }

  .input4 label {
    position: absolute;
    left: 360px;
    top: 41.9%;
    transform: translateY(-45%);
    font-size: 13px;
    pointer-events: none;
    color: #8c8c8c;
    transition: all 0.1s ease;
  }

  .input4 input:is(:focus, :valid) {
    background: #ffffff;
    padding: 0px 20px 0;
  }

  .input4 input:is(:focus, :valid)~label {
    font-size: 0.75rem;
    transform: translateY(-155%);
  }

  .input5 {
    margin-left: 180px;
  }

  .input5 label {
    display: block;
    margin-bottom: 5px;
  }

  .input5 input {
    height: 30px;
    width: 50%;
    background: #ffffff;
    border: #6e6767;
    outline: none;
    border-radius: 11px;
    color: #8c8c8c;
    font-size: 1rem;
    padding: 0 20px;
    margin-bottom: 20px;
  }

  input[type="date"] {
    text-transform: uppercase;
  }

  .jenisK {
    color: #8c8c8c;
    margin-left: 184px;
    padding-top: 5px;
    margin-bottom: 15px;
  }

  .jenisK input {
    margin-top: -50px;
  }

  .jenisK input[type="radio"] {
    margin-bottom: 3px;
  }

  .jenisK label {
    color: #0c0c0c;
    display: block;
    font-size: 15px;
    margin-bottom: -15px;
  }

  .input-foto {
    display: flex;
  }

  .input6 {
    margin-left: 180px;
    margin-bottom: 15px;
  }

  .input6 label {
    display: block;
    margin-bottom: 5px;
  }

  .input7 {
    margin-bottom: 30px;
  }

  .input7 label {
    display: block;
    margin-bottom: 5px;
  }

  .radio {
    margin-left: 180px;
    margin-bottom: 15px;
    font-size: 13px;
  }

  .radio input[type="radio"] {
    width: 11px;
  }

  .Button {
    margin-right: 20px;
    width: 100%;
    margin-top: 0px;
    padding-bottom: 20px;
    justify-content: end;
    text-align: end;
  }

  .Button .simpan {
    background-color: #ffcc00;
    width: 100px;
    height: 35px;
    border: 1px solid black;
    color: #0c0c0c;
    border-radius: 15px;
    margin-right: 30px;
    margin-left: 20px;
  }

  .Button .batal {
    background-color: #ffffff;
    width: 100px;
    height: 35px;
    border: 1px solid black;
    color: #0c0c0c;
    border-radius: 50px;
  }

  .Button .simpan:hover {
    background-color: yellow;
  }

  .Button .batal:hover {
    background-color: red;
  }
</style>

<body>
  
  @include('includes.pesan_peringatan')
  @include('partials.navbar')
  @include('partials.sidebar')

  <div class="container">

    @if(session('error'))
    <div class="pesan-peringatan" style="background-color: red;">
      <strong>{{ session('error') }}</strong>
    </div>
    @endif

    @if(session('success'))
    <div class="pesan-peringatan" style="background-color: #008e37;">
      <strong>{{ session('success') }}</strong>
    </div>
    @endif
    <h2>Verifikasi</h2>



    <form action="{{ route('verifikasi.store') }}" method="post" enctype="multipart/form-data">
      @csrf

      <div class="input1">
        <input class="input-text-design" name="nama_lengkap" type="text" required placeholder="Nama Lengkap" value="{{ old('nama_lengkap', Auth::user()->nama) }}" />
      </div>

      <div class="input2">
        <input class="input-text-design" name="nik" type="text" required placeholder="NIK" value="{{ old('nik') }}" />
      </div>

      <div class="input2">
        <input class="input-text-design" name="alamat" type="text" required placeholder="Alamat" value="{{ old('alamat') }}" />
      </div>

      <div class="input5">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" required value="{{ old('tanggal_lahir') }}" />
      </div>

      <div class="jenisK">
        <label class="Jenisk"><b>Jenis Kelamin</b></label><br />
        <input type="radio" name="kelamin" value="pria" required /> Pria<br />
        <input type="radio" name="kelamin" value="wanita" required /> Wanita<br />
      </div>

      <div class="input6">
        <label for="foto_ktp">Foto KTP</label>
        <input type="file" name="foto_ktp" required>
      </div>

      <div class="input7">
        <label for="foto_sim">Foto SIM</label>
        <input type="file" name="foto_sim" required>
      </div>

      <div class="radio">
        <input type="radio" name="agreement" value="agree" require /> saya
        telah menyetujui peraturan dan ketentuan yang berlaku<br />
      </div>

      <!-- Tombol Submit -->
      <div class="Button">
        <button type="simpan">Kirim Verifikasi</button>
      </div>
    </form>
  </div>
</body>

</html>