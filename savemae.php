<?php
include_once'conn.php';
class savemae extends conn
{
  function __construct()
  {
     $this->save($_POST['nom'],
              $_POST['ape'],
              $_POST['cedula'],
              $_POST['tel'],
              $_POST['cel'],
              $_POST['dir'],
              $_POST['nac'],
              $_POST['fecha'],
              $_POST['correo'],
              $_POST['usuario'],
              $_POST['clave'],
              $_POST['sexo']);

  }//end construct




function save($n2,$n3,$n4,$n5,$n6,$n8,$n9,$n10,$n11,$n13,$n14,$n15)
    {
      
      $C = $this->getCon();

      $id = 0;
      $nombre = $n2;
      $apellido = $n3;
      $sexo = $n15;
      $cedula = $n4;
      $telefono = $n5;
      $celular = $n6;
      $direccion = $n8;
      $nacionalidad = $n9;
      $fechaNacimiento = $n10;
      $correo = $n11;
      $codigo = $n13;
      $clave = md5($n14);

      $STM = $C->prepare("INSERT INTO maestro VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $STM->bind_param("issssssssssss",
        $id,
        $nombre, 
        $apellido,
        $sexo, 
        $cedula,
        $telefono,
        $celular,
        $direccion,
        $nacionalidad,
        $fechaNacimiento,
        $correo,
        $codigo,
        $clave);
      $STM->execute();

      if ($STM->affected_rows > 0) 
      {
           echo "<div class=\"col-sm-12 alert alert-success text-center\"     style='float:left;'>
               <strong>El maestro se registro</strong></div>";
           $STM->close();
      }//end if  
      else
      {
        echo "<h3>Error al guardar</h3>";
      }

    }//end save





}//end class

new savemae();

?>
