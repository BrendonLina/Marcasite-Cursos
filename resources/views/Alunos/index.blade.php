<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>

<div class="container mt-5 md-5">
    <h2>Meus Cursos</h2>
    <a href="{{route('dashboard')}}">Dashboard</a>

    @if ($errors->any())
    <div class="alert alert-danger mt-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Nome</th>
                <th>Data de inscrição</th>
                <th>Status</th>
                <th>Valor Pago</th>
            </tr>
        </thead>
        <tbody>
            @if(Auth()->user() || Auth()->user()->role_id ==1)
            @if($cursosDoUsuario->count() > 0)
            @foreach($cursosDoUsuario as $curso)
                <tr>
                    <td> {{$curso->name}} </td>
                    <td> {{$curso->registrations}} </td>
                    @if($curso->is_active == 1)
                        <td> {{$curso->is_active = "Sim"}} </td>
                    @else
                        <td> {{$curso->is_active = "Não"}} </td>
                    @endif
                    <td> {{$curso->value}} </td>
                
                </tr>
            @endforeach         
        </tbody>
    </table>
    @else
        <div class="alert alert-warning">
            Você ainda não está inscrito em nenhum curso.
        </div>
    @endif
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

    $(document).ready(function() {
        var errorMessage = $('.alert.alert-danger');
        if (errorMessage.length) {
            setTimeout(function() {
                errorMessage.hide();
            }, 5000);
        }
    });

    $(document).ready(function() {
        var errorMessage = $('.alert.alert-success');
        if (errorMessage.length) {
            setTimeout(function() {
                errorMessage.hide();
            }, 5000);
        }
    });
</script>

</body>
</html>
