<?php
include_once'plantilla.php';
class asignarclase extends plantilla
{
	function __construct()
	{
       if(isset($_SESSION['USUARIO']) && $_SESSION['TIPO_USUARIO']=="Web master")
        {
             $this->HEAD("Asignar clases");
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

<script>
  function hola()
  {
    var idEst = document.getElementById("idest").value;
    
    document.getElementById("idestudiante").value=idEst;

  }

   function ir(id)
  {
    if (confirm("Presiona OK para confirmar el borrado."))
    {
      var url1 = "sacarest.php?id="+id;
      //alert(url);
      window.location=url1;
    }
  }


 function check()
 {
  var campos = "";
   if(document.getElementById('idclase').value == "-Seleccionar clase-")
   {
    alert("Debes seleccionar una clase valida.");
   }
   else if (document.getElementById('idestudiante').value == "") 
   {
    alert("Debes especificar un estudiante.");
   }   
   else
   {

     var valores = {
                "idclase" : $("#idclase").val(),
                "idestudiante" : $("#idestudiante").val()
        };
    
        $.ajax({
                data:  valores,
                url:   'asignarclase2.php',
                type:  'post',
                success:  function (response) {
                        $("#resultado").html(response);
                        $("#idestudiante").val("");
                        $("#idclase").val("-Seleccionar clase-");                        
                }
        });

   }

 }//end check


 function buscar()
  {
    if (document.getElementById('idclase1').value=="-Seleccionar clase-") 
    {
      alert("Debes seleccionar una clase valida.");
    }
    else
    {
      var ur = "asignarclase.php?idclase="+$("#idclase1").val();
      window.location = ur;
    }
  }
</script>

<div class="container">
      
      <div class="row">
      <div class="col-sm-3  well">
      <h3>Asignar clase</h3>
      
       
     
      <div class="form-group">
      <label for="pwd">Clase:</label>
      <?php $this->getFullClases();?>  
      </div>
       
      <div class="form-group">
      <label for="pwd">ID Estudiante:</label>
      <input type="text" class="form-control" name="idestudiante" id="idestudiante"><br>
      <a href="#" data-toggle="modal" data-target="#myModal">Buscar estudiante</a> 
      </div> 


      <button type="submit" class="btn btn-success" onclick="check();">Guardar</button>
      <button class="btn btn-danger" type="reset" id="quitar">Limpiar</button>
      
      <div id="resultado"></div>
     
	  </div>

      <div class="col-sm-1"></div>

      <div class="col-sm-8 well" id="lateral1">
     <h3>Seleccione clase para ver estudiantes inscritos</h3>
      	
      	<div class="row">
      	<div class="col-sm-4">
<?php  $this->getFullClases(1);?>
       </div>
       <div class="col-sm-3">
         <input type="submit" class="btn btn-primary" value="Ver" onclick="buscar()">
       </div>
        </div>
     
<br>
<?php
if (isset($_GET['idclase']) && $_GET['idclase'] != "")
{
	$this->buscarclase($_GET['idclase']);
}//end if
?>
 </div>



</div>

</div>
 
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:25px 40px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="w3-allerta">Seleccionar estudiante</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">

<?php

  $C = $this->getCon();

  $STM = $C->query("SELECT ID,Nombre,Apellido,Curso FROM estudiante ORDER BY ID");

  if ($STM->num_rows > 0) 
  {
?>
<div class="panel">
<select name="idest" id="idest" class="form-control">

<?php   
    while ($row = $STM->fetch_assoc()) 
    {
        echo "<option>".$row['ID']." - ".$row['Nombre']." ".$row['Apellido'].
        " - ".$row['Curso']."</option>";    
    }//end while
    
    echo "</select></div>";
    $STM->close();
    
  }//end if
  else
  {
    echo "<h3>Nothing found</h3>";
  }//end else

?>  
<button class="btn btn-primary" onclick="hola()" data-dismiss="modal">Seleccionar</button>

        </div>
     
      </div>
      
    </div>
  </div> 
</div>
 
 <!-- modal -->


<?php    	
    }//end CUERPO1 
    

    function buscarClase($val)
    {
    
  $C = $this->getCon();
  $val2 = intval($val);

  $qry = sprintf("
SELECT
  estudiante.ID,
  concat(estudiante.Nombre,' ',estudiante.Apellido) AS NombreF,
  estudiante.Curso
FROM
  estudiante
WHERE
  estudiante.ID IN
  (SELECT horario.IdEstudiante FROM horario WHERE horario.IdClase = %d) 
",$val2);
  
  $STM = $C->query($qry);
  //$STM->bind_param("i",$val2);
  //$STM->execute();

  if ($STM->num_rows > 0) 
  {
?>
<table class="table table-striped table-bordered" style="background-color:#FFFFFF;">
<tr>
  <th>ID</th>
  <th>Nombre completo</th>
  <th>Curso</th>
  <th>Accion</th>
<?php
    while($row = $STM->fetch_assoc())
    {
?>
  <tr>
  <td><?php echo $row['ID'];?></td>
  <td><?php echo $row['NombreF'];?></td>
  <td><?php echo $row['Curso']?></td>
  <td>
  <a href="" id="delest" tooltip="Eliminar de la clase">
  <span class="glyphicon glyphicon-remove"></span>
  </a>
  </td>
    <?php

    }//end while
    echo "</table>";
  }//end if
  else
  {
    echo "<h3>No se encontro nada</h3>";
  }//end else
$STM->close();
    
    }//end buscarM


 function getFullClases($a=0)
 {
   $C = $this->getCon();
      $STM = $C->query("SELECT ID,Materia,Horario FROM clase ORDER BY ID");
      if ($a==1) 
      {
        echo "<select name=\"idclase1\" id=\"idclase1\" class=\"form-control\">";    
      }//end if
      else
      {
        echo "<select name=\"idclase\" id=\"idclase\" class=\"form-control\">";
      }//end else

      echo "<option>-Seleccionar clase-</option>";
      while($row = $STM->fetch_assoc())
      {
        echo "<option>"
        .$row['ID']." - ".$row['Materia']." - ".$row['Horario']."</option>";

      }//end while
      echo "</select>";
      $STM->close();


 }//end getFullClases


}//end class

new asignarclase();
?>	