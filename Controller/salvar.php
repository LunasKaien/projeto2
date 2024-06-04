<?php
    include_once "conexao.php";


    $codigo = filter_input(INPUT_GET, "codigo", FILTER_SANITIZE_SPECIAL_CHARS);
    $nome = filter_input(INPUT_GET, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $validade = filter_input(INPUT_GET, "validade", FILTER_SANITIZE_SPECIAL_CHARS);
    $quantidade = filter_input(INPUT_GET, "quantidade", FILTER_SANITIZE_SPECIAL_CHARS);
    $lote = filter_input(INPUT_GET, "lote", FILTER_SANITIZE_SPECIAL_CHARS);
    $tipo = filter_input(INPUT_GET, "tipo", FILTER_SANITIZE_SPECIAL_CHARS);

    if ($codigo > 0){
        $sql = "UPDATE produtos SET prod_nome ='$nome', prod_validade ='$validade', prod_quantidade ='$quantidade', prod_lote = '$lote', prod_tipo = '$tipo'  where prod_id = $codigo;";
    } else{
        $sql = "INSERT INTO produtos values (null, '$nome', '$validade', '$quantidade', '$lote', '$tipo' );";
    }
    

    $inserir = mysqli_query($link, $sql);
    
    if ($inserir) {
        echo "
            <script>
                alert('Salvo com sucesso!');
                window.location.href = '../index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Erro ao Salvar!');
                window.location.href = '../index.php';
            </script>
        ";
    }
    
    mysqli_close($link);
?>