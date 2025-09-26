<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Refresh" content="15;URL=../index.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Não autorizado</title>
    <!-- Link arquivos Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/2495680ceb.js" crossorigin="anonymous"></script>
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
    
</head>
<body class="fundofixo">
<main class="container">
    <section>
        <article>
            <div class="row">
                <div class="col-xs-10 col-sm-12 col-md-6 col-lg-4 offset-lg-4 mt-4 mb-4 p-3 border border-danger rounded-3 bg-dark">
                    <h4 class="text-white card text-center bg-danger rounded-3 p-2">Atenção</h4>
                    <div class="card text-center">
                        <span class="fa-7x fa-stack ms-auto me-auto mt-4">
                            <i class="fas fa-user-secret fa-stack-1x"></i>
                            <i class="fas fa-ban text-danger fa-stack-2x"></i>
                        </span>
                        <br>
                        <div class="alert alert-danger" role="alert">
                            <h4>
                                <i class="fas fa-spinner fa-lg fa-pulse"></i>
                                NÃO AUTORIZADO!
                                <br>
                                <br>
                                Solicite acesso ao Supervisor!
                                <br>
                            </h4>
                            <p class="text-danger">
                                <a href="index.php" class="btn btn-danger">
                                    <i class="fas fa-external-link-alt fa-3x fa-rotate-270 p-2"></i>
                                    <br>
                                    Voltar <br> Área Admin
                                </a>
                                <a href="../index.php" class="btn btn-success">
                                    <i class="fas fa-home fa-3x p-2"></i>
                                    <br>
                                    Voltar <br> Área Pública
                                </a>
                            </p>
                            <p>
                                <small>
                                    <br>
                                    Caso não faça uma escolha em 15 segundos será redirecionado automaticamente para página inicial.
                                </small>
                            </p>
                        </div> <!-- Fecha alert -->
                    </div> <!-- Fecha thumbanil -->
                </div> <!-- Fecha dimensionamento -->
            </div> <!-- Fecha row -->
        </article>
    </section>
</main>

    
<!-- Link arquivos Bootstrap js -->        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>