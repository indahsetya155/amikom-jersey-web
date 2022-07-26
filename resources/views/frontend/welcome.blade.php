<!DOCTYPE html>
<html lang="en">
<head>
  <title>Beranda - Jersey Sfighter Apparel</title>

  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="">

  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:400,400i,600,700' rel='stylesheet'>

  <!-- Css -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
  <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" />
  <link rel="stylesheet" href="{{asset('css/font-icons.css')}}" />
  <link rel="stylesheet" href="{{asset('css/sliders.css')}}" />
  <link rel="stylesheet" href="{{asset('css/style.css')}}" />
  <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>

  <!-- Favicons -->
  <link rel="shortcut icon" href="img/favicon.ico">
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

</head>

<body class="relative vertical-nav">

  <!-- Preloader -->
  <div class="loader-mask">
    <div class="loader">
      <div></div>
      <div></div>
    </div>
  </div>

  <main class="main-wrapper">

    <header class="nav-type-2">

      <nav class="navbar">
        <div class="container header-wrap relative">

          <div class="row">

            <div class="navbar-header">
              <!-- Logo -->
              <div class="logo-container">
                <div class="logo-wrap">
                  <a href="{{url('/')}}">
                    <h1>Jersey Sfighter Apparel</h1>
                  </a>
                </div>
              </div>
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!-- Mobile cart -->
              <div class="nav-cart mobile-cart hidden-lg hidden-md">
                <div class="nav-cart-outer">
                  <div class="nav-cart-inner">
                    <a href="#" class="nav-cart-icon">
                      <span class="nav-cart-badge">2</span>
                    </a>
                  </div>
                </div>
              </div>
            </div> <!-- end navbar-header -->
            <div class="clear"></div>

            <div class="nav-wrap">

              <!-- Cart -->
              <div class="nav-cart clearfix hidden-sm hidden-xs">
                <div class="nav-cart-outer">
                  <div class="nav-cart-inner">
                    <a href="{{url('keranjang')}}" class="nav-cart-icon">
                      {{$cart}}
                    </a>
                  </div>
                </div>
              </div> <!-- end cart -->

              <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">

                <li><a href="{{url('/')}}">Beranda</a></li>

                  @if($category->count() > 0)
                  <li class="dropdown">
                    <a href="#">Kategori</a><i class="fa fa-angle-down dropdown-trigger"></i>
                    <ul class="dropdown-menu">
                        @foreach ($category as $c)
                        <li><a href="{{url('/')}}?type={{$c->type}}">{{$c->type}}</a></li>
                        @endforeach
                    </ul>
                  </li>
                  @endif

                <li><a href="{{url('keranjang')}}">Keranjang</a></li>

                <li><a href="{{url('wishlist')}}">Wishlist</a></li>


                @guest
                <li class="dropdown">
                    <a href="#">Akun</a><i class="fa fa-angle-down dropdown-trigger"></i>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('login')}}">Login</a></li>
                        <li><a href="{{url('register')}}">Registrasi</a></li>
                    </ul>
                </li> <!-- end elements -->
                @else
                <li><a href="{{url('checkout')}}">Riwayat</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                @endguest

                  <!-- Mobile search -->
                  <li id="mobile-search" class="hidden-lg hidden-md">
                    <form method="get" class="mobile-search">
                      <input type="search" class="form-control" placeholder="Search...">
                      <button type="submit" class="search-button">
                        <i class="fa fa-search"></i>
                      </button>
                    </form>
                  </li>

                </ul> <!-- end menu -->
              </div> <!-- end collapse -->

              <!-- Search -->
              <form class="relative mt-60 hidden-sm hidden-xs" action="{{url()->current()}}">
                <input type="text" name="search" value="{{request()->search}}" class="searchbox mb-0" placeholder="Cari Nama Produk">
                <button type="submit" class="search-button"><i class="fa fa-search"></i></button>
              </form>

              <div class="social-icons mt-40 nobase hidden-sm hidden-xs">
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
              </div>

              <div class="copyright hidden-sm hidden-xs">
                <span>
                  &copy; {{date('Y')}}, Jersey Sfighter Apparel || Alamat     : Jl. Ahmad Wahid, Mantup, Baturetno. Kec. Banguntapan, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55197 || Telephone/WA  : 081233922690 || IG : @Sfighter_Apparel
<br> Made by <a href="http://indah.arif.app">Indah</a>
                </span>
              </div>

            </div> <!-- end nav-wrap -->

          </div> <!-- end row -->
        </div> <!-- end container -->
      </nav> <!-- end navbar -->
    </header>

    <div class="content-wrapper oh">


      <div class="products-grid-wrap clearfix">
        @include('layouts.alert')
            @if($products->count() == 0)
            <div class="alert alert-warning" id="produkKosong" role="alert">
                <strong>Maaf</strong>, Barang tidak ditemukan
            </div>
            <script>
                $('.alert').alert();
            </script>
            @endif
        <div id="products-grid">
            @foreach ($products as $product)
            <div class="product-item hover-trigger">
              <div class="product-img">
                <a href="{{url('/item')}}/{{$product->id}}">
                    @if($product->galleries->count() == 0)
                        <img src="" onerror="this.onerror=null; this.src='{{asset('/img/shop/shop_item_4.jpg')}}'" alt="foto {{$product->name}}">
                        @else
                        @foreach ($product->galleries as $key => $img)
                            @if($key == 0)
                                <img src="{{$img['photo']}}" onerror="this.onerror=null; this.src='{{asset('/img/shop/shop_item_4.jpg')}}'" alt="foto {{$product->name}}">
                            @endif
                        @endforeach
                    @endif
                </a>
                {{-- <div class="product-label">
                  <span class="sale">sale</span>
                </div> --}}
                <div class="hover-overlay">
                  <div class="product-actions">
                    <a href="{{route('add-wishlist',$product->id)}}" class="product-add-to-wishlist">
                      <i class="fa fa-heart"></i>
                    </a>
                  </div>
                  <div class="product-details valign">
                    <span class="category">
                      <a href="catalogue-grid.html">{{$product->type}}</a>
                    </span>
                    <h3 class="product-title">
                      <a href="shop-single.html">{{$product->name}}</a>
                    </h3>
                    <span class="price">
                      {{-- <del>
                        <span>$730.00</span>
                      </del> --}}
                      <ins>
                        <span class="amount">Rp. {{rupiah($product->price)}},-</span>
                      </ins>
                    </span>
                    <div class="btn-quickview">
                      <a href="{{url('/item')}}/{{$product->id}}" class="btn btn-md btn-color">
                      <span>Selengkapnya</span>
                    </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

        </div> <!-- end products grid -->
      </div> <!-- end product grid wrap -->

    </div> <!-- end content wrapper -->
  </main> <!-- end main wrapper -->

  <!-- jQuery Scripts -->
  <script type="text/javascript" src="{{asset('js/plugins.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/scripts.js')}}"></script>

</body>
</html>
