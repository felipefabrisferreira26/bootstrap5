<?php 
// incluindo o Sistema de autenticação
include("acesso_sup.php");

include("../Connections/conn_produtos.php");
$consulta   =   "
                SELECT *
                FROM tbusuarios
                ORDER BY login_usuario ASC;
                ";
$lista  =   $conn_produtos->query($consulta);
$row    =   $lista->fetch_assoc();
$totalRows  =   ($lista)->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários - Lista</title>

    <!-- Link arquivos Bootstrap -->
     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <!-- Link para CSS específico -->
      <link rel="stylesheet" href="../css/meu_estilo.css">

</head>
<body class="fundofixo">

<?php include ("menu_adm.php"); ?>

    <main class="container">
        <div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6">
        <h1 class="breadcrumb alert-info">Lista de Usuários</h1>
        <div class="btn btn-info disabled">
            Total de Usuários: 
            <small class="badge"><?php echo $totalRows; ?></small>
        </div>
        <table class="table table-hover table-condensed tbopacidade">
            <thead>
                <tr>
                    <th class="hidden">ID</th>
                    <th>LOGIN</th>
                    <th>NÍVEL</th>
                    <th>
                        <a 
                        href="usuarios_insere.php"
                        target="_self"
                        class="btn btn-primary btn-xs btn-block"
                        >
                        <span class="hidden-xs">ADICIONAR<br></span>
                        <span class="glyphicon glyphicon-plus"></span>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                 <?php do{ ?>
                <tr>
                    <td class="hidden"><?php echo $row['id_usuario']; ?></td>
                    <td><?php echo $row['login_usuario']; ?></td>
                    <td>
                        <?php 
                        if($row['nivel_usuario']=='sup'){
                            echo ('<span class="glyphicon glyphicon-sunglasses text-default"></span>');
                        }else if($row['nivel_usuario']=='com'){
                            echo ('<span class="glyphicon glyphicon-user text-info"></span>');
                        }; ?>
                        <?php echo $row['nivel_usuario']; ?>
                    </td>
                    <td>
                        <a 
                        href="usuarios_atualiza.php?id_usuario=<?php echo $row['id_usuario']; ?>"
                        target="_self"
                        class="btn btn-warning btn-xs btn-block"
                        >
                        <span class="hidden-xs">ALTERAR<br></span>
                        <span class="glyphicon glyphicon-refresh"></span>
                        </a>

                        <button 
                        class="btn btn-danger btn-xs btn-block delete"
                        data-nome="<?php echo $row['login_usuario']; ?>"
                        data-id="<?php echo $row['id_usuario']; ?>"
                        >
                        <span class="hidden-xs">EXCLUIR<br></span>
                        <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </td>
                </tr>
                <?php } while ($row = $lista->fetch_assoc()); ?>
            </tbody>
        </table>
        </div>
    </main> 
    
    <!-- Abre MODAL -->
     <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog"> <!-- Abre dialog -->
            <div class="modal-content"> <!-- Abre content -->

                <div class="modal-header"> <!-- Abre header -->
                    <button type="button" class="close" data-dismiss="modal">
                        &times;
                    </button>
                    <h4 class="modal-title text-danger">ATENÇÃO</h4>
                </div> <!-- Fecha header --> 

                <div class="modal-body"> <!-- Abre body -->
                    Deseja mesmo EXCLUIR o item?
                    <h4><span class="nome text-danger"></span></h4>
                </div> <!-- Fecha body -->

                <div class="modal-footer"> <!-- Abre footer -->
                    <a href="#" type="button" class="btn btn-danger delete-yes">Confirmar</a>
                    <button class="btn btn-success" data-dismiss="modal">Cancelar</button>
                </div> <!-- Fecha footer -->
                    
            </div> <!-- Fecha content -->
        </div> <!-- Fecha dialog -->
     </div>
    <!-- Fecha MODAL -->

    <!-- Link arquivos Bootstrap js -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
     <script src="../js/bootstrap.min.js"></script>

     <script type="text/javascript">
        $('.delete').on('click',function(){
            var nome    =$(this).data('nome');
            // Buscar o valor do atributo data-nome
              var id    =$(this).data('id');
            // Buscar o valor do atributo id
            $('span.nome').text(nome);
            // Inserir o nome do item na pergunta de confirmação
            $('a.delete-yes').attr('href','usuarios_exclui.php?id_usuario='+id);
            // Mudar dinamicamente o id do link no botão confirma
            $('#myModal').modal('show');// Modal abre
        });
     </script>

</body>
</html>
<?php mysqli_free_result($lista); ?>