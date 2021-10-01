<?php

namespace App\Http\Controllers;

use\App\Officer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfficerController extends Controller
{   
    //add data
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'nama_petugas' => 'required',
                'username' => 'required',
                'password' => 'required',
                'level' => 'required'
            ]
        );

        if($validator -> fails()){
            return Response() -> json($validator->errors());
        }

        $simpan = Officer::create([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => $request->password,
            'level' => $request->level
        ]);

        if($simpan){
            return Response() -> json(['status' => 1]);
        } else{
            return Repsonse() -> json(['status' => 0]);
        }
    }
    //add data end

    
}
