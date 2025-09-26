<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Administrativa</title>
    <!-- Link arquivos Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
</head>
<body class="fundofixo">
<main class="container">
    <h1 class="breadcrumb">Área Administrativa</h1>
    <div class="row"> <!-- manter os elementos na linha -->

        <!-- ADM PRODUTOS -->
        <div class="col-sm-6 col-md-4">
            <div class="card alert-danger">
                <img src="../imagens/icone_produtos.png" alt="Ícone Produtos" class="img img-fluid mx-auto d-block mt-3" style="width: 128px; height: 128px;">
                <br>
                <div class="alert-danger">
                    <div class="btn-group btn-group-justified" role="group"><!-- PRINCIPAL -->
                        <div class="btn-group ps-2">
                            <button class="btn btn-default disabled mb-2" style="cursor: default;">
                                PRODUTOS
                            </button>
                        </div> <!-- fecha btn-group -->
                    </div> <!-- fecha btn-group PRINCIPAL -->

                    <div class="btn-group btn-group-justified" role="group"><!-- GRUPO DE BOTÕES -->
                        <div class="btn-group ps-3"> <!-- botão Listar -->
                            <a href="produtos_lista.php">
                                <button class="btn btn-danger mb-2">Listar</button>
                            </a>
                        </div> <!-- fecha btn-group botão Listar-->
                        <div class="btn-group ps-2"> <!-- botão Inserir -->
                            <a href="produtos_insere.php">
                                <button class="btn btn-danger mb-2">Inserir</button>
                            </a>
                        </div> <!-- fecha btn-group botão Inserir-->
                    </div> <!-- fecha btn-group GRUPO DE BOTÕES -->
                </div> <!-- fecha alert-danger -->
            </div> <!-- fecha thumbnail -->
        </div> <!-- fecha dimensionamento -->
        <!-- FECHA ADM PRODUTOS -->

        <!-- ADM TIPOS -->
        <div class="col-sm-6 col-md-4">
            <div class="card alert-warning">
                <img src="../imagens/icone_tipos.png" alt="" class="img img-fluid mx-auto d-block mt-3" style="width: 128px; height: 128px;">
                <br>
                <div class="alert-warning">
                    <div class="btn-group btn-group-justified" role="group"><!-- PRINCIPAL -->
                        <div class="btn-group ps-2">
                            <button class="btn btn-default disabled mb-2" style="cursor: default;">
                                TIPOS
                            </button>
                        </div> <!-- fecha btn-group -->
                    </div> <!-- fecha btn-group PRINCIPAL -->

                    <div class="btn-group btn-group-justified" role="group"><!-- GRUPO DE BOTÕES -->
                        <div class="btn-group ps-3"> <!-- botão Listar -->
                            <a href="tipos_lista.php">
                                <button class="btn btn-warning mb-2">Listar</button>
                            </a>
                        </div> <!-- fecha btn-group botão Listar-->
                        <div class="btn-group ps-2"> <!-- botão Inserir -->
                            <a href="tipos_insere.php">
                                <button class="btn btn-warning mb-2">Inserir</button>
                            </a>
                        </div> <!-- fecha btn-group botão Inserir-->
                    </div> <!-- fecha btn-group GRUPO DE BOTÕES -->
                </div> <!-- fecha alert-danger -->
            </div> <!-- fecha thumbnail -->
        </div> <!-- fecha dimensionamento -->
        <!-- FECHA ADM TIPOS -->

        <!-- Duplique o código e faça os ajustes para criar a área de Usuários -->
        <!-- ADM USUÁRIOS -->
        <div class="col-sm-6 col-md-4">
            <div class="card alert-info">
                <img src="../imagens/icone_user.png" alt="" class="img img-fluid mx-auto d-block mt-3" style="width: 128px; height: 128px;">
                <br>
                <div class="alert-info">
                    <div class="btn-group btn-group-justified" role="group"><!-- PRINCIPAL -->
                        <div class="btn-group ps-2">
                            <button class="btn btn-default disabled mb-2" style="cursor: default;">
                                USUÁRIOS
                            </button>
                        </div> <!-- fecha btn-group -->
                    </div> <!-- fecha btn-group PRINCIPAL -->

                    <div class="btn-group btn-group-justified" role="group"><!-- GRUPO DE BOTÕES -->
                        <div class="btn-group ps-3"> <!-- botão Listar -->
                            <a href="usuarios_lista.php">
                                <button class="btn btn-info mb-2">Listar</button>
                            </a>
                        </div> <!-- fecha btn-group botão Listar-->
                        <div class="btn-group ps-2"> <!-- botão Inserir -->
                            <a href="usuarios_insere.php">
                                <button class="btn btn-info mb-2">Inserir</button>
                            </a>
                        </div> <!-- fecha btn-group botão Inserir-->
                    </div> <!-- fecha btn-group GRUPO DE BOTÕES -->
                </div> <!-- fecha alert-danger -->
            </div> <!-- fecha thumbnail -->
        </div> <!-- fecha dimensionamento -->
        <!-- FECHA ADM USUÁRIOS -->

    </div> <!-- fecha row -->
</main>

    
<!-- Link arquivos Bootstrap js -->        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>