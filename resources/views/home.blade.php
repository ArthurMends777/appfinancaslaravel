<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumo Financeiro - WebMoneyManager</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
    <x-header />

    <div class="container mt-4">
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card border-danger">
                    <div class="card-body">
                        <h5 class="card-title">Total de Gastos</h5>
                        <p class="card-text">R$ {{ $totalExpenses }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-success">
                    <div class="card-body">
                        <h5 class="card-title">Total de Ganhos</h5>
                        <p class="card-text">R$ {{ $totalIncome }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Saldo Total</h5>
                        <p class="card-text">R$ {{ $totalBalance }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h2>Últimas Transações</h2>
            <ul class="list-group">
                @foreach($transactions as $transaction)
                    <li class="list-group-item">
                        {{ $transaction->description }} - {{ $transaction->amount }} - {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d/m/Y H:i:s') }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
