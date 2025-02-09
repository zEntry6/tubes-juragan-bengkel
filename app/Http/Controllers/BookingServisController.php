<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BookingServisController extends BengkelController
{
    public function index()
    {
        $id_bengkels = DB::table('bengkels')->where('id_users', Session::get('user_id'))->value('id_bengkels');
        $booking_servis = DB::table('booking_servis')->where('id_bengkels', $id_bengkels)->get();
        return view('bengkel.booking_servis.index', compact('booking_servis'));
    }

    public function updateStatus(Request $request, $id)
    {
        DB::table('booking_servis')->where('id_servis', $id)->update([
            'status_servis' => $request->status
        ]);

        return redirect()->route('booking_servis.index')->with('success', 'Status servis diperbarui.');
    }
}
