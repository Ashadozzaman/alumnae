 <div class="container d-flex align-items-center">

      <!-- <h1 class="logo me-auto"><a href="index.html">PKHS ALUMNAE</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
       <a href="index.html" class="logo me-auto"><img src="{{asset('/')}}assets/front/img/logo/logo50y.jpg" alt="" ></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{ route('home') }}" class="active">Home</a></li>
          <li><a href="{{ route('alumnae') }}">Alumnae</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li><a href="{{ route('contact') }}">Contact</a></li>
          @auth
              <li><a href="" class="getstarted">Get Tiket</a></li>
          @else
              <li><a href="{{ route('alumnae_login.home') }}" class="getstarted">Login</a></li>

              @if (Route::has('register'))
                <li><a href="{{ route('alumnae_signup.home') }}" class="getstarted">Registration</a></li>
              @endif
          @endauth
          @auth
          <li class="dropdown" style="margin-left:5px;">
            <a class="logo" href="#">
              @if(auth()->user()->image != NULL)
                  <img src="{{asset('/')}}images/user/{{auth()->user()->image}}" alt="" style="border-radius: 50%;" ></a>
              @else
                  <img src="{{asset('/')}}images/avatar-1.jpg" alt="" style="border-radius: 50%;" ></a>
              @endif
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