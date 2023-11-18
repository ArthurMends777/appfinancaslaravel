<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebMoneyManager - Transações </title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            width: 300px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-size: 14px;
            margin-top: 10px;
            display: block;
        }

        select, input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .alert {
            margin-top: 10px;
            padding: 10px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
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
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method="POST" action="{{ route('transactions.store')}}">
        @csrf
        <label for="transaction_type">Tipo de transação:</label>
        <select id="transaction_type" name="transaction_type" required>
            <option value="">Selecione o tipo</option>
            <option value="income">GANHO</option>
            <option value="expense">GASTO</option>
        </select>

        <label for="account_id">Conta Bancária:</label>
        <select id="account_id" name="account_id" required>
            <option value="">Selecione a conta bancária</option>
            @foreach ($accounts as $account)
                <option value="{{$account->id}}">{{$account->bank_name}} ({{$account->account_type}})</option>
            @endforeach
        </select>

        <label for="category_id">Categoria:</label>
        <select id="category_id" name="category_id" required>
            <option value="">Selecione a categoria</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>

        <label for="transaction_date">Data e hora:</label>
        <input id="transaction_date" type="datetime-local" name="transaction_date" value="{{ now()->format('Y-m-d\TH:i') }}" required>

        <label for="amount">Valor:</label>
        <input type="number"  id="amount" name="amount" step="0.01" placeholder="Informe o valor" min="0" required>

        <label for="description">Descrição:</label>
        <textarea id="description" name="description" rows="5"></textarea>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
