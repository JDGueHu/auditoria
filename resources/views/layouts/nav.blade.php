
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <ul class="dropdown-menu">
      <li><a tabindex="-1" href="#">HTML</a></li>
      <li><a tabindex="-1" href="#">CSS</a></li>
      <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">New dropdown <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
          <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
          <li class="dropdown-submenu">
            <a class="test" href="#">Another dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">3rd level dropdown</a></li>
              <li><a href="#">3rd level dropdown</a></li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
    

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listas desplegables<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <!--li role="separator" class="divider"></li-->
            <li><a href="{{ route('tiposDocumento.index') }}">Tipos de documento</a></li>
            <!-- <li role="separator" class="divider"></li> -->
            <li><a href="{{ route('cargos.index') }}">Cargos</a></li>
            <li><a href="{{ route('centroTrabajo.index') }}">Centros de trabajo</a></li>
            <li><a href="{{ route('nivelRiesgos.index') }}">Riesgos</a></li>
            
            <!--li role="separator" class="divider"></li-->                
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administración<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <!--li role="separator" class="divider"></li-->
              <li><a href="{{ route('empleados.index') }}">Empleados</a></li>
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

  </div><!-- /.container-fluid -->
</nav>