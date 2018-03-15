<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('home') }}">My Cupboard</a>
    </div>
    <ul class="nav navbar-nav" style="width: auto;">
      @guest
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
      @else
        <li class=""><a href="{{ route('dressing') }}">Mon Dressing</a></li>
        <li class=""><a href="{{ route('actu') }}">Actualités</a></li>
        <li class=""><a href="{{ route('friend') }}">Amis</a></li>
        <li class=""><a href="{{ route('message') }}">Messages</a></li>
      @endguest
    </ul>
    <ul class="nav navbar-nav" style="float: right;">
      @guest
      @else
        <li> 
          <a href="" style="padding-bottom: 0px; ">
            <img src="{{url('/')}}/profilpic/{{Auth::user()->photo}}" width="30px" height="30px" class="img-rounded">  
          </a>
          
        </li>

        <li class="dropdown" class="">
          <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::getUser()->first_name}} {{ Auth::getUser()->last_name}}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ url('/profile') }}/{{ Auth::user()->slug }}">Profile</a>
          <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
            </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
          </div>
        </li>
      @endguest
    </ul>

  </div>
</nav>