<?php
include("acesso_sup.php");
include("../Connections/conn_produtos.php");

if ($_POST) {
    mysqli_select_db($conn_produtos, $database_conn);

    $login_usuario = $_POST['login_usuario'];
    $senha_usuario = $_POST['senha_usuario'];
    $nivel_usuario = $_POST['nivel_usuario'];

    // Simplesmente salva senha em texto (NÃO recomendado em produção)
    $insertSQL = "
        INSERT INTO tbusuarios 
            (login_usuario, senha_usuario, nivel_usuario)
        VALUES 
            ('$login_usuario', '$senha_usuario', '$nivel_usuario');
    ";
    $conn_produtos->query($insertSQL);
    header("Location: usuarios_lista.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Usuário</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="../css/meu_estilo.css">

    <style>
        .toggle-password {
            cursor: pointer;
            position: absolute;
            right: 1rem;
            top: 0.75rem;
        }
    </style>
</head>
<body class="fundofixo">

<?php include("menu_adm.php"); ?>

<main class="container mt-5">
    <div class="col-12 col-md-8 col-lg-6 mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-info">Inserir Usuário</h2>
            <a href="usuarios_lista.php" class="btn btn-outline-info">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <form 
                    action="usuarios_insere.php" 
                    method="post" 
                    id="form_usuario_insere"
                >

                    <!-- Login -->
                    <div class="form-floating mb-3">
                        <input 
                            type="text" 
                            class="form-control" 
                            name="login_usuario" 
                            id="login_usuario" 
                            placeholder="Digite seu login"
                            maxlength="50"
                            required
                        >
                        <label for="login_usuario">
                            <i class="bi bi-person-fill"></i> Login
                        </label>
                    </div>

                    <!-- Senha com olhinho -->
                    <div class="form-floating mb-3 position-relative">
                        <input 
                            type="password" 
                            class="form-control" 
                            name="senha_usuario" 
                            id="senha_usuario" 
                            placeholder="Digite sua senha" 
                            required
                        >
                        <label for="senha_usuario">
                            <i class="bi bi-lock-fill"></i> Senha
                        </label>
                        <i class="bi bi-eye-slash-fill toggle-password text-secondary" id="toggleSenha"></i>
                    </div>

                    <!-- Nível do Usuário -->
                    <fieldset class="mb-3">
                        <legend class="fs-6 text-secondary">Nível do Usuário</legend>
                        <div class="form-check form-check-inline">
                            <input 
                                class="form-check-input" 
                                type="radio" 
                                name="nivel_usuario" 
                                id="nivel_com" 
                                value="com"
                            >
                            <label class="form-check-label" for="nivel_com">Comum</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input 
                                class="form-check-input" 
                                type="radio" 
                                name="nivel_usuario" 
                                id="nivel_sup" 
                                value="sup" 
                                checked
                            >
                            <label class="form-check-label" for="nivel_sup">Supervisor</label>
                        </div>
                    </fieldset>

                    <!-- Botão -->
                    <button type="submit" name="enviar" class="btn btn-info w-100">
                        <i class="bi bi-person-plus-fill"></i> Cadastrar Usuário
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>

<!-- Bootstrap 5 Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script para mostrar/esconder a senha -->
<script>
document.getElementById('toggleSenha').addEventListener('click', function () {
    const senhaInput = document.getElementById('senha_usuario');
    const icon = this;

    if (senhaInput.type === 'password') {
        senhaInput.type = 'text';
        icon.classList.remove('bi-eye-slash-fill');
        icon.classList.add('bi-eye-fill');
    } else {
        senhaInput.type = 'password';
        icon.classList.remove('bi-eye-fill');
        icon.classList.add('bi-eye-slash-fill');
    }
});
</script>

</body>
</html>
