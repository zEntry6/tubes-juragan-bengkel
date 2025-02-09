<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lokasi Bengkel</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        /* Form Styling */
        form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin: 20px 0;
        }

        p {
            font-size: 16px;
            margin-bottom: 20px;
            color: #555;
        }

        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }

        button:hover {
            background-color: #2980b9;
        }

        /* Map Container */
        #map {
            height: 400px;
            width: 100%;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        /* Media Queries for responsiveness */
        @media (max-width: 768px) {
            h2 {
                font-size: 28px;
            }

            button {
                padding: 12px;
                font-size: 18px;
            }
        }

        
    </style>
</head>
<body>
    <h2>Edit Lokasi Bengkel</h2>

    <form action="{{ route('bengkel.updateLokasi') }}" method="POST">
        @csrf
        <div id="map"></div>

        <input type="hidden" id="latitude" name="latitude" value="{{ $bengkel->latitude }}">
        <input type="hidden" id="longitude" name="longitude" value="{{ $bengkel->longitude }}">

        <p>Edit lokasi anda yang telah disesuaikan dengan menggeser pin penanda lokasi pada peta di bawah.</p>

        <button type="submit">Simpan Lokasi</button>
        <br><br>
      <h3>  <a href="{{ url('/dashboard/bengkel') }}" >Gak jadi ubah kembali aja?</a></h3>
    </form>

    <script>
        var lat = {{ $bengkel->latitude ?? -6.200000 }};
        var lng = {{ $bengkel->longitude ?? 106.816666 }};

        var map = L.map('map').setView([lat, lng], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        var marker = L.marker([lat, lng], { draggable: true }).addTo(map);
        
        marker.on('dragend', function(event) {
            var position = marker.getLatLng();
            document.getElementById('latitude').value = position.lat;
            document.getElementById('longitude').value = position.lng;
        });
    </script>
</body>
</html>
