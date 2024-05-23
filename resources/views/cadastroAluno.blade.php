<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Cadastro aluno</title>
</head>
<body>
    <h1>Cadastro Aluno</h1>

    @if(session('danger'))
    <div class="alert alert-danger">
        {{ session('danger') }}
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success">
        <strong>{{ session('success')['title'] }}</strong>
        <p>{{ session('success')['message'] }}</p>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form action="{{route('cadastro.usuario.store')}}" method="POST">
        @csrf

        <input type="text" placeholder="Nome" name="name" value="{{old('name')}}" required>
        <input type="text" placeholder="CPF" name="cpf" value="{{old('cpf')}}" required>
        <input type="email" placeholder="Email" name="email" value="{{old('email')}}" required>
        <input type="password" placeholder="Senha" name="password">
        <input type="password" placeholder="Confirmação de Senha" name="password_confirmation">
        <button> Cadastrar</button>
    </form>
</body>
</html>