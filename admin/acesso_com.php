<?php 
session_name("chuletaaa");

if(!isset($_SESSION)){
    session_start();
};

// Verificar se o usuário está logado na sessão
// Identificar o usuário
if(!isset($_SESSION['login_usuario'])){
    // Se não existir login, destruimos a sessão por segurança
    // Ou redireciona
    header("Location: login.php"); exit;
};

// Verificar o nome da sessão
$nome_da_sessao = session_name();
if(!isset($_SESSION['nome_da_sessao'])OR($_SESSION['nome_da_sessao']!=$nome_da_sessao)){
    // Se não existir login, destruimos a sessão por segurança
    // Ou redireciona
    session_destroy();
    header("Location: login.php"); exit;
};

// Verificar se o Login é válido
if(!isset($_SESSION['login_usuario'])){
    // Se não existir login, destruimos a sessão por segurança
    // Ou redireciona
    session_destroy();
    header("Location: login.php"); exit;
};

?>