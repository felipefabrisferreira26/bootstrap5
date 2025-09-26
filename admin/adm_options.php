<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Administrativa</title>
    <!-- Link arquivos Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body class="fundofixo">
<main class="container">
    <h4 class="card text-bg-danger text-center p-2 mt-2 mb-5">Área Administrativa</h4>
    <div class="row"> <!-- manter os elementos na linha -->

                <!-- ADM PRODUTOS -->
        <div class="col-sm-6 col-md-4 mb-4">
        <div class="card h-100 shadow border-0">
            <img src="../imagens/icone_produtos.png" alt="Ícone Produtos" class="card-img-top p-4 img-fluid" style="max-height: 150px; object-fit: contain;">

            <div class="card-body text-center">
            <h5 class="card-title text-danger fw-bold">PRODUTOS</h5>

            <br>
            <br>

            <div class="d-grid gap-2 mt-4">
                <a href="produtos_lista.php" class="btn btn-outline-danger">Listar</a>
                <a href="produtos_insere.php" class="btn btn-danger">Inserir</a>
            </div>
            </div>
        </div>
        </div>

        <!-- FECHA ADM PRODUTOS -->

        <!-- ADM TIPOS -->
        <div class="col-sm-6 col-md-4 mb-4">
        <div class="card h-100 shadow border-0">
            <img src="../imagens/icone_tipos.png" alt="Ícone Tipos" class="card-img-top p-4 img-fluid" style="max-height: 150px; object-fit: contain;">

            <div class="card-body text-center">
            <h5 class="card-title text-warning fw-bold">TIPOS</h5>

            <br>
            <br>

            <div class="d-grid gap-2 mt-4">
                <a href="tipos_lista.php" class="btn btn-outline-warning">Listar</a>
                <a href="tipos_insere.php" class="btn btn-warning">Inserir</a>
            </div>
            </div>
        </div>
        </div>
        <!-- FECHA ADM TIPOS -->
        
        <!-- ADM USUÁRIOS -->
        <div class="col-sm-6 col-md-4 mb-4">
        <div class="card h-100 shadow border-0">
            <img src="../imagens/icone_user.png" alt="Ícone Usuários" class="card-img-top p-4 img-fluid" style="max-height: 150px; object-fit: contain;">

            <div class="card-body text-center">
            <h5 class="card-title text-info fw-bold">USUÁRIOS</h5>

            <br>
            <br>

            <div class="d-grid gap-2 mt-4">
                <a href="usuarios_lista.php" class="btn btn-outline-info">Listar</a>
                <a href="usuarios_insere.php" class="btn btn-info">Inserir</a>
            </div>
            </div>
        </div>
        </div>
        <!-- FECHA ADM USUÁRIOS -->

</main>

    
<!-- Link arquivos Bootstrap js -->        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>