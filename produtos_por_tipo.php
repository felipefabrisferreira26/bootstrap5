<?php 
// Incluir arquivo para fazer a conexão
include("Connections/conn_produtos.php");

// Consulta para trazer os dados e filtrar se necessário
$tabela         =   "vw_tbprodutos";
$ordenar_por    =   "descri_produto ASC";
$campo_filtro   =   "id_tipo_produto";
$filtro_select  =   $_GET['id_tipo'];
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
<body class="fundofixo">
<?php include('menu_publico.php'); ?>
<main class="container">

<!-- Mostrar se os registros retornarem VAZIOS -->
<?php if($totalRows == 0){?>
    <h2 class="breadcrumb alert-danger">
        <a href="javascript:window.history.go(-1)" class="btn btn-danger">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        Em breve os mais deliciosos produtos ao seu dispor!
    </h2>
<?php }; ?>

<!-- Mostrar se os registros NÃO retornarem VAZIOS -->
<?php if($totalRows > 0){?>
<h2 class="breadcrumb alert-danger">
    <a href="javascript:window.history.go(-1)" class="btn btn-danger">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <strong><?php echo $row['rotulo_tipo']; ?></strong>
</h2>

<div class="row"> <!-- manter os elementos na linha -->
    <?php do{ ?> <!-- abre a estrutura de repetição -->
    <!-- Abre thumbnail/Card -->
    <div class="col-sm-6 col-md-4"> <!-- dimensionamento -->
        <div class="thumbnail">
            <img 
                src="imagens/<?php echo $row['imagem_produto']; ?>" 
                alt="" 
                class="img-responsive img-rounded"
                style="height: 20em;"
            >
            <div class="caption text-right">
                <h3 class="text-danger">
                    <strong><?php echo $row['descri_produto']; ?></strong>
                </h3>
                <p class="text-warning">
                    <strong><?php echo $row['rotulo_tipo']; ?></strong>
                </p>
                <p class="text-left">
                    <?php echo mb_strimwidth($row['resumo_produto'],0,38,'...'); ?>
                </p>
                <p>
                    <button class="btn btn-default disabled" role="button">
                        <?php echo number_format($row['valor_produto'],2,',','.'); ?>
                    </button>
                    <a 
                        href="produto_detalhe.php?id_produto=<?php echo $row['id_produto']; ?>" 
                        class="btn btn-danger" 
                        role="button"
                    >
                        <span class="hidden-xs">Saiba mais...</span>
                        <span class="visible-xs glyphicon glyphicon-eye-open"></span>
                    </a>
                </p>
            </div> <!-- fecha caption -->
        </div> <!-- fecha thumbnail -->
    </div> <!-- fecha dimensionamento -->
    <!-- Fecha thumbnail/Card -->
    <?php }while($row=$lista->fetch_assoc()); ?>

</div> <!-- fecha row -->

<?php }; ?> 

    <!-- rodapé -->
    <footer>
        <?php include('rodape.php'); ?>
    </footer>
</main>

<!-- Link arquivos Bootstrap js        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>--> 
</body>
</html>
<?php mysqli_free_result($lista); ?>