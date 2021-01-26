<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css" />
    @stack('prepend-style')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="/style/main.css" rel="stylesheet" />
    @stack('addon-style')
  </head>

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-header text-center">
            <img src="/images/logo-dashboard.svg" alt="" class="my-4" />
          </div>
          <div class="list-group list-group-flush">
            <a
              href=" {{ route('dashboard') }} "
              class="list-group-item list-group-item-action
              @if(Request::is('dashboard'))
              {{'active'}}
              @endif "
              >Dashboard</a
            >
            <a
              href=" {{ route('dashboard-products') }} "
              class="list-group-item list-group-item-action

              @if(Request::is('dashboard/product*'))
              {{'active'}}
              @endif "

              >My Products</a
            >
            <a
              href=" {{route('dashboard-transaction')}} "
              class="list-group-item list-group-item-action

              @if(Request::is('dashboard/transaction*'))
              {{'active'}}
              @endif

              "
              >Transaction</a
            >
            <a
              href=" {{ route('settings') }} "
              class="list-group-item list-group-item-action

              @if(Request::is('settings'))
              {{'active'}}
              @endif

              "
              >Store Settings</a
            >
            <a
              href=" {{ route('account')}} "
              class="list-group-item list-group-item-action

              @if(Request::is('account'))
              {{'active'}}
              @endif

              "
              >My Account</a
            >

            <a class="list-group-item list-group-item-action" href="" onclick="event.preventDefault(); document.getElementById('sign-out').submit();">
                Sign Out
            </a>
            <form id="sign-out" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

          </div>
        </div>
        <!-- Page Content -->
        <div class="" id="page-content-wrapper">
          <nav
            class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
            data-aos="fade-down">
            <div class="container-fluid">
              <button
                id="menu-sidebar"
                class="btn btn-secondary d-md-none mr-auto ml-2"
              >
                Menu
              </button>
              <button
                type="button"
                class="navbar-toggler ml-auto"
                data-target="#navbarSupportedContent"
                data-toggle="collapse"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto" id=""></ul>
                <!-- Desktop Menu -->
                <ul class="navbar-nav d-none d-lg-flex">
                  <li class="nav-item dropdown">
                    <a
                      href=""
                      class="nav-link"
                      id="navbardropdown"
                      role="button"
                      data-toggle="dropdown"
                    >
                      <img
                        class="rounded-circle mr-2 profile-picture"
                        src="/images/user_pc.png"
                        alt=""
                      />
                      Hi,Angga
                    </a>
                    <div class="dropdown-menu">
                      <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                      <a href="{{ route('settings') }}" class="dropdown-item">Settings</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                  </li>
                  <li class="nav-item">
                    @php
                    $carts = App\Cart::where('users_id',Auth::user()->id)->count();
                    @endphp
                    @if ($carts > 0)
                    <a href=" {{ route('cart') }} " class="nav-link d-inline-block mt-2">
                        <img src="/images/cart/Vector-cart-filled.svg" alt="" />
                        <div class="card-badge">{{$carts}} </div>
                    </a>
                    @else
                    <img src="/images/cart/Vector-cart-empty.svg " alt="" />
                    @endif
                    </a>
                  </li>
                </ul>
                <!-- Mobile Menu -->
                <ul class="navbar-nav d-lg-none d-block">
                  <a href="" class="nav-link"> Hi, Angga </a>
                  <a href="" class="nav-link d-inline-block"> Cart </a>
                </ul>
              </div>
            </div>
          </nav>

          @yield('content')

        </div>
      </div>
    </div>

    <footer>
      <div class="row text-center">
        <div class="col-12">
          <p class="pt-4 pb-2">
            2020 &copy Copyright Store. All Rights Reserved
          </p>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    @stack('prepend-script')
    <script src="/vendor/jquery/jquery.slim.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
      $("#menu-sidebar").click(function (e) {
        e.preventDefault;
        $("#wrapper").toggleClass("toggled");
      });
    </script>
    @stack('addon-script')
  </body>
</html>
