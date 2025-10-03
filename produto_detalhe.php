<?php 
// Incluir arquivo para fazer a conexão
include("Connections/conn_produtos.php");

// Consulta preparada para evitar SQL Injection
$tabela       = "vw_tbprodutos";
$ordenar_por  = "descri_produto ASC";
$campo_filtro = "id_produto";
$filtro_id    = isset($_GET['id_produto']) ? intval($_GET['id_produto']) : 0;

// Preparando consulta
$stmt = $conn_produtos->prepare("
    SELECT * 
    FROM $tabela 
    WHERE $campo_filtro = ? 
    ORDER BY $ordenar_por
");
$stmt->bind_param("i", $filtro_id);
$stmt->execute();
$lista = $stmt->get_result();
$totalRows = $lista->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>

    <!-- Bootstrap 5.3.8 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
        }
        .card img {
            object-fit: cover;
            height: 350px;
        }
        .breadcrumb {
            border-radius: .5rem;
            padding: 1rem;
        }
    </style>
</head>
<body class="container py-4 fundofixo">

    <?php include("menu_publico.php"); ?>

    <?php if($totalRows > 0): ?>
        <?php while($row = $lista->fetch_assoc()): ?>
            
            <h2 class="breadcrumb text-white align-items-center ">
                <a href="javascript:window.history.back()" class="btn btn-danger mt-3 btn-sm">
                    <i class="bi bi-chevron-left"></i> Voltar
                </a>
            </h2>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-lg mb-4">
                        <img 
                            src="imagens/<?php echo $row['imagem_produto']; ?>" 
                            alt="<?php echo $row['descri_produto']; ?>" 
                            class="card-img-top rounded-top"
                        >
                        <div class="card-body text-center">
                            <h3 class="card-title text-danger fw-bold">
                                <?php echo $row['descri_produto']; ?>
                            </h3>
                            <p class="text-warning mb-1">
                                <strong><?php echo $row['rotulo_tipo']; ?></strong>
                            </p>
                            <p class="card-text text-muted">
                                <?php echo $row['resumo_produto']; ?>
                            </p>
                            <p>
                                <span class="badge bg-secondary fs-5 p-2">
                                    R$ <?php echo number_format($row['valor_produto'],2,',','.'); ?>
                                </span>
                            </p>
                            <a href="#" class="btn btn-danger btn-lg">
                                <i class="bi bi-cart-fill"></i> Comprar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="alert alert-warning text-center mt-4">
            Produto não encontrado!
        </div>
    <?php endif; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Ícones do Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</body>
</html>
<?php 
$lista->free();
$stmt->close();
$conn_produtos->close();
?>
