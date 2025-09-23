<?php 
session_name('chuletaaa');
session_start();
// Destroi a sessão limpando todos os dados
session_destroy();
// Após a ação a página será redirecionada
$destino    =   "../index.php";
header("Location: $destino");
exit;
?>