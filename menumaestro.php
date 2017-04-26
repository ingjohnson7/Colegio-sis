<?php
include_once'plantilla.php';
class menumaestro extends plantilla
{
	function __construct()
	{
    if(isset($_SESSION['USUARIO']) && $_SESSION['TIPO_USUARIO']=="Maestro")
      {
            $this->HEAD("Menu de maestro");
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
  function confirmare(idclase)
  {
    if (confirm("Estas seguro?")) 
    {
      var ur = "eliminarprueba.php?claseid="+idclase;
      window.location = ur;
    }//end if

  }//end function
</script>
<div class="container">
      
      <div class="row">
      <div class="col-sm-7  well">
      <h2>Menu de maestro</h2>
      <br>
      <div class="row">
        <div class="col-sm-12 panel">
       <h3>Opciones sobre materias</h3>
       <?php $this->showMateriasP();?>
        </div>
 
      </div>
	   </div>

      <div class="col-sm-1"></div>

      <div class="col-sm-4 well" id="lateral1">
      	<h3>Horario de materias</h3>
      	<?php $this->showHorario();?>
      </div>      
      </div>
</div>
 



<?php

	}//end cuerpo1

function showHorario()
{
  $id = $_SESSION['ID_USUARIO'];
  $C = $this->getCon();
  
  $qry = sprintf("
SELECT
  clase.Materia,
  clase.Horario,
  clase.Estudiantes
FROM
  clase
WHERE
  clase.Maestro 
IN 
  (SELECT concat(maestro.Nombre,' ',maestro.Apellido) 
  FROM 
  maestro 
  WHERE maestro.ID = %d)",$id);

  $STM = $C->query($qry);
  //$STM->bind_param("i",$id);
  //$STM->execute();

  if ($STM->num_rows > 0) 
  {
?>
<table class="table table-striped table-bordered" style="background-color:#FFFFFF;">
<tr>
  <th>Materia</th>
  <th>Horario</th>
  <th>Cantidad est.</th>

<?php

    while($row = $STM->fetch_assoc())
    {
    ?>
  <tr>
  <td><?php echo $row['Materia'];?></td>
  <td><?php echo $row['Horario'];?></td>
  <td><?php echo $row['Estudiantes'];?></td>
</th>

    <?php


    }//end while  
    echo "</table>";
  }//end if
  else
  {
    echo "<h3>No hay materias inscritas</h3>".$id;

  }//end else

$STM->close();
    

}//end showHorario

function showMateriasP()
    {
      $C = $this->getCon();
      $id = $_SESSION['ID_USUARIO'];
      $qry = sprintf("
      SELECT 
      ID,Materia,Horario 
      FROM 
      clase 
      WHERE 
      Maestro 
      IN 
      (SELECT concat(Nombre,' ',Apellido) FROM maestro WHERE ID = %d)",$id);

      $STM = $C->query($qry);
      
      while($row = $STM->fetch_assoc())
      {
        echo "<div class='row'>";
        echo "<div class='col-sm-4'>";
        echo "<b>".$row['Materia']." - ".$row['Horario']."</b></div>";
         echo "<div class='col-sm-1'></div>";
        echo "<div class='col-sm-2'><b><a href='calificarest.php?claseid=".$row['ID']."'>Notas</a></b></div>";
        echo "<div class='col-sm-3'>";
        if ($this->haytest($row['ID'])) 
        {
          echo "<a href='verprueba.php?claseid=".$row['ID']."'><b>Ver resultados de la prueba</b></a></div>";
          echo "<a class='btn-danger' onclick='confirmare(".$row['ID'].")' href='eliminarprueba.php?claseid=".$row['ID']."'><b>Eliminar prueba</b></a></div>";
        }else
        {
          echo "<a href='crearprueba.php?claseid=".$row['ID']."'><b>Crear prueba</b></a></div>";
        } 
          echo "<div class='col-sm-2'>
          <a href='envmsg.php?claseid=".$row['ID']."'><b>Mensaje</b></a></div>";  
        echo "</div><br>";

      }//end while
      $STM->close();

    }//end showMateriasP

function haytest($idclase)
{
  $D = false;
  $C = $this->getCon();
  $ST = $C->query(
    sprintf("SELECT ID_prueba FROM prueba WHERE ID_clase = %d",$idclase));
  if ($ST->num_rows > 0) 
  {
     $D = true;
  }
  $ST->close();
  $C->close();
  return $D;

}//end haytest    


}//end class

new menumaestro();

?>