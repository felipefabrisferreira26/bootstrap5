<?php
// incluindo o Sistema de autenticação
include("acesso_sup.php");

// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");

if($_POST){
    // Definindo o USE do banco de dados
    mysqli_select_db($conn_produtos,$database_conn);

    // Variáveis para acrescentar dados ao banco
    $tabela_insert  =   "tbusuarios";
    $campos_insert  =   "login_usuario, senha_usuario, nivel_usuario";

    // Receber os dados do formulário
    // Organize os campos na mesma ordem
    $login_usuario  =   $_POST['login_usuario'];
    $senha_usuario  =   $_POST['senha_usuario'];
    $nivel_usuario  =   $_POST['nivel_usuario'];

    // Reunir os valores a serem inseridos
    $valores_insert =   "'$login_usuario','$senha_usuario','$nivel_usuario'";

    //Consulta SQL para INSERÇÃO dos dados
    $insertSQL  =   "
                    INSERT INTO ".$tabela_insert."
                        (".$campos_insert.")
                    VALUES
                        (".$valores_insert.");
                    ";
    $resultado     =   $conn_produtos->query($insertSQL);

    // Após a ação a página sera redirecionada
    $destino    =   "usuarios_lista.php";
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
    <title>Usuarios - Insere</title>
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
                Inserindo Usuarios
            </h2>
            <div class="thumbnail">
                <div class="alert alert-info">
                    <form
                        action="usuarios_insere.php" 
                        name="form_usuario_insere" 
                        id="form_usuario_insere" 
                        method="post" 
                        enctype="multipart/form-data" 
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
                                value="Com"
                            >
                            Comum
                        </label>
                        <label for="nivel_usuario_s" class="radio-inline">
                            <input 
                                type="radio"
                                name="nivel_usuario" 
                                id="nivel_usuario" 
                                value="sup" 
                                checked
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

 