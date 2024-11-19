<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard_admin.css')}}">
</head>
<body>

@include('partials.sidebar_admin')
    <div class="main-content">
        <div class="header">
            <h2>Welcome, Admin</h2>
        </div>
        <div class="info-cards">
            <div class="card">
                <h3>Jumlah Mobil</h3>
                <p></p>
            </div>
            <div class="card">
                <h3>Jumlah Motor</h3>
                <p></p>
            </div>
            <div class="card">
                <h3>Jumlah Pesanan</h3>
                <p></p>
            </div>
            <div class="card">
                <h3>Pesanan Selesai</h3>
                <p></p>
            </div>
            <div class="card">
                <h3>Jumlah Pengguna</h3>
                <p></p>
            </div>
            <div class="card">
                <h3>Jumlah Penyedia</h3>
                <p></p>
            </div>
        </div>
    </div>
</body>
</html>
