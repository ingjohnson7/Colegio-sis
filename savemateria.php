<?php
include_once'conn.php';
class savemateria extends conn
{
  function __construct()
  {
         $this->save($_POST['nom'],$_POST['codigo'],$_POST['curso']);
  }//end construct



function save($n1, $n2, $n3)
    {
      $C = $this->getCon();

        $nombre = $n1;
        $codigo = $n2; 
        $curso = $n3;

      $STM = $C->prepare("INSERT INTO materia VALUES(?,?,?)");
      $STM->bind_param("sss",
        $nombre,
        $codigo,
        $curso);

      $STM->execute();

      if ($STM->affected_rows > 0) 
      {
           echo "<div class=\"col-sm-12 alert alert-success text-center\" style='float:left;'>
               <strong>La materia se registro</strong></div>";
           $STM->close();
      }//end if  
      else
      {
        echo "<h3>Error al guardar</h3>";
      }

    }//end save


}//end class

new savemateria();

?>
