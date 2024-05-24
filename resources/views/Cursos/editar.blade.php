<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>Editar curso</title>
</head>
<body>
    <h1>Editando curso</h1>
    <a href="{{route('dashboard')}}">Dashboard</a>
    
    @if(session('danger'))
    @if(is_array(session('danger')))
        <div class="alert alert-danger">
            @foreach(session('danger') as $message)
                <p>{{ $message }}</p>
            @endforeach
        </div>
    @else
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif
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

    <div class="modal-body">
        <form action="{{route('atualizar.curso', $id)}}" method="POST" enctype="multipart/form-data" id="curso-form">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="curso_nome" class="form-label">Nome*</label>
                <input type="text" class="form-control" id="curso_nome" name="name" placeholder="Nome" value="{{$curso->name}}" >
                @error('name')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="curso_valor" class="form-label">Valor*</label>
                <input type="text" class="form-control" id="curso_valor" name="value" placeholder="R$" value="{{$curso->value}}">
                @error('value')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="curso_vagas" class="form-label">Vagas*</label>
                <input type="number" class="form-control" id="curso_vagas" name="vacancies" placeholder="300" value="{{$curso->vacancies}}">
                @error('vacancies')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="curso_inscricao" class="form-label">Inscrições de:</label>
                <input type="date" class="form-control" id="curso_inscricao" name="registrations" placeholder="01/05/204" value="{{$curso->registrations}}">
                @error('registrations')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="curto_inscricao_ate" class="form-label">Até</label>
                <input type="date" class="form-control" id="curto_inscricao_ate" name="registrations_up_to" placeholder="30/05/2024" value="{{$curso->registrations_up_to}}">
                @error('registrations_up_to')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Default file input example</label>
                <input class="form-control" type="file" name="image" id="formFile" value="{{$curso->image}}">
                @error('image')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="curso_descricao" class="form-label">Descrição*</label>
                <textarea class="form-control" id="curso_descricao" name="description" rows="3" >{{$curso->description}}</textarea>
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
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="{{route('dashboard')}}">Fechar</a></button>
            <button type="submit" class="btn btn-primary" id="cadastrar-curso">Salvar</button>
        </div>
    </form>
  </div>

</body>
</html>