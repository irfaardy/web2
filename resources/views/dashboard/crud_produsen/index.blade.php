@extends('layouts.dashboard.layout')
@section('title','Produsen Smartphone')
@section('head_content')
<div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark">Smartphone</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
@endsection
@section('content')
 <a href="/admin/produsen/create" class="btn btn-primary">Tambah Produsen</a>
 <hr>
 <table  id="produsen" class="table table-striped">
 	<thead>
 		<th>Nama</th>
 		<th>Deskripsi</th>
 		<th>Diubah Pada</th>
 		<th>Diubah Oleh</th>
 		<th>Aksi</th>
 	</thead>
 	<tbody>
 		@foreach($sp as $s)
 		<tr>
 			<td>{{ $s->nama }}</td>
 			<td>{{ $s->deskripsi }}</td>
 			<td>{{ $s->updated_at }}</td>
 			<td>{{ $s->updated_by }}</td>
 			<td>
 				<a href="{{route('adm_hapus_produsen',['id' => $s->id])}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
 				<a href="{{route('adm_edit_produsen',['id' => $s->id])}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
 			</td>
 		</tr>
 		@endforeach
 	</tbody>
 </table>

 <script>
  $(function () {
  
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    // });
  });
</script>
@endsection