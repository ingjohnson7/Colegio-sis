<?php
include_once'conn.php';
class saveclase extends conn
{
  function __construct()
  {
         $this->save($_POST['maestro'],$_POST['materia'],$_POST['horario']);
  }//end construct



function save($n1, $n2, $n3)
    {
      $C = $this->getCon();

      $codigo = 0;
      $maestro = $n1;
      $materia = $n2;
      $horario = $n3;
      $estudiantes = 0;

      
      $STM = $C->prepare("INSERT INTO clase VALUES (?,?,?,?,?)");
      $STM->bind_param("isssi",
        $id,
        $maestro, 
        $materia,
        $horario, 
        $estudiantes);
      $STM->execute();

      if ($STM->affected_rows > 0) 
      {
        echo "<div class=\"col-sm-12 alert alert-success text-center\" style='float:left;'>
               <strong>La clase se registro</strong></div>";
      }//end if  
      else
      {
        echo "<h3>Error al guardar</h3>";
      }

    }//end save


}//end class

new saveclase();

?>
