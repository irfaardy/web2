@extends('layouts.master')
@section('content')
     <h2><span class="badge badge-danger">Artikel Terbaru</span></h2>
    <!--Start code-->
    <div class="row">
        <div class="col-12 pb-5">
            <!--SECTION START-->
            <div class="row">
            @foreach($ark_slide as $a)
            <div style="margin-top: 10px" class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
               <!--  <div class="card-header text-muted border-bottom-0">
                 {{$a->id_artikel}}
                </div> -->
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{$a->judul}}</b></h2>
                      {{ Str::limit(strip_tags($a->deskripsi),120)}}
                    </div>
                    <div class="col-5 text-center" style="background-image: url('{{route('img_ark',['ukuran' => 'small','link' => ARK::getLatestImg($a->id_artikel)==null?null:ARK::getLatestImg($a->id_artikel)->img_link])}}'); background-size: contain; background-repeat: no-repeat; background-position: center ;">
                   
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    
                    <a href="{{route('artikel_detail',['id' => $a->id_artikel])}}" class="btn btn-sm btn-primary btn-block">
                      <i class="fas fa-eye"></i> Lihat Selengkapnya
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>
   
<!-- Page Content -->
<section class="py-5">
  <div class="container">
     <h2><span class="badge badge-danger">Smartphone Terbaru</span></h2>
    <div class="row">

        @foreach($smp as $s)
      <div class="col-md-3" style="margin:5px;">
       <div class="card" style="width: 18rem;">

        <div style="background-image: url('{{route('img_smp',['ukuran' => 'small','link' => Phone::getLatestImg($s->id_ponsel)==null?null:Phone::getLatestImg($s->id_ponsel)->img_link])}}');position: center; background-size: cover; min-height: 150px"></div>
          <div class="card-body">
            <p class="card-text">   
                <b>
                {{$s->nama}}</b></p>
                <a href="{{route('smartphone',['id' => $s->id_ponsel])}}" class="btn btn-success btn-block">Lihat Detail</a>
          </div>
        </div>
      </div>
      @endforeach
      
    </div>
   

  </div>
</section>
@endsection
