<?php
include_once "./UserUtility.php";
include_once "../layout/header.php";

?>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Contraseña</th>
    </tr>
  </thead>
  <tbody>

    <?php
        try{
          $users = UserUtility::getUsers();

        }
        catch (Exception $e){
          echo $e -> getMessage();
          $users=[];

        }
        foreach ($users as $user){
            echo "<tr>";
            echo "<th scope=\"row\">" . $user["id"] . "</th>";
            echo "<td>" . $user["nombre_usuario"]. "</td>";
            echo "<td>" . $user["contrasena"]. "</td>";
            echo "</tr>";

        }
    ?>
    
  </tbody>
</table>
<?php
include_once "../layout/footer.php";


?>
