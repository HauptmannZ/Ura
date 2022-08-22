<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container col-xl-11">
        <section class="hero-section rel z-1 bg-dark-blue pt-25 rpt-5" id="home">
            <div class="container">
                <div class="row">
                    <div class="col-lg">
                        <h5 class="wow fadeInUp delay-0-4s text-white">Komunitas World of Warships Indonesia</h5>
                    </div>
                </div>
            </div>
            <div class="hero-right-circles wow customSlideInRight"></div>
            <div class="hero-dot-one"></div>
            <div class="hero-dot-two"></div>
            <div class="hero-dot-three"></div>
        </section>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default"
            aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-default">
            <div class="navbar-collapse-header">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="javascript:void(0)">
                            <img src="/assetsdashboard/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>

            <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item">
                    <a class="nav-link nav-link-icon {{ Request::is('/') ? 'active' : '' }}" href="/">
                        <i>Beranda</i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon {{ Request::is('posts*') ? 'active' : '' }}" href="/posts">
                        <i>Post</i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon {{ Request::is('about') ? 'active' : '' }}" href="/tentang">
                        <i>Tentang</i>
                    </a>
                </li>
                @auth
                    <li class="nav-item">
                        <div class="btn-group">
                            <a class="nav-link nav-link-icon mt-1" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">Selamat datang
                                {{ auth()->user()->name }}</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse"></i>
                                    Dasboard Ku</a>
                                <div class="dropdown-divider"></div>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item"><i
                                            class="bi bi-box-arrow-right"></i>Logout</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a class="nav-link nav-link-icon" href="/login">
                            <i class="bi bi-box-arrow-in-right"> Login</i>
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
    </div>
</nav>
</section>
