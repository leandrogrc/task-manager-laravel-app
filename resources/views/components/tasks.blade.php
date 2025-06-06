@if (session('success'))
<div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
    <div class="d-flex align-items-center">
        <i class="bi bi-check-circle-fill me-2"></i>
        <div>{{ session('success') }}</div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
</div>
@endif

<!-- Header e Botão de Adicionar -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Tarefas</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTaskModal">
        <i class="bi bi-plus-lg"></i>
    </button>
</div>

<!-- Lista de Tarefas -->
@if ($tasks->count())
<div class="task-list">
    @foreach ($tasks as $task)
    <div class="card mb-3 border-0 shadow-sm task-card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start">
                <div class="flex-grow-1">
                    <h5 class="card-title mb-1">{{ $task->task }}</h5>
                    <p class="card-text text-muted small mb-2">
                        <i class="bi bi-clock me-1"></i>Criado em: {{ $task->created_at->format('d/m/Y H:i') }}
                    </p>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editTaskModal" data-task-id="{{ $task->id }}" data-task-name="{{ $task->task }}">
                        <i class="bi bi-pencil"></i>
                    </button>
                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteTaskModal" data-task-id="{{ $task->id }}" data-task-name="{{ $task->task }}">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="alert alert-info border-0 shadow-sm">
    <div class="d-flex align-items-center">
        <i class="bi bi-info-circle-fill me-2"></i>
        <div>Nenhuma tarefa encontrada. Clique em "Nova Tarefa" para começar.</div>
    </div>
</div>
@endif

<!-- Modal de Adição -->
<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
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
</div>

<!-- Modal de Edição -->
<div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" id="editTaskForm" class="modal-content border-0 shadow-lg">
            @csrf
            @method('PUT')
            <div class="modal-header border-0">
                <h5 class="modal-title" id="editTaskModalLabel"><i class="bi bi-pencil-square me-2"></i>Editar Tarefa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="edit_task" class="form-label">Descrição da Tarefa</label>
                    <input type="text" name="task" id="edit_task" class="form-control @error('task') is-invalid @enderror" required autofocus>
                    @error('task')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal de Exclusão -->
<div class="modal fade" id="deleteTaskModal" tabindex="-1" aria-labelledby="deleteTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" id="deleteTaskForm" class="modal-content border-0 shadow-lg">
            @csrf
            @method('DELETE')
            <div class="modal-header border-0">
                <h5 class="modal-title" id="deleteTaskModalLabel"><i class="bi bi-exclamation-triangle me-2"></i>Confirmar Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja excluir a tarefa <strong id="taskNameToDelete" class="text-danger"></strong>?</p>
                <p class="small text-muted">Esta ação não pode ser desfeita.</p>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Excluir</button>
            </div>
        </form>
    </div>
</div>

<style>
    .task-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        border-left: 4px solid #6c63ff;
    }

    .task-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(108, 99, 255, 0.1) !important;
    }

    .btn-outline-warning {
        color: #ffc107;
        border-color: #ffc107;
    }

    .btn-outline-warning:hover {
        background-color: #ffc107;
        color: #212529;
    }

    .btn-outline-danger {
        color: #dc3545;
        border-color: #dc3545;
    }

    .btn-outline-danger:hover {
        background-color: #dc3545;
        color: white;
    }

    .modal-content {
        border-radius: 12px;
    }

    .alert {
        border-radius: 8px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Configuração do modal de exclusão
        const deleteModal = document.getElementById('deleteTaskModal');
        if (deleteModal) {
            deleteModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const taskId = button.getAttribute('data-task-id');
                const taskName = button.getAttribute('data-task-name');

                document.getElementById('taskNameToDelete').textContent = taskName;
                document.getElementById('deleteTaskForm').action = `/tasks/${taskId}`;
            });
        }

        // Configuração do modal de edição
        const editModal = document.getElementById('editTaskModal');
        if (editModal) {
            editModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const taskId = button.getAttribute('data-task-id');
                const taskName = button.getAttribute('data-task-name');

                document.getElementById('edit_task').value = taskName;
                document.getElementById('editTaskForm').action = `/tasks/${taskId}`;
            });
        }
    });
</script>