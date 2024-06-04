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
        <form action="../Controller/redefinirsenha.php" method="POST" autocomplete="off">
            <fieldset>
                <legend><b>Redefinir Senha</b></legend>
                <br>
                <input type="email" name="email" placeholder="Email" required>
            
                <br><br>
                <button type="submit">Enviar</button>
            </fieldset>
        </form>
    </div>
</body>
</html>
