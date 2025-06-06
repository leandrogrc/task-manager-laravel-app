@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
</div>
@endif
<!-- Botão para abrir o modal -->
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addTaskModal">
    + Adicionar Task
</button>

<!-- Modal Bootstrap para adicionar task -->
<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('tasks.store') }}" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="addTaskModalLabel">Adicionar Nova Tarefa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="task" class="form-label">Descrição da Tarefa</label>
                    <input
                        type="text"
                        name="task"
                        id="task"
                        class="form-control @error('task') is-invalid @enderror"
                        value="{{ old('task') }}"
                        required
                        autofocus>
                    @error('task')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar Tarefa</button>
            </div>
        </form>
    </div>
</div>@if ($tasks->count())
@foreach ($tasks as $task)
<div class="card mb-3 shadow-sm">
    <div class="card-body d-flex justify-content-between align-items-center">
        <div>
            <h5 class="card-title">{{ $task->task }}</h5>
            <p class="card-text">
                <small class="text-muted">
                    Criado em: {{ $task->created_at->format('d/m/Y') }} às {{ $task->created_at->format('H:i') }}
                </small>
            </p>
        </div>

        <!-- Botão excluir -->
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
        </form>
    </div>
</div>
@endforeach
@else
<p class="text-muted">Nenhuma Task cadastrada</p>
@endif