<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img src="{{ asset('storage/images/logo-padi.png') }}" width="50px" height="50px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            @if (isset($title))
                                <a class="nav-link active" href="/home"><i class="bi bi-house"></i> Home</a>
                            @else
                                <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="/home"><i
                                        class="bi bi-house"></i> Home</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('kelola-gejala') ? 'active' : '' }}" href="/kelola-gejala"><i
                                    class="bi bi-file-earmark-richtext"></i> Gejala</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('kelola-hama') ? 'active' : '' }}" href="/kelola-hama"><i
                                    class="bi bi-bug"></i> Hama</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('konsultasi') ? 'active' : '' }}" href="/konsultasi"><i
                                    class="bi bi-zoom-in"></i> Konsultasi</a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="nav-link">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            @if (isset($title))
                                <a class="nav-link active" href="/home"><i class="bi bi-house"></i> Home</a>
                            @else
                                <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="/home"><i
                                        class="bi bi-house"></i> Home</a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('gejala') ? 'active' : '' }}" href="/gejala"><i
                                    class="bi bi-file-earmark-richtext"></i> Gejala</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('hama') ? 'active' : '' }}" href="/hama"><i
                                    class="bi bi-bug"></i> Hama</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('konsultasi') ? 'active' : '' }}" href="/konsultasi"><i
                                    class="bi bi-zoom-in"></i> Konsultasi</a>
                        </li>
                    @endauth
                </ul>
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <strong>
                                <i class="bi bi-person-circle"></i> {{ auth()->user()->name }}
                            </strong>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="/login">
                                <i class="bi bi-box-arrow-in-right"></i> Login Admin</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
