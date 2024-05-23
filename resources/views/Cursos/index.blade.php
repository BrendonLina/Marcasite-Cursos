<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        /* Estilo para os botões de ação */
        .action-button {
            margin-right: 5px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Tabela de Cursos</h2>
    {{-- <button type="button" class="btn btn-primary action-button"><a href="{{route('cadastrar.cursos')}}">Novo Curso</a></button> --}}
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Cadastrar Curso
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Curso</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('cursos')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="curso_nome" class="form-label">Nome*</label>
                    <input type="text" class="form-control" id="curso_nome" placeholder="Nome" required>
                </div>
                <div class="mb-3">
                    <label for="curso_valor" class="form-label">Valor*</label>
                    <input type="text" class="form-control" id="curso_valor" placeholder="R$" required>
                </div>
                <div class="mb-3">
                    <label for="curso_vagas" class="form-label">Vagas*</label>
                    <input type="number" class="form-control" id="curso_vagas" placeholder="300" required>
                </div>
                <div class="mb-3">
                    <label for="curso_inscricao" class="form-label">Inscrições de:</label>
                    <input type="date" class="form-control" id="curso_inscricao" placeholder="01/05/204" required>
                </div>
                <div class="mb-3">
                    <label for="curto_inscricao_ate" class="form-label">Até</label>
                    <input type="date" class="form-control" id="curto_inscricao_ate" placeholder="30/05/2024" required>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label for="curso_descricao" class="form-label">Descrição*</label>
                    <textarea class="form-control" id="curso_descricao" rows="3"></textarea>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="is_active" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Ativo?
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
      </div>
    </div>
  </div>

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

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Nome</th>
                <th>Valor</th>
                <th>Ativo</th>
                <th>Período de Inscrição</th>
                <th>Vagas Restantes</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            
            <tr>
                <td>Curso de Programação</td>
                <td>R$ 200,00</td>
                <td>Sim</td>
                <td>01/06/2024 - 30/06/2024</td>
                <td>5</td>
                <td>
                    <button type="button" class="btn btn-primary action-button">Ver Inscritos</button>
                    {{-- <button type="button" class="btn btn-info action-button"><a href="{{route('editar.curso', $id)}}">Editar Curso</a></button> --}}
                    <button type="button" class="btn btn-info action-button"><a href="">Editar Curso</a></button>
                    <button type="button" class="btn btn-danger action-button">Excluir Curso</button>
                </td>
            </tr>
            
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
