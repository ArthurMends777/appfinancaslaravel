<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebMoneyManager - Relatório de transações </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <x-header />
    <div class="container mt-5">
        <h1 class="mb-4">Relatório de transações</h1>
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

        @foreach ($transactions as $transaction)
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        @if ($transaction['transaction_type'] === 'income')
                            <span class="text-success">&#9650;</span> Entrada
                        @elseif ($transaction['transaction_type'] === 'expense')
                            <span class="text-danger">&#9660;</span> Saída
                        @endif
                    </div>
                    <div class="text-end">
                        {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d/m/Y H:i:s') }}
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <span style="border-radius: 5px; font-size: 0.80rem">{{ $transaction->account->bank_name }}</span>
                        <span style="background-color: {{ $transaction->category->color }}; color: #fff; padding: 3px; border-radius: 5px; font-size: 0.60rem; font-weight: bold">{{ $transaction->category->name }}</span>
                    </div>
                    @if ($transaction['transaction_type'] === 'income')
                        <p class="card-text fs-4"><b class="text-success">R$ {{ $transaction['amount'] }}</b></p>
                    @elseif ($transaction['transaction_type'] === 'expense')
                        <p class="card-text fs-4"><b class="text-danger">- R$ {{ $transaction['amount'] }}</b></p>
                    @endif
                    <p class="card-text">{{ $transaction['description'] }}</p>
                    <form id="delete-form" action="{{route('transactions.destroy', ['id'=>$transaction->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                    <button class="btn btn-danger mt-3" onclick="event.preventDefault(); if(confirm('Tem certeza que deseja excluir?')) {document.getElementById('delete-form').submit();}">DELETAR</button>
                    <form method="GET" action="{{route('transactions.edit', ['id'=>$transaction->id])}}">
                        <button class="btn btn-light mt-3" type="submit">EDITAR</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
