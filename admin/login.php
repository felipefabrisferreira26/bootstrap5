<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");

//iniciar a verificação do login
if($_POST){
    // Defininindo o USE do banco de dados
    mysqli_select_db($conn_produtos,$database_conn);

    // Verificar o login e a senha recebidos
    $login_usuario  =   $_POST['login_usuario'];
    $senha_usuario  =   $_POST['senha_usuario'];

    $verificaSQL    =   "
                        SELECT *
                        FROM    tbusuarios
                        WHERE   login_usuario='$login_usuario'
                        AND     senha_usuario='$senha_usuario';
                        ";
    // Carregar os dados e verificar as linhas
    $lista_session  =   mysqli_query($conn_produtos,$verificaSQL);
    $row_session    =   $lista_session->fetch_assoc();
    $totalRow_session   =   mysqli_num_rows($lista_session);

    // Se a sessão não existir, inicia uma 
    if(!isset($_SESSION)){
        $sessao_antiga  =   session_name("chuletaaa");
        session_start();
        $session_name_new   =   session_name();
        // recupera o nome da atual sessão
    };

    // Carregar informações em uma sessão
    if($totalRow_session>0){
        $_SESSION['login_usuario']  =   $login_usuario;
        $_SESSION['nivel_usuario']  =   $row_session['nivel_usuario'];
        $_SESSION['nome_da_sessao'] =   session_name();
        echo "<script>window.open('index.php','_self')</script>";
    }else{
        echo "<script>window.open('invasor.php','_self')</script>";
    };
};
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Refresh" content="15000;URL=../index.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap 5.3.8 CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/2495680ceb.js" crossorigin="anonymous"></script>
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
</head>
<body class="fundofixo">

<main class="d-flex min-vh-100 align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 d-flex justify-content-center">
                <div class="card border-info shadow-sm login-card pt-2 pb-5 mb-5">
                    <div class="card-header text-center border-info text-info p-0 mt-0">
                        <h1>Faça seu login.</h1>
                    </div> <!-- card-header -->
                    <div class="card-body text-center">
                        <p class="text-info">
                            <i class="fas fa-users fa-10x"></i>
                        </p>

                        <form 
                            action="login.php"
                            name="form_login"
                            id="form_login"
                            method="post"
                            enctype="multipart/form-data"
                            class="mt-3"
                        >
                            <div class="mb-3 text-start">
                                <label for="login_usuario" class="form-label">Login:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-user text-info"></i></span>
                                    <input 
                                        type="text"
                                        name="login_usuario"
                                        id="login_usuario"
                                        class="form-control"
                                        placeholder="Digite seu login."
                                        autofocus
                                        required
                                        autocomplete="off"
                                    >
                                </div>
                            </div>

                            <div class="mb-3 text-start">
                                <label for="senha_usuario" class="form-label">Senha:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-qrcode text-info"></i></span>
                                    <input 
                                        type="password"
                                        name="senha_usuario"
                                        id="senha_usuario"
                                        class="form-control"
                                        placeholder="Digite sua senha."
                                        required
                                    >
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <input type="submit" value="Entrar" class="btn btn-info">
                            </div>
                        </form>

                        <p class="small text-center text-info mt-3">
                            <small>
                                Caso não faça uma escolha em 15 segundos será redirecionado automaticamente para página inicial.
                            </small>
                        </p>
                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div> <!-- col -->
        </div> <!-- row -->
    </div> <!-- container -->
</main>

<!-- Bootstrap 5 JS Bundle (Popper incluído) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
