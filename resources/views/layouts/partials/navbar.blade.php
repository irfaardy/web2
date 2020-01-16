<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-danger">
    <div class="container">
        <a class="navbar-brand" href="#"><b>ASK</b>cell</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
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
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Asus</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Samsung</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Xiaomi</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Asus</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Samsung</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Xiaomi</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Asus</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Samsung</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Xiaomi</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Asus</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Samsung</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Xiaomi</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Asus</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Samsung</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Xiaomi</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Asus</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Samsung</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Xiaomi</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Asus</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Samsung</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Xiaomi</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Asus</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Samsung</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Xiaomi</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Asus</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Samsung</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Xiaomi</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Asus</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Samsung</a>
                                </div>
                                <div class="col-xs-3 " align="left">
                                    <a class="dropdown-item" href="#">Xiaomi</a>
                                </div>
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

                        <a class="dropdown-item" href="#">
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