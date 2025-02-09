<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pelanggan</title>
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
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding-top: 20px;
            height: 100vh;
            position: fixed;
            transition: transform 0.3s ease;
        }

        .sidebar a {
            display: block;
            color: white;
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
            margin: 10px 0;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #2980b9;
        }

        /* Sidebar for mobile */
        .sidebar.closed {
            transform: translateX(-250px);
        }

        /* Main Content */
        .main-container {
            margin-left: 250px;
            padding: 40px;
            width: 100%;
            transition: margin-left 0.3s ease;
        }

        /* Hero Section */
        .hero {
            background-color: #3498db;
            color: white;
            padding: 60px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
            text-align: center;
        }

        .hero h2 {
            font-size: 48px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 30px;
        }

        /* Card Layout for Features */
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            padding: 50px;
        }

        .feature-card {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 350px;
            transition: transform 0.3s ease, background-color 0.3s ease;
            cursor: pointer;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            background-color: #2980b9;
            color: white;
        }

        .feature-card h3 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .feature-card p {
            font-size: 18px;
            color: #666;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            /* Hide sidebar on small screens */
            .sidebar {
                width: 100%;
                position: relative;
                height: auto;
            }

            .sidebar.closed {
                transform: translateX(0);
            }

            .main-container {
                margin-left: 0;
                padding: 20px;
            }

            /* Adjust hero section */
            .hero h2 {
                font-size: 36px;
            }

            .hero p {
                font-size: 18px;
            }

            /* Features section, grid becomes 1 column on small screens */
            .features {
                grid-template-columns: 1fr;
                padding: 20px;
            }

            /* Feature cards adjust */
            .feature-card {
                max-width: 100%;
            }
        }

        /* Button for sidebar toggle */
        .sidebar-toggle {
            display: none;
            background-color: #3498db;
            color: white;
            padding: 15px;
            border: none;
            cursor: pointer;
            position: absolute;
            top: 20px;
            left: 20px;
            border-radius: 5px;
            z-index: 1;
        }

        /* Show sidebar toggle on small screens */
        @media (max-width: 768px) {
            .sidebar-toggle {
                display: block;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2 style="color: white; text-align: center; margin-bottom: 40px;">Pelanggan</h2>
        <a href="{{ url('/jadwal-servis') }}">Jadwal Servis Saya</a>
        <a href="{{ url('/pelanggan/sparepart') }}">Lihat Sparepart</a>
        <a href="{{ url('/pelanggan/booking-servis') }}">Booking Servis</a>
        <a href="{{ url('/pelanggan/rute-bengkel') }}">Rute ke Bengkel</a>
        <a href="{{ url('/logout') }}">Logout</a>
    </div>

    <!-- Sidebar Toggle Button -->
    <button class="sidebar-toggle" onclick="toggleSidebar()">☰</button>

    <!-- Main Content -->
    <div class="main-container">
        <!-- Hero Section -->
        <section class="hero">
            <h2>Selamat Datang, Pelanggan!</h2>
            <p>Temukan berbagai layanan dan fasilitas terbaik untuk kebutuhan kendaraan Anda di dashboard ini.</p>
        </section>

        <!-- Features Section -->
        <section class="features">
            <div class="feature-card" onclick="window.location.href='{{ url('/pelanggan/sparepart') }}'">
                <h3>Lihat Sparepart</h3>
                <p>Temukan sparepart kendaraan yang Anda butuhkan untuk melakukan perbaikan atau perawatan.</p>
            </div>
            <div class="feature-card" onclick="window.location.href='{{ url('/pelanggan/booking-servis') }}'">
                <h3>Booking Servis</h3>
                <p>Pesan servis untuk kendaraan Anda dengan mudah dan jadwalkan waktu yang sesuai.</p>
            </div>
            <div class="feature-card" onclick="window.location.href='{{ url('/pelanggan/rute-bengkel') }}'">
                <h3>Rute ke Bengkel</h3>
                <p>Temukan rute tercepat ke bengkel terdekat untuk kebutuhan perawatan kendaraan Anda.</p>
            </div>
            <div class="feature-card" onclick="window.location.href='/jadwal-servis'">
                <h3>Jadwal Servis Saya</h3>
                <p>jadwal servis anda </p>
            </div>
        </section>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('closed');
        }
    </script>

</body>
</html>
