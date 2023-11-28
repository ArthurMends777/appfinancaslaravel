<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebMoneyManager - Contas Bancárias</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">WebMoneyManager</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Página Inicial</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Cadastro
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Categorias</a></li>
                          <li><a class="dropdown-item" href="#">Contas Bancárias</a></li>
                          <li><a class="dropdown-item" href="{{ route('transactions.create') }}">Transações</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('report.index') }}">Relatórios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between">
                    <span>{{ $account->account_name }}</span>
                    <span class="badge bg-dark text-white">{{ $account->bank_name }}</span>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $account->account_type }}</p>
                    <form id="delete-form-{{ $account->id }}" action="{{ route('accounts.destroy', ['id' => $account->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                    <button class="btn btn-danger mt-3" onclick="event.preventDefault(); if(confirm('Tem certeza que deseja excluir?')) {document.getElementById('delete-form-{{ $account->id }}').submit();}">DELETAR</button>
                    <form method="GET" action="{{ route('accounts.edit', ['id' => $account->id]) }}">
                        <button class="btn btn-light mt-3" type="submit">EDITAR</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
