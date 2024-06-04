<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/login.css">
    <title>Login</title>
</head>
<body>
    <div>
        <form action="../Controller/salvarlogin.php" method="POST" autocomplete="off">
            <fieldset>
                <legend><b>Login</b></legend>
                <br>
                <input type="email" name="email" placeholder="Email" required>
            
                <br><br>
                <input type="password" name="senha" placeholder="Senha" required>
            
                <br><br>
                <button id="logar">Entrar</button>
                <a href="./cadastro.php" id="cadastrar">Cadastrar</a>
                <br><br>
                <a href="./redefinir_senha.php" id="esqueci_senha">Esqueci minha senha</a>
            </fieldset>
        </form>
    </div>
</body>
</html>

