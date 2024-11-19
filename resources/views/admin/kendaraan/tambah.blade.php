<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>proses penyediaan</title>
  <link rel="stylesheet" href="{{ asset('css/admin/tambah_kendaraan.css')}}">

</head>

<body>

  <div class="container">


    <form action="{{ route('kendaraan.submit') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="wrapper-kiri">
        <div class="input-foto">
          <label for="foto">Pilih Gambar/Foto Kendaraan anda</label> <br>
          <img src="img.png">
          <input type="file" name="foto" id="foto">
        </div>

        <div class="input-nama">
          <input type="text" name="nama" class="input-desain" placeholder="Merk / Nama kendaraan"><br>
          <label for="kategori">Pilih Kategori Kendaraan:</label>
          <select name="kategori" id="kategori" class="input-desain">
            <option value="1">Mobil</option>
            <option value="2">Motor</option>
          </select>
        </div>

        <div class="input-kategori">

        </div>

      </div>

      <div class="wrapper-kanan">
        <div class="input-deskripsi">
          <textarea name="deskripsi" id="deskripsi" cols="40" rows="6" placeholder="Deskripsi / Spesifikasi"></textarea>
        </div>

        <div class="input-harga">
          <label for="harga">Range Harga Per 24 Jam</label>
          <input type="number" name="harga" placeholder="RP." class="harga">
        </div>

        <div class="input-stnk">
          <label for="stnk">Foto STNK</label>
          <input type="file" name="stnk">
        </div>

        <div class="input-tahun">
          <label for="informasi_tambahan">Tahun Kendaraan</label>
          <input type="number" name="tahun" class="input-desain" placeholder="Tahun Kendaraan">
        </div>


      </div>

      <div class="tombol">
        <a href="sediakan.php"><button type="button" class="batal">Batal</button></a>
        <button type="submit" class="simpan" name="simpan">Tambah</button>
      </div>

    </form>

  </div>
</body>

</html>