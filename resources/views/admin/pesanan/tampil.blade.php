</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Verifikasi</title>
  <link rel="stylesheet" href="{{ asset('css/admin/validasi_verifikasi.css') }}">
</head>

<body>
  @include('partials.sidebar_admin')

  <div class="container">


    <hr>

    <h1>List Pesanan</h1>

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Penyewa</th>
          <th>Merk Kendaraan</th>
          <th>Harga</th>
          <th>Status</th>
          <th class="text-align">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse($pesanan as $data)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $data->user_id }}</td>
          <td>{{ $data->kendaraan_id }}</td>
          <td>{{ $data->biaya }}</td>
          <td>{{ $data->status }}</td>
          <td class="edit">
            <a href="">
              <span class="material-symbols-outlined">edit_square</span>
            </a>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" style="text-align:center;">Data Pesanan tidak ada</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</body>

</html>