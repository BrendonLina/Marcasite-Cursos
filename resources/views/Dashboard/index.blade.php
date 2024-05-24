<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body>

<nav class="sidebar">
<div class="sidebar-sticky">
    <h5 class="sidebar-heading">Sistema de Gerenciamento</h5>
    <ul class="list-group flex-column">
        @if(Auth()->user()->role_id == 1)
            <li class="list-group-item">Dashboard</li>
            <li class="list-group-item"><a href="{{route('cursos')}}">Cursos</a></li>
            <li class="list-group-item"><a href="{{route('meus.cursos')}}">Meus Cursos</a></li>
            <li class="list-group-item"><a href="{{route('vitrine.curso')}}">Vitrine de Cursos</a></li>
            <li class="list-group-item"><a href="{{route('usuarios')}}">Usuários</a></li>
            <li class="list-group-item"><a href="#">Configurações</a></li>
            <li class="list-group-item"><a href="{{route('logout')}}">Sair</a></li>
        @else
            <li class="list-group-item">Dashboard</li>
            <li class="list-group-item"><a href="{{route('cursos')}}">Cursos</a></li>
            <li class="list-group-item"><a href="{{route('meus.cursos')}}">Meus Cursos</a></li>
            <li class="list-group-item"><a href="{{route('vitrine.curso')}}">Vitrine de Cursos</a></li>
            <li class="list-group-item"><a href="#">Configurações</a></li>
            <li class="list-group-item"><a href="{{route('logout')}}">Sair</a></li>
        @endif
        
    </ul>
</div>
</nav>

<div class="user-info">
    <span>{{Auth::user()->name}}</span>
</div>

<main class="main">
    <h1 class="mt-4">Dashboard</h1>
    <p>Seja bem-vindo!</p>
</main>
    
</body>
</html>