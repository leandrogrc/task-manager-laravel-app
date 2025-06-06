<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <!-- Logo e Brand -->
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <i class="bi bi-check-circle-fill fs-4 me-2" style="color: var(--primary-color);"></i>
            <span class="fw-bold" style="color: var(--primary-color);">TaskFlow</span>
        </a>

        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">

            @guest
            <!-- Links para visitantes -->
            <li class="nav-item mx-1">
                <a class="nav-link px-3 py-2 rounded {{ request()->routeIs('home') ? 'active' : '' }}"
                    href="{{ route('home') }}"
                    style="transition: all 0.3s ease;">
                    <i class="bi bi-house-door me-1"></i> Home
                </a>
            </li>
            <li class="nav-item mx-1">
                <a class="nav-link px-3 py-2 rounded {{ request()->routeIs('auth.login') ? 'active' : '' }}"
                    href="{{ route('auth.login') }}"
                    style="transition: all 0.3s ease;">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Login
                </a>
            </li>
            <li class="nav-item mx-1">
                <a class="btn btn-primary px-3 py-2 rounded-pill {{ request()->routeIs('auth.register') ? 'active' : '' }}"
                    href="{{ route('auth.register') }}"
                    style="transition: all 0.3s ease;">
                    <i class="bi bi-person-plus me-1"></i> Registrar
                </a>
            </li>
            @else
            <!-- Links para usuários logados -->

            <!-- Dropdown do Usuário -->
            <li class="nav-item dropdown ms-2 position-static"> <!-- Adicione position-static aqui -->
                <a class="nav-link dropdown-toggle d-flex align-items-center"
                    href="#"
                    id="userDropdown"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    style="transition: all 0.3s ease;">
                    <div class="me-2 d-none d-lg-block">
                        <span class="fw-medium">{{ Auth::user()->name }}</span>
                    </div>
                    <div class="avatar-placeholder rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 36px; height: 36px; background-color: var(--primary-color); color: white;">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow border-0 position-absolute custom-dropdown-position" aria-labelledby="userDropdown"
                    style="left: auto; right: 0;"> <!-- Adicione position-absolute e estilos inline -->
                    <li>
                        <a class="dropdown-item d-flex align-items-center py-2" href="{{ route('dashboard') }}">
                            <i class="bi bi-speedometer2 me-2"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center py-2" href="#">
                            <i class="bi bi-gear me-2"></i> Configurações
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider my-1">
                    </li>
                    <li>
                        <form method="POST" action="{{ route('auth.logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item d-flex align-items-center py-2 text-danger">
                                <i class="bi bi-box-arrow-left me-2"></i> Sair
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
            @endguest

        </ul>
    </div>
</nav>

<style>
    :root {
        --primary-color: #6c63ff;
        --secondary-color: #4d44db;
        --accent-color: #ff6584;
    }

    /* Estilos da Navbar */
    .navbar {
        padding: 0.75rem 0;
        transition: all 0.3s ease;
    }

    .navbar-brand {
        font-weight: 700;
        transition: all 0.3s ease;
    }

    .nav-link {
        font-weight: 500;
        color: #495057;
        transition: all 0.3s ease;
    }

    .nav-link:hover,
    .nav-link.active {
        color: var(--primary-color);
        background-color: rgba(108, 99, 255, 0.1);
    }

    .dropdown-menu {
        border-radius: 0.75rem;
        padding: 0.5rem 0;
        margin-top: 0.5rem;
    }

    .dropdown-item {
        border-radius: 0.5rem;
        margin: 0.25rem 0.5rem;
        transition: all 0.2s ease;
    }

    .dropdown-item:hover {
        background-color: rgba(108, 99, 255, 0.1);
        color: var(--primary-color);
    }

    /* Efeito ativo para mobile */
    .navbar-toggler:focus {
        box-shadow: none;
    }

    /* Responsividade */
    @media (max-width: 991.98px) {
        .navbar-collapse {
            padding: 1rem 0;
        }

        .nav-item {
            margin: 0.25rem 0;
        }

        .nav-link,
        .btn {
            width: 100%;
            text-align: left;
            padding: 0.75rem 1rem !important;
        }

        .dropdown-menu {
            border: none;
            box-shadow: none;
        }
    }

    .nav-item.dropdown {
        position: relative;
    }

    .dropdown-menu {
        position: absolute;
        z-index: 1000;
        min-width: 10rem;
        margin: 0;
        transform: none !important;
        top: 100% !important;
        left: 100% !important;
        right: 0 !important;
    }

    /* Garante que o dropdown não afete o fluxo do documento */
    .dropdown {
        display: inline-block;
    }

    .custom-dropdown-position {
        left: auto !important;
        right: 5% !important;
        top: 70% !important;
    }
</style>