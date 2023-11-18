<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dailybook - Cadastro</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #343a40;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            height: 50vh;
            max-width: 400px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            background-color: #e1e6e3;
        }

        .card-header {
            text-align: center;
            font-size: 24px;
            color: #343a40;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            color: #343a40;
            margin-bottom: 8px;
        }

        input {
            width: 90%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            outline: none;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
            color: #0258b5;
        }

        .is-invalid {
            border: 1px solid #dc3545 !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header"> Cadastro </div>
            <div class="card-body">
                <form method="POST" action="{{ route('post.register') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" required autofocus placeholder="Digite seu nome">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" required placeholder="seuemail@email.com">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required placeholder="Sua senha">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">Confirmação de Senha</label>
                        <input type="p assword" id="password-confirm" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" required placeholder="Confirme a senha">
                        @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <a href="{{ route('login') }}">Já tenho login.</a>
                    </div>

                    <button type="submit" class="btn">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
