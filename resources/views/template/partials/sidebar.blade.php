<!-- sidebar -->
<div class="col-md-4">
    <!-- main-sidebar -->   
    <div class="main-sidebar">
        <div class="main-sidebar-widgets">
            <!-- main-sidebar-widget-->   
            <!--<div class="main-sidebar-widget">
                <div class="searh-holder">
                    <form action="#" class="searh-inner">
                        <input name="se" id="se" type="text" class="search" placeholder="Buscar..." />
                        <button class="search-submit" id="submit_btn"><i class="fa fa-search transition"></i> </button>
                    </form>
                </div>
            </div>-->
            <!-- main-sidebar-widget end-->
            @if(!Auth::check())
                <!-- main-sidebar-widget-->   
                <div class="main-sidebar-widget">
                    <a href="{{ route('register') }}" class="btn btn-vinotinto" style="width: 100%; font-size: 14px;">Regístrate</a>
                </div>
                <!-- main-sidebar-widget end-->
            @endif
            <!-- main-sidebar-widget-->   
            <div class="main-sidebar-widget">
                <h3>Top 5 Artistas</h3>
                <div class="recent-post-widget fl-wrap">
                    <ul id="topArtistas"></ul>
                </div>
            </div>
            <!-- main-sidebar-widget end-->
            <!-- main-sidebar-widget-->   
            <div class="main-sidebar-widget">
                <h3>Top 5 Catalogos de Artistas</h3>
                <div class="recent-post-widget fl-wrap">
                    <ul id="topCatalogosArtistas"></ul>
                </div>
            </div>
            <!-- main-sidebar-widget end-->
            <!-- main-sidebar-widget-->   
            <div class="main-sidebar-widget">
                <h3>Artistas por Profesión </h3>
                <div class="tags-widget">
                    <div class="tagcloud" id="profesionArtistas"></div>
                </div>
            </div>
            <!-- main-sidebar-widget end-->
            <!-- main-sidebar-widget-->   
            <div class="main-sidebar-widget">
                <h3>Top 5 Museos</h3>
                <div class="recent-post-widget fl-wrap">
                    <ul id="topMuseos"></ul>
                </div>
            </div>
            <!-- main-sidebar-widget end-->                           
            <!-- main-sidebar-widget-->   
            <div class="main-sidebar-widget">
                <h3>Tipos de Museos</h3>
                <div class="category-widget">
                    <ul class="cat-item" id="tiposMuseos"></ul>
                </div>
            </div>
            <!-- main-sidebar-widget end-->     
            <!-- main-sidebar-widget-->   
            <div class="main-sidebar-widget">
                <h3>Noticias Destacadas</h3>
                <div class="recent-post-widget fl-wrap">
                    <ul id="noticiasDestacadas"></ul>
                </div>
            </div>
            <!-- main-sidebar-widget end-->                 
        </div>
    </div>
    <!-- main-sidebar end-->   
</div>
<!-- sidebar end -->