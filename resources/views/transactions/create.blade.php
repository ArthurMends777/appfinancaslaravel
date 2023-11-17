<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
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
        </select><br>
        <label for="account_id">Conta Bancária:</label>
        <select id="account_id" name="account_id" required>
            <option value="">Selecione a conta bancária</option>
            @foreach ($accounts as $account)
                <option value="{{$account->id}}">{{$account->bank_name}} ({{$account->account_type}})</option>
            @endforeach
        </select><br>
        <label for="category_id">Categoria:</label>
        <select id="category_id" name="category_id" required>
            <option value="">Selecione a categoria</option>
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select><br>
        <label for="transaction_date">Data e hora:</label>
        <input id="transaction_date" type="datetime-local" name="transaction_date" value="{{ now()->format('Y-m-d\TH:i') }}" required><br>
        <label for="amount">Valor:</label>
        <input type="number"  id="amount" name="amount" step="0.01" placeholder="Informe o valor" min="0" required><br>
        <label for="description">Descrição:</label><br>
        <textarea id="description" name="description" rows="5"></textarea><br>
        <button type="submit">Cadastrar</button>
    </form>
    
    
    
    
    
    
    
    
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    </x-app-layout>