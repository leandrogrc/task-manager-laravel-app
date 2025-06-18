<nav class="navbar navbar-expand navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="bi bi-check-circle-fill me-2"></i>TaskFlow
        </a>

        <div id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                @guest
                <!-- Usuário não autenticado -->
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('auth.login') ? 'active' : '' }}" href="{{ route('auth.login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('auth.register') ? 'active' : '' }}" href="{{ route('auth.register') }}">Registrar</a>
                </li>
                @else
                <!-- Usuário autenticado -->
                <li class="nav-item dropdown d-flex flex-row align-items-center gap-2">
                    <i class="bi bi-person-circle"></i>
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        aria-haspopup="true">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('auth.logout') }}">
                                @csrf
                                <button
                                    type="submit"
                                    class="dropdown-item"
                                    role="menuitem"
                                    aria-label="Logout">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>

<style>
    :root {
        --primary-color: #6c63ff;
        --secondary-color: #4d44db;
        --accent-color: #ff6584;
    }

    .navbar-brand {
        font-weight: 700;
        color: var(--primary-color) !important;
    }
</style>