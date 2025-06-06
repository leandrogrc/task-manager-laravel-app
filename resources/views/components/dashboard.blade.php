<x-base>
    @section('title', 'Dashboard')

    @section('content')

    <h1>Bem-vindo, {{ Auth::user()->name }}!</h1>
    @include('components.tasks', ['tasks' => $tasks])
</x-base>