<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rute ke Bengkel</title>
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
            height: 100vh;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            position: fixed;
            height: 100%;
        }

        .sidebar h3 {
            margin-bottom: 30px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #2980b9;
        }

        /* Main Content Styling */
        .main-content {
            margin-left: 270px;
            padding: 40px;
            width: 100%;
        }

        .main-content h2 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        /* Form Styling */
        label {
            font-size: 18px;
            margin-bottom: 10px;
            display: block;
        }

        select {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }

        button {
            background-color: #2980b9;
            color: white;
            padding: 10px 20px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #3498db;
        }

        /* Map Styling */
        #map {
            width: 100%;
            height: 500px;
            border-radius: 10px;
            margin-top: 20px;
        }

        /* Back Button */
        .back-btn {
            display: inline-block;
            margin-top: 20px;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            text-align: center;
        }

        .back-btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3>Menu</h3>
        <a href="{{ url('/jadwal-servis') }}">Jadwal Servis Saya</a>
        <a href="{{ url('/pelanggan/sparepart') }}">Lihat Sparepart</a>
        <a href="{{ url('/pelanggan/booking-servis') }}">Booking Servis</a>
        {{-- <a href="{{ url('/pelanggan/rute-bengkel') }}">Rute ke Bengkel</a> --}}
        <a href="{{ url('/logout') }}">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">

        <h2>Pilih Bengkel untuk Lihat Rute</h2>

        <!-- Form to select bengkel -->
        <label for="bengkelSelect">Pilih Bengkel:</label>
        <select id="bengkelSelect">
            <option value="">Pilih Bengkel</option>
            @foreach ($bengkels as $bengkel)
                <option value="{{ $bengkel->latitude }},{{ $bengkel->longitude }}">
                    {{ $bengkel->nama_bengkel }}
                </option>
            @endforeach
        </select>

        <!-- Button to show route -->
        <button onclick="showRoute()">Tampilkan Rute</button>

        <!-- Map -->
        <div id="map"></div>

        <!-- Back Button -->
        <a href="/dashboard/pelanggan" class="back-btn">Kembali</a>

    </div>

    <!-- JavaScript for Map and Route -->
    <script>
        function showRoute() {
            let selected = document.getElementById("bengkelSelect").value;
            if (selected) {
                window.location.href = `https://www.google.com/maps/dir/?api=1&destination=${selected}`;
            } else {
                alert('Silakan pilih bengkel terlebih dahulu.');
            }
        }
    </script>

</body>
</html>
