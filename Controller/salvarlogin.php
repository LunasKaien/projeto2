<?php
session_start();
include('conexao2.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM cadastros WHERE cad_email = ?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Direct string comparison
            if ($senha === $row['cad_senha']) {
                $_SESSION['user_id'] = $row['cad_id']; // Assume que você tem um campo 'cad_id' no banco de dados
                header("Location: ../Pages/home.php");
                exit();
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "Nenhum usuário encontrado com esse email.";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Por favor, preencha todos os campos.";
    }

    mysqli_close($link);
}
?>



