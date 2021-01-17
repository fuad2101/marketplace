<nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
    >
      <div class="container">
        <a href=" {{ route('home') }} " class="navbar-brand">
          <img src="images/logo.svg" alt="" />
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
              <a href="{{ route('category') }}" class="nav-link">Categories</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Rewards</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
