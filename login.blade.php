<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyManager - Login</title>
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

        .links {
            margin-top: 20px;
            text-align: center;
        }

        .links a {
            margin-right: 20px;
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
            <div class="card-header"> Login </div>
            <div class="card-body">
                <form method="POST" action="{{ route('authenticate') }}">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" required autofocus placeholder="Seuemail@email.com">
                    </div>

                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" id="password" name="password" required placeholder="Sua senha">
                    </div>

                    <div class="links">
                        <a href="{{ route('get.register') }}"> Fazer cadastro </a>
                        <a href="#"> Esqueci a senha </a>
                    </div>

                    <button type="submit" class="btn">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>