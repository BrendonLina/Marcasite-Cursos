<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        
        .action-button {
            margin-right: 5px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Alunos</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Ativo</th>
                <th>Ações</th>
                
            </tr>
        </thead>
        <tbody>
            <!-- Exemplo de linha de curso -->
            <tr>
                <td>Curso de Programação</td>
                <td>R$ 200,00</td>
                <td>R$ 200,00</td>
                <td>
                    <button type="button" class="btn btn-primary action-button">Ver Inscrito</button>
                    <button type="button" class="btn btn-info action-button">Editar Curso</button>
                    
                </td>
            </tr>
            
        </tbody>
    </table>
</div>

</body>
</html>
