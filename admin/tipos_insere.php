<?php
// incluindo o Sistema de autenticação
include("acesso_com.php");
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");

if($_POST){
    // Definindo o USE do banco de dados
    mysqli_select_db($conn_produtos,$database_conn);

    // Variáveis para acrescentar dados ao banco
    $tabela_insert  =   "tbtipos";
    $campos_insert  =   "sigla_tipo,rotulo_tipo";

    // Receber os dados do formulário
    // Organize os campos na mesma ordem
    $sigla_tipo     =   $_POST['sigla_tipo'];
    $rotulo_tipo    =   $_POST['rotulo_tipo'];
    
    // Reunir os valores a serem inseridos
    $valores_insert =   "'$sigla_tipo','$rotulo_tipo'";

    // Consulta SQL para INSERÇÃO dos dados
    $insertSQL      =   "
                        INSERT INTO ".$tabela_insert."
                            (".$campos_insert.")
                        VALUES
                            (".$valores_insert.");
                        ";
    $resultado      =   $conn_produtos->query($insertSQL);

    // Após a ação a página sera redirecionada
    $destino    =   "tipos_lista.php";
    if(mysqli_insert_id($conn_produtos)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };
};
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Link arquivos Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
</head>
<body class="fundofixo">

<?php include("menu_adm.php"); ?>

<main class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 ">
            <h2 class="breadcrumb text-warning">
                <a href="tipos_lista.php">
                    <button class="btn btn-warning">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </button>
                </a>
                Inserindo Tipos
            </h2>
            <div class="thumbnail">
                <div class="alert alert-warning">
                    <form 
                        action="tipos_insere.php"
                        name="form_insere_tipo"
                        id="form_insere_tipo"
                        method="post"
                        enctype="multipart/form-data"
                    >

                        <!-- input text rotulo_tipo -->
                        <label for="rotulo_tipo">Rótulo:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-apple"></span>
                            </span>
                            <input 
                                type="text" 
                                name="rotulo_tipo" 
                                id="rotulo_tipo"
                                class="form-control"
                                maxlength="15"
                                placeholder="Digite o tipo do produto."
                                required
                                autofocus
                            >
                        </div> <!-- fecha input-group -->
                        <!-- fecha input text rotulo_tipo -->
                        <br>
                        <!-- input txt sigla tipo -->
                        <label for="sigla_tipo">Sigla:</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-th-list"></span>
                            </span>
                            <input 
                                type="text" 
                                name="sigla_tipo" 
                                id="sigla_tipo"
                                class="form-control"
                                maxlength="3"
                                placeholder="Digite a sigla do tipo."
                                required
                            >
                        </div> <!-- fecha input-group -->
                        <!-- fecha input txt sigla tipo -->
                        <br>
                        <!-- btn enviar -->
                        <input 
                            type="submit"
                            value="Cadastrar"
                            name="enviar"
                            id="enviar"
                            role="button"
                            class="btn btn-warning btn-block"
                        >
                    </form>
                </div> <!-- fecha alert -->
            </div> <!-- fecha thumbnail -->
        </div> <!-- fecha dimensionamento -->
    </div> <!-- fecha row -->
</main>    
<!-- Link arquivos Bootstrap js -->        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>