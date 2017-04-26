<?php
include_once'conn.php';
include_once'plantilla.php';
class controlmaterias extends plantilla
{
	function __construct()
	{
    if(isset($_SESSION['USUARIO']) && $_SESSION['TIPO_USUARIO']=="Web master")
        {
            $this->HEAD("Control de materias");
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
  function ir(id)
  {
    if (confirm("Presiona OK para confirmar el borrado."))
    {
      var url1 = "delmateria.php?id="+id;
      //alert(url);
      window.location=url1;
    }
  }


 function check()
 {
  var campos = "";
   if (document.getElementById('nom').value == "") 
   {
    campos +="Nombre \n";
   }
   if (document.getElementById('codigo').value == "") 
   {
    campos +="Codigo \n";
   }
   if (document.getElementById('curso').value == "") 
   {
    campos +="Curso\n";
   }

   
   if(campos!="")
   {
    alert("Los siguientes campos son obligatorios:\n"+campos);
   }
   else
   {

     var valores = {
                "nom" : $("#nom").val(),
                "codigo" : $("#codigo").val(),
                "curso" : $("#curso").val()
        };
    
        $.ajax({
                data:  valores,
                url:   'savemateria.php',
                type:  'post',
                success:  function (response) {
                        $("#resultado").html(response);
                        $("#nom").val("");
                        $("#codigo").val("");
                        $("#curso").val("");                        
                }
        });

   }

 }//end check


 function buscar()
  {
    if ($("#vald").val()=="") 
    {
      alert("Escribe algo");
    }
    else
    {
      var ur = "controlmaterias.php?pardebusqueda="+$("#pald").val()
      +"&valdebusqueda="+$("#vald").val();
      window.location = ur;
    }
  }
</script>
<div class="container">
      
      <div class="row">
      <div class="col-sm-4  well">
      <h3>Registrar materias</h3>
      
       
        
      <div class="form-group">
      <label for="usr">Nombre:</label>
      <input type="text" class="form-control" name="nombre" id="nom">
      </div>  
       
      <div class="form-group">
      <label for="pwd">Codigo:</label>
      <input type="text" class="form-control" name="codigo" id="codigo">
      </div>

      
      <div class="form-group">
      <label for="pwd">Curso:</label>
      <input type="text" class="form-control" name="curso" id="curso">
      </div>
      
      <button type="submit" class="btn btn-success" onclick="check();">Guardar</button>
      <button type="reset" class="btn btn-info">Limpiar</button>

   <div id="resultado">
  
</div>
	  </div>

      <div class="col-sm-1"></div>

      <div class="col-sm-7 well" id="lateral1">
       <h3>Consultar materias</h3>
      	
      	<div class="row">
      	<div class="col-sm-3">
 Buscar por:
<select name="pardebusqueda" class="form-control" id="pald">
  <option>Codigo</option>
  <option>Nombre</option>
  <option>Curso</option>
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
	$this->buscarM($_GET['pardebusqueda'], $_GET['valdebusqueda']);
}//end if
?>
 </div>



</div>

</div>
 
<?php    	
    }//end CUERPO1 
    
    
    function buscarM($par, $val)
    {
    	$CON = new conn();
  $C = $CON->getCon();
  trim($val);
  
  $qry = sprintf("SELECT * FROM materia WHERE %s = '%s'",$par,$val);
  
  $STM = $C->query($qry);

  if ($STM->num_rows > 0) 
  {
?>
<table class="table table-striped table-bordered" style="background-color:#FFFFFF;">
<tr>
  <th>Nombre</th>
  <th>Codigo</th>
  <th>Curso</th>
  <th>Accion</th>

<?php
    while($row = $STM->fetch_assoc())
    {
?>
  <tr>
  <td><?php echo $row['Nombre'];?></td>
  <td><?php echo $row['Codigo'];?></td>
  <td><?php echo $row['Curso'];?></td>
  <td>
  <?php echo "<a href='#'onclick='ir(".$row['Codigo'].")'>";?>
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

new controlmaterias();
?>	