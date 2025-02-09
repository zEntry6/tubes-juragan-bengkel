<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BengkelController extends Controller
{
    

    public function dashboard()
    {
        $id_users = Session::get('user_id');
        $role = Session::get('role');

        if ($role !== 'Pemilik Bengkel') {
            return redirect('/dashboard/pelanggan')->with('error', 'Akses ditolak!');
        }

        $bengkel = DB::table('bengkels')->where('id_users', $id_users)->first();

        return view('bengkel.dashboard', [
            'id_users' => $id_users,
            'id_bengkels' => $bengkel->id_bengkels ?? null,
            'bengkel_nama' => $bengkel->nama_bengkel ?? 'Belum Terdaftar'
        ]);
    }

    public function editLokasi()
{
    $id_users = session('user_id');
    $bengkel = DB::table('bengkels')->where('id_users', $id_users)->first();

    if (!$bengkel) {
        return redirect('/dashboard/bengkel')->with('error', 'Bengkel tidak ditemukan.');
    }

    return view('bengkel.edit_lokasi', compact('bengkel'));
}

public function updateLokasi(Request $request)
{
    $request->validate([
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
    ]);

    $id_users = session('user_id');

    DB::table('bengkels')
        ->where('id_users', $id_users)
        ->update([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'updated_at' => now(),
        ]);

    return redirect('/dashboard/bengkel')->with('success', 'Lokasi bengkel berhasil diperbarui!');
}

}
