<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "cad_loja";

$link = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$link) {
    echo "Falha ao conectar: " . mysqli_connect_error();
    exit;
}
?>
