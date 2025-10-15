# Softsul Code Challenge

Bem vindo(a) ao Gerenciador de pedidos! Uma aplicação web fullstack desenvolvida exclusivamente para o desafio da Softsul.

# Preparando seu ambiente 

Na raiz da pasta do projeto "orders-api", onde está o composer.json, abra um terminal e execute:

```
composer install
```

Crie o arquivo .env a partir do exemplo fornecido:

```
cp .env.example .env
```

Gere a chave única para criptografar dados:

```
php artisan key:generate
```

Crie o banco de dados no SQLite, ou outro SGBD que você estiver usando, e depois rode:

```
php artisan migrate
```

Se quiser também popular o banco com dados de teste utilizando seeds:

```
php artisan db:seed
```

Rode o servidor localmente, executando:

```
php artisan serve
```

Então, basta acessar "http://127.0.0.1:8000" para visualizar a tela da aplicação.

# Considerações finais

Agradeço por essa oportunidade de me juntar ao time da Softsul, pois aprendi muitos conceitos novos no decorrer deste desafio. Sendo assim fico no aguardo do seu feedback da minha aplicação.

Abraços!
