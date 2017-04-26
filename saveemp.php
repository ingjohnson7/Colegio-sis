<?php
include_once'conn.php';
class saveemp extends conn
{
  function __construct()
  {

         $this->save($_POST['nom'],
              $_POST['ape'],
              $_POST['sexo'],
              $_POST['puesto'],
              $_POST['cedula'],
              $_POST['dir'],
              $_POST['fecha'],
              $_POST['sueldo'],
              $_POST['nac'],
              $_POST['tel'],             
              $_POST['cel']);



  }//end construct



function save($n2,$n3,$n4,$n5,$n6,$n7,$n8,$n9,$n10,$n11,$n12)
    {
      $C = $this->getCon();
      $id=0;
        $nombre = $n2;
        $apellido = $n3; 
        $sexo = $n4;
        $puesto = $n5;
        $cedula = $n6;
        $dir = $n7;
        $fecha = $n8;
        $sueldo = $n9;
        $nac = $n10;
        $telefono = $n11;
        $celular = $n12;




      $STM = $C->prepare("INSERT INTO empleado VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
      $STM->bind_param("isssssssssss",
        $id,
        $nombre,
        $apellido,
        $sexo,
        $puesto,
        $cedula,
        $dir,
        $fecha,
        $sueldo,
        $nac,
        $telefono,
        $celular);

      $STM->execute();

      if ($STM->affected_rows > 0) 
      {
           echo "<div class=\"col-sm-12 alert alert-success text-center\"     style='float:left;'>
               <strong>El empleado se registro</strong></div>";
           $STM->close();
      }//end if  
      else
      {
        echo "<h3>Error al guardar</h3>";
      }

    }//end save


}//end class

new saveemp();

?>
