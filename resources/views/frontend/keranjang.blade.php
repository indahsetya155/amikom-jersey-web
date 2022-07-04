<!DOCTYPE html>
<html lang="en">
<head>
    <title>Keranjang - Sfighter Jersey</title>

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
                                        <a href="{{url('/')}}">
                                            <h1>Sfighter</h1>
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
                                            <li><a href="{{ url('/') }}">Logout</a></li>
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
                                    {{-- <li class="nav-cart">
                    <div class="nav-cart-outer">
                      <div class="nav-cart-inner">
                        <a href="#" class="nav-cart-icon">
                          0
                        </a>
                      </div>
                    </div>
                    <div class="nav-cart-container">
                      <div class="nav-cart-items">

                        <div class="nav-cart-item clearfix">
                          <div class="nav-cart-img">
                            <a href="#">
                              <img src="img/shop/shop_item_1.jpg" alt="">
                            </a>
                          </div>
                          <div class="nav-cart-title">
                            <a href="#">
                              Ladies Bag
                            </a>
                            <div class="nav-cart-price">
                              <span>1 x</span>
                              <span>1250.00</span>
                            </div>
                          </div>
                          <div class="nav-cart-remove">
                            <a href="#" class="remove"><i class="ui-close"></i></a>
                          </div>
                        </div>

                        <div class="nav-cart-item clearfix">
                          <div class="nav-cart-img">
                            <a href="#">
                              <img src="img/shop/shop_item_2.jpg" alt="">
                            </a>
                          </div>
                          <div class="nav-cart-title">
                            <a href="#">
                              Sequin Suit longer title
                            </a>
                            <div class="nav-cart-price">
                              <span>1 x</span>
                              <span>1250.00</span>
                            </div>
                          </div>
                          <div class="nav-cart-remove">
                            <a href="#" class="remove"><i class="ui-close"></i></a>
                          </div>
                        </div>

                      </div> <!-- end cart items -->

                      <div class="nav-cart-summary">
                        <span>Cart Subtotal</span>
                        <span class="total-price">$1799.00</span>
                      </div>

                      <div class="nav-cart-actions mt-20">
                        <a href="shop-cart.html" class="btn btn-md btn-dark"><span>View Cart</span></a>
                        <a href="shop-checkout.html" class="btn btn-md btn-color mt-10"><span>Proceed to Checkout</span></a>
                      </div>
                    </div>
                  </li> --}}
                                </ul>
                            </div>

                        </div> <!-- end row -->
                    </div> <!-- end container -->
                </div> <!-- end navigation -->
            </nav> <!-- end navbar -->
        </header>

    <!-- Page Title -->
    <section class="page-title text-center bg-light">
      <div class="container relative clearfix">
        <div class="title-holder">
          <div class="title-text">
            <h1 class="uppercase">Keranjang</h1>
            <ol class="breadcrumb">
              <li>
                <a href="{{url('/')}}">Home</a>
              </li>
              <li class="active">
                Keranjang
              </li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <div class="content-wrapper oh">
        @include('layouts.alert')
      <!-- Cart -->
      <section class="section-wrap shopping-cart">
        <div class="container relative">
          <div class="row">

            <div class="col-md-12">
              <div class="table-wrap mb-30">
                <table class="shop_table cart table">
                  <thead>
                    <tr>
                      <th class="product-name" colspan="2">Produk</th>
                      <th class="product-price">Harga</th>
                      <th class="product-quantity">Jumlah</th>
                      <th class="product-subtotal" colspan="2">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($cart as $c)
                    <tr class="cart_item">
                      <td class="product-thumbnail">
                        <a href="{{$c->product_id}}">
                            @foreach($c->product->galleries as $key => $img)
                            @if($key == 0)
                                <img src="{{$img['photo']}}" alt="">
                                @endif
                            @endforeach
                        </a>
                      </td>
                      <td class="product-name">
                        <a href="#">{{$c->product->name}}</a>
                      </td>
                      <td class="product-price">
                        <span class="amount">Rp. {{rupiah($c->product->price)}}</span>
                      </td>
                      <td class="product-quantity">
                        <div class="quantity buttons_added">
                          <input type="number" step="1" max="{{$c->product->quantity}}" min="0" value="{{$c->jumlah}}" title="Qty" class="input-text qty text">
                          <div class="quantity-adjust">
                            <a href="#" value="{{url('change-jumlah')}}?id={{$c->id}}&step=plus" class="perubahanJumlah plus">
                              <i class="fa fa-angle-up"></i>
                            </a>
                            <a href="#" value="{{url('change-jumlah')}}?id={{$c->id}}&step=min" class="perubahanJumlah minus">
                              <i class="fa fa-angle-down"></i>
                            </a>
                          </div>
                        </div>
                      </td>
                      <td class="product-subtotal">
                        <span class="amount">Rp. {{rupiah($c->product->price * $c->jumlah)}}</span>
                      </td>
                      <td class="product-remove">
                        <a href="{{url('hapus-keranjang')}}?id={{$c->id}}" class="remove" title="Remove this item">
                          <i class="ui-close"></i>
                        </a>
                      </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-danger">Maaf, Keranjang Belanja Anda Kosong</td>
                        </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>

              <div class="row mb-50">
                <div class="col-md-5 col-sm-12">
                  <div class="coupon">
                  </div>
                </div>

                <div class="col-md-7">
                  <div class="actions">
                    <div class="wc-proceed-to-checkout">
                        @if($cart->count() > 0)
                      <a href="{{url('form-checkout')}}" class="btn btn-lg btn-dark"><span>Checkout</span></a>
                      @endif
                    </div>
                  </div>
                </div>
              </div>

            </div> <!-- end col -->
          </div> <!-- end row -->



        </div> <!-- end container -->
      </section> <!-- end cart -->



      <!-- Footer Type-1 -->
      <footer class="footer footer-type-1">

        <div class="bottom-footer">
          <div class="container">
            <div class="row">

              <div class="col-sm-6 copyright sm-text-center">
                <span>
                                    &copy; {{date('Y')}}, Sfighter Jersey Apparel || Made by <a href="http://indah.arif.app">Indah</a>
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

    <script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        });
    });
        $('body .perubahanJumlah').click(function(e) {
            e.preventDefault();
                $.ajax({
                    url: $(this).attr('value'),
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    success: function() {
                        location.reload();
                    },
                });
        });
    </script>

</body>
</html>
