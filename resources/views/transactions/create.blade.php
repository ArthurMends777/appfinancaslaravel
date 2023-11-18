<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transações') }} 
        </h2>
    </x-slot>
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