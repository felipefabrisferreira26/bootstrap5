<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Área Administrativa</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- CSS personalizado -->
  <link rel="stylesheet" href="../css/meu_estilo.css">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body class="fundofixo">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand" href="#"><img src="../imagens/logochurrascopequeno.png" alt="" width="120"></a>

      <!-- Botão mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Itens Navbar -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <!-- ms-auto joga tudo p/ direita -->
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex">

          <!-- Botão usuário -->
          <li class="nav-item me-2 order-1 d-flex">
            <button type="button" class="btn btn-danger disabled me-2">
              Olá, <?php echo($_SESSION['login_usuario']); ?>
            </button>

            <!-- Botões Home e Logout: colados ao lado do usuário no mobile -->
            <div class="d-flex d-lg-none">
              <a href="index.php" class="btn btn-secondary me-2"><i class="bi bi-house-fill"></i></a>
              <a href="logout.php" class="btn btn-secondary"><i class="bi bi-door-open-fill"></i></a>
            </div>
          </li>

          <!-- Itens do menu -->
          <li class="nav-item order-2">
            <a class="nav-link" href="../admin/index.php">ADMIN</a>
          </li>
          <li class="nav-item order-2">
            <a class="nav-link" href="../admin/produtos_lista.php">PRODUTOS</a>
          </li>
          <li class="nav-item order-2">
            <a class="nav-link" href="../admin/">TIPOS</a>
          </li>
          <li class="nav-item order-2">
            <a class="nav-link" href="#">USUÁRIOS</a>
          </li>
        </ul>

        <!-- Botões Home e Logout (só aparecem no desktop, depois do menu) -->
        <div class="d-none d-lg-flex ms-2">
          <a href="index.php" class="btn btn-secondary me-2"><i class="bi bi-house-fill"></i></a>
          <a href="logout.php" class="btn btn-secondary"><i class="bi bi-door-open-fill"></i></a>
        </div>

      </div>
    </div>
  </nav>

  <!-- Bootstrap JS -->
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
