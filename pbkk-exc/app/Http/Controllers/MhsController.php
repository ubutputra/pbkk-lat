<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dosen;
use App\mhs;

use DB;
use App\Quotation;

class MhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //Query Join
        // $mhs = DB::table('mhs')->join('dosens','mhs.nipdosenwali','=','dosens.nip')->get();
        //Raw
        // $mhs = DB::select( DB::raw("select * from dosens JOIN mhs ON dosens.nip = mhs.nipdosenwali") );
       
        $mhs = mhs::with('dosen')->paginate(10);
       //echo $mhs;
        return view ('mhs.index',compact('mhs'));


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
        // dd($dsn);
        return view ('mhs.create',compact('dsn'));

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
        // dd($request->all());
        mhs::create($request->all());        
        return redirect('/mhs');

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
        $mhsnya    = mhs::findorfail($id);
        $dosennya  = dosen::pluck('namadosen','nip');
        return view('mhs.edit',compact('mhsnya','dosennya'));

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
        $mhsnya = mhs::findorfail($id);
        $mhsnya->update($request->all());
        return redirect('/mhs');
    
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
        $mhsnya = mhs::findorfail($id);
        $mhsnya->delete();
        return redirect('/mhs');

    }
}
