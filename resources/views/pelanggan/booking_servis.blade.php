<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Servis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .row {
            display: flex;
        }
        .sidebar {
            width: 250px;
            background: #343a40;
            padding: 15px;
            min-height: 100vh;
        }
        .sidebar .list-group a {
            display: block;
            padding: 10px;
            color: #fff;
            text-decoration: none;
            border-bottom: 1px solid #495057;
        }
        .sidebar .list-group a:hover,
        .sidebar .list-group .active {
            background: #007bff;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background: #007bff;
            color: white;
        }
        button {
            background: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background: #218838;
        }
        a {
            display: inline-block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="list-group">
                <a href="{{ url('/dashboard/pelanggan') }}" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="{{ url('/pelanggan/booking-servis') }}" class="list-group-item list-group-item-action active">Booking Servis</a>
                <a href="{{ url('/jadwal-servis') }}" class="list-group-item list-group-item-action">Jadwal Servis</a>
                <a href="{{ url('/pelanggan/sparepart') }}">Lihat Sparepart</a>
                <a href="{{ url('/pelanggan/rute-bengkel') }}">Rute Menuju Bengkel</a>
                <a href="{{ url('/logout') }}" class="list-group-item list-group-item-action text-danger">Logout</a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="content">
            <h2>Booking Servis</h2>

            @if(session('error'))
                <p style="color: red;">{{ session('error') }}</p>
            @endif

            <form action="{{ url('/pelanggan/booking-servis') }}" method="POST">
                @csrf
                
                <label>Pilih Bengkel:</label>
                <select name="bengkel_id" required>
                    @foreach ($bengkels as $bengkel)
                        <option value="{{ $bengkel->id_bengkels }}">{{ $bengkel->nama_bengkel }}</option>
                    @endforeach
                </select>

                <label>Jenis Servis:</label>
                <select name="jenis_servis" required>
                    <option value="perbaikan">Perbaikan</option>
                    <option value="servis rutin">Servis Rutin</option>
                </select>

                <label>Plat Kendaraan:</label>
                <input type="text" name="plat_kendaraan" required>

                <label>Jenis Kendaraan:</label>
                <select name="jenis_kendaraan" required>
                    <option value="mobil">Mobil</option>
                    <option value="motor">Motor</option>
                </select>

                <label>Pilih Tanggal:</label>
                <input type="date" name="tanggal_servis" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>

                <label>Pilih Jam:</label>
                <input type="time" name="jam_servis" min="09:00" max="21:00" required>

                <button type="submit">Booking</button>
            </form>

            <h3>Antrian Servis</h3>
            <table>
                <tr>
                    <th>Nama Pelanggan</th>
                    <th>Jam Servis</th>
                    <th>Tanggal Servis</th>
                </tr>
                @forelse ($antrian as $data)
                    <tr>
                        <td>{{ $data->nama_pelanggan }}</td>
                        <td>{{ $data->jam_servis }}</td>
                        <td>{{ $data->tanggal_servis }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Tidak ada antrian.</td>
                    </tr>
                @endforelse
            </table>

            <form method="GET">
                <label>Pilih Bengkel:</label>
                <select name="filter_bengkel">
                    <option value="">Semua Bengkel</option>
                    @foreach ($bengkels as $bengkel)
                        <option value="{{ $bengkel->id_bengkels }}" {{ request('filter_bengkel') == $bengkel->id_bengkels ? 'selected' : '' }}>
                            {{ $bengkel->nama_bengkel }}
                        </option>
                    @endforeach
                </select>

                <label>Pilih Tanggal:</label>
                <input type="date" name="filter_tanggal" value="{{ request('filter_tanggal', date('Y-m-d')) }}">

                <button type="submit">Filter</button>
            </form>

            <a href="/dashboard/pelanggan">Kembali</a>
        </div>
    </div>
</div>

</body>
</html>
