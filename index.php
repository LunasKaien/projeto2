<?php
    include_once "Controller/conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/estilo.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="row align-items-center">
                <div class="col">
                    <h2>Cadastro de Produtos</h2>
                </div>
                <div class="col text-end">
                    <a href="./Pages/home.php" class="btn btn-danger">Retornar</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img src="Pages/produtos.png" alt="" class="img-produto">
            </div>
            <div class="col-8">
                <form method="GET" action="Controller/salvar.php" id="productForm">
                    <div class="mt-3 form-floating">
                        <input type="hidden" class="form-control desabilitado" id="codigo" name="codigo" readonly
                        value="<?php echo filter_input(INPUT_GET, "codigo", FILTER_SANITIZE_SPECIAL_CHARS);?>">
                    </div>
                    <div class="mt-3 form-floating">
                        <input type="text" class="form-control" id="nome" name="nome"
                        value="<?php echo filter_input(INPUT_GET, "nome", FILTER_SANITIZE_SPECIAL_CHARS);?>">
                        <label for="nome" class="form-label">Nome do Produto</label>
                    </div>
                    <div class="mt-3 form-floating">
                        <input type="date" class="form-control" id="validade" name="validade"
                        value="<?php echo filter_input(INPUT_GET, "validade", FILTER_SANITIZE_SPECIAL_CHARS);?>">
                        <label for="validade" class="form-label">Validade</label>
                    </div>
                    <div class="mt-3 form-floating">
                        <input type="number" class="form-control" id="quantidade" name="quantidade"
                        value="<?php echo filter_input(INPUT_GET, "quantidade", FILTER_SANITIZE_SPECIAL_CHARS);?>">
                        <label for="quantidade" class="form-label">Quantidade</label>
                    </div>
                    <div class="mt-3 form-floating">
                        <input type="text" class="form-control" id="lote" name="lote"
                        value="<?php echo filter_input(INPUT_GET, "lote", FILTER_SANITIZE_SPECIAL_CHARS);?>">
                        <label for="lote" class="form-label">Lote</label>
                    </div>
                    <div class="mt-3 form-floating">
                        <input type="text" class="form-control" id="tipo" name="tipo"
                        value="<?php echo filter_input(INPUT_GET, "tipo", FILTER_SANITIZE_SPECIAL_CHARS);?>">
                        <label for="tipo" class="form-label">Tipo de Produto</label>
                    </div>
                    <div class="mt-3 form-floating">
                        <div class="row">
                            <div class="col">
                                <a href="index.php">
                                    <button type="button" class="btn btn-primary form-control botaoLimpar">Limpar
                                    </button>
                                </a>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary form-control botaoSalvar">Salvar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <h2>Produtos Cadastrados</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-dark table-hover text-white">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Validade</th>
                            <th>Quantidade</th>
                            <th>Lote</th>
                            <th>Tipo</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "Select * from produtos";
                            $pesquisar = mysqli_query($link, $sql);
                            while ($linha = $pesquisar->fetch_assoc()) {
                                echo 
                                    "<tr>
                                        <td>".$linha['prod_id']."</td>
                                        <td>".$linha['prod_nome']."</td>
                                        <td>".$linha['prod_validade']."</td>
                                        <td>".$linha['prod_quantidade']."</td>
                                        <td>".$linha['prod_lote']."</td>
                                        <td>".$linha['prod_tipo']."</td>
                                        <td>
                                            <a href='?
                                            codigo=".$linha['prod_id']."&
                                            nome=".$linha['prod_nome']."&
                                            validade=".$linha['prod_validade']."&
                                            quantidade=".$linha['prod_quantidade']."&
                                            lote=".$linha['prod_lote']."&
                                            tipo=".$linha['prod_tipo']."' class='edit-link'>
                                                <img src='Pages/editar.png' class='imgtabela'>
                                            </a>
                                        </td>
                                        <td>
                                            <a href='Controller/excluir.php?codigo=".$linha['prod_id']."' class='delete-link'>
                                                <img src='Pages/excluir.png' class='imgtabela'>
                                            </a>
                                        </td>
                                    </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#productForm').submit(function(event) {
                event.preventDefault();
                Swal.fire({
                    title: 'Você tem certeza?',
                    text: "Você deseja adicionar este produto?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, adicionar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });

            $('.delete-link').on('click', function(event) {
                event.preventDefault();
                var url = $(this).attr('href');
                Swal.fire({
                    title: 'Você tem certeza?',
                    text: "Você deseja excluir este produto?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, excluir!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });

            $('.edit-link').on('click', function(event) {
                event.preventDefault();
                var url = $(this).attr('href');
                Swal.fire({
                    title: 'Você tem certeza?',
                    text: "Você deseja editar este produto?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, editar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });
    </script>
</body>
</html>
