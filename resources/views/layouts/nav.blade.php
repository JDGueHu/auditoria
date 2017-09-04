
<div class="collapse navbar-collapse separarBottom" id="bs-example-navbar-collapse-1">

  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Brand</a>
  </div>

  <ul class="nav navbar-nav">
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuración<span class="caret"></span></a>
      <ul class="dropdown-menu">
        <!--li role="separator" class="divider"></li-->
        <li><a href="{{ route('nivelRiesgos.index') }}">Riesgos</a></li>
         
      </ul>
    </li>

    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administración<span class="caret"></span></a>
      <ul class="dropdown-menu">
        <!--li role="separator" class="divider"></li-->
        <li><a href="#">Clientes</a></li>

        <!--li role="separator" class="divider"></li-->                
      </ul>
    </li>
  </ul> 

  <ul class="nav navbar-nav navbar-right">
      <!-- Authentication Links -->
      @if (Auth::guest())
          <li><a href="{{ route('login') }}">Acceder</a></li>
          <li><a href="{{ route('register') }}">Registrarse</a></li>
      @else
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                  <li>
                      <a href="{{ url('/logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Logout
                      </a>

                      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
              </ul>
          </li>
      @endif
  </ul>  
     
  </div><!-- /.navbar-collapse -->