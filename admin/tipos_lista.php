<?php
// incluindo o Sistema de autenticação
include("acesso_com.php");
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");
// Selecionar os dados
$consulta   =   "
                SELECT  *
                FROM    tbtipos
                ORDER BY rotulo_tipo ASC;
                ";
// Fazer a lista completa dos dados
$lista  =   $conn_produtos->query($consulta);
// Separar os dados em linhas(row)
$row    =   $lista->fetch_assoc();
// Contar o total de linhas
$totalRows  =   ($lista)->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos - Lista</title>
    <!-- Link arquivos Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
</head>
<body class="fundofixo">

<?php include("menu_adm.php"); ?>

<main class="container">
<div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-4 col-md-4"> <!-- dimensionamento -->
    <h1 class="breadcrumb alert-warning">Lista de Tipos</h1>
    <div class="btn btn-warning disabled">
        Total de tipos:
        <small class="badge"><?php echo $totalRows; ?></small>
    </div>
    <table class="table table-hover table-condensed tbopacidade">
        <!-- thead>tr>th*4 -->
        <thead> <!-- cabeçalho da tabela -->
            <tr>
                <th class="hidden">ID</th> <!-- cabeça a coluna -->
                <th>SIGLA</th>
                <th>RÓTULO</th>
                <th>
                    <a 
                        href="tipos_insere.php"
                        target="_self"
                        class="btn btn-primary btn-xs btn-block"
                    >
                        <span class="hidden-xs">ADICIONAR<br></span>
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                </th>
            </tr>
        </thead>
        <!-- tbody>tr>td*4 -->
        <tbody>
            <!-- Abre estrutura de repetição -->
            <?php do{ ?>
            <tr>
                <td class="hidden"><?php echo $row['id_tipo']; ?></td>
                <td><?php echo $row['sigla_tipo']; ?></td>
                <td><?php echo $row['rotulo_tipo']; ?></td>
                <td>
                    <a 
                        href="tipos_atualiza.php?id_tipo=<?php echo $row['id_tipo']; ?>"
                        target="_self"
                        class="btn btn-warning btn-xs btn-block"
                    >
                        <span class="hidden-xs">ALTERAR<br></span>
                        <span class="glyphicon glyphicon-refresh"></span>
                    </a>
                    <button 
                        class="btn btn-danger btn-xs btn-block delete"
                        data-nome="<?php echo $row['rotulo_tipo']; ?>"
                        data-id="<?php echo $row['id_tipo']; ?>"
                    >
                        <span class="hidden-xs">EXCLUIR<br></span>
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                </td>
            </tr>
            <?php } while ($row = $lista->fetch_assoc()); ?>
            <!-- Fecha estrutura de repetição -->
        </tbody>
    </table>
</div> <!-- fecha dimensionamento -->
</main>
<!-- MODAL -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    &times;
                </button>
                <h4 class="modal-title text-danger">ATENÇÃO!</h4>
            </div> <!-- fecha modal-header -->
            <div class="modal-body">
                Deseja mesmo EXCLUIR o item?
                <h4><span class="nome text-danger"></span></h4>
            </div> <!-- fecha modal-body -->
            <div class="modal-footer">
                <a href="#" type="button" class="btn btn-danger delete-yes">
                    Confirmar
                </a>
                <button class="btn btn-success" data-dismiss="modal">
                    Cancelar
                </button>
            </div> <!-- fecha modal-footer -->
        </div> <!-- fecha modal-content -->
    </div> <!-- fecha modal-dialog -->
</div> <!-- fecha myModal -->
<!-- FECHA MODAL -->

<!-- Link arquivos Bootstrap js -->        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<!-- Script para o Modal -->
<script type="text/javascript">
    $('.delete').on('click',function(){
        var nome    = $(this).data('nome');
        // buscar o valor do atributo data-nome
        var id      = $(this).data('id');
        // buscar o valor do atributo id
        $('span.nome').text(nome);
        // Inserir o nome do item na pergunta de confirmação
        $('a.delete-yes').attr('href','tipos_exclui.php?id_tipo='+id);
        // mudar dinamicamente o id do link no botão confirma
        $('#myModal').modal('show'); // modal abre
    });
</script>    
</body>
</html>
<?php mysqli_free_result($lista); ?>