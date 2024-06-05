<?php
include_once "../Controller/conexao2.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novaSenha = $_POST['novaSenha'];
    $email = $_POST['email'];

    $sql = "UPDATE cadastros SET cad_senha = ? WHERE cad_email = ?";
    
    $stmt = mysqli_prepare($link, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $novaSenha, $email);
        //echo "$novaSenha<br>";
        //echo "$email<br>";
        // exit;
        if (mysqli_stmt_execute($stmt)) {
            echo "
                <link rel='stylesheet' href='https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'>
                <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
                <script src='https://code.jquery.com/ui/1.12.1/jquery-ui.min.js'></script>
                <script>
                    $(document).ready(function() {
                        $('<div title=\"Confirmação\">Senha redefinida com sucesso!</div>').dialog({
                            modal: true,
                            buttons: {
                                Ok: function() {
                                    $(this).dialog('close');
                                    window.location.href = '../Pages/login.php';
                                }
                            }
                        });
                    });
                </script>
            ";
            // header("Location: ../Pages/login.php");
            exit();
        } else {
            echo "Erro ao executar a consulta: " . mysqli_stmt_error($stmt);
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
