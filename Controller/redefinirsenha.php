<?php
session_start();
include('conexao2.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        // Verificar se o email existe no banco de dados
        $sql = "SELECT * FROM cadastros WHERE cad_email = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            // Se o email existir, redirecione para uma página onde o usuário pode redefinir a senha
            //$_SESSION['reset_email'] = $email;
            $email=urlencode($email);
            header("Location: ../Pages/salvar_novasenha.php?email=$email");
        } else {
            echo "Nenhum usuário encontrado com esse email.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Por favor, preencha o campo de email.";
    }

    mysqli_close($link);
}
?>
