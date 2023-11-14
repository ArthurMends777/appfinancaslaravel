
<x-app-layout>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

<!-- Histórico de transações -->
@php
$transactions = [

    [
        'id' => 1,
        'account_id' => 'Itaú',
        'transaction_date' => '2023-11-14 10:00:00',
        'amount' => 1500.00,
        'description' => 'Remuneração salarial',
        'category_id' => 'Salário',
        'transaction_type' => 'income'
    ],
    [
        'id' => 2,
        'account_id' => 'Bradesco',
        'transaction_date' => '2023-11-14 10:00:00',
        'amount' => 150.00,
        'description' => 'Gastos no supermercado',
        'category_id' => 'Doméstico',
        'transaction_type' => 'expense'
    ],
    [
        'id' => 3,
        'account_id' => 'Itaú',
        'transaction_date' => '2023-11-14 10:00:00',
        'amount' => 150.00,
        'description' => 'Açõugue',
        'category_id' => 'Doméstico',
        'transaction_type' => 'income'
    ]   
];
@endphp

@foreach ($transactions as $transaction)
    id:{{ $transaction['id']}} <br>
    Conta:{{ $transaction['account_id']}} <br>
    Data da transação:{{ $transaction['transaction_date']}} <br>
    Quantia:{{ $transaction['amount']}} <br>
    Descrição:{{ $transaction['description']}} <br>
    Categoria:{{ $transaction['category_id']}} <br>
    Tipo de transação:{{ $transaction['transaction_type']}} <br><br>
@endforeach
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
</x-app-layout>
