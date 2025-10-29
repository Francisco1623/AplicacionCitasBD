<?php
include_once "./AppoimentUtility.php";
include_once "../layout/header.php";

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
          $appoiments = AppoimentUtility::getAppoiments();

        }
        catch (Exception $e){
          echo $e -> getMessage();
          $appoiments=[];

        }
        foreach ($appoiments as $appoiment){
            echo "<tr>";
            echo "<th scope=\"row\">" . $appoiment["id"] . "</th>";
            echo "<td>" . $appoiment["usuario_id"]. "</td>";
            echo "<td>" . $appoiment["tipo_cita_id"]. "</td>";
            echo "<td>" . $appoiment["fecha"]. "</td>";
            echo "<td>" . $appoiment["hora"]. "</td>";
            echo "<td>
            <a href='./formAppoiment.php?id=".$appoiment['id']."&action=delete'>'<button class='btn btn-danger'>Eliminar</button>
            <a href='./formAppoiment.php?id=".$appoiment['id']."&action=edit'>'<button class='btn btn-primary'>Editar</button>
            </td>
            </tr>";

        }
    ?>
    
  </tbody>
</table>
<?php
include_once "../layout/footer.php";


?>
