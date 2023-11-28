<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dailybook - Cadastro</title>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 15px;
            font-size: 1.5rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        }

        .card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .alert {
            margin-top: 10px;
        }

        .links {
            margin-top: 20px;
            text-align: center;
        }

        .links a {
            text-decoration: none;
            color: #007bff;
            font-size: 0.9rem;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            width: 100%;
            padding: 10px;
            font-size: 1.2rem;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
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
