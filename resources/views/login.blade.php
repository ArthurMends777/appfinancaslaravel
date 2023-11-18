<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyManager - Login</title>
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
            height: 40vh;
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
            margin-top: 20px;
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

        .links {
            display: flex;
            justify-content: space-between;
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