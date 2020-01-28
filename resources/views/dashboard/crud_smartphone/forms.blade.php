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
                         <option value="{{$s->id}}" {{isset($phone)?$s->id == $phone->id_merk ? "selected='selected'":null:null}}>{{$s->nama}}</option>
                         @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="Nama">Layar</label>
                    <input type="text" name="display" value="{{isset($phone)?$phone->display:old('display')}}" class="form-control" id="display" placeholder="contoh: 6.5 inch Amoled">
                  </div> 
                  <div class="form-group">
                    <label for="Nama">Chipset</label>
                    <input type="text" name="chipset" value="{{isset($phone)?$phone->chipset:old('chipset')}}" class="form-control" id="chipset" placeholder="contoh: Snapdragon 845 2x3Ghz Kyro 360 Gold 6x2.5Ghz Kyro 360 Silver">
                  </div> 
                  <div class="form-group">
                    <label for="Nama">RAM</label>
                    <input type="text" name="ram" value="{{isset($phone)?$phone->ram:old('ram')}}" class="form-control" id="ram" placeholder="contoh : 4GB LDDRX4">
                  </div>  
                  <div class="form-group">
                    <label for="Nama">Penyimpanan</label>
                    <input type="text" name="storage" value="{{isset($phone)?$phone->storage:old('storage')}}" class="form-control" id="storage" placeholder="Contoh : 128GB">
                  </div> 
 					
                  <div class="form-group">
                    <label for="Nama">Spesifikasi Lengkap</label>
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