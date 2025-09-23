<?php 
include("Connections/conn_produtos.php");

$tabela       = "vw_tbprodutos";
$ordenar_por  = "descri_produto ASC";

$filtro_select = isset($_GET['buscar']) ? $_GET['buscar'] : '';

// ESCAPAR para evitar SQL Injection básica (mas só por segurança mínima)
$filtro_select_esc = $conn_produtos->real_escape_string($filtro_select);

$consulta = "
    SELECT * FROM ".$tabela."
    WHERE descri_produto LIKE '%".$filtro_select_esc."%'
    ORDER BY ".$ordenar_por.";
";

$lista = $conn_produtos->query($consulta);
$row = $lista->fetch_assoc();
$totalRows = $lista->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Produtos</title>

  <!-- Bootstrap 5.3 CSS -->

  <!-- <link href="css/bootstrap.min.css" rel="stylesheet" /> -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>
<body class="fundofixo container">
    <?php include("menu_publico.php"); ?>
    <div class="d-flex flex-column card">
        <?php if ($totalRows == 0) : ?>
            <div class="d-flex align-items-start mb-1">
                <a href="javascript:window.history.go(-1)" class="btn btn-danger mt-3 me-3">
                    <i class="bi bi-chevron-left"></i>
                </a>
                <div>
                    <h2 class="mb-1">
                        Você pesquisou: <i><?php echo htmlspecialchars($filtro_select); ?></i>
                    </h2>
                    <h6 class="text-muted">Em breve os mais deliciosos produtos ao seu dispor!</h6>
                </div>
            </div>
        <?php else: ?>
            <div class="d-flex align-items-center m-1">
                <a href="javascript:window.history.go(-1)" class="btn btn-danger me-3">
                    <i class="bi bi-chevron-left"></i>
                </a>
                <h2 class="mb-0">
                    Você pesquisou: <i><?php echo htmlspecialchars($filtro_select); ?></i>
                </h2>
            </div>
    </div>

    <div class="row g-4 mt-4 mb-4">
        <?php do { ?>
        <div class="col-12 col-sm-6 col-md-4">

            <div class="card h-100">

            <img 
                src="imagens/<?php echo htmlspecialchars($row['imagem_produto']); ?>" 
                alt="<?php echo htmlspecialchars($row['descri_produto']); ?>" 
                class="card-img-top img-fluid"
                style="height: 20em; object-fit: cover;"
            >

                <div class="card-body text-end">

                    <h5 class="card-title text-danger">
                    <strong><?php echo htmlspecialchars($row['descri_produto']); ?></strong>
                    </h5>

                    <p class="card-subtitle mb-2 text-warning">
                    <strong><?php echo htmlspecialchars($row['rotulo_tipo']); ?></strong>
                    </p>

                    <p class="card-text text-start">
                    <?php echo mb_strimwidth(htmlspecialchars($row['resumo_produto']), 0, 38, '...'); ?>
                    </p>

                    <div class="d-flex justify-content-between align-items-center">

                        <button class="btn btn-outline-secondary" disabled>
                            R$ <?php echo number_format($row['valor_produto'], 2, ',', '.'); ?>
                        </button>

                        <a href="produto_detalhe.php?id_produto=<?php echo intval($row['id_produto']); ?>" class="btn btn-danger" role="button">
                            <span class="d-none d-sm-inline">Saiba mais...</span>
                            <span class="d-inline d-sm-none">
                            </svg>
                            </span>
                        </a>

                    </div>

                </div> <!-- fecha card-body -->

            </div> <!-- fecha card -->

        </div> <!-- fecha col -->
        <?php } while ($row = $lista->fetch_assoc()); ?>
<?php endif; ?>
    </div> <!-- fecha row -->
    <footer class="mt-4">
        <?php include("rodape.php"); ?>
    </footer>

</body>

<!-- Bootstrap 5.3 JS Bundle -->
<!-- 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
-->
</html>
<?php mysqli_free_result($lista); ?>
