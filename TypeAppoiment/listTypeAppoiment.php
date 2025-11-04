<?php
include_once "../layout/header.php";
include_once "./TypeAppoimentUtility.php";

?>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Acciones</th>
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
            echo "<td>
            <a class='btn btn-secondary' type='button' href='./formTypeAppoiment.php?id=".$type['id']."&action=viewMore'>Ver Más</a>

            <a class='btn btn-primary' type='button' href='./formTypeAppoiment.php?id=".$type['id']."&action=edit'>Editar</a>

            <a class='btn btn-danger' type='button' href='./formTypeAppoiment.php?id=".$type['id']."&action=delete'>Eliminar</a>

            </td>
            </tr>";

        }
    ?>
    
  </tbody>
</table>
<?php
include_once "../layout/footer.php";


?>
