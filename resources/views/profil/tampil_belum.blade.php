<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil</title>
  <link rel="stylesheet" href="{{ asset('css/profil.css') }}" />
</head>

<body>

  @include('partials.navbar')
  @include('partials.sidebar')

  <div class="wrapper2"></div>
  <div class="container">
    <h2>Profil</h2>
    <form action="edit_profil.php" method="post" enctype="multipart/form-data">

      <div class="wrapper-img">
        <div class="image-box">
          <img src="{{ asset('img/Profile_user.png') }}" />
        </div>
      </div>

      <div class="input1">
        <p>{{ $user->name }}</p>
      </div>

      <div class="input2">
        <p>085211451129</p>
      </div>

      <div class="input3">
        <p>belum buat profil</p>
      </div>

      <div class="Button">
        <a href="{{route('profil.tambah')}}">buat</a>
      </div>
    </form>
  </div>

</body>

</html>