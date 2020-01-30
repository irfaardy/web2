@extends('layouts.master')
@section('content')
<div class="container">
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
<div class="row" style="margin-top: 15px; ">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<ul class="nav nav-tabs " role="tablist">
					<li class="nav-item">
						<a class="nav-link  @if(Request::get('ulasan') != true) active @endif" data-toggle="tab" href="#deskripsi" role="tab" aria-selected="false">
							<i class="fas fa-file"></i> Spesifikasi Lengkap
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link @if(Request::get('ulasan') == true) active @endif" data-toggle="tab" href="#ulasan" role="tab" aria-selected="true">
							<i class="fa fa-comment"></i> Review Pengguna 
							@if(Phone::countReviewer($phone->id_ponsel)>0) 
							<span class="badge badge-danger">{{Phone::countReviewer($phone->id_ponsel)}}</span>
							@endif
						</a>
					</li>
					
					
				</ul>
			</div>
			<div class="card-body">
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane @if(Request::get('ulasan') != true) active @endif" id="deskripsi" role="tabpanel">
						{!!$phone->spesifikasi !!}
					</div>
					
					<div class="tab-pane @if(Request::get('ulasan') == true) active @endif " id="ulasan" role="tabpanel">
						
						
						@guest
						@else
						<a href="#" class="btn btn-raised btn-primary" data-toggle="modal" data-target="#review_modal"><i class="fa fa-plus"></i> Kirim Ulasan Anda</a>
						<form action="{{route('review_store')}}" method="POST">
							<div id="review_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="review_modal" aria-hidden="true">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="review_modal">Kirimkan ulasan anda tentang {{$phone->nama}} </h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											
											@csrf
											<input type="hidden" name="id_ponsel" value="{{$phone->id_ponsel}}">
											<div class="form-group ">
												<label>Judul Ulasan</label>
												<input type="text" class="form-control " required="" placeholder = "Masukan judul ulasan" name="judul">
												<label> Deskripsi</label>
												<textarea type="text" name="deskripsi" required="" autocomplete="off" placeholder="Berikan Ulasan anda tentang {{$phone->nama}}" class="form-control "></textarea>
												
											</div>
											
											
											
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-raised btn-success">Kirim Ulasan</button>
										</div>
									</div>
								</div>
							</div>
						</form>
						@endguest
						<!--
							
						-->
						@if(count($review) > 0)
						<div class="row" id="ulasanList">
							@foreach($review as $r)
							<div class="col-md-12" style="border:1px solid #e4e4e4; margin-top: 5px; ">
								<div class="row">
									<div class="col-md-6">
									<small style="text-transform: capitalize !important;">Dibuat pada: {{ \Carbon\Carbon::parse($r->created_at)->locale('id')->isoFormat('LLLL')}} </span></small>
								</div>
								<div class="col-md-6">
									<div style="float: right;">
										@if(Auth::check())
										@if(Auth::user()->id == $r->id_user || Auth::user()->level == 4)
										<a href="#editReview" data-toggle="modal" data-target="#edit_review-{{$r->id_ulasan}}" class="btn btn-raised btn-sm btn-primary"><i class="fa fa-edit"></i> Ubah</a>
										
										<div id="edit_review-{{$r->id_ulasan}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="review_modal" aria-hidden="true">
											<form action="{{route('review_update')}}" method="POST">
												<div class="modal-dialog modal-lg" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="review_modal">Ubah Ulasan </h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															
															@csrf
															<input type="hidden" name="id_ponsel" value="{{$phone->id_ponsel}}">
															<input type="hidden" name="id" value="{{$r->id}}">
															<div class="form-group ">
																<label>Judul Ulasan</label>
																<input type="text" class="form-control " value="{{$r->judul}}" required="" placeholder = "Masukan judul ulasan" name="judul">
																<label> Deskripsi</label>
																<textarea type="text" name="deskripsi" required="" autocomplete="off" placeholder="Berikan Ulasan anda tentang {{$phone->nama}}" class="form-control ">{{$r->deskripsi}}</textarea>
																
															</div>
															
															
															
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
															<button type="submit" class="btn btn-raised btn-success">Simpan Perubahan</button>
														</div>
													</div>
												</div>
											</form>
										</div>
										@if( Auth::user()->level == 4)
										<a href="#hapus" class="btn btn-raised btn-sm btn-danger"  data-toggle="modal" data-target="#del_review-{{$r->id_ulasan}}" ><i class="fa fa-trash"></i> Hapus</a>
										<div id="del_review-{{$r->id_ulasan}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="review_modal" aria-hidden="true">
											<form action="{{route('review_delete')}}" method="POST">
												<div class="modal-dialog modal-lg" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="review_modal">Hapus Ulasan ini? </h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body" align="center">
															
															@csrf
															<input type="hidden" name="id_ponsel" value="{{$phone->id_ponsel}}">
															<input type="hidden" name="id" value="{{$r->id}}">
															
															<button type="button" class="btn btn-raised btn-secondary" data-dismiss="modal">Batal</button>
															<button type="submit" class="btn btn-raised btn-danger">Hapus</button>
															
															
														</div>
														
													</div>
												</div>
											</form>
										</div>
										@endif
										@endif
										@endif
									</div>
								</div>
								<div class="col-md-12">
									<span style="font-weight: bold !important;" class="text-default"><b>{{Pengguna::getNama($r->user_id)}}</b></span>
								</div>
								<div class="col-md-12">
									<h4>{{$r->judul}}</h4>
									{{$r->deskripsi}}
								</div>
								<div class="col-md-12"> 
									@if(Auth::check())
									@if(Phone::checkReview($r->id,"up"))
										<button type="button" icon_change="#up_arrow-{{$r->id}}" vote  route="{{route('review_vote_up')}}" id_review="{{$r->id}}" point_text="#point-{{$r->id}}"  id="up-{{$r->id}}" class="btn btn-success btn-raised"><i id="up_arrow-{{$r->id}}" class="fa fa-arrow-up"></i></button>
									@else
										<button type="button" icon_change="#up_arrow-{{$r->id}}" vote  route="{{route('review_vote_up')}}" id_review="{{$r->id}}" point_text="#point-{{$r->id}}"  id="up-{{$r->id}}" class="btn btn-success"><i id="up_arrow-{{$r->id}}" class="fa fa-arrow-up"></i></button>
									@endif
									@if(Phone::checkReview($r->id,"down"))
									<button type="button" icon_change="#down_arrow-{{$r->id}}" vote route="{{route('review_vote_down')}}" id_review="{{$r->id}}" point_text="#point-{{$r->id}}"  id="down-{{$r->id}}" class="btn btn-danger btn-raised"><i id="down_arrow-{{$r->id}}" class="fa fa-arrow-down"></i></button>
									@else
									<button type="button" icon_change="#down_arrow-{{$r->id}}" vote route="{{route('review_vote_down')}}" point_text="#point-{{$r->id}}" id_review="{{$r->id}}" id="down-{{$r->id}}" class="btn btn-danger"><i id="down_arrow-{{$r->id}}" class="fa fa-arrow-down"></i></button>
									@endif
									@endif
									&nbsp;&nbsp;<span class="badge badge-info"> <i class="fa fa-arrow-up"></i> <i class="fa fa-arrow-down"></i> <span  id="point-{{$r->id}}">{{ Phone::countReviewVote($r->id) }}</span></span>
								</div>
								<!-- {{$r->updated_at}} -->
								<!-- @if($r->updated_at == $r->created_at)
								<div class="col-md-12"> <span class="badge badge-info">Telah diubah oleh {{Pengguna::getNama($r->updated_by)}}  {{ \Carbon\Carbon::parse($r->updated_at)->locale('id')->diffForHumans()}}
								</div>
								@endif -->
							</div>
							
						</div>
						@endforeach
						<div class="col-md-12">
							{{$review->appends(['ulasan' => 'true'])->links()}}
						</div>
					</div>
					@else
					<div class="row">
						<div class="col-md-12">
							<div class="alert alert-info" align="center">Jadilah orang pertama yang mengulas {{$phone->nama}} di sini
						</div>
					</div>
					@endif
				</div>
				
			</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
      
      $("[vote]").click(function(e) {
    
        e.preventDefault();
        var r = $(this).attr('route');
        var id = $(this).attr('id_review');
        var ini = $(this);
        var spin = "fa fa-spinner fa-spin";
        var icon =  $(this).attr('icon_change');
        var pointText =  $(this).attr('point_text');
        $(icon).attr('class','');
		$(icon).addClass(spin);
        $(this).prop("disabled"), 
        axios.post(r, {
          headers: {
            "Access-Control-Allow-Origin": "*",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
          },
        id_review: id,
        }).then(function(e) {
          console.log("console 1:"+e);
        // $(loader).fadeOut();
       
        if(e.data.error == false){
        	switch(e.data.type){
        		case"up":
        			$('#down-'+id).attr('class','');
					$('#down-'+id).addClass('btn btn-danger');
					ini.attr('class','');
					ini.addClass('btn btn-success  btn-raised');
					$(icon).attr('class','');
			 		 $(icon).addClass("fa fa-arrow-up");
        		break;
        		case"upcancel":
        			$('#down-'+id).attr('class','');
					$('#down-'+id).addClass('btn btn-danger');
					ini.attr('class','');
					ini.addClass('btn btn-success');
					$(icon).attr('class','');
			 		$(icon).addClass("fa fa-arrow-up");
        		break;
        		case"down":
        			$('#up-'+id).attr('class','');
					$('#up-'+id).addClass('btn btn-success');
					ini.attr('class','');
					ini.addClass('btn btn-danger btn-raised');
					$(icon).attr('class','');
			 		 $(icon).addClass("fa fa-arrow-down");
        		break;
        		case"downcancel":
        			$('#up-'+id).attr('class','');
					$('#up-'+id).addClass('btn btn-success');
					ini.attr('class','');
					ini.addClass('btn btn-danger');
					$(icon).attr('class','');
			 		$(icon).addClass("fa fa-arrow-down");
        		break;
        		default:
        		 // alert('t')
        		 break;
        	}
        	$(pointText).text(e.data.total);
        	  
        } else{
          alert(e.data.message);
        }
        
        }).catch(function(e) {
          if(e == "Error: Request failed with status code 401"){
            alert("Login dahulu untuk melakukan tindakan ini");
          }
          // cekKoneksi(r,'Internal server error');
          // $(loader).hide();
          
        });
        return true;
     
      
    });
    });
</script>
@endsection