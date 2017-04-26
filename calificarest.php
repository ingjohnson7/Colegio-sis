<?php
include_once'plantilla.php';
class calificarest extends plantilla
{
	function __construct()
	{
    if(isset($_SESSION['USUARIO']) && $_SESSION['TIPO_USUARIO']=="Maestro")
      {
            $this->HEAD("Menu de maestro - Calificaciones");
            $this->CUERPO1();
            $this->FOOTER();
      }
     else
      {
           echo "<h2>Acceso denegado</h2>";
           echo "<a href='index.php'>Ir al inicio</a>";
      }
    

	}//end construct

	function CUERPO1()
	{
?>

<div class="container">
      
      <div class="row">
      <div class="col-sm-1"></div>

      <div class="col-sm-10  well">
      <h3>Menu de maestro - Calificaciones </h3>
      <h3 class="btn-primary"><center>
      <?php echo $this->getNomClase($_SESSION['ID_USUARIO'])?>
      </center></h3>

      <?php $this->showCalificaciones();?>
	    
      </div>

      <div class="col-sm-1"></div>
  
      </div>
</div>
 



<?php

	}//end cuerpo1

function showCalificaciones()
{
  $id = $_SESSION['ID_USUARIO'];
  $C = $this->getCon();
  
  $qry = sprintf("
SELECT
  calificacion.IdEstudiante,
  calificacion.Nota1,
  calificacion.Nota2,
  calificacion.Asistencia,
  calificacion.NotaFinal
FROM
  calificacion
WHERE
  calificacion.IdClase 
IN 
  (SELECT clase.ID 
   FROM 
   clase
WHERE 
  clase.Maestro  
IN 
  (SELECT concat(maestro.Nombre,' ',maestro.Apellido)
   FROM
   maestro
   WHERE maestro.ID = %d))",$id);

  $STM = $C->query($qry);
  //$STM->bind_param("i",$id);
  //$STM->execute();

  if ($STM->num_rows > 0) 
  {
?>
<table class="table table-striped table-bordered" style="background-color:#FFFFFF;width:100%;">
<tr>
  <th>ID estudiante</th>
  <th>Nombre estudiante</th>
  <th>Nota 1</th>
  <th>Nota 2</th>
  <th>Asistencia</th>
  <th>Nota final</th>
  <th><button class="btn btn-success">Guardar</button></th>
  
<?php

    while($row = $STM->fetch_assoc())
    {
    ?>
  <tr>
  <td><?php echo $row['IdEstudiante'];?></td>
  <td><?php echo $this->getNombreEst($row['IdEstudiante']);?></td>
  <td><input type="text" style="width:60%;" id="nota1" name="nota1" value="<?php echo $row['Nota1'];?>"></td>
  <td><input type="text" style="width:60%;" id="nota2" name="nota2" value="<?php echo $row['Nota2'];?>"></td>
  <td><input type="text" style="width:60%;" id="asistencia" name="asistencia" value="<?php echo $row['Asistencia'];?>"></td>
  <td><input type="text" style="width:60%;" id="notafinal" name="notafinal" value="<?php echo $row['NotaFinal'];?>">
  </td>
</th>

    <?php


    }//end while  
    echo "</table>";
  }//end if
  else
  {
    echo "<h4>Aun no hay estudiantes inscritos en esta clase</h4>";

  }//end else

$STM->close();
    

}//end showCalificaciones


function getNombreEst($ide)
{
  $C = $this->getCon();
  $qry = sprintf("SELECT concat(Nombre,' ',Apellido) AS NombreF FROM estudiante WHERE ID = %d",$ide);
  $STM = $C->query($qry);
  //$STM->bind_param("i",$ide);
  //$STM->execute();
  $row = $STM->fetch_assoc();
  return $row["NombreF"];
}//end getNombreEst

function getNomClase($ide)
{
  $C = $this->getCon();
  $qry = sprintf("
    SELECT 
    clase.ID,
    clase.Materia 
    FROM 
    clase 
    WHERE 
    Maestro 
    IN 
    (SELECT 
    concat(Nombre,' ',Apellido) 
    FROM 
    maestro 
    WHERE 
    ID = %d)",$ide);

  $STM = $C->query($qry);
  $row = $STM->fetch_assoc();
  return $row["ID"]." - ".$row["Materia"];  
}//end getNomClase


private function updateNotasAll()
{
    $qry = "UPDATE estudiante SET Nota1 = ?, Nota2 = ?, Asistncia = ? WHERE IdEstudiante = ?;";

}//end updateNotasAll

}//end class
new calificarest();

?>