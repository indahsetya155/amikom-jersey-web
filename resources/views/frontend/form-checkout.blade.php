<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Checkout - Jersey Sfighter Apparel</title>

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
            <form method="get">
              <div class="search-field-holder">
                <input type="search" class="form-control main-search-input" placeholder="Search for">
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
            <h1 class="uppercase">Form Checkout</h1>
            <ol class="breadcrumb">
              <li>
                <a href="{{url('keranjang')}}">Keranjang</a>
              </li>
              <li class="active">
                Form Checkout
              </li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <div class="content-wrapper oh">

      <!-- Checkout -->
      <section class="section-wrap checkout pb-70">
        <div class="container relative">
          <div class="row">

            <div class="ecommerce col-xs-12">


                <form name="checkout" action="{{route('checkout')}}" method="post" enctype="multipart/form-data" class="checkout ecommerce-checkout row">
                    @csrf
                    <div class="col-md-8" id="customer_details">
                        <div>
                            <h2 class="heading uppercase bottom-line full-grey mb-30">Detail Penerima Pesanan</h2>
                            @if($errors->any())
                                {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
                                <br>
                            @endif
                    <p class="form-row form-row-first validate-required ecommerce-invalid ecommerce-invalid-required-field" id="billing_first_name_field">
                      <label for="billing_first_name">Email
                        <abbr class="required" title="required">*</abbr>
                      </label>
                      <input type="text" class="form-control" placeholder value="{{auth()->user()->email}}" name="email" id="billing_first_name" readonly>
                    </p>

                    <p class="form-row form-row-first validate-required ecommerce-invalid ecommerce-invalid-required-field" id="billing_first_name_field">
                      <label for="billing_first_name"> Nama Penerima
                        <abbr class="required" title="required">*</abbr>
                      </label>
                      <input type="text" class="input-text" placeholder value="{{$last?$last->name:''}}" name="name" id="billing_first_name" autofocus required>
                    </p>

                    <p class="form-row form-row-last validate-required validate-phone" id="billing_phone_field">
                      <label for="billing_phone">Telepon
                        <abbr class="required" title="required">*</abbr>
                      </label>
                      <input type="text" class="input-text" value="{{$last?$last->number:''}}" placeholder="Contoh : 628588599450*" value name="number" id="billing_phone" required>
                    </p>

                    <p class="form-row form-row-last validate-required validate-phone" id="billing_phone_field">
                      <label for="billing_phone">File Desain
                        <abbr class="required" title="required">*</abbr>
                      </label>
                      <input type="file"  class="form-control" placeholder value name="file" id="billing_phone" required>
                    </p>

                    <p class="form-row form-row-wide address-field validate-required ecommerce-invalid ecommerce-invalid-required-field" id="billing_address_1_field">
                      <label for="billing_address_1">Alamat Detail
                        <abbr class="required" title="required">*</abbr>
                      </label>
                      <textarea type="text" name="address" class="input-text" placeholder="Street address" id="billing_address_1" required>{{$last?$last->address:''}}</textarea>
                    </p>

                    <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-o_class="form-row form-row-wide address-field validate-required">
                      <label for="billing_city">Provinsi
                        <abbr class="required" title="required">*</abbr>
                      </label>
                      <select name="province" class="form-control" id="pilihProvinsi" required>
                          <option value="">-- Pilih Provinsi --</option>
                          @foreach (listProvinsi() as $prov)
                          <option value="{{$prov->province_id}}">{{$prov->province}}</option>
                          @endforeach
                      </select>
                    </p>

                    <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-o_class="form-row form-row-wide address-field validate-required">
                      <label for="billing_city">Kota
                        <abbr class="required" title="required">*</abbr>
                      </label>
                      <select name="city" class="form-control" id="pilihKota" required>
                        <option value="">Pilih Provinsi Dahulu</option>
                      </select>
                    </p>

                    <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-o_class="form-row form-row-wide address-field validate-required">
                      <label for="billing_city">Pilih Kurir
                        <abbr class="required" title="required">*</abbr>
                      </label>
                      <select name="kurir" class="form-control" id="pilihKurir" required>
                        <option value="">Pilih Kota dahulu</option>
                      </select>
                    </p>

                    <p class="form-row form-row-wide address-field validate-required" id="billing_city_field" data-o_class="form-row form-row-wide address-field validate-required">
                      <label for="billing_city">Jenis Pengiriman
                        <abbr class="required" title="required">*</abbr>
                      </label>
                      <select name="ongkir" class="form-control" id="pilihOngkir" required>
                        <option value="">Pilih Dahulu Kurir</option>
                      </select>
                    </p>

                    <div class="clear"></div>

                  </div>

                  <div class="clear"></div>

                  <div>
                    <p class="form-row notes ecommerce-validated" id="order_comments_field">
                      <label for="order_comments">Catatan Pembelian</label>
                      <textarea name="order_comments" class="input-text" id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="6"></textarea>
                    </p>
                  </div>

                  <div class="clear"></div>

                </div> <!-- end col -->

                <!-- Your Order -->
                <div class="col-md-4">
                  <div class="order-review-wrap ecommerce-checkout-review-order" id="order_review">
                    <h2 class="heading uppercase bottom-line full-grey">Pesanan Anda</h2>
                    <table class="table shop_table ecommerce-checkout-review-order-table">
                        @php $total =0;$berat=0;  @endphp
                      <tbody>
                        @foreach ($cart as $c)
                        <tr>
                          <th>{{$c->product->name}}<span class="count"> x {{$c->jumlah}}</span></th>
                          <td>
                            <span class="amount">Rp. {{rupiah($c->jumlah * $c->product->price)}}</span>
                          </td>
                        </tr>
                        @php
                            $total += $c->jumlah * $c->product->price;
                            $berat += $c->jumlah * $c->product->berat;
                        @endphp
                        @endforeach
                        <tr>
                          <th id="judulKurir"></th>
                          <td>
                            <span class="amount" id="hargaKurir"></span>
                          </td>
                        </tr>
                        <tr class="order-total">
                          <th><strong id="judulAksi">Perkiraan Harga</strong></th>
                          <td>
                            <strong><span class="amount" id="hargaTotal">Rp. {{rupiah($total)}},-</span></strong>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                    <div id="payment" class="ecommerce-checkout-payment">
                      <h2 class="heading uppercase bottom-line full-grey">Payment Method</h2>
                      <ul class="payment_methods methods">

                        <li class="payment_method_bacs">
                          <input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="bacs" checked="checked">
                          <label for="payment_method_bacs">Bank Transfer</label>
                          <div class="payment_box payment_method_bacs">
                            <p>Silakan anda mentransfer ke BANK MANDIRI a/n Agus Setiawan No. Rekening : 1370014159855.</p>
                          </div>
                        </li>
                        <input type="hidden" name="transaction_total" id="transaction_total" required>

                      </ul>
                      <div class="form-row place-order">
                        <input type="submit" name="ecommerce_checkout_place_order" class="btn btn-lg btn-dark" id="place_order" value="Place order">
                      </div>
                    </div>
                  </div>
                </div> <!-- end order review -->
              </form>

            </div> <!-- end ecommerce -->

          </div> <!-- end row -->
        </div> <!-- end container -->
      </section> <!-- end checkout -->



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

    <script>
        $('#pilihProvinsi').change(function(){
            $.ajax({
                url:"{{url('api/cityid')}}/"+$(this).val(),
                success:function(data)
                {
                $('#pilihKota').html('<option value="">-- Pilih Kota --</option>');
                 $.each(data,function(key,value){
                    $('#pilihKota').append('<option value="'+value.city_id+'">'+value.type+' '+value.city_name+'</option>');
                 });
                }
            });
        });

        $('#pilihKurir').change(function(){
            $.ajax({
                url:"{{url('api/harga')}}/"+$(this).val()+"/"+$('#pilihKota').val()+"/{{$berat}}",
                success:function(data)
                {
                $('#pilihOngkir').html('<option value="">-- Pilih jenis pengiriman --</option>');
                 $.each(data,function(key,value){
                    $.each(value.cost,function(key,val){
                        $('#pilihOngkir').append('<option harga="'+val.value+'" title="'+value.description+'" value="'+value.service+' '+val.etd+'">'+value.description+' ('+value.service+') || Rp. '+val.value+' || Perkiraan '+val.etd+' Hari</option>');
                    });
                 });
                }
            });
        });

        $('#pilihKota').change(function(){
            if($(this).val() != ""){
                $('#pilihKurir').html('<option value="">-- Pilih Kurir -- </option>');
                $('#pilihKurir').append('<option value="jne">JNE</option>');
                $('#pilihKurir').append('<option value="pos">POS</option>');
                $('#pilihKurir').append('<option value="tiki">TIKI</option>');
            }else{
                $('#pilihKurir').html('<option value="">Pilih Kota dahulu</option>');
            }
            $('#pilihKurir').val("");
        });

        $('#pilihOngkir').change(function(){
            if($(this).val() != ""){
                var select = $('#pilihOngkir option:selected');
                $('#judulKurir').html(select.attr('title'));
                $('#hargaKurir').html("Rp. "+select.attr('harga'));
                var jml = parseInt({{$total}}) + parseInt(select.attr('harga'));
                $('#hargaTotal').html("Rp. "+jml+",-");
                $('#transaction_total').val(jml);
            }else{
                $('#judulKurir').html("");
                $('#hargaKurir').html("");
                $('#hargaTotal').html('Rp. {{rupiah($total)}},-');
                $('#transaction_total').val("{{$total}}");
            }
        });
    </script>
</body>
</html>
