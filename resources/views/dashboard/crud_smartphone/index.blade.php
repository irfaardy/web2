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
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                  Oppo
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>OPPO F11</b></h2>
                      {{ Str::limit('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                      consequat.',120)}}
                    </div>
                    <div class="col-5 text-center" style="background-image: url('https://www.91-img.com/pictures/133188-v4-oppo-f11-mobile-phone-large-1.jpg'); background-size: contain; background-repeat: no-repeat; background-position: center ;">
                   
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="#" class="btn btn-sm btn-danger">
                      <i class="fas fa-trash"> </i> Hapus 
                    </a>
                    <a href="#" class="btn btn-sm btn-primary">
                      <i class="fas fa-eye"></i> Lihat Detail
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection