<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Barang</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            line-height: 1.6;
            display: flex;
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
            color: inherit; /* Warna bawaan (tidak biru) */
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

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 32px;
            margin-bottom: 20px;
            color: #333;
        }

        /* Success/Error Message Styling */
        .message {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .message.success {
            background-color: #27ae60;
            color: white;
        }

        .message.error {
            background-color: #e74c3c;
            color: white;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #2980b9;
            color: white;
            font-weight: 600;
        }

        td {
            background-color: #ecf0f1;
        }

        /* Link and Button Styling */
        a {
            text-decoration: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Tombol Tambah Barang tetap biru */
        .tambah {
            background-color: #3498db;
            color: white;
            display: inline-block;
            margin-bottom: 20px;
        }

        .tambah:hover {
            background-color: #2980b9;
        }

        button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #c0392b;
        }

        /* Image Styling */
        img {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }

            th, td {
                padding: 10px;
            }

            a, button {
                font-size: 14px;
            }

            img {
                max-width: 80px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h3>Menu Bengkel</h3>
        <a href="{{ route('barang.index') }}">Kelola Barang</a>
        <a href="{{ route('booking_servis.index') }}">Manajemen Servis</a>
        <a href="{{ url('/bengkel/edit-lokasi') }}">Kelola Lokasi</a>
        <a href="{{ url('/logout') }}">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <h2>Kelola Barang</h2>

            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="message success">{{ session('success') }}</div>
            @endif

            <!-- Add Barang Button -->
            <a href="{{ route('barang.create') }}" class="tambah">Tambah Barang</a>

            <!-- Barang Table -->
            <table>
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Deskripsi</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barangs as $barang)
                        <tr>
                            <td>{{ $barang->nama_barang }}</td>
                            <td>{{ $barang->deskripsi }}</td>
                            <td>{{ $barang->stok }}</td>
                            <td>Rp{{ number_format($barang->harga, 0, ',', '.') }}</td>
                            <td>
                                @if($barang->gambar)
                                    <img src="{{ asset('storage/' . $barang->gambar) }}" alt="Gambar {{ $barang->nama_barang }}">
                                @else
                                    Tidak ada gambar
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('barang.edit', $barang->id_barangs) }}">Edit</a> |
                                <form action="{{ route('barang.destroy', $barang->id_barangs) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus barang ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
