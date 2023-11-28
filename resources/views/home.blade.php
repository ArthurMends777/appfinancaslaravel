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

        <div>
            <h3>Total de Gastos: R$ {{ $totalExpenses }}</h3>
            <h3>Total de Ganhos: R$ {{ $totalIncome }}</h3>
            <h3>Saldo Total: R$ {{ $totalBalance }}</h3>
        </div>
        
        <div>
            <h2>Últimas Transações</h2>
            <ul>
                @foreach($transactions as $transaction)
                    <li>
                        {{ $transaction->description }} - {{ $transaction->amount }} - {{ $transaction->transaction_date }}
                    </li>
                @endforeach
            </ul>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
