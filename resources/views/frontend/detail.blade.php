<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $data->name }} - Jersey Sfighter Apparel</title>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:400,400i,600,700' rel='stylesheet'>

    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/font-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sliders.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/apple-touch-icon-114x114.png') }}">

</head>

<body class="relative">

    <!-- Preloader -->
    <div class="loader-mask">
        <div class="loader">
            <div></div>
            <div></div>
        </div>
    </div>

    <main class="main-wrapper">

        <header class="nav-type-1">

            <!-- Fullscreen search -->
            <div class="search-wrap">
                <div class="search-inner">
                    <div class="search-cell">
                        <form method="get" action="{{ url('/') }}">
                            <div class="search-field-holder">
                                <input type="text" name="search" class="form-control main-search-input"
                                    placeholder="Search for">
                                <i class="ui-close search-close" id="search-close"></i>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end fullscreen search -->

            <nav class="navbar navbar-static-top">
                <div class="navigation" id="sticky-nav">
                    <div class="container relative">

                        <div class="row flex-parent">

                            <div class="navbar-header flex-child">
                                <!-- Logo -->
                                <div class="logo-container">
                                    <div class="logo-wrap">
                                        <a href="index.html">
                                            <h1>Jersey Sfighter Apparel</h1>
                                        </a>
                                    </div>
                                </div>
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                    data-target="#navbar-collapse">
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

                            <div class="nav-wrap flex-child">
                                <div class="collapse navbar-collapse text-center" id="navbar-collapse">

                                    <ul class="nav navbar-nav">

                                        <li><a href="{{ url('/') }}">Beranda</a></li>

                                        @if ($category->count() > 0)
                                            <li class="dropdown">
                                                <a href="#">Kategori</a><i
                                                    class="fa fa-angle-down dropdown-trigger"></i>
                                                <ul class="dropdown-menu">
                                                    @foreach ($category as $c)
                                                        <li><a
                                                                href="{{ url('/') }}?type={{ $c->type }}">{{ $c->type }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endif

                                        <li><a href="{{ url('keranjang') }}">Keranjang</a></li>

                                        <li><a href="{{ url('wishlist') }}">Wishlist</a></li>


                                        @guest
                                            <li class="dropdown">
                                                <a href="#">Akun</a><i class="fa fa-angle-down dropdown-trigger"></i>
                                                <ul class="dropdown-menu">
                                                    <li><a href="{{ url('login') }}">Login</a></li>
                                                    <li><a href="{{ url('register') }}">Registrasi</a></li>
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
                                            <form method="get" action="{{url('/')}}" class="mobile-search">
                                                <input type="text" name="search" class="form-control"
                                                    placeholder="Search...">
                                                <button type="submit" class="search-button">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </form>
                                        </li>

                                    </ul> <!-- end menu -->
                                </div> <!-- end collapse -->
                            </div> <!-- end col -->

                            <div class="flex-child flex-right nav-right hidden-sm hidden-xs">
                                <ul>
                                    <li class="nav-search-wrap style-2 hidden-sm hidden-xs">
                                        <a href="#" class="nav-search search-trigger">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div> <!-- end row -->
                    </div> <!-- end container -->
                </div> <!-- end navigation -->
            </nav> <!-- end navbar -->
        </header>
        <hr>

        <div class="content-wrapper oh">

            @include('layouts.alert')

            <!-- Single Product -->
            <section class="section-wrap pb-40 single-product">
                <div class="container-fluid semi-fluid">
                    <div class="row">

                        <div class="col-md-6 col-xs-12 product-slider mb-60">

                            <div class="flickity flickity-slider-wrap mfp-hover" id="gallery-main">

                                @foreach ($data->galleries as $img)
                                    <div class="gallery-cell">
                                        <a href="{{ $img['photo'] }}" class="lightbox-img text-center">
                                            <img src="{{ $img['photo'] }}" class="text-center"
                                                style="max-height: 650px; width:auto" alt="" />
                                            <i class="ui-zoom zoom-icon"></i>
                                        </a>
                                    </div>
                                @endforeach

                            </div> <!-- end gallery main -->

                            <div class="gallery-thumbs">

                                @foreach ($data->galleries as $img)
                                    <div class="gallery-cell">
                                        <img src="{{ $img['photo'] }}" alt="" />
                                    </div>
                                @endforeach
                            </div> <!-- end gallery thumbs -->

                        </div> <!-- end col img slider -->

                        <div class="col-md-6 col-xs-12 product-description-wrap">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="active">
                                    {{ $data->type }}
                                </li>
                            </ol>
                            <h1 class="product-title">{{ $data->name }}</h1>
                            <span class="price">
                                <ins>
                                    <span class="amount">Rp. {{ $data->price }}</span>
                                </ins>
                            </span>
                            <p class="short-description">{!! $data->description !!}.</p>


                            <div class="product-actions">
                                <span>Qty:</span>
                                <div class="quantity buttons_added">
                                    <input form="masukKeranjang" type="number" step="1" max="{{ $data->quantity }}" min="1" name="jumlah"
                                        value="1" title="Qty" class="input-text qty text" />
                                    <div class="quantity-adjust">
                                        <a href="#" class="plus">
                                            <i class="fa fa-angle-up"></i>
                                        </a>
                                        <a href="#" class="minus">
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                    </div>
                                </div>

                                <a onclick="$('#masukKeranjang').submit()" class="btn btn-dark btn-lg add-to-cart"><span>Add to Cart</span></a>
                                <a href="{{ route('add-wishlist', $data->id) }}" class="product-add-to-wishlist"><i class="fa fa-heart"></i></a>
                                </div>
                                <form action="{{route('add-keranjang')}}" id="masukKeranjang" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" form="masukKeranjang">
                                <input type="hidden" form="masukKeranjang" name="product_id" value="{{$data->id}}">
                            </form>





                        </div> <!-- end col product description -->
                    </div> <!-- end row -->

                </div> <!-- end container -->
            </section> <!-- end single product -->




            <!-- Footer Type-1 -->
            <footer class="footer footer-type-1">

                <div class="bottom-footer">
                    <div class="container">
                        <div class="row">

                            <div class="col-sm-6 copyright sm-text-center">
                                <span>
                                    &copy; {{date('Y')}}, Jersey Sfighter Apparel <br> <small><i class="fa fa-building" aria-hidden="true"></i>  : Jl. Ahmad Wahid, Mantup, Baturetno. Kec. Banguntapan, Kabupaten Bantul, DIY 55197 <br> <i class="fa fa-instagram text-danger"></i> : <a href="http://instagram.com/Sfighter_Apparel" target="_blank" rel="noopener noreferrer">@Sfighter_Apparel</a></small>
                                </span>
                            </div>

                            <div class="col-sm-6 col-xs-12 footer-payment-systems text-right sm-text-center mt-sml-10">
                                <i class="fa fa-cc-paypal"></i>
                                <i class="fa fa-cc-visa"></i>
                                <i class="fa fa-cc-mastercard"></i>
                                <i class="fa fa-cc-discover"></i>
                                <i class="fa fa-cc-amex"></i>
                            </div>

                        </div>
                    </div>
                </div> <!-- end bottom footer -->
            </footer> <!-- end footer -->

            <div id="back-to-top">
                <a href="#top"><i class="fa fa-angle-up"></i></a>
            </div>

        </div> <!-- end content wrapper -->
    </main> <!-- end main wrapper -->

    <!-- jQuery Scripts -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>

</body>

</html>
