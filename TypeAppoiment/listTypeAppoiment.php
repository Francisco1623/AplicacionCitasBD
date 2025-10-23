<?php
include_once "./TypeAppoimentUtility.php";
include_once "../layout/header.php";

?>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
    </tr>
  </thead>
  <tbody>

    <?php
        try{
          $typesAppoiments = TypeAppoimentUtility::getTypeAppoiment();

        }
        catch (Exception $e){
          echo $e -> getMessage();
          $typesAppoiments=[];

        }
        foreach ($typesAppoiments as $type){
            echo "<tr>";
            echo "<th scope=\"row\">" . $type["id"] . "</th>";
            echo "<td>" . $type["nombre"]. "</td>";
            echo "</tr>";

        }
    ?>
    
  </tbody>
</table>
<?php
include_once "../layout/footer.php";


?>
