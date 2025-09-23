<?php
// Incluir arquivo para fazer conexão
include("Connections/conn_produtos.php");

// Consulta para trazer dados
$tabela_tipos       =   "tbtipos";
$ordenar_por_tipos  =   "rotulo_tipo";
$consulta_tipos     =   "
                        SELECT  *
                        FROM    ".$tabela_tipos."
                        ORDER BY ".$ordenar_por_tipos.";
                        ";
$lista_tipos        =   $conn_produtos->query($consulta_tipos);
$row_tipos          =   $lista_tipos->fetch_assoc();
$totalRows_tipos    =   ($lista_tipos)->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Público</title>
    <!-- Link arquivos Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="css/meu_estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body class="fundofixo">
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="imagens/logochurrascopequeno.png" alt="Logo Bootstrap" width="120">
            </a>
            <button class="navbar-toggler" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#navbarSupportedContent" 
                    aria-controls="navbarSupportedContent" 
                    aria-expanded="false" 
                    aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Barra de navegação -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#destaques">DESTAQUES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#produtos">PRODUTOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#contato">CONTATO</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            TIPOS
                        </a>
                        <ul class="dropdown-menu">
                                    <!-- abre estrutura de repetição -->
                                    <?php do{ ?> 
                                        <li class="dropdown-item">
                                            <a 
                                                class="text-white text-decoration-none"
                                                href="produtos_por_tipo.php?id_tipo=<?php echo $row_tipos['id_tipo']; ?>"
                                            >
                                                <?php echo $row_tipos['rotulo_tipo']; ?>
                                            </a>
                                        </li>
                                    <?php }while($row_tipos=$lista_tipos->fetch_assoc()); ?>
                                    <!-- fecha estrutura de repetição -->
                            
                            </ul>
                    </li>
                </ul>

                <div class="d-flex">
                    <form 
                            action="produtos_busca.php"
                            method="get"
                            name="form_busca"
                            id="form_busca"
                            class="d-flex"
                            role="search">
                        <input 
                            type="text"
                            class="form-control me-2"  
                            placeholder="Busca produto"
                            name="buscar"
                            id="buscar"
                            size="30"
                            required
                        />
                            <button type="submit" class="me-2 btn btn-danger">
                            <i class="bi bi-search"></i>
                            </button>
                    </form>
                    <button class="btn btn-secondary">
                        <a href="admin/index.php">  
                            <i class="bi bi-person-fill text-white"></i>
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    
<!-- Link arquivos Bootstrap js -->        
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>
<?php mysqli_free_result($lista_tipos); ?>