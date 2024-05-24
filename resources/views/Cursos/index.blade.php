<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5 md-5">
    <h2>Tabela de Cursos</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Cadastrar Curso
    </button>
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

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Curso</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route('cadastrar.cursos')}}" method="POST" enctype="multipart/form-data" id="curso-form">
                @csrf
                <div class="mb-3">
                    <label for="curso_nome" class="form-label">Nome*</label>
                    <input type="text" class="form-control" id="curso_nome" name="name" placeholder="Nome" >
                    @error('name')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="curso_valor" class="form-label">Valor*</label>
                    <input type="text" class="form-control" id="curso_valor" name="value" placeholder="R$" >
                    @error('value')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="curso_vagas" class="form-label">Vagas*</label>
                    <input type="number" class="form-control" id="curso_vagas" name="vacancies" placeholder="300" >
                    @error('vacancies')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="curso_inscricao" class="form-label">Inscrições de:</label>
                    <input type="date" class="form-control" id="curso_inscricao" name="registrations" placeholder="01/05/204" >
                    @error('registrations')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="curto_inscricao_ate" class="form-label">Até</label>
                    <input type="date" class="form-control" id="curto_inscricao_ate" name="registrations_up_to" placeholder="30/05/2024" >
                    @error('registrations_up_to')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Default file input example</label>
                    <input class="form-control" type="file" name="image" id="formFile">
                    @error('image')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="curso_descricao" class="form-label">Descrição*</label>
                    <textarea class="form-control" id="curso_descricao" name="description" rows="3"></textarea>
                    @error('description')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="is_active" id="flexCheckChecked" value="true" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Ativo?
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary" id="cadastrar-curso">Salvar</button>
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
            @if($cursos->count() > 0)
            @foreach($cursos as $curso)
                <tr>
                    <td> {{$curso->name}} </td>
                    <td> {{$curso->value}} </td>
                    @if($curso->is_active == 1)
                        <td> {{$curso->is_active = "Sim"}} </td>
                    @else
                        <td> {{$curso->is_active = "Não"}} </td>
                    @endif
                    <td> De: {{$curso->registrations}} até: {{$curso->registrations_up_to}} </td>
                    <td> {{$curso->vacancies}} </td>
                    <td>
                        <button type="button" class="btn btn-primary action-button"><a href="{{route('inscritos', $curso->id)}}">Ver Inscritos</a></button>
                        <button type="button" class="btn btn-info action-button"><a href="{{route('editar.curso', $curso->id)}}">Editar Curso</a></button>

                        <form action="{{ route('excluir.curso', $curso->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger action-button" onclick="return confirm('Você tem certeza que deseja excluir este curso?');">Excluir Curso</button>
                        </form>

                    </td>
                </tr>
            @endforeach         
        </tbody>
    </table>
    @else
        <div class="alert alert-warning">
            Não há cursos cadastrados!.
        </div>
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
