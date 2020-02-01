@extends('layouts.dashboard.layout')
@section('title','Artikel')
@section('head_content')
<div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark">Article</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
@endsection
@section('content')
<div class="pull-right">
  <a href="{{route('adm_artikel_create')}}" class="btn btn-primary">Tambah Artikel Baru</a>

</div>
<hr>
  <div class="row d-flex align-items-stretch">
    @foreach($artikel as $a)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                 {{$a->id_artikel}}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{$a->judul}}</b></h2>
                      {{ Str::limit(strip_tags($a->deskripsi),120)}}
                    </div>
                    <div class="col-5 text-center" style="background-image: url('{{route('img_ark',['ukuran' => 'small','link' => ARK::getLatestImg($a->id_artikel)==null?'default':ARK::getLatestImg($a->id_artikel)->img_link])}}'); background-size: contain; background-repeat: no-repeat; background-position: center ;">
                   
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="{{route('adm_artikel_hapus',['id' => $a->id_artikel])}}" delete-this class="btn btn-sm btn-danger">
                      <i class="fas fa-trash"> </i> Hapus 
                    </a> 
                    <a href="{{route('adm_artikel_edit',['id' => $a->id_artikel])}}" class="btn btn-sm btn-warning">
                      <i class="fas fa-edit"> </i> Edit 
                    </a>
                    <a href="{{route('artikel_detail',['id' => $a->id_artikel])}}" class="btn btn-sm btn-primary">
                      <i class="fas fa-eye"></i> Lihat Detail
                    </a>
                  </div>
                </div>
              </div>
            </div>


    @endforeach
    <div class="col-md-12">
     {{ $artikel->links()}}
    </div>
     <script type="text/javascript">
            $(document).ready(function() {
             $("[delete-this]").click(function(e) {
                    var answer=confirm('Apakah anda ingin menghapus ini?');
                  if(answer){

                  }
              else{

                  e.preventDefault();
                  return false;
                  }
             });
            });
            </script>

          </div>
@endsection