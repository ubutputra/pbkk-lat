<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    //
    public function input($id){
     
        $m = Mengambil::findorfail($id);
        dd($m);
        return view('nilai.index',compact('m'));
    }
}
