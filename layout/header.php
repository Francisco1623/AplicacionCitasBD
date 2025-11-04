<?php
session_start();
$url = str_replace($_SERVER['DOCUMENT_ROOT'],'',__DIR__);
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= $url ?> /../index.php">Citas</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <?php if(isset($_SESSION['role']) && $_SESSION['role']=='ADMIN'):?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Citas
          </a>
          <ul class="dropdown-menu">
            <li class="dropdown-item"><a class="nav-link" href="<?= $url ?> /../Appoiment/listAppoiment.php">Lista Citas</a></li>
            <li class="dropdown-item"><a class="nav-link" href="<?= $url ?> /../Appoiment/formAppoiment.php?action=add">Añadir Cita</a></li>
          </ul>
        </li>
        <?php else:?>
          <li class="dropdown-item"><a class="nav-link" href="<?= $url ?> /../Appoiment/listAppoiment.php">Lista Citas</a></li>

        <?php endif;?>
        
        <?php if(isset($_SESSION['role']) && $_SESSION['role']=='ADMIN'):?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Usuarios
          </a>
          <ul class="dropdown-menu">
            <li class="dropdown-item"><a class="nav-link" href="<?= $url ?> /../User/listUsers.php">Lista Usuarios</a></li>            
            <li class="dropdown-item"><a class="nav-link" href="<?= $url ?> /../User/formUser.php?action=add">Añadir Usuario</a></li>
          </ul>
        </li>
        

        
       
        
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Tipo de Cita
          </a>
          <ul class="dropdown-menu">
            <li class="dropdown-item"><a class="nav-link" href="<?= $url ?> /../TypeAppoiment/listTypeAppoiment.php">Lista Tipos de Citas</a></li>            
            <li class="dropdown-item"><a class="nav-link" href="<?= $url ?> /../TypeAppoiment/formTypeAppoiment.php?action=add">Añadir Tipo de Cita</a></li>
          </ul>
        </li>
        <?php endif;?>
        
    </div>
  </div>
  <div>
        <?php if(isset($_SESSION['role'])):?>
    <div class="d-flex align-items-center gap-2">
      <span><?= htmlspecialchars($_SESSION['nombre']); ?></span>
      
      <a href="<?= $url ?>/../Login/logout.php" class="btn btn-dark ms-5">Cerrar Sesión</a>
    </div>
  <?php else: ?>
    <a href="<?= $url ?>/../Login/login.php" class="btn btn-primary">Iniciar Sesión</a>
  <?php endif; ?>
</div>
</nav>