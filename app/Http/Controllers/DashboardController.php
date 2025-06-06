<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Aplica o middleware 'auth' para proteger todas as rotas deste controller
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Task::where('user_id', Auth::user()->id)->get();
        // Exibe a view dashboard.blade.php
        return view('dashboard')->with('tasks', $tasks);;
    }
}
