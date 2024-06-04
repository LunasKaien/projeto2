<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/login.css">
    <title>Redefinir Senha</title>
</head>
<body>
    <div>
        <form action="../Controller/salvarnovasenha.php" method="POST" autocomplete="off">
            <fieldset>
                <legend><b>Redefinir Senha</b></legend>
                <br>
                <input type="password" name="novaSenha" placeholder="Nova Senha" required>
                <input type="hidden" name="email" value="<?php echo $_SESSION['reset_email']; ?>">
            
                <br><br>
                <button type="submit">Entrar</button>
            </fieldset>
        </form>
    </div>
</body>
</html>
