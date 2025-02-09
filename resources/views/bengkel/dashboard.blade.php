<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Bengkel</title>
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

        /* Section Styling */
        .section {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .section h3 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .section p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        /* Success & Error Message Styling */
        .message {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .message.success {
            background-color: #27ae60;
            color: white;
        }

        .message.error {
            background-color: #e74c3c;
            color: white;
        }

        /* Logout Button Styling */
        .logout-btn {
            display: inline-block;
            background-color: #e74c3c;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            margin-top: 20px;
            text-align: center;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3>Menu Bengkel</h3>
        <a href="{{ route('barang.index') }}">Kelola Barang</a>
        <a href="{{ route('booking_servis.index') }}">Manajemen Servis</a>
        <a href="{{url('/bengkel/edit-lokasi')  }}">Kelola Lokasi</a>
        <a href="{{ url('/logout') }}">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">

        <h2>Dashboard Pemilik Bengkel</h2>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="message success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="message error">{{ session('error') }}</div>
        @endif

        <!-- Bengkel Information Section -->
        <div class="section">
            <h3>Informasi Bengkel</h3>
            <p><strong>ID Users:</strong> {{ $id_users }}</p>
            <p><strong>ID Bengkels:</strong> {{ $id_bengkels ?? 'Belum Terdaftar' }}</p>
            <p><strong>Nama Bengkel:</strong> {{ $bengkel_nama }}</p>
        </div>

        <!-- Welcome Message -->
        <div class="section">
            {{-- <h3>Selamat Datang, {{ session('name') }}</h3> --}}
            <h5>Selamat Datang Pemilik atau Penglola,</h5><h3>{{ $bengkel_nama }}</h3>
        </div>

        <!-- Logout Button -->
        <a href="/logout" class="logout-btn">Logout</a>

    </div>

</body>
</html>
