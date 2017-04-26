<?php
include_once'plantilla.php';
class buzon extends plantilla
{
	function __construct()
	{
    if(isset($_SESSION['USUARIO']) && $_SESSION["TIPO_USUARIO"]=="Maestro")
      {
            $this->HEAD("Buzon de mensajes");
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
<script type="text/javascript">
  function confirmare(idMsg)
  {
    if (confirm("Estas seguro?")) 
    {
      var ur = "eliminarmsg.php?msgid="+idMsg;
      window.location = ur;
    }//end if

  }//end function
</script>

<div class="container">
      
      <div class="row">
      <div class="col-sm-10  well">
      <h3>Buzon de mensajes</h3>

       <?php $this->showMensajes();?>

	   </div>

      <div class="col-sm-1">       
      </div>

     
      </div>
</div>
 



<?php

	}//end cuerpo1

function showMensajes()
{
  $id = $_SESSION['ID_USUARIO'];

  $C = $this->getCon();
  $qry = sprintf("SELECT IdMensaje,IdEstudiante,Asunto,Cuerpo,Fecha,Visto FROM buzon_maestro WHERE IdMaestro = %d;",$id);
  $STM = $C->query($qry);

  if ($STM->num_rows > 0) 
  {
?>
<table class="table table-striped table-bordered" style="background-color:#FFFFFF;">
<tr style="background-color:#FFFFAA;">
  <th>ID msg</th>
  <th>Estudiante</th>
  <th>Asunto</th>
  <th>Fecha</th>
<?php

    while($row = $STM->fetch_assoc())
    {
    ?>
  <tr>
  <td><?php echo $row['IdMensaje'];?></td>
  <td><?php echo $row['IdEstudiante'];?></td>
  <td><?php echo $row['Asunto'];?></td>
  <td><?php echo $row['Fecha'];?></td>
</th>

    <?php


    }//end while  
    echo "</table>";
  }//end if
  else
  {
    echo "<div class=\"alert alert-danger\">
 <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
  <strong>No hay mensajes</strong>
</div>";
  }//end else

$STM->close();
    

}//end showMensajes

protected function getNameEst($idEst)
{
  $C = $this->getCon();
  $qry = sprintf("SELECT concat(Nombre,' ',Apellido,' - ',Curso) AS Name FROM estudiante WHERE ID = %d",$idEst);
  $STM = $C->query($qry);
  $row = $STM->fetch_assoc();
  $STM->close();
  $C->close();
  return $row["Name"];

}//end getName

}//end class

new buzon();

?>