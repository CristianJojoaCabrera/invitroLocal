<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->name }}</strong>
                             </span> <span class="text-muted text-xs block">{{ Auth::user()->email }} <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IV
                </div>
            </li>
            <li>
                <a href="{{ route('home') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Inicio</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-gears"></i> <span class="nav-label">Maestros</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('master_client') }}">Clientes</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-cubes"></i> <span class="nav-label">Inventario</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="{{ route('inventory_materials') }}">Materiales</a></li>
                        <li><a href="{{ route('inventory_semen') }}">Semen</a></li>
                        <li><a href="{{ route('inventory_vitrified') }}">Vitrificados</a></li>
                        <li><a href="{{ route('inventory_frozen') }}">Congelados</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Orden de Producción</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('production_order') }}">Nueva</a></li>
                    <li><a href="{{ route('production_orders') }}">Consultar</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('evaluation_po') }}"><i class="fa fa-search"></i> <span class="nav-label">Evaluación Receptoras</span></a>
            </li>
            <li>
                <a href="{{ route('aspiration_po') }}"><i class="fa fa-eyedropper"></i> <span class="nav-label">Aspiración Folicular</span></a>
            </li>
            <li>
                <a href="{{ route('production') }}"><i class="fa fa-flask"></i> <span class="nav-label">Producción Embrión</span></a>
            </li>
            <li>
                <a href="{{ route('transfer') }}"><i class="fa fa-magic"></i> <span class="nav-label">Transferencia Embrión</span></a>
            </li>
            <li>
                <a href="{{ route('diagnostic') }}"><i class="fa fa-stethoscope"></i> <span class="nav-label">Diagnóstico</span></a>
            </li>
            <li>
                <a href="{{ route('sexage') }}"><i class="fa fa-random"></i> <span class="nav-label">Sexaje</span></a>
            </li>
            <li>
                <a href="{{ route('delivery') }}"><i class="fa fa-truck"></i> <span class="nav-label">Entrega</span></a>
            </li>
            <li>
                <a href="{{ route('vitrification') }}"><i class="fa fa-codepen"></i> <span class="nav-label">Vitrificación</span></a>
            </li>
            <li>
                <a href="{{ route('congelation') }}"><i class="fa fa-snowflake-o"></i> <span class="nav-label">Congelación</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Facturación</span></a>
            </li>
        </ul>
    </div>
</nav>