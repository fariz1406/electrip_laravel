<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil</title>
  <link rel="stylesheet" href="css/profil.css" />
</head>

<body>

  @include('partials.navbar')
  @include('partials.sidebar')

  <div class="wrapper2"></div>
  <div class="container">
    <h2>Profil</h2>
    <form action="edit_profil.php" method="post" enctype="multipart/form-data">

      <div class="input1">
        <input type="text" placeholder="nama pengguna" required />
      </div>

      <div class="input2">
        <input type="text" name="telepon" placeholder="nomor telepon" required />
      </div>

      <div class="input3">
        <textarea id="deskripsi" name="deskripsi" cols="40" rows="6" placeholder="Deskripsi"></textarea>
      </div>

      <div class="Button">
        <button class="batal">Batal</button>
        <button class="simpan" name="simpan">Simpan</button>
      </div>
    </form>
  </div>

</body>

</html>