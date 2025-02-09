<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Jadwal Servis Di Bengkel Anda</title>
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
            min-height: 100vh;
        }

        .sidebar h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            padding: 10px;
            border-bottom: 1px solid #34495e;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
        }

        .sidebar ul li a:hover {
            background-color: #34495e;
            border-radius: 5px;
        }

        /* Container for the content */
        .container {
            flex: 1;
            max-width: 1200px;
            margin: 20px;
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

        /* Select and Button Styling */
        select, button {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
        }

        button {
            background-color: #3498db;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: none;
        }

        button:hover {
            background-color: #2980b9;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                min-height: auto;
                text-align: center;
            }

            .sidebar ul li {
                display: inline-block;
                margin-right: 10px;
            }

            .container {
                margin: 10px;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h3>Menu</h3>
        <ul>
            <li><a href="{{ url('dashboard/bengkel') }}">Dashboard</a></li>
            <li><a href="{{ route('barang.index') }}">Kelola Barang</a></li>
        <li><a href="{{url('/bengkel/edit-lokasi')  }}">Kelola Lokasi</a></li>
        </ul>
    </div>

    <!-- Container for the content -->
    <div class="container">

        <h2>Manajemen Booking Servis</h2>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="message success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="message error">{{ session('error') }}</div>
        @endif

        <!-- Booking Table -->
        <table>
            <thead>
                <tr>
                    <th>Pelanggan</th>
                    <th>Jenis Kendaraan</th>
                    <th>Tanggal Servis</th>
                    <th>Jam Servis</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($booking_servis as $booking)
                    <tr>
                        <td>{{ $booking->id_users }}</td>
                        <td>{{ $booking->jenis_kendaraan }}</td>
                        <td>{{ $booking->tanggal_servis }}</td>
                        <td>{{ $booking->jam_servis }}</td>
                        <td>{{ ucfirst($booking->status_servis) }}</td>
                        <td>
                            <form action="{{ route('booking_servis.update_status', $booking->id_servis) }}" method="POST">
                                @csrf
                                <select name="status">
                                    <option value="belum" {{ $booking->status_servis == 'belum' ? 'selected' : '' }}>Belum</option>
                                    <option value="sudah" {{ $booking->status_servis == 'sudah' ? 'selected' : '' }}>Sudah</option>
                                </select>
                                <button type="submit">Update</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>
</html>
