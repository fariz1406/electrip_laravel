<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Kendaraan</title>
  <link rel="stylesheet" href="{{ asset('css/admin/data_kendaraan.css')}}">
</head>

<body>
@include('partials.sidebar_admin')
  <div class="container">
    <h1>List Semua Kendaraan</h1> 
    <a href="kendaraan/tambah"><button class="button-9" role="button">Tambah Kendaraan</button></a>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama / Merk</th>
          <th>Kategori</th>
          <th>Harga</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      
      @foreach($kendaraan as $data)
      <tbody>
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $data->nama }}</td>
          <td>{{ $data->kategori_id }}</td>
          <td>{{ $data->harga }}</td>
          <td>{{ $data->status }}</td>
          <td>
            <a href="{{ route('kendaraan.edit', $data->id) }}">Edit</a>
            <form action="{{ route('kendaraan.delete', $data->id) }}">
              @csrf 
              <button type="button" style="background-color: red; padding: 5px; border-radius: 20%;">Hapus</button>
            </form>
          </td>
        </tr>
      </tbody>
      @endforeach

</body>

</html>