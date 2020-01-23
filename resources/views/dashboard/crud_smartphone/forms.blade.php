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
<div class="col-md-9">
              <form role="form" action="{{$act}}" method="POST">
             @csrf
             @if(isset($phone))
             <input type="hidden" name="id" value="{{$phone->id}}">
            @endif
                  <div class="form-group">
                    <label for="Nama">Nama Smartphone</label>
                    <input type="text" name="nama" value="{{isset($phone)?$phone->nama:old('nama')}}" class="form-control" id="Nama" placeholder="Masukan Nama">
                  </div> 
                  <div class="form-group">
                    <label for="merk">Merk</label>
                    <select name="id_merk"  class="form-control">
                        @foreach($sp as $s)
                         <option value="{{$s->id}}">{{$s->nama}}</option>
                         @endforeach
                    </select>
                  </div>
 					
                  <div class="form-group">
                    <label for="Nama">Deskripsi</label>
                   <textarea class="form-control" id='description' value="" placeholder="Masukan Deskripsi" name="deskripsi">{{isset($phone)?$phone->deskripsi:old('deskripsi')}}</textarea>
                  </div>
                  <div class="form-group">
                 <label>Gambar</label>
						<input type="file" img-reader name="img[]" multiple="true" class="form-control"><span class="badge badge-warning">*Ukuran file maks 4 MByte, dan maks 10 gambar</span>
						<div class="container">
							<div align='center' id='image_preview' class="row" preview></div>
						</div>
						</div>
               

                  <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
            </div>
            <script type="text/javascript">
CKEDITOR.replace('description')</script>
            @endsection