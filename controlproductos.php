<?php

include_once'conn.php';
include_once'plantilla.php';
class controlproductos extends plantilla
{
	function __construct()
	{
    if(isset($_SESSION['USUARIO']) && $_SESSION['TIPO_USUARIO']=="Web master")
        {
            $this->HEAD("Control de productos");
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
  function camb(val)
    {

      if ($("#precioc").val() != "")
      {
         var Pc = parseInt(val);
         var Pc1 = Pc * 0.10;
         var Pv = Pc + Pc1;
         document.getElementById("preciov").value = Pv;
      }//end if

    }//end camb

  function ir(id)
  {
    if (confirm("Presiona OK para confirmar el borrado."))
    {
      var url1 = "delpro.php?id="+id;
      //alert(url);
      window.location=url1;
    }
  }//end ir


 function check()
 {
  var campos = "";
   if (document.getElementById('nom').value == "") 
   {
    campos +="Nombre \n";
   }
   if (document.getElementById('precioc').value == "") 
   {
    campos +="Precio de compra \n";
   }
   if (document.getElementById('preciov').value == "") 
   {
    campos +="Precio de venta\n";
   }
   if (document.getElementById('cantidad').value == "") 
   {
    campos +="Cantidad \n";
   }
   if (document.getElementById('descripcion').value == "") 
   {
    campos +="Descripcion \n";
   }//end if


   if(campos!="")
   {
    alert("Los siguientes campos son obligatorios:\n"+campos);
   }
   else
   {

     var valores = {
                "nom" : $("#nom").val(),
                "precioc" : $("#precioc").val(),
                "preciov" : $("#preciov").val(),
                "cantidad" : $("#cantidad").val(),
                "descripcion" : $("#descripcion").val(),
                "suplidor" : $("#suplidor").val()
        };
    
        $.ajax({
                data:  valores,
                url:   'savepro.php',
                type:  'post',
                success:  function (response) {
                        $("#resultado").html(response);
                        $("#nom").val("");
                        $("#precioc").val("");
                        $("#preciov").val("");
                        $("#cantidad").val("");
                        $("#descripcion").val("");
                                                
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
      var ur = "controlproductos.php?pardebusqueda="+$("#pald").val()
      +"&valdebusqueda="+$("#vald").val();
      window.location = ur;
    }//end else

  }//end buscar


</script>
<div class="container">
      
      <div class="row">
      <div class="col-sm-3  well">
      <h3>Registrar producto</h3>
      
      
      <div class="form-group">
      <label for="usr">Nombre:</label>
      <input type="text" class="form-control" style="width:60%;" name="nombre" id="nom">
      </div>  
       
      <div class="form-group">
      <label for="pwd">Precio de compra:</label>
      <input type="text" class="form-control" onchange="camb(this.value);" style="width:40%;" 
      name="precioc" id="precioc">
      </div>
          
      <div class="form-group">
      <label for="pwd">Precio de venta:</label>
      <input type="text" class="form-control" style="width:40%;" name="preciov" readonly id="preciov">
      </div>

      <div class="form-group">
      <label for="pwd">Cantidad:</label>
      <input type="text" class="form-control" style="width:60%;" name="cantidad" id="cantidad">
      </div>
      
      <div class="form-group">
      <label for="pwd">Descripcion:</label>
      <textarea class="form-control" name="descripcion" id="descripcion" cols="10" rows="5"></textarea>
      </div>

      <div class="form-group">
      <label for="pwd">Suplidor:</label>
      <?php $this->getSuplidores();?>
      </div>

      <button class="btn btn-success"  onclick="check();">Guardar</button>
      <button type="reset" class="btn btn-info">Limpiar</button>

      <div id="resultado"></div>

    
	  </div>

      
      <div class="col-sm-9 well" id="lateral1">
      <h3>Consultar productos</h3>
      	
      	<div class="row">
      	<div class="col-sm-3">
 Buscar por:
<select name="pardebusqueda" class="form-control" id="pald">
  <option>Codigo</option>
  <option>Nombre</option>
  <option>Precio</option>
  <option>Descripcion</option>
  <option>Suplidor</option>
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
	$this->buscarP($_GET['pardebusqueda'], $_GET['valdebusqueda']);
}//end if
?>
 </div>



</div>

</div>
 
<?php    	
    }//end CUERPO1 

    function buscarP($par, $val)
    {
    	$CON = new conn();
  $C = $CON->getCon();
  trim($val);
  
  $qry = sprintf("SELECT * FROM producto WHERE %s = '%s'",$par,$val);
  
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
  <th>Precio de compra</th>
  <th>Precio de venta</th>
  <th>Cantidad</th>
  <th>Descripcion</th>
  <th>Suplidor</th>
  <th>Accion</th>
  <tr>
  <td><?php echo $row['Codigo'];?></td>
  <td><?php echo $row['Nombre'];?></td>
  <td><?php echo $row['PrecioCompra'];?></td>
  <td><?php echo $row['PrecioVenta'];?></td>
  <td><?php echo $row['Cantidad'];?></td>
  <td><?php echo $row['Descripcion'];?></td>
  <td><?php echo $row['Suplidor'];?></td>
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


    function getSuplidores()
    {
      $c1 = new conn();
      $C = $c1->getCon();
      $STM = $C->query("SELECT Nombre FROM suplidor ORDER BY Codigo");
      echo "<select name=\"suplidor\" id=\"suplidor\" class=\"form-control\">";

      while($row = $STM->fetch_assoc())
      {
        echo "<option>".$row['Nombre']."</option>";

      }//end while
      echo "</select>";

    }//end getSuplidores

}//end class

new controlproductos();
?>	