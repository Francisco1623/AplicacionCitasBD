<?php
require_once ('../layout/header.php');
require_once('./AppoimentUtility.php');
require_once('../User/UserUtility.php');
require_once('../TypeAppoiment/TypeAppoimentUtility.php');

/*
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_GET['id'])){
        $appoimentId = AppoimentUtility::getAppoimentById($_GET['id']);

    }else{
            echo "<script>window.location.href='../error.php'</script>";

    }
}else{

}
    */

if(isset($_GET['action'])){
    if($_GET['action']=='edit'){
        if($_SERVER['REQUEST_METHOD']=='POST'){
          if(isset($_POST['volver'])){
                echo "<script>window.location.href='./listAppoiment.php'</script>";

            }else{
            AppoimentUtility::updateAppoiment($_GET['id'],$_POST['user'], $_POST['type'],$_POST['date'],$_POST['time']);
            echo "<script>window.location.href='./listAppoiment.php'</script>";
            }
        }else{
            if(isset($_GET['id'])){
                $appoimentId = AppoimentUtility::getAppoimentById($_GET['id']);
                $listTypeAppoiment = TypeAppoimentUtility::getTypeAppoiment();
                $listUsers = UserUtility::getUsers();
            

            }else{
                    echo "<script>window.location.href='../error.php'</script>";

            }
        }

    }else if($_GET['action']=='delete'){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(isset($_POST['volver'])){
                echo "<script>window.location.href='./listAppoiment.php'</script>";

            }else{
                AppoimentUtility::deleteAppoiment($_GET['id']);
                echo "<script>window.location.href='./listAppoiment.php'</script>";
            }
            
        }else{
            if(isset($_GET['id'])){
                    $appoimentId = AppoimentUtility::getAppoimentById($_GET['id']);
                    $listTypeAppoiment = TypeAppoimentUtility::getTypeAppoiment();
                    $listUsers = UserUtility::getUsers();
                
                }else{
                        echo "<script>window.location.href='../error.php'</script>";

                }
            }
    }else if($_GET['action']=='add'){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(isset($_POST['volver'])){
                echo "<script>window.location.href='./listAppoiment.php'</script>";

            }else{
              AppoimentUtility::addAppoiment($_POST['user'], $_POST['type'],$_POST['date'],$_POST['time']);
              echo "<script>window.location.href='./listAppoiment.php'</script>";
            }
            
        }else{
            $appoimentId = null;
            $listTypeAppoiment = TypeAppoimentUtility::getTypeAppoiment();
            $listUsers = UserUtility::getUsers();
        }

    }else if($_GET['action']=='viewMore'){
         if($_SERVER['REQUEST_METHOD']=='POST'){
            if(isset($_POST['volver'])){
                echo "<script>window.location.href='./listAppoiment.php'</script>";

            }else{
              
            }
        }else{
            $appoimentId = AppoimentUtility::getAppoimentById($_GET['id']);
            $listTypeAppoiment = TypeAppoimentUtility::getTypeAppoiment();
            $listUsers = UserUtility::getUsers();
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
        <input id="identity" name="identity" type="text" class="form-control" value=<?= $appoimentId['id'] ?> readonly>
      </div>
    </div>
  </div>
          <?php endif;?>

  <div class="form-group row">
    <label for="user" class="col-4 col-form-label">Usuario</label> 
    <div class="col-8">
      
      <select id="user" name="user" class="custom-select" <?= $_GET['action']=='delete' || $_GET['action']=='viewMore'?'disabled':'' ?>>
        <?php foreach($listUsers as $user): ?>
            <?php if($_GET['action']!='add'): ?>
                <option value="<?= $user['id'] ?>" <?= $user['nombre_usuario']===$appoimentId['usuario_id']?'selected':''; ?> ><?= $user['nombre_usuario'];  ?></option>
            <?php else: ?>
                <option value="<?= $user['id'] ?>" ><?= $user['nombre_usuario'];  ?></option>
            <?php endif;?>
        <?php endforeach; ?>
      </select>
      
    </div>
  </div>
  <div class="form-group row">
    <label for="user" class="col-4 col-form-label">Tipo Cita</label> 
    <div class="col-8">
      <select id="type" name="type" class="custom-select" <?= $_GET['action']=='delete' || $_GET['action']=='viewMore'?'disabled':'' ?>>
        <?php foreach($listTypeAppoiment as $type): ?>
            <?php if($_GET['action']!='add'): ?>
                <option value="<?= $type['id']  ?>" <?= $type['nombre']==$appoimentId['tipo_cita_id']?'selected':'' ?> ><?= $type['nombre']  ?></option>
            <?php else: ?>
                <option value="<?= $type['id'] ?>" ><?= $type['nombre'];  ?></option>
            <?php endif;?>
        <?php endforeach; ?>
      </select>
      <?php
     
      ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="date" class="col-4 col-form-label">Fecha</label> 
    <div class="col-8">
      <input id="date" name="date" type="text" class="form-control" value=<?= $_GET['action']!='add'?$appoimentId['fecha']:'' ?> <?= $_GET['action']=='delete' || $_GET['action']=='viewMore'?'readonly':'' ?>>
    </div>
  </div>
  <div class="form-group row">
    <label for="time" class="col-4 col-form-label">Hora</label> 
    <div class="col-8">
      <input id="time" name="time" type="text" class="form-control" value=<?= $_GET['action']!='add'?$appoimentId['hora']:'' ?> <?= $_GET['action']=='delete' || $_GET['action']=='viewMore'?'readonly':'' ?>>
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