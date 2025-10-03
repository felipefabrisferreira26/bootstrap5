<?php 
// Incluir arquivo para fazer a conexão
include("Connections/conn_produtos.php");

// Consulta para trazer os dados e filtrar se necessário
$tabela         =   "vw_tbprodutos";
$ordenar_por    =   "descri_produto ASC";
$campo_filtro   =   "id_produto";
$filtro_select  =   $_GET['id_produto'];
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
<?php include("menu_publico.php"); ?>
<h2 class="breadcrumb alert-danger">
    <a href="javascript:window.history.go(-1)" class="btn btn-danger">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <strong><?php echo $row['descri_produto']; ?></strong>
</h2>
<div class="row"> <!-- manter os elementos na linha -->
    <?php do{ ?> <!-- abre a estrutura de repetição -->
    <!-- Abre thumbnail/Card -->
    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2"> <!-- dimensionamento -->
        <div class="thumbnail">
            <img 
                src="imagens/<?php echo $row['imagem_produto']; ?>" 
                alt="" 
                class="img-responsive img-rounded"
                style="height: 30em;"
            >
            <div class="caption text-right">
                <h3 class="text-danger">
                    <strong><?php echo $row['descri_produto']; ?></strong>
                </h3>
                <p class="text-warning">
                    <strong><?php echo $row['rotulo_tipo']; ?></strong>
                </p>
                <p class="text-left">
                    <?php echo $row['resumo_produto']; ?>
                </p>
                <p>
                    <button class="btn btn-default disabled" role="button">
                        <?php echo number_format($row['valor_produto'],2,',','.'); ?>
                    </button>
                </p>
            </div> <!-- fecha caption -->
        </div> <!-- fecha thumbnail -->
    </div> <!-- fecha dimensionamento -->
    <!-- Fecha thumbnail/Card -->
    <?php }while($row=$lista->fetch_assoc()); ?>

</div> <!-- fecha row -->
    
<!-- Link arquivos Bootstrap js        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>--> 
</body>
</html>
<?php mysqli_free_result($lista); ?>