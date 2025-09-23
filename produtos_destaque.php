<?php 
// Inclui a conexão
include("Connections/conn_produtos.php");

// Consulta para trazer os produtos em destaque
$tabela_destaque         = "vw_tbprodutos";
$ordenar_por_destaque    = "descri_produto ASC";
$campo_filtro_destaque   = "destaque_produto";
$filtro_select_destaque  = "Sim";

$consulta_destaque = "
    SELECT * FROM ".$tabela_destaque."
    WHERE ".$campo_filtro_destaque." = '".$filtro_select_destaque."'
    ORDER BY ".$ordenar_por_destaque.";
";

$lista_destaque = $conn_produtos->query($consulta_destaque);
$row_destaque = $lista_destaque->fetch_assoc();
$totalRows_destaque = $lista_destaque->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Destaque</title>

    <!-- Bootstrap CSS 5.3 -->
    <!--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" /> -->
</head>
<body class="fundofixo container">

    <div class="alert alert-danger d-flex align-items-center p-1" role="alert">
    <h2 style="margin-left: 15px; color: red;">Destaques</h2>
</div>

    <div class="row g-5"> <!-- g-4: espaçamento entre colunas e linhas -->

        <?php if ($totalRows_destaque > 0): ?>
            <?php do { ?>

                <div class="col-12 col-md-6 col-lg-4"> <!-- 1 card por linha xs, 2 em sm, 3 md, 4 lg -->

                    <div class="card"> <!-- h-100 para altura igual -->

                        <img 
                            src="imagens/<?php echo htmlspecialchars($row_destaque['imagem_produto']); ?>" 
                            class="card-img-top img-fluid" 
                            alt="<?php echo htmlspecialchars($row_destaque['descri_produto']); ?>" 
                            style="height: 20em; object-fit: cover;"
                        />

                        <div class="card-body text-end"> <!-- text-end ao invés de text-right -->

                            <h5 class="card-title text-danger">
                                <strong><?php echo htmlspecialchars($row_destaque['descri_produto']); ?></strong>
                            </h5>

                            <p class="card-subtitle mb-2 text-warning">
                                <strong><?php echo htmlspecialchars($row_destaque['rotulo_tipo']); ?></strong>
                            </p>

                            <p class="card-text text-start">
                                <?php echo mb_strimwidth(htmlspecialchars($row_destaque['resumo_produto']), 0, 50, '...'); ?>
                            </p>

                            <div class="d-flex justify-content-between align-items-center">

                                <button class="btn btn-default" disabled>
                                    R$ <?php echo number_format($row_destaque['valor_produto'], 2, ',', '.'); ?>
                                </button>

                                <a 
                                    href="produto_detalhe.php?id_produto=<?php echo intval($row_destaque['id_produto']); ?>" 
                                    class="btn btn-danger"
                                    role="button"
                                >
                                    <span class="d-none d-sm-inline">Saiba mais..</span>
                                    <span class="d-inline d-sm-none">Saiba mais..</span>
                                </a>

                            </div>

                        </div> <!-- fecha card-body -->

                    </div> <!-- fecha card -->

                </div> <!-- fecha col -->

            <?php } while ($row_destaque = $lista_destaque->fetch_assoc()); ?>
        <?php else: ?>
            <p>Nenhum produto em destaque encontrado.</p>
        <?php endif; ?>

    </div> <!-- fecha row -->

    <!-- Bootstrap JS Bundle (popper + bootstrap.js) -->
    <!--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->

</body>
</html>

<?php mysqli_free_result($lista_destaque); ?>
