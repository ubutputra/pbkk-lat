@extends('app')
@section('title')
    Data Mahasiswa
@endsection
@section('content')
 <div class="panel panel-default">
 <div class="panel-body">
 <h4><i class="fa fa-user"></i> DAFTAR Mengajar</h4><hr>
 <div class=row><div class="col-md-6">
 <a href="/mengajar/create" class="btn btn-primary">
  <i class="fa fa-plus-circle"></i> Tambah Data</a>
 </div><div class="col-md-2"></div><div class="col-md-4">            </div></div><br>
@if(count($m))
 <div class="table-responsive">
  <table class="table table-bordered table-striped 
          table-hover table-condensed tfix">
   <thead align="center"><tr>
   <td><b>Nama Mengajar</b></td><td><b>Nama Matkul</b></td>

   <td colspan="2"><b>MENU</b></td>
</tr>
</thead>
   
   @foreach($m as $m  )
   @php
        if($m->id_dosen != Auth::user()->nrp){
           continue;
        }
   @endphp
 
<tr><td>{{ $m->namadosen }}</td>
<td>{{$m->nama_matkul}}</td>
<td></td><td align="center" width="30px">
<a href="/mengajar/{{$m->id_matkul}}/edit" class="btn btn-warning btn-sm" role="button"><i class="fa fa-pencil-square"></i>Input Nilai</a>
</td><td align="center" width="30px">
{{-- {!! Form::open(array('route' => array('mhs.destroy', $m->nrp),
         'method' => 'delete','style' => 'display:inline')) !!}
<button class='btn btn-sm btn-danger delete-btn' type='submit'>
<i class='fa fa-times-circle'></i> Delete </button>
{!! Form::close() !!} </td> </tr> --}}
@endforeach
{{-- {{ $mhs->links() }} --}}
</table>
</div>
@else
  <div class="alert alert-warning">
   <i class="fa fa-exclamation-triangle"></i> Data Mengajar belum ada
   </div>
@endif
</div></div>
@endsection
