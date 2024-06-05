<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: ./login.php"); // Redireciona para a página de login se não estiver logado
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../assets/ico/storage-svgrepo-com.svg" type="image/svg">
    <link rel="stylesheet" href="../css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body class="bg-dark">
    <header class="d-flex justify-content-between align-items-center">
        <span class="text-light fs-3">Controle de Estoque</span>
        <nav>
            <ul class="d-flex gap-4 m-0 p-0">
                <li><a href="../index.php" class="btn btn-primary">Cadastrar Produto</a></li>
                <li><a href="./login.php" class="btn btn-danger">Sair</a></li>
            </ul>
        </nav>
    </header>

    <section class="d-flex align-items-center justify-content-around h-100">
        <div>
            <img src="./produtos.png" alt="Armazenamento logo" width="400">
        </div>
        <div>
            <h1 class="text-secondary m-0">
                Sistema de Controle <div class="text-center">de</div> <div class="text-center text-primary">Estoque</div>
            </h1>
        </div>
    </section>
    <footer class="">
        <strong class="text-light">Desenvolvido por:</strong>
        <ul class="d-flex gap-4 m-0 p-0">
            <li><a href="https://github.com/Rosario0202">Lucas do Rosário</a></li>
            <li><a href="https://github.com/LunasKaien">Luiz Nascimento </a></li>
            <li><a href="https://github.com/palomabianchi">Paloma Bianchi</a></li>
        </ul>
    </footer>
</body>
</html>
