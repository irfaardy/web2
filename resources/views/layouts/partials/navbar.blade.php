<nav class="navbar navbar-expand-lg  navbar-dark bg-danger">
    <div class="container">
        <a class="navbar-brand" href="/"><b>ASK</b>cell</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

            <ul class="navbar-nav ml-auto">
            <ul class="nav-item">
                <form action="{{route('smartphone_search')}}" method="GET">
              <div class="input-group" >
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-search"></i></span>
                </div>
                <input name="q" autocomplete="off" type="text"  value="{{Request::get('q')}}" class="form-control" placeholder="Cari Smartphone..."> 
               <!--  <div class="input-group-prepend">
                  <button class="btn btn-secondary btn-raised  btn-sm">Cari</button>
                </div> -->
              </div>
            </form>
            </ul>
                
                <li class="nav-item dropdown dropdown-new">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Daftar Smartphone
                    </a>
                    <div class="dropdown-menu dropdown-menu-new" aria-labelledby="navbarDropdown">
                        <div class="container">
                            <div style="width:100%;border-bottom: 1px solid #e3342f;">
                                <h3>Daftar Smartphone</h3>
                            </div>
                            <div class="row">
                                @foreach(Produsen::get_produsen() as $p)
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="{{route('produsen_id',['id' => $p->id])}}">{{$p->nama}}</a>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Lokasi Toko</a>
                </li>
                @guest
                <li class="nav-item">
                    
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
                @else
                
                <li class="nav-item dropdown">
                    
                    <!-- TAMBAHKAN CODE INI -->
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        @if(auth()->user()->photo)
                        <img src="{{ auth()->user()->photo }}" alt="photo" width="32" height="32" style="margin-right: 8px;">
                        @endif
                        {{ auth()->user()->name }} <span class="caret"></span>
                    </a>
                    <!-- TAMBAHKAN CODE INI -->
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                         @if(Auth::user()->level == '4')
                            <a class="dropdown-item" href="{{route('dashboard_admin')}}">
                            {{ __('Admin Dashboard') }}
                        </a>
                        @endif

                        <a class="dropdown-item" href="{{route('change_pwd')}}">
                            {{ __('Ubah Kata Sandi') }}
                        </a>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>