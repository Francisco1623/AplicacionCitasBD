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
            echo "</tr>";

        }
    ?>
    
  </tbody>
</table>
<?php
include_once "../layout/footer.php";


?>
