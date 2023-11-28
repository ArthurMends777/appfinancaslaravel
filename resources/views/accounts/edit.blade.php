<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebMoneyManager - Cadastro de Conta Bancária </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
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
            padding: 20px;
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
        <form method="POST" action="{{ route('accounts.update', ['id'=>$account->id])}}">
            @csrf
            @method('PUT')
            <h3>Cadastro de Conta Bancária</h3>
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
                <div class="row mb-3 mt-3">
                  <div class="col">
                    <label class="mb-2" for="account_type">Tipo de conta:</label>
                 <select class="form-select" id="transaction_type" name="account_type" required>
                        <option value="">Selecione o tipo</option>
                        <option value="CC" {{$account->account_type == "CC" ? 'selected' : ''}}>Conta Corrente - C/C</option>
                        <option value="CP" {{$account->account_type == "CP" ? 'selected' : ''}}>Conta Poupança</option>
                        <option value="CS" {{$account->account_type == "CS" ? 'selected' : ''}}>Conta Salário</option>
                </select><br>
                  </div>
                  
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="mb-2" for="account_name">Titular:</label><br>
                        <div class="input-group">
                            <input class="form-control" value="{{$account->account_name}}" type="text"  id="account_name" name="account_name"  placeholder="Informe o nome do titular da conta" required><br>
                        </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col">
                        <label class="mb-2" for="bank_name">Nome do banco:</label><br>
                        <div class="input-group">
                            <input class="form-control"  value="{{$account->bank_name}}" type="text"  id="bank_name" name="bank_name"  placeholder="Informe o nome do banco" required><br>
                        </div>
                        <button class="btn btn-dark mt-3" type="submit">Atualizar</button>
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
