<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>

<div class="container mt-5 md-5">
    <h2>Usuários no sistema</h2>
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
    @if(is_array(session('success')))
        <div class="alert alert-success">
            @if(isset(session('success')['title']))
                <strong>{{ session('success')['title'] }}</strong>
            @endif
            @if(isset(session('success')['message']))
                <p>{{ session('success')['message'] }}</p>
            @endif
        </div>
    @else
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endif

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Ativo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td> {{$user->name}} </td>
                    @if($user->role_id == 1)
                        <td> {{$user->role_id = "Admin"}} </td>
                    @else
                        <td> {{$user->role_id = "Aluno"}} </td>
                    @endif 
                  
                    @if($user->is_active == 1)
                        <td> {{$user->is_active = "Sim"}} </td>
                    @else
                        <td> {{$user->is_active = "Não"}} </td>
                    @endif
                    <td>
                        <button type="button" class="btn btn-info action-button"><a href="{{route('editar.usuario', $user->id)}}">Editar Usuario</a></button>

                        <form action="{{ route('excluir.usuario', $user->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger action-button" onclick="return confirm('Você tem certeza que deseja excluir este usuário?');">Excluir Usuário</button>
                        </form>

                    </td>              
                </tr>
            @endforeach         
        </tbody>
    </table>
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
