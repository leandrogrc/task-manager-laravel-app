<x-base>
    @section('title', 'Entrar na Conta')

    <div class="auth-container d-flex justify-content-center align-items-center min-vh-100 mx-2">
        <div class="auth-card">
            <div class="auth-header text-center mb-4">
                <i class="bi bi-lock-fill auth-icon"></i>
                <h2 class="auth-title">Bem-vindo de volta</h2>
                <p class="auth-subtitle">Faça login para acessar sua conta</p>
            </div>

            @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form method="POST" action="{{ route('auth.login.submit') }}" class="auth-form">
                @csrf

                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control @error('username') is-invalid @enderror"
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        placeholder=" "
                        required
                        autofocus>
                    <label for="username">Usuário</label>
                    @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        id="password"
                        name="password"
                        placeholder=" "
                        required>
                    <label for="password">Senha</label>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100 auth-btn mb-3">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Entrar
                </button>

                <div class="auth-footer text-center">
                    <p class="mb-0">Não tem uma conta? <a href="{{ route('auth.register') }}" class="auth-link">Cadastre-se</a></p>
                </div>
            </form>
        </div>
    </div>

    <style>
        :root {
            --primary-color: #6c63ff;
            --secondary-color: #4d44db;
            --text-color: #495057;
            --light-bg: #f8f9fa;
        }

        .auth-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            padding: 2.5rem;
            width: 100%;
            max-width: 450px;
        }

        .auth-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .auth-title {
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }

        .auth-subtitle {
            color: #6c757d;
            margin-bottom: 2rem;
        }

        .form-floating>label {
            color: #6c757d;
        }

        .auth-btn {
            padding: 0.75rem;
            font-weight: 500;
            border-radius: 8px;
            background-color: var(--primary-color);
            border: none;
            transition: all 0.3s ease;
        }

        .auth-btn:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }

        .forgot-password {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.875rem;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .auth-divider {
            display: flex;
            align-items: center;
            color: #6c757d;
            font-size: 0.875rem;
        }

        .auth-divider::before,
        .auth-divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #dee2e6;
            margin: 0 1rem;
        }

        .auth-link {
            color: var(--primary-color);
            font-weight: 500;
            text-decoration: none;
        }

        .auth-link:hover {
            text-decoration: underline;
        }

        .social-login .btn {
            border-radius: 8px;
            padding: 0.75rem;
        }
    </style>
</x-base>