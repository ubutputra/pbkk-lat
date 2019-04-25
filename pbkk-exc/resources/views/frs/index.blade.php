@extends('app')
@section('title')
    Formulir Rencana Studi (FRS)
@endsection

@section('css')
    
@endsection

@section('content')
<div align="center">


<h2>Formulir Rencana Studi FRS</h2>
@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif
@if (\Session::has('error'))
    <div class="alert alert-danger">
        <ul>
            <li>{!! \Session::get('error') !!}</li>
        </ul>
    </div>
@endif
<table cellpadding="4" cellspacing="0" class="FilterBox">
    <tr>
        <td width="80"><strong>NRP</strong></td>
        <td width="10" align="center"><strong>:</strong></td>
        <td width="250">{{Auth::user()->nrp}}</td>
        <td width="80"><strong>Semester</strong></td>
        <td width="10" align="center"><strong>:</strong></td>
        <td width="260"></td>
    </tr>
        <tr>
                <td><strong>Nama</strong></td>
                <td align="center"><strong>:</strong></td>
                <td>{{$mhs->nama}}</td>
                <td><strong>Dosen Wali</strong></td>
                <td align="center"><strong>:</strong></td>
                <td>{{$dosen->namadosen}}</td>
            </tr>
            <tr>
                <td><strong>IPK / IPS</strong></td>
                <td align="center"><strong>:</strong></td>
                <td>
                                   </td>
                <td><strong>Batas / Sisa</strong></td>
                <td align="center"><strong>:</strong></td>
                <td></td>
            </tr>    
</table>

<table cellpadding="4" cellspacing="0" class="GridStyle" style="margin-top:40px;">
	
		
		<tr>
		<th width="70" align="center" class="SubHeaderBGAlt">Kode</th>
		<th width="270" align="center" class="SubHeaderBGAlt">Mata Kuliah</th>
		<th width="30" align="center" class="SubHeaderBGAlt">SKS</th>
		{{-- <th width="30" align="center" class="SubHeaderBGAlt">Kelas</th> --}}
        <th width="270" align="center" class="SubHeaderBGAlt">Dosen</th>
        <th width="50" align="center" class="SubHeaderBGAlt">Nilai</th>
        </tr>
        
        @foreach($mengambil as $mengambil)
        <tr>
            <td>{{$mengambil->id_matkul}}</td>
            <td>{{$mengambil->nama_matkul}}</td>
            <td>3</td>
            <td>{{$mengambil->nama_dosen}}</td>
            <td>{{$mengambil->nilai}}</td>
        </tr>
        @endforeach
      
       
        </table>
    

    <form class="form-inline" style="margin-top:40px;" action="{{ action('FrsController@store') }}" method="POST">
            @csrf
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">List Matkul</label>
                <select class="form-control form-control-sm" name="matkul" style="width: 500px;">
                   
                  @foreach($matkul as $m)
                  
                <option value="{{$m->id_matkul}}">{{$m->nama_matkul}}</option>
               
                  @endforeach
                </select>
              
                
              
                <button type="submit" class="btn btn-primary my-1">Ambil Matkul</button>
              </form>
        </div>
@endsection