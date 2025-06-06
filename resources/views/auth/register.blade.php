<x-base>
    @section('title', 'Registrar Conta')

    <div class="auth-container d-flex justify-content-center align-items-center min-vh-100 mx-2">
        <div class="auth-card">
            <div class="auth-header text-center mb-4">
                <i class="bi bi-person-plus-fill auth-icon"></i>
                <h2 class="auth-title">Crie sua conta</h2>
                <p class="auth-subtitle">Junte-se a nós e comece a organizar suas tarefas</p>
            </div>

            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Por favor, corrija os seguintes erros:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form method="POST" action="{{ route('auth.register.submit') }}" class="auth-form">
                @csrf

                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder=" "
                        required
                        autofocus>
                    <label for="name">Nome Completo</label>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <input
                        type="text"
                        class="form-control @error('username') is-invalid @enderror"
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        placeholder=" "
                        required>
                    <label for="username">Nome de Usuário</label>
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
                        required
                        autocomplete="new-password">
                    <label for="password">Senha</label>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="password-strength mt-2">
                        <div class="progress" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                        </div>
                        <small class="text-muted">Força da senha: <span id="strength-text">fraca</span></small>
                    </div>
                </div>

                <div class="form-floating mb-4">
                    <input
                        type="password"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder=" "
                        required
                        autocomplete="new-password">
                    <label for="password_confirmation">Confirmar Senha</label>
                    @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100 auth-btn mb-3">
                    <i class="bi bi-person-plus me-2"></i>Criar Conta
                </button>

                <div class="auth-footer text-center">
                    <p class="mb-0">Já tem uma conta? <a href="{{ route('auth.login') }}" class="auth-link">Faça login</a></p>
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

        .auth-link {
            color: var(--primary-color);
            font-weight: 500;
            text-decoration: none;
        }

        .auth-link:hover {
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

        .social-login .btn {
            border-radius: 8px;
            padding: 0.75rem;
        }

        .password-strength {
            margin-top: 0.5rem;
        }

        .progress {
            background-color: #e9ecef;
            border-radius: 4px;
        }

        .progress-bar {
            background-color: #dc3545;
            transition: width 0.3s ease, background-color 0.3s ease;
        }

        #strength-text {
            font-weight: 500;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const progressBar = document.querySelector('.progress-bar');
            const strengthText = document.getElementById('strength-text');

            passwordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;

                // Verifica o comprimento
                if (password.length >= 8) strength += 1;
                if (password.length >= 12) strength += 1;

                // Verifica caracteres especiais
                if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) strength += 1;

                // Verifica números
                if (/\d/.test(password)) strength += 1;

                // Verifica letras maiúsculas e minúsculas
                if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength += 1;

                // Atualiza a barra de progresso e texto
                let width = 0;
                let color = '';
                let text = '';

                switch (strength) {
                    case 0:
                    case 1:
                        width = 25;
                        color = '#dc3545';
                        text = 'fraca';
                        break;
                    case 2:
                        width = 50;
                        color = '#fd7e14';
                        text = 'média';
                        break;
                    case 3:
                        width = 75;
                        color = '#ffc107';
                        text = 'boa';
                        break;
                    case 4:
                    case 5:
                        width = 100;
                        color = '#28a745';
                        text = 'forte';
                        break;
                }

                progressBar.style.width = width + '%';
                progressBar.style.backgroundColor = color;
                strengthText.textContent = text;
                strengthText.style.color = color;
            });
        });
    </script>
</x-base>