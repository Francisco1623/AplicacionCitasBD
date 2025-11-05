<?php
include_once "../layout/header.php";
include_once "./AppoimentUtility.php";
?>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Usuario</th>
      <th scope="col">Tipo cita</th>
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
      <th scope="col">Acciones</th>

    </tr>
  </thead>
  <tbody>

    <?php
        try{
          if(isset($_SESSION['role']) && $_SESSION['role']=='ADMIN'){
            $appoiments = AppoimentUtility::getAppoiments();
          }elseif(isset($_SESSION['role']) && $_SESSION['role'] == 'USER'){
            $appoiments = AppoimentUtility::getAppoimentsByUser($_SESSION['id']);

          }else{
            echo "No te has logueado. ";
            echo "<a href='../Login/login.php'>Iniciar Sesión</a>";

            $appoiments = [];
          }
          
        }
        catch (Exception $e){
          echo $e -> getMessage();
          $appoiments=[];

        }
        if(isset($_SESSION['id'])){
          foreach ($appoiments as $appoiment){
            echo "<tr>";
            echo "<th scope=\"row\">" . $appoiment["id"] . "</th>";
            echo "<td>" . $appoiment["nombre_usuario"]. "</td>";
            echo "<td>" . $appoiment["nombre"]. "</td>";
            echo "<td>" . $appoiment["fecha"]. "</td>";
            echo "<td>" . $appoiment["hora"]. "</td>";
            echo "<td>
            <a class='btn btn-secondary' type='button' href='./formAppoiment.php?id=".$appoiment['id']."&action=viewMore'>Ver Más</a>

            <a class='btn btn-primary' type='button' href='./formAppoiment.php?id=".$appoiment['id']."&action=edit'>Editar</a>

            <a class='btn btn-danger' type='button' href='./formAppoiment.php?id=".$appoiment['id']."&action=delete'>Eliminar</a>

            </td>
            </tr>";

        }
      }
        
        
    ?>
    
  </tbody>
</table>
<?php
include_once "../layout/footer.php";


?>
