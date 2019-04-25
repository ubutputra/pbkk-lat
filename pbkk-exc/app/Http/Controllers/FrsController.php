<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dosen;
use Auth;
use App\Mengambil;
use App\User;
use App\Mengajar;
use DB;
use App\mhs;
use App\matkul;
class FrsController extends Controller
{
    public function index(){

        if(auth()->user()->isAdmin()){
            return redirect('/dosen');
        }
        $id_mhs = Auth::user()->nrp;
        // dd($id_mhs);
        $data['mhs']    = mhs::findorfail($id_mhs);
        
        $data['dosen'] = dosen::findorfail($data['mhs']->nipdosenwali);
        $data['matkul'] = matkul::all();
        
        $data['mengambil'] = DB::table('mengambil_matkul')->where('nrp_mhs', '=', $id_mhs)->get();
        // dd($mengambil);
        return view('frs.index',$data);
        
    
    }

    public function store(Request $request){
         $id_mhs = Auth::user()->nrp;
        //  dd($request->matkul);
        $D = Mengambil::where('id_matkul', '=', $request->matkul)->where('nrp_mhs', '=', $id_mhs)->get();
        // dd($D);
         if(!$D->isEmpty()){
            return redirect('/frs')->with('error', 'MATA KULIAH Telah DIAMBIL');
         }
        $matkul =  DB::table('matkuls')->where('id_matkul', '=', $request->matkul)->get();
        // dd($matkul);
        $matkul = $matkul['0']->nama_matkul;

        $dosen = DB::table('mengajar')->where('id_matkul', '=', $request->matkul)->get();
        $id_dosen = $dosen['0']->id_dosen;
       
        $namadosen = DB::table('dosens')->where('nip', '=', $id_dosen)->get();;
        $namadosen = $namadosen['0']->namadosen;
        mengambil::create([
            'nrp_mhs' => $id_mhs,
            'id_matkul' => $request->matkul,
            'nama_matkul' => $matkul,
            'nama_dosen' => $namadosen,
            'nilai' => '-'
        ]);

        return redirect('/frs')->with('success', 'MATA KULIAH BERHASIL DIAMBIL');

        
        
    }

    public function InputNilai(Request $request){
        //  dd($request->all());
        $el = $request->matkul;
        //  dd($el);
        $idx =1;
        // for ($i=0; $i < ; $i++) { 
        //     # code...
        // }
         foreach($el as $m){
            // dd($m);
             $data[$idx] =explode ("|", $m);  
            
              
           
    
        
        
            $db = DB::table('mengambil_matkul')->where('nrp_mhs', '=', $data[$idx][1])->where('id_matkul', '=', $data[$idx][2])->update( [ 'nilai' => $data[$idx][0]]);

        

            //  dd($data);
            //  $db->nilai = $data[0];
            //  $db->save();
            $idx +=1;
         }
        
        return redirect('/mengajar');

    }
}
