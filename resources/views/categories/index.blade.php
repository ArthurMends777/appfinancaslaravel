<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorização - WebMoneyManager</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <style>
    </style>
</head>
<body>
    <x-header />

    <div class="container mt-4">
        <h1>Lista de Categorias</h1>
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

        <ul class="list-group">
            @foreach($categories as $category)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>
                        @if(!empty($category->description) && !empty($category->color))
                            {{ $category->name }} ({{ $category->description }} - {{ $category->color }})
                        @else
                            {{ $category->name }}
                        @endif
                    </span>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Remover</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <form action="{{ route('categories.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nova Categoria:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="transaction_type" class="form-label">Tipo:</label>
                <select id="transaction_type" name="transaction_type" class="form-select" required>
                    <option value="income">Ganho</option>
                    <option value="expense">Gasto</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição:</label>
                <input type="text" id="description" name="description" class="form-control">
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Cor:</label>
                <select id="color" name="color" class="form-select" onchange="validateColor()">
                    <option value="">Selecione</option>
                    <option value="vermelho">Vermelho</option>
                    <option value="verde">Verde</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
    </div>

    <script>
        function validateColor() {
            var colorInput = document.getElementById('color');
            var colorValue = colorInput.value.toLowerCase();

            if (colorValue !== 'vermelho' && colorValue !== 'verde') {
                alert('Por favor, escolha entre vermelho ou verde.');
                colorInput.value = ''; // Limpar o valor inválido
            } else {
                // Converter cores para inglês
                if (colorValue === 'vermelho') {
                    colorInput.value = 'red';
                } else if (colorValue === 'verde') {
                    colorInput.value = 'green';
                }
            }
        }
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
