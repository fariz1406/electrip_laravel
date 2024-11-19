<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Pengguna</title>
  <link rel="stylesheet" href="{{ asset('css/admin/data_user.css')}}">
</head>

<body>
@include('partials.sidebar_admin')

  <div class="container">

      <hr>

    <h1>List Semua Pengguna</h1>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Role</th>
          <th>Nama</th>
          <th>email</th>
        </tr>
      </thead>
      @foreach($user as $data)
      <tbody>
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $data->role }}</td>
          <td>{{ $data->name }}</td>
          <td>{{ $data->email }}</td>

        </tr>
      </tbody>
      @endforeach
    </table>
  </div>

  <div class="tombol"><a href="proses_sediakan.php"><img src="../assets/plus.png" alt=""></a></div>

</body>

</html>