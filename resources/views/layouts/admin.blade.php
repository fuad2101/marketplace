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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>

    @stack('addon-style')
  </head>

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-header text-center">
            <img src="/images/admin.svg" alt="" class="my-4" style="max-width: 150px" />
          </div>
          <div class="list-group list-group-flush">
            <a
              href="{{ route('admin-dashboard') }} "
              class="list-group-item list-group-item-action"
              >Dashboard</a
            >
            <a
              href=" {{route('product.index')}} "
              class="list-group-item list-group-item-action {{ (request()->is('admin/product')) ? 'active' : '' }}"
              >Products</a
            >
            <a
              href=" {{route('product-gallery.index')}} "
              class="list-group-item list-group-item-action {{ (request()->is('admin/product-gallery*')) ? 'active' : '' }}"
              >Gallery</a
            >
            <a
              href=" {{ route('category.index') }} "
              class="list-group-item list-group-item-action {{ (request()->is('admin/category*')) ? 'active' : '' }} "
              >Categories</a
            >
            <a
              href="dashboard-transactions.html"
              class="list-group-item list-group-item-action"
              >Transaction</a
            >
            <a
              href="{{ route('user.index') }}"
              class="list-group-item list-group-item-action {{ (request()->is('admin/user*')) ? 'active' : '' }} "
              >Users</a
            >
            <a
              href="dashboard-account.html"
              class="list-group-item list-group-item-action"
              >My Account</a
            >
            <a href="index.html" class="list-group-item list-group-item-action"
              >Sign Out</a
            >
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
                      <a href="" class="dropdown-item">Logout</a>
                    </div>
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
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
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
