 <div class="container d-flex align-items-center">

      <!-- <h1 class="logo me-auto"><a href="index.html">PKHS ALUMNAE</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
       <a href="index.html" class="logo me-auto"><img src="{{asset('/')}}assets/front/img/logo/logo50y.jpg" alt="" ></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.html" class="active">Home</a></li>
          <li><a href="pricing.html">Member</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li><a href="contact.html">Contact</a></li>
          @auth
              <li><a href="" class="getstarted">Get Tiket</a></li>
          @else
              <li><a href="{{ route('alumnae_login.home') }}" class="getstarted">Login</a></li>

              @if (Route::has('register'))
                <li><a href="{{ route('alumnae_signup.home') }}" class="getstarted">Registration</a></li>
              @endif
          @endauth
          @auth
          <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="about.html">About</a></li>
              <li><a href="team.html">Profile</a></li>
              <li>
                <form class="dropdown-item" id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    <button class="btn" style="hover:none">Logout</button>
                </form>
              </li>
            </ul>
          </li>
          @endauth
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>