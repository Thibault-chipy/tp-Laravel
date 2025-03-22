<div id="app">
    <header class="border-bottom py-4">
        <nav class="container">
            <div class="row align-items-center">
                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="d-flex gap-3">
                        <a href="{{ route('sauces.index') }}" class="text-uppercase text-decoration-none">All Sauces</a>
                        @auth
                        <a href="{{ route('sauces.create') }}" class="text-uppercase text-danger text-decoration-none">Add Sauce</a>
                        @endauth
                    </div>
                </div>

                <div class="col-md-6 text-center mb-3 mb-md-0">
                    <h1 class="fs-2 fs-md-3 fw-bold">HOT TAKES</h1>
                    <p class="fs-6 text-muted d-none d-sm-block">THE WEB'S BEST HOT SAUCE REVIEWS</p>
                </div>

                <div class="col-md-3 text-md-end">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @auth
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-uppercase text-decoration-none">
                            Logout
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-uppercase text-decoration-none">Login</a>
                        <a href="{{ route('register') }}" class="ms-2 ms-sm-4 text-uppercase text-decoration-none">Sign up</a>
                    @endauth
                </div>
            </div>
        </nav>
    </header>
</div>