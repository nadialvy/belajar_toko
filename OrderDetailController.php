<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\OrderDetail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class OrderDetailController extends Controller
{
//add data start
    public function store(Request $request){
        $validator=Validator::make($request->all(),
        ['id_transaksi' => 'required',
        'id_produk' => 'required',
        'qty' => 'required']); 
        
        if($validator->fails()){ 
            return Response()->json($validator->errors());
        }

        $id_produk = $request->id_produk;
        $qty = $request->qty;
        $harga = DB::table('product_tabel')->where('id_produk', $id_produk)->value('harga');
        $subtotal = $harga * $qty;

        $simpan = OrderDetail::create([
            'id_transaksi' => $request->id_transaksi,
            'id_produk' => $id_produk, 
            'qty' => $qty,
            'subtotal' => $subtotal]);
            
        if($simpan){
            return Response()->json(['status' => 1]);
        }else {
            return Response()->json(['status' => 0]);
        } 
    }
    //add data end

    
}