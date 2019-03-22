@extends('app')
@section('title')
    Data Matkul
@endsection
@section('content')
 <div class="panel panel-default">
 <div class="panel-body">
 <h4><i class="fa fa-user"></i> DAFTAR Matkul</h4><hr>
 <div class=row><div class="col-md-6">
 <a href="/matkul/create" class="btn btn-primary">
  <i class="fa fa-plus-circle"></i> Tambah Data</a>
 </div><div class="col-md-2"></div><div class="col-md-4">            </div></div><br>

@if(count($matkul))
 <div class="table-responsive">
  <table class="table table-bordered table-striped 
          table-hover table-condensed tfix">
   <thead align="center"><tr>
   <td><b>Id Matkul</b></td><td><b>Nama Matkul</b></td>
   {{-- <td><b>Nama Dosen Wali</b></td> --}}
   <td colspan="2"><b>MENU</b></td></tr></thead>

@foreach($matkul as $m)
<tr><td>{{ $m->id_matkul }}</td><td>{{ $m->nama_matkul }}</td>
<td align="center" width="30px">
<a href="/matkul/{{$m->id_matkul}}/edit" class="btn btn-warning btn-sm" role="button"><i class="fa fa-pencil-square"></i> Edit</a>
</td><td align="center" width="30px">
{!! Form::open(array('route' => array('matkul.destroy', $m->id_matkul),
         'method' => 'delete','style' => 'display:inline')) !!}
<button class='btn btn-sm btn-danger delete-btn' type='submit'>
<i class='fa fa-times-circle'></i> Delete </button>
{!! Form::close() !!} </td> </tr>
@endforeach
</table>
</div>
@else
  <div class="alert alert-warning">
   <i class="fa fa-exclamation-triangle"></i> Data Matkul belum ada
   </div>
@endif
</div></div>
@endsection
