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
                      <a href="" class="dropdown-item">Dashboard</a>
                      <a href="" class="dropdown-item">Settings</a>
                      <div class="dropdown-divider"></div>
                      <a href=" {{ route('logout') }} " class="dropdown-item">Logout</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a href="" class="nav-link d-inline-block mt-2">
                      <img src="/images/cart/Vector-cart-filled.svg" alt="" />
                      <div class="card-badge">7</div>
                    </a>
                  </li>
                </ul>
