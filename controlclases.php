<?php
include_once'metodos1.php';
include_once'plantilla.php';
class controlclases extends plantilla
{
	function __construct()
	{
    if(isset($_SESSION['USUARIO']) && $_SESSION['TIPO_USUARIO']=="Web master")
        {
            $this->HEAD("Control de clases");
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
      $m = new metodos1();
?>

<script>
  function ir(id)
  {
    if (confirm("Presiona OK para confirmar el borrado."))
    {
      var url1 = "delclase.php?id="+id;
      //alert(url);
      window.location=url1;
    }
  }

  function buscar()
  {
    if ($("#vald").val()=="") 
    {
      alert("Escribe algo");
    }
    else
    {
      var ur = "controlclases.php?pardebusqueda="+$("#pald").val()
      +"&valdebusqueda="+$("#vald").val();
      window.location = ur;
    }
  }

function check()
 {

   if(document.getElementById('horario').value == "")
   {
    alert("El compo horario es obligatorio:");
   }
   else
   {

     var valores = {
                "maestro" : $("#maestro").val(),
                "materia" : $("#materia").val(),
                "horario" : $("#horario").val()
        };
       
        $.ajax({
                data:  valores,
                url:   'saveclase.php',
                type:  'post',
                success:  function (response) {
                        $("#resultado").html(response);
                        $("#horario").val("");

                                                
                }
        });
   }//end else

 }//end check


</script>

<div class="container">
      
      <div class="row">
      <div class="col-sm-3  well">
      <h3>Registrar clase</h3>
      
      
      <div class="form-group">
      <label for="usr">Maestro:</label>
        <?php $m->getMaestros();?>
      </div>  

      <div class="form-group">
      <label for="pwd">Materia:</label>
      <?php $m->getMaterias();?>
      </div>
       
      <div class="form-group">
      <label for="pwd">Horario:</label>
      <input type="text" class="form-control" name="horario" id="horario">
      </div> 


     <button type="submit" class="btn btn-success" onclick="check();">Guardar</button>
     <button type="reset" class="btn btn-info">Limpiar</button>

      <div id="resultado"></div>

     
	  </div>

      <div class="col-sm-1"></div>

      <div class="col-sm-8 well" id="lateral1">
      <h3>Consultar clases</h3>
      	
      	<div class="row">
      	<div class="col-sm-3">
 Buscar por:
<select name="pardebusqueda" class="form-control" id="pald">
  <option>ID</option>
  <option>Maestro</option>
  <option>Materia</option>
</select>
       </div>
       <div class="col-sm-4">
Parametro:
<input type="text" style="margin-top:0px;" class="form-control" name="valdebusqueda" id="vald">
       </div>
       <div class="col-sm-4"><br>
 <button onclick="buscar();" class="btn btn-success" style="">Buscar</button>
        </div>

        </div>


<?php
if (isset($_GET['valdebusqueda']) && $_GET['valdebusqueda'] != "")
{
	$this->buscarclase($_GET['pardebusqueda'], $_GET['valdebusqueda']);
}//end if
?>
 </div>



</div>

</div>
 
<?php    	
    }//end CUERPO1 
    
  
    function buscarClase($par, $val)
    {
    	$m = new metodos1();
  $C = $m->getCon();
  trim($val);
  
  $qry = sprintf("SELECT * FROM clase WHERE %s = '%s'",$par,$val);
  
  $STM = $C->query($qry);

  if ($STM->num_rows > 0) 
  {
?>
<table class="table table-striped table-bordered" style="background-color:#FFFFFF;">
<tr>
  <th>ID</th>
  <th>Maestro</th>
  <th>Materia</th>
  <th>Horario</th>
  <th>Estudiantes</th>
  <th>Accion</th>

<?php

    while($row = $STM->fetch_assoc())
    {
    ?>
  <tr>
  <td><?php echo $row['ID'];?></td>
  <td><?php echo $row['Maestro'];?></td>
  <td><?php echo $row['Materia'];?></td>
  <td><?php echo $row['Horario'];?></td>
  <td><?php echo $row['Estudiantes'];?></td>
  <td>
  <?php echo "<a href='#'onclick='ir(".$row['ID'].")'>";?>
  <span class="glyphicon glyphicon-remove"></span>
  </a>
  </td>
</th>

    <?php


    }//end while  
    $STM->close();
    echo "</table>";
  }//end if
  else
  {
    echo "<h3>No se encontro nada</h3>";
  }//end else

    }//end buscarM


 

}//end class

new controlclases();
?>	