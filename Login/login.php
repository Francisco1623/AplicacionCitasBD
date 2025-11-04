<?php
require_once ('../layout/header.php');
require_once('./LoginUtility.php');


if($_SERVER['REQUEST_METHOD']=='POST'){

    if(isset($_POST['volver'])){
        echo "<script>window.location.href='../index.php'</script>";
    }else{
        try{
            $userId = LoginUtility::getUserByLogin($_POST['user'],$_POST['password']);
            $_SESSION['role']= $userId['role'];
            $_SESSION['nombre'] = $userId['nombre_usuario'];
            $_SESSION['id'] = $userId['id'];
        echo "<script>window.location.href='../index.php'</script>";

        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}

?>

<form method='POST'>

  <div class="form-group row">
    <label for="user" class="col-4 col-form-label">Usuario</label> 
    <div class="col-8">
        <input id="user" name="user" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-4 col-form-label">Contraseña</label> 
    <div class="col-8">
      <input id="password" name="password" type="text" class="form-control" >
    </div>
  </div> 
  
  <div class="form-group row"> 
    <div class="offset-4 col-8">
        <button name="submit" type="submit" class="btn btn-primary">Entrar</button>
        <button name="volver" type="submit" class="btn btn-secondary">Volver</button>
    </div>
  </div>
</form>

<?php
require_once '../layout/footer.php';
?>