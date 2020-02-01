@extends('layouts.dashboard.layout')
@section('title','Smartphone')
@section('head_content')
<div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark">Smartphone</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
@endsection
@section('content')
<div class="pull-right">
  <a href="{{route('adm_phone_create')}}" class="btn btn-primary">Tambah Smartphone Baru</a>

</div>
<hr>
  <div class="row d-flex align-items-stretch">
    @foreach($smp as $s)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                 {{Produsen::getNama($s->id_merk)}}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{$s->nama}}</b></h2>
                      {{ Str::limit(strip_tags($s->spesifikasi),120)}}
                    </div>
                    <div class="col-5 text-center" style="background-image: url('{{route('img_smp',['ukuran' => 'small','link' => Phone::getLatestImg($s->id_ponsel)==null?null:Phone::getLatestImg($s->id_ponsel)->img_link])}}'); background-size: contain; background-repeat: no-repeat; background-position: center ;">
                   
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="{{route('adm_phone_delete',['id' => $s->id_ponsel])}}" delete-this class="btn btn-sm btn-danger">
                      <i class="fas fa-trash"> </i> Hapus 
                    </a> 
                    <a href="{{route('adm_phone_edit',['id' => $s->id_ponsel])}}" class="btn btn-sm btn-warning">
                      <i class="fas fa-edit"> </i> Edit 
                    </a>
                    <a target="_blank" href="{{route('smartphone',['id' => $s->id_ponsel])}}" class="btn btn-sm btn-primary">
                      <i class="fas fa-eye"></i> Lihat Detail
                    </a>
                  </div>
                </div>
              </div>
            </div>
           
    @endforeach
    <div class="col-md-12">
      {{$smp->links()}}
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