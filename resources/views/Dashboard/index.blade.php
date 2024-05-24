<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>

<style>
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 250px;
        background-color: #343a40; 
        padding-top: 20px;
    }

    .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 60px); 
        padding-bottom: 20px;
        overflow-x: hidden;
        overflow-y: auto;
    }

    .sidebar-heading {
        color: #fff; 
        font-size: 1.2rem;
        text-align: center;
        margin-bottom: 20px;
    }

    .list-group-item {
        background-color: #343a40; 
        border: none;
        border-radius: 0;
        color: #fff; 
    }

    .list-group-item:hover {
        background-color: #495057; 
    }

    .user-info {
        position: fixed;
        top: 0;
        right: 0;
        height: 60px;
        background-color: #343a40; 
        color: #fff; 
        padding: 0 20px;
        line-height: 60px;
    }
    .user-info-search {
        position: fixed;
        top: 0;
        left: 350px;
        height: 60px;
        background-color: #343a40; 
        color: #fff; 
        padding: 0 20px;
        line-height: 60px;
    }

    .search-container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .search-form {
        width: 400px;
    }

    .main {
        margin-top: 80px;
        margin-left: 300px;
    }
</style>
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

{{-- <main role="main" class="ml-5">
<div class="search-container">
    <form class="search-form">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Pesquisar" aria-label="Pesquisar" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">Buscar</button>
            </div>
        </div>
    </form>
</div>
</main> --}}

{{-- <div class="user-info-search">
    <span>SUNDAAAA</span>
</div> --}}
<div class="user-info">
    <span>{{Auth::user()->name}}</span>
</div>

<main class="main">
    <h1 class="mt-4">Dashboard</h1>
    <p>Seja bem-vindo!</p>
</main>
    
</body>
</html>