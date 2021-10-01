<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{    
    //add data start
    public function store(Request $request){
        $validator=Validator::make($request->all(),
        ['id_pelanggan' => 'required',
        'id_petugas' => 'required']); 
        
        if($validator->fails()){ 
            return Response()->json($validator->errors());
        }

        $simpan = Order::create([
            'id_pelanggan' => $request->id_pelanggan,
            'id_petugas' => $request->id_petugas, 
            'tgl_transaksi' => date("Y-m-d")]);
            
        if($simpan){
            return Response()->json(['status' => 1]);
        }else {
            return Response()->json(['status' => 0]);
        } 
    }
    //add data end
    
    
}