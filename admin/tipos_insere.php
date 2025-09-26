<?php
include("acesso_com.php");
include("../Connections/conn_produtos.php");

if ($_POST) {
    mysqli_select_db($conn_produtos, $database_conn);

    $sigla_tipo = $_POST['sigla_tipo'];
    $rotulo_tipo = $_POST['rotulo_tipo'];

    $insertSQL = "INSERT INTO tbtipos (sigla_tipo, rotulo_tipo) VALUES ('$sigla_tipo', '$rotulo_tipo')";
    $resultado = $conn_produtos->query($insertSQL);

    $destino = "tipos_lista.php";
    header("Location: $destino");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Tipo</title>

    <!-- Bootstrap 5.3.8 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Seu CSS personalizado -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
</head>
<body class="fundofixo">

<?php include("menu_adm.php"); ?>

<main class="container mt-5">
    <div class="col-12 col-md-6 mx-auto">

        <!-- Cabeçalho -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-warning mb-0">Inserir Tipo</h2>
            <a href="tipos_lista.php" class="btn btn-outline-warning btn-sm">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>

        <!-- Formulário -->
        <div class="card shadow">
            <div class="card-body">

                <form action="tipos_insere.php" method="post" id="form_insere_tipo">

                    <!-- Rótulo -->
                    <div class="form-floating mb-3">
                        <input 
                            type="text" 
                            class="form-control" 
                            id="rotulo_tipo" 
                            name="rotulo_tipo" 
                            maxlength="15" 
                            placeholder="Digite o tipo do produto" 
                            required 
                            autofocus>
                        <label for="rotulo_tipo">
                            <i class="bi bi-tag"></i> Rótulo
                        </label>
                    </div>

                    <!-- Sigla -->
                    <div class="form-floating mb-4">
                        <input 
                            type="text" 
                            class="form-control" 
                            id="sigla_tipo" 
                            name="sigla_tipo" 
                            maxlength="3" 
                            placeholder="Digite a sigla do tipo" 
                            required>
                        <label for="sigla_tipo">
                            <i class="bi bi-abbr"></i> Sigla
                        </label>
                    </div>

                    <!-- Botão enviar -->
                    <button type="submit" class="btn btn-warning w-100">
                        <i class="bi bi-check-circle"></i> Cadastrar
                    </button>

                </form>

            </div>
        </div>
    </div>
</main>

<!-- Bootstrap Bundle JS (sem jQuery) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
