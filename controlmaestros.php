<?php
include_once'metodos1.php';
include_once'plantilla.php';

class controlmaestros extends plantilla
{
	function __construct()
	{
    if(isset($_SESSION['USUARIO']) && $_SESSION['TIPO_USUARIO']=="Web master")
        {
            $this->HEAD("Control de maestros");
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


<div class="container well ">

<form action="controlmaestros.php" method="post"> 

  <h3>Control de maestros</h3>


          <a href="controlmaestros2.php">
          Consulta y edicion</a>
          
       <br>
     <div class="well" style="background-color:#FFFFFF;">
        <h3>Registro</h3>
<div class="row"> 
 <div class="col-sm-4">     
      <div class="form-group">
      <label for="usr">Nombre:</label>
      <input type="text" class="form-control" name="nom" id="nom"  required="true">
    </div> </div>
<div class="col-sm-4"> 
    <div class="form-group">
      <label for="pwd">Apellido:</label>
      <input type="text" class="form-control" name="ape" id="ape" required="true">
    </div>
 </div>
<div class="col-sm-4"> 
   <div class="form-group">
      <label for="sexo">Sexo:</label>

   <label class="radio-inline">
      <input type="radio" name="sexo" value="Masculino" id="sexo" required="true">Masculino
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
      <label for="usr">Cedula:</label>
      <input type="text" class="form-control" name="cedula" id="cedula" required="true">
    </div> </div>
<div class="col-sm-4"> 
    <div class="form-group">
      <label for="pwd">Telefono:</label>
      <input type="text" class="form-control" name="tel" id="tel" required="true">
    </div>
 </div>
<div class="col-sm-4"> 
   <div class="form-group">
      <label for="pwd">Celular:</label>
      <input type="text" class="form-control" name="cel" id="cel" required="true">
    </div>
 </div>

 </div>

<div class="row"> 
 <div class="col-sm-4">     
      <div class="form-group">
      <label for="usr">Direccion:</label>
      <input type="text" class="form-control" name="dir" id="dir" required="true">
    </div> </div>
<div class="col-sm-4"> 
    <div class="form-group">
      <label for="pwd">Nacionalidad:</label>
      <input type="text" class="form-control" name="nac" id="nac" required="true">
    </div>
 </div>
<div class="col-sm-4"> 
   <div class="form-group">
      <label for="pwd">Fecha de nac.:</label>
      <input type="date" class="form-control" name="fecha" id="fecha" required="true">
    </div>
 </div>

 </div>

<div class="row"> 

  <div class="col-sm-4"> 
<label for="pwd">Correo:</label>
      <input type="text" class="form-control" name="correo" id="correo" required="true">
   
 </div>

 <div class="col-sm-4"> 
<label for="pwd">Usuario:</label>
      <input type="text" class="form-control" name="usuario" id="usuario" required="true">
   
 </div>

 <div class="col-sm-4"> 
<label for="pwd">Clave:</label>
      <input type="text" class="form-control" value="123456" name="clave" id="clave" required="true">
   
 </div>
</div>

<div class="row"> 
 <div class="col-sm-4"> 
<button onclick="check()" class="btn btn-success">Guardar</button>
<button type="reset" class="btn btn-info" id="btnreset">Limpiar</button>

 </div>
 </div>   

 </div>

<div id="resultado">
<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") 
{
       $this->save($_POST['nom'],
              $_POST['ape'],
              $_POST['cedula'],
              $_POST['tel'],
              $_POST['cel'],
              $_POST['dir'],
              $_POST['nac'],
              $_POST['fecha'],
              $_POST['correo'],
              $_POST['usuario'],
              $_POST['clave'],
              $_POST['sexo']);
}
?>  

</div>


    </div>

</form>    
      </div>


<?php

	}//end cuerpo1

function save($n2,$n3,$n4,$n5,$n6,$n8,$n9,$n10,$n11,$n13,$n14,$n15)
    {
      
      $C = $this->getCon();

      $id = 0;
      $nombre = $n2;
      $apellido = $n3;
      $sexo = $n15;
      $cedula = $n4;
      $telefono = $n5;
      $celular = $n6;
      $direccion = $n8;
      $nacionalidad = $n9;
      $fechaNacimiento = $n10;
      $correo = $n11;
      $codigo = $n13;
      $clave = md5($n14);

      $STM = $C->prepare("INSERT INTO maestro VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $STM->bind_param("issssssssssss",
        $id,
        $nombre, 
        $apellido,
        $sexo, 
        $cedula,
        $telefono,
        $celular,
        $direccion,
        $nacionalidad,
        $fechaNacimiento,
        $correo,
        $codigo,
        $clave);
      $STM->execute();

      if ($STM->affected_rows > 0) 
      {
           echo "<div class=\"col-sm-12 alert alert-success text-center\"     style='float:left;'>
               <strong>El maestro se registro</strong></div>";
           $STM->close();
      }//end if  
      else
      {
        echo "<h3>Error al guardar</h3>";
      }

    }//end save


}//end class

new controlmaestros();



















 