<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{asset('assets/img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">

      <span class="brand-text font-weight-bold">Admin Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <table>
            <tr>
              <th width="50px" align="center" valign="center" rowspan="2"> <i class="fas fa-user-circle fa-2x " style="color: #e4e4e4;"></i></th>
              <th> <a href="#" class="d-block">{{ Auth::user()->name }}</a></th>
            </tr>
            <tr>
              <td><small style="color: #e4e4e4;">{{ Auth::user()->email }}</small></td>
            </tr>
          </table>
         
          
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('dashboard_admin')}}" class="nav-link">
               <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fas fa-box"></i>
              <p>
                Konten Website
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('adm_phone')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Smartphone</p>
                </a>
              </li>
               
              <li class="nav-item">
                <a href="{{route('adm_produsen')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produsen Smartphone</p>
                </a>
              </li>
              </li>
              <li class="nav-item">
                <a href="{{route('adm_article')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Artikel</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
