<!--=============== header ===============--> 
<header>
  <div class="header-inner">
    <div class="logo-holder">
      <a href="index.html" class="ajax"><img src="public/images/logo.png" alt=""></a>
    </div>
    <div class="nav-holder">
      <nav>
        <ul>
          @if (Auth::check())
            <li>
              <a href="{{ url('/home') }}" class="ajax" id="inicio">Inicio <i class="fa fa-home"></i></a>
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
                  <a class="ajax" id="configuracion">Configuración <i class="fa fa-cogs"></i></a>
                  <!--second level end-->
                  <ul>
                    @if($perfil->perfil=="Administrador" || $perfil->perfil=="Auditor")
                      <li><a href="{{ route('disciplinas.index') }}" class="ajax"><i class="fa fa-briefcase"></i> Disciplinas</a></li>
                      <li><a href="{{ route('paises.index') }}" class="ajax"><i class="fa fa-flag"></i> Paises</a></li>
                      <li><a href="{{ route('profesiones.index') }}" class="ajax"><i class="fa fa-graduation-cap"></i> Profesiones</a></li>
                      <li><a href="{{ route('redessociales.index') }}" class="ajax"><i class="fa fa-handshake-o"></i> Redes Sociales</a></li>
                      <li><a href="{{ route('tiposmuseos.index') }}" class="ajax"><i class="fa fa-university"></i> Tipos de Museos</a></li>
                    @endif
                    @if($perfil->perfil=="Administrador" || $perfil->perfil=="Publicista")
                      <li><a href="{{ route('etiquetas.index') }}" class="ajax"><i class="fa fa-tags"></i> Etiquetas</a></li>
                    @endif
                  </ul>
                  <!--second level end-->
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
            <li>
              <a href="{{ route('logout') }}" class="ajax" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar Sesión <i class="fa fa-power-off" aria-hidden="true"></i> </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>
          @else
            <li>
              <a href="index.html" class="ajax">Home </a>
              <!--second level -->   
              <ul>
                <li>
                  <a>Intro</a>
                  <!--third level  -->
                  <ul>
                    <li><a href="index.html" class="ajax">Slider</a></li>
                    <li><a href="index2.html" class="ajax">Slider fade</a></li>
                    <li><a href="index3.html" class="ajax">Slideshow</a></li>
                    <li><a href="index4.html" class="ajax">Image</a></li>
                    <li><a href="index5.html" class="ajax">Youtube video</a></li>
                    <li><a href="index6.html" class="ajax">Vimeo video</a></li>
                  </ul>
                  <!--third level end-->
                </li>
                <li>
                  <a>Full Version</a>
                  <!--third level  -->
                  <ul>
                    <li><a href="index7.html" class="ajax">Slider</a></li>
                    <li><a href="index8.html" class="ajax">Slider fade</a></li>
                    <li><a href="index9.html" class="ajax">Slideshow</a></li>
                    <li><a href="index10.html" class="ajax">Image</a></li>
                    <li><a href="index11.html" class="ajax">Youtube video</a></li>
                    <li><a href="index12.html" class="ajax">Vimeo video</a></li>
                  </ul>
                  <!--third level end-->
                </li>
                <li>
                  <a>Visible Menu</a>
                  <!--third level  -->
                  <ul>
                    <li><a href="index13.html" class="ajax">Slider</a></li>
                    <li><a href="index14.html" class="ajax">Slider fade</a></li>
                    <li><a href="index15.html" class="ajax">Slideshow</a></li>
                    <li><a href="index16.html" class="ajax">Image</a></li>
                    <li><a href="index17.html" class="ajax">Youtube video</a></li>
                    <li><a href="index18.html" class="ajax">Vimeo video</a></li>
                  </ul>
                  <!--third level end-->
                </li>
                <li>
                  <a>One page</a>
                  <!--third level  -->
                  <ul>
                    <li><a href="onepage.html">Slider</a></li>
                    <li><a href="onepage2.html">Slider fade</a></li>
                    <li><a href="onepage3.html">Slideshow</a></li>
                    <li><a href="onepage4.html">Image</a></li>
                    <li><a href="onepage5.html">Youtube video</a></li>
                    <li><a href="onepage6.html">Vimeo video</a></li>
                  </ul>
                  <!--third level end-->
                </li>
              </ul>
              <!--second level end-->
            </li>
            <li>
              <a href="portfolio.html" class="ajax">Portfolio</a>
              <!--second level -->
              <ul>
                <li>
                  <a>Horizontal</a>
                  <!--third level -->
                  <ul>
                    <li><a href="portfolio.html" class="ajax">1 column</a></li>
                    <li><a href="portfolio3.html" class="ajax">1 column 2</a></li>
                    <li><a href="portfolio2.html" class="ajax">2 columns</a></li>
                    <li><a href="portfolio4.html" class="ajax">3 columns</a></li>
                  </ul>
                  <!--third level end-->
                </li>
                <li>
                  <a>Vertical</a>
                  <!--third level -->
                  <ul>
                    <li><a href="portfolio5.html" class="ajax">Full width</a></li>
                    <li><a href="portfolio6.html" class="ajax">Full width 2</a></li>
                    <li><a href="portfolio7.html" class="ajax">Boxed</a></li>
                    <li><a href="portfolio8.html" class="ajax">Boxed</a></li>
                    <li><a href="portfolio9.html" class="ajax">Boxed 3</a></li>
                  </ul>
                  <!--third level end-->
                </li>
                <li>
                  <a>Single</a>
                  <!--third level -->
                  <ul>
                    <li><a href="portfolio-single.html" class="ajax">Style 1 </a></li>
                    <li><a href="portfolio-single2.html" class="ajax">Style 2 </a></li>
                    <li><a href="portfolio-single3.html" class="ajax">Style 3 </a></li>
                    <li><a href="portfolio-single4.html" class="ajax">Style 4 </a></li>
                    <li><a href="portfolio-single5.html" class="ajax">Style 5 </a></li>
                    <li><a href="portfolio-single6.html" class="ajax">Style 6 </a></li>
                    <li><a href="portfolio-single7.html" class="ajax">Style 7 </a></li>
                    <li><a href="portfolio-single8.html" class="ajax">Style 8 </a></li>
                    <li><a href="portfolio-single9.html" class="ajax">Style 9 </a></li>
                    <li><a href="portfolio-single10.html" class="ajax">Style 10 </a></li>
                    <li><a href="portfolio-single11.html" class="ajax">Style 11 </a></li>
                  </ul>
                  <!--third level end-->
                </li>
              </ul>
              <!--second level end-->
            </li>
            <li>
              <a href="about.html" class="ajax">About</a>
              <!--second level end-->
              <ul>
                <li><a href="about2.html" class="ajax">Style 2</a></li>
                <li><a href="about3.html" class="ajax">Style 3</a></li>
              </ul>
              <!--second level end-->
            </li>
            <li>
              <a href="contact.html" class="ajax">Contacts </a>
              <!--second level end-->
              <ul>
                <li><a href="contact2.html" class="ajax">Style 2</a></li>
                <li><a href="contact3.html" class="ajax">Style 3</a></li>
              </ul>
              <!--second level end-->
            </li>
            <li>
              <a href="blog.html" class="ajax act-link">Journal</a>
              <!--second level end-->
              <ul>
                <li><a href="blog2.html" class="ajax">Classic</a></li>
                <li><a href="blog3.html" class="ajax">Masonry Boxed</a></li>
                <li><a href="blog4.html" class="ajax">Masonry</a></li>
                <li><a href="blog-single.html" class="ajax">Post Single</a></li>
              </ul>
              <!--second level end-->
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