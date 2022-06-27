<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <link rel="shortcut icon" href="https://raw.githubusercontent.com/arifpujin/Exersice1/master/fotoarif.png" type="image/png" />
  <meta property="og:description" content="">
 <meta property="og:image" content="https://raw.githubusercontent.com/arifpujin/Exersice1/master/fotoarif.png">
 <meta property="og:url" content="{{url('/')}}">
 <!-- CSRF Token -->
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <meta name="thisurl" content="{{ url('/') }}">
 <meta name="datenow" content="{{\Carbon\Carbon::now()->toDateString()}}">

  <title>@yield('title') :: {{ env('APP_NAME') }}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('assets/modules/sweetalert/sweetalert/css/sweetalert.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/izitoast/css/iziToast.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/bootstrap-social/bootstrap-social.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/summernote/summernote-bs4.css')}}">
  @stack('css')



  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
            @include('layouts.navbar-right')
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{url('/')}}"><img src="https://raw.githubusercontent.com/arifpujin/Exersice1/master/fotoarif.png" class="img-fluid avatar avatar-sm mb-1 mr-1" alt="logo {{env('APP_NAME')}}"> {{env('APP_NAME')}}</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{url('/')}}"><img src="https://raw.githubusercontent.com/arifpujin/Exersice1/master/fotoarif.png" class="img-fluid avatar avatar-sm" alt="logo {{env('APP_NAME')}}"></a>
          </div>
          <ul class="sidebar-menu">
            @include('layouts.sidebar')
          </ul>
          {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="mailto:arifpujinugroho@gmail.com?subject=Lapor%20Sistem%20Lara%20BWA" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-mail-bulk    "></i> Kontribusi
            </a>
          </div> --}}
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1 class="mt-1">@yield('header-body')</h1>
              <div class="section-header-breadcrumb">
                  @yield('breadcrumb')
              </div>
            </div>
            @yield('body')
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
              Hak Cipta &copy; <a href="{{url('gitlab.com/arifpujinugroho')}}" target="_blank" class="text-primary">{{env('APP_NAME')}}</a>
        </div>
        <div class="footer-right">
            V1.0.0
            {{-- <div class="bullet"></div> {{date('Y')}} --}}
        </div>
      </footer>
    </div>
  </div>

@yield('end')

{{-- Ion Icon --}}
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>


<!-- General JS Scripts -->
<script src="{{asset('assets/modules/jquery.min.js')}}"></script>
<script src="{{asset('assets/modules/popper.js')}}"></script>
<script src="{{asset('assets/modules/tooltip.js')}}"></script>
<script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('assets/modules/moment.min.js')}}"></script>
<script src="{{asset('assets/js/stisla.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/modules/sweetalert2/dist/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/modules/izitoast/js/iziToast.min.js')}}"></script>

@stack('js')

<!-- Template JS File -->
<script src="{{asset('assets/js/scripts.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
</body>
</html>
