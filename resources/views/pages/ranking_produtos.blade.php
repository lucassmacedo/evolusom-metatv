@extends('layouts.horizontalDetachedLayoutMaster')

@section('title', $title)

@section('vendor-style')
  <!-- Vendor css files -->
  {{--  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')) }}">--}}
  {{--  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.css')) }}">--}}
@endsection

@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/pages/app-ecommerce-shop.css')) }}">
@endsection
@section('content')
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">
            <div class="avatar header-title-avatar p-50">
              <div class="avatar-content">
                <i class="fa fa-trophy text-info font-large-1 top-10-icon "></i>
              </div>
            </div>
            Dashboard - {{ $title }}
          </h2>
{{--          <span class="content-header-title float-right mt-1">(Atualização 31/08/2020 20:00hs)</span>--}}
        </div>
      </div>
    </div>

  </div>
  <div class="content-body">

    <!-- Wishlist Starts -->
    <section id="wishlist" class="grid-view wishlist-items">
      <div class="card ecommerce-card">
        <div class="card-content">
          <a href="app-ecommerce-details">
            <div class="item-img text-center">
              <img src="https://static.siberiano.com.br/siberiano/5f7639edb54d620201001201957.jpeg" class="img-fluid" alt="img-placeholder">
            </div>
            <div class="card-body">
              <div class="item-wrapper">
                <div class="item-rating">
                  <div class="badge badge-danger badge-md">
                    1 <i class="feather icon-star ml-25"></i>
                  </div>
                </div>
                <div>
                  <h6 class="item-price">
                    $19.99
                  </h6>
                </div>
              </div>
              <div class="item-name">
                <span>Sony - ZX Series On-Ear Headphones - Black</span>
              </div>
              <div>
                <p class="item-description">
                  These Sony ZX Series MDRZX110/BLK headphones feature neodymium magnets and 30mm drivers for powerful,
                  reinforced sound. Enjoy your favorite songs with lush bass response thanks to the Acoustic Bass
                  Booster
                  technology.
                </p>
              </div>
            </div>
          </a>

        </div>
      </div>

      <div class="card ecommerce-card">
        <div class="card-content">
          <a href="app-ecommerce-details">
            <div class="item-img text-center">
              <img src="https://static.siberiano.com.br/siberiano/5f762e820ed6220201001193114.jpeg" class="img-fluid" alt="img-placeholder">
            </div>
            <div class="card-body">
              <div class="item-wrapper">
                <div class="item-rating">
                  <div class="badge badge-danger badge-md">
                    2 <i class="feather icon-star ml-25"></i>
                  </div>
                </div>
                <div>
                  <h6 class="item-price">
                    $4999.99
                  </h6>
                </div>
              </div>
              <div class="item-name">
                    <span>
                        Asus - ROG Desktop - Intel Core i7 - 16GB Memory - Double NVIDIA GeForce GTX1080 - 1TB Hard Drive +
                        2x512GB Solid State Drive - Gray
                    </span>
              </div>
              <div>
                <p class="item-description">
                  Place the sleek form of this ASUS desktop computer tower on your desk, and take your gaming to the
                  next
                  level. With Intel Core i7 processing inside, this speedy desktop keeps up with even multilayered
                  action
                  games. Nvidia graphics on this ASUS desktop computer help eliminate ghosting and stutter so you see
                  every move your enemy makes.
                </p>
              </div>
            </div>
          </a>

        </div>
      </div>

      <div class="card ecommerce-card">
        <div class="card-content">
          <a href="app-ecommerce-details">
            <div class="item-img text-center">
              <img src="https://static.siberiano.com.br/siberiano/5f7628c8d81c320201001190648.jpeg" class="img-fluid" alt="img-placeholder">
            </div>
            <div class="card-body">
              <div class="item-wrapper">
                <div class="item-rating">
                  <div class="badge badge-danger badge-md">
                    3 <i class="feather icon-star ml-25"></i>
                  </div>
                </div>
                <div>
                  <h6 class="item-price">
                    $4499.99
                  </h6>
                </div>
              </div>
              <div class="item-name">
                    <span>
                        Sony - 75" Class (74.5" diag) - LED - 2160p - Smart - 3D - 4K Ultra HD TV with High Dynamic Range -
                        Black
                    </span>
              </div>
              <div>
                <p class="item-description">
                  This Sony 4K HDR TV boasts 4K technology for vibrant hues. Its X940D series features a bold 75-inch
                  screen and slim design. Wires remain hidden, and the unit is easily wall mounted. This television has
                  a
                  4K Processor X1 and 4K X-Reality PRO for crisp video. This Sony 4K HDR TV is easy to control via voice
                  commands.
                </p>
              </div>
            </div>
          </a>

        </div>
      </div>

      <div class="card ecommerce-card">
        <div class="card-content">
          <a href="app-ecommerce-details">
            <div class="item-img text-center">
              <img src="https://static.siberiano.com.br/siberiano/5f762840da7df20201001190432.jpeg" class="img-fluid" alt="img-placeholder">
            </div>
            <div class="card-body">
              <div class="item-wrapper">
                <div class="item-rating">
                  <div class="badge badge-danger badge-md">
                    4 <i class="feather icon-star ml-25"></i>
                  </div>
                </div>
                <div>
                  <h6 class="item-price">
                    $599.99
                  </h6>
                </div>
              </div>
              <div class="item-name">
                    <span>
                        Garmin - fēnix 5 GPS Heart Rate Monitor Watch - Slate gray
                    </span>
              </div>
              <div>
                <p class="item-description">
                  Map your adventure with this Garmin Fenix 5 GPS watch. Built-in navigation lets you know where you are
                  when hiking or camping, and integrated Wi-Fi connects to the Garmin Connect to track your fitness
                  level
                  and daily steps. This Garmin Fenix 5 GPS watch is water-resistant up to 100m for use in wet
                  conditions.
                </p>
              </div>
            </div>
          </a>

        </div>
      </div>

      <div class="card ecommerce-card">
        <div class="card-content">
          <a href="app-ecommerce-details">
            <div class="item-img text-center">
              <img src="https://static.siberiano.com.br/siberiano/5f88323530a3720201015112749.jpeg" class="img-fluid" alt="img-placeholder">
            </div>
            <div class="card-body">
              <div class="item-wrapper">
                <div class="item-rating">
                  <div class="badge badge-danger badge-md">
                    5 <i class="feather icon-star ml-25"></i>
                  </div>
                </div>
                <div>
                  <h6 class="item-price">
                    $649.99
                  </h6>
                </div>
              </div>
              <div class="item-name">
                    <span>
                        Garmin - fenix 3 Sapphire GPS Watch - Silver
                    </span>
              </div>
              <div>
                <p class="item-description">
                  This Garmin fenix 3 Sapphire GPS watch comes with a titanium bezel and band, providing style and
                  strength. This watch is waterproof up to 100m, and it comes with state-of-the-art fitness training
                  features such as advanced running dynamics with vertical oscillation and vertical ratio. Track your
                  activity and stay fit with the Garmin fenix 3 Sapphire GPS watch.
                </p>
              </div>
            </div>
          </a>

        </div>
      </div>

      <div class="card ecommerce-card">
        <div class="card-content">
          <a href="app-ecommerce-details">
            <div class="item-img text-center">
              <img src="https://static.siberiano.com.br/siberiano/5f7628c8d81c320201001190648.jpeg" class="img-fluid" alt="img-placeholder">
            </div>
            <div class="card-body">
              <div class="item-wrapper">
                <div class="item-rating">
                  <div class="badge badge-danger badge-md">
                    3 <i class="feather icon-star ml-25"></i>
                  </div>
                </div>
                <div>
                  <h6 class="item-price">
                    $4499.99
                  </h6>
                </div>
              </div>
              <div class="item-name">
                    <span>
                        Sony - 75" Class (74.5" diag) - LED - 2160p - Smart - 3D - 4K Ultra HD TV with High Dynamic Range -
                        Black
                    </span>
              </div>
              <div>
                <p class="item-description">
                  This Sony 4K HDR TV boasts 4K technology for vibrant hues. Its X940D series features a bold 75-inch
                  screen and slim design. Wires remain hidden, and the unit is easily wall mounted. This television has
                  a
                  4K Processor X1 and 4K X-Reality PRO for crisp video. This Sony 4K HDR TV is easy to control via voice
                  commands.
                </p>
              </div>
            </div>
          </a>

        </div>
      </div>

      <div class="card ecommerce-card">
        <div class="card-content">
          <a href="app-ecommerce-details">
            <div class="item-img text-center">
              <img src="https://static.siberiano.com.br/siberiano/5f762e820ed6220201001193114.jpeg" class="img-fluid" alt="img-placeholder">
            </div>
            <div class="card-body">
              <div class="item-wrapper">
                <div class="item-rating">
                  <div class="badge badge-danger badge-md">
                    2 <i class="feather icon-star ml-25"></i>
                  </div>
                </div>
                <div>
                  <h6 class="item-price">
                    $4999.99
                  </h6>
                </div>
              </div>
              <div class="item-name">
                    <span>
                        Asus - ROG Desktop - Intel Core i7 - 16GB Memory - Double NVIDIA GeForce GTX1080 - 1TB Hard Drive +
                        2x512GB Solid State Drive - Gray
                    </span>
              </div>
              <div>
                <p class="item-description">
                  Place the sleek form of this ASUS desktop computer tower on your desk, and take your gaming to the
                  next
                  level. With Intel Core i7 processing inside, this speedy desktop keeps up with even multilayered
                  action
                  games. Nvidia graphics on this ASUS desktop computer help eliminate ghosting and stutter so you see
                  every move your enemy makes.
                </p>
              </div>
            </div>
          </a>

        </div>
      </div>

      <div class="card ecommerce-card">
        <div class="card-content">
          <a href="app-ecommerce-details">
            <div class="item-img text-center">
              <img src="https://static.siberiano.com.br/siberiano/5f7628c8d81c320201001190648.jpeg" class="img-fluid" alt="img-placeholder">
            </div>
            <div class="card-body">
              <div class="item-wrapper">
                <div class="item-rating">
                  <div class="badge badge-danger badge-md">
                    3 <i class="feather icon-star ml-25"></i>
                  </div>
                </div>
                <div>
                  <h6 class="item-price">
                    $4499.99
                  </h6>
                </div>
              </div>
              <div class="item-name">
                    <span>
                        Sony - 75" Class (74.5" diag) - LED - 2160p - Smart - 3D - 4K Ultra HD TV with High Dynamic Range -
                        Black
                    </span>
              </div>
              <div>
                <p class="item-description">
                  This Sony 4K HDR TV boasts 4K technology for vibrant hues. Its X940D series features a bold 75-inch
                  screen and slim design. Wires remain hidden, and the unit is easily wall mounted. This television has
                  a
                  4K Processor X1 and 4K X-Reality PRO for crisp video. This Sony 4K HDR TV is easy to control via voice
                  commands.
                </p>
              </div>
            </div>
          </a>

        </div>
      </div>

      <div class="card ecommerce-card">
        <div class="card-content">
          <a href="app-ecommerce-details">
            <div class="item-img text-center">
              <img src="https://static.siberiano.com.br/siberiano/5f762840da7df20201001190432.jpeg" class="img-fluid" alt="img-placeholder">
            </div>
            <div class="card-body">
              <div class="item-wrapper">
                <div class="item-rating">
                  <div class="badge badge-danger badge-md">
                    4 <i class="feather icon-star ml-25"></i>
                  </div>
                </div>
                <div>
                  <h6 class="item-price">
                    $599.99
                  </h6>
                </div>
              </div>
              <div class="item-name">
                    <span>
                        Garmin - fēnix 5 GPS Heart Rate Monitor Watch - Slate gray
                    </span>
              </div>
              <div>
                <p class="item-description">
                  Map your adventure with this Garmin Fenix 5 GPS watch. Built-in navigation lets you know where you are
                  when hiking or camping, and integrated Wi-Fi connects to the Garmin Connect to track your fitness
                  level
                  and daily steps. This Garmin Fenix 5 GPS watch is water-resistant up to 100m for use in wet
                  conditions.
                </p>
              </div>
            </div>
          </a>

        </div>
      </div>

      <div class="card ecommerce-card">
        <div class="card-content">
          <a href="app-ecommerce-details">
            <div class="item-img text-center">
              <img src="https://static.siberiano.com.br/siberiano/5f88323530a3720201015112749.jpeg" class="img-fluid" alt="img-placeholder">
            </div>
            <div class="card-body">
              <div class="item-wrapper">
                <div class="item-rating">
                  <div class="badge badge-danger badge-md">
                    5 <i class="feather icon-star ml-25"></i>
                  </div>
                </div>
                <div>
                  <h6 class="item-price">
                    $649.99
                  </h6>
                </div>
              </div>
              <div class="item-name">
                    <span>
                        Garmin - fenix 3 Sapphire GPS Watch - Silver
                    </span>
              </div>
              <div>
                <p class="item-description">
                  This Garmin fenix 3 Sapphire GPS watch comes with a titanium bezel and band, providing style and
                  strength. This watch is waterproof up to 100m, and it comes with state-of-the-art fitness training
                  features such as advanced running dynamics with vertical oscillation and vertical ratio. Track your
                  activity and stay fit with the Garmin fenix 3 Sapphire GPS watch.
                </p>
              </div>
            </div>
          </a>

        </div>
      </div>


    </section>
    <!-- Wishlist Ends -->

  </div>


@endsection
@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/ui/prism.min.js')) }}"></script>
@endsection
