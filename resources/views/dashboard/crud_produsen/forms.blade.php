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
<div class="col-md-6">
              <form role="form" action="{{route('adm_produsen_store')}}" method="POST">
             @csrf
                  <div class="form-group">
                    <label for="Nama">Nama Produsen</label>
                    <input type="text" name="nama" class="form-control" id="Nama" placeholder="Masukan Nama">
                  </div>

                  <div class="form-group">
                    <label for="Nama">Deskripsi</label>
                   <textarea class="form-control" placeholder="Masukan Deskripsi" name="deskripsi"></textarea>
                  </div>
                 
               

                  <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
            </div>
            @endsection