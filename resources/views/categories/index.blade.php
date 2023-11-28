<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorização - WebMoneyManager</title>
    <style>

    </style>
</head>
<body>
    <x-header />

    <div class="container">
        <h1>Lista de Categorias</h1>

        <ul>
            @foreach($categories as $category)
                <li>
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
                        <button type="submit">Remover</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <label for="name">Nova Categoria:</label>
            <input type="text" id="name" name="name" required>
            <label for="transaction_type">Tipo:</label>
            <select id="transaction_type" name="transaction_type" required>
                <option value="income">Ganho</option>
                <option value="expense">Gasto</option>
            </select>
            <label for="description">Descrição:</label>
            <input type="text" id="description" name="description">
            <label for="color">Cor:</label>
            <select id="color" name="color" onchange="validateColor()">
                <option value="">Selecione</option>
                <option value="vermelho">Vermelho</option>
                <option value="verde">Verde</option>
            </select>
            <button type="submit">Adicionar</button>
        </form>
    </div>
</body>
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
</html>
