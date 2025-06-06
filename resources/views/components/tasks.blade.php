@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
</div>
@endif
<!-- Botão para abrir o modal -->
<div class="d-flex justify-content-end">
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addTaskModal">
        + Adicionar Task
    </button>
</div>

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
<!-- <div class="d-flex justify-content-center"> -->
<div class="card mb-3 shadow-sm">
    <div class="card-body d-flex justify-content-between align-items-center">
        <div>
            <h5 class=" card-title">{{ $task->task }}</h5>
            <p class="card-text">
                <small class="text-muted">
                    Criado em: {{ $task->created_at->format('d/m/Y') }} às {{ $task->updated_at->format('H:i') }}
                </small>
            </p>
        </div>
        <!-- Botão excluir -->
        <button type="button"
            class="btn btn-danger btn-sm"
            data-bs-toggle="modal"
            data-bs-target="#deleteTaskModal"
            data-task-id="{{ $task->id }}"
            data-task-name="{{ $task->task }}">
            Excluir
        </button>
    </div>
</div>
<!-- </div> -->
@endforeach
@else
<p class="text-muted">Nenhuma Task cadastrada</p>
@endif
<!-- Modal de Confirmação de Exclusão -->
<div class="modal fade" id="deleteTaskModal" tabindex="-1" aria-labelledby="deleteTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="deleteTaskForm" class="modal-content" action="{{ route('tasks.destroy') }}">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h5 class="modal-title" id="deleteTaskModalLabel">Confirmar Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja excluir a tarefa <strong id="taskNameToDelete"></strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" id="confirmar-exclusao" class="btn btn-danger" onClick="confirmarExclusao">Excluir</button>
            </div>
        </form>
    </div>
</div>
<script>
    function confirmarExclusao(taskId, taskName) {
        document.getElementById(`form-${taskId}`).submit();
    }
</script>