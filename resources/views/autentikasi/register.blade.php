<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        overflow: hidden;
        background-image: url('https://bengkelqu.id/storage/photos/28/fungsi%20manajemen%20bengkel%202%20(1).jpg'); /* Ganti dengan URL yang diinginkan */
        background-size: cover;
        background-position: center;
        }
        .form-container {
        width: 450px;
        background-color: rgba(255, 255, 255, 0.9);
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(8, 7, 16, 0.4);
        max-height: 90vh;
        overflow-y: auto;
    }
        form h3 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-size: 14px;
            margin-top: 10px;
            display: block;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            border: none;
        }
        #bengkel-fields {
            display: none;
        }
        .map-container {
            width: 100%;
            height: 250px;
            border-radius: 8px;
            margin-top: 10px;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form action="/register" method="POST">
            @csrf
            <h3>Register</h3>
            <label for="name">Nama</label>
            <input type="text" name="name" placeholder="Nama" required>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Email" required>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" required>
            <label for="role">Role</label>
            <select name="role" id="role" required>
                <option value="Pelanggan">Pelanggan</option>
                <option value="Pemilik Bengkel">Pemilik Bengkel</option>
            </select>
            <div id="bengkel-fields">
                <label for="nama_bengkel">Nama Bengkel</label>
                <input type="text" name="nama_bengkel" placeholder="Nama Bengkel">
                <label for="lokasi_bengkel">Detail Alamat Bengkel</label>
                <input type="text" name="lokasi_bengkel" placeholder="Detail lokasi bengkel seperti sudut mana atau belokan apa">
                <label>Pilih Lokasi Bengkel</label>
                <div id="map" class="map-container"></div>
                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">
            </div>
            <button type="submit">Daftar</button>
        </form>
        <div class="login-link">
            <p>Sudah Punya Akun? <a href="/login">Login</a></p>
        </div>
    </div>
    <script>
        document.getElementById('role').addEventListener('change', function() {
            const bengkelFields = document.getElementById('bengkel-fields');
            if (this.value === 'Pemilik Bengkel') {
                bengkelFields.style.display = 'block';
                setTimeout(initializeMap, 300);
            } else {
                bengkelFields.style.display = 'none';
            }
        });
        function initializeMap() {
            if (document.getElementById('map').children.length > 0) return;
            var map = L.map('map').setView([-6.200000, 106.816666], 12);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);
            var marker;
            map.on('click', function(e) {
                if (marker) map.removeLayer(marker);
                marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
                document.getElementById('latitude').value = e.latlng.lat;
                document.getElementById('longitude').value = e.latlng.lng;
            });
        }
    </script>
    
</body>
</html>
