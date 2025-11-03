<?php

require_once ('../layout/header.php');
require_once('./UserUtility.php');

if(isset($_GET['action'])){
    if($_GET['action']=='edit'){
        if($_SERVER['REQUEST_METHOD']=='POST'){
          if(isset($_POST['volver'])){
                echo "<script>window.location.href='./listUsers.php'</script>";

            }else{
              try{
                UserUtility::updateUser($_GET['id'],$_POST['user'],$_POST['password']);
                echo "<script>window.location.href='./listUsers.php'</script>";
              }catch(Exception $e){
                echo $e->getMessage();
                if(isset($_GET['id'])){
                  $userId = UserUtility::getUserById($_GET['id']);
            

                }else{
                    echo "<script>window.location.href='../error.php'</script>";

                }
              }
            
            }
        }else{
            if(isset($_GET['id'])){
              try{
                $userId = UserUtility::getUserById($_GET['id']);
              }catch(Exception $e){
                echo "<script>window.location.href='../error.php'</script>";
                

              }

            }else{
                echo "<script>window.location.href='../error.php'</script>";

            }
        }

    }elseif($_GET['action']=='delete'){
        if($_SERVER['REQUEST_METHOD']=='POST'){
          if(isset($_POST['volver'])){
                echo "<script>window.location.href='./listUsers.php'</script>";

            }else{
            UserUtility::deleteUser($_GET['id']);
            echo "<script>window.location.href='./listUsers.php'</script>";
            }
        }else{
            if(isset($_GET['id'])){
                try{
                $userId = UserUtility::getUserById($_GET['id']);
              }catch(Exception $e){
                echo "<script>window.location.href='../error.php'</script>";
                

              }
            

            }else{
                echo "<script>window.location.href='../error.php'</script>";

            }
        }

    }elseif($_GET['action']=='add'){
        if($_SERVER['REQUEST_METHOD']=='POST'){
          if(isset($_POST['volver'])){
                echo "<script>window.location.href='./listUsers.php'</script>";

            }else{
              try{
                UserUtility::addUser($_POST['user'],$_POST['password']);
                echo "<script>window.location.href='./listUsers.php'</script>";
              }catch(Exception $e){
                echo $e->getMessage();
              }
            
            }
        }else{
           
            $userId = null;
            

           
        }
    }elseif($_GET['action']=='viewMore'){
        if($_SERVER['REQUEST_METHOD']=='POST'){
          if(isset($_POST['volver'])){
                echo "<script>window.location.href='./listUsers.php'</script>";

            }
        }else{
            if(isset($_GET['id'])){
              try{
                $userId = UserUtility::getUserById($_GET['id']);
              }catch(Exception $e){
                echo "<script>window.location.href='../error.php'</script>";
                

              }
            

            }else{
                echo "<script>window.location.href='../error.php'</script>";

            }
        }
    }
}
?>

<form method='POST'>
    <?php if($_GET['action']!='add'): ?>

  <div class="form-group row">
    <label for="identity" class="col-4 col-form-label">Identificador</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card"></i>
          </div>
        </div> 
        <input id="identity" name="identity" type="text" class="form-control" value=<?= $userId['id'] ?> readonly>
      </div>
    </div>
  </div>
          <?php endif;?>

  <div class="form-group row">
    <label for="user" class="col-4 col-form-label">Usuario</label> 
    <div class="col-8">
        <input id="user" name="user" type="text" class="form-control" <?= $_GET['action']!='add' && $_GET['action']!='edit'?'readonly':'';  ?> value='<?= $_GET['action']!='add'?$userId['nombre_usuario']:'';  ?>'>
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-4 col-form-label">Contraseña</label> 
    <div class="col-8">
      <input id="password" name="password" type="text" class="form-control" value=<?= $_GET['action']!='add'?$userId['contrasena']:'' ?> <?= $_GET['action']=='delete' || $_GET['action']=='viewMore'?'disabled':'' ?>>
    </div>
  </div> 
  
  <div class="form-group row"> 
    <div class="offset-4 col-8">
        <?php if($_GET['action']=='delete'):?>
        <button name="submit" type="submit" class="btn btn-danger">Confirmar Eliminación</button>
      <?php elseif($_GET['action']=='edit'): ?>
        <button name="submit" type="submit" class="btn btn-primary">Actualizar</button>
        <?php elseif($_GET['action']=='add'): ?>
        <button name="submit" type="submit" class="btn btn-primary">Añadir</button>

        <?php endif; ?>
        <button name="volver" type="submit" class="btn btn-secondary">Volver</button>

    </div>
  </div>
</form>

<?php
require_once '../layout/footer.php';
?>


?>