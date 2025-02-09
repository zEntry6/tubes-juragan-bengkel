<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    public function dashboard()
    {
        return view('pelanggan.dashboard');
    }

    // 1. Lihat Sparepart dengan filter bengkel
    public function sparepart(Request $request)
    {
        $bengkels = DB::table('bengkels')->get();

        $spareparts = DB::table('barangs')
        ->select('nama_barang', 'harga', 'gambar') // Tambahkan 'gambar'
            ->when($request->input('bengkel_id'), function ($query, $bengkelId) {
                return $query->where('id_bengkels', $bengkelId);
            })
            ->get();

        return view('pelanggan.sparepart', compact('bengkels', 'spareparts'));
    }

    

public function bookingServis(Request $request)
{
    $bengkels = DB::table('bengkels')->get();
    $tanggal = $request->input('filter_tanggal', date('Y-m-d')); // Default: hari ini
    $bengkelId = $request->input('filter_bengkel'); // Default: semua bengkel

    $antrian = DB::table('booking_servis')
        ->join('users', 'users.id_users', '=', 'booking_servis.id_users')
        ->select('users.name as nama_pelanggan', 'booking_servis.jam_servis', 'booking_servis.tanggal_servis')
        ->where('booking_servis.tanggal_servis', $tanggal)
        ->when($bengkelId, function ($query, $bengkelId) {
            return $query->where('booking_servis.id_bengkels', $bengkelId);
        })
        ->orderBy('booking_servis.jam_servis')
        ->get();

    return view('pelanggan.booking_servis', compact('bengkels', 'antrian', 'tanggal', 'bengkelId'));
}



    public function prosesBookingServis(Request $request)
    {
        $request->validate([
            'bengkel_id' => 'required',
            'jenis_servis' => 'required|in:perbaikan,servis rutin',
            'plat_kendaraan' => 'required|string|max:255',
            'jenis_kendaraan' => 'required|in:mobil,motor',
            'tanggal_servis' => 'required|date|after:today',
            'jam_servis' => 'required',
        ]);
    
        // Cek apakah sudah ada booking di jam tersebut
        $cek_antrian = DB::table('booking_servis')
            ->where('id_bengkels', $request->input('bengkel_id'))
            ->where('tanggal_servis', $request->input('tanggal_servis'))
            ->where('jam_servis', $request->input('jam_servis'))
            ->exists();
    
        if ($cek_antrian) {
            return back()->with('error', 'Jam tersebut sudah penuh, pilih jam lain.');
        }
    
        // Simpan booking ke database
        DB::table('booking_servis')->insert([
            'id_users' => session('user_id'),
            'id_bengkels' => $request->input('bengkel_id'),
            'jenis_servis' => $request->input('jenis_servis'),
            'plat_kendaraan' => $request->input('plat_kendaraan'),
            'jenis_kendaraan' => $request->input('jenis_kendaraan'),
            'tanggal_servis' => $request->input('tanggal_servis'),
            'jam_servis' => $request->input('jam_servis'),
            'status_servis' => 'belum',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        return redirect('/dashboard/pelanggan')->with('success', 'Booking servis berhasil!');
    }
    

    // 3. Rute ke Bengkel
    public function ruteBengkel()
    {
        $bengkels = DB::table('bengkels')->get();
        return view('pelanggan.rute_bengkel', compact('bengkels'));
    }
    

    public function jadwalServis()
{
    $userId = session('user_id'); // Ambil ID user dari session

    $jadwal = DB::table('booking_servis')
        ->join('bengkels', 'bengkels.id_bengkels', '=', 'booking_servis.id_bengkels')
        ->select('bengkels.nama_bengkel', 'booking_servis.*')
        ->where('booking_servis.id_users', $userId)
        ->orderBy('booking_servis.tanggal_servis', 'asc')
        ->orderBy('booking_servis.jam_servis', 'asc')
        ->get();

    return view('pelanggan.jadwal_servis', compact('jadwal'));
}
}
