<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8" />  
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
    <title>Pemesanan Mobil</title>  
    <link rel="stylesheet" href="{{ asset('styles/pemesanan_mobil.css') }}" />  
</head>  
<body>  
<style>  
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap");  

        body {  
            margin: 0;  
            font-family: 'Montserrat', sans-serif;  
            background-color: #f5f5f5;  
            color: #333;  
        }  

        .wrap {  
            display: flex;  
            justify-content: center;  
            margin-bottom: 30px;  
        }  

        .wrap ul {  
            display: flex;  
            gap: 50px;  
        }  

        .wrap ul li {  
            font-size: 22px;  
            list-style-type: none;  
            transition: color 0.3s ease;  
        }  

        .wrap ul li a {  
            text-decoration: none;  
            color: #333;  
        }  

        .wrap ul li a:hover {  
            color: #ffcc00;  
            text-shadow: 1px 1px 2px rgba(255, 204, 0, 0.6);  
        }  

        .container {  
            width: 80%;  
            background-color: #fff;  
            margin: 30px auto;  
            border-radius: 15px;  
            padding: 20px;  
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);  
        }  

        .wrapper2 {  
            display: flex;  
            align-items: center;  
            padding: 20px;  
            border-radius: 15px;  
            background-color: #ffcc00;  
            box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.1);  
        }  

        .image-box {  
            flex: 1;  
            max-width: 350px;  
            margin-right: 20px;  
        }  

        .image-box img {  
            width: 100%;  
            height: auto;  
            object-fit: cover;  
            border-radius: 15px;  
            box-shadow: 0 3px 7px rgba(0, 0, 0, 0.15);  
        }  

        .text-box {  
            flex: 2;  
        }  

        .text-box h1 {  
            font-size: 28px;  
            margin: 0;  
            color: #333;  
        }  

        .text-box h3 {  
            font-size: 20px;  
            color: #444;  
            margin: 10px 0;  
        }  

        .button-wrapper {  
            margin-top: 20px;  
            display: flex;  
            justify-content: flex-end;  
            gap: 10px;  
        }  

        .btn {  
            border: none;  
            padding: 12px 24px;  
            border-radius: 25px;  
            font-size: 0.9rem;  
            cursor: pointer;  
            transition: transform 0.2s;  
            outline: none;  
        }  

        .batal {  
            background: transparent;  
            color: #333;  
            border: 1px solid #333;  
        }  

        .batal:hover {  
            transform: scale(1.05);  
            color: #ff6347;  
            border-color: #ff6347;  
        }  

        .beli {  
            background: #333;  
            color: #fff;  
            font-weight: bold;  
        }  

        .beli:hover {  
            transform: scale(1.05);  
            background: #555;  
        }  

        .Deskripsi {  
            margin-top: 30px;  
        }  

        .Deskripsi h3 {  
            font-size: 24px;  
            margin: 10px 0;  
        }  

        .Deskripsi p {  
            margin: 10px 0;  
            text-align: justify;  
            font-size: 16px;  
        }  

        .Deskripsi span {  
            color: #007bff;  
            cursor: pointer;  
        }  
    </style>  

<div class="wrap">  
    <ul>  
        <li><a href="{{ route('pilihanmobil') }}">Mobil</a></li>  
        <li><a href="{{ route('pilihanmotor') }}">Motor</a></li>  
    </ul>  
</div>  

<hr />  

<div class="container">  
    <div class="wrapper2">  
        <div class="image-box">  
            <img src="{{ asset('img/foto/'.$kendaraan->foto) }}" alt="{{ $kendaraan->nama }}" />  
        </div>  
        <div class="text-box">  
            <div class="wrapper-text-box">  
                <h1>{{ $kendaraan->nama }}</h1>  
                <h3>tahun : {{ $kendaraan->tahun }}</h3>  
                <h3 class="status">Status : <strong>{{ $kendaraan->status }}</strong></h3>  
                <h3>Rp. {{ number_format($kendaraan->harga) }} / 24 jam</h3>  
            </div>  
        </div>  
        <div class="button-wrapper">  
            <a class="text-decoration">  
                <button class="btn batal">BATAL</button>  
            </a>  
            <a href="{{ url('checkout', ['id' => $kendaraan->id]) }}">  
                <button class="btn beli">PESAN</button>  
            </a>  
        </div>  
    </div>  
    <div class="Deskripsi">  
        <h3>Deskripsi</h3>  
        <p>{{ $kendaraan->deskripsi }}<span>Lihat Selengkapnya.....</span></p>  
    </div>  
</div>  

</body>  
</html>