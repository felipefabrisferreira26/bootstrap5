<?php
// incluindo o Sistema de autenticação
include("acesso_com.php");
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");
// Selecionar os dados
$consulta   =   "
                SELECT  *
                FROM    vw_tbprodutos
                ORDER BY descri_produto ASC;
                ";
// Fazer a lista completa dos dados
$lista  =   $conn_produtos->query($consulta);
// Separar os dados da lista em linhas(row)
$row    =   $lista->fetch_assoc();
// Contar o total de linhas
$totalRows  =   ($lista)->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Lista</title>
    <!-- Link arquivos Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
</head>
<body class="fundofixo">
<?php include("menu_adm.php"); ?>
    <main class="container py-4 pb-5">
    <h1 class="alert alert-danger text-center">Lista de Produtos</h1>

    <div class="mb-3">
        <span class="badge bg-danger fs-6">
            Total de produtos: <?php echo $totalRows; ?>
        </span>
        <a href="produtos_insere.php" class="btn btn-primary btn-sm float-end">
            <i class="bi bi-plus-circle me-1"></i> Adicionar
        </a>
    </div>

   <div class="table-responsive">
    <table class="table table-striped align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th class="d-none">ID</th>
                <th>Tipo</th>
                <th>Descrição</th>
                <th class="d-none d-md-table-cell">Resumo</th>
                <th>Valor</th>
                <th class="d-none d-sm-table-cell">Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php do { ?>
            <tr>
                <td class="d-none"><?php echo $row['id_produto']; ?></td>
                <td><?php echo $row['rotulo_tipo']; ?></td>

                <!-- Descrição com quebra de linha -->
                <td class="text-start">
                    <?php if ($row['destaque_produto'] == 'Sim') { ?>
                        <i class="bi bi-heart-fill text-danger me-1"></i>
                    <?php } ?>
                    <?php echo $row['descri_produto']; ?>
                </td>

                <!-- Resumo visível só em desktop, no mobile mostra no modal -->
                <td class="d-none d-md-table-cell text-start">
                    <?php echo $row['resumo_produto']; ?>
                </td>

                <td class="text-nowrap">
                    R$ <?php echo number_format($row['valor_produto'], 2, ',', '.'); ?>
                </td>

                <td class="d-none d-sm-table-cell">
                    <img 
                        src="../imagens/<?php echo $row['imagem_produto']; ?>" 
                        alt=""
                        class="img-thumbnail"
                        style="width: 80px;">
                </td>

                <!-- Ações -->
                <td class="text-nowrap">
                    <!-- ALTERAR com texto no desktop, só ícone no mobile -->
                    <a href="produtos_atualiza.php?id_produto=<?php echo $row['id_produto']; ?>" 
                       class="btn btn-warning btn-sm me-1">
                        <span class="d-none d-lg-inline">ALTERAR</span>
                        <i class="bi bi-pencil-square d-inline d-lg-none"></i>
                    </a>

                    <!-- EXCLUIR com texto no desktop, só ícone no mobile -->
                    <button 
                        class="btn btn-danger btn-sm delete"
                        data-nome="<?php echo $row['descri_produto']; ?>"
                        data-id="<?php echo $row['id_produto']; ?>">
                        <span class="d-none d-lg-inline">EXCLUIR</span>
                        <i class="bi bi-trash-fill d-inline d-lg-none"></i>
                    </button>

                    <!-- Botão info para abrir modal com descrição (somente no mobile) -->
                    <button 
                        class="btn btn-success btn-sm ms-1 d-inline d-md-none"
                        data-bs-toggle="modal"
                        data-bs-target="#descricaoModal"
                        data-nome="<?php echo $row['descri_produto']; ?>"
                        data-resumo="<?php echo $row['resumo_produto']; ?>">
                        <i class="bi bi-info-circle"></i>
                    </button>
                </td>
            </tr>
            <?php } while($row = $lista->fetch_assoc()); ?>
        </tbody>
        
    </table>

    <!-- Modal de descrição -->
<div class="modal fade" id="descricaoModal" tabindex="-1" aria-labelledby="descricaoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-success">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="descricaoModalLabel">Descrição do Produto</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <p><strong>Produto:</strong> <span id="modal-nome" class="text-success"></span></p>
        <p><strong>Resumo:</strong> <span id="modal-resumo" class="text-muted"></span></p>
      </div>
    </div>
  </div>
</div>

</div>

</main>

<!-- MODAL Bootstrap 5 -->
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

<!-- jQuery (necessário para o modal) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Bootstrap Bundle (JS + Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script do modal -->
    <script>
        $('.delete').on('click', function() {
            var nome = $(this).data('nome');
            var id = $(this).data('id');
            $('.nome').text(nome);
            $('.delete-yes').attr('href', 'produtos_exclui.php?id_produto=' + id);
            var myModal = new bootstrap.Modal(document.getElementById('myModal'));
            myModal.show();
        });
    </script>

    <script>
        const descricaoModal = document.getElementById('descricaoModal');
        descricaoModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const nome = button.getAttribute('data-nome');
            const resumo = button.getAttribute('data-resumo');
            document.getElementById('modal-nome').textContent = nome;
            document.getElementById('modal-resumo').textContent = resumo;
        });
    </script>

</body>
</html>
<?php mysqli_free_result($lista); ?>