<?php

namespace App\Http\Controllers;

use App\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller
{   
    
    //add data
    public function store(Request $request) //store digunakna untuk menambah data
    {
        $validator=Validator::make($request->all(),
            [
                'nama' => 'required',
                'alamat' => 'required',
                'telp' => 'required',
                'username' => 'required',
                'password' => 'required'
            ]
        ); 
    
        if($validator -> fails()) {
            return Response() -> json($validator->errors());
        }

        //input user yang ditampung req, ditambahkan sebagai data baru melalui model kelas, method create
        $simpan = Customers::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'username' => $request->username,
            'password' => $request->password
        ]);

        if($simpan){
            return Response() -> json(['status' => 1]);
        }
        else {
            return Response() -> json(['status' => 0]);
        }
    }
    //add data end

}
