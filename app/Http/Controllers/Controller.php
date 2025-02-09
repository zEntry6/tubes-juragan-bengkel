<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function getter_setter(){
        // ambil data user 
        $id_bengkels = DB::table('bengkels')->where('id_users', Session::get('user_id'))->value('id_bengkels');
        $id_users = Session::get('user_id');
        $id_booking_servis = DB::table('booking_servis')->where('id_bengkels', $id_bengkels)->get();
        // $barang=ModelBarang::all()->filter();
        //orm?
        //katanya pakai usecase buat sequence diagram + class diagram yakin ga ribet masukin model class?
        //mau tambah fitur payment + ekspedisi pake api(xendit+rajaongkir+express->yg gratis)
    }


    
}
