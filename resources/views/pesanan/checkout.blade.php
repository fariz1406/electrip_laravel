<!-- batas -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pemesanan Kendaraan</title>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdmfOHSWTdGQ3rz5c70Usj-L6TAScrCy0&callback=initMap" async defer></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #121212;
    }

    .container {
      padding-top: 50px;
      display: flex;
      max-width: 1200px;
      margin: 20px auto;
      background: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-section {
      flex: 1;
      background-color: gray;
      color: white;
      padding: 30px;
    }

    .form-section h1 {
      margin-bottom: 20px;
      font-size: 24px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .form-control {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: none;
    }

    .form-control:focus {
      outline: none;
      box-shadow: 0 0 5px rgba(255, 255, 255, 0.7);
    }

    .btn {
      display: block;
      width: 100%;
      padding: 10px;
      font-size: 16px;
      color: white;
      background: #ffa500;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 15px;
    }

    .btn:hover {
      background: #e59400;
    }

    .details-section {
      flex: 1;
      padding: 30px;
      background-color: #FFCC00;
      text-align: center;
    }


    .image-box {
      max-width: 95%;
      border-radius: 10px;
      margin-bottom: 20px;
    }

    .image-box img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
      border-radius: 15px;
      margin-top: 10px;
      border: 2px solid black;
    }

    .details-section h2 {
      margin-bottom: 15px;
    }

    #map {
      width: 100%;
      height: 200px;
      margin-bottom: 15px;
      border-radius: 5px;
    }
  </style>
</head>

<body>
  @include('partials.navbar')
  <div class="container">
    <!-- Form Input Section -->
    <div class="form-section">
      <form action="" method="POST">
        @csrf
        <!-- Tanggal dan Waktu Mulai -->
        <div class="form-group">
          <label for="tanggal_mulai">Tanggal dan Waktu Mulai Sewa</label>
          <input type="datetime-local" id="tanggal_mulai" name="tanggal_mulai" class="form-control" required>
        </div>

        <!-- Tanggal Selesai -->
        <div class="form-group">
          <label for="tanggal_selesai">Tanggal Selesai Sewa</label>
          <input type="date" id="tanggal_selesai" name="tanggal_selesai" class="form-control" required>
        </div>

        <!-- Lokasi Penjemputan -->
        <div class="form-group">
          <label for="lokasi_penjemputan">Lokasi Penjemputan</label>
          <input type="text" id="lokasi_penjemputan" name="lokasi_penjemputan" class="form-control" placeholder="Pilih lokasi di peta" readonly required>
          <div id="map"></div>
          <input type="hidden" id="latitude" name="latitude">
          <input type="hidden" id="longitude" name="longitude">
        </div>

        <!-- Pesan -->
        <div class="form-group">
          <label for="pesan">Pesan (Opsional)</label>
          <textarea id="pesan" name="pesan" rows="3" class="form-control" placeholder="Masukkan pesan tambahan"></textarea>
        </div>

        <button type="submit" class="btn">Pesan Sekarang</button>
      </form>
    </div>

    <!-- Details Section -->
    <div class="details-section">
      <div class="image-box">
        <img src="{{ asset('img/kendaraan/' . $kendaraan->foto) }}" />
      </div>
      <h2>{{ $kendaraan->nama }}</h2>
      <p><strong>Harga:</strong> Rp {{ $kendaraan->harga }}/hari</p>
    </div>
  </div>

  <script>
    let map, marker;

    function initMap() {
      // Inisialisasi Map
      map = new google.maps.Map(document.getElementById("map"), {
        center: {
          lat: -6.200000,
          lng: 106.816666
        }, // Lokasi default (Jakarta)
        zoom: 13,
      });

      // Marker Default
      marker = new google.maps.Marker({
        position: {
          lat: -6.200000,
          lng: 106.816666
        },
        map: map,
        draggable: true,
      });

      // Event Listener Saat Map Diklik
      map.addListener("click", (event) => {
        const latLng = event.latLng;
        placeMarker(latLng);
        geocodeLatLng(latLng);
      });

      // Event Listener Drag pada Marker
      marker.addListener("dragend", (event) => {
        const latLng = event.latLng;
        geocodeLatLng(latLng);
      });
    }

    function placeMarker(location) {
      marker.setPosition(location);
      map.panTo(location);
    }

    function geocodeLatLng(latLng) {
      const geocoder = new google.maps.Geocoder();

      geocoder.geocode({
        location: latLng
      }, (results, status) => {
        if (status === "OK") {
          if (results[0]) {
            const alamat = results[0].formatted_address;
            document.getElementById("lokasi_penjemputan").value = alamat;
            document.getElementById("latitude").value = latLng.lat();
            document.getElementById("longitude").value = latLng.lng();
          } else {
            alert("Alamat tidak ditemukan");
          }
        } else {
          alert("Geocoder gagal: " + status);
        }
      });
    }
  </script>
</body>

</html>