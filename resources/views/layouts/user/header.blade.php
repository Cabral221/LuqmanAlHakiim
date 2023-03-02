<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top fadeInDown" data-wow-delay="0.5s">
    <div class="top-bar smoothie hidden-xs">
        <div class="container">
            <div class="clearfix">
                <ul class="list-inline social-links wow pull-left">
                    <li style="font-weight:500">
                        <a href="tel:{{ $info->phone ?? '+221773551514' }}"><i class="fa fa-mobile"></i> {{ $info->phone ?? '+221773551514' }}</a>
                    </li>
                </ul>

                <div class="pull-right text-right">
                    <ul class="list-inline">
                        <li  style="font-weight:500">
                            <div><i class="fa fa-envelope-o"></i>{{ $info->address ?? 'Dakar, Rufisque Ouest, Cité Gabon'}} - BP {{ $info->bp ??  ' 21784'}}</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand smoothie logo logo-light" href="{{ route('user.welcome') }}"><img src="{{ asset('images/logo.png') }}" alt="logo"></a>
            <a class="navbar-brand smoothie logo logo-dark" href="{{ route('user.welcome') }}"><img src="{{ asset('images/logo.png') }}" alt="logo"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main-navigation">
            <ul class="nav navbar-nav navbar-right">
                <li class="{{ isset($current_page) && $current_page == 'home' ? 'active' : '' }}">
                    <a href="{{ route('user.welcome') }}" >Accueil</a>
                </li>

                <li class="{{ isset($current_page) && $current_page == 'Présentation' ? 'active' : '' }}">
                    <a href="{{ route('user.about') }}" >Présentation</a>
                </li>

                <li class="dropdown {{ isset($current_page) && $current_page == 'programs' ? 'active' : '' }}">
                    <a href="{{ route('user.programs.index') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Programmes <span class="caret"></span></a>
                    <ul class="dropdown-menu" aria-labelledby="programmes">
                        <li><a href="#">Our Story</a></li>
                        <li><a href="#">Our Team</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </li>

                <li class="{{ isset($current_page) && $current_page == 'library' ? 'active' : '' }}">
                    <a href="{{ route('user.library') }}">Bibliothéque</a>
                </li>
                <li>
                    <a href="{{ route('user.contact') }}" class="{{ isset($current_page) && $current_page == 'contact' ? 'active-page' : '' }}">Contact</a>
                </li>
                @guest
                    <li class="dropdown {{ isset($current_page) && $current_page == 'member' ? 'active' : '' }}">
                        <a href="{{ route('user.member') }}">Se connecter</span></a>
                    </li>
                @else
                <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->firstname }}<span class="caret"></span> </a>
                    <ul class="dropdown-menu" role="menu"  aria-labelledby="compte">
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
