@extends('layouts.base')
@section('title', 'Dashboard')

@section('content')

<h1>Bem-vindo, {{ Auth::user()->name }}!</h1>
@include('tasks', ['tasks' => $tasks])
@endsection