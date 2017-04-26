<?php
include_once'metodos1.php';
include_once'plantilla.php';
class controlempleados extends plantilla
{
  function __construct()
  {
    if(isset($_SESSION['USUARIO']) && $_SESSION['TIPO_USUARIO']=="Web master")
        {
            $this->HEAD("Control de empleados");
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
 function check()
 {
  var campos = "";
   if (document.getElementById('nom').value == "") 
   {
    campos +="Nombre \n";
   }
  if (document.getElementById('ape').value == "") 
   {
    campos +="Apellido \n";
   }
   if (document.getElementById('cedula').value == "") 
   {
    campos +="Cedula\n";
   }
   if (document.getElementById('tel').value == "") 
   {
    campos +="Telefono\n";
   }
   if (document.getElementById('dir').value == "") 
   {
    campos +="Direccion\n";
   }
    if (document.getElementById('nac').value == "") 
   {
    campos +="Nacionalidad\n";
   }
   if (document.getElementById('fecha').value == "") 
   {
    campos +="Fecha de nacimiento\n";
   }
   if (document.getElementById('sueldo').value == "") 
   {
    campos +="Sueldo\n";
   }
   if (document.getElementById('puesto').value == "") 
   {
    campos +="Puesto\n";
   }
   
   
   if(campos!="")
   {
    alert("Los siguientes campos son obligatorios:\n"+campos);
   }
   else
   {

     var valores = {
                "nom" : $("#nom").val(),
                "ape" : $("#ape").val(),
                "sexo" : $("#sexo").val(),
                "cedula" : $("#cedula").val(),
                "tel" : $("#tel").val(),
                "cel" : $("#cel").val(),
                "dir" : $("#dir").val(),
                "nac" : $("#nac").val(),
                "fecha" : $("#fecha").val(),
                "puesto" : $("#puesto").val(),
                "sueldo" : $("#sueldo").val()
        };
       
        $.ajax({
                data:  valores,
                url:   'saveemp.php',
                type:  'post',
                success:  function (response) {
                        $("#resultado").html(response);
                        $("#nom").val("");
                        $("#ape").val("");
                        $("#sexo").val("");
                        $("#cedula").val("");
                        $("#tel").val("");
                        $("#cel").val("");
                        $("#dir").val("");
                        $("#nac").val("");
                        $("#fecha").val("");
                        $("#sueldo").val("");
                        $("#puesto").val("");
                                                
                }
        });
   }

 }//end check

</script>

<div class="container well ">
  <h3>Control de empleados</h3>

 <a href="controlempleados2.php">Consulta y edicion</a>

      <div class="well" style="background-color:#FFFFFF;">
        <h3>Registro</h3>

 <div class="row"> 
 <div class="col-sm-4">     
      <div class="form-group">
      <label for="usr">Nombre:</label>
      <input type="text" class="form-control" name="nom" id="nom">
    </div> </div>
<div class="col-sm-4"> 
    <div class="form-group">
      <label for="pwd">Apellido:</label>
      <input type="text" class="form-control" name="ape" id="ape">
    </div>
 </div>
<div class="col-sm-4"> 
   <div class="form-group">
      <label for="sexo">Sexo:</label>

   <label class="radio-inline">
      <input type="radio" name="sexo" value="Masculino" id="sexo">Masculino
    </label>
    <label class="radio-inline">
      <input type="radio" name="sexo" value="Femenino" id="sexo">Femenino
    </label>
     <label class="radio-inline">
      <input type="radio" name="sexo" value="Otro" id="sexo">Otro

    </label>
    </div>

 </div>

 </div>


<div class="row"> 
 <div class="col-sm-4">     
      <div class="form-group">
      <label for="usr">Puesto:</label>
      <input type="text" class="form-control" name="padre" id="puesto">
    </div> </div>
<div class="col-sm-4"> 
    <div class="form-group">
      <label for="pwd">Cedula:</label>
      <input type="text" class="form-control" name="tel" id="cedula">
    </div>
 </div>
<div class="col-sm-4"> 
   <div class="form-group">
      <label for="pwd">Direccion:</label>
      <input type="text" class="form-control" name="cel" id="dir">
    </div>
 </div>

 </div>

<div class="row"> 
 <div class="col-sm-4">     
      <div class="form-group">
      <label for="usr">Fecha de nac.:</label>
      <input type="text" class="form-control" name="dir" id="fecha">
    </div> </div>
<div class="col-sm-4"> 
    <div class="form-group">
      <label for="pwd">Sueldo:</label>
      <input type="text" class="form-control" name="nac" id="sueldo">
    </div>
 </div>
<div class="col-sm-4"> 
   <div class="form-group">
      <label for="pwd">Nacionalidad:</label>
      <input type="text" class="form-control" name="fecha" id="nac">
    </div>
 </div>

 </div>

<div class="row"> 
 <div class="col-sm-4"> 
<label for="pwd">Telefono:</label>
      <input type="text" class="form-control" name="curso" id="tel">
   
 </div>
  <div class="col-sm-4"> 
<label for="pwd">Celular:</label>
      <input type="text" class="form-control" name="correo" id="cel">
   
 </div>
 </div> 


<div class="row"> 
 <div class="col-sm-4"> 
<button class="btn btn-success" id="btnguardar" onclick="check();">Guardar</button>
<button type="reset" class="btn btn-info">Limpiar</button>

 </div>
 </div>   

 </div>

<div id="resultado">
  
</div>
    </div>


<?php

  }//end cuerpo1

}//end class

new controlempleados();



















 
 