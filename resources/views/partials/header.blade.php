<div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            NGHIANB
        </a>
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            @auth
                <li>
                    <a href="{{ route('shorten-urls.index') }}" class="nav-link px-2 text-secondary">Shorten url</a>
                </li>
            @endauth
        </ul>
        <div class="text-end">
            @auth
                <span>Hi, {{ auth()->user()->name }}</span> -
                <a href="javascript:document.getElementById('logout_form').submit()">logout</a>
                <form id="logout_form" action="{{ route('logout') }}" method="post" class="d-none">
                    @csrf
                </form>
            @endauth
            @guest
                <a href="{{ route('login.show') }}" class="btn btn-outline-light me-2">Login</a>
                <a href="{{ route('register.show') }}" class="btn btn-warning">Register</a>
            @endguest
        </div>
    </div>
</div>