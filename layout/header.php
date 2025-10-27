<?php
$url = str_replace($_SERVER['DOCUMENT_ROOT'],'',__DIR__);
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= $url ?> /../index.php">Citas</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?= $url ?> /../Appoiment/listAppoiment.php">Lista Citas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $url ?> /../User/listUsers.php">Lista Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $url ?> /../TypeAppoiment/listTypeAppoiment.php">Lista Tipos de Citas</a>
        </li>
        
    </div>
  </div>
</nav>