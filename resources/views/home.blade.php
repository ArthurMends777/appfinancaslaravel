<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumo Financeiro - WebMoneyManager</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
  
        h1 {
            margin-bottom: 20px;
        }
        h2 {
            margin-top: 30px;
        }
        .totals {
            margin-bottom: 30px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }
    </style>
</head>
<body>
    <x-header />

    <div class="totals">
        <h3>Total de Gastos: R$ <span id="totalExpenses">{{ $totalExpenses }}</span></h3>
        <h3>Total de Ganhos: R$ <span id="totalIncome">{{ $totalIncome }}</span></h3>
        <h3>Saldo Total: R$ <span id="totalBalance">{{ $totalBalance }}</span></h3>
    </div>

    <div>
        <h2>Últimas Transações</h2>
        <ul>
            @foreach($transactions as $transaction)
                <li>
                    <strong>{{ $transaction->description }}</strong> - R$ {{ $transaction->amount }} - {{ $transaction->transaction_date }}
                </li>
            @endforeach
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
