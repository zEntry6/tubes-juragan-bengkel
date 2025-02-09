<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body Styling */
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f6f9;
    line-height: 1.6;
    padding: 20px;
}

/* Container for content */
.container {
    max-width: 1200px;
    margin: 0 auto;
    background-color: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Heading */
h2 {
    font-size: 32px;
    margin-bottom: 20px;
    color: #333;
}

/* Table Styling */
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    border-radius: 8px;
    overflow: hidden;
}

.table thead {
    background-color: #2980b9;
    color: white;
}

.table th, .table td {
    padding: 15px;
    text-align: left;
    border: 1px solid #ddd;
}

.table tbody tr:nth-child(even) {
    background-color: #ecf0f1;
}

.table tbody tr:nth-child(odd) {
    background-color: #f9f9f9;
}

/* Hover effect for table rows */
.table tbody tr:hover {
    background-color: #d1e4f1;
}

/* Responsive Design */
@media (max-width: 768px) {
    .table {
        font-size: 14px;
    }

    .table th, .table td {
        padding: 12px;
    }
}

    </style>
</head>

<body>
    <div class="container">
        <h2>Jadwal Servis Saya</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Bengkel</th>
                    <th>Tanggal Servis</th>
                    <th>Jam Servis</th>
                    <th>Jenis Servis</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jadwal as $item)
                    <tr>
                        <td>{{ $item->nama_bengkel }}</td>
                        <td>{{ $item->tanggal_servis }}</td>
                        <td>{{ $item->jam_servis }}</td>
                        <td>{{ ucfirst($item->jenis_servis) }}</td>
                        <td>{{ ucfirst($item->status_servis) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ url('/pelanggan/rute-bengkel') }}">perlu rute?</a>
       <h3> <center><a href="{{ url('/dashboard/pelanggan') }}" class="list-group-item list-group-item-action">Dashboard</a></center></h3>
    </div>
</body>
</html>