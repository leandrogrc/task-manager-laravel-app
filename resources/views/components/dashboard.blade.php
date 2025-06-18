<x-base>
    @section('title', 'Dashboard')

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
        <div class="d-flex align-items-center">
            <i class="bi bi-check-circle-fill me-2"></i>
            <div>{{ session('success') }}</div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
    </div>
    @endif
    <h1>Bem-vindo, {{ Auth::user()->name }}!</h1>
    @include('components.tasks', ['tasks' => $tasks])
</x-base>