@extends('layouts.master')
@section('content')
<h3>Ubah Kata sandi</h3>
<div class="card">
  <div class="card-body">
<div class="row">
  <div class="col-md-6">
  <form action="{{route('update_pwd')}}" method="POST">
    @csrf
    @if(Auth::user()->password != "")
    <div class="form-group">
      <label for="old_pwd">Kata Sandi Lama</label>
      <input type="password" class="form-control" id="old_pwd" name="password_old" required="" autocomplete="off" placeholder="Kata sandi lama">
    </div> 
    @endif 
    <div class="form-group">
      <label for="new_pwd">Kata Sandi Baru<small> *min 8 Karakter</small></label>
      <input type="password" class="form-control" id="new_pwd" name="password" required="" autocomplete="off" placeholder="Kata sandi baru">
    </div>
    <div class="form-group">
      <label for="cnf_new_pwd">Konfirmasi Kata Sandi Baru</label>
      <input type="password" class="form-control" id="cnf_new_pwd" name="password_confirmation" required="" autocomplete="off" placeholder="Konfirmasi kata sandi baru">
    </div>
    <button type="submit" class="btn btn-primary">Ubah Kata Sandi</button>
  </form>
</div>
</div>
</div>
</div>
@endsection