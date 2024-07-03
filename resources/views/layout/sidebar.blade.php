<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{ url('/') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/category') }}">
          <i class="bi bi-person"></i>
          <span>CATEGORY</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/product') }}">
          <i class="bi bi-file-earmark"></i>
          <span>PRODUCT</span>
        </a>
      </li><!-- End Blank Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/cart') }}">
          <i class="bi bi-newspaper"></i>
          <span>CART</span>
        </a>
      </li><!-- End Blank Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/transaction') }}">
          <i class="bi bi-layout-text-window-reverse"></i>
          <span>TRANSACTION</span>
        </a>
      </li>
      @auth
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/logout') }}">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li>
      @endauth
      @guest
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/login') }}">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/register') }}">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li>
      @endguest
    </ul>

  </aside>

