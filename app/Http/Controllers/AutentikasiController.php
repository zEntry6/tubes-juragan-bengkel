<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AutentikasiController extends Controller
{
    // Tampilkan form register
    public function formRegister()
    {
        return view('autentikasi.register');
    }

    // Proses register
    public function register(Request $request)
    {
        $role = $request->input('role');

        $id_users = DB::table('users')->insertGetId([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $role,
        ]);

        if ($role === 'Pemilik Bengkel') {
            DB::table('bengkels')->insert([
                'id_users' => $id_users,
                'nama_bengkel' => $request->input('nama_bengkel'),
                'lokasi_bengkel' => $request->input('lokasi_bengkel'),
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
            ]);
        }

        return redirect('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    // Tampilkan form login
    public function formLogin()
    {
        return view('autentikasi.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $user = DB::table('users')->where('email', $request->input('email'))->first();

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return back()->with('error', 'Email atau password salah');
        }

        Session::put('user_id', $user->id_users);
        Session::put('role', $user->role);

        return $user->role === 'Pemilik Bengkel' 
            ? redirect('/dashboard/bengkel') 
            : redirect('/dashboard/pelanggan');
    }

    // Logout
    public function logout()
    {
        Session::flush();
        return redirect('/login')->with('success', 'Anda telah logout.');
    }
}
