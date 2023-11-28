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
        }
        main {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            width: 300px;
            background-color: #fff;
            padding: 30px;
            margin: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container {
            margin-top: 30px;
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
    <x-header />
    <main>
        <form method="POST" action="{{ route('transactions.update', ['id'=>$transaction->id])}}">
            @csrf
            @method('PUT')
            <h1>Transações</h1>
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
            <div class="container">
            <div class="row mb-3 mt-3 align-items-center">
              <div class="col">
                <label class="mb-2" for="transaction_type">Tipo de transação:</label>
                <select class="form-select" id="transaction_type" name="transaction_type" required>
                    <option value="">Selecione o tipo</option>
                    <option value="income" {{$transaction->transaction_type == "income" ? 'selected' : ''}}>GANHO</option>
                    <option value="expense" {{$transaction->transaction_type == "expense" ? 'selected' : ''}}>GASTO</option>
                </select><br>
              </div>
              <div class="col">
                <label class="mb-2" for="account_id">Conta Bancária:</label>
                <select class="form-select" id="account_id" name="account_id" required>
                    <option value="">Selecione a conta bancária</option>
                    @foreach ($accounts as $account)
                        <option  value="{{$account->id}}" {{$transaction->account_id == $account->id ? 'selected' : ''}}>{{$account->bank_name}} ({{$account->account_type}})</option>
                    @endforeach
                </select><br>
              </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label class="mb-2" for="category_id">Categoria:</label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        <option value="">Selecione a categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{$transaction->category_id == $category->id ? 'selected' : ''}} data-type="{{$category->transaction_type}}" >{{$category->name}}</option>
                        @endforeach
                    </select><br>
                </div>
                <div class="col">
                     <label class="mb-2" for="transaction_date">Data e hora:</label>
                     <div class="input-group">
                        <input class="form-control" id="transaction_date" type="datetime-local" name="transaction_date" value="{{ $transaction->transaction_date }}" required><br>
                     </div>      
                </div>
                   <div class="col">
                    <label class="mb-2" for="amount">Valor:</label><br>
                    <div class="input-group">
                        <span class="input-group-text">R$</span>
                        <input class="form-control"  type="number"  id="amount" name="amount" step="0.01" placeholder="Informe o valor" min="0" value="{{$transaction->amount}}" required><br>
                    </div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col">
                    <label class="mb-2" for="description">Descrição:</label><br>
                    <div class="input-group">
                        <textarea class="form-control"  id="description" name="description" rows="5" >{{$transaction->description}}</textarea><br>
                    </div>
                    <button class="btn btn-dark mt-3" type="submit">ATUALIZAR</button>
                </div>
                <div class="col">
                </div>
            </div>
        </div>   
        </form>
    </main>
</body>
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
</html>
