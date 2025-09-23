<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação do Contato</title>
</head>
<body class="fundofixo">
<?php include('menu_publico.php'); ?>

<main class="container">
    <section>
        <div class="jumbotron alert-danger">
            <h1>Agradecemos seu contato!</h1>
            <?php
                $destino        =   "contato@chuletaquente.com.br";
                $nome_contato   =   $_POST['nome_contato'];
                $email_contato  =   $_POST['email_contato'];
                $msg_contato    =   "Mensagem de:".$_POST['nome_contato']."\n".$_POST['comentarios_contato'];
                $mailsend       =   mail($destino,"Formulário de comentários",$msg_contato,"From:",$email_contato);
            ?>
            <p>Obrigado por enviar seus comentários, <b><?php echo $nome_contato; ?></b></p>
            <p>Mensagem enviada com sucesso!</p>
            <h5>Caso não visualize a mensagem de agradecimento, entre em contato
                através do email <b><i><?php echo $destino; ?></i></b>
            </h5>
        </div> <!-- jumbotron -->
    </section>
    <!-- rodapé -->
    <footer>
        <?php include('rodape.php'); ?>
    </footer>
</main>
</body>
</html>