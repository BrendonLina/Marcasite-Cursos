<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>Editar Usuario {{$user->name}}</title>
</head>
<body>
    <h1>Editando Usuário {{$user->name}}</h1>
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
        <form action="{{route('atualizar.usuario', $id)}}" method="POST" enctype="multipart/form-data" id="curso-form">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nome" class="form-label">Nome*</label>
                <input type="text" class="form-control" id="nome" name="name" placeholder="Nome" value="{{$user->name}}" >
                @error('name')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email*</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$user->email}}">
                @error('email')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF*</label>
                <input type="text" class="form-control" id="cpf" name="cpf" placeholder="999.999.999-99" value="{{$user->cpf}}">
                @error('cpf')
                    <span>{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <select class="form-select" aria-label="Selecione a Role" name="role_id">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role_id')
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
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a href="{{route('dashboard')}}">Voltar</a></button>
            <button type="submit" class="btn btn-primary" id="cadastrar-curso">Salvar</button>
        </div>
    </form>
  </div>

</body>
</html>



