<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mhs;
use App\matkul;
use App\Mengambil;
use DB;
class MengambilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $m = DB::table('mengambil_matkul')->join('mhs','mhs.nrp','=','mengambil_matkul.nrp_mhs')->join('matkuls','matkuls.id_matkul','=','mengambil_matkul.id_matkul')->get();
        // dd($m);
        return view('mengambil.index',compact('m'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mhs = mhs::pluck('nama','nrp');
        $matkul = matkul::pluck('nama_matkul','id_matkul');
         //dd($matkul);
        return view ('mengambil.create',compact('mhs','matkul'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        // dd($input);
         Mengambil::create($request->all());        
        return redirect('/mengambil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
