 
  <nav class="navbar navbar-default">
  <div class="container-fluid ">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs colorNavConfiguracion" aria-hidden="true"></i>&nbsp;Configuración&nbsp;<i class="fa fa-angle-down" aria-hidden="true"></i></b></a>
          <ul class="dropdown-menu multi-level">

              <li>
                <a href="{{ route('listasDesplegables.index') }}">
                  <i class="fa fa-angle-double-down" aria-hidden="true"></i>&nbsp;&nbsp;Listas desplegables
                </a>
              </li>
              
              <!-- <li><a href="#">Action</a></li>   -->            
              <!-- <li class="divider"></li> -->
              <!-- <li class="divider"></li> -->

              <!-- <li class="dropdown-submenu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-angle-double-down" aria-hidden="true"></i>&nbsp;Listas desplegables&nbsp;&nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i>
                  </a>
                 <ul class="dropdown-menu">
                      <li><a href="{{ route('arl.index') }}">ARL</a></li>
                      <li><a href="{{ route('cargos.index') }}">Cargos</a></li>
                      <li><a href="{{ route('centroTrabajo.index') }}">Centros de trabajo</a></li>
                      <li><a href="{{ route('eps.index') }}">EPS</a></li>
                      <li><a href="{{ route('fondosCesantias.index') }}">Fondos de cesantias</a></li>
                      <li><a href="{{ route('fondosPensiones.index') }}">Fondos de pensiones</a></li>
                      <li><a href="{{ route('nivelRiesgos.index') }}">Riesgos</a></li>
                      <li><a href="{{ route('tiposDocumento.index') }}">Tipos de documento</a></li>
                      
                      <<li class="divider"></li> 
                      <li class="dropdown-submenu">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                          <ul class="dropdown-menu">
                             <li><a>Action</a></li>
                          </ul>
                      </li> 
                  </ul> 
              </li>-->
          </ul>
        </li>

<!--         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listas desplegables<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('tiposDocumento.index') }}">Tipos de documento</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('cargos.index') }}">Cargos</a></li>
            <li><a href="{{ route('centroTrabajo.index') }}">Centros de trabajo</a></li>
            <li><a href="{{ route('nivelRiesgos.index') }}">Riesgos</a></li>
            
            <li role="separator" class="divider"></li>                
          </ul>
        </li> -->

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-users colorNavAdministracion" aria-hidden="true"></i>&nbsp;Administración&nbsp;<i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
          <ul class="dropdown-menu">
            <!--li role="separator" class="divider"></li-->
              <li><a href="{{ route('empleados.index') }}"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Empleados</a></li>
              <li><a href="{{ route('contratos.index') }}"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;&nbsp;Contratos</a></li>
              <li><a href="{{ route('formaciones.index') }}"><i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;&nbsp;Formación</a></li>
              <li><a href="{{ route('examenes.index') }}"><i class="fa fa-heartbeat" aria-hidden="true"></i>&nbsp;&nbsp;Exámenes</a></li>
              <li><a href="{{ route('vacaciones.index') }}"><i class="fa fa-arrows-h" aria-hidden="true"></i>&nbsp;&nbsp;Ausentismo</a></li>
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