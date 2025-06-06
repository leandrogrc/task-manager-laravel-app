<x-base>
    @section('title', 'Entrar na Conta')
    @section('content')

    <div class="d-flex justify-content-center align-items-center">
        <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
            <h2 class="text-center mb-4">Acessar Conta</h2>

            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <form method="POST" action="{{ route('auth.login.submit') }}">
                @csrf

                <div class="mb-3">
                    <label for="username" class="form-label">Usuário</label>
                    <input
                        type="text"
                        class="form-control @error('username') is-invalid @enderror"
                        id="username"
                        name="username"
                        value="{{ old('username') }}"
                        placeholder="Seu usuário"
                        required
                        autofocus>
                    @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        id="password"
                        name="password"
                        placeholder="Sua senha"
                        required>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
            </form>
            <div class="mt-3 text-center">
                <small>Ainda não possui uma conta? <a href="{{ route('auth.register') }}">Criar conta</a></small>
            </div>
        </div>
    </div>
</x-base>