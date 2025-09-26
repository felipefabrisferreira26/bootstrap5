<?php 
include("acesso_sup.php");
include("../Connections/conn_produtos.php");

$consulta = "SELECT * FROM tbusuarios ORDER BY login_usuario ASC;";
$lista = $conn_produtos->query($consulta);
$row = $lista->fetch_assoc();
$totalRows = $lista->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários - Lista</title>

    <!-- Bootstrap 5.3.8 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- CSS personalizado -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
</head>
<body class="fundofixo">

<?php include("menu_adm.php"); ?>

<main class="container mt-5">
    <div class="col-12 col-md-6 mx-auto">
        <h1 class="alert alert-info text-center">Lista de Usuários</h1>

        <div class="mb-3">
            <span class="badge bg-info fs-6 text-dark">
                Total de usuários: <?php echo $totalRows; ?>
            </span>
            <a href="usuarios_insere.php" class="btn btn-primary btn-sm float-end">
                <i class="bi bi-plus-circle me-1"></i> Adicionar
            </a>
        </div>

        <table class="table table-hover table-bordered bg-light">
            <thead class="table-dark text-center">
                <tr>
                    <th class="d-none">ID</th>
                    <th>LOGIN</th>
                    <th>NÍVEL</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php do { ?>
                <tr>
                    <td class="d-none"><?php echo $row['id_usuario']; ?></td>
                    <td><?php echo $row['login_usuario']; ?></td>
                    <td>
                        <?php 
                        if ($row['nivel_usuario'] == 'sup') {
                            echo '<i class="bi bi-person-gear text-dark me-1" title="Supervisor"></i>';
                        } elseif ($row['nivel_usuario'] == 'com') {
                            echo '<i class="bi bi-person text-info me-1" title="Comum"></i>';
                        }
                        echo $row['nivel_usuario'];
                        ?>
                    </td>
                    <td class="d-flex gap-1">
                        <a href="usuarios_atualiza.php?id_usuario=<?php echo $row['id_usuario']; ?>" class="btn btn-warning btn-sm w-100">
                            <i class="bi bi-pencil-square"></i> <span class="d-none d-sm-inline">Alterar</span>
                        </a>
                        <button 
                            class="btn btn-danger btn-sm w-100 delete" 
                            data-nome="<?php echo $row['login_usuario']; ?>" 
                            data-id="<?php echo $row['id_usuario']; ?>">
                            <i class="bi bi-trash"></i> <span class="d-none d-sm-inline">Excluir</span>
                        </button>
                    </td>
                </tr>
                <?php } while ($row = $lista->fetch_assoc()); ?>
            </tbody>
        </table>
    </div>
</main>

<!-- Modal Bootstrap 5 -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-danger">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="modalLabel">Atenção!</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                Deseja mesmo excluir o item?
                <h5 class="nome text-danger mt-3"></h5>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-danger delete-yes">Confirmar</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Bundle JS (sem jQuery) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script do Modal em JS puro -->
<script>
    document.querySelectorAll('.delete').forEach(button => {
        button.addEventListener('click', function () {
            const nome = this.dataset.nome;
            const id = this.dataset.id;
            document.querySelector('.nome').textContent = nome;
            document.querySelector('.delete-yes').setAttribute('href', 'usuarios_exclui.php?id_usuario=' + id);

            const myModal = new bootstrap.Modal(document.getElementById('myModal'));
            myModal.show();
        });
    });
</script>

</body>
</html>
<?php mysqli_free_result($lista); ?>
