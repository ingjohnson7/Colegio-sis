<?php
include_once'plantilla.php';
class vernotas extends plantilla
{
	function __construct()
	{
    if(isset($_SESSION['USUARIO']) && $_SESSION['TIPO_USUARIO']=="Estudiante")
      {
            $this->HEAD("Menu de mestudiante - Calificaciones");
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
      <h3>Menu de estudiante - Calificaciones </h3>
      
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
  calificacion.IdClase,
  calificacion.Nota1,
  calificacion.Nota2,
  calificacion.Asistencia,
  calificacion.NotaFinal
FROM
  calificacion
WHERE
  calificacion.IdEstudiante = %d",$id);

  $STM = $C->query($qry);
  //$STM->bind_param("i",$id);
  //$STM->execute();

  if ($STM->num_rows > 0) 
  {
?>
<table class="table table-striped table-bordered" style="background-color:#FFFFFF;width:100%;">
<tr>
  <th>Clase</th>
  <th>Nota 1</th>
  <th>Nota 2</th>
  <th>Asistencia</th>
  <th>Nota final</th>
  <th>Prueba online</th>
<?php

    while($row = $STM->fetch_assoc())
    {
    ?>
  <tr>
  <td><?php echo $this->getNomClase($row['IdClase']);?></td>
  <td><?php echo $row['Nota1'];?></td>
  <td><?php echo $row['Nota2'];?></td>
  <td><?php echo $row['Asistencia'];?></td>
  <td><?php echo $row['NotaFinal'];?></td>
  <?php
if (!$this->haytest()) 
        {
          echo "<td><a href='tomarprueba.php?claseid=".$row['IdClase']."'><b>Tomar prueba</b></a></td>";
        }else
        {
          echo "<td>Ya tomada</td>";
        } 
?>
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


function haytest()
{
  $D = false;
  $C = $this->getCon();
  $ST = $C->query(
    sprintf("SELECT ID_prueba FROM resultados_prueba WHERE ID_estudiante = %d",
      $_SESSION['ID_USUARIO']));
  if ($ST->num_rows > 0) 
  {
     $D = true;
  }
  $ST->close();
  $C->close();
  return $D;

}//end haytest 


function getNomClase($ide)
{
  $C = $this->getCon();
  $qry = sprintf("SELECT ID,Materia FROM clase WHERE ID = %d",$ide);
  $STM = $C->query($qry);
  $row = $STM->fetch_assoc();
  return $row["ID"]." - ".$row["Materia"];  
}//end getNomClase


}//end class
new vernotas();

?>