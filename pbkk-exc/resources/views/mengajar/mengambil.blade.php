@extends('app')
@section('title')
    Data Mahasiswa Mengambil Matkul {{$mhs[0]->nama_matkul}}
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="/css/ubut/style.css">   
@endsection
@section('content')
 <div class="panel panel-default">
 <div class="panel-body">
 <h4><i class="fa fa-user"></i> DAFTAR Mengambil matkul</h4><hr>
 <div class=row><div class="col-md-6">
 <a href="/mengambil/create" class="btn btn-primary">
  <i class="fa fa-plus-circle"></i> </a>
 </div><div class="col-md-2"></div><div class="col-md-4">            </div></div><br>
@if(count($mhs))
 <div class="table-responsive">
  <table class="table table-bordered table-striped 
          table-hover table-condensed tfix">
   <thead align="center"><tr>
   <td><b>Nama Mahasiswa Mengambil Matkul</b></td><td><b>Nama Matkul</b></td>

   <td><b>Nilai</b></td>
   <td><b>Input Nilai</b></td>
</tr>
</thead>
<form  action="{{ action('FrsController@InputNilai') }}" method="POST">
    @csrf
    {{-- <input type="hidden" name="id_matkul" value="{{$mhs}}"> --}}
@foreach($mhs as $mhs)  
<tr>
<td>{{$mhs->nrp_mhs}}</td>
<td>{{$mhs->nama_matkul}}</td>
<td>{{$mhs->nilai}}</td>
<td>


<select  name="matkul[]"   >
                   
       
<option value="A|{{$mhs->nrp_mhs}}|{{$mhs->id_matkul}}">A</option>
      <option value="AB|{{$mhs->nrp_mhs}}|{{$mhs->id_matkul}}">AB</option>
      <option value="BC|{{$mhs->nrp_mhs}}|{{$mhs->id_matkul}}">BC</option>
      <option value="C|{{$mhs->nrp_mhs}}|{{$mhs->id_matkul}}">C</option>
      <option value="D|{{$mhs->nrp_mhs}}|{{$mhs->id_matkul}}">D</option>
      <option value="E|{{$mhs->nrp_mhs}}|{{$mhs->id_matkul}}">E</option>

      </select>
    
    </td>
</tr>
@endforeach
{{-- {!! Form::open(array('route' => array('mhs.destroy', $m->nrp),
         'method' => 'delete','style' => 'display:inline')) !!}
<button class='btn btn-sm btn-danger delete-btn' type='submit'>
<i class='fa fa-times-circle'></i> Delete </button>
{!! Form::close() !!} </td> </tr> --}}

{{-- {{ $mhs->links() }} --}}
</table>
<button class='btn btn-sm btn-primary' type='submit'>Submit</button>

</form>
</div>
@else
  <div class="alert alert-warning">
   <i class="fa fa-exclamation-triangle"></i> Data Mengajar belum ada
   </div>
@endif
</div></div>
@endsection
