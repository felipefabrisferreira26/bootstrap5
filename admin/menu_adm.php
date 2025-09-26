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
<nav class="container navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
<div class="container">
<img src="../imagens/logochurrascopequeno.png" alt="" width="120">
<!-- Agrupamento MOBILE -->
    <!-- Abre navbar-header -->
    <div class="navbar-header">
        <button 
            class="navbar-toggler" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" 
            aria-expanded="false" 
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
     <!-- fecha navbar-header -->
<!-- Fecha Agrupamento MOBILE -->

<!-- Barra de navegação -->
        <div class="d-flex">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <button type="button" class="btn btn-danger navbar-btn disabled">
                        Olá, <?php echo($_SESSION['login_usuario']); ?>
                    </button>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">ADMIN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produtos_lista.php">PRODUTOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tipos_lista.php">TIPOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="usuarios_lista.php">USUÁRIOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">
                        <span class="glyphicon glyphicon-home"></span>
                    </a>
                </li>
                    <button type="submit" class="me-2 btn btn-secondary" onclick="javascript:location.href='../menu_publico.php'">
                        <i class="bi bi-house-fill"></i>
                    </button>
            </ul>
        </div>
<!-- Fecha barra de navegação -->
</div>
</nav>   
<!-- Link arquivos Bootstrap js         
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>-->
</body>
</html>