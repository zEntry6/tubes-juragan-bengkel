<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
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

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            height: 150vh;
        }

        .sidebar h3 {
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
        }

        /* Container for the content */
        .container {
            flex: 1;
            max-width: 800px;
            margin: 20px auto;
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

        /* Form Styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-size: 16px;
            color: #333;
        }

        input, textarea {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #ecf0f1;
        }

        input[type="file"] {
            padding: 5px;
        }

        button {
            padding: 12px 20px;
            font-size: 16px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h3>Menu</h3>
        <ul>
            <li><a href="{{ url('dashboard/bengkel') }}">Dashboard</a></li>
            <li><a href="{{ route('barang.index') }}">Kelola Barang</a></li>
           <li> <a href="{{ url('/bengkel/edit-lokasi') }}">Kelola Lokasi</a></li>
            <li><a href="{{ url('/logout') }}">Logout</a></li>
        </ul>
    </div>

    <div class="container">
        <h2>Edit Barang</h2>

        <form action="{{ route('barang.update', $barang->id_barangs) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="nama_barang">Nama Barang:</label>
            <input type="text" id="nama_barang" name="nama_barang" value="{{ $barang->nama_barang }}" required>

            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" required>{{ $barang->deskripsi }}</textarea>

            <label for="stok">Stok:</label>
            <input type="number" id="stok" name="stok" value="{{ $barang->stok }}" required>

            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" value="{{ $barang->harga }}" required>

            <label for="gambar">Gambar Barang (Opsional):</label>
            <input type="file" id="gambar" name="gambar" accept="image/*">

            <button type="submit">Update</button>
        </form>
    </div>

</body>
</html>
