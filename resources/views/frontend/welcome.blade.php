<!DOCTYPE html>
<html lang="en">
<head>
  <title>Beranda - Sfighter Jersey</title>

  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="description" content="">

  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:400,400i,600,700' rel='stylesheet'>

  <!-- Css -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/magnific-popup.css" />
  <link rel="stylesheet" href="css/font-icons.css" />
  <link rel="stylesheet" href="css/sliders.css" />
  <link rel="stylesheet" href="css/style.css" />

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
                    <h1>Sfighter</h1>
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
                    <a href="#" class="nav-cart-icon">
                      0
                    </a>
                  </div>
                </div>
                <div class="nav-cart-amount">
                  <a href="#"> Rp. 0</a>
                </div>
              </div> <!-- end cart -->

              <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">

                <li><a href="{{url('/')}}">Beranda</a></li>

                  <li class="dropdown">
                    <a href="#">Kategori</a><i class="fa fa-angle-down dropdown-trigger"></i>
                    <ul class="dropdown-menu">
                      <li><a href="#">About Us</a></li>
                    </ul>
                  </li>

                <li><a href="{{url('/')}}">Keranjang</a></li>

                <li><a href="{{url('/')}}">Wishlist</a></li>


                  <li class="dropdown">
                    <a href="#">Akun</a><i class="fa fa-angle-down dropdown-trigger"></i>
                    <ul class="dropdown-menu">
                    @guest
                    <li><a href="{{url('login')}}">Login</a></li>
                    <li><a href="{{url('register')}}">Registrasi</a></li>
                    @endguest
                    </ul>
                  </li> <!-- end elements -->

                  @auth
                  <li class="mobile-links hidden-lg hidden-md">
                    <a href="#">My Account</a>
                  </li>
                  @endauth

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
              <form class="relative mt-60 hidden-sm hidden-xs">
                <input type="search" class="searchbox mb-0" placeholder="Search">
                <button type="submit" class="search-button"><i class="fa fa-search"></i></button>
              </form>

              <div class="social-icons mt-40 nobase hidden-sm hidden-xs">
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
              </div>

              <div class="copyright hidden-sm hidden-xs">
                <span>
                  &copy; {{date('Y')}}, Sfighter Jersey Apparel<br> Made by <a href="http://indah.arif.app">Indah</a>
                </span>
              </div>

            </div> <!-- end nav-wrap -->

          </div> <!-- end row -->
        </div> <!-- end container -->
      </nav> <!-- end navbar -->
    </header>

    <div class="content-wrapper oh">

      <div class="products-grid-wrap clearfix">
        <div id="products-grid">

          <div class="product-item hover-trigger">
            <div class="product-img">
              <a href="shop-single.html">
                <img src="img/shop/shop_item_1.jpg" alt="">
              </a>
              <div class="product-label">
                <span class="sale">sale</span>
              </div>
              <div class="hover-overlay">
                <div class="product-actions">
                  <a href="#" class="product-add-to-wishlist">
                    <i class="fa fa-heart"></i>
                  </a>
                </div>
                <div class="product-details valign">
                  <span class="category">
                    <a href="catalogue-grid.html">Women</a>
                  </span>
                  <h3 class="product-title">
                    <a href="shop-single.html">Drawstring Dress</a>
                  </h3>
                  <span class="price">
                    <del>
                      <span>$730.00</span>
                    </del>
                    <ins>
                      <span class="amount">$399.99</span>
                    </ins>
                  </span>
                  <div class="btn-quickview">
                    <a href="#" class="btn btn-md btn-color">
                    <span>Quickview</span>
                  </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="product-item hover-trigger">
            <div class="product-img">
              <a href="shop-single.html">
                <img src="img/shop/shop_item_2.jpg" alt="">
              </a>
              <div class="hover-overlay">
                <div class="product-actions">
                  <a href="#" class="product-add-to-wishlist">
                    <i class="fa fa-heart"></i>
                  </a>
                </div>
                <div class="product-details valign">
                  <span class="category">
                    <a href="catalogue-grid.html">Accessories</a>
                  </span>
                  <h3 class="product-title">
                    <a href="shop-single.html">Mesh Sandal</a>
                  </h3>
                  <span class="price">
                    <ins>
                      <span class="amount">$190.00</span>
                    </ins>
                  </span>
                  <div class="btn-quickview">
                    <a href="#" class="btn btn-md btn-color">
                    <span>Quickview</span>
                  </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="product-item hover-trigger">
            <div class="product-img">
              <a href="shop-single.html">
                <img src="img/shop/shop_item_3.jpg" alt="">
              </a>
              <div class="hover-overlay">
                <div class="product-actions">
                  <a href="#" class="product-add-to-wishlist">
                    <i class="fa fa-heart"></i>
                  </a>
                </div>
                <div class="product-details valign">
                  <span class="category">
                    <a href="catalogue-grid.html">Women</a>
                  </span>
                  <h3 class="product-title">
                    <a href="shop-single.html">Tribal Grey Blazer</a>
                  </h3>
                  <span class="price">
                    <ins>
                      <span class="amount">$330.00</span>
                    </ins>
                  </span>
                  <div class="btn-quickview">
                    <a href="#" class="btn btn-md btn-color">
                    <span>Quickview</span>
                  </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="product-item hover-trigger">
            <div class="product-img">
              <a href="shop-single.html">
                <img src="img/shop/shop_item_4.jpg" alt="">
              </a>
              <div class="hover-overlay">
                <div class="product-actions">
                  <a href="#" class="product-add-to-wishlist">
                    <i class="fa fa-heart"></i>
                  </a>
                </div>
                <div class="product-details valign">
                  <span class="category">
                    <a href="catalogue-grid.html">Men</a>
                  </span>
                  <h3 class="product-title">
                    <a href="shop-single.html">Sweater w/ Colar</a>
                  </h3>
                  <span class="price">
                    <ins>
                      <span class="amount">$299.00</span>
                    </ins>
                  </span>
                  <div class="btn-quickview">
                    <a href="#" class="btn btn-md btn-color">
                    <span>Quickview</span>
                  </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="product-item hover-trigger">
            <div class="product-img">
              <a href="shop-single.html">
                <img src="img/shop/shop_item_5.jpg" alt="">
              </a>
              <div class="hover-overlay">
                <div class="product-actions">
                  <a href="#" class="product-add-to-wishlist">
                    <i class="fa fa-heart"></i>
                  </a>
                </div>
                <div class="product-details valign">
                  <span class="category">
                    <a href="catalogue-grid.html">Women</a>
                  </span>
                  <h3 class="product-title">
                    <a href="shop-single.html">Lola May Crop Blazer</a>
                  </h3>
                  <span class="price">
                    <ins>
                      <span class="amount">$42.00</span>
                    </ins>
                  </span>
                  <div class="btn-quickview">
                    <a href="#" class="btn btn-md btn-color">
                    <span>Quickview</span>
                  </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="product-item hover-trigger">
            <div class="product-img">
              <a href="shop-single.html">
                <img src="img/shop/shop_item_6.jpg" alt="">
              </a>
              <div class="product-label">
                <span class="sale">sale</span>
              </div>
              <div class="hover-overlay">
                <div class="product-actions">
                  <a href="#" class="product-add-to-wishlist">
                    <i class="fa fa-heart"></i>
                  </a>
                </div>
                <div class="product-details valign">
                  <span class="category">
                    <a href="catalogue-grid.html">Men</a>
                  </span>
                  <h3 class="product-title">
                    <a href="shop-single.html">Faux Suits</a>
                  </h3>
                  <span class="price">
                    <del>
                      <span>$500.00</span>
                    </del>
                    <ins>
                      <span class="amount">$233.00</span>
                    </ins>
                  </span>
                  <div class="btn-quickview">
                    <a href="#" class="btn btn-md btn-color">
                    <span>Quickview</span>
                  </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="product-item hover-trigger">
            <div class="product-img">
              <a href="shop-single.html">
                <img src="img/shop/shop_item_7.jpg" alt="">
              </a>
              <div class="hover-overlay">
                <div class="product-actions">
                  <a href="#" class="product-add-to-wishlist">
                    <i class="fa fa-heart"></i>
                  </a>
                </div>
                <div class="product-details valign">
                  <span class="category">
                    <a href="catalogue-grid.html">Accessories</a>
                  </span>
                  <h3 class="product-title">
                    <a href="shop-single.html">Crew Watch</a>
                  </h3>
                  <span class="price">
                    <ins>
                      <span class="amount">$280.00</span>
                    </ins>
                  </span>
                  <div class="btn-quickview">
                    <a href="#" class="btn btn-md btn-color">
                    <span>Quickview</span>
                  </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="product-item hover-trigger">
            <div class="product-img">
              <a href="shop-single.html">
                <img src="img/shop/shop_item_8.jpg" alt="">
              </a>
              <div class="hover-overlay">
                <div class="product-actions">
                  <a href="#" class="product-add-to-wishlist">
                    <i class="fa fa-heart"></i>
                  </a>
                </div>
                <div class="product-details valign">
                  <span class="category">
                    <a href="catalogue-grid.html">Women</a>
                  </span>
                  <h3 class="product-title">
                    <a href="shop-single.html">Jersey Stylish</a>
                  </h3>
                  <span class="price">
                    <ins>
                      <span class="amount">$289.00</span>
                    </ins>
                  </span>
                  <div class="btn-quickview">
                    <a href="#" class="btn btn-md btn-color">
                    <span>Quickview</span>
                  </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="product-item hover-trigger">
            <div class="product-img">
              <a href="shop-single.html">
                <img src="img/shop/shop_item_5.jpg" alt="">
              </a>
              <div class="hover-overlay">
                <div class="product-actions">
                  <a href="#" class="product-add-to-wishlist">
                    <i class="fa fa-heart"></i>
                  </a>
                </div>
                <div class="product-details valign">
                  <span class="category">
                    <a href="catalogue-grid.html">Women</a>
                  </span>
                  <h3 class="product-title">
                    <a href="shop-single.html">Lola May Crop Blazer</a>
                  </h3>
                  <span class="price">
                    <ins>
                      <span class="amount">$42.00</span>
                    </ins>
                  </span>
                  <div class="btn-quickview">
                    <a href="#" class="btn btn-md btn-color">
                    <span>Quickview</span>
                  </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="product-item hover-trigger">
            <div class="product-img">
              <a href="shop-single.html">
                <img src="img/shop/shop_item_6.jpg" alt="">
              </a>
              <div class="product-label">
                <span class="sale">sale</span>
              </div>
              <div class="hover-overlay">
                <div class="product-actions">
                  <a href="#" class="product-add-to-wishlist">
                    <i class="fa fa-heart"></i>
                  </a>
                </div>
                <div class="product-details valign">
                  <span class="category">
                    <a href="catalogue-grid.html">Men</a>
                  </span>
                  <h3 class="product-title">
                    <a href="shop-single.html">Faux Suits</a>
                  </h3>
                  <span class="price">
                    <del>
                      <span>$500.00</span>
                    </del>
                    <ins>
                      <span class="amount">$233.00</span>
                    </ins>
                  </span>
                  <div class="btn-quickview">
                    <a href="#" class="btn btn-md btn-color">
                    <span>Quickview</span>
                  </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="product-item hover-trigger">
            <div class="product-img">
              <a href="shop-single.html">
                <img src="img/shop/shop_item_7.jpg" alt="">
              </a>
              <div class="hover-overlay">
                <div class="product-actions">
                  <a href="#" class="product-add-to-wishlist">
                    <i class="fa fa-heart"></i>
                  </a>
                </div>
                <div class="product-details valign">
                  <span class="category">
                    <a href="catalogue-grid.html">Accessories</a>
                  </span>
                  <h3 class="product-title">
                    <a href="shop-single.html">Crew Watch</a>
                  </h3>
                  <span class="price">
                    <ins>
                      <span class="amount">$280.00</span>
                    </ins>
                  </span>
                  <div class="btn-quickview">
                    <a href="#" class="btn btn-md btn-color">
                    <span>Quickview</span>
                  </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="product-item hover-trigger">
            <div class="product-img">
              <a href="shop-single.html">
                <img src="img/shop/shop_item_8.jpg" alt="">
              </a>
              <div class="hover-overlay">
                <div class="product-actions">
                  <a href="#" class="product-add-to-wishlist">
                    <i class="fa fa-heart"></i>
                  </a>
                </div>
                <div class="product-details valign">
                  <span class="category">
                    <a href="catalogue-grid.html">Women</a>
                  </span>
                  <h3 class="product-title">
                    <a href="shop-single.html">Jersey Stylish</a>
                  </h3>
                  <span class="price">
                    <ins>
                      <span class="amount">$289.00</span>
                    </ins>
                  </span>
                  <div class="btn-quickview">
                    <a href="#" class="btn btn-md btn-color">
                    <span>Quickview</span>
                  </a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div> <!-- end products grid -->
      </div> <!-- end product grid wrap -->

    </div> <!-- end content wrapper -->
  </main> <!-- end main wrapper -->

  <!-- jQuery Scripts -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/plugins.js"></script>
  <script type="text/javascript" src="js/scripts.js"></script>

</body>
</html>
