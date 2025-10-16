<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Promoção</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 420px;
            background: #fff;
            margin: 50px auto;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #555;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }
        input:focus {
            border-color: #4a90e2;
            outline: none;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #4a90e2;
            border: none;
            border-radius: 6px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background .3s;
        }
        button:hover {
            background: #357abd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Formulário de Promoção</h1>
        <form action="/promocao" method="POST">
            @csrf
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" required>


            <label for="endereco">Endereço</label>
            <input type="text" id="endereco" name="endereco" required>


            <label for="cpf">CPF</label>
            <input type="text" id="cpf" name="cpf" required>


            <label for="telefone">Telefone</label>
            <input type="text" id="telefone" name="telefone" required>


            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required>


            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>


