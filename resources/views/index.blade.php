<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Login</title>
</head>
<body class="bg-light">
    
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="login p-4 bg-white shadow rounded">
                <h4 class="title-login mb-4">Login</h4>
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    @if(session('danger'))
                        <div class="alert alert-danger mb-3">{{ session('danger') }}</div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success mb-3">{{ session('success') }}</div>
                    @endif
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Seu email">
                        @error('email')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Senha">
                        @error('password')
                            <span>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary form-control" value="Entrar">
                        <a href="{{ route('cadastro.usuario') }}" class="d-block mt-3">Não tem conta? Cadastre-se!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>

