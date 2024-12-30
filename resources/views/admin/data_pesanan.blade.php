<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Pesanan</title>
  <link rel="stylesheet" href="{{ asset('css/admin/data_pesanan')}}">
</head>

<body>
@include('partials.sidebar_admin')

  <div class="container">

    <h1>List Pesanan Kendaraan</h1>

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>pengguna</th>
          <th>Kendaraan</th>
          <th>Harga</th>
          <th>Tanggal</th>
          <th>Status</th>
          <th>Kirim</th>
          <th>Sampai</th>
        </tr>
      </thead>
      @foreach($kendaraan as $data)
      <tbody>
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $data->id }}</td>
          <td>{{ $data->nama }}</td>
          <td>{{ $data->email }}</td>
          <td>{{ $data->email }}</td>
          <td>{{ $data->email }}</td>
          <td>{{ $data->email }}</td>
          <td>{{ $data->email }}</td>
        </tr>
      </tbody>
      @endforeach
    </table>

  </div>
</body>

</html>