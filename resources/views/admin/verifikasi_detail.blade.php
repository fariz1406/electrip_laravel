<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Verifikasi</title>
    <link rel="stylesheet" href="{{ asset('css/admin/verifikasi_detail.css') }}" />
</head>

<body>
    @include('partials.sidebar_admin')

    <div class="main-content">
        <form action="{{ route('validasi.verifikasi.update', $verifikasi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card">
                <div class="images">
                    <div class="image-box">
                        <img src="{{ asset($verifikasi->foto_ktp) }}" alt="Foto KTP" />
                    </div>
                    <div class="image-box">
                        <img src="{{ asset($verifikasi->foto_sim) }}" alt="Foto SIM" />
                    </div>
                </div>

                <div class="teks">
                    <div class="teks1">
                        <h3>Nama Lengkap: {{ $verifikasi->nama_lengkap }}</h3>
                        <p>NIK: {{ $verifikasi->nik }}</p>
                        <p>Jenis Kelamin: {{ $verifikasi->kelamin }}</p>
                        <p>Tanggal Lahir: {{ $verifikasi->tanggal_lahir }}</p>
                        <p>Alamat: {{ $verifikasi->alamat }}</p>
                        <p>Validasi: {{ $verifikasi->validasi }}</p>
                    </div>
                </div>
            </div>

            <div class="tombol">
                <button type="submit" name="status" value="tidak" id="tidak">Tidak</button>
                <button type="submit" name="status" value="setuju" id="setuju">Setuju</button>
            </div>
        </form>
    </div>
</body>

</html>
<!-- storage/app/img/ktp/HIJNbFAMBOgFyfLFh3NbKgHor5w6Fy3Gf0mVlLrc.jpg -->