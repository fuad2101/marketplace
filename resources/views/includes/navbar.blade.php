<nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
    >
      <div class="container">
        <a href=" {{ route('home') }} " class="navbar-brand">
          <img src="/images/logo.svg" alt="" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbar-responsive"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href=" {{ route('home') }} " class="nav-link active">Home</a>
            </li>
            <li class="nav-item">
              <a href=" {{ route('category') }} " class="nav-link">Categories</a>
            </li>
            <li class="nav-item">
              <a href="" class="nav-link">Rewards</a>
            </li>
            @guest
                <li class="nav-item">
                <a href=" {{ route('register') }} " class="nav-link">Sign Up</a>
                </li>
                <li class="nav-item">
                <a href="{{ route('login') }}" class="btn btn-success text-white px-4 nav-link"
                    >Sign In</a
                >
                </li>
            @endguest
            @auth
            {{-- <li class="nav-item dropdown">
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
                      Hi, {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </div>
            </li> --}}
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
                      Hi,{{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu">
                      <a href=" {{ route('dashboard') }} " class="dropdown-item">Dashboard</a>
                      <a href=" {{ route('settings') }} " class="dropdown-item">Settings</a>
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
            @endauth
          </ul>
        </div>
      </div>
    </nav>
