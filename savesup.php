<?php
include_once'conn.php';
class savesup extends conn
{
  function __construct()
  {
    $this->save($_POST['nombre'],
              $_POST['rnc'],
              $_POST['telefono'],
              $_POST['correo'],
              $_POST['direccion']);
  }//end construct



function save($n2, $n3, $n4, $n5, $n6)
    {
      $C = $this->getCon();

      $codigo = 0;
      $nombre = $n2;
      $rnc = $n3;
      $telefono = $n4;
      $correo = $n5;
      $direccion = $n6;


      $STM = $C->prepare("INSERT INTO suplidor VALUES (?,?,?,?,?,?)");
      $STM->bind_param("isssss",
        $codigo,
        $nombre, 
        $rnc, 
        $telefono,
        $correo,
        $direccion);
      $STM->execute();

      if ($STM->affected_rows > 0) 
      {
        echo "<div class=\"col-sm-12 alert alert-success text-center\" style='float:left;'>
               <strong>El suplidor se registro</strong></div>";
      }//end if  
      else
      {
        echo "<h3>Error al guardar</h3>";
      }

    }//end save


}//end class

new savesup();

?>
