<?php
include_once'conn.php';
class metodos1 extends conn
{
	function getMaterias()
    {
      $c1 = new conn();
      $C = $c1->getCon();
      $STM = $C->query("SELECT Nombre FROM materia ORDER BY Codigo");
      echo "<select name=\"materia\" class=\"form-control\" id=\"materia\">";

      while($row = $STM->fetch_assoc())
      {
        echo "<option>".$row['Nombre']."</option>";

      }//end while
      echo "</select>";
      $STM->close();

    }//end getMaterias


    function getMaestros()
    {
      $c1 = new conn();
      $C = $c1->getCon();
      $STM = $C->query("SELECT concat(Nombre,' ',Apellido) AS NombreF FROM maestro ORDER BY Codigo");
      echo "<select name=\"maestro\" class=\"form-control\" id=\"maestro\">";

      while($row = $STM->fetch_assoc())
      {
        echo "<option>".$row['NombreF']."</option>";

      }//end while
      echo "</select>";
      $STM->close();

    }//end getMaterias


}//end class

?>