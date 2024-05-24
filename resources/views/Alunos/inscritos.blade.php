<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscritos no curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>

<div class="container mt-5 md-5">
    <h2>Alunos escritos no curso</h2>
    <a href="{{route('dashboard')}}">Dashboard</a>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Ativo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inscritos as $inscrito)
                <tr>
                    <td> {{$inscrito->name}} </td>
                    @if($inscrito->role_id == 1)
                        <td> {{$inscrito->role_id = "Admin"}} </td>
                    @else
                        <td> {{$inscrito->role_id = "Aluno"}} </td>
                    @endif 
                  
                    @if($inscrito->is_active == 1)
                        <td> {{$inscrito->is_active = "Sim"}} </td>
                    @else
                        <td> {{$inscrito->is_active = "Não"}} </td>
                    @endif
                                
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
