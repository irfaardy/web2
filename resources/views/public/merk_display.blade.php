@extends('layouts.master')
@section('content')
<h3> Daftar Smartphone {{Produsen::getNama($id)}}</h3>
 <div class="row d-flex align-items-stretch">
    @foreach($smp as $s)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
              
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
                    
                    <a href="{{route('smartphone',['id' => $s->id_ponsel])}}" class="btn btn-block btn-sm btn-primary">
                      <i class="fas fa-eye"></i> Lihat Detail
                    </a>
                  </div>
                </div>
              </div>
            </div>
           
    @endforeach
</div>

@endsection