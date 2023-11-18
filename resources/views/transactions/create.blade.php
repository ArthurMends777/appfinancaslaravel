<<<<<<< HEAD
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
=======
<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transações') }} 
        </h2>
    </x-slot>
>>>>>>> fb443372caf806a1d4283f594cf5bb48267aee04
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
<<<<<<< HEAD
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
=======
        <div class="container">
            <div class="row mb-3">
              <div class="col">
                <label class="mb-2" for="transaction_type">Tipo de transação:</label>
             <select class="form-select" id="transaction_type" name="transaction_type" required>
                    <option value="">Selecione o tipo</option>
                    <option value="income">GANHO</option>
                    <option value="expense">GASTO</option>
            </select><br>
              </div>
              <div class="col">
                <label class="mb-2" for="account_id">Conta Bancária:</label>
                <select class="form-select" id="account_id" name="account_id" required>
                    <option value="">Selecione a conta bancária</option>
                    @foreach ($accounts as $account)
                        <option value="{{$account->id}}">{{$account->bank_name}} ({{$account->account_type}})</option>
                    @endforeach
                </select><br>
              </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="mb-2" for="category_id">Categoria:</label>
                    <select class="form-select" id="category_id" name="category_id" required disabled>
                        <option value="">Selecione a categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" data-type="{{$category->transaction_type}}" >{{$category->name}}</option>
                        @endforeach
                    </select><br>
                </div>
                <div class="col">
                     <label class="mb-2" for="transaction_date">Data e hora:</label>
                     <div class="input-group">
                        <input class="form-control" id="transaction_date" type="datetime-local" name="transaction_date" value="{{ now()->format('Y-m-d\TH:i') }}" required><br>
                     </div>      
                </div>
                   <div class="col">
                    <label class="mb-2" for="amount">Valor:</label><br>
                    <div class="input-group">
                        <span class="input-group-text">R$</span>
                        <input class="form-control"  type="number"  id="amount" name="amount" step="0.01" placeholder="Informe o valor" min="0" required><br>
                    </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                    <label class="mb-2" for="description">Descrição:</label><br>
                    <div class="input-group">
                        <textarea class="form-control"  id="description" name="description" rows="5"></textarea><br>
                    </div>
                    <button class="btn btn-dark mt-3" type="submit">Cadastrar</button>
                </div>
                <div class="col">
                </div>
            </div>
        </div>   
    </form>
    
    
    
    
    
    
    
    
    
    <script>
        let selectType = document.getElementById('transaction_type');
        let selectCategory = document.getElementById('category_id');

        selectType.addEventListener('change', function (){
            let selectedType = selectType.value;
            let selectOptions = selectCategory.querySelectorAll('option');
            selectOptions.forEach(option => {
                if(selectedType == ''){
                    selectCategory.disabled = true;
                }
                else if(selectedType == option.dataset.type){
                    option.style.display = 'block';
                    selectCategory.disabled = false;
                }else{
                    option.style.display = 'none';
                    selectCategory.disabled = false;
                }
            });
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    </x-app-layout>
>>>>>>> fb443372caf806a1d4283f594cf5bb48267aee04
