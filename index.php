<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuleta Quente</title>
</head>
<body class="fundofixo">
    <?php include('menu_publico.php'); ?>
    <a name="home">&nbsp;</a>
    <main class="container">
        <!-- MENU -->
        <?php include('carroussel.php'); ?>

        <!-- DESTAQUES -->
        <a name="destaques">&nbsp;</a>
        <hr>
        <?php include('produtos_destaque.php'); ?>

        <!-- PRODUTOS EM GERAL -->
        <a name="produtos">&nbsp;</a>
        <hr>
        <?php include('produtos_geral.php'); ?>

        <!-- RODAPÉ -->
        <footer class=" pb-auto-xl mb-auto-xl">
            <?php include('rodape.php'); ?>
            <a name="contato">&nbsp;</a>
        </footer>
    </main>   
</body>
</html>