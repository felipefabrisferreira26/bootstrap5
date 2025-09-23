<?php 
// Incluir arquivo para fazer a conexão
include("Connections/conn_produtos.php");

// Consulta para trazer os dados e filtrar se necessário
$tabela         =   "vw_tbprodutos";
$ordenar_por    =   "descri_produto ASC";
$campo_filtro   =   "destaque_produto";
$filtro_select  =   "Não";
$consulta       =   "
                    SELECT  *
                    FROM    ".$tabela."
                    WHERE   ".$campo_filtro."='".$filtro_select."'
                    ORDER BY ".$ordenar_por.";
                    ";
$lista          =   $conn_produtos->query($consulta);
$row            =   $lista->fetch_assoc();
$totalRows      =   ($lista)->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <!-- Link arquivos Bootstrap 
    <link rel="stylesheet" href="css/bootstrap.min.css">-->
    <!-- Link para CSS específico 
    <link rel="stylesheet" href="css/meu_estilo.css">-->

</head>
<body class="fundofixo container">
</div> <!-- fecha row -->
    <div class="alert alert-danger d-flex align-items-center p-1" role="alert">
    <h2 style="margin-left: 15px; color: red;">Produtos</h2>
</div>

    <div class="row g-5"> <!-- g-4: espaçamento entre colunas e linhas -->

        <?php if ($totalRows > 0): ?>
            <?php do { ?>

                <div class="col-12 col-md-6 col-lg-4"> <!-- 1 card por linha xs, 2 em sm, 3 md, 4 lg -->

                    <div class="card"> <!-- h-100 para altura igual -->

                        <img 
                            src="imagens/<?php echo htmlspecialchars($row['imagem_produto']); ?>" 
                            class="card-img-top img-fluid" 
                            alt="<?php echo htmlspecialchars($row['descri_produto']); ?>" 
                            style="height: 20em; object-fit: cover;"
                        />

                        <div class="card-body text-end"> <!-- text-end ao invés de text-right -->

                            <h5 class="card-title text-danger">
                                <strong><?php echo htmlspecialchars($row['descri_produto']); ?></strong>
                            </h5>

                            <p class="card-subtitle mb-2 text-warning">
                                <strong><?php echo htmlspecialchars($row['rotulo_tipo']); ?></strong>
                            </p>

                            <p class="card-text text-start">
                                <?php echo mb_strimwidth(htmlspecialchars($row['resumo_produto']), 0, 45, '...'); ?>
                            </p>

                            <div class="d-flex justify-content-between align-items-center">

                                <button class="btn btn-default" disabled>
                                    R$ <?php echo number_format($row['valor_produto'], 2, ',', '.'); ?>
                                </button>

                                <a 
                                    href="produto_detalhe.php?id_produto=<?php echo intval($row['id_produto']); ?>" 
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

            <?php } while ($row = $lista->fetch_assoc()); ?>
        <?php else: ?>
            <p>Nenhum produto em destaque encontrado.</p>
        <?php endif; ?>

    </div"> <!-- fecha row -->
    
<!-- Link arquivos Bootstrap js        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>--> 
</body>
</html>
<?php mysqli_free_result($lista); ?>