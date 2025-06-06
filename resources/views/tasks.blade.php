@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
</div>
@endif

<!-- Botão para abrir o modal de adicionar -->
<button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addTaskModal">
    + Adicionar Task
</button>

<!-- Modal para adicionar tarefa -->
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
                    <label for="add-task" class="form-label">Descrição da Tarefa</label>
                    <input
                        type="text"
                        name="task"
                        id="add-task"
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

<!-- Modal para editar tarefa -->
<div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" id="editTaskForm" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="editTaskModalLabel">Editar Tarefa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="edit-task" class="form-label">Descrição da Tarefa</label>
                    <input
                        type="text"
                        name="task"
                        id="edit-task"
                        class="form-control"
                        required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar Tarefa</button>
            </div>
        </form>
    </div>
</div>

<!-- Lista de tarefas -->
@if ($tasks->count())
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

        <!-- Botão de edição -->
        <button type="button"
            class="btn btn-warning mb-4"
            data-bs-toggle="modal"
            data-bs-target="#editTaskModal"
            data-task-id="{{ $task->id }}"
            data-task-name="{{ $task->task }}">
            + Editar Task
        </button>

        <!-- Botão de exclusão -->
        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?');">
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
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editModal = document.getElementById('editTaskModal');
        const taskInput = document.getElementById('edit-task');
        const form = document.getElementById('editTaskForm');

        editModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            if (!button) return;

            // Atraso para garantir foco sem erro de aria-hidden
            setTimeout(() => {
                const taskId = button.getAttribute('data-task-id');
                const taskName = button.getAttribute('data-task-name');

                if (taskId) {
                    form.action = `/tasks/${taskId}`;
                    taskInput.value = taskName || '';
                    taskInput.focus();
                }
            }, 100);
        });

        // Limpa o modal ao fechar
        editModal.addEventListener('hidden.bs.modal', () => {
            taskInput.value = '';
            form.action = '';
        });
    });
</script>
@endpush