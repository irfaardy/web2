@extends('layouts.master')
@section('content')
<style>
	
	</style>
		<div class="container">
	<h4>{{ $ark->judul }}</h4>

<div class="row">
	
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
		<div class="row">
			<div class="col-md-12 " align="center" style="min-height: 200px;">
				<img src="{{route('img_ark',['ukuran' => 'small','link' => ARK::getLatestImg($ark->id_artikel)==null?'default':ARK::getLatestImg($ark->id_artikel)->img_link])}}" height="500px">
			</div>
			<div class="col-md-12" style="min-height: 600px;">
				{!! $ark->deskripsi !!}
			</div>
		</div>
	</div>
</div>
</div>
	
</div> 
<script type="text/javascript">
	
</script>
</div>
@endsection