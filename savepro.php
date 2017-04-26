<?php
include_once'conn.php';
class savepro extends conn
{
  function __construct()
  {
      $this->save($_POST['nom'],
              $_POST['precioc'],
              $_POST['preciov'],
              $_POST['cantidad'],
              $_POST['descripcion'],
              $_POST['suplidor']);
  }//end construct



function save($n2, $n3, $n4, $n5, $n6, $n7)
    {
      $C = $this->getCon();

      $codigo = 0;
      $nombre = $n2;
      $precioc = $n3;
      $preciov = $n4;
      $cantidad = $n5;
      $descripcion = $n6;
      $suplidor = $n7;
      
      $STM = $C->prepare("INSERT INTO producto VALUES (?,?,?,?,?,?,?)");
      $STM->bind_param("isddsss",
        $codigo,
        $nombre, 
        $precioc,
        $preciov, 
        $cantidad,
        $descripcion,
        $suplidor);
      $STM->execute();

      if ($STM->affected_rows > 0) 
      {
        echo "<div class=\"col-sm-12 alert alert-success text-center\" style='float:left;'>
               <strong>El producto se registro</strong></div>";
      }//end if  
      else
      {
        echo "<h3>Error al guardar</h3>";
      }

    }//end save


}//end class

new savepro();

?>
