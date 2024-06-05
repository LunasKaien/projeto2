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

            if ($senha === $row['cad_senha']) {
                $_SESSION['user_id'] = $row['cad_id'];
                header("Location: ../Pages/home.php");
                exit();
            } else {
                // Senha incorreta
                echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">';
                echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
                echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>';
                echo '<script>';
                echo '$(function() {';
                echo '$("#dialog-message").dialog({';
                echo 'modal: true,';
                echo 'buttons: {';
                echo '"OK": function() {';
                echo '$( this ).dialog( "close" );';
                echo '}';
                echo '}';
                echo '});';
                echo '});';
                echo '</script>';
                echo '<div id="dialog-message" title="Erro">';
                echo '<p><span class="ui-icon ui-icon-alert" style="float:left; margin-right: .3em;"></span>Senha incorreta.</p>';
                echo '</div>';
            }
        } else {
            // Email incorreto
            echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">';
            echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
            echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>';
            echo '<script>';
            echo '$(function() {';
            echo '$("#dialog-message").dialog({';
            echo 'modal: true,';
            echo 'buttons: {';
            echo '"OK": function() {';
            echo '$( this ).dialog( "close" );';
            echo '}';
            echo '}';
            echo '});';
            echo '});';
            echo '</script>';
            echo '<div id="dialog-message" title="Erro">';
            echo '<p><span class="ui-icon ui-icon-alert" style="float:left; margin-right: .3em;"></span>Email incorreto.</p>';
            echo '</div>';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Por favor, preencha todos os campos.";
    }

    mysqli_close($link);
}
?>