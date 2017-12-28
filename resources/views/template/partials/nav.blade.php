<!--=============== header ===============--> 
<header>
  	<div class="header-inner">
    	<div class="logo-holder">
      		<a href="{{ url('/home') }}" class="ajax"><img src="{{ asset('images/logo.png') }}" alt=""></a>
    	</div>
    	<div class="nav-holder">
      		<nav>
        		<ul>
          			@if (Auth::check())
            			<li>
              				<a href="{{ url('/') }}" class="ajax" id="inicio">Inicio <i class="fa fa-home"></i></a>
            			</li>
           				@foreach(Auth::user()->perfiles as $perfil)
              				@if($perfil->perfil=="Administrador" || $perfil->perfil=="Auditor")
                				<li>
                  					<a href="{{ route('artistas.index') }}" class="ajax" id="artistas">Artistas <i class="fa fa-address-book-o"></i></a>
                				</li>
                				@break
              				@endif
            			@endforeach
            			@foreach(Auth::user()->perfiles as $perfil)
              				@if($perfil->perfil=="Administrador" || $perfil->perfil=="Auditor" || $perfil->perfil=="Publicista")
                				<li>
				                  	<a class="ajax cursor" id="configuracion">Configuración <i class="fa fa-cogs"></i></a>
				                  	<!--second level end-->
                  					<ul>
                    					@if($perfil->perfil=="Administrador" || $perfil->perfil=="Auditor")
                      						<li>
                        						<a class="cursor"><i class="fa fa-address-book-o"></i> Artistas</a>
                        						<ul>
                          							<li><a href="{{ route('disciplinas.index') }}" class="ajax"><i class="fa fa-briefcase"></i> Disciplinas</a></li>
                          							<li><a href="{{ route('paises.index') }}" class="ajax"><i class="fa fa-flag"></i> Paises</a></li>
                          							<li><a href="{{ route('profesiones.index') }}" class="ajax"><i class="fa fa-graduation-cap"></i> Profesiones</a></li>
                          							<li><a href="{{ route('redessociales.index') }}" class="ajax"><i class="fa fa-handshake-o"></i> Redes Sociales</a></li>
                        						</ul>
                      						</li>
                    					@endif
                    					@if($perfil->perfil=="Administrador" || $perfil->perfil=="Auditor")
	                      					<li>
	                        					<a class="cursor"><i class="fa fa-university"></i> Museos</a>
	                        					<ul>
	                          						<li><a href="{{ route('cargos.index') }}" class="ajax"><i class="fa fa-id-badge"></i> Cargos</a></li>
                                        <li><a href="{{ route('estados.index') }}" class="ajax"><i class="fa fa-map-marker"></i> Estados</a></li>
	                          						<li><a href="{{ route('tiposmuseos.index') }}" class="ajax"><i class="fa fa-university"></i> Tipos de Museos</a></li>
	                        					</ul>
	                      					</li>
                    					@endif
                              @if($perfil->perfil=="Administrador" || $perfil->perfil=="Publicista")
                                  <li>
                                    <a class="cursor"><i class="fa fa-newspaper-o"></i> Noticias</a>
                                    <ul>
                                        <li><a href="{{ route('etiquetas.index') }}" class="ajax"><i class="fa fa-tags"></i> Etiquetas</a></li>
                                    </ul>
                                  </li>
                              @endif
                              @if($perfil->perfil=="Administrador" || $perfil->perfil=="Atención al Ciudadano")
                                  <li>
                                    <a class="cursor"><i class="fa fa-address-card-o"></i> Solicitudes</a>
                                    <ul>
                                        <li><a href="{{ route('gradosinstrucciones.index') }}" class="ajax"> Grados de Instrucciones</a></li>
                                        <li><a href="{{ route('estadosciviles.index') }}" class="ajax"> Estados Civiles</a></li>
                                        <li><a href="{{ route('tipospremios.index') }}" class="ajax"> Tipos de Premios</a></li>
                                    </ul>
                                  </li>
                              @endif
                  					</ul>
                  					<!--second level end-->
                				</li>
                				@break
              				@endif
            			@endforeach
            			@foreach(Auth::user()->perfiles as $perfil)
              				@if($perfil->perfil=="Administrador" || $perfil->perfil=="Auditor")
                				<li>
                  					<a href="{{ route('museos.index') }}" class="ajax" id="museo">Museos <i class="fa fa-university"></i></a>
                				</li>
                				@break
             	 			@endif
            			@endforeach
            			@foreach(Auth::user()->perfiles as $perfil)
              				@if($perfil->perfil=="Administrador" || $perfil->perfil=="Publicista")
                				<li>
                  					<a href="{{ route('noticias.index') }}" class="ajax" id="noticia">Noticias <i class="fa fa-newspaper-o"></i></a>
				                </li>
				                @break
              				@endif
            			@endforeach
                  @foreach(Auth::user()->perfiles as $perfil)
                      @if($perfil->perfil=="Administrador" || $perfil->perfil=="Auditor")
                        <li>
                            <a class="ajax" id="reportes">Reportes <i class="fa fa-bar-chart"></i></a>
                              <ul>
                                  <li>
                                    <a href="{{ route('reportes.artistas') }}" class="cursor">Artistas</a>
                                  </li>
                                  <li>
                                    <a href="{{ route('reportes.museos') }}" class="cursor">Museos</a>
                                  </li>
                              </ul>
                        </li>
                      @endif
                  @endforeach
                  @foreach(Auth::user()->perfiles as $perfil)
                      @if($perfil->perfil=="Administrador" || $perfil->perfil=="Atención al Ciudadano")
                        <li>
                            <a href="{{ route('solicitudes.index') }}" class="ajax" id="solicitudes">Solicitudes <i class="fa fa-address-card-o"></i></a>
                        </li>
                        @break
                      @endif
                  @endforeach
            			@foreach(Auth::user()->perfiles as $perfil)
              				@if($perfil->perfil=="Administrador")
                				<li>
                  					<a href="{{ route('users.index') }}" class="ajax" id="usuarios">Usuarios <i class="fa fa-users"></i></a>
                				</li>
                				@break
              				@endif
            			@endforeach
            			@foreach(Auth::user()->perfiles as $perfil)
              				@if($perfil->perfil=="Artista")
                				<li>
                  					<a href="{{ route('artistas.edit', Auth::user()->artistas->first()) }}" class="ajax" id="artistas">Mi Perfil <i class="fa fa-address-book-o"></i></a>
				                </li>
				                <li>
                  					<a href="{{ route('artistascatalogos.show', Auth::user()->artistas->first()) }}" class="ajax" id="artistas">Portafolios <i class="fa fa-briefcase"></i></a>
				                </li>
				                @break
              				@endif
            			@endforeach
                  @foreach(Auth::user()->perfiles as $perfil)
                      @if($perfil->perfil=="Solicitante")
                        <li>
                            <a href="{{ route('solicitudes.create') }}" class="ajax" id="solicitudes">Solicitud <i class="fa fa-address-card-o"></i></a>
                        </li>
                        @break
                      @endif
                  @endforeach
            			<li>
                      <a class="ajax cursor" id="cuentas">Cuenta <i class="fa fa-id-badge"></i></a>
                      <ul>
                          <li>
                            <a href="{{ route('cuentas') }}" class="ajax" id="artistas">Mi Cuenta </a>
                            <a href="{{ route('logout') }}" class="ajax" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar Sesión <i class="fa fa-power-off" aria-hidden="true"></i> </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                            </form>
                          </li>
                      </ul>
            			</li>
          			@else
	            		<li>
	              			<a href="{{ url('/') }}" class="ajax" id="inicio">Inicio </a>
            			</li>
                  <li>
                      <a href="{{ route('artistas') }}" class="ajax" id="artistas">Artistas </a>
                  </li>
                  <li>
                      <a href="{{ route('galerias') }}" class="ajax" id="galerias">Galerías </a>
                  </li>
                  <li>
                      <a href="{{ route('museos') }}" class="ajax" id="museos">Museos </a>
                  </li>
                  <li>
                      <a href="{{ route('noticias') }}" class="ajax" id="noticias">Noticias </a>
                  </li>
          				<li>
          					  <a href="{{ url('login') }}" class="ajax">Iniciar Sesión </a>
          				</li>
      				@endif
    			</ul>
  			</nav>
		</div>
		<!-- navigation  end -->
		<!-- mobile button -->
		<div class="nav-button-holder">
  			<div class="nav-button vis-m"><span></span><span></span><span></span></div>
		</div>
		<!-- mobile button end-->
		</div>
</header>