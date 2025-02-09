<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Landing Page with Background</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            overflow-x: hidden; /* To prevent horizontal scroll */
            background-image: url('https://bengkelqu.id/storage/photos/28/fungsi%20manajemen%20bengkel%202%20(1).jpg'); /* Background Image */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
        }

        /* Main Container */
        .main-container {
            position: relative;
            z-index: 1;
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px;
        }

        /* Hero Section */
        .hero {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            background-color: rgba(52, 152, 219, 0.8); /* Semi-transparent background for text */
            color: white;
            border-radius: 10px;
            padding: 60px 40px;
            margin-bottom: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .hero h2 {
            font-size: 48px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 30px;
            text-align: center;
        }

        .cta-button {
            background-color: #2980b9;
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            font-size: 20px;
            border-radius: 30px;
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: #3498db;
        }

        /* Feature Section */
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            justify-items: center;
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
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .feature-card h3 {
            font-size: 30px;
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
            .hero h2 {
                font-size: 36px;
            }

            .hero p {
                font-size: 18px;
            }

            .cta-button {
                font-size: 18px;
            }

            .features {
                grid-template-columns: 1fr;
            }
        }

    </style>
</head>
<body>

    <!-- Main Container -->
    <div class="main-container">

        <!-- Hero Section -->
        <section class="hero">
            <h2>Juragan Bengkel</h2>
            
            <p>Website Gratis Untuk Pengelolaan Barang -Servis Dan Booking Servis </p>
            <a href="/login" class="cta-button">Mulai Coba </a>
        </section>

        <!-- Features Section -->
        <section class="features">
            <div class="feature-card">
                <h3>Booking Servis Online</h3>
                <p>Disini kamu bisa memesan booking servis kendaraan mu secara online jadi tidak perlu ngantri di tempat lagi</p>
            </div>
            
            <div class="feature-card">
                <h3>Manajemen Bengkel Yang Fleksibel</h3>
                <p>Dengan fitur kelola barang yang akan di pajang dan penjadwalan servis akan mempermudah pengelolaannya</p>
            </div>

            <div class="feature-card">
                <h3>Cek Sparepart Bengkel</h3>
                <p>Fitur ini memperbolehkan anda untuk melihat ketersediaan sparepart di bengkel yang telah terdaftar</p>
            </div>
            
            
        </section>

    </div>

</body>
</html>
