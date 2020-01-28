@extends('layouts.master')
@section('content')
<script type="text/javascript">
	function img_change(){
		$("[img-change]").click(function(){
			$("[change-target]").hide();
			$("[change-target]").fadeIn(500);
			$("[change-target]").attr('src',$(this).attr('src'));
		});
	}
	$( document ).ready(function() {
img_change();
	});
</script>
<h3>{{$phone->nama}}</h3>
<div class="row">
	<div class="col-md-7" align="center">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12" align="center" style="align-items: center; display:flex;min-height:500px; max-height: 500px;">
						<img  style="max-height: 500px; margin: 120px;" change-target  class="rounded" src="{{route('img_smp',['ukuran' => 'original','link' => Phone::getLatestImg($phone->id_ponsel)->img_link])}}">
					</div>
					<div class="col-md-12" style="overflow-y: auto; margin-top: 20px;  max-height:180px; " align="center">
						<!-- <div style="overflow-x: scroll; max-width: 200px;"> -->
						@foreach(Phone::getImg($phone->id_ponsel) as $img)
						
						<img style="cursor: pointer;" img-change class="rounded" width="100px" img-original="{{route('img_smp',['ukuran' => 'original','link' => $img->img_link])}}" src="{{route('img_smp',['ukuran' => 'small','link' => $img->img_link])}}">
						
						@endforeach
						<!-- </div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	

<div class="col-md-5" style="border: 1px solid #E4E4E4;">
	
							
	
	<table class="table">
		<tbody><tr>
			<td colspan="2"><h3>Spesifikasi Umum</h3></td>
			<tr>
			<td>Display</td>
			<td>{{$phone->display}}</td>
		</tr><tr>
			<td>Chipset</td>
			<td>{{$phone->chipset}}</td>
		</tr><tr>
			<td>RAM</td>
			<td>{{$phone->ram}}</td>
		</tr>
		<tr>
			<td>Storage</td>
			<td>{{$phone->storage}}</td>
		</tr>
	
		
			
				
	</tbody></table>
</div>
</div>

<div class="row" style="margin-top: 15px;">
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<ul class="nav nav-tabs " role="tablist">
				<li class="nav-item">
					<a class="nav-link  active" data-toggle="tab" href="#deskripsi" role="tab" aria-selected="false">
						<i class="fa fa-file-text"></i> Spesifikasi Lengkap
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#ulasan" role="tab" aria-selected="true">
						<i class="fa fa-comment-o"></i> Review Pengguna <span class="badge badge-default">3</span>
					</a>
				</li>
				
				
			</ul>
		</div>
		<div class="card-body">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="deskripsi" role="tabpanel">
					{!!$phone->spesifikasi !!}
				</div>
				<div class="tab-pane " id="location" role="tabpanel">
					<table class="table table-bordered">
						<tbody><tr>
							<td>Alamat</td>
							<td>Jl. Karang Arum No.49, RT.01/RW.02, Cipedes, Kec. Sukajadi, Kota Bandung, Jawa Barat 40162</td>
						</tr>
						<tr>
							<td>Kota</td>
							<td>Bandung Barat</td>
						</tr>
						<tr>
							<td>Provinsi</td>
							<td>Jawa Barat</td>
						</tr>
				</tbody></table>
					<div class="mapouter"><div class="gmap_canvas"><iframe id="gmap_canvas" src="https://maps.google.com/maps?q=Jl. Karang Arum No.49, RT.01/RW.02, Cipedes, Kec. Sukajadi, Kota Bandung, Jawa Barat 40162&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" scrolling="no" marginheight="0" marginwidth="0" width="600" height="500" frameborder="0"></iframe><a href="https://www.embedgooglemap.net/blog/purevpn-coupon/"></a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div>

					
				</div>
				<div class="tab-pane " id="ulasan" role="tabpanel">
					
					
					
					<h3>Kirim Ulasan Anda</h3>
<form action="/a" method="POST">
	<div class="row">
              
              <div class="col-sm-6 col-lg-5 ">
                <div class="form-group ">
                  <input type="text" name="deskripsi" autocomplete="off" placeholder="Contoh : Kosannya bersih, Harganya bersaing" class="form-control ">
                  <label>Penilaian Anda</label>
                  <select name="star" class="form-control">
                  	<option value="" selected="">-Pilih-</option>
                  	<option value="5">★★★★★ (Sangat Baik)</option>
                  	<option value="4">★★★★ (Baik)</option>
                  	<option value="3">★★★ (Biasa Saja)</option>
                  	<option value="2">★★ (Buruk)</option>
                  	<option value="1">★ (Sangat Buruk)</option>
                  </select>
                </div>
                <div class="pull-right"><button type="submit" class="btn btn-success">Kirim Ulasan</button></div>
              </div>
            </div>
</form>
<hr>
		<p class="blockquote blockquote-default">
		<small style="text-transform: capitalize !important;">Dibuat pada: 2018-06-06 00:00:00</small><br>
		<span style="font-weight: bold !important;" class="text-default"><b>Irfa Ardiansyah</b></span>
		<br>
		<span class="text-primary" title="Memberikan 5 bintang"> 
			<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
		</span>
		<br>
		Mantap gan
		<br>
		<br>
	</p>
	<hr>
		<p class="blockquote blockquote-default">
		<small style="text-transform: capitalize !important;">Dibuat pada: 2018-06-06 00:00:00</small><br>
		<span style="font-weight: bold !important;" class="text-default"><b>Ilham Jaya H</b></span>
		<br>
		<span class="text-primary" title="Memberikan 3 bintang"> 
			<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
		</span>
		<br>
		Lumayan Nyaman
		<br>
		<br>
	</p>
	<hr>
		<p class="blockquote blockquote-default">
		<small style="text-transform: capitalize !important;">Dibuat pada: </small><br>
		<span style="font-weight: bold !important;" class="text-default"><b>-</b></span>
		<br>
		<span class="text-primary" title="Memberikan 5 bintang"> 
			<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
		</span>
		<br>
		Murah harganya dan nyaman 
		<br>
		<br>
	</p>
	<hr>
					</div>
				
			</div>
		</div>
	</div>
</div>
</div>

@endsection