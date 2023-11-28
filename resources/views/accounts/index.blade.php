<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebMoneyManager - Contas Bancárias </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .custom-mt {
            margin-top: 25px;
            margin-left: 120px;
        }
    </style>
</head>
<body>
    <x-header />
    <a href="{{ route('accounts.create') }}" class="btn btn-primary custom-mt">Cadastrar</a>
    <div class="container mt-5">
        @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    
    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    @foreach ($accounts as $account)
            <div class="card mb-3 col-md-4">
                <div class="card-header d-flex justify-content-between"></div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <span style="border-radius: 5px; font-size: 0.80rem">{{$account->account_name}}</span>
                        <span style="background-color: #000; color: #fff; padding: 3px; border-radius: 5px; font-size: 0.60rem; font-weight: bold">{{ $account->bank_name }}</span>
                    </div>
                    <p class="card-text">{{ $account->account_type }}</p>
                    <form id="delete-form-{{ $account->id }}" action="{{route('accounts.destroy', ['id'=>$account->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                    
                    <div class="d-flex justify-content-between mt-3">
                        <button class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Tem certeza que deseja excluir?')) {document.getElementById('delete-form-{{ $account->id }}').submit();}">DELETAR</button>
                        
                        <form method="GET" action="{{route('accounts.edit', ['id'=>$account->id])}}">
                            <button class="btn btn-light" type="submit">EDITAR</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 