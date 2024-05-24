<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Cadastro aluno</title>
</head>
<body class="bg-light">

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h2 class="mb-4 text-center">Cadastro Aluno</h2>

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

                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Nome" name="name" value="{{old('name')}}" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="CPF" name="cpf" value="{{old('cpf')}}" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Senha" name="password">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Confirmação de Senha" name="password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
                <a href="{{route('index')}}" class="d-block mb-3">Já é cadastrado? Entre!</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
