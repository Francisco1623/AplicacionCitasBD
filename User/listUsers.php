<?php
include_once "../layout/header.php";
include_once "./UserUtility.php";

?>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Acciones</th>

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
            echo "<td>
            <a class='btn btn-secondary' type='button' href='./formUser.php?id=".$user['id']."&action=viewMore'>Ver Más</a>

            <a class='btn btn-primary' type='button' href='./formUser.php?id=".$user['id']."&action=edit'>Editar</a>

            <a class='btn btn-danger' type='button' href='./formUser.php?id=".$user['id']."&action=delete'>Eliminar</a>

            </td>
            </tr>";

        }
    ?>
    
  </tbody>
</table>
<?php
include_once "../layout/footer.php";


?>
