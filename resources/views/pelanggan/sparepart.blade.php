<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparepart Bengkel</title>
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
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            position: fixed;
            height: 100%;
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

        /* Main Content */
        .main-content {
            margin-left: 260px;
            padding: 40px;
            width: 100%;
        }

        .main-content h2 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        /* Form Styling */
        form {
            margin-bottom: 30px;
        }

        form label {
            font-size: 18px;
            margin-right: 10px;
        }

        select {
            padding: 8px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        /* Container for Sparepart Cards */
        .sparepart-list {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* 4 items per row */
            gap: 20px;
            margin-top: 30px;
        }

        /* Card for Sparepart Items */
        .sparepart-card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .sparepart-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .sparepart-card img {
            width: 150px; /* Perbesar ukuran gambar */
            height: 150px; /* Perbesar ukuran gambar */
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .sparepart-card h3 {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }

        .sparepart-card p {
            color: #666;
            font-size: 16px;
        }

        /* Modern Button */
        .btn {
            background-color: #2980b9;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            display: inline-block;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #3498db;
        }

        /* Responsiveness for small screens */
        @media (max-width: 1024px) {
            .sparepart-list {
                grid-template-columns: repeat(2, 1fr); /* 2 items per row on smaller screens */
            }
        }

        @media (max-width: 600px) {
            .sparepart-list {
                grid-template-columns: 1fr; /* 1 item per row on very small screens */
            }
        }

    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3>Menu</h3>
        <a href="{{ url('/jadwal-servis') }}">Jadwal Servis Saya</a>
        {{-- <a href="{{ url('/pelanggan/sparepart') }}">Lihat Sparepart</a> --}}
        <a href="{{ url('/pelanggan/booking-servis') }}">Booking Servis</a>
        <a href="{{ url('/pelanggan/rute-bengkel') }}">Rute ke Bengkel</a>
        <a href="{{ url('/logout') }}">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">

        <h2>Lihat Sparepart</h2>

        <!-- Filter by Bengkel -->
        <form method="GET">
            <label>Pilih Bengkel:</label>
            <select name="bengkel_id" onchange="this.form.submit()">
                <option value="">Semua Bengkel</option>
                @foreach ($bengkels as $bengkel)
                    <option value="{{ $bengkel->id_bengkels }}" {{ request('bengkel_id') == $bengkel->id_bengkels ? 'selected' : '' }}>
                        {{ $bengkel->nama_bengkel }}
                    </option>
                @endforeach
            </select>
        </form>

        <!-- Sparepart List -->
        <div class="sparepart-list">
            @foreach ($spareparts as $sparepart)
                <div class="sparepart-card">
                    <h3>{{ $sparepart->nama_barang }}</h3>
                    @if ($sparepart->gambar)
                        <img src="{{ asset('storage/' . $sparepart->gambar) }}" alt="{{ $sparepart->nama_barang }}">
                    @else
                        <p>Tidak ada gambar</p>
                    @endif
                    <p>Harga: Rp{{ number_format($sparepart->harga) }}</p>
                    {{-- <a href="#" class="btn">Beli Sekarang</a> --}}
                </div>
            @endforeach
        </div>

        {{-- <a href="/dashboard/pelanggan" class="btn">Kembali ke Dashboard</a> --}}

    </div>

</body>
</html>
