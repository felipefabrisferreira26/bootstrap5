<?php
include("acesso_com.php");
include("../Connections/conn_produtos.php");

if ($_POST) {
    mysqli_select_db($conn_produtos, $database_conn);

    if (isset($_POST['enviar'])) {
        $nome_img = $_FILES['imagem_produto']['name'];
        $tmp_img = $_FILES['imagem_produto']['tmp_name'];
        $dir_img = "../imagens/" . $nome_img;
        move_uploaded_file($tmp_img, $dir_img);
    }

    $id_tipo_produto = $_POST['id_tipo_produto'];
    $destaque_produto = $_POST['destaque_produto'];
    $descri_produto = $_POST['descri_produto'];
    $resumo_produto = $_POST['resumo_produto'];
    $valor_produto = $_POST['valor_produto'];
    $imagem_produto = $nome_img;

    $insertSQL = "
        INSERT INTO tbprodutos 
            (id_tipo_produto, destaque_produto, descri_produto, resumo_produto, valor_produto, imagem_produto)
        VALUES 
            ('$id_tipo_produto', '$destaque_produto', '$descri_produto', '$resumo_produto', '$valor_produto', '$imagem_produto');
    ";
    $resultado = $conn_produtos->query($insertSQL);
    header("Location: produtos_lista.php");
}

mysqli_select_db($conn_produtos, $database_conn);
$consulta_fk = "SELECT * FROM tbtipos ORDER BY rotulo_tipo ASC;";
$lista_fk = $conn_produtos->query($consulta_fk);
$row_fk = $lista_fk->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Produto</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
    <style>
        #imagem {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
            display: none;
        }
    </style>
</head>
<body class="fundofixo">

<?php include("menu_adm.php"); ?>

<main class="container mt-5">
    <div class="col-12 col-md-8 col-lg-6 mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-danger">Inserir Produto</h2>
            <a href="produtos_lista.php" class="btn btn-outline-danger">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <form action="produtos_insere.php" method="post" enctype="multipart/form-data" id="form_produto_insere">

                    <!-- Tipo -->
                    <div class="mb-3">
                        <label for="id_tipo_produto" class="form-label">Tipo do Produto</label>
                        <select class="form-select" name="id_tipo_produto" id="id_tipo_produto" required>
                            <?php do { ?>
                                <option value="<?= $row_fk['id_tipo']; ?>">
                                    <?= $row_fk['rotulo_tipo']; ?>
                                </option>
                            <?php } while ($row_fk = $lista_fk->fetch_assoc()); ?>
                        </select>
                    </div>

                    <!-- Destaque -->
                    <label class="form-label">Destaque?</label>
                    <div class="mb-3 d-flex gap-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="destaque_produto" id="destaque_sim" value="Sim">
                            <label class="form-check-label" for="destaque_sim">Sim</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="destaque_produto" id="destaque_nao" value="Não" checked>
                            <label class="form-check-label" for="destaque_nao">Não</label>
                        </div>
                    </div>

                    <!-- Descrição -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="descri_produto" name="descri_produto" maxlength="100" placeholder="Descrição do produto" required>
                        <label for="descri_produto"><i class="bi bi-info-circle"></i> Descrição</label>
                    </div>

                    <!-- Resumo -->
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="resumo_produto" id="resumo_produto" style="height: 150px" placeholder="Resumo do produto"></textarea>
                        <label for="resumo_produto"><i class="bi bi-textarea-resize"></i> Resumo</label>
                    </div>

                    <!-- Valor -->
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="valor_produto" id="valor_produto" min="0" step="0.01" placeholder="Valor do produto" required>
                        <label for="valor_produto"><i class="bi bi-currency-dollar"></i> Valor</label>
                    </div>

                    <!-- Imagem -->
                    <div class="mb-3">
                        <label for="imagem_produto" class="form-label">Imagem do Produto</label>
                        <input type="file" class="form-control" name="imagem_produto" id="imagem_produto" accept="image/*" required>
                        <img id="imagem" alt="Preview da imagem">
                    </div>

                    <!-- Botão -->
                    <button type="submit" name="enviar" id="enviar" class="btn btn-danger w-100">
                        <i class="bi bi-check-circle"></i> Cadastrar Produto
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script de preview da imagem -->
<script>
document.getElementById("imagem_produto").addEventListener("change", function () {
    const file = this.files[0];
    const imagem = document.getElementById("imagem");

    if (file) {
        if (file.size > 1024 * 1024) {
            alert("A imagem deve ter no máximo 1MB.");
            this.value = "";
            imagem.style.display = "none";
            return;
        }

        if (!file.type.startsWith("image/")) {
            alert("Formato inválido. Selecione uma imagem.");
            this.value = "";
            imagem.style.display = "none";
            return;
        }

        const reader = new FileReader();
        reader.onload = function (e) {
            imagem.src = e.target.result;
            imagem.style.display = "block";
        };
        reader.readAsDataURL(file);
    }
});
</script>

</body>
</html>
