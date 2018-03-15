@inject('request', 'Illuminate\Http\Request')
<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Resto</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Resto</a>
        
        </div>


        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <li class=""><a href="">Menu</a></li>
            <li class=""><a href="">Actualités</a></li>
            <li class=""><a href="">Gallerie</a></li>
            <li class=""><a href="">Contacts</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown" style="margin-right: auto; ">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::getUser()->name}}<span class="caret"></span></a>
              <ul class="dropdown-menu" style=" float: left; ">
                  <li><a href="#">Mon compte</a></li>
                  <li><a href="#">Mes commandes</a></li>
                  <li role="separator" class="divider"></li>
                  @if (Auth::getUser()->role_id == 2)
                  @else
                  <li class=""><a href="{{url('/admin/home')}}">Page d'administration</a></li>
                  @endif
                  <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                      <a href="{{ route('auth.change_password') }}">Changer mot de passe</a>
                  </li>
                  <li><a href="#logout" onclick="$('#logout').submit();">
                      <i class="fa fa-arrow-left"></i>
                      <span class="title">@lang('quickadmin.qa_logout')</span>
                  </a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>