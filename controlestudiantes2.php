<?php
include_once'conn.php';
include_once'plantilla.php';
class controlestudiantes2 extends plantilla
{
	function __construct()
	{
    if(isset($_SESSION['USUARIO']) && $_SESSION['TIPO_USUARIO']=="Web master")
        {
            $this->HEAD("Control de estudiantes");
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
<style>
     
  .modal-header, h4, .close {
      background-color: #0d0d0d;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  .w3-lobster {
  font-family: "Lobster", serif;
}
.w3-allerta {
  font-family: "Allerta Stencil", Sans-serif;
}
</style>
<script>
  function ir(id)
  {
    if (confirm("Presiona OK para confirmar el borrado."))
    {
      var url1 = "delest.php?id="+id;
      //alert(url);
      window.location=url1;
    }
  }
   
  function iredit()
  {
    if (confirm("Presiona OK para confirmar la edicion."))
    {
      var id = $("#idest").attr("data-url");
      //var url1 = "editest.php?id="+id;
      var con = 0;
      var vals = {
                "ID" : id,
                "Nombre" : "",
                "Apellido" : "",
                "Padre" : "",
                "Telefono" : "",
                "Celular" : "",
                "Direccion" : "",
                "Nacionalidad" : "",
                "Fecha" : "",
                "Curso" : "",
                "Correo" : "",
                "Usuario" : "",
                "Clave" : ""
        };

        if ($("#nom").val()!="")
        {
          vals["Nombre"] = $("#nom").val();
        }else{con++;}
        if ($("#ape").val()!="")
        {
          vals["Apellido"] = $("#ape").val();
        }else{con++;}
        if ($("#padre").val()!="")
        {
          vals["Padre"] = $("#padre").val();
        }else{con++;}
        if ($("#tel").val()!="")
        {
          vals["Telefono"] = $("#tel").val();
        }else{con++;}
        if ($("#cel").val()!="")
        {
          vals["Celular"] = $("#cel").val();
        }else{con++;}
        if ($("#nac").val()!="")
        {
          vals["Nacionalidad"] = $("#nac").val();
        }else{con++;}
        if ($("#dir").val()!="")
        {
          vals["Direccion"] = $("#dir").val();
        }else{con++;}
        if ($("#fecha").val()!="")
        {
          vals["Fecha"] = $("#fecha").val();
        }else{con++;}
        if ($("#curso").val()!="")
        {
          vals["Curso"] = $("#curso").val();
        }else{con++;}
        if ($("#correo").val()!="")
        {
          vals["Correo"] = $("#correo").val();
        }else{con++;}
        
        if (con >= 10) 
        {

        $.ajax({
                data:  vals,
                url:   'editarest.php',
                type:  'post',
                success:  function (response) {
                        $("#resultado").empty();
                        $("#resultado").html(response);
                        
                        $("#nom").val("");
                        $("#ape").val("");
                        //$("#sexo").val("");
                        $("#padre").val("");
                        $("#tel").val("");
                        $("#cel").val("");
                        $("#dir").val("");
                        $("#nac").val("");
                        $("#fecha").val("");
                        $("#curso").val("");
                        $("#correo").val("");
                        //$("#usuario").val("");
                                                
                }
        });
        }//end if
          con = 0;

      //alert(url1);
      //window.location=url1;
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
      var ur = "controlestudiantes2.php?pardebusqueda="+$("#pald").val()
      +"&valdebusqueda="+$("#vald").val();
      window.location = ur;
    }
  }
</script>
<div class="container well ">
  <h3>Control de estudiantes</h3>
  <a href="controlestudiantes.php">
          Registro</a>
 

    <div class="well" style="background-color:#FFFFFF;">
        <h3>Consulta de estudiantes</h3>

<div class="row"> 

  <div class="col-sm-3"> 
Buscar por:

<select name="pardebusqueda" class="form-control" id="pald">
  <option>Nombre</option>
  <option>Telefono</option>
  <option>Direccion</option>
  <option>Fecha de nacimiento</option>
</select>
</div>

<div class="col-sm-3"> 

Parametro de busqueda:

<input type="text" style="margin-top:0px;" class="form-control" id="vald" name="valdebusqueda">
</div>

<div class="col-sm-1">
  <button onclick="buscar();" class="btn btn-success" style="margin-top:19px;">Buscar</button>
</div>

</div>

<div class="row">
<center>
<div class="col-sm-12" id="resultado">
<?php
if (isset($_GET["pardebusqueda"]) && isset($_GET["valdebusqueda"])) 
{
  $this->buscarE($_GET['pardebusqueda'], $_GET['valdebusqueda']);
}
?>
</div>
</center>
</div>


</div>



<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:25px 40px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="w3-allerta">Rellena los campos a cambiar</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">

<div class="row">
<div class="col-sm-5">
Nombre:<input type="text" id="nom" class="form-control" style="width:70%;"> 
Apellido:<input type="text" id="ape" class="form-control" style="width:70%;"> 
Padre:<input type="text" id="sexo" class="form-control" style="width:70%;"> 
Telefono:<input type="text" id="tel" class="form-control" style="width:65%;"> 
Celular:<input type="text" id="cel" class="form-control" style="width:65%;"> 
</div> 


<div class="col-sm-5">
Nacionalidad:<input type="text" id="nac" class="form-control" style="width:50%;"> 
Fecha:<input type="text" id="fecha" class="form-control" style="width:70%;"> 
Curso:<input type="text" id="curso" class="form-control" style="width:70%;"> 
Correo:<input type="text" id="correo" class="form-control" style="width:50%;"> 

</div>  
</div>
<div class="row">
  <div class="col-sm-12">
Direccion:<input type="text" id="dir" class="form-control" style="width:70%;"> 
    
  </div>
</div>

<button class="btn btn-success" onclick="iredit();" data-dismiss="modal">Enviar</button>
<button class="btn btn-primary" onclick="" data-dismiss="modal">Cancelar</button>

        </div>
     
      </div>
      
    </div>
  </div> 
</div>
 
 <!-- modal -->



<?php

	}//end cuerpo1

function buscarE($par, $val)
{
  $CON = new conn();
  $C = $CON->getCon();
  trim($val);
  $qry = "";

  if($par=="Fecha de nacimiento")
  {
    $qry = sprintf("SELECT * FROM estudiante WHERE FechaNacimiento = '%s'",$val);
  }//end else if
  else
  {
    $qry = sprintf("SELECT * FROM estudiante WHERE %s = '%s'",$par,$val);
  }//end if
  
  $STM = $C->query($qry);

  if ($STM->num_rows > 0) 
  {
        
    ?>
<table class="table table-striped table-bordered">
<tr>
  <th>Nombre</th>
  <th>Apellido</th>
  <th>Sexo</th>
  <th>Curso</th>
  <th>Padre</th>
  <th>Telefono</th>
  <th>Celular</th>
  <th>Direccion</th>
  <th>Nacionalidad</th>
  <th>Fecha nac.</th>
  <th>Correo</th>
  <th>Accion</th>

  <?php
  while ($row = $STM->fetch_assoc()) 
  {
  ?>
  <tr>
  <td><?php echo $row['Nombre'];?></td>
  <td><?php echo $row['Apellido'];?></td>
  <td><?php echo $row['Sexo'];?></td>
  <td><?php echo $row['Curso'];?></td>
  <td><?php echo $row['Padre'];?></td>
  <td><?php echo $row['Telefono'];?></td>
  <td><?php echo $row['Celular'];?></td>
  <td><?php echo $row['Direccion'];?></td>
  <td><?php echo $row['Nacionalidad'];?></td>
  <td><?php echo $row['FechaNacimiento'];?></td>
  <td><?php echo $row['Correo'];?></td>
  <td>
  <?php echo "<a href='#'onclick='ir(".$row['ID'].")'>";?>
  <span class="glyphicon glyphicon-remove"></span>
  </a>
  <?php echo "<a data-toggle=\"modal\" data-target=\"#myModal\" 
  data-url='".$row['ID']."' id='idest'>";?>
  <span class="glyphicon glyphicon-edit"></span>
  </a>
  </td>

    <?php
  }//end while
    echo "</table>";
    $STM->close();
  }//end if
  else
  {
    echo "<h3>No se encontro nada</h3>";
  }//end else

}//end buscarE



}//end class

new controlestudiantes2();



















 