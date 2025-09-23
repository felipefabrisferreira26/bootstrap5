<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/meu_estilo.css">-->
</head>
<body class="fundofixo">
<div style="padding-bottom: 0px; margin-bottom: 0px;">
    <!-- abre o painel principal do rodapé -->
    <div class="row panel-footer" style="background-color: rgba(255,255,255,0.8); padding-bottom: 0px; margin-bottom: 0px;">

        <!-- ÁREA DE LOCALIZAÇÃO -->
        <div class="col-sm-6 col-md-4 mt-3">
            <div class="panel-footer" style="background: none;">
                <img src="imagens/logochurrascopequeno.png" alt="">
                <br>
                <i>O melhor churrasco da região!</i>
                <address>
                    <i>Rua Dom Joaquim, 495 - Centro - Itapetininga - SP - CEP 18200-000</i>
                    <br>
                    <span class="glyphicon glyphicon-phone-alt"></span>
                    &nbsp;Fone: (15) 3511 1200
                    <br>
                    <span class="glyphicon glyphicon-envelope"></span>
                    &nbsp;Email:
                    <a href="mailto:contato@chuletaquente.com.br?subject=Contato&cc=seuemail@mail.com">
                        contato@chuletaquente.com.br
                    </a>
                </address>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3656.3526082987983!2d-48.0574365!3d-23.5916839!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c5cc93b46246ed%3A0x6ec0870ce87bb6fd!2sSenac%20Itapetininga!5e0!3m2!1spt-BR!2sbr!4v1752176594045!5m2!1spt-BR!2sbr" style="border:0;" allowfullscreen=""></iframe>
                </div> <!-- fecha embed-responsive -->

            </div> <!-- fecha panel-footer -->
        </div> <!-- fecha ÁREA DE LOCALIZAÇÃO -->

        <!-- ÁREA DE LINKS -->
        <div class="col-sm-6 col-md-4 row-cols-3 mt-3" >
            <div class="panel-footer" style="background: none;">
                <h4>Links</h4>
                <ul class="nav nav-pills nav-stacked">
                    <li class="mt-3">
                        <a href="index.php#home" class="text-danger">
                            <i class="bi bi-house-fill">&nbsp;Home</i>
                        </a>
                    </li>
                    <li class="mt-3">
                        <a href="index.php#destaques" class="text-danger">
                            <i class="bi bi-award-fill">&nbsp;Destaques</i>
                        </a>
                    </li>
                    <li class="mt-3">
                        <a href="index.php#produtos" class="text-danger">
                            <i class="bi bi-fork-knife">&nbsp;Produtos</i>
                        </a>
                    </li>
                    <li class="mt-3">
                        <a href="index.php#contato" class="text-danger">
                            <i class="bi bi-envelope-fill">&nbsp;Contato</i>
                        </a>
                    </li>
                    <li class="mt-3">
                        <a href="admin/index.php" class="text-danger">
                            <i class="bi bi-person-fill">&nbsp;Administração</i>
                        </a>
                    </li>

                    </ul>

            </div> <!-- fecha panel-footer -->
        </div> <!-- fecha ÁREA DE LINKS -->

        <!-- ÁREA DE CONTATO -->
        <div class="col-sm-6 col-md-4 mt-3">
            <div class="panel-footer" style="background: none;">
                <h4>Contato</h4>
                <form 
                    action="rodape_contato_envia.php" 
                    name="form_contato"
                    id="form_contato"
                    method="post"
                >
                    <!-- INPUT GROUP NOME -->
                    <p>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                                <span class="glyphicon glyphicon-user"></span>
                            </span>
                            <input 
                                type="text"
                                name="nome_contato"
                                id="nome_contato"
                                placeholder="Digite seu nome."
                                aria-describedby="basic-addon1"
                                class="form-control"
                                required
                            >
                        </div> <!-- fecha input-group  -->
                    </p>
                    <!-- CONSTRUA O INPUT GROUP EMAIL email_contato Use glyphicon-envelope -->
                    <p>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon2">
                                <span class="glyphicon glyphicon-envelope"></span>
                            </span>
                            <input 
                                type="email"
                                name="email_contato"
                                id="email_contato"
                                placeholder="Digite seu email."
                                aria-describedby="basic-addon2"
                                class="form-control"
                                required
                            >
                        </div> <!-- fecha input-group  -->
                    </p>
                    <!-- CONSTRUA O TEXTAREA COMENTÁRIOS comentarios_contato Use glyphicon-pencil -->
                    <p>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon3">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </span>
                            <textarea 
                                name="comentarios_contato"
                                id="comentarios_contato"
                                placeholder="Comentários, dúvidas e sugestões."
                                aria-describedby="basic-addon3"
                                class="form-control"
                                required
                                cols="30"
                                rows="5"
                            ></textarea>
                        </div> <!-- fecha input-group  -->
                    </p>
                    <!-- CONSTRUA O BOTÃO ENVIAR Use glyphicon-send -->
                    <p>
                        <button class="btn btn-danger btn-block" aria-label="Enviar">
                            Enviar
                            <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                        </button>
                    </p>     

                </form>

            </div> <!-- fecha panel-footer -->
        </div> <!-- fecha ÁREA DE Contato -->

        <div class="col-sm-12"> <!-- ÁREA DE DESENVOLVEDOR -->
            <div class="panel-footer" style="background: none;">
                <h6 class="text-danger text-center">
                    Developed by Iwanezuk&trade; 2025
                    <br>
                    <a href="https://www.iwanezuk.com.br">
                        www.iwanezuk.com.br
                    </a>
                </h6>

            </div>

        </div> <!-- fecha ÁREA DE DESENVOLVEDOR -->


    </div><!-- fecha o painel principal do rodapé -->
</div> <!-- fecha container do rodapé -->
<!-- Link arquivos Bootstrap js         
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>-->
</body>
</html>