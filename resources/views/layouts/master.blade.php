<!DOCTYPE html>
<html>
<head>
	<title>Ask Cell Home</title>
	 <script src="{{ asset('js/app.js') }}" defer></script>
	 <script src="{{ asset('js/jquery.slim.min.js') }}" defer></script>
	 <script src="{{ asset('js/paralax.min.js') }}" defer></script>
 	 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
    
   </style>
 	 <style type="text/css">
  
.navbar-nav li>span {
    position: relative;
    display: block;
    padding: 10px 15px;
    font-weight:bold;
}

/* adds some margin below the link sets  */
.navbar .dropdown-menu-new div[class*="col"] {
   margin-bottom:1rem;
}



/* breakpoint and up - mega dropdown styles */
@media screen and (min-width: 767px) {
  
  /* remove the padding from the navbar so the dropdown hover state is not broken */
.navbar {
  padding-top:0px;
  padding-bottom:0px;
}

/* remove the padding from the nav-item and add some margin to give some breathing room on hovers */
.navbar .nav-item {
  padding:.5rem .5rem;
  margin:0 .25rem;
}

  
/* makes the dropdown full width  */
.navbar .dropdown-new {position:static;}

  
.navbar .dropdown-menu-new {
  width:100%;
  left:0;
  right:0;
/*  height of nav-item  */
  top:45px;
  
  display:block;
  visibility: hidden;
  opacity: 0;
  transition: visibility 0s, opacity 0.3s linear;
  
}
  
 

  
  /* shows the dropdown menu on hover */
.navbar .dropdown-new:hover .dropdown-menu-new, .navbar .dropdown-new .dropdown-menu-new:hover {
  display:block;
  visibility: visible;
  opacity: 1;
  transition: visibility 0s, opacity 0.3s linear;
}
  
  .navbar .dropdown-menu-new {
    border: 1px solid rgba(0,0,0,.15);
    background-color: #fff;
  }
  .list-phone{
    min-width: 50px;
    max-width: 50px;
  }

}
.context-dark, .bg-gray-dark, .bg-primary {
    color: rgba(255, 255, 255, 0.8);
}

.footer-classic a, .footer-classic a:focus, .footer-classic a:active {
    color: #ffffff;
}
.nav-list li {
    padding-top: 5px;
    padding-bottom: 5px;
}

.nav-list li a:hover:before {
    margin-left: 0;
    opacity: 1;
    visibility: visible;
}

ul, ol {
    list-style: none;
    padding: 0;
    margin: 0;
}

.social-inner {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    padding: 23px;
    font: 900 13px/1 "Lato", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.5);
}
.social-container .col {
    border: 1px solid rgba(255, 255, 255, 0.1);
}
.nav-list li a:before {
    content: "\f14f";
    font: 400 21px/1 "Material Design Icons";
    color: #4d6de6;
    display: inline-block;
    vertical-align: baseline;
    margin-left: -28px;
    margin-right: 7px;
    opacity: 0;
    visibility: hidden;
    transition: .22s ease;
}

 	 .b-0 {
    bottom: 0;
}
.bg-shadow {
    background: rgba(76, 76, 76, 0);
    background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(179, 171, 171, 0)), color-stop(49%, rgba(48, 48, 48, 0.37)), color-stop(100%, rgba(19, 19, 19, 0.8)));
    background: linear-gradient(to bottom, rgba(179, 171, 171, 0) 0%, rgba(48, 48, 48, 0.71) 49%, rgba(19, 19, 19, 0.8) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#131313', GradientType=0 );
}
.top-indicator {
    right: 0;
    top: 1rem;
    bottom: inherit;
    left: inherit;
    margin-right: 1rem;
}
.overflow {
    position: relative;
    overflow: hidden;
}
.zoom img {
    transition: all 0.2s linear;
}
.zoom:hover img {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}

 	 </style>
</head>
<body>
	
@include('layouts.partials.navbar')

  <!--Container-->
<div class="container" style="margin-top: 80px;">
    
    @yield('content')
    </div>

<!-- FOOTER -->
<footer class="section footer-classic context-dark" style="background: #e57373;">
        <div class="container">
          <div class="row row-30">
            <div class="col-md-4 col-xl-5" style="border-right: 1px solid #FFF;">
              <div class="pr-xl-4"><a class="brand" href="index.html"><img class="brand-logo-light" src="{{asset('assets/img/askcellLogo.png')}}" alt="" width="140" height="37" srcset="{{asset('assets/img/askcellLogo.png')}}"></a>
                <p>ASK CELL berdiri sejak tahun 2008 dan berkonsentrasi pada jenis usaha retail handphone. Pada tahun 2016 meluncurkan ASK Online sebagai bentuk bukti kesungguhan melayani konsumen.

 </p>
                <!-- Rights-->
                <p class="rights"><span>©  </span><span class="copyright-year">2020</span><span> </span><span>Askcell</span><span>. </span><span>All Rights Reserved.</span></p>
              </div>
            </div>
            <div class="col-md-4" style="border-right: 1px solid #FFF;">
              <h5>Contacts</h5>
              <dl class="contact-list">
                <dt>Address:</dt>
                <dd>Jl. Raya Purwakarta No.12 Tagog Padalarang</dd>
              </dl>
              <dl class="contact-list">
                <dt>email:</dt>
                <dd><a href="mailto:#">ask_cell@gmail.com</a></dd>
              </dl>
              <dl class="contact-list">
                <dt>phones:</dt>
                <dd><a href="tel:022143678">022143678</a>
                </dd>
              </dl>
            </div>
            
          </div>
        </div>
        <div class="row no-gutters social-container">
          <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-facebook"></span><span>Facebook</span></a></div>
          <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-instagram"></span><span>instagram</span></a></div>
          <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-twitter"></span><span>twitter</span></a></div>
          <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-youtube-play"></span><span>google</span></a></div>
        </div>
      </footer>

</body>
</html>