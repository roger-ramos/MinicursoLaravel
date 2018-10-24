<!-- START NAV -->
<nav class="navbar">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                    <img src="{{asset('images/laravel-blog-logo.png')}}" alt="Logo">
                </a>
            <span class="navbar-burger burger" data-target="navbarMenu">
                    <span></span>
            <span></span>
            <span></span>
            </span>
        </div>
        <div id="navbarMenu" class="navbar-menu">
            <div class="navbar-end">
                <a href="/" class="navbar-item is-active">
                    Home
                </a>
                @if (Auth::check())
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        {{ Auth::User()->name }}
                    </a>
                    <div class="navbar-dropdown">
                        <a href="criar-artigo" class="navbar-item">
                            Criar artigo
                        </a>
                        <hr class="navbar-divider">
                        <div class="navbar-item">
                            <a href="/logout">Logout</a>
                        </div>
                    </div>
                </div>
                @else
                <a href="/login" class="navbar-item is-active">
                    Acesse sua conta
                </a>
                @endif
            </div>
        </div>
    </div>
</nav>
<!-- END NAV -->
