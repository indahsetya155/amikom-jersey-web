<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chackout - Sfighter Jersey</title>

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

    <!-- Page Title -->
    <section class="page-title text-center bg-light">
      <div class="container relative clearfix">
        <div class="title-holder">
          <div class="title-text">
            <h1 class="uppercase">Riwayat</h1>
            <ol class="breadcrumb">
              <li>
                <a href="{{url('/')}}">Home</a>
              </li>
              <li class="active">
                Riwayat
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
              <div class="table-responsive table-wrap mb-30">
                <table class="shop_table cart table">
                  <thead>
                    <tr class="">
                      <th class=" text-center">ID Transaksi</th>
                      <th class="product-price text-center">Nama Penerima</th>
                      <th class="text-center">Telepon</th>
                      <th class="text-center">Alamat</th>
                      <th class="product-subtotal text-center">Status</th>
                      <th class="product-subtotal text-center">Total</th>
                      <th class="product-subtotal text-center" colspan="2"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($checkout as $c)
                    <tr class="cart_item">
                      <td class="product-thumbnail text-center">
                        <a href="#">
                            {{$c->kode}}
                        </a>
                      </td>
                      <td class=" text-center">
                        <a href="#">{{$c->name}}</a>
                      </td>
                      <td class="product-price text-center">
                        <span class="amount">{{$c->number}}</span>
                      </td>
                        <td class=" text-left">
                            <span class="amount">{{$c->address}} - <span class="text-uppercase">{{$c->kurir}}</span> ({{$c->ongkir}} Hari)</span>
                        </td>
                        <td class="product-subtotal text-center">
                            <span class="amount">{{$c->transaction_status}}</span>
                        </td>
                      <td class="product-quantity text-center">
                          <span class="amount">Rp. {{rupiah($c->transaction_total)}}</span>
                      </td>
                      <td class="text-center">
                        @if ($c->file)
                          <a href="{{url('/')}}/{{$c->file}}" target="_blank" rel="noopener noreferrer" class="btn btn-md btn-color m-4"><span><i class="fa fa-eye" aria-hidden="true"></i> Desain</span></a><br><br>
                          @if($c->transaction_status == 'PENDING')
                            <a  rel="noopener noreferrer" class="btn btn-md btn-color m-4 uploadFile" value="{{url('uploadfile')}}/{{$c->id}}" tipe="desain"><span><i class="fa fa-upload" aria-hidden="true"></i> Desain</span></a><br>
                          @endif
                        @else
                          @if($c->transaction_status == 'PENDING')
                            <a  rel="noopener noreferrer" class="btn btn-md btn-color m-4 uploadFile" value="{{url('uploadfile')}}/{{$c->id}}" tipe="desain"><span><i class="fa fa-upload" aria-hidden="true"></i> Desain</span></a><br>
                          @endif
                        @endif
                      </td>
                      <td class="text-center">
                        @if ($c->bukti)
                          <a href="{{url('/')}}/{{$c->bukti}}" target="_blank" rel="noopener noreferrer" class="btn btn-md btn-color m-4"><span><i class="fa fa-eye" aria-hidden="true"></i> Bukti</span></a><br><br>
                          @if($c->transaction_status == 'PENDING')
                            <a rel="noopener noreferrer" class="btn btn-md btn-color m-4 uploadFile" value="{{url('uploadfile')}}/{{$c->id}}" tipe="bukti"><span><i class="fa fa-upload" aria-hidden="true"></i> Bukti</span></a><br>
                          @endif
                        @else
                          @if($c->transaction_status == 'PENDING')
                            <a rel="noopener noreferrer" class="btn btn-md btn-color m-4 uploadFile" value="{{url('uploadfile')}}/{{$c->id}}" tipe="bukti"><span><i class="fa fa-upload" aria-hidden="true"></i> Bukti</span></a><br>
                          @endif
                        @endif
                      </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-danger">Maaf, Checkout Belanja Anda Kosong</td>
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

  <!-- Modal -->
  <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <form action="#" method="post" id="formUpload" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group" id="formBukti">
                      <label for="">Bukti Transfer</label>
                      <input type="file" class="form-control" name="bukti" id="bukti" placeholder="" accept=".jpg,.png,.jpeg" required>
                    </div>
                    <div class="form-group" id="formDesain">
                      <label for="">File Desain</label>
                      <input type="file" class="form-control" name="file" id="file" placeholder="" accept=".jpg,.png,.jpeg" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-md btn-color"><span>Simpan</span></button>
                </div>
            </form>
        </div>
    </div>
  </div>

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

    $(document).on('click','.uploadFile', function(e){
        var tipe = $(this).attr('tipe');
        var url = $(this).attr('value');
        $('#formUpload').attr('action',url);
        if(tipe == 'bukti'){
            $('#formBukti').show();
            $('#formDesain').hide();
            $('#file').attr('disabled','disabled');
            $('#bukti').removeAttr('disabled');
        }else{
            $('#formBukti').hide();
            $('#formDesain').show();
            $('#bukti').attr('disabled','disabled');
            $('#file').removeAttr('disabled');
        }
        $('#modelId').modal('show');
    });
    </script>

</body>
</html>
