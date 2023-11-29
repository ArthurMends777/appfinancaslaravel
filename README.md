# WebMoneyManager - Sistema de Controle Financeiro

Este é um projeto em Laravel para fazer o seu controle financeiro, permitindo a organização e registro de gastos e ganhos.

## Funcionalidades

- Cadastro de categorias para gastos e ganhos
- Visualização, adição e remoção de categorias
- Registro de transações financeiras associadas às categorias
- Registrar contas bancárias

## Instalação

1. Clone o repositório:

```bash
git clone https://github.com/seu-usuario/web-money-manager.git

2. Instale as dependencias:

cd web-money-manager
composer install

3. Renomeio o arquivo .env-example para .env e faça as configurações de acordo com seu ambiente

4. Gere a chave de aplicação:

php artisan key:generate

5. Execute as migrações para criar as tabelas no banco de dados:

php artisan migrate

6. Inicie o servidor

php artisan serve


Acesse o aplicativo no navegador em http://localhost:8000.



MIT License