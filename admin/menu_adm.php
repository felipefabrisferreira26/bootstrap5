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
</head>
<body class="fundofixo">
<nav class="nav navbar-inverse">
<div class="container-fluid">
    <!-- Agrupamento MOBILE -->
    <div class="navbar-header">
        <button 
            type="button"
            class="navbar-toggle collapsed"
            data-toggle="collapse"
            data-target="#defaultNavbar"
            aria-expanded="false"
        >
            <span class="sr-only">Navegação Mobile</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="index.php" class="navbar-brand">
            <img src="../imagens/logochurrascopequeno.png" alt="">
        </a>
    </div> <!-- fecha navbar-header -->
    <!-- Fecha Agrupamento MOBILE -->

    <!-- Barra de navegação -->
    <div class="collapse navbar-collapse" id="defaultNavbar">
        <ul class="nav navbar-nav navbar-right">
            <li>
                <button type="button" class="btn btn-danger navbar-btn disabled">
                    Olá, <?php echo($_SESSION['login_usuario']); ?>
                </button>
            </li>
            <li class="active"><a href="index.php">ADMIN</a></li>
            <li><a href="produtos_lista.php">PRODUTOS</a></li>
            <li><a href="tipos_lista.php">TIPOS</a></li>
            <li><a href="usuarios_lista.php">USUÁRIOS</a></li>
            <li class="active">
                <a href="../index.php">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li>
                <a href="logout.php">
                    <span class="glyphicon glyphicon-log-out"></span>
                </a>
            </li>
        </ul>
    </div> <!-- fecha defaultNavbar -->
    <!-- Fecha Barra de navegação -->

</div>
</nav>
    
<!-- Link arquivos Bootstrap js         
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>-->
</body>
</html>