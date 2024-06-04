<?php
include_once "../Controller/conexao2.php"; // Ajuste o caminho de acordo com a localização do arquivo

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS);
    $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_SPECIAL_CHARS);
    $nascimento = filter_input(INPUT_POST, 'nascimento', FILTER_SANITIZE_SPECIAL_CHARS);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_SPECIAL_CHARS);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS); // Sem hash

    $sql = "INSERT INTO cadastros (cad_nome, cad_email, cad_telefone, cad_genero, cad_nascimento, cad_cidade, cad_estado, cad_endereco, cad_senha) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($link, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssssss", $nome, $email, $telefone, $genero, $nascimento, $cidade, $estado, $endereco, $senha);

        if (mysqli_stmt_execute($stmt)) {
            echo "Cadastro realizado com sucesso!";
            header("Location: ../Pages/login.php");
        } else {
            echo "Erro ao executar: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Erro ao preparar a consulta: " . mysqli_error($link);
    }

    mysqli_close($link);
} else {
    echo "Método de requisição inválido.";
}
?>


