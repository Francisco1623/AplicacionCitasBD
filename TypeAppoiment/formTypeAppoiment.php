<?php
require_once ('../layout/header.php');
require_once('./TypeAppoimentUtility.php');


if(isset($_GET['action'])){
    if($_GET['action']=='viewMore'){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(isset($_POST['volver'])){
                echo "<script>window.location.href='./listTypeAppoiment.php'</script>";

            }
        }else{
            if(isset($_GET['id'])){
                try{
                    $typeId = TypeAppoimentUtility::getTypeById($_GET['id']);
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
                echo "<script>window.location.href='./listTypeAppoiment.php'</script>";

            }else{
                try{
                    TypeAppoimentUtility::deleteType($_GET['id']);
                    echo "<script>window.location.href='./listTypeAppoiment.php'</script>";

                }catch(Exception $e){
                    echo $e->getMessage();
                }
            }
        }else{
            if(isset($_GET['id'])){
                try{
                    $typeId = TypeAppoimentUtility::getTypeById($_GET['id']);

                }catch(Exception $e){
                    echo "<script>window.location.href='../error.php'</script>";

                }
            }else{
                echo "<script>window.location.href='../error.php'</script>";

            }
            
        }
    }elseif($_GET['action']=='edit'){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(isset($_POST['volver'])){
                echo "<script>window.location.href='./listTypeAppoiment.php'</script>";

            }else{
                try{
                    TypeAppoimentUtility::updateType($_GET['id'],$_POST['type']);
                    echo "<script>window.location.href='./listTypeAppoiment.php'</script>";

                }catch(Exception $e){
                    echo $e->getMessage();
                    $typeId = TypeAppoimentUtility::getTypeById($_GET['id']);

                }
            }
        }else{
            if(isset($_GET['id'])){
                try{
                    $typeId = TypeAppoimentUtility::getTypeById($_GET['id']);

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
                echo "<script>window.location.href='./listTypeAppoiment.php'</script>";

            }else{
                try{
                    TypeAppoimentUtility::addType($_POST['type']);
                    echo "<script>window.location.href='./listTypeAppoiment.php'</script>";

                }catch(Exception $e){
                    echo $e->getMessage();
                }
            }
        }else{
           $typeId = null;
            
        }

    }else{
        echo '<p>La acción no es válida</p>';

    }

  }else{
  echo '<p>No se encuentra la acción</p>';
}


?>
<?php if(isset($_GET['action']) && !empty($_GET['action'])): ?>
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
        <input id="identity" name="identity" type="text" class="form-control" value=<?= $typeId['id'] ?> readonly>
      </div>
    </div>
  </div>
          <?php endif;?>

  <div class="form-group row">
    <label for="type" class="col-4 col-form-label">Tipo de Cita</label> 
    <div class="col-8">
        <input id="type" name="type" type="text" class="form-control" <?= $_GET['action']!='add' && $_GET['action']!='edit'?'readonly':'';  ?> value='<?= $_GET['action']!='add'?$typeId['nombre']:'';  ?>'>
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
<?php endif; ?>

<?php
include_once "../layout/footer.php";


?>