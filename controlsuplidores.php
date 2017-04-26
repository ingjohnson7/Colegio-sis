<?php
include_once'conn.php';
include_once'plantilla.php';
class controlsuplidores extends plantilla
{
	function __construct()
	{
    if(isset($_SESSION['USUARIO']) && $_SESSION['TIPO_USUARIO']=="Web master")
        {
            $this->HEAD("Control de suplidores");
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
      var url1 = "delsup.php?id="+id;
      //alert(url);
      window.location=url1;
    }
  }//end ir


 function check()
 {
  var campos = "";
   if (document.getElementById('nombre').value == "") 
   {
    campos +="Nombre \n";
   }
   if (document.getElementById('rnc').value == "") 
   {
    campos +="RNC \n";
   }
   if (document.getElementById('telefono').value == "") 
   {
    campos +="Telefono\n";
   }
   if (document.getElementById('correo').value == "") 
   {
    campos +="Correo \n";
   }
   if (document.getElementById('direccion').value == "") 
   {
    campos +="Direccion \n";
   }//end if


   if(campos!="")
   {
    alert("Los siguientes campos son obligatorios:\n"+campos);
   }
   else
   {

     var valores = {
                "nombre" : $("#nombre").val(),
                "rnc" : $("#rnc").val(),
                "telefono" : $("#telefono").val(),
                "correo" : $("#correo").val(),
                "direccion" : $("#direccion").val()
        };
    
        $.ajax({
                data:  valores,
                url:   'savesup.php',
                type:  'post',
                success:  function (response) {
                        $("#resultado").html(response);
                        $("#nombre").val("");
                        $("#rnc").val("");
                        $("#telefono").val("");
                        $("#correo").val("");
                        $("#direccion").val("");
                                                
                }
        });

   }//end else

 }//end check


 function buscar()
  {
    if ($("#vald").val()=="") 
    {
      alert("Escribe algo");
    }
    else
    {
      var ur = "controlsuplidores.php?pardebusqueda="+$("#pald").val()
      +"&valdebusqueda="+$("#vald").val();
      window.location = ur;
    }//end else

  }//end busca

</script>
<div class="container">
      
      <div class="row">
      <div class="col-sm-3  well">
      <h3>Registrar suplidor</h3>
      
       
       
      <div class="form-group">
      <label for="usr">Nombre:</label>
      <input type="text" class="form-control" style="width:60%;" name="nombre" id="nombre">
      </div>  
       
      <div class="form-group">
      <label for="pwd">RNC:</label>
      <input type="text" class="form-control" style="width:60%;" name="rnc" id="rnc">
      </div>

      <div class="form-group">
      <label for="pwd">Telefono:</label>
      <input type="text" class="form-control" style="width:60%;" name="telefono" id="telefono">
      </div>
      
      <div class="form-group">
      <label for="pwd">Correo:</label>
      <input type="text" class="form-control" style="width:60%;" name="correo" id="correo">
      </div>

      <div class="form-group">
      <label for="pwd">Direccion:</label>
      <input type="text" class="form-control" style="width:60%;" name="direccion" id="direccion">
      </div>

     <button class="btn btn-success"  onclick="check();">Guardar</button>
       <button type="reset" class="btn btn-info">Limpiar</button>

 
      <div id="resultado"></div>
   
	  </div>

      
      <div class="col-sm-9 well" id="lateral1">
    
      <h3>Consultar suplidores</h3>
      	
      	<div class="row">
      	<div class="col-sm-3">
 Buscar por:
<select name="pardebusqueda" class="form-control" id="pald">
  <option>Codigo</option>
  <option>Nombre</option>
  <option>RNC</option>
  <option>Telefono</option>
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
	$this->buscarS($_GET['pardebusqueda'], $_GET['valdebusqueda']);
}//end if
?>
 </div>



</div>

</div>
 
<?php    	
    }//end CUERPO1 
    

    function buscarS($par, $val)
    {
    	$CON = new conn();
  $C = $CON->getCon();
  trim($val);
  
  $qry = sprintf("SELECT * FROM suplidor WHERE %s = '%s'",$par,$val);
  
  $STM = $C->query($qry);

  if ($STM->num_rows > 0) 
  {
    $row = $STM->fetch_assoc();
    $STM->close();
    ?>
<table class="table table-striped table-bordered" style="background-color:#FFFFFF;">
<tr>
  <th>Codigo</th>
  <th>Nombre</th>
  <th>RNC</th>
  <th>Telefono</th>
  <th>Correo</th>
  <th>Direccion</th>
  <th>Accion</th>
  <tr>
  <td><?php echo $row['Codigo'];?></td>
  <td><?php echo $row['Nombre'];?></td>
  <td><?php echo $row['RNC'];?></td>
  <td><?php echo $row['Telefono'];?></td>
  <td><?php echo $row['Correo'];?></td>
  <td><?php echo $row['Direccion'];?></td>
  <td>
  <?php echo "<a href='#'onclick='ir(".$row['Codigo'].")'>";?>
  <span class="glyphicon glyphicon-remove"></span>
  </a>
  </td>
</th>
  
</table>
    <?php

  }//end if
  else
  {
    echo "<h3>No se encontro nada</h3>";
  }//end else

    }//end buscarM

}//end class

new controlsuplidores();
?>	