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
              <form role="form" action="{{$act}}" method="POST" enctype="multipart/form-data">
             @csrf
             @if(isset($phone))
             <input type="hidden" name="id" value="{{$phone->id_ponsel}}">
            @endif
                  <div class="form-group">
                    <label for="Nama">Nama Smartphone</label>
                    <input type="text" name="nama" value="{{isset($phone)?$phone->nama:old('nama')}}" class="form-control" id="Nama" placeholder="Masukan Nama">
                  </div> 
                  <div class="form-group">
                    <label for="merk">Merk</label>
                    <select name="id_merk"  class="form-control">
                        @foreach($sp as $s)
                         <option value="{{$s->id}}" {{$s->id == $phone->id_merk ? "selected='selected'":null}}>{{$s->nama}}</option>
                         @endforeach
                    </select>
                  </div>
 					
                  <div class="form-group">
                    <label for="Nama">Deskripsi</label>
                   <textarea class="form-control" id='description' value="" placeholder="Masukan Deskripsi" name="deskripsi">{{isset($phone)?$phone->spesifikasi:old('spesifikasi')}}</textarea>
                  </div>
                   @if(isset($phone))
              @foreach(Phone::getImg($phone->id_ponsel) as $img)
              <div class="col-sm-2 img-thumbnail" id="img_{{$img->id}}">
                <img class="" width="100px"  src="{{route('img_smp',['ukuran' => 'small','link' => $img->img_link])}}">
                <div style="margin-top: -8px; " >
                  <button delete-this dispose-target="#img_{{$img->id}}" loader="#spn_{{$img->id}}" id_gambar="{{$img->id}}" route="{{route('delete_image')}}" type="button" class="btn btn-danger btn-block">Hapus<i id="spn_{{$img->id}}" style="display: none;" class="fa fa-spinner fa-spin"></i></button>
                </div>
              </div>
              @endforeach
              @endif
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
<script>  
  $(document).ready(function() {
      
      $("[delete-this]").click(function(e) {
        var answer=confirm('Apakah anda ingin menghapus gambar ini?');
      if(answer){
        e.preventDefault();
        var r = $(this).attr('route');
        var id = $(this).attr('id_gambar');
        var loader = $(this).attr('loader');
        var dispose = $(this).attr('dispose-target');
        $(this).prop("disabled"), 
        $(loader ).show(), 
        axios.post(r, {
          headers: {
            "Access-Control-Allow-Origin": "*",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
          },
        id_gambar: id,
        }).then(function(e) {
          console.log("console 1:"+e);
        $(loader).fadeOut();
        if(e.data.status){

          $(dispose).fadeOut();
        } else{
          $(loader).fadeOut();
          alert(e.data.message);
        }
        
        }).catch(function(e) {
          if(e == "Error: Request failed with status code 401"){
            alert("Login dahulu untuk melakukan tindakan ini");
          }
          cekKoneksi(r,'Internal server error');
          $(loader).hide();
          
        });
        return true;
      }
      else{

      e.preventDefault();
      return false;
      }
      
    });
    });
</script>
            @endsection