@extends('layouts.dashboard.layout')
@section('title','Produsen Smartphone')
@section('head_content')
<div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark">Produsen Smartphone</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
@endsection
@section('content')
<div class="col-md-6">
              <form role="form" action="{{$act}}" method="POST">
             @csrf
             @if(isset($sp))
             <input type="hidden" name="id" value="{{$sp->id}}">
            @endif
                  <div class="form-group">
                    <label for="Nama">Nama Produsen</label>
                    <input type="text" name="nama" value="{{isset($sp)?$sp->nama:old('nama')}}" class="form-control" id="Nama" placeholder="Masukan Nama">
                  </div>

                  <div class="form-group">
                    <label for="Nama">Deskripsi</label>
                   <textarea class="form-control" value="" placeholder="Masukan Deskripsi" name="deskripsi">{{isset($sp)?$sp->deskripsi:old('deskripsi')}}</textarea>
                  </div>
                 
               

                  <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
            </div>
            @endsection