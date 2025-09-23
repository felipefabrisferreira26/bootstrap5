<?php
// incluindo o Sistema de autenticação
include("acesso_sup.php");

// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");

//Váriaveis globais
$tabela     = "tbusuarios";
$campo_filtro   = "id_usuario";

if($_POST){
    // Definindo o USE do banco de dados
    mysqli_select_db($conn_produtos,$database_conn);

    // Receber os dados do formulário
    // Organize os campos na mesma ordem
    $login_usuario   =   $_POST['login_usuario'];
    $senha_usuario    =   $_POST['senha_usuario'];
    $nivel_usuario    =   $_POST['nivel_usuario'];

    // Campo para filtrar o registro (WHERE)
    $filtro_update  =   $_POST['id_usuario'];

    //Consulta SQL para ATUALIZAÇÃO dos dados
    $updateSQL  =   "
                    UPDATE ".$tabela."
                        SET login_usuario   =   '".$login_usuario."',
                        senha_usuario       =   '".$senha_usuario."',
                        nivel_usuario       =   '".$nivel_usuario."'
                    WHERE ".$campo_filtro."= '".$filtro_update."'
                    ";
    $resultado     =   $conn_produtos->query($updateSQL);

    // Após a ação a página sera redirecionada
    $destino    =   "usuarios_lista.php";
    if(mysqli_insert_id($conn_produtos)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };
};


// Consulta para trazer e filtrar os dados
// Definindo o USE do banco de dados
mysqli_select_db($conn_produtos,$database_conn);
$filtro_select  =   $_GET['id_usuario'];
$consulta    =   "
                    SELECT *
                    FROM ".$tabela."
                    WHERE ".$campo_filtro."=".$filtro_select.";
                    ";
$lista   =   $conn_produtos->query($consulta);
$row     =   $lista->fetch_assoc();
$totalRows=  ($lista)->num_rows;    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios - Atualiza</title>
    <!-- Link arquivos Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Link par CSS especifico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
</head>
<body class="fundofixo">

<?php include ("menu_adm.php"); ?>

<main class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 ">
            <h2 class="breadcrumb text-info">
                <a href="usuarios_lista.php">
                    <button class="btn btn-info">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </button>
                </a>
                Atualiza Usuarios
            </h2>
            <div class="thumbnail">
                <div class="alert alert-info">
                    <form
                        action="usuarios_atualiza.php" 
                        name="form_usuario_atualiza" 
                        id="form_usuario_atualiza" 
                        method="post" 
                        enctype="multipart/form-data" 
                    > 
                    <!-- Inserir campo id_usuario OCULTO para uso em filtro -->
                    <input 
                        type="hidden"
                        name="id_usuario"
                        id="id_usuario"
                        value="<?php echo $row['id_usuario']?>"
                    >
                    <!-- input text login_usuario -->
                    <label for="login_usuario">Login</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-user"></span>
                        </span>
                        <input
                            type="text"
                            name="login_usuario"
                            id="login_usuario"
                            class="form-control"
                            maxlength=""
                            placeholder="Digite o seu login."
                            required
                            value="<?php echo $row['login_usuario']?>"
                        >
                    </div> <!-- fecha input-group -->
                    <!-- fecha input text login_usuario -->
                    <br>
                    <label for="senha_usuario">Senha</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-qrcode"></span>
                        </span>
                        <input
                            type="password"
                            name="senha_usuario"
                            id="senha_usuario"
                            class="form-control"
                            maxlength=""
                            placeholder="Digite a senha desejada"
                            required
                            value="<?php echo $row['senha_usuario']?>"
                        >
                    </div><!-- Fecha input group -->
                    <!-- fecha input senha_usuario -->
                    <br>
                        <!-- Radio Destaque produto -->
                    <label for="nivel_usuario">Nivel do Usuario?</label>
                    <div class="input-group"><!-- Abre 2º input-group -->
                        <label for="nivel_usuario_c" class="radio-inline">
                            <input 
                                type="radio" 
                                name="nivel_usuario" 
                                id="nivel_usuario" 
                                value="com"
                                <?php echo $row['nivel_usuario']=="com" ? "checked" : null; ?>
                            >
                            Comum
                        </label>
                        <label for="nivel_usuario_s" class="radio-inline">
                            <input 
                                type="radio"
                                name="nivel_usuario" 
                                id="nivel_usuario" 
                                value="sup" 
                                <?php echo $row['nivel_usuario']=="sup" ? "checked" : null; ?>
                            >
                            Supervisor
                        </label>
                    </div><!-- Fechamento do 2º input-group -->
                    <!-- Fecha radio Destaque produto-->
                    <br>
                    <input 
                    type="submit"
                    value="Cadastrar"
                    name="enviar"
                    id="enviar"
                    class="btn btn-info btn-block"
                >
                </div>
            </div>
        </div>
    </div>    
</main> 
<!-- JavaScript do Bootstrap --> 

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 

<script src="../js/bootstrap.min.js"></script> 

</body> 

</html> 
