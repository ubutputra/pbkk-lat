<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dosen;
use App\matkul;
use App\Mengajar;
use DB;
use Auth;
class MengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = Auth::user()->nrp;
        $m = DB::table('mengajar')->join('dosens','mengajar.id_dosen','=','dosens.nip')->join('matkuls','mengajar.id_matkul','=','matkuls.id_matkul')->get();
        // $matkul = DB::table('mengajar')->join('matkuls','mengajar.id_matkul','=','matkuls.id_matkul')->get();
        // dd($m);
       
        // $dsn = dosen::with('mhs')->paginate(10);
        //dd($matkul);
        //echo $dsn;

        return view('mengajar.index',compact('m'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $dsn = dosen::pluck('namadosen','nip');
        $matkul = matkul::pluck('nama_matkul','id_matkul');
        // dd($dsn);
        return view ('mengajar.create',compact('dsn','matkul'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        //dd($input);
        Mengajar::create($request->all());        
        return redirect('/mengajar');
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
        
        // dd($id);
        $data['mhs'] = DB::table('mengambil_matkul')->where('id_matkul', '=', $id)->get();
        // dd($data);
        // if($data['mhs']->isEm{
        //     return redirect('/mengajar');
        // }
        // dd($data);
        return view ('mengajar.mengambil',$data);

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
